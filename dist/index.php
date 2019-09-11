<?php require "./php/main.php" ?>
<?php require "./php/functions.php" ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Avengers Game</title>

    <link
      href="https://fonts.googleapis.com/css?family=Lato|Lobster+Two:400i|Russo+One&display=swap&subset=cyrillic"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/main.css" />

    <script src="./js/biblq/html2canvas.js"></script>
    <script src="./js/biblq/chance.js"></script>
    <script src="./js/biblq/jquery.js"></script>
    <script src="./js/biblq/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="./js/thanos.js"></script>

    <script src="./js/main.js"></script>
    <script src="./js/riddleSolver.js"></script>
    <script src="./js/niceFunctions.js"></script>
  </head>

  <body>
    <div class="avengers">
      <div class="game-name">
        <h1>Avangers Game</h1>
        <h2>created by Lobster</h2>
      </div>

      <div class="thanos">
        <img class="thanosImg" src="./img/thanos.png" />
      </div>

      <div class="game-board">
        <?php for($i = 0; $i < 72; $i++) { ?>
          <div id="cell-<?php echo $i ?>" class="game-item">
            <img class="item-img">
            <span class="invisible"><?php echo $arrOfAvengers[$i] ?></span>
          </div>
        <?php } ?>
      </div>

      <div class="fake-game-board"></div>

      <div class="score">Score: <span class="score-number">100</span></div>
    </div>

    <script>
    $(function() {
      let newArr = [];

      <?php foreach ($arrOfAvengers as $avenger) { ?>
        newArr.push(<?php echo $avenger ?>);
      <?php } ?>
      
      let arr = makeArrayOfNumbers(8, 9, newArr)
      console.log(arr);
      console.log(riddleSolver(arr));

      for(let i = 0; i < 72; i++) {
        getNumberAndAddImage(i);
      }
      
    });
    </script>
   
  </body>
</html>
