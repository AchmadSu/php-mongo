<?php session_start();
   if(isset($_POST['submit'])){
      require 'config.php';
      $insertOneResult = $collection->insertOne([
          'obat_nama' => $_POST['obat_nama'],
          'obat_harga' => $_POST['obat_harga'],
          'obat_stock' => $_POST['obat_stock'],
          'obat_jenis' => $_POST['obat_jenis'],
          'obat_kategori' => $_POST['obat_kategori'],
          
      ]);
      header("Location: index.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Tambah Data Obat Apotek Vortex</title>
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
       <div class="p-2 rounded">
        <CENTER><h3 style="color: #222;" class="pb-2">Tambah Data Obat</h3></CENTER>
         <form method="POST">
          <div class="form-group container px-5">
            <table class="table">
              <tr>
                <td colspan="2">
                  <input type="text" class="form-control" name="obat_nama" placeholder="Masukkan Nama Obat"></td>
                <td><input type="number" class="form-control harga" name="obat_harga" placeholder="Masukkan Harga dalam Rupiah"></td>
              </tr>
              <tr>
                <td colspan="2">
                  <select class="form-control" name="obat_jenis">
                    <option selected disabled>
                      Pilih Jenis Obat
                    </option>
                    <option value="Obat cair">
                      Obat Cair
                    </option>
                    <option value="Obat tablet">
                      Obat Tablet
                    </option>
                    <option value="Obat kapsul">
                      Obat Kapsul
                    </option>
                    <option value="Obat suntik">
                      Obat Suntik
                    </option>
                    <option value="Obat implan">
                      Obat Implan/Tempel
                    </option>
                    <option value="Obat inhaler">
                      Obat Inhaler
                    </option>
                    <option value="Obat tetes">
                      Obat Tetes
                    </option>
                    <option value="Obat suppositoria">
                      Suppositoria
                    </option>
                  </select>
                </td>
                <td colspan="">
                  <select class="form-control" name="obat_kategori">
                    <option selected disabled>
                      Pilih Kategori Obat
                    </option>
                    <option value="Obat bebas">
                      Obat Bebas
                    </option>
                    <option value="Obat bebas terbatas">
                      Obat Bebas Terbatas
                    </option>
                    <option value="Obat keras">
                      Obat Keras
                    </option>
                    <option value="Obat narkotika">
                      Obat Narkotika
                    </option>
                    <option value="Obat psikotropika">
                      Obat Psikotropika
                    </option>
                    <option value="Obat herbal">
                      Obat Herbal
                    </option>
                  </select>
                </td>
              </tr>
                <td>
                  <input type="number" class="form-control" name="obat_stock" placeholder="Masukkan Stock Obat">
                </td>
              </tr>
              <tr>
                <td class="ml-5">
                  <a href="index.php" class="mt-1 btn btn-warning" style="margin-bottom: 20px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp&nbsp Kembali</a>
                  <button name="submit" class="mb-3 btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp&nbsp Tambah</button>
                </td>
              </tr>                
            </table>
          </div>
         </form>
         </div>
        <CENTER><p style="color: #c9c9c9;">Ecep Achmad Sutisna (D111911027) IF-5D <br> 2022</p></CENTER>
      </div>
   </body>
</html>