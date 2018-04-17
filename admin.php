<?php

  include('includes/database.php');
  session_start();
  if (!isset($_SESSION['logged_on_admin']) || $_SESSION['logged_on_admin'] != '1')
  {
    header('Location: /');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ecommerce.css">
    <meta charset="UTF-8">
    <title>Index</title>
</head>
    <body>
        <ul class = "menu">
          <?php include('./includes/head.php'); ?>
        </ul>
		    <a href="item_add.php">add item</a>
        <a href="item_edit.php">edit item</a>
        <a href="item_delete.php">delete item</a>
        <br /><br /><br />
        <?php
        $str = "SELECT membres.login, commandes.* from commandes INNER JOIN membres ON commandes.user = membres.id";
        $req = mysqli_query($db, $str);
        while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
        {
          ?>
          <div class="products">
            <?php echo $el['login']; ?>
            <br /><br /><br />
            <?php echo date("d/m/y H:i", $el['creation']); ?>
            <br /><br /><br />
            <?php echo $el['prix'] ?>$
            <br /><br /><br />
            <?php
            $products = unserialize($el['items']);
            foreach ($products as $key => $value)
            {
              echo $key." * ".$value."<br />";
            }
            ?>
          </div>
          <?php
        }
        ?>
    </body>
</html>
