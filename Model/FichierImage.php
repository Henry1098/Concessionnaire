<?php

class FichierImage{

    public function transfert(){
        $ret        = false;
        $img_taille = 0;
        $img_nom    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];
            $uploads_dir = 'uploads';
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_nom  = $_FILES['fic']['name'];

           
                move_uploaded_file($_FILES['fic']['tmp_name'], "$uploads_dir/$img_nom");
           
            
            return "$uploads_dir/$img_nom";
        }
    }



}
?>