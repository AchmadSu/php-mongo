<?php 
	session_start();
   	require 'config.php';
   	if (isset($_POST['submit'])) {
      	$row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_POST['obat_id'])]);
   	}
   	if(isset($_POST['submit'])){
		require 'config.php';
		$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_POST['obat_id'])]);
		header("Location: index.php");
	} 
?>
	<!DOCTYPE html>
	<html>
	 <head>
	  <title>Data Obat Apotek Vortex</title>
	  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	  	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
		<link rel="icon" type="img/png" href="assets/img/logo/logo.png">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic">
		<link rel="stylesheet" type="text/css" href="assets/vendor/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" type="text/css" href="assets/css/custom.min.css">
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
		<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
		<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	 </head>
	 <body style="background-image: linear-gradient(to right, #4CABBC, #07D99D); font-family: helvetica;">
		<div class="container p-2 my-5 shadow-lg" style="background-image: linear-gradient(to right, #fff, #f7f7f7);">
		   <br>
		   <CENTER><h1><img style="width: 10%;" src="assets/img/logo/logo.png"></h1></CENTER>
	       <CENTER><h1 style="color: #555;">APOTEK VORTEX</h1></CENTER>
		   <div class="p-5 rounded">
		   	<CENTER><h3 style="color: #222;" class="pb-2">Tabel Data Obat</h3></CENTER>
			   <table class="table table-striped rounded">
			    <thead class="thead" style="background-image: linear-gradient(to bottom, #134d3d, #135c47); color: #fff;">
			     <tr>
			      <th class='px-3 p-3' scope="col">No</th>
			      <th class='px-3 p-3' scope="col">Nama Obat</th>
			      <th class='px-3 py-3' scope="col">Jenis Obat</th>
			      <th class='px-3 py-3' scope="col">Kategori Obat</th>
			      <th class='px-3 py-3' scope="col">Harga</th>
			      <th class='px-3 py-3' scope="col">Stock</th>
				  <th class='px-3 py-2' scope="col" colspan="2">
				  	<b><a style="width:100%;" href="create.php" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> | Tambah Data</a></b>
				  </th>                  
			     </tr>
			    </thead>
			    <?php
			     require 'config.php';
			     $findObat = $collection->find();
			     $no = 1;
			     foreach ($findObat as $row) {
			      echo "<tr>";
			      echo "<td class='px-3 py-3'>".$no."</th>";
			      echo "<td class='px-3 py-3'>".$row->obat_nama."</td>";
			      echo "<td class='px-3 py-3'>".$row->obat_jenis."</td>";
			      echo "<td class='px-3 py-3'>".$row->obat_kategori."</td>";
			      echo "<td class='px-3 py-3'> Rp. ".number_format($row->obat_harga)."</td>";
			      echo "<td class='px-3 py-3'>".number_format($row->obat_stock)."</td>";
			      echo "<td class='px-3 py-2'>";
			      echo "<a style='width:100%;' href = 'edit.php?id=".$row->_id."'class='btn btn-info border border-light'><i class='fa fa-pencil-square' aria-hidden='true'></i> &nbsp &nbsp Edit</a>";
			      echo "</td>";
			      echo "<td class='px-3 py-2'>"; ?>
			      <button style='width:100%;' data-toggle='modal' data-target='#<?php echo $row->obat_nama; ?>' class='btn btn-danger border border-light'><i class='fa fa-trash' aria-hidden='true'></i> &nbsp &nbsp Hapus</button>
			      <?php 
			      echo "</td>";
			      echo "</tr>";
			      $no++;
			      ?>
			    <?php
				 	}
			    ?>
			   </table>
			</div>
			<?php 
				require 'config.php';
			    $findObat = $collection->find();
			    foreach ($findObat as $row) {
			 ?>
			<div class="modal fade" id="<?php echo $row->obat_nama; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div style="background-image: linear-gradient(to right, #4CABBC, #07D99D); color: #fff;" class="modal-header">
			        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Penghapusan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <!-- <span class="input-group-text" id="inputGroup-sizing-default">
					    	<i class="fa fa-question-circle" aria-hidden="true"></i>
					    </span> -->
					    <h6>Apakah anda yakin akan menghapus <?php echo $row->obat_nama; ?>?</h6>
					  </div>
					</div>
			      </div>
			      <div class="modal-footer">
			        <form method="POST">
			            <div class="form-group">
			               <input type="hidden" value="<?php echo "$row->_id"; ?>" class="form-control" name="obat_id">
			               <a href="index.php" class="btn btn-info"><i class="fa fa-times" aria-hidden="true"></i>&nbsp &nbsp Tidak</a>
			               <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp &nbsp Ya</button>
			            </div>
			         </form>
			      </div>
			    </div>
			  </div>
			</div>
			<?php } ?>
			<center><p style="color: #c9c9c9;">Ecep Achmad Sutisna (D111911027) IF-5D <br> 2022</p></center>
		</div>
	 </body>
	</html>