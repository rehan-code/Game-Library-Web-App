import wordsJSON from '../words.json' assert { type: 'json' };

const easyWords = wordsJSON.easy_words;
const mediumWords = wordsJSON.medium_words;
const hardWords = wordsJSON.hard_words;

document.addEventListener("DOMContentLoaded", function() {

    const wordPool = hardWords;

    const index = Math.floor(Math.random() * wordPool.length);
    const word = wordPool[index].toUpperCase();

    let displayedWord = Array.from(word, function(character) {
        if (character !== ' ') {
            return '_';
        } else {
            return '\u00A0\u00A0'; //whitespace
        }
    });

    console.log(`DEBUG: Word = ${word}`);

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
