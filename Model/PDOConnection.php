<?php 
class PDOConnectionHelper { 
    
    private $host; 
    private $dbname; 
    private $user; 
    private $passwd; 
    private $conn;

   

    public function connectDB() {
    try {
    $conn = new PDO("mysql:host=localhost;dbname=locationhertz", "root", "");
    $this->conn =$conn;
    
   // echo "Connexion à la DB réussi";
    return $conn;
    } catch (PDOException $e) {
    print "Erreur :".$e->getMessage();
    }
  
    
    }

    public function getAllClient($conn) {
    $sql = "SELECT * FROM client";

    $afficher=$conn->query($sql);
    
    while($client = $afficher->fetch())
      {
        echo '<tr><th>'. $client["id_Client"].'</th>';
        echo "                      <th>".$client["prenom_Client"]."</th>";
        echo "                      <th>".$client["nom_Client"]."</th>";
        echo "                      <th>".$client["adresse_Client"]."</th>";
        echo "                      <th>".$client["codepostal_Client"]."</th>";
        echo "                      <th>".$client["ville_Client"]. "</th>";
        echo "					  <th>".$client["loue_Client"] ."</th>";
        echo "                    </tr>";
      }
    }


    public function AllVehicules($conn) {
        $sql="SELECT * FROM vehicule";
    
        return $afficher=$conn->query($sql);
    }   

    public function AllClients($conn) {
        $sql="SELECT * FROM client";
    
        return $afficher=$conn->query($sql);
    }    

    public function VehiculeById($conn,$id) {
        $sql="SELECT * FROM vehicule WHERE id_Vehicule = ".$id;
        
        return $afficher=$conn->query($sql);
    }
    public function ClientById($conn,$id) {
        $sql="SELECT * FROM client WHERE id_Client = ".$id;
        
        return $afficher=$conn->query($sql);
    }

    public function getAllVehicules($conn) {
    $sql="SELECT * FROM vehicule";

     $afficher=$conn->query($sql);
     while($vehicule = $afficher->fetch())
      {
        echo '<tr><th>'. $vehicule["id_Vehicule"].'</th>';
        echo "                      <th>".$vehicule["nom_Vehicule"]."</th>";
        echo "                      <th>".$vehicule["marque_Vehicule"]."</th>";
        echo "                      <th>".$vehicule["en_location_Vehicule"]."</th>";
        echo "					  <th>".$vehicule["prix_Vehicule"]."</th>";
       
        echo '					  <th><img src="'.$vehicule["image_Vehicule"] .'" class="img-fluid"></th>'; 
        echo "                    </tr>";
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
       echo $client['loue_Client']."<br />";
     }
    }

    public function ajouterVehicule($conn, $objVehicule) {
    $sql = "INSERT INTO vehicule(nom_Vehicule, marque_Vehicule,en_location_Vehicule, prix_Vehicule, image_Vehicule)
     VALUES (:nomV,:marque,:en_location,:prix,:img)";
    $nom=$objVehicule->getNom();
    $loc=$objVehicule->getEnLocation();
    $prix =$objVehicule->getPrix();
    $img=$objVehicule->GetImage();
    $marque=$objVehicule->getMarque();
    $ajouter=$conn->prepare($sql);
    $ajouter->bindParam(":nomV",$nom,PDO::PARAM_STR);
    $ajouter->bindParam(":marque",$marque,PDO::PARAM_STR);     
    $ajouter->bindParam(":en_location",$loc,PDO::PARAM_STR); 
    $ajouter->bindParam(":prix",$prix,PDO::PARAM_INT);
    $ajouter->bindParam(":img",$img,PDO::PARAM_STR);
    $ok=$ajouter->execute();
    if($ok)
    {
        echo '<div class="alert alert-primary" role="alert">
        Le Vehicule a été ajouté dans la Base de données!
      </div>';         }else{
          
        
        echo '<div class="alert alert-primary" role="alert">
        Le Vehicule n\'as pas être ajouté dans la Base de données!
      </div>';     
          }
}

public function ajouterClient($conn, $objClient) {
    $sql = "INSERT INTO client(prenom_Client, nom_Client, adresse_Client, codepostal_Client, ville_Client, loue_Client) VALUES (:prenom,:nom,:adresse,:codepostal,:ville,:loue)";
    
    $prenom=$objClient->getPrenom();
    $nom=$objClient->getNom();
    $adresse=$objClient->getAdresse();
    $cp=$objClient->getCodePostal();
    $ville=$objClient->getVille();
    $loue =$objClient->getLoue();;

    $ajouterClient=$conn->prepare($sql);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ajouterClient->bindParam(":prenom",$prenom,PDO::PARAM_STR);   
    $ajouterClient->bindParam(":nom",$nom,PDO::PARAM_STR);   
    $ajouterClient->bindParam(":adresse",$adresse,PDO::PARAM_STR);
    $ajouterClient->bindParam(":codepostal",$cp,PDO::PARAM_INT);
    $ajouterClient->bindParam(":ville",$ville,PDO::PARAM_STR);
    $ajouterClient->bindParam(":loue",$loue,PDO::PARAM_STR);
    $ok=$ajouterClient->execute();
    if($ok)
    {
        echo '<div class="alert alert-primary" role="alert">
        Vos données ont été enregistré avec succes!
      </div>';
    }else{
        echo '<div class="alert alert-primary" role="alert">
        Vos données n\'ont malheureusement pas pu être enregistrées!
      </div>'; 
    }
}
    public function effacerVehicule($conn, $id){
        $sql="DELETE FROM vehicule WHERE id_Vehicule = :id";
        $delete = $conn->prepare($sql);
        $delete->bindParam(":id",$id);
        $ok=$delete->execute();
        if($ok)
        {
            echo '<div class="alert alert-primary" role="alert">
            Le Vehicule a été effacé!
          </div>';        }else{
            echo '<div class="alert alert-primary" role="alert">
            Le vehicule n\'as pas pu être effacées!
          </div>';
        }
        

    }


