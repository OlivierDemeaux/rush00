<?php
session_start();
include('includes/database.php');
require_once('./functions_panier.php');

if (!isset($_SESSION['logged_on_user']) || $_SESSION['logged_on_user'] == '')
{
  header('Location: acc_login.php');
	exit;
}
if (isset($_SESSION['logged_on_admin']) && $_SESSION['logged_on_admin'] == '1')
{
  header('Location: admin.php');
	exit;
}
else
{
  $total = 0;
  if (isset($_SESSION['panier']) && isset($_SESSION['panier']['libelleProduit']))
  {
    $commande = [];
    foreach ($_SESSION['panier']['libelleProduit'] as $key => $value)
    {
      if ($_SESSION['panier']['qteProduit'][$key] > 0)
      {
        $prix = $_SESSION['panier']['qteProduit'][$key] * $_SESSION['panier']['prixProduit'][$key];
        $total += $prix;
        $commande[$_SESSION['panier']['libelleProduit'][$key]] = $_SESSION['panier']['qteProduit'][$key];
      }
    }
    if ($total == 0)
    {
      header('Location: /');
    	exit;
    }
    $login = mysqli_real_escape_string($db, $_SESSION['logged_on_user']);
    $str = "SELECT id FROM membres WHERE login = '$login'";
    $req = mysqli_query($db, $str);
    $el = mysqli_fetch_array($req, MYSQLI_ASSOC);
    $id = $el['id'];
    $str = serialize($commande);
    $date = time();
    mysqli_query($db, "INSERT INTO commandes (user, creation, prix, items) VALUES ('$id', '$date', '$total', '$str')");
		supprimerPanier();
    header('Location: /EspaceUtilisateur.php');
  }
}

?>
