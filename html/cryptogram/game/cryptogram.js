document.addEventListener('DOMContentLoaded', function() {
    const currentPrompt = initializeCryptogram();
    var currentHintIndex = -1;

    window.showHint = function() {
        var hintMessage = "";
        var hintIndex = currentHintIndex;
    
        const hints = currentPrompt.hints;

        // Don't show the same hint twice in a row
        while (hints.length > 0 && hintIndex == currentHintIndex) {
            hintIndex = Math.floor(Math.random() * hints.length);
        }

        hintMessage = hints[hintIndex];
        currentHintIndex = hintIndex;

        const speechBubble = document.querySelector('.speech-bubble');
        if (speechBubble) {
            speechBubble.textContent = hintMessage;
            speechBubble.style.display = 'block'; 
        }
    
        speechBubble.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    };
});

function initializeCryptogram() {
    var prompt = {};
    
    //access url params
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const secret = urlParams.get('secret');

    if (secret == 'true') {
        prompt = {
            message: "An investment banker involved in various unethical"
                + " and illegal activities who abuses his money and power to avoid"
                + " all forms of legal repercussions. That being said, his charges"
                + " mainly include manipulating the market, embezzlement of funds,"
                + " bribery, loan sharking, and various other forms of bank or market"
                + " financial schemes.",
            hints: [
                "Misconduct in high finance.",
                "Illegal trading and corruption.",
                "Misdeeds in money management.",
                "The unethical side of Wall Street.",
                "Wrongdoings in investment operations."
            ]
        }
    } else {
        const prompts=[
            {
                message: "According to all known laws of aviation, there is no way a bee should be able to fly."
                    + " Its wings are too small to get its fat little body off the ground. The bee, of course,"
                    + " flies anyway: because bees don't care what humans think is impossible...",
                hints: [
                    "Iconic movie opening.",
                    "Defies laws of physics.",
                    "Do you like jazz?"
                ]
            },
            {
                message: "No, you clearly don't know who you're talking to, so let me clue you in."
                    + " I am not in danger, Skyler. I am the danger!"
                    + " A guy opens his door and gets shot and you think that of me?"
                    + " No. I am the one who knocks!",
                hints: [
                    "An iconic TV show scene.",
                    "Breaking what?",
                    "Knock knock..."
                ]
            },
            {
                message: "Now, this is a story all about how, my life got flipped, turned upside down,"
                    + " and I'd like to take a minute, just sit right there, I'll tell you how I became"
                    + " the prince of a town called Bel-Air.",
                hints: [
                    "A '90s sitcom intro.",
                    "A prince most fresh.",
                    "Sit down, hear a story."
                ]
            },
            {
                message: "I see a little silhouetto of a man"
                    + " Scaramouche, Scaramouche, will you do the Fandango?"
                    + " Thunderbolt and lightning, very, very frightening me!",
                hints: [
                    "A classic rhapsody.",
                    "A person's outline.",
                    "Dramatic weather."
                ]
            },
            {
                message: "Just a small town girl"
                    + " Livin' in a lonely world"
                    + " She took the midnight train going anywhere..."
                    + " Just a city boy"
                    + " Born and raised in South Detroit"
                    + " He took the midnight train going anywhere...",
                hints: [
                    "A classic rock anthem.",
                    "Late-night travel.",
                    "Lonely girl, tiny town."
                ]
            },
            {
                message: "To be, or not to be, that is the question:"
                    + " Whether 'tis nobler in the mind to suffer"
                    + ' The slings and arrows of outrageous fortune,'
                    + " Or to take arms against a sea of troubles"
                    + " And by opposing end them.",
                hints: [
                    "A famous soliloquy.",
                    "Existential dilemma.",
                    "Hold up a skull."
                ]
            },
            {
                message: "O Romeo, Romeo, wherefore art thou Romeo?"
                    + " Deny thy father and refuse thy name,"
                    + " Or, if thou wilt not, be but sworn my love,"
                    + " And I'll no longer be a Capulet.",
                hints: [
                    "A plea on the balcony.",
                    "Star-crossed lovers.",
                    "Defies family names."
                ]
            },
            {
                message: "Twinkle, twinkle, little star,"
                    + " How I wonder what you are!"
                    + " Up above the world so high,"
                    + " Like a diamond in the sky.",
                hints: [
                    "A nursery rhyme.",
                    "Skyward lullaby.",
                    "Like jewels."
                ]
            },
            {
                message: "Mary had a little lamb,"
                    + " Its fleece was white as snow."
                    + " And everywhere that Mary went,"
                    + " The lamb was sure to go."
                    + " He followed her to school one day,"
                    + " That was against the rule."
                    + " It made the children laugh and play"
                    + " To see a lamb at school.",
                hints: [
                    "A nursery rhyme.",
                    "Faithful, fluffy pet.",
                    "Constant companion."
                ]
            },
            {
                message: "Three blind mice, three blind mice"
                    + " See how they run, see how they run"
                    + " They all ran after the farmer's wife"
                    + " She cut off their tails with a carving knife"
                    + " Did you ever see such a sight in your life as three blind mice?",
                hints: [
                    "A nursery rhyme.",
                    "Visual impairment.",
                    "Considered pests by many."
                ]
            },
            {
                message: "Peter Piper picked a peck of pickled peppers."
                    + " A peck of pickled peppers Peter Piper picked."
                    + " If Peter Piper picked a peck of pickled peppers,"
                    + " Where's the peck of pickled peppers Peter Piper picked?",
                hints: [
                    "A tongue twister.",
                    "Heavy alliteration.",
                    "Pickled produce."
                ]
            },
            {
                message: "The quick brown fox jumps over the lazy dog.",
                hints: [
                    "All letters.",
                    "Tests keyboards.",
                    "Features two canines."
                ]
            }
        ];
        
        var promptIndex = Math.floor(Math.random() * prompts.length);
        prompt = prompts[promptIndex];
    }
    
    const letterMapping = createLetterMapping();

    generateCryptogram(prompt.message, letterMapping);
    setupInputHandlers();

    // Add an event listener to the submit button
    document.getElementById('submitCryptogram').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        checkAllBoxesFilled(prompt.message);
    });
    
    return prompt;
}

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
        document.getElementById('popup-container').style.display = 'block';
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
            highlightDuplicates(inputs, allInputs);
        });
    });
}

function highlightDuplicates(inputs) {
    const guesses = new Map();

    inputs.forEach(input => {
        const container = input.closest('.letter-container');
        const encryptedChar = container.dataset.encrypted;
        const inputValue = input.value;

        if (inputValue && inputValue != '?') {
            const encryptedChars = guesses.get(inputValue) || new Set();
            encryptedChars.add(encryptedChar);
            guesses.set(inputValue, encryptedChars);

            input.style.color = 'black';

            if (encryptedChars.size > 1) {
                inputs.forEach(input => {
                    if (input.value === inputValue) {
                        input.style.color = 'red';
                    }
                });
            }
        }
    })
}

function highlightEmpty(inputs) {
    inputs.forEach(input => {
        if (!input.value) {
            input.value = '?';
            input.style.color = 'red';
        }
    })
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
        // Show the custom popup + highlight empty boxes
        highlightEmpty(inputs);
        document.getElementById('popup-container').style.display = 'block';
    }
} 

/**
 * Function to show the game over page
 */
function gameover() {
    document.querySelector(".game-over-screen").classList.add("active");
    document.querySelector(".game-content").classList.add("blur");
}

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




