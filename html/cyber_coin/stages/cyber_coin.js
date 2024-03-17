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

async function showGameOverScreen(correctAnswerText, totalScore) {
    const gameOverElement = document.querySelector(".game-over-screen");
    gameOverElement.innerHTML = '';

    const gameOverTitle = document.createElement("h2");
    gameOverTitle.textContent = "Game Over!";
    gameOverElement.appendChild(gameOverTitle);

    const correctAnswerDisplay = document.createElement("p");
    correctAnswerDisplay.textContent = "Correct Answer: " + correctAnswerText;
    correctAnswerDisplay.classList.add("correct-answer");
    gameOverElement.appendChild(correctAnswerDisplay);

    const scoreDisplay = document.createElement("p");
    scoreDisplay.textContent = `Your total score: ${totalScore}`;
    gameOverElement.appendChild(scoreDisplay);

    const friendlyMessage = document.createElement("p");
    if (totalScore < 2) {
        friendlyMessage.textContent = "Don't worry, practice makes perfect! Try again soon!";
    } else if (totalScore < 5) {
        friendlyMessage.textContent = "Good effort! You're getting there, keep playing to improve!";
    } else {
        friendlyMessage.textContent = "Amazing job! You're a true champion! Come back soon to beat your score!";
    }
    gameOverElement.appendChild(friendlyMessage);

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
                showGameOverScreen(selectedQuestion.correct_answer, totalCorrectAnswers);
            }
        };
        answerOptionsElement.appendChild(optionButtonElement);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    displayRandomQuestion();
});
