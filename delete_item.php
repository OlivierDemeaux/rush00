<?php

include "includes/lib.php";

function delete_item($name)
{
    $db = connexion_sql();
    if (!is_ref($db, $name))
        return (-1);
    if (!mysqli_query($db, "DELETE FROM articles WHERE nom = '$name'"))
        return (-1);
    return (0);
}

if (is_set($_POST, "name") && is_set($_POST, "submit")) {
    if ($_POST["submit"] === 'OK' && $_POST["name"]) {
        if (delete_item($_POST["name"]) === -1)
            echo "ERROR | ITEM UNAVALAIBLE\n";
        else
            echo "SUCCESS | ITEM DELETED\n";
    }
    else
        echo "ERROR | INVALID NAME\n";
}
else
    echo "ERROR | EMPTY FIELD\n";
