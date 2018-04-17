<?php
require_once('./functions_panier.php');
include('includes/database.php');

session_start();

$id = mysqli_real_escape_string($db, $_GET['id']);
$str = "SELECT nom, prix FROM articles WHERE id = '$id'";
$req = mysqli_query($db, $str);
$el = mysqli_fetch_array($req, MYSQLI_ASSOC);

$price = $el['prix'];
$name = $el['nom'];

ajouterArticle($name, 1, $price);

header('Location: /panier.php');
exit;

?>
