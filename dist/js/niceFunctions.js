function makeArrayOfNumbers(numberOfColumns, numberOfRows, board) {
  let mainBoard = [];
  let helpMiniBoard = [];
  for (let r = 0; r < numberOfRows; r++) {
    helpMiniBoard = [];
    for (let c = 0; c < numberOfColumns; c++) {
      helpMiniBoard.push(board.shift());
    }
    mainBoard.push(helpMiniBoard);
  }
  return mainBoard;
}

//get number from hided 'span' and add photo of this number
function getNumberAndAddImage(id) {
  const cellId = "#cell-" + id;
  const cell = document.querySelector(cellId);
  const imgNumber = cell.querySelector("span").textContent;
  const cellTxt = "./img/" + imgNumber + ".png";

  cell.querySelector("img").src = cellTxt;
}
