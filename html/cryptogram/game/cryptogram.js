document.addEventListener('DOMContentLoaded', function() {
    const sentence = `An investment banker involved in various unethical and illegal activities who abuses his money and power to avoid all forms of legal repercussions. That being said, his charges mainly include manipulating the market, embezzlement of funds, bribery, loan sharking, and various other forms of bank or market financial schemes.`;

    const cryptogramContainer = document.getElementById('cryptogram');

    function createLetterMapping() {
        const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');
        const shuffledAlphabet = [...alphabet].sort(() => 0.5 - Math.random());

        const letterMapping = {};
        alphabet.forEach((letter, index) => {
            letterMapping[letter] = shuffledAlphabet[index];
        });

        return letterMapping;
    }

    function generateCryptogram(sentence, letterMapping) {
        const encryptedSentence = sentence.toUpperCase().split('').map(char => {
            if (/[A-Z]/.test(char)) {
                return letterMapping[char] || char; // Apply mapping or keep original character
            } else {
                return char; // Keep non-alphabetic characters as they are
            }
        }).join('');

        const words = encryptedSentence.split(' ');
        const wordsHTML = words.map(word => {
            const letterContainers = word.split('').map(char => {
                if (/[A-Z]/.test(char)) {
                    return `
                        <div class="letter-container" data-encrypted="${char}">
                            <div class="block">${char}</div>
                            <div class="input-block"><input type="text" maxlength="1"></div>
                        </div>
                    `;
                } else {
                    return `<div class="non-letter-container">${char}</div>`; // Non-letter characters are directly displayed
                }
            }).join('');

            return `<div class="word">${letterContainers}</div>`;
        }).join('');

        cryptogramContainer.innerHTML = wordsHTML;
    }

    function checkSolution() {
        // Convert inputs to a single string, removing non-letter characters and ignoring case
        const inputString = Array.from(document.querySelectorAll('#cryptogram input')).map(input => input.value.toUpperCase()).join('');
        const originalString = sentence.toUpperCase().replace(/[^A-Z]/g, '');

        // Check if the input matches the original sentence
        if (inputString === originalString) {
            // Redirect to the congrats page
            window.location.href = '../congrats/congrats_page.php';
        } else {
            // Display the popup container for incorrect guess
            document.getElementById('popupContainer').style.display = 'block';
        }
    }

    document.getElementById('submitCryptogram').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        checkSolution();
    });

    function setupInputHandlers() {
        const inputs = cryptogramContainer.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const container = this.closest('.letter-container');
                const encryptedChar = container.dataset.encrypted;
                const guess = this.value.toUpperCase();
                // Update all inputs with the same encryptedChar regardless of correctness
                const allInputs = cryptogramContainer.querySelectorAll(`.letter-container[data-encrypted="${encryptedChar}"] input`);
                allInputs.forEach(input => input.value = guess);
            });
        });
    }
    
    const letterMapping = createLetterMapping();
    generateCryptogram(sentence, letterMapping);
    setupInputHandlers();

    // Add an event listener to the submit button
    document.getElementById('submitCryptogram').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        checkAllBoxesFilled();
    });

    function checkAllBoxesFilled() {
        const inputs = document.querySelectorAll('#cryptogram input');
        const allFilled = Array.from(inputs).every(input => input.value.trim() !== '');
    
        if (allFilled) {
            // Redirect to the congrats page
            window.location.href = '../congrats/congrats_page.php';
        } else {
            // Show the custom popup
            document.getElementById('popupContainer').style.display = 'block';
        }
    }    
});
