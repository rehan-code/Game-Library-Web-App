var currentQuestionIndex = 0;
var correctAnswers = 0;


async function fetchQuestions() {
    const response = await fetch('../questions.json');
    const data = await response.json();
    return data.questions;
}

async function gameover() {
    const questions = await fetchQuestions();
    const question = questions[currentQuestionIndex];
    const correctAnswer = question.correct_answer;

    const gameOverScreen = document.querySelector(".game-over-screen");
    const correctAnswerElement = document.createElement("p");
    correctAnswerElement.textContent = "Correct Answer: " + correctAnswer;

    correctAnswerElement.classList.add("correct-answer");

    gameOverScreen.appendChild(correctAnswerElement);

    gameOverScreen.classList.add("active");
    document.querySelector(".game-content").classList.add("blur");
}

async function displayQuestion() {
    const questions = await fetchQuestions();
    const question = questions[currentQuestionIndex];
    const questionElement = document.getElementById('question');
    const optionsElement = document.getElementById('options');
    const resultElement = document.getElementById('result');
    const scoreElement = document.getElementById('score');
    const gameOverScreen = document.querySelector('.game-over-screen');


    questionElement.textContent = question.question;
    scoreElement.textContent = "Score: "+correctAnswers;
    
    optionsElement.innerHTML = '';
    question.options.forEach(function(option, index) {
        const optionElement = document.createElement('button');
        optionElement.textContent = option;
        optionElement.onclick = function() {

            if (option === question.correct_answer) {

                // resultElement.textContent = 'Correct!';
                correctAnswers++;
                scoreElement.textContent = correctAnswers;

                currentQuestionIndex++;

                displayQuestion();
            } else {           
                
                gameover();
            }
        };
        optionsElement.appendChild(optionElement);
    });
}

document.addEventListener("DOMContentLoaded", function() {

    console.log("DOMContentLoaded event fired");
    displayQuestion();
});
