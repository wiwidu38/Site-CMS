<?php 
if (isset($_SESSION['login'])){
  include 'headerLogin.php';   
}else{
  include 'headerLogout.php';
}?>