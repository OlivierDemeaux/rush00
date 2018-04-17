<?php

function connexion_sql()
{
    if (!($db = mysqli_connect('172.17.0.2', "root", "1234", 'mydb'))) {
        echo "ERROR | CANNOT CONNECT TO SQL\n";
    }
    return ($db);
}

function is_set($tab, $val)
{
    foreach ($tab as $key => $elem){
        if ($key === $val)
            return (TRUE);
    }
    return (FALSE);
}

function logout(){
    session_unset();
    session_destroy();
}

function session_add($name, $value)
{
    if (empty($value))
        $_SESSION[$name] = "";
    $_SESSION[$name] = $value;
}

function session_print($name)
{
    if (is_set($_SESSION, $name))
        echo($_SESSION[$name] . "\n");
}

function session_del($name)
{
    if (is_set($_SESSION, $name))
        unset($_SESSION["name"]);
}

function session_get($name)
{
    if (is_set($_SESSION, $name))
        return ($_SESSION[$name]);
}

function is_ref($db, $name)
{
    $req = mysqli_query($db, "SELECT id FROM articles WHERE nom = '$name'");
    if (mysqli_num_rows($req))
        return (TRUE);
    return (FALSE);
}

function article_idgetbyname($name){
    $db = connexion_sql();

    $req = mysqli_query($db, "SELECT id FROM articles WHERE nom = '$name'");
    $data = mysqli_fetch_array($req, MYSQLI_ASSOC);
    if (empty($req))
        return (-1);
    return ($data['id']);
}

function cat_idgetbyname($name){
    $db = connexion_sql();

    $req = mysqli_query($db, "SELECT id FROM cat WHERE cat_name = '$name'");
    $data = mysqli_fetch_array($req, MYSQLI_ASSOC);
    if (empty($req))
        return (-1);
    return ($data['id']);
}
