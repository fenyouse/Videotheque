<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="charset=utf-8" />
      <title>Videotheque</title>
      <meta name="keywords" content="" />
      <meta name="description" content="" />
    
      <link href="views/css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link rel="stylesheet" href="views/css/kickstart.css" media="all" />
      <link rel="shortcut icon" href="views/images/logo.ico">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="views/js/kickstart.js"></script> 
      
  </head>
    
  <body>
      
      <div id="header_background">
        <div id="header" >
            <div id="titre">
                <h1><a href="<?php echo $app->urlFor('images') ?>">Videotheque</a></h1>
            </div>

            <div id="menu">
                
                <?php 
                    if(isset($_SESSION['id_utilisateur'])>0)
                { 
                ?>
                    <ul>
                        <li><a href="<?php echo $app->urlFor('Bibliotheque') ?>"> Bibliotheque</a></li>
                        <li><a href="<?php echo $app->urlFor('deconnexion') ?>" >Déconnection</a></li>
                        <li><a href="<?php echo $app->urlFor('profil') ?>">Profil</a></li>
                    </ul>
                <?php
                   }
                    else{ 
                
                ?>
                        <div id="identification">
                            
                            <button class="tooltip medium  pill" data-content="#tooltipcontentID" data-action="click">Connexion</button>
                            
                            <div class="tooltip-content" id="tooltipcontentID">

                                  <form role="form" method="POST" action="<?php echo $app->urlFor('connexion') ?>">
                                    

                                    <input type="text" name="Pseudo" placeholder="Pseudo">
                                    <input type="password" name="MotDePasse" placeholder="Mot de passe">
                                    <button type="submit">OK!</button>
                                </form>

                                <a href="<?php echo $app->urlFor('inscription') ?>">Créer un compte</a>

                            </div>

                        </div>
                <?php

                    }
                ?>
                

            </div>
        </div>
    </div>
      
      
      <?php 
        // my view content will be placed here
        echo $yield;
      ?>
       
  </body>
</html>
