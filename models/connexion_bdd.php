<?php
	class DB {
	    
	    public static function connexion_bdd(){
	        try {   
	            return new PDO('mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_8acaed026551ac4', 'bfefcb3bcbbc30', '752fd298', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	        }
	        catch (Exception $e) {
	            die('Erreur : ' . $e->getMessage());
	        }
	    }
	}
?>
