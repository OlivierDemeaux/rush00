<?php
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
    <meta charset="UTF-8">
    <title>Edit Item</title>
</head>
<body>
<form method="post" action="edit_item.php">
    Nom de l'article: <input type="text" name="name" value="" />
    <br />
    Valeur a modifier: <input type="text" name="edit" value="" />
    <br />
    Nouvelle valeur: <input type="text" name="newv" value="" />
    <br />
    <input type="submit" name="submit" value="OK" />
</form>
</body>
</html>
