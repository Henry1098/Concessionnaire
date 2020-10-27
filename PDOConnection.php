<?php 
class PDOConnectionHelper { 
    
    private $host; 
    private $dbname; 
    private $user; 
    private $passwd; 
    private $conn;

    public function ___construct($host, $dbname, $user, $passwd) 
    {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $user;
    $this->passwd = $passwd;
    $this->conn = connectDB();
    }

    private function connectDB() {
    try {
    $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", $this->user, $this->passwd);
    // echo "Connexion à la DB réussi";
    } catch (PDOException $e) {
    print "Erreur :".$e->getMessage();
    }

    return $conn;
    }

    public function getAllClient() {
    $sql = "SELECT * FROM client";

    return $this->conn->query($sql);
    }


    public function getAllVehicules() {
    $sql = "SELECT * FROM vehicule";

    return $this->conn->query($sql);
    }

    public function getConn() {
    return $this->conn;
    }

    public function getAllClientsLocation($conn) {
    $sql = "SELECT * FROM client WHERE loue_Client = 1";
    $getClient = $conn->query($sql);

    return $getClient;
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
