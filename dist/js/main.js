$(function () {
  const gameBoard = document.querySelector(".game__board");
  const thanos = document.querySelector(".game__thanos__img");
  const test = document.querySelector("#cell-1");

  thanosEffect(thanos, gameBoard);
  thanosEffect(test, test);

});
