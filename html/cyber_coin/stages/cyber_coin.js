var totalCorrectAnswers = 0;

async function fetchAllQuestions() {
    const response = await fetch('../questions.json');
    const questionsData = await response.json();
    return questionsData.questions;
}

function shuffleOptions(optionsArray) {
    for (let i = optionsArray.length - 1; i > 0; i--) {
        const randomIndex = Math.floor(Math.random() * (i + 1));
        [optionsArray[i], optionsArray[randomIndex]] = [optionsArray[randomIndex], optionsArray[i]]; // Swap elements
    }
}

async function showGameOverScreen(correctAnswerText) {
    const gameOverElement = document.querySelector(".game-over-screen");
    gameOverElement.innerHTML = '';

    const correctAnswerDisplay = document.createElement("p");
    correctAnswerDisplay.textContent = "Correct Answer: " + correctAnswerText;
    correctAnswerDisplay.classList.add("correct-answer");

    gameOverElement.appendChild(correctAnswerDisplay);

    gameOverElement.classList.add("active");
    document.querySelector(".game-content").classList.add("blur");
}

async function displayRandomQuestion() {
    const allQuestions = await fetchAllQuestions();
    const randomQuestionIndex = Math.floor(Math.random() * allQuestions.length);
    const selectedQuestion = allQuestions[randomQuestionIndex];

    const questionTextElement = document.getElementById('question');
    const answerOptionsElement = document.getElementById('options');
    const scoreDisplayElement = document.getElementById('score');

    questionTextElement.textContent = selectedQuestion.question;
    scoreDisplayElement.textContent = "Score: " + totalCorrectAnswers;
    
    answerOptionsElement.innerHTML = '';
    shuffleOptions(selectedQuestion.options);
    selectedQuestion.options.forEach(function(answerOption) {
        const optionButtonElement = document.createElement('button');
        optionButtonElement.textContent = answerOption;
        optionButtonElement.onclick = function() {
            if (answerOption === selectedQuestion.correct_answer) {
                totalCorrectAnswers++;
                scoreDisplayElement.textContent = "Score: " + totalCorrectAnswers;
                displayRandomQuestion();
            } else {           
                showGameOverScreen(selectedQuestion.correct_answer);
            }
        };
        answerOptionsElement.appendChild(optionButtonElement);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    displayRandomQuestion();
});
