document.addEventListener('DOMContentLoaded', function() {
    var sentence = '';
    
    //access url params
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const secret = urlParams.get('secret');

    if (secret == 'true') {
        sentence = `An investment banker involved in various unethical and illegal activities who abuses his money and power to avoid all forms of legal repercussions. That being said, his charges mainly include manipulating the market, embezzlement of funds, bribery, loan sharking, and various other forms of bank or market financial schemes.`;
    } else {
        const prompts=[
            `According to all known laws of aviation, there is no way a bee should be able to fly.
            Its wings are too small to get its fat little body off the ground. The bee, of course,
            flies anyway: because bees don't care what humans think is impossible...`,
            'The quick brown fox jumps over the lazy dog.',
            `There once was a boy named Evan. He lived with his parents in their house and played video games all day.
            One day there was this new game called Palworld. Evan was excited to play the game, but he sucked. The end`,
            `Now, this is a story all about how, my life got flipped, turned upside down,
            and I'd like to take a minute, just sit right there, I'll tell you how I became
            the prince of a town called Bel-Air.`,
            `To be, or not to be, that is the question:
            Whether 'tis nobler in the mind to suffer
            The slings and arrows of outrageous fortune,
            Or to take arms against a sea of troubles
            And by opposing end them. To die; to sleep,
            No more; and by a sleep to say we end
            The heart-ache and the thousand natural shocks
            That flesh is heir to: 'tis a consummation
            Devoutly to be wish'd. To die, to sleep...`
        ];
        
        var promptIndex = Math.floor(Math.random() * prompts.length);
        sentence = prompts[promptIndex];
    }
    
    const letterMapping = createLetterMapping();
    generateCryptogram(sentence, letterMapping);
    setupInputHandlers();

    // Add an event listener to the submit button
    document.getElementById('submitCryptogram').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        checkAllBoxesFilled(sentence);
    });
   
});

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

    const cryptogramContainer = document.getElementById('cryptogram');
    cryptogramContainer.innerHTML = wordsHTML;
}

function checkSolution(sentence) {
    // Convert inputs to a single string, removing non-letter characters and ignoring case
    const inputString = Array.from(document.querySelectorAll('#cryptogram input')).map(input => input.value.toUpperCase()).join('');
    const originalString = sentence.toUpperCase().replace(/[^A-Z]/g, '');

    // Check if the input matches the original sentence
    if (inputString === originalString) {
        // return true
        return true;
    } else {
        // Display the popup container for incorrect guess
        document.getElementById('popupContainer').style.display = 'block';
    }
    return false;
}

function setupInputHandlers() {
    const cryptogramContainer = document.getElementById('cryptogram');
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

function checkAllBoxesFilled(sentence) {
    //access url params
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const secret = urlParams.get('secret');
    const inputs = document.querySelectorAll('#cryptogram input');
    const allFilled = Array.from(inputs).every(input => input.value.trim() !== '');

    if (allFilled) {
        // if solution is correct
        if (checkSolution(sentence) == true) {
            if (secret == 'true') {
                window.location.href = '../congrats/congrats_page.php';
            } else {
                //implement game over screen here
                gameover();
            }
        }
    } else {
        // Show the custom popup
        document.getElementById('popupContainer').style.display = 'block';
    }
} 

/**
 * Function to show the game over page
 */
function gameover() {
    document.querySelector(".game-over-screen").classList.add("active");
    document.querySelector(".game-content").classList.add("blur");
}

window.showHint = function() {
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

const el = document.querySelector('.hint-button');

if (el){
    el.addEventListener('click', function(event) {
        event.stopPropagation();
    });
}




