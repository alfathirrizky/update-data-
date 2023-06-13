<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data mahasiswa</title>
</head>

<body>
    <h1>tambah data mahasiswa</h1>
    <a href="tampilan.php">kembali Kehalaman tampil</a>
    <br><br>
    <form action="tambah.php" method="post" name="form1">
        <table width="700" border="0">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim" size="20"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_mhs" size="30"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" size="50"></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>
                    <select name="kota" id="kota">
                        <option value="">--pilih--</option>
                        <option value="manhattan">manhattan</option>
                        <option value="nevada">nevada</option>
                        <option value="new york city">new york city</option>
                        <option value="manchester">manchester</option>
                        <option value="issekai">issekai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="radio" name="jns_kelamin" id="jenis_kelamin" value="L">Laki-laki</td>
                <td><input type="radio" name="jns_kelamin" id="jenis_kelamin" value="P">Perempuan</td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgl"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "kampusgw");

    // Check if form submitted, insert form data into users table.

    if (isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama_mhs'];
        $alt = $_POST['alamat'];
        $kt = $_POST['kota'];
        $jk = $_POST['jns_kelamin'];
        $tgl = $_POST['tgl'];
        //Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO mahasiswa (nim,nama_mhs,alamat,kota,jns_kelamin,tgl_lahir) VALUES('$nim','$nama','$alt','$kt','$jk','$tgl')");

        // Show message when user added

        echo "Data Mahasiswa Sukses ditambahkan.
        <br> 
        Silahkan Klik Link untuk Lihat data Mahasiswa : <a href= 'tampilan.php'>View Mahasiswa</a>";
    }
    ?>
</body>

</html>