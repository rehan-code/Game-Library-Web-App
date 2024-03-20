var totalCorrectAnswers = 0;

async function fetchAllQuestions() {
    const response = await fetch('../questions.json');
    const questionsData = await response.json();
    return questionsData.questions_1;
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

    const gameOverTitle = document.createElement("h1");
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

    const optionsContainer = document.createElement("div");
    optionsContainer.classList.add("options2");

    const homeButton = document.createElement("button");
    homeButton.classList.add("option-button", "button1");
    homeButton.onclick = function() { window.location.href = '../../index.php'; };

    const replayButton = document.createElement("button");
    replayButton.classList.add("option-button", "button2");
    replayButton.onclick = function() { window.location.href = 'cyber_coin_stage_1.php'; };

    optionsContainer.appendChild(homeButton);
    optionsContainer.appendChild(replayButton);

    gameOverElement.appendChild(optionsContainer);

    gameOverElement.classList.add("active");
    document.querySelector(".game-content").classList.add("blur");
}

async function showCongratsScreen(totalScore) {
    const gameOverElement = document.querySelector(".game-over-screen");
    gameOverElement.innerHTML = '';
    // Setting Title
    const gameOverTitle = document.createElement("h1");
    gameOverTitle.textContent = "Congratulations! you've become a cyber coin millionaire!";
    gameOverElement.appendChild(gameOverTitle);

    const correctAnswerDisplay = document.createElement("p");
    correctAnswerDisplay.textContent = "";
    correctAnswerDisplay.classList.add("correct-answer");
    gameOverElement.appendChild(correctAnswerDisplay);

    const scoreDisplay = document.createElement("p");
    scoreDisplay.textContent = `Your total score: ${totalScore}`;
    gameOverElement.appendChild(scoreDisplay);

    const friendlyMessage = document.createElement("p");
    friendlyMessage.textContent = "Come again next season to try and be a billionaire";
    gameOverElement.appendChild(friendlyMessage);

    const optionsContainer = document.createElement("div");
    optionsContainer.classList.add("options2");

    const homeButton = document.createElement("button");
    homeButton.classList.add("option-button", "button1");
    homeButton.onclick = function() { window.location.href = '../../index.php'; };

    const replayButton = document.createElement("button");
    replayButton.classList.add("option-button", "button2");
    replayButton.onclick = function() { window.location.href = 'cyber_coin_stage_1.php'; };

    optionsContainer.appendChild(homeButton);
    optionsContainer.appendChild(replayButton);

    gameOverElement.appendChild(optionsContainer);

    gameOverElement.classList.add("active");
    document.querySelector(".game-content").classList.add("blur");
}


async function displayRandomQuestion(questionIndex) {
    const allQuestions = await fetchAllQuestions();
    const selectedQuestion = allQuestions[questionIndex];

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
                if (questionIndex == 19) {
                    showCongratsScreen(totalCorrectAnswers);
                }
                displayRandomQuestion(questionIndex+1);
            } else {           
                showGameOverScreen(selectedQuestion.correct_answer, totalCorrectAnswers);
            }
        };
        answerOptionsElement.appendChild(optionButtonElement);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    displayRandomQuestion(0);
});
