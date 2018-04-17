<?php
if (!isset($_SESSION['logged_on_user']) || $_SESSION['logged_on_user'] == '')
{
  ?>
  <li><a href="Index.php">Accueil</a></li>
  <li><a href="../acc_create.php">Inscription</a></li>
  <li><a href="../acc_login.php">Connexion</a></li>
  <li><a href="../panier.php">Panier</a></li>
  <?php
}
else
{
  ?>
  <li><a href="Index.php">Accueil</a></li>
  <li><a href="../acc_logout.php">Deconnection</a></li>
  <li><a href="../acc_del.php">Désinscription</a></li>
  <li><a href="../EspaceUtilisateur.php">Espace Client</a></li>
  <?php
  if (isset($_SESSION['logged_on_admin']) && $_SESSION['logged_on_admin'] == '1')
  {
    ?>
    <li><a href="admin.php">Admin</a></li>
    <?php
  }
  ?>
  <li><a href="Panier.php">Panier</a></li>
  <?php
}
