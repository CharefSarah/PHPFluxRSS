<?php
$nmbCards = "" ;


if (isset($_POST['submit']) && $_POST['choix1'] == 5) {
 $nmbCards = 5 ; }
 if (isset($_POST['submit']) && $_POST['choix2'] == 9) {
    $nmbCards = 9 ; }
    if (isset($_POST['submit']) && $_POST['choix3'] == 11) {
        $nmbCards = 11; }
else{
    $nmbCards = 11;
}

?>