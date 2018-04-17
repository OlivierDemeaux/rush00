<?php

include "includes/lib.php";

function is_present($db, $login)
{
    $req = mysqli_query($db, "SELECT id FROM membres WHERE login = '$login'");
    if (mysqli_num_rows($req))
        return (TRUE);
    return (FALSE);
}

function create_account($db, $login, $passwd)
{
    if (is_present($db, $login)) {
        return (-1);
    }
    else {
        $req_prep = mysqli_prepare($db, 'INSERT INTO membres (login, passwd) VALUES (?, ?)');
        $hash = hash("whirlpool" , $passwd);
        mysqli_stmt_bind_param($req_prep, "ss", $login, $hash);
        mysqli_stmt_execute($req_prep);
        return (0);
    }
}

$db = connexion_sql();
if (is_set($_POST, "login") && is_set($_POST, "passwd") && is_set($_POST, "submit")) {
    if ($_POST["submit"] === 'OK' && $_POST["login"] && $_POST["passwd"]) {
        if (create_account($db, $_POST["login"], $_POST["passwd"]) === -1)
            echo "ERROR | LOGIN ALREADY USED\n";
        else
        {
          header('Location: /');
          echo "SUCCESS | ACCOUNT CREATED\n";
          exit;
        }
    }
    else
        echo "ERROR | INVALID INSERT IN LOGIN OR PASSWD\n";
}
else
    echo "ERROR | Empty Field\n";
