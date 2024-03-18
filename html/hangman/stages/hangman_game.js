import wordsJSON from '../words.json' assert { type: 'json' };
import hintsJS from '../../hidden_words/hints.js';
import { getASCIIString, getCookie } from "../../hidden_words/hidden_words.js";

let currentScript;
let isSpeechBubbleVisible = false;
let word;
let lives = 0;
let displayedWord;

document.addEventListener("DOMContentLoaded", function() {
    currentScript = document.querySelector('script[src="hangman_game.js"]');
    const words = getWordPool(currentScript.getAttribute('difficulty'));
    const index = Math.floor(Math.random() * words.length);
    word = words[index].toUpperCase();

    displayedWord = Array.from(word, function(character) {
        if (character !== ' ') {
            return '_';
        } else {
            return '\u00A0\u00A0'; //whitespace
        }
    });

    updateDisplay();

    // add the actual word to game over screen
    let endScreen = document.querySelector(".game-over-screen h1")
    endScreen.innerHTML = endScreen.innerHTML + "</br> Answer: " + word;

    // Add an event listener for every key click
    document.querySelectorAll('.key').forEach(function(key) {
        key.addEventListener('click', function() {
            const letter = this.textContent.toUpperCase();
            
            if (word.includes(letter)) { // letter is correct
                this.classList.add('correct');
                isCorrectLetter(letter);
            } else { // letter is incorrect
                this.classList.add('incorrect');
                isWrongLetter(letter);
            }
            this.disabled = true; //disable letter clickability
        });
    });

    window.showHint = function(difficulty) {
        // traverse the dict according to difficulty level and retrieve hint message 
        var hintMessage = '';
        var words = [];
        switch (difficulty) {
            case 'easy':
                words = wordsJSON.easy_words;
                for (var key in words) {
                    if(key == word.toLowerCase()) {
                        hintMessage = words[key];
                    }
                }
                break;
            case 'medium':
                words = wordsJSON.medium_words;
                for (var key in words) {
                    if(key == word.toLowerCase()) {
                        hintMessage = words[key];
                    }
                }
                break;
            case 'hard':
                words = wordsJSON.hard_words;
                for (var key in words) {
                    if(key == word.toLowerCase()) {
                        hintMessage = words[key];
                    }
                }
                break;
            default:
                break;
        }
        const speechBubble = document.querySelector('.speech-bubble');
        if (speechBubble) {
            speechBubble.textContent = hintMessage;
            speechBubble.style.display = 'block';
            isSpeechBubbleVisible = true;
        }
    };

    document.addEventListener('click', function(e) {
        const speechBubble = document.querySelector('.speech-bubble');
        if (isSpeechBubbleVisible && !e.target.classList.contains('hint-button')) {
            speechBubble.style.display = 'none';
            isSpeechBubbleVisible = false;
        }
    });

    /**
     * Gets the word list from the json files
     * @param {*} difficulty 
     * @returns the array of words based on the difficulty
     */
    function getWordPool(difficulty) {
        var words = [];

        switch (difficulty) {
            case 'easy':
                words = Object.keys(wordsJSON.easy_words);
                break;
            case 'medium':
                words = Object.keys(wordsJSON.medium_words);
                break;
            case 'hard':
                words = Object.keys(wordsJSON.hard_words);
                break;
            default:
                break;
        }

        return words;
    }

    /**
     * Updates the correct letter on the displayed word
     * @param {*} letter 
     */
    function isCorrectLetter(letter) {
        word.split('').forEach((char, index) => {
            if (char === letter) {
                displayedWord[index] = letter;
            }
        });
        updateDisplay();
        
        // If word is complete then display game over
        if (!displayedWord.includes('_')) {
            let gameOverScrn = document.querySelector(".game-over-screen h1");
            gameOverScrn.innerHTML = "Congratulations! </br> You're a Winner! </br> "; 
            //for hard difficulty 
            if (currentScript.getAttribute("difficulty") == "hard") {
                // if its authenticated show a different output
                if (getCookie("authenticated") == "true") {
                    
                    gameOverScrn.appendChild(document.createRange().createContextualFragment(
                        `<p style='font-weight: normal;text-align: center;font-size: 20px; margin-left: 10%; margin-right: 10%;'>
                        <br>
                        <strong>The Secret Game</strong>
                        <br><br>
                        `
                    ));
                    gameOverScrn.appendChild(document.createRange().createContextualFragment(
                        `<p style='font-weight: normal;text-align: justify;font-size: 20px; margin-left: 10%; margin-right: 10%;'>
                        I have received a report from some sources of a giant hidden ${getASCIIString("labyrinth")} 
                        under construction by some philanthropist billionaire. Though his identity 
                        is uncertain, rumor has it that he loves puzzles and games, especially 
                        ones with high stakes on the line. My reports suggested that something 
                        seemed off in this individual's love for the high stakes; He seemed to 
                        love it to an unnatural degree.
                        <br><br>
                        I received another report of kidnappings employed by a person wearing a 
                        mask. Some of the people related to the kidnappees often mentioned that 
                        they received a phone call or other forms of messages regarding playing 
                        in a game. What types of games are meant here?
                        <br><br>
                        Although it's uncertain whether both these reports are linked; the detective 
                        in me tells me that they are in some way, shape, or form. There are no 
                        coincidences in this line of business.
                        `
                    ));
                } else {
                    setASCIIWord();
                }
            } else {
                var hints = hintsJS.hints;
                var hintChance = Math.floor(Math.random() * 10) + 1;

                if (hintChance <= 2) {
                    var hintIndex = Math.floor(Math.random() * hints.length);
                    gameOverScrn.innerHTML = gameOverScrn.innerHTML + "<br><i>" + hints[hintIndex] + '<i>';
                }
            }
            gameover();
        }
    }

    /**
     * Updates the hangman figure
     */
    function isWrongLetter() {
        lives++;
        var hangman = document.querySelector(".image-container img");
        lives < 10 ? hangman.src="../../images/hangman/hangman"+lives+".png" : null; // update hangman image
        lives == 1 ? hangman.style.display = "block" : null; // show hangman on first life lost
        if (lives == 9) {
            gameover();
        }
    } 

    /**
     * Function to show the game over page
     */
    function gameover() {
        document.querySelector(".game-over-screen").classList.add("active");
        document.querySelector(".game-content").classList.add("blur");
    }

    /**
     * Update the displayed letter/underscores on the screen
     */
    function updateDisplay() {
        document.getElementById('word-display').textContent = displayedWord.join(' ');
    }
    

    function setASCIIWord() {
        let gameOverScrn = document.querySelector(".game-over-screen h1");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(this.responseText)
            var data = JSON.parse(this.responseText);
            if (data['error'] == null) {
                gameOverScrn.innerHTML = gameOverScrn.innerHTML + getASCIIString(data["result"]);
            } else {
                alert(data['error']);
            }
        }
        xhttp.open("POST", "../../authentication/authenticate.php", true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(JSON.stringify({
            "functionname": 'decrypt',
            "word": getCookie('ascii')
        }));
    }
    
});

