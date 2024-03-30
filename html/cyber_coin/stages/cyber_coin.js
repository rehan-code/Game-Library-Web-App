var totalCorrectAnswers = 0;
const answeredQuestions = [];
var timeLeft = 30; 

function shuffleOptions(optionsArray) {
    for (let i = optionsArray.length - 1; i > 0; i--) {
        const randomIndex = Math.floor(Math.random() * (i + 1));
        [optionsArray[i], optionsArray[randomIndex]] = [optionsArray[randomIndex], optionsArray[i]]; // Swap elements
    }
}

/**
 * Gets the leaderboard fata from server
 * @return array of data
 */
async function getLeaderBoardData() {
    var leaderboard = [];
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            leaderboard = data['result'];
        } else {
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../../authentication/authenticate.php", false);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'get_cyber_leaderboard',
    }));
    return leaderboard;
}

/**
 * Gets the leaderboard fata from server
 * @return array of data
 */
async function addUserToLeaderboard(name, points) {
    var success;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            success = data['result'];
            if (success == false) {
                alert("failed to add to leaderboard")
            }
        } else {
            success = false;
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../../authentication/authenticate.php", false);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'add_user_to_cyber_leaderboard',
        "name": name,
        "points": points,
    }));
    console.log(success);
    return success;
}

async function addTable(){
    const tableContainer = document.getElementById("leaderboard-section");

    // make a server request to get leader data.
    const leaderboardData = await getLeaderBoardData();
    
    // Add Leaderboard Title
    const leaderboardTitle = document.createElement("h2");
    leaderboardTitle.textContent = "Leaderboard";
    leaderboardTitle.style.color = "white";
    leaderboardTitle.style.paddingTop = "20px";

    const leaderboardTable = document.createElement("table");
    leaderboardTable.style.color = "white";
    leaderboardTable.style.borderCollapse = "collapse";
    leaderboardTable.style.border = "2px solid white"; // White border
    leaderboardTable.style.borderSpacing = "2px"; // Inner border spacing
    leaderboardTable.style.borderRadius = "5px"; // Border radius
    leaderboardTable.style.margin = "auto"; // Center-align the table
    
    const tableHeader = document.createElement("tr");
    const nameHeader = document.createElement("th");
    nameHeader.textContent = "Name";
    nameHeader.style.paddingRight = "20px"; // Add space between Name and Points
    const pointsHeader = document.createElement("th");
    pointsHeader.textContent = "Points";
    tableHeader.appendChild(nameHeader);
    tableHeader.appendChild(pointsHeader);
    leaderboardTable.appendChild(tableHeader);

    leaderboardData.forEach(entry => {
        const row = document.createElement("tr");
        const nameCell = document.createElement("td");
        nameCell.textContent = entry.name;
        const pointsCell = document.createElement("td");
        pointsCell.textContent = entry.points;
        nameCell.style.paddingRight = "20px";
        row.appendChild(nameCell);
        row.appendChild(pointsCell);
        leaderboardTable.appendChild(row);
    });
    
    tableContainer.appendChild(leaderboardTitle);
    tableContainer.appendChild(leaderboardTable);
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

    // add leaderboard table
    // Create a div to wrap the table
    const tableContainer = document.createElement("div");
    tableContainer.id = "leaderboard-section"
    tableContainer.style.paddingBottom = "20px"; // Add padding to the div
    tableContainer.style.display = "block"; // Display as block to put it on a separate line
    tableContainer.style.justifyContent = "center";
    gameOverElement.appendChild(tableContainer);
    addTable();

    // Create a div to encapsulate the elements for entering the user's name
    const enterNameDiv = document.createElement("div");
    enterNameDiv.id = "add-name-leaderboard"
    enterNameDiv.style.paddingBottom = "20px"; // Add bottom padding

    // Ask user to enter their name for the leaderboard
    const enterNameLabel = document.createElement("label");
    enterNameLabel.textContent = "Enter your name to add to the leaderboard:";
    enterNameLabel.style.color = "white";
    enterNameDiv.appendChild(enterNameLabel);

    const nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.placeholder = "Your Name";
    enterNameDiv.appendChild(nameInput);

    const submitButton = document.createElement("button");
    submitButton.textContent = "Submit";
    submitButton.onclick = function() {
        const userName = nameInput.value;
        console.log(userName); // Log the entered name
        // Add logic to handle submitting the name to the leaderboard
        addUserToLeaderboard(userName, totalScore*100);

        //remove and readd the leaderboard section
        var leaderboard = document.getElementById("leaderboard-section");
        leaderboard.innerHTML = "";
        addTable();

        //remove the add name section
        const nameSection = document.getElementById("add-name-leaderboard");
        nameSection.remove();
    };
    enterNameDiv.appendChild(submitButton);

    // Append the enterNameDiv to the gameOverElement
    gameOverElement.appendChild(enterNameDiv);

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
    optionsContainer.style.padding = "20px";
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
        ? totalCorrectAnswers + "00"
        : "0";
    
    answerOptionsElement.innerHTML = '';
    shuffleOptions(selectedQuestion.options);
    selectedQuestion.options.forEach(function(answerOption) {
        const optionButtonElement = document.createElement('button');
        optionButtonElement.textContent = answerOption;
        optionButtonElement.classList.add('custom-button');
        optionButtonElement.onclick = async function() {
            // request to server to check the right answer
            result = false;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = async function() {
                var data = JSON.parse(this.responseText);
                if (data['error'] == null) {
                    if (data["result"] == true) { // if asnwer is correct
                        totalCorrectAnswers++;

                        scoreDisplayElement.textContent = totalCorrectAnswers > 0
                            ? totalCorrectAnswers + "00"
                            : "0";

                        if (answeredQuestions.length == 39) {
                            showCongratsScreen(totalCorrectAnswers);
                        } else {
                            answeredQuestions.push(questionIndex);
                            var randomIndex = questionIndex;
            
                            while (answeredQuestions.includes(randomIndex)) {
                                randomIndex = Math.floor(Math.random() * 40);
                            };
            
                            displayRandomQuestion(randomIndex,stageId);
                            timeLeft = 30;
                        }
                    } else {
                        showGameOverScreen(selectedQuestion.correct_answer, totalCorrectAnswers, stageId);
                    }
                } else {
                    alert(data['error']);
                }
            };
            xhttp.open("POST", "../../authentication/authenticate.php", false);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.send(JSON.stringify({
                "functionname": 'check_cyber_answer',
                "answer": answerOption,
                "index": questionIndex,
                "stageId": stageId
            }));
        };
        answerOptionsElement.appendChild(optionButtonElement);
    });
}

async function updateTimer(stageId){
    var timerElement = document.getElementById('timer');
    var interval = setInterval(function() {
        if (timeLeft <= 0) {
            clearInterval(interval);
            timerElement.innerHTML = 'Done!';
            showGameOverScreen(selectedQuestion.correct_answer, totalCorrectAnswers, stageId);

        } else {
            timeLeft--;
            timerElement.innerHTML = timeLeft + 's';
        }
    }, 1000); // every second
}