let sameNumbers = 0;
let numbersToChangeToZero = [];
let oneNumberToChangeCoordianates = [];
let isThereNumberAboveZero = false;
let areThereSameNumbersRows = true;
let areThereSameNumbersColumns = true;
let helpArray = [];
let helpRowOfArray = [];
let swapBoard = [];

function riddleSolver(board) {
  do {
    findSameNumbers(board, 0);
    swapBoard = swapPlacesRowsAndColumns(board);
    findSameNumbers(swapBoard, 1);
    changeSamesToZeros(board);
    board = swapPlacesRowsAndColumns(board);
    moveNumbersBelowZeros(board);
    board = swapPlacesRowsAndColumns(board);
    numbersToChangeToZero = [];
  } while (areThereSameNumbersRows || areThereSameNumbersColums);

  return board;
}

function moveNumbersBelowZeros(exampleBoard) {
  do {
    isThereNumberAboveZero = false;
    exampleBoard.forEach(row => {
      for (let i = 0; i < exampleBoard[0].length - 1; i++) {
        if (row[i] != 0 && row[i + 1] === 0) {
          row[i + 1] = row[i];
          row[i] = 0;
          isThereNumberAboveZero = true;
        }
      }
    });
  } while (isThereNumberAboveZero);
}

function changeSamesToZeros(exampleBoard) {
  numbersToChangeToZero.forEach(row => {
    for (let i = row[2]; i <= row[3]; i++) {
      row[0] ? (exampleBoard[i][row[1]] = 0) : (exampleBoard[row[1]][i] = 0);
    }
  });
}

function swapPlacesRowsAndColumns(exampleBoard) {
  helpArray = [];
  for (let c = 0; c < exampleBoard[0].length; c++) {
    helpRowOfArray = [];
    exampleBoard.forEach((row, index) => {
      helpRowOfArray.push(row[c]);
    });
    helpArray.push(helpRowOfArray);
  }
  return helpArray;
}

// 0 - row, 1 - columns
function findSameNumbers(board, rowOrColumn) {
  !rowOrColumn
    ? (areThereSameNumbersRows = false)
    : (areThereSameNumbersColums = false);
  board.forEach((row, index) => {
    for (let i = 0; i < board[0].length; i++) {
      oneNumberToChangeCoordianates = [rowOrColumn];
      sameNumbers = 0;
      for (let j = i + 1; j < board[0].length; j++) {
        if (row[i] === row[j] && row[i]) {
          sameNumbers++;
          continue;
        } else break;
      }
      if (sameNumbers >= 2) {
        oneNumberToChangeCoordianates.push(index, i, i + sameNumbers);
        numbersToChangeToZero.push(oneNumberToChangeCoordianates);
        i += sameNumbers;
        !rowOrColumn
          ? (areThereSameNumbersRows = true)
          : (areThereSameNumbersColums = true);
      }
    }
  });
  return !rowOrColumn ? areThereSameNumbersRows : areThereSameNumbersColums;
}
