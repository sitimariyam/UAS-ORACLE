<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    OResto
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          OResto
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="pegawai.php">
              <i class="material-icons">person</i>
              <p>Pegawai</p>
            </a>
          </li>
		   <li class="nav-item ">
            <a class="nav-link" href="pembeli.php">
              <i class="material-icons">person</i>
              <p>Pembeli</p>
            </a>
          </li>
		</li>
		</li>
		   <li class="nav-item">
            <a class="nav-link" href="menu.php">
              <i class="material-icons">person</i>
              <p>Menu</p>
            </a>
          </li>
		  </li>
		   <li class="nav-item">
            <a class="nav-link" href="pesanan.php">
              <i class="material-icons">person</i>
              <p>Pesanan</p>
            </a>
          </li>
		  </li>
		  <li class="nav-item active">
            <a class="nav-link" href="laporan.php">
              <i class="material-icons">person</i>
              <p>Laporan</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
          </div>
		  <!-- Isi-->
			 <h3><center>Laporan Penjualan OResto</center></h3>
			 <br>
			  <a class='btn btn-success' href='cetak.php'  target="_blank"> <i class='fa fa-print'></i> print</a>
			   <a class='btn btn-primary' href='cetak_excel.php'  target="_blank"> <i class='fa fa-table '></i>  xls</a>
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
						<th>NO</th>
						<th>ID_	MENU</th>
						<th>ID_PESANAN</th>
						<th>NAMA MENU</th>
						<th>HARGA</th>
                        <th>QYT</th> 
						<th>TOTAL</th>   						
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					include'koneksi.php';
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi,'select * from MENU
Inner join PESANAN on MENU.NAMA_MENU =PESANAN.NAMA_MENU_PESANAN');


					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["QTY"] * $row["HARGA"];
					$total_semua += $total;	
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
						<td>
						 <?php echo $row["ID_MENU"];?>
						</td>
						<td>
						 <?php echo $row["ID_PESANAN"]?>
						</td>
						<td>
						 <?php echo $row["NAMA_MENU"]?>
						</td>						
						  <td> 
						<?php echo $row["HARGA"]?>
						</td>
						<td>
						 <?php echo $row["QTY"]?>
						</td>
						<td>
                           <?php echo $row["TOTAL"]?>  
						</td>
                      </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
			
			
          </div>
          
		  <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>BOGOR, 06 Februari 2022 </center>
							<b><center>OResto</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>SITI MARIAM</center></b>
                </div>
              </div>
            </div>
		  
		  
			
			

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
    
    </div>
  </div>

  

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script> 
<!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>  
</body>

</html>