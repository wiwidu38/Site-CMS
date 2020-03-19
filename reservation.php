<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php';  ?>
  <div id="content">
    <?php
    if (isset($_SESSION['login'])){
      echo '<h1>Reservation</h1>';
      $pseudo = htmlentities($_SESSION['login']);
      if($pseudo == 'admin'){
        echo '<h1>Pannel spécial admin</h1>';
        echo '<p><a href="gestionTable.php">Ajouter ou supprimer des tables</a></p>';
        
      }

    }else{
      echo '<p>Merci de vous connecter pour acceder a la page</p>';
    }
    ?>

  </div>
  <?php include 'footer.php';  ?>
</body>
</html>
