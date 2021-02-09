<?php

$nmbCards = "";

if (isset($_POST['submit'])) {
    if (!empty($_POST['choix']) && $_POST["choix"] == 5){
        $nmbCards = 5;}
    if (isset($_POST['choix']) && $_POST["choix"] == 10){
        $nmbCards = 10;}
    if(isset($_POST['choix']) && $_POST['choix'] == 15){
        $nmbCards = 15;
    }
} else{
    $nmbCards = 10;}


if(isset($_POST['submit']) && isset($_POST['flux'])){
    $url = $_POST['flux'];  
}else{
    $url = "https://www.01net.com/rss/jeux-video/";
} 
    $rss = simplexml_load_file($url);



?>