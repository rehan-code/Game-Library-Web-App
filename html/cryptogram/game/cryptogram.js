document.addEventListener('DOMContentLoaded', function() {
    const sentence = "This is a sample cryptogram puzzle. Edit below!";
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
            return letterMapping[char] || char; // Apply mapping or keep original character (for spaces, punctuation)
        }).join('');

        const words = encryptedSentence.split(' ');
        const wordsHTML = words.map(word => {
            const letterContainers = word.split('').map(char => {
                return `
                    <div class="letter-container" data-encrypted="${char}">
                        <div class="block">${char}</div>
                        <div class="input-block"><input type="text" maxlength="1"></div>
                    </div>
                `;
            }).join('');

            return `<div class="word">${letterContainers}</div>`;
        }).join('');

        cryptogramContainer.innerHTML = wordsHTML;
    }

    function setupInputHandlers(letterMapping) {
        const inputs = cryptogramContainer.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const container = this.closest('.letter-container');
                const encryptedChar = container.dataset.encrypted;
                const originalChar = Object.keys(letterMapping).find(key => letterMapping[key] === encryptedChar);
                const guess = this.value.toUpperCase();

                if (guess === originalChar) {
                    // Correct guess, update all inputs with the same encryptedChar
                    const allInputs = cryptogramContainer.querySelectorAll(`.letter-container[data-encrypted="${encryptedChar}"] input`);
                    allInputs.forEach(input => input.value = guess);
                    checkSolution(letterMapping);
                } else {
                    // Incorrect guess, clear this input
                    this.value = '';
                }
            });
        });
    }

    function checkSolution(letterMapping) {
        const inputs = cryptogramContainer.querySelectorAll('input');
        const decryptedMessage = Array.from(inputs).map(input => input.value.toUpperCase() || '?').join('');
        const originalMessage = sentence.toUpperCase().split('').map(char => letterMapping[char] || char).join('');

        if (decryptedMessage === originalMessage) {
            alert('Congratulations! You solved the cryptogram!');
        }
    }

    const letterMapping = createLetterMapping();
    generateCryptogram(sentence, letterMapping);
    setupInputHandlers(letterMapping);
});

