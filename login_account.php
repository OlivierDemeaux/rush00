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

function auth_r($login, $passwd)
{
    $db = connexion_sql();
    $hash = hash("whirlpool", $passwd);
    $req = mysqli_query($db, "SELECT id FROM admin WHERE login_r = '$login' && passwd_r = '$hash'");
    if (mysqli_num_rows($req))
        return (TRUE);
    return (FALSE);
}

session_start();

if (is_set($_POST, "login") && is_set($_POST, "passwd"))
{
    if (auth($_POST["login"], $_POST["passwd"]))
    {
        session_add("logged_on_user", $_POST["login"]);
        header('Location: /EspaceUtilisateur.php');
    }
    else if (auth_r($_POST["login"], $_POST["passwd"]))
    {
        session_add("logged_on_user", $_POST["login"]);
        session_add("logged_on_admin", 1);
        header('Location: /admin.php');
    }
    else {
        logout();
        echo "ERROR | INVALID LOGIN OR PASSWORD\n";
    }
}
else {
    logout();
    echo "ERROR\n";
}
