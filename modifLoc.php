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
          <h1 class="h3 mb-2 text-gray-800">Modifier la location</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Modifier une location</h6>
            </div>
            <div class="card-body">
            <form  method="POST">
            <select class="browser-default custom-select" name="id">
            <option selected>Veuillez selectionner une location à modifier</option>
            <?php
            include "Model/PDOConnection.php";
include "Model/FichierImage.php";
include "Model/Client.php";

              $vehicle = new PDOConnectionHelper();
             
              $vv=$vehicle->connectDB();
              $resultat=$vehicle->allLocations($vv);
            while($res=$resultat->fetch())
              echo '<option value="'.$res["id"].'">'.'Nom:'.$res["prenom_Client"].' '.$res["nom_Client"]. ', Loue un vehicule:'.$res["loue_Client"]. ', Nom Vehicule:'.$res['nom_Vehicule'].' Date debut: '.$res['dateDebut'].', Date de fin: '.$res['datefin'].'</option>'; 
            ?>
            </select>
            <div class="offset-4 col-8 mt-5">
      <button name="valider" type="submit" value="idsubmit" class="btn btn-primary mb-5">Valider</button>
    
        </form>

        <?php

        if(isset($_POST['valider']) && $_POST['valider']=="idsubmit")
        {
            echo '        <form method="POST"> ';
echo '  <div class="form-group row"> ';
echo '    <label for="client" class="col-4 col-form-label">Client</label>  ';
echo '    <div class="col-8"> ';
echo '      <select id="client" name="client" class="custom-select"> ';
            $resultat=$vehicle->ClientById($vv,$_POST['id']); 
           while($res=$resultat->fetch()) 
echo '             <option value="'.$res["id_Client"].'">'.$res["id_Client"].'  '.$res["prenom_Client"]. ' '.$res["nom_Client"].'</option>';
echo '      </select> ';
echo '    </div> ';
echo '  </div> ';
echo '  <div class="form-group row"> ';
echo '    <label for="vehicule" class="col-4 col-form-label">Vehicule</label>  ';
echo '    <div class="col-8"> ';
echo '      <select id="vehicule" name="vehicule" class="custom-select"> ';
             $resultat=$vehicle->AllVehicules($vv);
         while($res=$resultat->fetch())
echo '              <option value="'.$res["id_Vehicule"].'">'.$res["id_Vehicule"].' '.$res["nom_Vehicule"].'</option>';
echo '      </select> ';
echo '    </div> ';
echo '  </div> ';
echo '  <div class="form-group row"> ';
echo '    <label for="datedeb" class="col-4 col-form-label">Date debut Location</label>  ';
echo '    <div class="col-8"> ';
echo '      <input id="datedeb" name="datedeb" type="date" class="form-control" require> ';
echo '    </div> ';
echo '  </div> ';
echo '  <div class="form-group row"> ';
echo '    <label for="datefin" class="col-4 col-form-label">Date fin Location</label>  ';
echo '    <div class="col-8"> ';
echo '      <input id="text" name="datefin" type="date" class="form-control" require> ';
echo '    </div> ';
echo '  </div>  ';
echo '  <div class="form-group row"> ';
echo '    <div class="offset-4 col-8"> ';
echo '      <button name="submit" type="submit" value="ajouter" class="btn btn-primary">Submit</button> ';
echo '    </div> ';
echo '  </div> ';
echo '</form> ';
        }
            
       ?>