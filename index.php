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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="icon" href="assets/img/icon_1.ico">

</head>

<body>
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div>
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
    </div>
    <h2>articles</h2>
    <div class="radio2">
      <label><input type="radio" name="optradio2">4</label>
    </div>
    <div class="radio2">
      <label><input type="radio" name="optradio2">8</label>
    </div>
    <div class="radio2">
      <label><input type="radio" name="optradio2">Tout</label>
    </div>
    <div><button type="button" class="btn btn-primary">Primary</button></div>
    <div> <button type="button" class="btn btn-secondary">Secondary</button> </div>
    <div> <button type="button" class="btn btn-success">Success</button> </div>
  </div>

  <div id="main">
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
                for($i = 0;$i <20;$i++){
                    $image = $rss->channel->item[$i]->enclosure;
                    //var_dump($image[0]['url']);
                    $descri = $rss->channel->item[$i]->description;
                    $jacky = explode("<br", $descri);
                    // print_r($img[1]);
                   // var_dump($jacky[0]);
                    ?>
                    <div class="card me-3 mb-3" style="width: 18rem;">
                        <img src="<?= $image[0]['url'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title"><?= $rss->channel->item[$i]->title ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $rss->channel->item[$i]->pubDate?></h6>
                            <button type="button" class="btnCard" data-bs-toggle="modal" data-bs-target="#card<?=$i?>">+ d'infos</button>
                        </div>
                    </div>

                    <div class="modal fade" id="card<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content d-flex justify-content-center text-center p-5">
                                <a class="btn" data-bs-dismiss="modal">x</a>
                                <div class="p-5 border border-white">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?= $jacky[0] ?></p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center text-center mt-3">
                                            <h4><?= $rss->channel->item[$i]->title ?></h4>
                                            </div>
                                            <div class="col-md-4 mx-auto d-flex justify-content-center text-center mt-1 mb-2">
                                            <p><?= $rss->channel->item[$i]->pubDate ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php } ?>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="assets/js/script.js" async defer></script>

</html>
