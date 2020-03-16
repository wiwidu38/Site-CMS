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
      echo '<p>Cliquer <a href="reservation.php">ici</a> pour reserver une table.</p>';
      echo '<p>Cliquer <a href="gerer.php">ici</a> pour gerer une reservation.</p>';
    }else{
      echo '<p>Merci de vous connecter pour acceder a la page</p>';
    }
    ?>

  </div>
  <?php include 'footer.php';  ?>
</body>
</html>
