<?php

include "includes/lib.php";

function auth($login, $passwd)
{
    $db = connexion_sql();
    $hash = hash("whirlpool", $passwd);
    $req = mysqli_query($db, "SELECT id FROM membres WHERE login = '$login' && passwd = '$hash'");
    if (mysqli_num_rows($req))
        return (TRUE);
    return (FALSE);
}

function edit_account($oldpw, $newpw, $confirm)
{
    $db = connexion_sql();
    $login = session_get("logged_on_user");
    if ($newpw !== $confirm || auth($login, $oldpw) === FALSE)
        return (-1);
    $hash = hash("whirlpool", $newpw);
    $hash2 = hash("whirlpool", $oldpw);
    if (!mysqli_query($db, "UPDATE membres SET passwd = '$hash' WHERE login = '$login' && passwd = '$hash2'"))
        return (-1);
    return (0);
}

session_start();

if (is_set($_SESSION, "logged_on_user") && is_set($_POST, "oldpw") && is_set($_POST, "newpw")
    && is_set($_POST, "confirm") && is_set($_POST, "submit")) {
    if ($_POST["submit"] === 'OK' && $_SESSION["logged_on_user"] && $_POST["oldpw"] && $_POST["newpw"]
        && $_POST["confirm"]){
        if (edit_account($_POST["oldpw"], $_POST["newpw"], $_POST["confirm"]) === -1)
            echo "ERROR\n";
        else {
            echo "PASSWORD MODIFIED\n";
            header('Location: /EspaceUtilisateur.php');
        }
    }
    else
        echo "ERROR | INVALID PASSWORD\n";
}
else
    echo "ERROR\n";
