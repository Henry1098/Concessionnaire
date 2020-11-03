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
<form enctype="multipart/form-data" method="POST">
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nom du vehicule</label> 
    <div class="col-8">
      <input id="text" name="text" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Marque du vehicule</label> 
    <div class="col-8">
      <input id="text" name="marque" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="location" class="col-4 col-form-label">En location</label> 
    <div class="col-8">
      <select id="location" name="location" class="custom-select" required="required">
        <option value="oui">Oui</option>
        <option value="non">Non</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="prix" class="col-4 col-form-label">Prix du Véhicule</label> 
    <div class="col-8">
      <input id="prix" name="prix" type="text" class="form-control">
    </div>
  </div>
     <div class="col-8">
     <label for="prix" class="col-4 col-form-label">Image du Véhicule</label> 
     <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=50 />
     </div>       
  <div class="form-group row mt-5">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php

use Site\Vehicule;

include "Model/FichierImage.php";
include "Model/PDOConnection.php";
include "Model/Vehicule.php";
               
if ( isset($_FILES['fic']) && !empty($_POST['text']))
         {
          $fichier = new FichierImage();
          $vehicle = new PDOConnectionHelper();
          $img=$fichier->transfert();
            $vehicule = new Vehicule($_POST["text"],$_POST["marque"],$_POST['location'],$_POST["prix"],$img);

            $vv=$vehicle->connectDB();
            $vehicle->ajouterVehicule($vehicle->getConn(),$vehicule,$img->getImgType());
          }
         ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php

require "footer.php";
?>