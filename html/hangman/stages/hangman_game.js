import wordsJSON from '../words.json' assert { type: 'json' };

const currentScript = document.querySelector('script[src="hangman_game.js"]')

document.addEventListener("DOMContentLoaded", function() {
    const words = getWordPool(currentScript.getAttribute('difficulty'));
    const index = Math.floor(Math.random() * words.length);
    const word = words[index].toUpperCase();

    let lives = 0;
    let displayedWord = Array.from(word, function(character) {
        if (character !== ' ') {
            return '_';
        } else {
            return '\u00A0\u00A0'; //whitespace
        }
    });

    updateDisplay();

    // Add a event listener for every key click
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

    /**
     * Gets the word list from the json files
     * @param {*} difficulty 
     * @returns the array of words based on the difficulty
     */
    function getWordPool(difficulty) {
        var words = [];

        switch (difficulty) {
            case 'easy':
                words = wordsJSON.easy_words;
                break;
            case 'medium':
                words = wordsJSON.medium_words;
                break;
            case 'hard':
                words = wordsJSON.hard_words;
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
            document.querySelector(".game-over-screen h1").innerHTML = "Congratulations! </br> You're a Winner!"
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
});
