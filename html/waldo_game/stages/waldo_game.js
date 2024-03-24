import hintsJS from '../../hidden_words/hints.js';

let isZoomed = false;
let score = 10; // Initialize score
let isSpeechBubbleVisible = false;

const buttonPositions = [
    { top: '70%', left: '27%' },
    { top: '70%', left: '1%' },
    { top: '70%', left: '55%' },
    { top: '70%', left: '62%' },
    { top: '90%', left: '63%' },
    { top: '70%', left: '68%' },
    { top: '90%', left: '75%' },
    { top: '90%', left: '85%' },
    { top: '90%', left: '90%' },
    { top: '90%', left: '40%' }
];

function setButtonPosition() {
    const randomPosition = buttonPositions[Math.floor(Math.random() * buttonPositions.length)];
    const button = document.querySelector('.found-button-random');
    button.style.top = randomPosition.top;
    button.style.left = randomPosition.left;
    button.addEventListener('click', isFound);
}

const dragonButtonPositions = [
    { top: '60%', left: '26.2%' },
    { top: '60%', left: '20%' },
    { top: '60%', left: '35%' },
    { top: '60%', left: '51%' },
    { top: '60%', left: '60%' },
    { top: '42%', left: '62%' },
    { top: '60%', left: '62%' },
    { top: '70%', left: '62%' },
    { top: '70%', left: '80%' },
    { top: '80%', left: '80%' },
    { top: '80%', left: '85%' },
    { top: '80%', left: '20%' },
    { top: '80%', left: '17%' },   
];


function setDragonButtonPosition() {

    const randomPosition = dragonButtonPositions[Math.floor(Math.random() * dragonButtonPositions.length)];
    const dragonButton = document.querySelector('.found-button-dragon');

    dragonButton.style.top = randomPosition.top;
    dragonButton.style.left = randomPosition.left;

    dragonButton.addEventListener('click', isFound);
}
document.addEventListener('DOMContentLoaded', () => {
    setDragonButtonPosition();
});
const girlButtonPositions = [
    { top: '45%', left: '11%' },
    { top: '51%', left: '11%' },
    { top: '51%', left: '12.5%' },
    { top: '51%', left: '30%' },
    { top: '52%', left: '28%' },
    { top: '25%', left: '60%' },
    { top: '70%', left: '40%' },
    { top: '38%', left: '59%' },
    { top: '38%', left: '62.5%' },
    { top: '45%', left: '76.5%' },
];


function setGirlButtonPosition() {

    const randomPosition = girlButtonPositions[Math.floor(Math.random() * girlButtonPositions.length)];
    const girlButton = document.querySelector('.found-button-girl');
    girlButton.style.top = randomPosition.top;
    girlButton.style.left = randomPosition.left;
    girlButton.addEventListener('click', isFound);
}
document.addEventListener('DOMContentLoaded', () => {
    setGirlButtonPosition();
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".fullscreen-toggle").forEach(button => {
        button.addEventListener("click", () => {
            const element = button.closest(".image-container");
            toggleFullScreen(element);
        });
    });

    document.querySelectorAll(".fullscreen-toggle2").forEach(button => {
        button.addEventListener("click", () => {
            const element = button.closest(".image-container");
            toggleFullScreen(element);
        });
    });
    
    const el = document.querySelector(".your-fullscreen-button");
    if (el) {
        el.addEventListener("click", () => {
            const element = document.querySelector(".image-container");
            toggleFullScreen(element);
        });
    }

    setButtonPosition();
    setDragonButtonPosition();
    setGirlButtonPosition();
});


document.addEventListener('DOMContentLoaded', function() {
    let clickTimer = null;
    const imageContainer = document.querySelector('.image-container');

    imageContainer.addEventListener('click', function(event) {
        // Prevent triggering on button clicks inside the container
        if (event.target.tagName !== 'BUTTON') {
            if (clickTimer == null) {
                clickTimer = setTimeout(function() {
                    clickTimer = null;
                    notFound(event);
                }, 300); // Wait for 300ms to check for double click
            } else {
                clearTimeout(clickTimer);
                clickTimer = null;
            }
        }
    });

    imageContainer.addEventListener('dblclick', function(event) {
        if (event.target.tagName !== 'BUTTON') {
            zoomIn(event);
        }
    });

    document.querySelectorAll('.found-button-1, .found-button-2, .found-button-3').forEach(button => {
        button.addEventListener('click', function(event) {
            isFound(event);
        });
    });
});

function zoomIn(event) {
    
    const imageContainer = document.querySelector(".image-container");
    const image = document.querySelector(".image-container img");

    if (!isZoomed) {
        const clickX = event.offsetX;
        const clickY = event.offsetY;

        // Clamp the coordinates to ensure they stay within the image dimensions
        const clampedX = Math.max(0, Math.min(clickX, image.width));
        const clampedY = Math.max(0, Math.min(clickY, image.height));

        // Calculate the percentage position of the click within the image
        const offsetXPercentage = (clampedX / image.width) * 100;
        const offsetYPercentage = (clampedY / image.height) * 100;

        // Set the transform origin to the clamped clicked location
        image.style.transformOrigin = `${offsetXPercentage}% ${offsetYPercentage}%`;
    }

    imageContainer.classList.toggle("zoomed", !isZoomed);
    isZoomed = !isZoomed;
}


function notFound(event) {
    // Prevent the score from decreasing if the found button is clicked
    if (event.target.className.includes('found-button')) {
        event.stopPropagation();
        return;
    }

    // Decrease score and update scoreboard
    score--;
    updateScoreboard();

    
    // Check if score has reached 0 and call isFound if it has
    if (score <= 0) {
        isFound();
        score++;
    }
}

function isFound(event) {
    if (event) event.stopPropagation();

    var screen = document.querySelector(".game-over-screen");
    var imageContainer = document.querySelector(".image-container");

    var hints = hintsJS.hints;
    var hintChance = Math.floor(Math.random() * 10) + 1;

    if (hintChance === 2) {
        var hintIndex = Math.floor(Math.random() * hints.length);
        let gameOverScrn = document.querySelector(".game-over-screen h1");
        gameOverScrn.innerHTML += "<br><i>" + hints[hintIndex] + "</i>";
    }

    screen.style.display = "block";
    imageContainer.classList.add("blur");
}


// Update scoreboard display
function updateScoreboard() {
    document.querySelector(".score").innerText = score;
}

function toggleFullScreen(element) {
    if (!document.fullscreenElement) {
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
window.showHint = function(level) {
    var hintMessage = 'Sample hint message';
    switch (level) {
        case 'lion':
                hintMessage = 'The giraffe is amazing';
            break;
        case 'Dragon':
                hintMessage = 'Something is visible around the castle';
            break;
        case 'Girl':
                hintMessage = 'What can you see though the windows?';
            break;
        default:
            break;
    }
    const speechBubble = document.querySelector('.speech-bubble');
    if (speechBubble) {
        speechBubble.textContent = hintMessage;
        speechBubble.style.display = 'block';
        isSpeechBubbleVisible = true;
    }
};

document.addEventListener('click', function(e) {
    const speechBubble = document.querySelector('.speech-bubble');
    if (isSpeechBubbleVisible && !e.target.classList.contains('hint-button')) {
        speechBubble.style.display = 'none';
        isSpeechBubbleVisible = false;
    }
});
// Export the functions
module.exports = {
    zoomIn,
    notFound,
    isFound,
    updateScoreboard
};