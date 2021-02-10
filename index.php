<?php
require_once("controller/controller.php");
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NETFLUX</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    if(isset($_POST['submit'])){
      if(isset($_POST['theme']) && $_POST['theme'] == "default"){?>
          <link href="assets/css/style.css" rel="stylesheet">
      <?php
      }elseif(isset($_POST['theme']) && $_POST['theme'] == "licorne"){?>
        <link href="assets/css/girly.css" rel="stylesheet">
      <?php
      }elseif(isset($_POST['theme']) && $_POST['theme'] == "jacky"){?>
        <link href="assets/css/jacky.css" rel="stylesheet">
      <?php
      }
      elseif(isset($_POST['theme']) && $_POST['theme'] == "bflux"){?>
        <link href="assets/css/bflux.css" rel="stylesheet">
      <?php
      }
    }else{?>
      <link href="assets/css/jacky.css" rel="stylesheet">
    <?php
    }
  ?>
  <link rel="icon" href="assets/img/icon_1.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div>
    <form method="POST">
      <h2 class="h2Titre mb-3 mt-3">Flux</h2>
      <div class="ms-5 p-0 param">
        
        <div class="radio">
          <input type="radio" name="flux" id="flux1" value="https://www.01net.com/rss/jeux-video/" <?= isset($_POST['flux']) && $_POST['flux']=="https://www.01net.com/rss/jeux-video/" ? "checked" : "" ?>required><label class="ms-2" for="flux1">Jeux vidéo</label>
        </div>
          <div class="radio">
            <input type="radio" name="flux" id="flux2" value="https://www.01net.com/rss/actualites/technos/" <?= isset($_POST['flux']) && $_POST['flux']=="https://www.01net.com/rss/actualites/technos/" ? "checked" : "" ?>><label class="ms-2" for="flux2">Technos</label>
          </div>
          <div class="radio">
            <input type="radio" name="flux" id="flux3" value="https://www.01net.com/rss/photo/" <?= isset($_POST['flux']) && $_POST['flux']=="https://www.01net.com/rss/photo/" ? "checked" : "" ?>><label class="ms-2" for="flux3">Photo</label>
          </div>
          <div class="radio">
            <input type="radio" name="flux" id="flux4" value="https://www.01net.com/rss/actualites/culture-medias/" <?= isset($_POST['flux']) && $_POST['flux']=="https://www.01net.com/rss/actualites/culture-medias/" ? "checked" : "" ?>><label class="ms-2" for="flux4">Culture médias</label>
          </div>
          <div class="radio">
            <input type="radio" name="flux" id="flux5" value="https://www.01net.com/rss/actualites/buzz-societe/" <?= isset($_POST['flux']) && $_POST['flux']=="https://www.01net.com/rss/actualites/buzz-societe/" ? "checked" : "" ?>><label class="ms-2" for="flux5">Buzz</label>
          </div>
      </div>
   
      <h2 class="h2Titre mt-3">Nombre d'articles</h2>
      <div class="ms-5 p-0 mt-3 param">
        <div class="radio2" >
          <input type="radio" name="choix" id="choix1" value="5" <?= isset($_POST['choix']) && $_POST['choix']=="5" ? "checked" : "" ?> required><label class="ms-2" for="choix1">5</label>
        </div>
        <div class="radio2">
          <input type="radio" name="choix" id="choix2" value="10" <?= isset($_POST['choix']) && $_POST['choix']=="10" ? "checked" : "" ?>><label class="ms-2" for="choix2"> 10</label>
        </div>
        <div class="radio2">
        <input type="radio" name="choix" id="choix3" value="15" <?= isset($_POST['choix']) && $_POST['choix']=="15" ? "checked" : "" ?>><label class="ms-2" for="choix3">Tout</label>
        </div>
        
      </div>

      <h2 class="h2Titre mt-3">Thèmes</h2>
      <div class="ms-5 p-0 mt-3 param">
        <div class="radio2" >
          <input type="radio" name="theme" id="theme1" value="default" <?= isset($_POST['theme']) && $_POST['theme']=="default" ? "checked" : "" ?>><label class="ms-2" for="theme1">Default</label>
        </div>
        <div class="radio2">
          <input type="radio" name="theme" id="theme2" value="licorne" <?= isset($_POST['theme']) && $_POST['theme']=="licorne" ? "checked" : "" ?>><label class="ms-2" for="theme2">Licorne</label>
        </div>
        <div class="radio2">
          <input type="radio" name="theme" id="theme3" value="jacky" <?= isset($_POST['theme']) && $_POST['theme']=="jacky" ? "checked" : "" ?>><label class="ms-2" for="theme3">Jacky Tuning</label>
        </div>
        <div class="radio2">
          <input type="radio" name="theme" id="theme4" value="bflux" <?= isset($_POST['theme']) && $_POST['theme']=="bflux" ? "checked" : "" ?>><label class="ms-2" for="theme4">Sombre</label>
        </div>
        
      </div>

      <h2 class="h2Titre"><button type="submit" class="submit d-block mx-auto mt-1" id="submit" name="submit">valider</button> </h2>
</div>
      </form>
    </div>
  
    <div id="main" class="justify-content-center">
      <button class="openbtn" id="btnOpen"  onclick="openNav()" >&#9776; </button>
    <?php
    ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="banner">
                    <h1>NETFLUX</h1>
                    <h5 class="ms-5"><?= isset($_POST['submit']) && isset($_POST['choix']) ? $rss->channel->title : "" ?></h5>
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
                            <img src="<?= $image[0]['url'] ?>" class="card-img-top d-block img-fluid" style="height: 200px;" >
                            <div class="card-header text-end">
                                <?= $pub ?>
                            </div>
                            <div class="card-body text-center">
                                <h6 class="card-title mt-4 mb-4"><?= $rss->channel->item[$i]->title ?></h6>
                                <button type="button" class="btnCard my-auto" data-bs-toggle="modal" data-bs-target="#card<?=$i?>">Infos</button>
                            </div>
                        </div>

                        <div class="modal fade" id="card<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content desciptionModal">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $rss->channel->item[$i]->title ?></h5>
                                        <button type="button" class="btn-close modalClose" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>  
                                    <div class="modal-body">
                                        <img src="<?= $image[0]['url'] ?>" class="d-block img-fluid">
                                        <p class="mt-4 desciptionModal"><?=$jacky[0]?></p>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-start">
                                            <span class="m-2"><?= $pub ?></span>
                                        </div>
                                        <div class="col-md-6 text-end">
                                        <a href="<?= $rss->channel->item[$i]->link ?>" target="_blank">
                                            <button class="btn linkArticle mx-auto">Accéder à l'article</button>
                                            </a>
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
<script src="assets/js/script.js?v=2"></script>

</html>