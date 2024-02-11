document.addEventListener("DOMContentLoaded", function() {
    const word = "algorithm".toLowerCase(); // Ensure the word is in lowercase for consistent comparison
    document.querySelectorAll('.key').forEach(function(key) {
        key.addEventListener('click', function() {
            const letter = this.textContent.toLowerCase(); // Ensure clicked letter is in lowercase
            console.log("Clicked letter:", letter); // Debugging line
            if (word.includes(letter)) {
                this.classList.add('correct');
                isCorrectLetter(letter); // Call isCorrectLetter function
            } else {
                this.classList.add('incorrect');
                isWrongLetter(letter); // Call isWrongLetter function
            }
            this.disabled = true; // Prevent further clicks on this key
        });
    });
});

function isCorrectLetter(letter) {
    console.log(letter + " is correct"); // Implement functionality for correct letter here
}

function isWrongLetter(letter) {
    console.log(letter + " is incorrect"); // Implement functionality for incorrect letter here
}
