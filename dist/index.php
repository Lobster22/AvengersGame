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

    <script src="./js/bib/html2canvas.js"></script>
    <script src="./js/bib/chance.js"></script>
    <script src="./js/bib/jquery.js"></script>
    <script src="./js/bib/jquery-ui-1.9.2.custom.min.js"></script>

    <script src="./js/thanos.js"></script>
    <script src="./js/functions.js"></script>
    <script src="./js/riddleSolver.js"></script>
    <script src="./js/niceFunctions.js"></script>
  </head>

  <body>
    <div class="game">
      <section class="game__name">
        <h1>Avangers Game</h1>
        <h2>created by Lobster</h2>
      </section>

      <div class="game__thanos">
        <figure>
          <img class="game__thanos__img" src="./img/thanos.png" />
        </figure>
      </div>

      <section class="game__board">
        <?php for($i = 0; $i < 72; $i++) { ?>
          <div id="cell-<?php echo $i ?>" class="game__board__item">
            <img class="game__board__item__img">
            <span class="invisible"><?php echo $arrOfAvengers[$i] ?></span>
          </div>
        <?php } ?>
      </section>

      <div class="game__score">Score: <span class="game__score__number">100</span></div>
    </div>

    <script type="module" src="./js/main.js"></script>
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
