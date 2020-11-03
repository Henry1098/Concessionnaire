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