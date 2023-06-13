<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Sistem Informasi</title>
    <style>
        p {
            color: red;

            margin-left: 20px;

        }
    </style>
</head>

<body>

    <h1>DATA MAHASISWA SISTEM INFORMMASI</h1>
    <p>Nama: Alfathir Rizky Harsya</p>
    <p>Nim: 221011700078</p>
    <p>Kelas: : 025IFP002</p>
    <a href='tambah.php'>Tambah Data Mahasiswa</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nim</th>
            <th>Nama Mahasiswa</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";

        $sql = "SELECT * FROM mahasiswa";
        $perintah = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($perintah)) {

            $gender = $data['jns_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan';

            echo "<tr>
                <td>" . $data["nim"] . "</td>
                <td>" . $data["nama_mhs"] . "</td>                                                                                                                                    
                <td>" . $data["alamat"] . "</td>
                <td>" . $data["kota"] . "</td>
                <td>" . $gender . "</td>
                <td>" . $data["tgl_lahir"] . "</td>
                <td>
               
                <a href='hapus.php?no=$data[nim]'>Hapus</a>|
                <a href='edit.php?no=$data[nim]'>Edit</a>
                </td>
              
            </tr>";
        }
        ?>
    </table>
</body>