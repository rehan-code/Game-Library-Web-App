var totalCorrectAnswers = 0;
const answeredQuestions = [];

function shuffleOptions(optionsArray) {
    for (let i = optionsArray.length - 1; i > 0; i--) {
        const randomIndex = Math.floor(Math.random() * (i + 1));
        [optionsArray[i], optionsArray[randomIndex]] = [optionsArray[randomIndex], optionsArray[i]]; // Swap elements
    }
}

async function showGameOverScreen(correctAnswerText, totalScore, stageId) {
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
    scoreDisplay.textContent = `Your total coins: ${totalScore}00`;
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
    replayButton.onclick = function() {
        
        if (stageId == 1) {
            window.location.href = 'cyber_coin_stage_1.php';
        } else if (stageId == 2) {
            window.location.href = 'cyber_coin_stage_2.php';
        } else if (stageId == 3) {
            window.location.href = 'cyber_coin_stage_3.php';
        }
    };

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
    gameOverTitle.textContent = "Congratulations! You've become a Cyber Coin millionaire!";
    gameOverElement.appendChild(gameOverTitle);

    const correctAnswerDisplay = document.createElement("p");
    correctAnswerDisplay.textContent = "";
    correctAnswerDisplay.classList.add("correct-answer");
    gameOverElement.appendChild(correctAnswerDisplay);

    const scoreDisplay = document.createElement("p");
    scoreDisplay.textContent = `Your total coins: ${totalScore}00`;
    gameOverElement.appendChild(scoreDisplay);

    const friendlyMessage = document.createElement("p");
    friendlyMessage.textContent = "Come again soon to try and be a billionaire!";
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

async function displayRandomQuestion(questionIndex, stageId) {
    var selectedQuestion;
    // Get the question from server
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            selectedQuestion = data['result'];
        } else {
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../../authentication/authenticate.php", false);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'get_cyber_question',
        "index": questionIndex,
        "stageId": stageId
    }));

    const questionTextElement = document.getElementById('question');
    const answerOptionsElement = document.getElementById('options');
    const scoreDisplayElement = document.getElementById('score');

    questionTextElement.textContent = selectedQuestion.question;

    scoreDisplayElement.textContent = totalCorrectAnswers > 0
        ? "Coins: " + totalCorrectAnswers + "00"
        : "Coins: 0";
    
    answerOptionsElement.innerHTML = '';
    shuffleOptions(selectedQuestion.options);
    selectedQuestion.options.forEach(function(answerOption) {
        const optionButtonElement = document.createElement('button');
        optionButtonElement.textContent = answerOption;
        optionButtonElement.onclick = function() {
            if (answerOption === selectedQuestion.correct_answer) {
                totalCorrectAnswers++;
                scoreDisplayElement.textContent = totalCorrectAnswers > 0
                    ? "Coins: " + totalCorrectAnswers + "00"
                    : "Coins: 0";

                if (answeredQuestions.length == 19) {
                    showCongratsScreen(totalCorrectAnswers);
                } else {
                    answeredQuestions.push(questionIndex);
                    var randomIndex = questionIndex;
    
                    while (answeredQuestions.includes(randomIndex)) {
                        randomIndex = Math.floor(Math.random() * 20);
                    };
    
                    displayRandomQuestion(randomIndex,stageId);
                }
            } else {           
                showGameOverScreen(selectedQuestion.correct_answer, totalCorrectAnswers, stageId);
            }
        };
        answerOptionsElement.appendChild(optionButtonElement);
    });
}
