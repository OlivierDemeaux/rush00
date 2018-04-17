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
    <title>Delete Item</title>
</head>
<body>
<form method="post" action="delete_item.php">
    Nom de l'Article: <input type="text" name="name" value="" />
    <br />
    <input type="submit" name="submit" value="OK" />
</form>
</body>
</html>
