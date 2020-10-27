<?php 
class PDOConnectionHelper { 
    
    private $host; 
    private $dbname; 
    private $user; 
    private $passwd; 
    public $conn;

   

    public function connectDB() {
    try {
    $conn = new PDO("mysql:host=localhost;dbname=locationhertz", "root", "");
    $this->conn =$conn;
    
    echo "Connexion à la DB réussi";
    return $conn;
    } catch (PDOException $e) {
    print "Erreur :".$e->getMessage();
    }
  
    
    }

    public function getAllClient() {
    $sql = "SELECT * FROM client";

    return $this->conn->query($sql);
    }


    public function getAllVehicules($conn) {
    $sql="SELECT * FROM vehicule";

     $afficher=$conn->query($sql);
     while($vehicule = $afficher->fetch())
      {
        echo $vehicule['id_Vehicule']."<br />";
        echo $vehicule['nom_Vehicule']."<br />";
        echo $vehicule['en_location_Vehicule']."<br />";
        echo $vehicule['retard_Vehicule']."<br />";
        echo $vehicule['nombredesjoursretard_Vehicule']."<br />";
        echo $vehicule['datedebut_Vehicule']."<br />";
        echo $vehicule['prix_Vehicule']."<br />";
        echo $vehicule['image_Vehicule']."<br />";
        echo $vehicule['client_id_client']."<br />";
      }
    
    }

    public function getConn() {
    return $this->conn;
    }

    public function getAllClientLocation($conn) {
    $sql = "SELECT * FROM client WHERE loue_Client = 1";
    $afficher=$conn->query($sql);
    while($client = $afficher->fetch())
     {
       echo $client['id_Client']."<br />";
       echo $client['prenom_Client']."<br />";
       echo $client['nom_Client']."<br />";
       echo $client['adresse_Client']."<br />";
       echo $client['codepostal_Client']."<br />";
       echo $client['ville_Client']."<br />";
       echo $client['location_Client']."<br />";
       echo $client['loue_Client']."<br />";
       echo $client['vehicule_id_vehicule']."<br />";
     }
    }

    public function ajouterVehicule($conn, $objVehicule, $objClient) {
    $sql = "INSERT INTO vehicule (nom_Vehicule,en_location_Vehicule ,retard_Vehicule,nombredesjoursretard_Vehicule,datedebut_Vehicule, datefin_Vehicule,prix_Vehicule,image_Vehicule,client_id_client) VALUES (:nomV,:en_location,:retard,:retardj,:datedebut,:datefin,:prix,:img,:)";
    $ajouter=$conn->prepare($sql);
    $ajouter->bindParam(":nomV",$objVehicule->getNom());   
    $ajouter->bindParam(":en_location",$objVehicule->getEnLocation());   
    $ajouter->bindParam(":retard",$objVehicule->getRetard());
    $ajouter->bindParam(":retardj",$objVehicule->getNrJRetard());
    $ajouter->bindParam(":datedeb",$objVehicule->getDateDeb());
    $ajouter->bindParam(":datefin",$objVehicule->getDateFin());
    $ajouter->bindParam(":prix",$objVehicule->getPrix());
    $ajouter->bindParam(":img",$objVehicule->GetImage());
    $ajouter->bindParam(":idClient",$objClient);
}

    public function effacerVehicule($conn, $id){
        $sql="DELETE FROM vehicule WHERE id_Vehicule = :id";
        $delete = $conn->prepare($sql);
        $delete->bindParam(":id",$id);
        $ok=$delete->execute();
        if($ok)
        {
            echo "Ok!";
        }else{
            echo "No Ok!";
        }
        

    }

    public function majVehicule($conn, $id,$objVehicule){
        $sql="UPDATE vehicule SET nom_Vehicule =:nomV , en_location_Vehicule =:en_location,retard_Vehicule =:retard,nombredesjoursretard_Vehicule = :retardj,datedebut_Vehicule = :datedebut, datefin_Vehicule = :datefin,prix_Vehicule = :prix,image_Vehicule = :img,client_id_client = :clientid WHERE id_Vehicule = :id";
        $maj = $conn->prepare($sql);
        $maj->bindParam(":id",$id);
        $maj->bindParam(":nom_Vehicule",$objVehicule->getNom());   
        $maj->bindParam(":en_location",$objVehicule->getEnLocation());   
        $maj->bindParam(":retard",$objVehicule->getRetard());
        $maj->bindParam(":retardj",$objVehicule->getNrJRetard());
        $maj->bindParam(":datedeb",$objVehicule->getDateDeb());
        $maj->bindParam(":datefin",$objVehicule->getDateFin());
        $maj->bindParam(":prix",$objVehicule->getPrix());
        $maj->bindParam(":img",$objVehicule->GetImage());
        $ok=$maj->execute();

        if($ok)
        {
            echo "Ok!";
        }else{
            echo "No Ok!";
        }
        

    }
    }

    ?>
