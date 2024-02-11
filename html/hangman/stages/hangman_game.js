document.addEventListener("DOMContentLoaded", function() {
    const word = "algorithm".toUpperCase(); 
    let displayedWord = Array.from(word, () => '_'); 
    updateDisplay(); 

    document.querySelectorAll('.key').forEach(function(key) {
        key.addEventListener('click', function() {
            const letter = this.textContent.toUpperCase(); 
            console.log("Clicked letter:", letter); 
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
                displayedWord[index] = letter; // Replace underscore with the letter
            }
        });
        updateDisplay(); // Update the display with the new state
        console.log(letter + " is correct"); 
        // Implement functionality for correct letter here
    }

    function isWrongLetter(letter) {
        console.log(letter + " is incorrect"); 
        // Implement functionality for incorrect letter here
    }

    function updateDisplay() {
        // Join the elements of displayedWord array to form a string and update the textContent of word-display
        document.getElementById('word-display').textContent = displayedWord.join(' ');
    }
});
