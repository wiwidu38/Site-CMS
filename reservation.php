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

    }else{
      echo '<p>Merci de vous connecter pour acceder a la page</p>';
    }
    ?>

  </div>
  <?php include 'footer.php';  ?>
</body>
</html>
