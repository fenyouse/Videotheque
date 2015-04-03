<div class="article">

    <div class="content_gauche">

        <form method="post" action="<?php echo $app->urlFor('UpdateIdentite'); ?>" class="profil">
            <p>
            <label for="pseudo">Identité</label><br/>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo : <?php echo $_SESSION['Pseudo'] ?>" size="30" /><br/><br/>
            <input type="text" name="nom" id="nom" placeholder="Nom : <?php echo $_SESSION['Nom'] ?>" size="30" /><br/><br/>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom : <?php echo $_SESSION['Prenom'] ?>" size="30" /><br/><br/>

            <input type="submit" value="Valider la/les modification(s)" class="valider" />
        </form>

        <form method="post" action="<?php echo $app->urlFor('UpdateMDP'); ?>" class="profil">
            <label for="mdp">Changer votre mot de passe</label><br />
            <br />
            <input type="password" name="Oldmdp" id="Oldmdp" placeholder="Ancien mot de passe" size="30" /><br /><br />
            <input type="password" name="mdp" id="mdp" placeholder="Nouveau mot de passe" size="30" /><br />
            <input type="password" name="mdp_confirm" id="mdp_confirm" placeholder="Comfirmer mot de passe" size="30" /> <br/><br/>

            <input type="submit" value="Valider la modification" class="valider" />
        </form>

        <form method="post" action="<?php echo $app->urlFor('UpdateEmail'); ?>" class="profil">
            <label for="mail">Modifier votre courriel</label><br />
            <br />
            <input type="email" name="mail" id="mail"  placeholder="Nouvelle email" size="30" /><br />
            <input type="email" name="mail_confirm" id="mail_confirm" placeholder="Comfirmer nouvelle email" size="30" />
            <br />

            <br />

            <input type="submit" value="Valider la modification" class="valider" />
            </p>

        </form>

    </div>

    <div class="content_droite">
       <form action="<?php echo $app->urlFor('UploadImage'); ?>" method="post" class="profil" enctype="multipart/form-data">
            <p>
                    Upload d'image (jpg,jpeg,png) :<br/>
                    <input type="text" name="Titre" id="Titre" placeholder="Titre" size="30" /><br/>
                    <input type="file" name="Image" /><br/>
                    <input type="submit" value="Envoyer le fichier" />
            </p>
        </form>

        <form action="<?php echo $app->urlFor('UploadGif'); ?>" method="post"  class="profil"enctype="multipart/form-data">
            <p>
                    Upload d'une image gif :<br/>
                    <input type="text" name="Titre" id="Titre" placeholder="Titre" size="30" /><br/>
                    <input type="file" name="Gif" /><br/>
                    <input type="submit" value="Envoyer le fichier" />
            </p>
        </form>

        <form action="<?php echo $app->urlFor('UploadVideo'); ?>" method="post" class="profil">
            <p>
                    Upload de vidéo (You Tube) :<br/>
                    <input type="text" name="Titre" id="Titre" placeholder="Titre" size="30" /><br/>
                    <input type="text" name="video" id="video" placeholder="URL You Tube" size="30" /><br />
                    <input type="submit" value="Envoyer la vidéo" />
            </p>
        </form>
    </div>

</div>