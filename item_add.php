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
    <title>Add Item</title>
</head>
<body>
<form method="post" action="add_item.php">
    Nom de l'Article: <input type="text" name="name" value="" />
    <br />
    Prix de l'Article: <input type="number" name="price" min="0" step="0.01" value="" />
    <br />
    Link href: <input type="text" name="link" value="" />
    <br />
    Categorie de l'Article: <br />
    Laptop <INPUT type="checkbox" name="laptop" value="">
    <br />
    Desktop <INPUT type="checkbox" name="desktop" value="">
    <br />
    Tablets <INPUT type="checkbox" name="tablets" value="">
    <br />
    Cards <INPUT type="checkbox" name="cards" value="">
    <br />
    <input type="submit" name="submit" value="OK" />
</form>
</body>
</html>
