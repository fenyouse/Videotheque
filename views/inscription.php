<form method="post" action="<?php echo $app->urlFor('inscription'); ?>" class="inscription">
    <p>
        <label for="pseudo">Pseudo</label><br />
	<input type="text" name="pseudo" id="pseudo" size="30" />
        <br />
						
	<br />
        <label for="nom">Nom</label><br />
	<input type="text" name="nom" id="nom" size="30" />
        <br />
        
        <br />
        <label for="prenom">Prénom</label><br />
	<input type="text" name="prenom" id="prenom" size="30" />
        <br />
        <br />
					
	<label for="mdp">Mot de passe</label><br />
	<input type="password" name="mdp" id="mdp" size="30" /><br />
						
	<label for="mdp_confirm">Confirmez votre mot de passe</label><br />
	<input type="password" name="mdp_confirm" id="mdp_confirm" size="30" />
        <br />
						
	<br />
						
	<label for="mail">Adresse email</label><br />
	<input type="email" name="mail" id="mail" size="30" /><br />
						
	<label for="mail_confirm">Confirmez votre adresse email</label><br />
	<input type="email" name="mail_confirm" id="mail_confirm" size="30" />
        <br />
						
	<br />
						
	<input type="submit" value="Valider" class="valider" />
    </p>
    
</form>