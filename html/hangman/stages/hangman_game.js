document.addEventListener("DOMContentLoaded", function() {
    const word = "algorithm".toUpperCase();
    let displayedWord = Array.from(word, () => '_');
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