    public function effacerClient($conn, $id){
        $sql="DELETE FROM client WHERE id_Client = :id";
        $delete = $conn->prepare($sql);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $delete->bindParam(":id",$id);
        $ok=$delete->execute();
        if($ok)
        {
            echo '<div class="alert alert-primary" role="alert">
            Le Client a été effacé!
          </div>';     
        }else{
            echo '<div class="alert alert-primary" role="alert">
            Le Client n\'as pas pu être effacé!
          </div>';     
        }
        

    }
    public function majVehicule($conn, $id,$objVehicule){
        $sql="UPDATE vehicule SET 
        nom_Vehicule =:nomV, 
        marque_Vehicule=:marque,
        en_location_Vehicule =:en_location,
         prix_Vehicule = :prix,
         image_Vehicule = :img WHERE id_Vehicule = :id";
     
        $nom=$objVehicule->getNom();
        $loc=$objVehicule->getEnLocation();
        $prix =$objVehicule->getPrix();
        $img=$objVehicule->GetImage();
        $marque=$objVehicule->getMarque();

        $maj = $conn->prepare($sql);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $maj->bindParam(":nomV",$nom,PDO::PARAM_STR);
        $maj->bindParam(":marque",$marque,PDO::PARAM_STR);    
        $maj->bindParam(":en_location",$loc,PDO::PARAM_STR);   
        $maj->bindParam(":prix",$prix,PDO::PARAM_INT);
        $maj->bindParam(":img",$img,PDO::PARAM_LOB);
        $maj->bindParam(":id",$id,PDO::PARAM_INT);
        $ok=$maj->execute();

        if($ok)
        {
            echo '<div class="alert alert-primary" role="alert">
            Le Vehicule a été mise à jour!
          </div>';     
        }else{
            echo '<div class="alert alert-primary" role="alert">
            Le Vehicule n\'a pas pu être mise à jour!
          </div>';     
        }
        

    }

    public function majClient($conn, $id,$objClient){
        $sql="UPDATE client SET 
        prenom_Client =:prenom, 
        nom_Client =:nom,
        adresse_Client =:adresse,
        codepostal_Client = :codepostal,
        ville_Client = :ville,
        loue_Client = :loue WHERE id_Client = :id";
     


     $prenom=$objClient->getPrenom();
     $nom=$objClient->getNom();
     $adresse=$objClient->getAdresse();
     $cp=$objClient->getCodePostal();
     $ville=$objClient->getVille();
     $loue =$objClient->getLoue();
 
     $ajouterClient=$conn->prepare($sql);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $ajouterClient->bindParam(":prenom",$prenom,PDO::PARAM_STR);   
     $ajouterClient->bindParam(":nom",$nom,PDO::PARAM_STR);   
     $ajouterClient->bindParam(":adresse",$adresse,PDO::PARAM_STR);
     $ajouterClient->bindParam(":codepostal",$cp,PDO::PARAM_INT);
     $ajouterClient->bindParam(":ville",$ville,PDO::PARAM_STR);
     $ajouterClient->bindParam(":loue",$loue,PDO::PARAM_STR);
     $ajouterClient->bindParam(":id",$id,PDO::PARAM_INT);
     $ok=$ajouterClient->execute();
        if($ok)
        {
            echo '<div class="alert alert-primary" role="alert">
            Les données du clients ont été mise à jour!
          </div>';             }else{
            echo '<div class="alert alert-primary" role="alert">
            Les données du clients n\'ont pas pu être mise à jour!
          </div>';     
        }
        

    }
    
    }

    ?>
