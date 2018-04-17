<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Password</title>
</head>
<body>
<form method="post" action="edit_account.php">
    Ancien mot de passe: <input type="password" name="oldpw" value="" />
    <br />
    Nouveau mot de passe: <input type="password" name="newpw" value="" />
    <br />
    Confimer nouveau mot de passe: <input type="password" name="confirm" value="" />
    <input type="submit" name="submit" value="OK" />
</form>
</body>
</html>