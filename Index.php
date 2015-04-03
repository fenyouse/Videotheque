<?php

  //Slim initialisation
  session_start();

  // require composer autoload (load all my libraries)
  require 'vendor/autoload.php';
  include_once ('models/connexion_bdd.php');
  include_once ('models/Library.php');
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
           $app->redirect($app->urlFor('/'));  
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


// POST Update
  $app->post('/Update', function () use ($app) {

        $Update = user::Update($_POST['pseudo'], $_POST['nom'], $_POST['prenom']);
        $app->redirect($app->urlFor('profil'));

  } )->name('Update');




  // always need to be at the bottom of this file !
  $app->run();
