@include('template.head')
<!-- Start::app-content -->
<div class="main-content pt-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center pt-2">
            <div class="col-lg-10 p-3">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#alertModal"></button>
                    <!-- Progress Bar -->
                    <div class="col flex-grow-1 mx-3">
                        <div class="progress progress-xl progress-animate custom-progress-4 w-100" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-primary-gradient" id="progress-bar" style="width: 0%"></div>
                            <div class="progress-bar-label text-center" id="progress-text">0%</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs me-2">
                            <img src="{{ asset('assets/images/medal/heart.svg') }}" alt="rank">
                        </span>
                        <p class="h6 text-danger mb-0 fw-semibold" id="lives">{{ Auth::user()->heart }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Question Display -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-10 p-3">
                <div class="card-header mt-3">
                    <h5 class="fw-medium mb-3">Soal <span id="question-number">1</span></h5>
                    <h3 class="fw-normal" id="question-text"></h3>
                </div>
            </div>
        </div>

        <!-- Answer Options -->
        <div class="d-flex justify-content-center align-items-center mb-5">
            <div class="col-10 p-3">
                <div class="card-body mt-2">
                    <div class="row" id="answer-options">
                        <!-- Options will be generated dynamically here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End::app-content -->

<!-- Start::main-footer -->
<footer id="quiz-footer" class="footer mt-auto py-3 bg-white text-center transition">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <span id="feedback-msg" class="fs-3 fw-bold opacity-0 transition"></span> <!-- Feedback message -->
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <button class="btn btn-purple btn-lg btn-raised-shadow active btn-wave transition" id="next-btn"
                    role="button" data-bs-toggle="button" aria-pressed="true">Periksa Jawaban</button>
            </div>
        </div>
    </div>
</footer>
<!-- End::main-footer -->

<!-- Out of Hearts Modal -->
<div class="modal fade" id="outOfHeartsModal" tabindex="-1" aria-labelledby="outOfHeartsLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="outOfHeartsLabel">💔 Out of Hearts</h5>
            </div>
            <div class="modal-body text-center">
                <p>You have run out of hearts! Please wait for them to refill or purchase more.</p>
                <button type="button" class="btn btn-secondary" id="redirectBackBtn">Go Back</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="alert custom-alert1 alert-danger">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x"></i>
                </button>
                <div class="text-center px-5 pb-0 svg-danger">
                    <svg class="custom-alert-icon" xmlns="http://www.w3.org/2000/svg" height="5rem" viewBox="0 0 24 24"
                        width="5rem" fill="#000000">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z">
                        </path>
                    </svg>
                    <h5>Anda Yakin ?</h5>
                    <p class="">Jangan pergi dulu! Progresmu akan hilang kalau kamu berhenti
                        sekarang!</p>
                    <div class="">
                        <form action="{{ route('bermain.show', ['slug' => $quiz_slug]) }}" method="get">
                            <button class="btn btn-md btn-danger m-1">Akhiri sesi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Final Result Modal -->
<div class="modal fade" id="finalResultModal" tabindex="-1" aria-labelledby="finalResultModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="finalResultModalLabel">Yeay! 🎉</h5>
            </div>
            <div class="modal-body text-center">
                <h3 class="fw-bold">Kamu menerima <span id="xp-earned" class="text-primary">0</span> XP! ⭐</h3>
                <p class="fs-5">Jawaban Benar: <span id="correct-answer-count"
                        class="fw-bold text-success">0</span></p>
                <p class="fs-5">XP kamu saat ini sebanyak <span id="user-xp" class="fw-bold">0</span> XP! ⭐</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="close-final-modal">Lanjut</button>
            </div>
        </div>
    </div>
</div>

<style>
    .transition {
        transition: all 0.4s ease-in-out;
    }

    .opacity-0 {
        opacity: 0;
    }

    .opacity-100 {
        opacity: 1;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<script>
    let quizSlug = "{{ $slug }}";
    let questions = @json($questions);
    let currentQuestionIndex = 0;
    let correctAnswerCount = 0;
    let earnedXP = 0;
    let lives = "{{ Auth::user()->heart }}";
    let answerChecked = false;

    function loadQuestion() {
        let question = questions[currentQuestionIndex];

        document.getElementById("question-number").innerText = currentQuestionIndex + 1;
        document.getElementById("question-text").innerText = question.question;

        let answerContainer = document.getElementById("answer-options");
        answerContainer.innerHTML = "";

        if (question.type === "mcq" || question.type === "multiple" || question.type === "multiple_ordered") {
            question.options.forEach((option, index) => {
                let optionHtml = `
                    <div class="col-6">
                        <input type="${question.type === 'mcq' ? 'radio' : 'checkbox'}" 
                               class="btn-check" 
                               name="answer" 
                               id="option-${index}" 
                               value="${option}">
                        <label class="btn btn-outline-primary btn-lg mb-2 w-100 transition" for="option-${index}">
                            ${option}
                        </label>
                    </div>
                `;
                answerContainer.innerHTML += optionHtml;
            });
        } else {
            answerContainer.innerHTML =
                `<input type="text" class="form-control transition" id="text-answer" placeholder="Type your answer here">`;
        }

        let feedback = document.getElementById("feedback-msg");
        feedback.innerText = "";
        feedback.classList.remove("opacity-100");
        feedback.classList.add("opacity-0");

        let footer = document.getElementById("quiz-footer");
        footer.className = "footer mt-auto py-3 bg-white text-center transition";

        let nextBtn = document.getElementById("next-btn");
        nextBtn.innerText = "Periksa Jawaban";
        nextBtn.className = "btn btn-purple btn-lg btn-raised-shadow active btn-wave transition";
        nextBtn.disabled = false;
        answerChecked = false;

        let progress = ((currentQuestionIndex + 1) / questions.length) * 100;
        document.getElementById("progress-bar").style.width = progress + "%";
        document.getElementById("progress-text").innerText = Math.round(progress) + "%";
    }

    document.getElementById("next-btn").addEventListener("click", function() {
        let nextBtn = document.getElementById("next-btn");
        let footer = document.getElementById("quiz-footer");
        let feedback = document.getElementById("feedback-msg");

        if (!answerChecked) {
            let selectedAnswer;
            if (questions[currentQuestionIndex].type === "mcq") {
                let selectedOption = document.querySelector("input[name='answer']:checked");
                if (selectedOption) selectedAnswer = selectedOption.value;
            } else if (questions[currentQuestionIndex].type === "multiple" || questions[currentQuestionIndex]
                .type === "multiple_ordered") {
                let selectedOptions = document.querySelectorAll("input[name='answer']:checked");
                selectedAnswer = Array.from(selectedOptions).map(opt => opt.value);
            } else {
                selectedAnswer = document.getElementById("text-answer").value.trim();
            }

            if (!selectedAnswer || (Array.isArray(selectedAnswer) && selectedAnswer.length === 0)) {
                alert("Please select an answer!");
                return;
            }

            fetch(`/quiz/${quizSlug}/answer`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        question_index: currentQuestionIndex,
                        answer: selectedAnswer
                    })
                })
                .then(response => response.json())
                .then(data => {
                    footer.classList.remove("bg-white", "bd-green-800", "bd-red-800");
                    nextBtn.classList.remove("btn-purple", "btn-success", "btn-danger");

                    if (data.error === "out_of_hearts") {
                        let outOfHeartsModal = new bootstrap.Modal(document.getElementById(
                            'outOfHeartsModal'));
                        outOfHeartsModal.show();

                        // Redirect after closing the modal
                        document.getElementById("redirectBackBtn").addEventListener("click", function() {
                            window.location.href = "/bermain/{{ $quiz_slug }}";
                        });
                        return;
                    }
                    if (data.correct) {
                        correctAnswerCount++;
                        footer.classList.add("bd-green-800");
                        feedback.innerHTML = "✅ Jawaban Benar!";
                        feedback.classList.add("text-white", "opacity-100");
                        nextBtn.classList.add("btn-success");
                    } else {
                        lives--;
                        document.getElementById("lives").innerText = lives;
                        footer.classList.add("bd-red-800");
                        feedback.innerHTML = "❌ Jawaban Salah!";
                        feedback.classList.add("text-white", "opacity-100");
                        nextBtn.classList.add("btn-danger");

                        if (lives <= 0) {
                            let outOfHeartsModal = new bootstrap.Modal(document.getElementById(
                                'outOfHeartsModal'));
                            outOfHeartsModal.show();

                            // Redirect after closing the modal
                            document.getElementById("redirectBackBtn").addEventListener("click",
                                function() {
                                    window.location.href = "/bermain/{{ $quiz_slug }}";
                                });
                            return;
                        }
                    }

                    nextBtn.innerText = "Lanjut";
                    answerChecked = true;
                })
                .catch(error => console.error("Error:", error));
        } else {
            if (currentQuestionIndex >= questions.length - 1) {
                submitFinalAnswer();
            } else {
                currentQuestionIndex++;
                loadQuestion();
            }
        }
    });

    function submitFinalAnswer() {
        fetch(`/quiz/${quizSlug}/final-answer`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    correct_answers: correctAnswerCount // Keep track of correct answers in JS
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    correctAnswerCount = data.correct_answers;
                    earnedXP = data.earned_exp;

                    // Update modal with correct answer count & XP
                    document.getElementById("xp-earned").innerText = earnedXP;
                    document.getElementById("correct-answer-count").innerText = correctAnswerCount;
                    document.getElementById("user-xp").innerText = data.total_exp;

                    // Show the final result modal
                    let finalResultModal = new bootstrap.Modal(document.getElementById('finalResultModal'));
                    finalResultModal.show();
                }
            })
            .catch(error => console.error("Error:", error));
    }

    document.getElementById("close-final-modal").addEventListener("click", function() {
        window.location.href = `/bermain/{{ $quiz_slug }}`;
    });

    loadQuestion();
</script>


@include('template.scripts')
