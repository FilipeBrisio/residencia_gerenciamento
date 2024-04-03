<?php
session_start(); 


$_SESSION = array();

session_destroy();


header("Location: tela_de_login.php"); 
exit;
?>
