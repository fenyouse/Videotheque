<?php

    class user {
        
        public static function inscription($prenom, $nom, $pseudo, $mdp, $mdp_confirm, $mail, $mail_confirm) {
            $bdd=DB::connexion_bdd();
            
            $prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
            $nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
            $pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
            $mdp = $_POST['mdp'];
            $mdp_confirm = $_POST['mdp_confirm'];
            $mail = mysql_real_escape_string(htmlspecialchars($_POST['mail']));
            $mail_confirm = mysql_real_escape_string(htmlspecialchars($_POST['mail_confirm']));
        
            if($mdp==$mdp_confirm){
                if($mail==$mail_confirm){
                    if(isset($pseudo)){
                    
                        $req = $bdd->prepare('INSERT INTO utilisateurs(Prenom, Nom, Pseudo, MotDePasse, Email) VALUES(:prenom, :nom, :pseudo, :mdp, :mail)');
                                $req->execute(array(

                                'prenom' => $prenom,
                                'nom' => $nom,
                                'pseudo' => $pseudo,
                                'mdp' => $mdp,
                                'mail' => $mail
                                ));
                            return true;
                    }
                    else{
                        echo "Entrer un pseudo.";
                    }
                }
                else {
                        echo "Les deux courriels indiqué ne corresponde pas.";
                }
            }
            else {
                echo "Les deux mot de passe indiqué ne corresponde pas.";
            }
        }


        public static function deconnexion() {
            $_SESSION=array();
            session_destroy();
        
        }


        public static function connexion($pseudo,$mdp) {
            $bdd = DB::connexion_bdd();

            $pseudo = $_POST['Pseudo'];
            $mdp = $_POST['MotDePasse'];

            if(isset($pseudo) AND $pseudo!="" AND isset($mdp) AND $mdp!="") {
                    


                $sql ="SELECT * FROM utilisateurs WHERE Pseudo='".$pseudo."' AND MotDePasse='".$mdp."'";
                $req = $bdd->prepare($sql);
                $result = $req-> execute();
                $result = $req-> fetch();

                $_SESSION['id_utilisateur'] = $result['ID'];
                $_SESSION['Prenom'] = $result['Prenom'];
                $_SESSION['Nom'] = $result['Nom'];
                $_SESSION['Pseudo'] = $result['Pseudo'];
                $_SESSION['Email'] = $result['Email'];




            }
            
        }
         public static function UpdateIdentite($pseudo, $nom, $prenom){

            $pseudo = $_POST['pseudo'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];



        }


        public static function UpdateMDP($Oldmdp, $mdp, $mdp_confirm){

            $Oldmdp = $_POST['Oldmdp'];
            $mdp = $_POST['mdp'];
            $mdp_comfirm = $_POST['mdp_confirm'];



        }


        public static function UpdateEmail($mail, $mail_confirm){

            $mail = $_POST['mail'];
            $mail_comfirm = $_POST['mail_confirm'];


        }


        public static function UploadImage($Titre, $Files){

            $titre = $_POST['Titre'];
            $Files = $_FILES['Image'];


            if (isset($Files) AND $Files['error'] == 0)
            {
                    // Testons si le fichier n'est pas trop gros
                    if ($Files['size'] <= 2000000)
                    {
                            // Testons si l'extension est autorisée
                            $infosfichier = pathinfo($Files['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'png');
                            if (in_array($extension_upload, $extensions_autorisees))
                            {
                                    // On peut valider le fichier et le stocker définitivement
                                    move_uploaded_file($Files['tmp_name'], 'views/images/image/' . basename($Files['name']));
                                    echo "L'envoi a bien été effectué !";

                                    $bdd = DB::connexion_bdd();
                                    $req = $bdd->prepare('INSERT INTO img (titre, nom_image, auteur) VALUES(?,?,?)');
                                    $req->execute(array(
                                        $titre,
                                        $Files['name'],
                                        $_SESSION['Pseudo']
                                    ));


                            }
                            else echo "Fichier n'est pas une image";
                    }
                    else echo "Fichier trop gros";
            }
        }




        public static function UploadGif($titre, $Files){

            $titre = $_POST['Titre'];
            $Files = $_FILES['Gif'];

            $bdd = DB::connexion_bdd();
            if (isset($Files) AND $Files['error'] == 0)
            {
                    // Testons si le fichier n'est pas trop gros
                    if ($Files['size'] <= 2000000)
                    {
                            // Testons si l'extension est autorisée
                            $infosfichier = pathinfo($Files['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees =array('gif', 'mp4');
                            if (in_array($extension_upload, $extensions_autorisees))
                            {
                                    // On peut valider le fichier et le stocker définitivement
                                    move_uploaded_file($Files['tmp_name'], 'views/images/gif/' . basename($Files['name']));
                                    echo "L'envoi a bien été effectué !";

                                    $bdd = DB::connexion_bdd();
                                    $req = $bdd->prepare('INSERT INTO gif (titre, nom_image, auteur) VALUES(?,?,?)');
                                    $req->execute(array(
                                        $titre,
                                        $Files['name'],
                                        $_SESSION['Pseudo']
                                    ));


                            }
                            else echo "Fichier n'est pas un Gif";
                    }
                    else echo "Fichier trop gros";
            }
        }




        public static function UploadVideo($titre, $Files){

            $titre = $_POST['Titre'];
            $video = $_POST['video'];

            $bdd = DB::connexion_bdd();

            $req = $bdd->prepare('INSERT INTO video (titre, auteur, lien) VALUES(?,?,?)');
            $req->execute(array(
                $titre,
                $_SESSION['Pseudo'],
                $video
            ));

        }






















    }
?>
