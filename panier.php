<?php

  require_once('./includes/header.php');
  //require_once('./includes/centerwindow.php');
  require_once('./functions_panier.php');

  $erreur = false;

  $action = (isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));

  if($action !== null)
  {
    if(!in_array($action, array('ajout', 'suppression', 'refresh')))

      $erreur = true;

      $l = (isset($_POST['l'])?$_POST['l']:(isset($_GET['l'])?$_GET['l']:null));
      $q = (isset($_POST['q'])?$_POST['q']:(isset($_GET['q'])?$_GET['q']:null));
      $p = (isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));

      $l = preg_replace('#\v#', '', $l);

      $p = floatval($p);

      if(is_array($q))
      {
        $qteProduit = array();

        $i = 0;

        foreach($q as $contenu)
        {
          $qteProduit[$i++] = intval($contenu);
        }
      }
      else {
        $q = intval($q);
      }
  }

  if(!$erreur)
  {
    switch($action)
    {
      Case "ajout":

      ajouterArticle($l,$q,$p);

      break;

      Case "suppression";

      supprimerProduit($l);

      break;

      Case "refresh":

      for($i = 0; $i<count($qteProduit);$i++)
      {
        ModifierQteProduit($_SESSION['panier']['libelleProduit'][$i], round($qteProduit[$i]));
      }

      break;

      Case "default":

      break;

    }
  }
?>

<form method="post" action="">
    <table width="400">
      <tr>
        <td colspan="4">Votre Panier</td>
      </tr>
      <tr>
        <td>Libellé produit</td>
        <td>Prix Unitaire</td>
        <td>Quantité</td>
        <td>Action</td>
      </tr>
      <?php
        if(isset($_GET['deletepanier']) && $_GET['deletepanier'] == true)
        {
          supprimerPanier();
        }

        if (creationPanier())
        {
          $nbProduits = count($_SESSION['panier']['libelleProduit']);

        if($nbProduits <= 0)
        {
          echo '<br/><p style="color:Red;">Panier vide !</p>';
        }
        else
        {
          foreach ($_SESSION['panier']['libelleProduit'] as $key => $value)
          {
            ?>

            <tr>

                <td><br/><?php echo $_SESSION['panier']['libelleProduit'][$key]; ?></td>
                <td><?php echo $_SESSION['panier']['prixProduit'][$key];?>$</td>
                <td><input name="q[]" value="<?php echo $_SESSION['panier']['qteProduit'][$key]; ?>" size="5"/></td>
                <td><br/><a href="panier.php?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['libelleProduit'][$key])  ; ?>">X</a></td>

            </tr>
          <?php } ?>
            <tr>

                <td colspan="2"><br/>
                    <p>Total: <?php echo MontantGlobal()." $"; ?></p><br/>
                </td>
              </tr>
            <tr>
              <td colspan="4">
                <input type="submit" value="rafraichir"/>
                <input type="hidden" name="action" value="refresh"/>
                <a href="?deletepanier=true">Supprimer le panier</a>
                <br /><br />
                <a href="./buy.php">BUY</a>
              <?php
          }
        }
?>
