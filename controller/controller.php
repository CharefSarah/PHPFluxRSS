<?php
if(isset($_POST['submit'])){
    setcookie('flux', $_POST['flux'], time() + 86400);
    setcookie('theme', $_POST['theme'], time() + 86400);
    setcookie('choix', $_POST['choix'], time() + 86400);
}else{
    setcookie('flux', 0, time() + 86400);
    setcookie('theme', 0, time() + 86400);
    setcookie('choix', 0, time() + 86400);
}


$nmbCards = "";
$themes = ""; 

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