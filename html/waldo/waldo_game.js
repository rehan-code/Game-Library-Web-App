let isZoomed = false;

function zoomIn(event) {
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

function isFound() {
  var screen = document.getElementById("gameOverScreen");
  var image = document.querySelector(".image-container img");
  // Make image visible
  screen.style.display = "block";
  // blur background image
  image.classList.add("blur");
}