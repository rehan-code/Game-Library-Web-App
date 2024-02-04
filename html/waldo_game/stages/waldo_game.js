let isZoomed = false;
let score = 10; // Initialize score

document.addEventListener("DOMContentLoaded", () => {
  document.querySelector(".fullscreen-toggle").addEventListener("click", () => {
    const element = document.querySelector(".image-container");
    toggleFullScreen(element);
  });
});

function toggleFullScreen(element) {}
function zoomIn(event) {
  score++;
  score++;
  updateScoreboard();

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
  if (event.target.className.includes("found-button")) {
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
  if (event) event.stopPropagation();
  var screen = document.querySelector(".game-over-screen");
  var image = document.querySelector(".image-container img");

  screen.style.display = "block";
  image.classList.add("blur");
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
document
  .querySelector(".your-fullscreen-button")
  .addEventListener("click", () => {
    const element = document.querySelector(".image-container");
    toggleFullScreen(element);
  });
