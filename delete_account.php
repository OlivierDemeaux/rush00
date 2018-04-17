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

function delete_account($passwd, $confirm)
{
    $db = connexion_sql();
    $login = session_get("logged_on_user");
    if ($passwd !== $confirm || auth($login, $passwd) === FALSE)
        return (-1);
    $hash = hash("whirlpool", $passwd);
    if (!mysqli_query($db, "DELETE FROM membres WHERE login = '$login' && passwd = '$hash'"))
        return (-1);
    return (0);
}

session_start();

if (is_set($_SESSION, "logged_on_user") && is_set($_POST, "passwd") && is_set($_POST, "confirm") && is_set($_POST, "submit")) {
    if ($_POST["submit"] === 'OK' && $_SESSION["logged_on_user"] && $_POST["passwd"] && $_POST["confirm"]){
        if (delete_account($_POST["passwd"], $_POST["confirm"]) === -1)
            echo "ERROR\n";
        else {
            echo "ACCOUNT DELETED\n";
            logout();
        }
    }
    else
        echo "ERROR | INVALID PASSWORD\n";
}
else
    echo "ERROR\n";