@include('template.head')
<!-- Start::app-content -->
<div class="main-content pt-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center pt-2">
            <div class="col-lg-10 p-3">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <!-- Progress Bar -->
                    <div class="col flex-grow-1 me-3">
                        <div class="progress progress-xl progress-animate custom-progress-4 w-100" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-primary-gradient" id="progress-bar" style="width: 0%"></div>
                            <div class="progress-bar-label text-center" id="progress-text">0%</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs me-2">
                            <img src="../assets/images/medal/heart.svg" alt="rank">
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
                    role="button" data-bs-toggle="button" aria-pressed="true">Check Answer</button>
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
    let lives = "{{ Auth::user()->heart }}";
    let answerChecked = false;

    function loadQuestion() {
        if (currentQuestionIndex >= questions.length) {
            alert("Quiz finished! Redirecting...");
            window.location.href = `/`;
            return;
        }

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
        nextBtn.innerText = "Check Answer";
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
                        footer.classList.add("bd-green-800");
                        feedback.innerHTML = "✅ Correct!";
                        feedback.classList.add("text-white", "opacity-100");
                        nextBtn.classList.add("btn-success");
                    } else {
                        lives--;
                        document.getElementById("lives").innerText = lives;
                        footer.classList.add("bd-red-800");
                        feedback.innerHTML = "❌ Incorrect! Try again.";
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

                    nextBtn.innerText = "Next";
                    answerChecked = true;
                })
                .catch(error => console.error("Error:", error));
        } else {
            currentQuestionIndex++;
            loadQuestion();
        }
    });

    loadQuestion();
</script>


@include('template.scripts')
