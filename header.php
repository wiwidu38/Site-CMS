<header>
    <h1>405</h1>
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
</header>
