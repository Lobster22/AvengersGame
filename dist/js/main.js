$(function () {
  const gameBoard = document.querySelector(".game__board");
  console.log(gameBoard);
  const thanos = document.querySelector(".game__thanos__img");
  const test = document.querySelector("#cell-1");

  thanosEffect(thanos, gameBoard);
  thanosEffect(test, test);

  const allCells = document.querySelectorAll('.game__board__item');

  for (let cell of allCells) {
    thanosEffect(cell, cell);
  }

});
