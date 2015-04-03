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


    class Gif {
            public static function all() {
                $bdd = DB::connexion_bdd();
                $ma_requete = $bdd->prepare('SELECT * FROM gif ORDER BY date DESC');
                $res = $ma_requete->execute();
                return $ma_requete->fetchAll();
            return true;
            }
        
            public static function getGif($gif_id) {
                $bdd = DB::connexion_bdd();
                $ma_requete = $bdd->prepare("SELECT * FROM gif WHERE id = $gif_id");
                $res = $ma_requete->execute();
                return $ma_requete->fetchAll();
            return true;
            } 
        } //commit

    class Video {
            public static function all() {
                $bdd = DB::connexion_bdd();
                $ma_requete = $bdd->prepare('SELECT * FROM video ORDER BY date DESC');
                $res = $ma_requete->execute();
                return $ma_requete->fetchAll();
            return true;
            }
        
            public static function getVideo($video_id) {
                $bdd = DB::connexion_bdd();
                $ma_requete = $bdd->prepare("SELECT * FROM video WHERE id = $video_id");
                $res = $ma_requete->execute();
                return $ma_requete->fetchAll();
            return true;
            } 
        }
?>
