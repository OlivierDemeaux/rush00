<?php

function connexion_sql()
{
    if (!($db = mysqli_connect('172.17.0.2', "root", "1234", 'mydb'))) {
        echo "ERROR | CANNOT CONNECT TO SQL\n";
    }
    return ($db);
}

function connexion_sql()
{
    if (!($db = mysqli_connect('172.17.0.2', root, "1234", 'mydb'))) {
        echo "ERROR | CANNOT CONNECT TO SQL\n";
    }
    return ($db);
}

function is_present($db, $login, $mail)
{
    $req = mysqli_query($db, "SELECT * FROM membres WHERE login = '$login'");
    if (mysqli_num_rows($req))
        return (TRUE);
    $req = mysqli_query($db, "SELECT * FROM membres WHERE mail = '$mail'");
    if (mysqli_num_rows($req))
        return (TRUE);
    return (FALSE);
}

function create_account($db, $login, $passwd, $mail)
{
    if (is_present($db, $login, $mail))
        echo "LOGIN OR MAIL ALREADY USED\n";
    else {
        $req_prep = mysqli_prepare($db, 'INSERT INTO membres (login, passwd, mail) VALUES (?, ?, ?)');
        $hash = hash("whirlpool" , $passwd);
        mysqli_stmt_bind_param($req_prep, "sss", $login, $hash, $mail);
        mysqli_stmt_execute($req_prep);
        echo "ACCOUNT CREATED\n";
    }
}

$db = connexion_sql('root', "1234", "mydb");
create_account($db, "tes2341", "osef231", "e2342432j34w");

---------------------

if (!($bdd = mysqli_connect('172.17.0.2', "root", "1234", "mydb"))) {
    echo "ERROR\n";
}
echo "CONNECTED";
$res = mysqli_query($bdd, 'SELECT * FROM news LIMIT 0, 10');
while ($data = mysqli_fetch_assoc($res)) {
    echo $data['id'];
    echo "\n";
    echo $data['titre'];
}
mysqli_free_result($res);

$titre = "marchetamer";
$contenu = 'TEEEEEEEWWWJIGEJIOGJEIJGEIJOGEW';
$login = "sqrewfdd";
$age = "32";
$poid = "42.1";
$passwd = 1234;
$req_prep = mysqli_prepare($bdd, 'INSERT INTO members (login, passwd, poid, age) VALUES (?, ?, ?, ?)');
mysqli_stmt_bind_param($req_prep,"ssid", $login, $passwd, $age, $poid);
mysqli_stmt_execute($req_prep);
echo "OK\n";
