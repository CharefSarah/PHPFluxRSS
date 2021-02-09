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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="icon" href="assets/img/icon_1.ico">

</head>

<body>
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  </div>

  <div id="main">
    <button class="openbtn" onclick="openNav()">&#9776; </button>
    <?php

    $url = "https://www.01net.com/rss/jeux-video/";
    $rss = simplexml_load_file($url);
    // echo '<pre>';
    // print_r($rss);
    // echo $rss->channel->item[0]->title;
    ?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <title>Flux RSS</title>
    </head>

    <body>
      <div class="container">
        <?php
        for ($i = 0; $i < 10; $i++) { ?>
          <div class="card">
            <div class="card-body">
              <h6 class="card-title"><?= $rss->channel->item[$i]->title ?></h6>
              <h6 class="card-subtitle mb-2 text-muted"><?= $rss->channel->item[$i]->pubDate ?></h6>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#card<?= $i ?>">+ d'infos</button>
            </div>
          </div>

          <div class="modal fade" id="card<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content d-flex justify-content-center text-center p-5">
                <a class=" btn text-white btnCustom" data-bs-dismiss="modal">x</a>
                <div class="p-5 border border-white">
                  <div class="row">
                    <div class="col-md-12">
                      <p><?= $rss->channel->item[$i]->description ?></p>
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
  </div>

 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="assets/js/script.js" async defer></script>
</body>

</html>