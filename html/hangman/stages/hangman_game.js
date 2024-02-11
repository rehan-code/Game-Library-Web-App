import wordsJSON from '../words.json' assert { type: 'json' };

const currentScript = document.querySelector('script[src="hangman_game.js"]')

document.addEventListener("DOMContentLoaded", function() {
    const words = getWordPool(currentScript.getAttribute('difficulty'));
    const index = Math.floor(Math.random() * words.length);
    const word = words[index].toUpperCase();

    let displayedWord = Array.from(word, function(character) {
        if (character !== ' ') {
            return '_';
        } else {
            return '\u00A0\u00A0'; //whitespace
        }
    });

    updateDisplay();

    document.querySelectorAll('.key').forEach(function(key) {
        key.addEventListener('click', function() {
            const letter = this.textContent.toUpperCase();
            if (word.includes(letter)) {
                this.classList.add('correct');
                isCorrectLetter(letter);
            } else {
                this.classList.add('incorrect');
                isWrongLetter(letter);
            }
            this.disabled = true;
        });
    });

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

    function isCorrectLetter(letter) {
        word.split('').forEach((char, index) => {
            if (char === letter) {
                displayedWord[index] = letter;
            }
        });
        updateDisplay();
    }

    function isWrongLetter(letter) {
        console.log(letter + " is incorrect");

        // Add functionality here
    }

    function updateDisplay() {
        document.getElementById('word-display').textContent = displayedWord.join(' ');
    }
});
