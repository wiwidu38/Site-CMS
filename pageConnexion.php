<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page Connexion</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div id="content">
    <?php
        session_start();
        if(!isset($page))
        $page = 'index.php';
        if(isset($_SESSION['login'])){
        $pseudo = htmlentities($_SESSION['login']);
        echo "<p>Bonjour $pseudo</p>";
        echo '<p>Vous pouvez vous déconnecter en cliquant <a href="deconnexion?page='.$page.'">ici</a></p>';
        }else{
        include 'connexion.php';
        include 'inscription.php';
        }
        ?>
        <a href="mon_compte.php">mon compte</a>
    </div>
    
</body>
</html>
