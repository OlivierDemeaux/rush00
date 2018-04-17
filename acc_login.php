!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
      <link rel="stylesheet" href="ecommerce.css">
</head>
<header>
  <h1>Intel 42</h1>
    <ul class = "menu">
      <?php include('./includes/head.php'); ?>
    </ul>
</header>
<body>
<form method="post" action="login_account.php">
  Nous sommes heureux de vous revoir, Bonne visite !
  <br/><br/><br/>
    Identifiant: <input type="text" name="login" value="" />
    <br/>
    Mot de passe: <input type="password" name="passwd" value="" />
    <input type="submit" name="submit" value="OK" />
</form>
</body>
</html>
