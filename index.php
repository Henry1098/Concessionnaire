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
          <h1 class="h3 mb-2 text-gray-800">Liste des véhicules</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id Vehicule</th>
                      <th>Nom Vehicule</th>
                      <th>Marque du Vehicule</th>
                      <th>En Location</th>
					  <th>Prix Vehicule</th>
            <th>Image de Vehicule</th>
          
                    </tr>
                  </thead>
                  <tfoot>
				   </tr>
                      <th>Id Vehicule</th>
                      <th>Nom Vehicule</th>
                      <th>Marque du Vehicule</th>
                      <th>En Location</th>
					  <th>Prix Vehicule</th>
            <th>Image de Vehicule</th>
            
                    </tr>
                  </tfoot>
                  <tbody>
                <?php

               

                include "Model/PDOConnection.php";

                $vehicle = new PDOConnectionHelper();
                $vv=$vehicle->connectDB();
                $vehicle->getAllVehicules($vehicle->getConn());
                
                                ?>
                                </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php

require "footer.php";
?>