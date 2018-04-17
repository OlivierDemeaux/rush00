<?php

include "includes/lib.php";

function edit_item($edit, $name, $newv)
{
    $db = connexion_sql();
    if (!is_ref($db, $name))
        return (-1);
    if ($edit === 'nom') {
        if (!mysqli_query($db, "UPDATE articles SET nom = '$newv' WHERE nom = '$name'"))
            return (-1);
        return (0);
    }
    else if ($edit === 'prix') {
        if (!mysqli_query($db, "UPDATE articles SET prix = '$newv' WHERE nom = '$name'"))
            return (-1);
        return (0);
    }
    else
        return (-1);
}

if (is_set($_POST, "edit") && is_set($_POST, "name") && is_set($_POST, "newv") && is_set($_POST, "submit")) {
    if ($_POST["submit"] === 'OK' && ($_POST["edit"] === 'prix' || $_POST["edit"] === 'nom') && $_POST["name"]
        && $_POST["newv"]){
        if (edit_item($_POST["edit"], $_POST["name"], $_POST["newv"]) === -1)
            echo "ERROR | ITEM UNAVALAIBLE OR WRONG VALUES\n";
        else
            echo "SUCCESS | ITEM EDITED\n";
    }
    else
        echo "ERROR | INVALID NAME OR PRICE\n";
}
else
    echo "ERROR | EMPTY FIELD\n";
