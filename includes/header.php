<?php

  session_start();
  include('database.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="ecommerce.css">
    <meta charset="utf-8">
    </style>
    </menu>
  </head>
  <header>
    <h1>Intel 42</h1>
      <ul class = "menu">
        <?php include('./includes/head.php'); ?>
      </ul>
  </header>
  <body>
    <div class="centralwindow">
      <?php
      $str = "SELECT * FROM cat";
      $req = mysqli_query($db, $str);
      while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
      {
        ?>
        <div class="products">
          <a href="./cat.php?type=<?php echo $el['cat_name'] ?>">
            <img src="./images/<?php echo $el['cat_name'] ?>.png" class="image">
          </a>
        </div>
        <?php
      }
      ?>
    </div>
  </body>
</html>
