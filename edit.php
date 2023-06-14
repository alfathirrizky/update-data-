<?php
include "koneksi.php";

$n = $_GET['no'];

$query = "SELECT * FROM mahasiswa where nim='$n'";

$result = mysqli_query($conn, $query);

while ($data = mysqli_fetch_array($result)) {
    $nim = $data['nim'];
    $nm = $data['nama_mhs'];
    $alt = $data['alamat'];
    $kt = $data['kota'];
    $jk = $data['jns_kelamin'];
    $tgl = $data['tgl_lahir'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>update data mahasiswa</title>
  </head>
  <body>
    <!-- form-->
    <form class="row g-3" action="" method="post" >
      <div class="col-md-6">
        <label for="inputNIM" class="form-label">NIM</label>
        <input type="text" class="form-control" name="nim" id="inpuTNIM" value="<?php echo $nim ?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="inputNAMA" class="form-label">NAMA</label>
        <input type="text" class="form-control" name="nama" id="inputNAMA" value="<?php echo $nm ?>">
      </div>
      <div class="col-12">
        <label for="inputALAMAT" class="form-label">ALAMAT</label>
        <input type="text" class="form-control" name="alamat" id="inputAddress" placeholder="ALAMAT" value="<?php echo $alt ?>">
      </div>
      <div class="col-md-6">
        <label for="inputKOTA" class="form-label">KOTA</label>
        <select id="inputKOTA" value="<?php echo $kt ?>" name="kota" class="form-select">
          <option selected>Choose...</option>
          <option>JAKARTA</option>
          <option>BANDUNG</option>
          <option>SURABAYA</option>
          <option>YOGYAKARTA</option>
          <option>BALI</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="inputjeniskelamin" class="form-label">JENIS KELAMIN</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jk" <?php echo $jk == 'L' ? "checked" : ""; ?> value="L" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            LAKI-LAKI
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jk"  <?php echo $jk == 'L' ? "checked" : ""; ?> value="P" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            WANITA
          </label>
        </div>
      </div>
      <div class="col-md-4">
        <label for="inputTGL" class="form-label">TANGGAL LAHIR</label>
        <input type="date" class="form-control" name="tgl" value="<?php echo $tgl ?>" id="inputTGL" >
      </div>
      </div>
      <div class="col-12">
        <button type="submit" name="edit" value="UPDATE" class="btn btn-primary">UPDATE</button>
      </div>
      <a href="tampilan.php" >kembali Kehalaman tampil</a>
    </form>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,128L60,122.7C120,117,240,107,360,106.7C480,107,600,117,720,154.7C840,192,960,256,1080,266.7C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <!-- akhir form -->
  </body>
</html>

<?php

if (isset($_POST['edit'])) {
    $nim = $_POST['nim'];
    $nm = $_POST['nama'];
    $alt = $_POST['alamat'];
    $kt = $_POST['kota'];
    $jk = $_POST['jk'];
    $tgl = $_POST['tgl'];

    $q = "UPDATE mahasiswa SET nama_mhs='$nm', alamat='$alt', kota='$kt', jns_kelamin='$jk', tgl_lahir='$tgl' WHERE nim='$nim'";

    $perintah = mysqli_query($conn, $q);

    if ($perintah) {
        header("location:tampilan.php");
    } else {
        echo "Gagal Diupdate";
    }
}

?>