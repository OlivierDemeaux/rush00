<?php

include "includes/lib.php";

function add_item($name, $price, $array_cat, $link)
{
    $db = connexion_sql();
    if (is_ref($db, $name))
        return (-1);
    if (!mysqli_query($db, "INSERT INTO articles (nom, prix, link) VALUES ('$name', '$price', '$link')"))
        return (-1);
    if ($array_cat !== NULL) {
        $art_id = article_idgetbyname($name);
        foreach ($array_cat as $key => $value) {
            $cat_id = cat_idgetbyname($value);
            if (!mysqli_query($db, "INSERT INTO articles_cat (art_id, cat_id) VALUES ('$art_id', '$cat_id')"))
                return (-1);
        }
        return (0);
    }
    else
        return (0);
}

$i = 0;
$array_cat = [];

if (isset($_POST["desktop"]))
    $array_cat[$i++] = "Desktop";
if (isset($_POST["laptop"]))
    $array_cat[$i++] = "Laptop";
if (isset($_POST["tablets"]))
    $array_cat[$i++] = "Tablets";
if (isset($_POST["cards"]))
    $array_cat[$i++] = "Cards";
if (is_set($_POST, "name") && is_set($_POST, "price") && is_set($_POST, "link") && is_set($_POST, "submit")) {
    if ($_POST["submit"] === 'OK' && $_POST["name"] && $_POST["link"] && $_POST["price"]){
        if (add_item($_POST["name"], $_POST["price"], $array_cat, $_POST["link"]) === -1)
            echo "ERROR | ITEM ALREADY REFERENCED (use edit)\n";
        else
            echo "SUCCESS | ITEM ADDED\n";
    }
    else
        echo "ERROR | INVALID NAME OR PRICE\n";
}
else
    echo "ERROR | EMPTY FIELD\n";
