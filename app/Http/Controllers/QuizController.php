<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Bab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show($slug)
    {
        $id = session("slug_map.$slug");

        if (!$id) {
            abort(404);
        }

        $sesi = Sesi::findOrFail($id);

        $id_bab = $sesi->id_bab;

        $bab = Bab::where('id', $id_bab)->firstOrFail();

        $quiz_slug = $bab->slug;

        // Fetch questions from the database
        $questions = DB::table('soal')
            ->where('id_sesi', $sesi->id)
            ->get()
            ->map(function ($q) {
                $options = $q->opsi ? json_decode($q->opsi, true) : [];

                if (in_array($q->tipe, ['mcq', 'multiple', 'multiple_ordered']) && is_array($options)) {
                    shuffle($options);
                }

                return [
                    'id' => $q->id,
                    'type' => $q->tipe,
                    'question' => $q->soal,
                    'options' => $options,
                    'answer' => json_decode($q->jawaban, true),
                ];
            })
            ->toArray(); // Convert collection to array for shuffling

        shuffle($questions); // Shuffle the questions randomly

        session(["quiz_questions" => $questions]); // Store shuffled questions in session

        return view('quiz.show', compact('sesi', 'questions', 'slug', 'quiz_slug'));
    }


    public function submitAnswer(Request $request, $slug)
    {
        $user = User::find(Auth::id());
        $questions = session("quiz_questions");

        if (!$questions) {
            return response()->json(['error' => 'Quiz session expired. Refresh the page.'], 400);
        }

        $questionIndex = $request->question_index;

        if (!isset($questions[$questionIndex])) {
            return response()->json(['error' => 'Invalid question'], 400);
        }

        $correctAnswer = $questions[$questionIndex]['answer'];
        $userAnswer = $request->answer;

        if (is_array($correctAnswer)) {
            if ($questions[$questionIndex]['type'] === "multiple_ordered") {
                // Check if ordered multiple matches exactly
                $isCorrect = $correctAnswer === $userAnswer;

                $user->exp += 10;
                $user->save();
            } else if ($questions[$questionIndex]['type'] === "multiple") {
                // Sort both arrays before comparison (ignoring order)
                sort($correctAnswer);
                sort($userAnswer);
                $isCorrect = $correctAnswer == $userAnswer;

                $user->exp += 10;
                $user->save();
            } else {
                // Ensure correctAnswer and userAnswer are strings before using strtolower and trim
                $isCorrect = strtolower(trim($correctAnswer[0])) == strtolower(trim($userAnswer));;

                $user->exp += 10;
                $user->save();
            }
        }

        if ($isCorrect) {
            $user->exp += 10;
            $user->save();
        } else {
            if ($user->heart > 0) {
                $user->heart -= 1; // Decrease heart count
                $user->save(); // Save to the database
            }
        }

        return response()->json([
            'correct' => $isCorrect
        ]);
    }
}
