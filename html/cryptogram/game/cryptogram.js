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
                return letterMapping[char] || char;
            } else {
                return char;
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
                    return `<div class="non-letter-container">${char}</div>`;
                }
            }).join('');

            return `<div class="word">${letterContainers}</div>`;
        }).join('');

        cryptogramContainer.innerHTML = wordsHTML;
    }

    function checkSolution() {
        const inputString = Array.from(document.querySelectorAll('#cryptogram input')).map(input => input.value.toUpperCase()).join('');
        const originalString = sentence.toUpperCase().replace(/[^A-Z]/g, '');

        if (inputString === originalString) {
            window.location.href = '../congrats/congrats_page.php';
        } else {
            document.getElementById('popupContainer').style.display = 'block';
        }
    }

    document.getElementById('submitCryptogram').addEventListener('click', function(event) {
        event.preventDefault();
        checkSolution();
    });

    function setupInputHandlers() {
        const inputs = cryptogramContainer.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const container = this.closest('.letter-container');
                const encryptedChar = container.dataset.encrypted;
                const guess = this.value.toUpperCase();
                const allInputs = cryptogramContainer.querySelectorAll(`.letter-container[data-encrypted="${encryptedChar}"] input`);
                allInputs.forEach(input => input.value = guess);
            });
        });
    }
    
    const letterMapping = createLetterMapping();
    generateCryptogram(sentence, letterMapping);
    setupInputHandlers();

    document.getElementById('submitCryptogram').addEventListener('click', function(event) {
        event.preventDefault();
        checkAllBoxesFilled();
    });

    function checkAllBoxesFilled() {
        const inputs = document.querySelectorAll('#cryptogram input');
        const allFilled = Array.from(inputs).every(input => input.value.trim() !== '');
    
        if (allFilled) {
            window.location.href = '../congrats/congrats_page.php';
        } else {
            document.getElementById('popupContainer').style.display = 'block';
        }
    }    
});

window.showHint = function(stage) {
    var hints = [
        "Misconduct in high finance",
        "Illegal trading and corruption",
        "Misdeeds in money management",
        "The unethical side of Wall Street",
        "Wrongdoings in investment operations"
    ];
    var hintMessage = hints[Math.floor(Math.random() * hints.length)];
    
    const speechBubble = document.querySelector('.speech-bubble');
    if (speechBubble) {
        speechBubble.textContent = hintMessage;
        speechBubble.style.display = 'block'; 
    }

    speechBubble.addEventListener('click', function(event) {
        event.stopPropagation();
    });
};

document.addEventListener('click', function() {
    const speechBubble = document.querySelector('.speech-bubble');
    if (speechBubble && speechBubble.style.display === 'block') {
        speechBubble.style.display = 'none';
    }
});

document.querySelector('.hint-button').addEventListener('click', function(event) {
    event.stopPropagation();
});


