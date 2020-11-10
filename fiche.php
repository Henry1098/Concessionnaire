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
          <h1 class="h3 mb-2 text-gray-800">Fiche Client</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Fiche Client</h6>
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
            </div>
        
          </div>
          <?php
            if(isset($_POST['valider']) && $_POST['valider'] == "idsubmit" && is_numeric($_POST['id']))
   {

echo '        <div class = "col-12">';
echo '        <div class="table-responsive">';
echo '              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '                  <thead>';
echo '                    <tr>';
echo '                      <th>Id Client</th>';
echo '                      <th>Prenom Client</th>';
echo '                      <th>Nom Client</th>';
echo '                      <th>Adresse</th>';
echo '                      <th>Code postal</th>';
echo '                      <th>Ville</th>';
echo '					  <th>Loue</th>';
echo '                    </tr>';
echo '                  </thead>';
echo '                  <tbody>';
echo '                <?php';
echo                 $vehicle->getClient($vehicle->getConn(),$_POST['id']);
echo '                                </tbody>';
echo '                </table>';
echo '              </div>';


echo '        <div class = "col-12">';
echo '        <div class="table-responsive">';
echo '              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '                  <thead>';
echo '                    <tr>';
echo '                      <th>Id Location</th>';
echo '                      <th>Nom Client</th>';
echo '                      <th>Nom Vehiculr</th>';
echo '                      <th>Date de debut</th>';
echo '                      <th>Date de fin</th>';  
echo '                    </tr>';
echo '                  </thead>';
echo '                  <tbody>';
echo '                <?php';
echo                 $vehicle->getLocations($vehicle->getConn(),$_POST['id']);
echo '                                </tbody>';
echo '                </table>';
echo '              </div>';

   }
   ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php