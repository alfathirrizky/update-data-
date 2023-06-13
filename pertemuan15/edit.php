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

<form method="post" action="">
    <pre>
        Nim <input type="text" size="20" name="nim" value="<?php echo $nim ?>" readonly>
        Nama <input type="text" size="20" name="nama" value="<?php echo $nm ?>">
        Alamat <input type="text" size="20" name="alamat" value="<?php echo $alt ?>">
        Kota <select name="kota" id="kota"value="<?php echo $kt ?>">>
                        <option value="">--pilih--</option>
                        <option value="manhattan">manhattan</option>
                        <option value="nevada">nevada</option>
                        <option value="new york city">new york city</option>
                        <option value="manchester">manchester</option>
                        <option value="issekai">issekai</option>
            </select>
        Jenis Kelamin
                <input type="radio" name="jk" <?php echo $jk == 'L' ? "checked" : ""; ?> value="L"> Laki-laki
                <input type="radio" name="jk" <?php echo $jk == 'P' ? "checked" : ""; ?> value="P"> Perempuan
        Tgl Lahir <input type="date" name="tgl" value="<?php echo $tgl ?>">

        <input type="submit" name="edit" value="UPDATE">
    </pre>
</form>

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