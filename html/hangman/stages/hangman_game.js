document.addEventListener("DOMContentLoaded", function() {
    const word = "algorithm".toUpperCase();
    let lives = 0;
    let displayedWord = Array.from(word, () => '_');
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
        
        // if word is complete display game over
        if (!displayedWord.includes('_')) {
            document.querySelector(".game-over-screen h1").innerHTML = "Congratulations! </br> You're a Winner!"
            gameover();
        }
    }

    /**
     * updates the hangman figure
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
     * function to show the game over page
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
