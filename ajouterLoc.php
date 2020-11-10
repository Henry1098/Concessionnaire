<?php

use Site\Client;


session_start();

require "header.php";
include "Model/User.php";

$user = new UserId();
$connected=$user->isConnected();
if(!$connected)
{
// echo '<script>window.location.replace("login.php");</script>';
}


?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Ajout d'une Location</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ajout d'une location</h6>
            </div>
            <div class="card-body">
            <form method="POST">
  <div class="form-group row">
    <label for="client" class="col-4 col-form-label">Client</label> 
    <div class="col-8">
      <select id="client" name="client" class="custom-select">
      <?php
  
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
    </div>
  </div>
  <div class="form-group row">
    <label for="vehicule" class="col-4 col-form-label">Vehicule</label> 
    <div class="col-8">
      <select id="vehicule" name="vehicule" class="custom-select">
      <?php

            
              $resultat=$vehicle->AllVehicules($vv);
            while($res=$resultat->fetch())
              echo '<option value="'.$res["id_Vehicule"].'">'.$res["id_Vehicule"].' '.$res['marque_Vehicule'].' '.$res["nom_Vehicule"].'</option>'; 
            ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="datedeb" class="col-4 col-form-label">Date debut Location</label> 
    <div class="col-8">
      <input id="datedeb" name="datedeb" type="date" class="form-control" require>
    </div>
  </div>
  <div class="form-group row">
    <label for="datefin" class="col-4 col-form-label">Date fin Location</label> 
    <div class="col-8">
      <input id="text" name="datefin" type="date" class="form-control" require>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" value="ajouter" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == "ajouter" )
{
    $vehicle->ajouterLoc($vv,$_POST['client'],$_POST['vehicule'],$_POST['datedeb'],$_POST['datefin']);
}else
{
}

?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
 




<?php
require "footer.php";
?>
