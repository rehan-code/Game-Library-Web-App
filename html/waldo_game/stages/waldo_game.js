let isZoomed = false;
let score = 10; // Initialize score

document.addEventListener('DOMContentLoaded', (event) => {
    updateScoreboard(); // Initial scoreboard update
});

function zoomIn(event) {
    score++;
    score++;
    updateScoreboard();

    const imageContainer = document.querySelector(".image-container");
    const image = document.querySelector(".image-container img");

    if (!isZoomed) {
        // Get the coordinates of the click relative to the image container
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
    }
}

function isFound(event) {
    if (event) event.stopPropagation(); // Prevent triggering notFound when isFound is directly called
    var screen = document.querySelector(".game-over-screen");
    var image = document.querySelector(".image-container img");
    // Make image visible and blur background image
    screen.style.display = "block";
    image.classList.add("blur");
}

// Update scoreboard display
function updateScoreboard() {
    document.querySelector('.score').innerText = score;
}

// Export the functions
module.exports = {
    zoomIn,
    notFound,
    isFound,
    updateScoreboard
};
