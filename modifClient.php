<?php
require "header.php";
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
            <form  method="POST">
            <select class="browser-default custom-select" name="id">
            <option selected>Open this select menu</option>
            <?php
use Site\Client;
  
include "Model/PDOConnection.php";
include "Model/FichierImage.php";
include "Model/Client.php";

              $vehicle = new PDOConnectionHelper();
             
              $vv=$vehicle->connectDB();
              $resultat=$vehicle->AllClients($vv);
            while($res=$resultat->fetch())
              echo '<option value="'.$res["id_Client"].'">'.$res["id_Client"].' '.$res["prenom_Client"]. ' '.$res["nom_Client"].'</option>'; 
            ?>
            </select>
            <div class="offset-4 col-8 mt-5">
      <button name="valider" type="submit" value="idsubmit" class="btn btn-primary mb-5">Valider</button>
    
        </form>
         
        <?php
   if(isset($_POST['valider']) && $_POST['valider'] == "idsubmit" && is_numeric($_POST['id']))
   {
   
  $id = $vehicle->ClientById($vv, $_POST['id']);
  $idC=$_POST['id'];
  while($identification = $id->fetch()){
    echo '     <form method="GET"> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="prenom" class="col-4 col-form-label">Prenom Client</label>  ';
    echo '    <div class="col-8"> ';
    echo '      <input id="prenom" name="prenom" type="text" class="form-control" required="required" value="'.$identification['prenom_Client'].'"> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="nom" class="col-4 col-form-label">Nom Client</label>  ';
    echo '    <div class="col-8"> ';
    echo '      <input id="nom" name="nom" type="text" class="form-control" required="required" value="'.$identification['nom_Client'].'"> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="adresse" class="col-4 col-form-label">Adresse</label>  ';
    echo '    <div class="col-8"> ';
    echo '      <input id="adresse" name="adresse" type="text" class="form-control" required="required" value="'.$identification['adresse_Client'].'"> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="codepostal" class="col-4 col-form-label">Code Postal</label>  ';
    echo '    <div class="col-8"> ';
    echo '      <input id="codepostal" name="codepostal" type="text" class="form-control" required="required" value="'.$identification['codepostal_Client'].'"> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="ville" class="col-4 col-form-label">Ville</label>  ';
    echo '    <div class="col-8"> ';
    echo '      <input id="ville" name="ville" type="text" class="form-control" required="required" value="'.$identification['ville_Client'].'"> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="locations" class="col-4 col-form-label">Locations</label>  ';
    echo '    <div class="col-8"> ';
    echo '      <input id="locations" name="locations" type="text" class="form-control" value="'.$identification['location_Client'].'"> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <label for="loue" class="col-4 col-form-label">Loue</label>  ';
    echo '    <div class="col-8"> ';
    if($identification['loue_Client']=="oui"){
    echo '      <select id="loue" name="loue" class="custom-select"> ';
    echo '        <option value="oui" selected>Oui</option> ';
    echo '        <option value="non">Non</option> ';}else{
        echo '      <select id="loue" name="loue" class="custom-select"> ';
        echo '        <option value="oui">Oui</option> ';
        echo '        <option value="non" selected>Non</option> ';
    }
    echo '      </select> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '<div class="form-group row">';
echo '    <label for="id" class="col-4 col-form-label">Id Vehicule</label> ';
echo '    <div class="col-8">';
echo '      <input id="id" name="id" type="text" class="form-control">';
echo '    </div>';
echo '  </div> ';
    echo '  <div class="form-group row"> ';
    echo '    <div class="offset-4 col-8"> ';
    echo '      <button name="submit" type="submit"  value="valider" class="btn btn-primary">Submit</button> ';
    echo '    </div> ';
    echo '  </div> ';
    echo '</form> ';

  }		
  	
  if(isset($_GET['submit'])&& $_GET['submit']=="valider")
  {  // $fichier = new FichierImage();
     // $img=$fichier->transfert();
     $clients = new Client($_GET['prenom'],$_GET['nom'],$_GET['adresse'],$_GET['codepostal'],$_GET['ville'],$_GET['loue'],$_GET['locations']);
    $clients->setIdVehicule($_GET['id']);
     
   $vehicle->majClient($vv,$idC,$clients); 
   }else{
   
   echo "hello0";
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