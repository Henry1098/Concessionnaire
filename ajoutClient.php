<?php

use Site\Client;

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
            <form method="POST">
  <div class="form-group row">
    <label for="prenom" class="col-4 col-form-label">Prenom Client</label> 
    <div class="col-8">
      <input id="prenom" name="prenom" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nom" class="col-4 col-form-label">Nom Client</label> 
    <div class="col-8">
      <input id="nom" name="nom" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="adresse" class="col-4 col-form-label">Adresse</label> 
    <div class="col-8">
      <input id="adresse" name="adresse" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="codepostal" class="col-4 col-form-label">Code Postal</label> 
    <div class="col-8">
      <input id="codepostal" name="codepostal" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="ville" class="col-4 col-form-label">Ville</label> 
    <div class="col-8">
      <input id="ville" name="ville" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="loue" class="col-4 col-form-label">Loue</label> 
    <div class="col-8">
      <select id="loue" name="loue" class="custom-select">
        <option value="oui">Oui</option>
        <option value="non">Non</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit"  value="valider" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
            
<?php
include "Model/Client.php";
include "Model/PDOConnection.php";

if(isset($_POST['submit'])&&$_POST['submit']=="valider")
{
  $client = new Client($_POST['prenom'],$_POST['nom'],$_POST['adresse'],$_POST['codepostal'],$_POST['ville'],$_POST['loue'],$_POST['locations']);
  $vehicle = new PDOConnectionHelper();
             
              $vv=$vehicle->connectDB();
          $vehicle->ajouterClient($vv,$client);
  
}
?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  




<?php
require "footer.php";
?>
