<?php
function connectionDB()
{
    try{
        $conn = new PDO("mysql:host=localhost;dbname=locationhertz","root","");
        echo "Connexion à la DB réussi";
    }catch(PDOException $e)
    {
        print "Erreur :".$e->getMessage();
    }
}


?>