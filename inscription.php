<?php
/* Indique le bon format des entêtes (par défaut apache risque de les envoyer au standard ISO-8859-1)*/
header('Content-type: text/html; charset=UTF-8');

/* Initialisation de la variable du message de réponse*/
$message = null;

/* Récupération des variables issues du formulaire par la méthode post*/
$pseudo = filter_input(INPUT_POST, 'pseudoi');
$pass = filter_input(INPUT_POST, 'passi');
$pass2 = filter_input(INPUT_POST, 'pass2i');

/* Si le formulaire est envoyé */
if (isset($pseudo,$pass,$pass2))
{

    /* Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces  */
    $pseudo = trim($pseudo) != '' ? $pseudo : null;
    $pass = trim($pass) != '' ? $pass : null;
    $pass2 = trim($pass2) != '' ? $pass2 : null;


    /* Si $pseudo et $pass et $pass2 différents de null */
    if(isset($pseudo,$pass,$pass2))
    {
      if($pass == $pass2)
      {
        include 'connexionbd.php';

      /* Requête pour compter le nombre d'enregistrements répondant à la clause : champ du pseudo de la table = pseudo posté dans le formulaire */
      $requete = "SELECT count(*) FROM membres WHERE pseudo = ?";

      try
      {
        /* préparation de la requête*/
        $req_prep = $connect->prepare($requete);

        /* Exécution de la requête en passant la position du marqueur et sa variable associée dans un tableau*/
        $req_prep->execute(array(0=>$pseudo));

        /* Récupération du résultat */
        $resultat = $req_prep->fetchColumn();

        if ($resultat == 0)
        /* Résultat du comptage = 0 pour ce pseudo, on peut donc l'enregistrer */
        {
          /* Pour enregistrer la date actuelle (date/heure/minutes/secondes) on peut utiliser directement la fonction mysql : NOW()*/
          $insertion = "INSERT INTO membres(pseudo,pass,date_enregistrement) VALUES(:nom, :password, NOW())";

          /* préparation de l'insertion */
          $insert_prep = $connect->prepare($insertion);

          /* Exécution de la requête en passant les marqueurs et leur variables associées dans un tableau*/
          $inser_exec = $insert_prep->execute(array(':nom'=>$pseudo,':password'=>$pass));

          /* Si l'insertion s'est faite correctement...*/
          if ($inser_exec === true)
          {
            /* Démarre une session si aucune n'est déjà existante et enregistre le pseudo dans la variable de session $_SESSION['login'] qui donne au visiteur la possibilité de se connecter.  */
            if (!session_id()) session_start();
            $_SESSION['login'] = $pseudo;

            header("Location: index.php");
            exit();
          }
        }
        else
        {   /* Le pseudo est déjà utilisé */
          $message = 'Ce pseudo est déjà utilisé, changez-le.';
        }
      }
      catch (PDOException $e)
      {
        $message = 'Problème dans la requête d\'insertion';
      }
    }else{
      $message = 'Les mots de passes ne correspondent pas';
    }
  }
  else
  {    /* Au moins un des deux champs "pseudo" ou "mot de passe" n'a pas été rempli*/
    $message = 'Les champs Pseudo et Mot de passe doivent être remplis.';
  }
}
?>

<div id = "connexion">
    <form action = "#" method = "post">
    <fieldset>inscription</fieldset>
    <p><label for = "pseudo">Pseudo : </label><input type = "text" name = "pseudoi" id = "pseudo" /></p>
    <p><label for = "pass">Mot de passe : </label><input type = "password" name = "passi" id = "pass" /></p>
    <p><label for = "pass2">Confirmer : </label><input type = "password" name = "pass2i" id = "pass" /></p>
    <p><input type = "submit" value = "Envoyer" id = "valider" /></p>
    </form>
    <?php if($message != ''){
      echo '<p id = "message"> '.$message.' </p>';
    } ?>
</div>
