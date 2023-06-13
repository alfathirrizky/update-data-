<?php
//include database connection file
// include "koneksi.php";
?>
<html>

<head>
    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <a href="tampil.php">Kembali Kehalaman Tampil</a>
    <br><br>
    <form action="tambahData.php" method="post" name="form1">
        <table width="700" border="0">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim" size="20"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" size="30"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" size="50"></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><input type="text" name="kota" size="20"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jk" size="10"></td>
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
        $nama = $_POST['nama'];
        $alt = $_POST['alamat'];
        $kt = $_POST['kota'];
        $jk = $_POST['jk'];
        $tgl = $_POST['tgl'];
        //Insert user data into table

        $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$alt, '$kt', '$jk', '$tgl')";

        $result = mysqli_query($conn, $query);


        // Show message when user added

        echo "Data Mahasiswa Sukses ditambahkan.
        // <br> 
        //Silahkan Klik Link untuk Lihat data Mahasiswa : <a href= 'tampil.php'>View Mahasiswa</a>";
        header('location:tampilan.php');
    } else {
        echo "Data Gagal Dihapus";
    }
    ?>
</body>

</html>