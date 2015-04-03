<?php

  //Slim initialisation
  session_start();


  // require composer autoload (load all my libraries)
  require 'vendor/autoload.php';
  include_once ('models/connexion_bdd.php');
  include_once ('models/Book.php');
  include_once ('models/user.php');

  




$app = new \Slim\Slim(array(
  'view' => '\Slim\LayoutView',
  'layout' => 'layouts/main.php'
));

// hook before.router, now $app is accessible in my views
  $app->hook('slim.before.router', function () use ($app) {
    $app->view()->setData('app', $app);
  });


  // views initiatilisation
  $view = $app->view();
  $view->setTemplatesDirectory('views');

  // GET /
  $app->get('/', function() use ($app) {
    $image = Image::all();
    $app->render(
        'index_images.php',
        array("image"=>$image)
    );
  })->name('root');


 // GET /images
  $app->get('/images', function() use ($app) {
    $image = Image::all();
    if($image) {
      $app->render(
          'index_images.php',
          array("image" => $image)
      );
    }
  })->name('images');


  // GET /images/:image_id
  $app->get('/images_:image_id', function ($image_id) use ($app) {
    $image = Image::getImage($image_id);
    if($image) {
      $app->render(
        'show_images.php',
        array("image" => $image)
      );
    }
})->name('image_individuelle');


// GET /gifs
  $app->get('/gifs', function() use ($app) {
      $gifs = Gif::all();
    if($gifs) {
      $app->render(
          'index_gif.php',
          array("gifs" => $gifs)
      );
    }
  })->name('gifs');


 // GET /gifs/:gif_id
  $app->get('/gifs_:gif_id', function ($gif_id) use ($app) {
    $gifs = Gif::getGif($gif_id);
    $app->render(
        'show_gifs.php',
        array(
            "gif" => $gifs
        )
    );
  })->name('gifs_individuelle');

// GET /videos
  $app->get('/videos', function() use ($app) {
      $video = Video::all();
    if($video) {
      $app->render(
          'index_videos.php',
          array("videos" => $video)
      );
    }
  })->name('videos');

 // GET /videos/:video_id
  $app->get('/videos_:video_id', function ($video_id) use ($app) {
    $videos = Gif::getVideo($video_id);
    $app->render(
        'show_videos.php',
        array(
            "video" => $video
        )
    );
  })->name('videos_individuelle');


// GET inscription.php
     $app->get('/inscription', function () use ($app) {
    
        $app->render('inscription.php');
      
  })->name('inscription');

//POST inscription.php
$app->post('/inscription', function () use ($app) {
        user::inscription($_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['mdp'], $_POST['mdp_confirm'], $_POST['mail'], $_POST['mail_confirm']);
        $app->render('inscription.php');
      
  })->name('inscription_valide');


// GET connexion.php
  $app->post('/connexion', function () use ($app) {
      $connected= user::connexion($_POST['Pseudo'], $_POST['MotDePasse']);

      if($connected){
         $app->redirect($app->urlFor('profil'));
      }
      else{
         
            $image = Image::all();
            $app->render(
                'index_images.php',
                array("image" => $image)
                
            );
      }
  })->name('connexion');


// GET deconnexion.php
    $app->get('/deconnexion', function() use ($app) {
       $deconnected = user::deconnexion();

        $app->redirect($app->urlFor('images'));


  })->name('deconnexion');


// GET profil.php
  $app->get('/profil', function () use ($app) {
    $app->render(
        'profil.php'
    );
  })->name('profil');


// POST UpdateIdentite
  $app->post('/UpdateIdentite', function () use ($app) {

        $Update = user::UpdateIdentite($_POST['pseudo'], $_POST['nom'], $_POST['prenom']);
        $app->redirect($app->urlFor('profil'));

  } )->name('UpdateIdentite');



// POST UpdateMDP
  $app->post('/UpdateMDP', function () use ($app) {

        $Update = user::UpdateMDP($_POST['Oldmdp'], $_POST['mdp'], $_POST['mdp_confirm']);
        $app->redirect($app->urlFor('profil'));

  } )->name('UpdateMDP');



// POST UpdateEmail
  $app->post('/UpdateEmail', function () use ($app) {

        $Update = user::UpdateEmail($_POST['mail'], $_POST['mail_confirm']);
        $app->redirect($app->urlFor('profil'));

  } )->name('UpdateEmail');



// POST UploadImage
  $app->post('/UploadImage', function () use ($app) {

        $Update = user::UploadImage($_POST['Titre'], $_FILES['Image']);
        $app->redirect($app->urlFor('profil'));

  } )->name('UploadImage');



// POST UploadGif
  $app->post('/UploadGif', function () use ($app) {

        $Update = user::UploadGif($_POST['Titre'], $_FILES['Gif']);
        $app->redirect($app->urlFor('profil'));

  } )->name('UploadGif');



// POST UploadVideo
  $app->post('/UploadVideo', function () use ($app) {

        $Update = user::UploadVideo($_POST['Titre'], $_POST['video']);
        $app->redirect($app->urlFor('profil'));

  } )->name('UploadVideo');


  // always need to be at the bottom of this file !
  $app->run();
