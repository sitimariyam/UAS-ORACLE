<!DOCTYPE html>
<?php
include 'koneksi.php';


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DataPenjualanOResto.xls");
?>
<html>

<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan OResto </h3>
			 <br>
			  
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
						<th>ID_MENU</th>
						<th>ID_PESANAN</th>
						<th>NAMA MENU</th>
						<th>QTY</th>
                        <th>HARGA</th> 
						<th>TOTAL</th>   						
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php
					include'koneksi.php';
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi,'select * from MENU
Inner join PESANAN on MENU.NAMA_MENU = PESANAN.NAMA_MENU_PESANAN');

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
						<?php echo $row["QTY"]?>
						</td>
						<td>
						 <?php echo $row["HARGA"]?>
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
				<b></b>
                 <center>Bogor, 06 Februari 2022 </center>
							<b><center>OResto</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>SITI MARIAM </b></center>
                </div>
              </div>
            </div>
	
 

 
</body>
</html>