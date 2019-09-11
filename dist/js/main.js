$(function() {
  const cellsArr = document.querySelectorAll(".game-item");
  let helpBoard = [];
  for (let i = 0; i < 72; i++) {
    helpBoard.push(cellsArr[i].querySelector(".invisible").textContent);
  }
  let gameBoard = makeArrayOfNumbers(8, 9, helpBoard);
  let twoSelected = [];
  let twoSelectedCells = [];
  let selectedValue;

  cellsArr.forEach(cell => {
    cell.addEventListener("click", function() {
      if (twoSelected.length < 2) {
        selectedValue = this.querySelector(".invisible").textContent;
        selectedCell = this.id.split("-")[1];
        twoSelectedCells.push(selectedCell);

        if (twoSelectedCells.length == 1) {
          twoSelected.push(selectedValue);
          this.classList.add("selected");
        } else {
          if (isSecondContiguous(twoSelectedCells, 8)) {
            twoSelected.push(selectedValue);
            this.classList.add("selected");

            changeAvengers();
            cleaningAfterTwoSelected();
          } else {
            twoSelectedCells.pop();
          }
        }
      }
    });
  });

  function isSecondContiguous(arrayOfTwo, numberOfColumns) {
    let isContiguos = true;
    const diffrence = Math.abs(arrayOfTwo[0] - arrayOfTwo[1]);
    if (diffrence != 1 && diffrence != numberOfColumns) isContiguos = false;
    return isContiguos;
  }

  function changeAvengers() {
    const firstAvengerId = "#cell-" + twoSelectedCells[0];
    const firstAvenger = document.querySelector(firstAvengerId);
    const secondAvengerId = "#cell-" + twoSelectedCells[1];
    const secondAvenger = document.querySelector(secondAvengerId);

    firstAvenger.querySelector("span").textContent = twoSelected[1];
    secondAvenger.querySelector("span").textContent = twoSelected[0];

    getNumberAndAddImage(twoSelectedCells[0]);
    getNumberAndAddImage(twoSelectedCells[1]);
  }

  function cleaningAfterTwoSelected() {
    const firstAvengerId = "#cell-" + twoSelectedCells[0];
    const secondAvengerId = "#cell-" + twoSelectedCells[1];

    document.querySelector(firstAvengerId).classList.remove("selected");
    document.querySelector(secondAvengerId).classList.remove("selected");

    twoSelected.length = 0;
    twoSelectedCells.length = 0;
  }
});
