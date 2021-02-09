<?php
$nmbCards = "" ;


if (isset($_POST['submit'])) {
    if (!empty($_POST['choix']) && $_POST["choix"] == 5){
    $nmbCards = 5;}
    if (isset($_POST['choix']) && $_POST["choix"] == 9){
    $nmbCards = 9;}
} else{
    $nmbCards = 20;}
?>