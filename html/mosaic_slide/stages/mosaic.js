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
   for (let r=0; r < rows; r++) {
      for (let c=0; c < columns; c++) {

            //<img id="0-0" src="1.jpg">
            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = "../../images/mosaic/stage1/"+ imageOrder.shift() + ".jpg";

            //DRAG FUNCTIONALITY
            tile.addEventListener("dragstart", dragStart);  //click an image to drag
            tile.addEventListener("dragover", dragOver);    //moving image around while clicked
            tile.addEventListener("dragenter", dragEnter);  //dragging image onto another one
            tile.addEventListener("dragleave", dragLeave);  //dragged image leaving anohter image
            tile.addEventListener("drop", dragDrop);        //drag an image over another image, drop the image
            tile.addEventListener("dragend", dragEnd);      //after drag drop, swap the two tiles
            document.getElementById("board").append(tile);

      }
   }
}

/**
 * Checks if the image array is in the correct order
 * @param imageOrder array containing the image order
 * @return true if it is in the correct order
 */
function checkGameOver(imageOrder) {
   var count = 1;
   // for (let index = 0; index < imageOrder.length; index++) {
   //    if (imageOrder[index] == count++){
   //       return false;
   //    };
   // }
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

function dragStart() {
    currTile = this; //this refers to the img tile being dragged
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
}

function dragLeave() {

}

function dragDrop() {
    otherTile = this; //this refers to the img tile being dropped on
}

function dragEnd() {
   if (!otherTile.src.includes("3.jpg")) {
      return;
   }

   // get coordinates of current tile
   let currCoords = currTile.id.split("-"); //ex) "0-0" -> ["0", "0"]
   let r = parseInt(currCoords[0]);
   let c = parseInt(currCoords[1]);
   // get coordinates of other tile
   let otherCoords = otherTile.id.split("-");
   let r2 = parseInt(otherCoords[0]);
   let c2 = parseInt(otherCoords[1]);

   let moveLeft = r == r2 && c2 == c-1;
   let moveRight = r == r2 && c2 == c+1;

   let moveUp = c == c2 && r2 == r-1;
   let moveDown = c == c2 && r2 == r+1;
   //check if the tiles are adjacent
   let isAdjacent = moveLeft || moveRight || moveUp || moveDown;

   if (isAdjacent) {
      let currImg = currTile.getAttribute("src");
      let otherImg = otherTile.getAttribute("src");

      currTile.src = otherImg;
      otherTile.src = currImg;

      turns += 1;
      document.getElementById("turns").innerText = turns;

      if (checkGameOver()) {
         gameover();
      }
   }
}

/**
 * Function to show the game over page
 */
export function gameover() {
   document.querySelector(".game-over-screen").classList.add("active");
   document.querySelector(".game-content").classList.add("blur");
}