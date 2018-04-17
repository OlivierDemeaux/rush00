<?php

  include('includes/database.php');
  session_start();
  if (!isset($_GET['type']) || $_GET['type'] == '')
  {
    header('Location: /');
    exit;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="ecommerce.css">
    <meta charset="utf-8">
  </head>
  <header>
    <h1><?php echo $_GET['type'] ?></h1>
    <ul class = "menu">
      <?php include('./includes/head.php'); ?>
    </ul>
  </header>
  <body>
    <div class="centralwindow">
      <?php
      $type = mysqli_real_escape_string($db, $_GET['type']);
      $str = "SELECT articles.* FROM articles INNER JOIN articles_cat ON articles_cat.art_id = articles.id INNER JOIN cat ON articles_cat.cat_id = cat.id WHERE cat.cat_name = '$type'";
      $req = mysqli_query($db, $str);
      while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
      {
        ?>
        <a href="./add.php?id=<?php echo $el['id'] ?>">
          <div class="products">
            <img src="<?php echo $el['link'] ?>" class="image">
            <p><?php echo $el['nom'] ?></p>
            <p><?php echo $el['prix'] ?>$</p>
          </div>
        </a>
        <?php
      }
      ?>
    </div>
  </body>
</html>
