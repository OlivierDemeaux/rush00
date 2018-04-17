<?php

  session_start();

  include('includes/database.php');

  if (!isset($_SESSION['logged_on_user']) || $_SESSION['logged_on_user'] == '')
  {
    header('Location: acc_login.php');
  	exit;
  }
  $login = mysqli_real_escape_string($db, $_SESSION['logged_on_user']);
  $str = "SELECT id FROM membres WHERE login = '$login'";
  $req = mysqli_query($db, $str);
  $el = mysqli_fetch_array($req, MYSQLI_ASSOC);
  $id = $el['id'];
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
      <br /><br /><br />
      <a href="/acc_edit.php">Modifier</a>
      <br /><br /><br />
      <?php
      $str = "SELECT * from commandes WHERE user = '$id'";
      $req = mysqli_query($db, $str);
      while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
      {
        ?>
        <div class="products">
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
  </header>
  <body>
  </body>
</html>
