let score = 0;
var rows = 3;
var columns = 3;

var currTile;
var otherTile; //blank tile

var turns = 0;

const currentScript = document.querySelector('script[src="mosaic.js"]');
var imageOrder = getImageOrder(currentScript.getAttribute('difficulty'));
// var imageOrder = ["1", "2", "6", "4", "5", "3", "7", "8", "9"];
// var imageOrder = ["4", "2", "8", "5", "1", "6", "7", "9", "3"];

// sets the images and event listeners for each image
window.onload = function() {
   for (let r = 0; r < rows; r++) {
      for (let c = 0; c < columns; c++) {
            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = "../../images/mosaic/stage1/"+ imageOrder.shift() + ".jpg";
            tile.addEventListener("click", tileClicked);
            document.getElementById("board").append(tile);
      }
   }
}

/**
 * Function to handle tile clicks
 * @param event - The DOM event triggered by clicking a tile.
 * @return 
 */
function tileClicked() {
   let clickedTile = this; // 'this' refers to the img tile that was clicked
   let emptyTile = document.querySelector('img[src$="blank.jpg"]');
   if (isAdjacent(clickedTile, emptyTile)) {
       slideTile(clickedTile, emptyTile);
   }
}

/**
 * Function to check if two tiles are adjacent
 * @param tile1 - The first tile element to check.
 * @param tile2 - The second tile element to check.
 * @returns Boolean - Returns true if the tiles are adjacent, or else false.
 */
function isAdjacent(tile1, tile2) {
   let coords1 = tile1.id.split("-");
   let coords2 = tile2.id.split("-");
   let distance = Math.abs(coords1[0] - coords2[0]) + Math.abs(coords1[1] - coords2[1]);
   return distance == 1; // They are adjacent if the distance is 1
}

/**
 * Function to slide a tile into the empty space
 * @param clickedTile - The tile that was clicked and is to be slid into the empty space.
 * @param emptyTile - The tile representing the empty space.
 * @return 
 */
function slideTile(clickedTile, emptyTile) {
   let clickedImg = clickedTile.getAttribute("src");
   let emptyImg = emptyTile.getAttribute("src");

   clickedTile.src = emptyImg;
   emptyTile.src = clickedImg;

   turns += 1;
   document.getElementById("turns").innerText = turns;

   if (checkGameOver()) {
      gameover();
   }
}

/**
 * Checks if the image array is in the correct order
 * @param imageOrder array containing the image order
 * @return true if it is in the correct order
 */
function checkGameOver(imageOrder) {
   var count = 1;
   for (let r=0; r < rows; r++) {
      for (let c=0; c < columns; c++) {
         //<img id="0-0" src="1.jpg">
         let tile = document.getElementById(r.toString() + "-" + c.toString());
         if (tile.getAttribute("src") != "../../images/mosaic/stage1/"+ count++ + ".jpg") {
            return false;
         }
      }
   }
   return true;
}

/**
 * Gets the Image from the server
 * @param {*} difficulty 
 * @returns the array of images based on the difficulty
 */
export function getImageOrder(difficulty) {
   let imageOrder;
   const xhttp = new XMLHttpRequest();
   xhttp.onload = function() {
      var data = JSON.parse(this.responseText);
      if (data['error'] == null) {
         imageOrder = data['result'];
      } else {
         alert(data['error']);
      }
   }
   xhttp.open("POST", "../../authentication/authenticate.php", false);
   xhttp.setRequestHeader("Content-type", "application/json");
   xhttp.send(JSON.stringify({
      "functionname": 'get_mosaic_order',
      "difficulty": difficulty,
   }));

   return imageOrder;
}

/**
 * Function to show the game over page
 */
export function gameover() {
   document.querySelector(".game-over-screen").classList.add("active");
   document.querySelector(".game-content").classList.add("blur");
}