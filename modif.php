<?php



session_start();

require "header.php";
include "Model/User.php";

$user = new UserId();
$connected=$user->isConnected();
if(!$connected)
{
 //echo '<script>window.location.replace("login.php");</script>';
}


?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Modifier un véhicule</h1>
          <p class="mb-4">Veuillez selectionner un véhicule pour le modifier.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Modifier vehicule</h6>
            </div>
            <div class="card-body">
            <form  method="POST">
            <select class="browser-default custom-select" name="id">
            <option selected>Selectionnez le véhicule à modfiier</option>
            <?php
use Site\Vehicule;
  
include "Model/PDOConnection.php";
include "Model/FichierImage.php";
include "Model/Vehicule.php";
              $vehicle = new PDOConnectionHelper();
             
              $vv=$vehicle->connectDB();
              $resultat=$vehicle->AllVehicules($vv);
            while($res=$resultat->fetch())
              echo '<option value="'.$res["id_Vehicule"].'">'.$res["id_Vehicule"].' '.$res["marque_Vehicule"].' '.$res["nom_Vehicule"].'</option>'; 
            ?>
            </select>
            <div class="offset-4 col-8 mt-5">
      <button name="valider" type="submit" value="idsubmit" class="btn btn-primary">Valider</button>
    
        </form>
         
        <?php
   if(isset($_POST['valider']) && $_POST['valider'] == "idsubmit" && is_numeric($_POST['id']))
   {
   
  $id = $vehicle->VehiculeById($vv, $_POST['id']);
  while($identification = $id->fetch()){
    echo '<form enctype="multipart/form-data" method="GET">';
    echo '  <div class="form-group row">';
    echo '    <label for="text" class="col-4 col-form-label">Nom du vehicule</label> ';
    echo '    <div class="col-8">';
    echo '      <input id="text" name="text" type="text" class="form-control" required="required" value="'.$identification['nom_Vehicule'].'">';
    echo '    </div>';
    echo '  </div>';
    echo '  <div class="form-group row">';
    echo '    <label for="text" class="col-4 col-form-label">Marque du vehicule</label> ';
    echo '    <div class="col-8">';
    echo '      <input id="text" name="marque" type="text" class="form-control" required="required" value="'.$identification['marque_Vehicule'].'">';
    echo '    </div>';
    echo '  </div>';
    echo '  <div class="form-group row">';
    echo '    <label for="location" class="col-4 col-form-label">En location</label> ';
    echo '    <div class="col-8">';
    echo '      <select id="location" name="location" class="custom-select" required="required">';
    if($identification["en_location_Vehicule"] == "oui")
    {
    echo '        <option value="oui" selected>Oui</option> ';
    echo '        <option value="non">Non</option> ';
    }
    if($identification["en_location_Vehicule"] == "non")
    {
    echo '        <option value="non" selected>Non</option> ';
    echo '<option value="oui">Oui</option> ';
    }
    echo '      </select>';
    echo '    </div>';
    echo '  </div>';
    echo '  <div class="form-group row">';
    echo '    <label for="prix" class="col-4 col-form-label">Prix du Véhicule</label> ';
    echo '    <div class="col-8">';
    echo '      <input id="prix" name="prix" type="text" class="form-control" value="'.$identification['prix_Vehicule'].'">';
    echo '    </div>';
    echo '  </div>';
    echo '     <div class="col-8">';
    echo '     <label for="prix" class="col-4 col-form-label">Image du Véhicule</label> ';
    echo '     <input type="hidden" name="MAX_FILE_SIZE" value="250000" />';
    echo '         <input type="file" name="fic" size=50 />';
    echo '     </div>       ';
    echo '  <div class="form-group row mt-5">';
    echo '    <div class="offset-4 col-8">';
    echo '      <button name="submit" type="submit" value="modifsubmit" class="btn btn-primary">Modifier</button>';
    echo '    </div>';
    echo '  </div>';
    echo '</form>';
  }		
  	
  if(isset($_GET['submit']) && $_GET['submit'] == "modifsubmit" && isset($_FILES['fic']))
  {  
    $fichier = new FichierImage();
     $img=$fichier->transfert();
     $vehicule = new Vehicule($_GET["text"],$_GET["marque"],$_GET['location'],$_GET["prix"],$img);
    
   $vehicle->majVehicule($vv,$_POST['id'],$vehicule);
  }else{
   
  }

			}else{
			
        echo '<div class="container-fluid alert alert-primary mt-5" role="alert">
        Veuillez selectionner un vehicule!
      </div>';
      }

        
  
			?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php

require "footer.php";
?>