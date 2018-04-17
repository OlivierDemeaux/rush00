<?php

  function creationPanier()
  {
    if(!isset($_SESSION['panier']))
    {
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit']=array();
      $_SESSION['panier']['qteProduit']=array();
      $_SESSION['panier']['prixProduit']=array();
    }
    return true;
  }

  function ajouterArticle($libelleProduit, $qteProduit, $prixProduit)
  {
    if(creationPanier())
    {
      $position_produit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

      if($position_produit !== false)
      {
        $_SESSION['panier']['qteProduit'][$position_produit] += $qteProduit;
      }
      else
      {
        array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
        array_push($_SESSION['panier']['qteProduit'],$qteProduit);
        array_push($_SESSION['panier']['prixProduit'],$prixProduit);
      }
    }
    else
    {
      echo 'Erreur, veuillez contacter l\'administrateur';
    }
    }

    function ModifierQteProduit($libelleProduit, $qteProduit)
    {
      if(creationPanier())
      {
        if ($qteProduit > 0)
        {
          $position_produit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

          if($position_produit !== false)
          {
            $_SESSION['panier']['qteProduit'][$position_produit] = $qteProduit;
          }
        }
        else {
          supprimerProduit($libelleProduit);
        }
      }
      else {
        echo 'Erreur, veuillez contacter un administrateur';
      }
    }

    function supprimerProduit($libelleProduit)
    {
      if(creationPanier())
      {
        $position_produit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
        if ($position_produit !== false)
        {
          unset($_SESSION['panier']['libelleProduit'][$position_produit]);
          unset($_SESSION['panier']['qteProduit'][$position_produit]);
          unset($_SESSION['panier']['prixProduit'][$position_produit]);
        }
      }
      else
        echo 'Erreur, veuillez contacter un administrateur';
    }

    function MontantGlobal()
    {
      $total = 0;
      foreach ($_SESSION['panier']['libelleProduit'] as $key => $value)
        $total += $_SESSION['panier']['qteProduit'][$key]*$_SESSION['panier']['prixProduit'][$key];
      return $total;
    }

    function supprimerPanier()
    {
      if(isset($_SESSION['panier']))
        unset($_SESSION['panier']);
    }
    function compterArticles()
    {
      if(isset($_SESSION['panier']))
        return count($_SESSION['panier']['libelleProduit']);
      else
        return 0;
    }

?>
