<?php
require_once("controller/controller.php");
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="icon" href="assets/img/icon_1.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div>
    <form method="POST">
      <h2>Flux</h2>
      <div class="radio">
        <label><input type="radio" name="optradio">Option 1</label>
      </div>
      <div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 4</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 5</label>
        </div>
      </div>
   
    <h2>Nombre d'articles</h2>
    <div class="radio2" >
      <label><input type="radio" name="choix" id="choix" value="5">5</label>
    </div>
    <div class="radio2">
      <label><input type="radio" name="choix" id="choix2" value="9"> 9</label>
    </div>
    <div class="radio2">
      <label><input type="radio" name="choix" id="choix3" value="10">Tout</label>
    </div>
    <div><button type="button" class="btn btn-primary">Primary</button></div>
    <div> <button type="button" class="btn btn-secondary">Secondary</button> </div>
    <div> <button type="button" class="btn btn-success">Success</button> </div>
  </div>
  <button type="submit" class="submit" id="submit" name="submit">Envoyer</button> 
</div>
</form>
  <div id="main" class="justify-content-center">
    <button class="openbtn" onclick="openNav()">&#9776; </button>
    <?php

    $url = "https://www.01net.com/rss/jeux-video/";
    $rss = simplexml_load_file($url);
     //echo '<pre>';
    // print_r($rss);
    ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="banner">
                    <h1>NETFLUX</h1>
                </div>
                <?php        
                    setlocale(LC_TIME, "fra.UTF8");
                    for($i = 0;$i < $nmbCards;$i++){
                        $image = $rss->channel->item[$i]->enclosure;
                        $descri = $rss->channel->item[$i]->description;
                        $jacky = explode("<br", $descri);

                        $date = strtotime($rss->channel->item[$i]->pubDate);
                        $pub = strftime("%e %B %Y", $date);

                        ?>
                        <div class="card me-3 mb-3 p-0" style="width: 18rem; border: none;">
                            <img src="<?= $image[0]['url'] ?>" class="card-img-top">
                            <div class="card-header text-end">
                                <?= $pub ?>
                            </div>
                            <div class="card-body text-center">
                                <h6 class="card-title mt-4 mb-4"><?= $rss->channel->item[$i]->title ?></h6>
                                <button type="button" class="btnCard" data-bs-toggle="modal" data-bs-target="#card<?=$i?>">Infos</button>
                            </div>
                        </div>

                        <div class="modal fade" id="card<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $rss->channel->item[$i]->title ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>  
                                    <div class="modal-body">
                                        <img src="<?= $image[0]['url'] ?>" class="d-block img-fluid">
                                        <p class="mt-4"><?=$jacky[0]?></p>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-start">
                                            <span class="m-2"><?= $pub ?></span>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="<?= $rss->channel->item[$i]->link ?>" target="_blank" class="btn text-white bg-dark m-2">Lien</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="assets/js/script.js" async defer></script>

</html>