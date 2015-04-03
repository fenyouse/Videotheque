<?php
    class Image {
        
        public static function all() {
            
            $bdd = DB::connexion_bdd();
            $ma_requete = $bdd->prepare('SELECT * FROM img ORDER BY date DESC');
            $res = $ma_requete->execute();
            $toto = $ma_requete->fetchAll();
            return $toto;
        return true;   
        }
        
        public static function getImage($image_id) {
            $bdd = DB::connexion_bdd();
            $ma_requete = $bdd->prepare("SELECT * FROM img WHERE id = $image_id");
            $res = $ma_requete->execute();
            return $ma_requete->fetchAll();
        return true;
        } 
    }


?>
