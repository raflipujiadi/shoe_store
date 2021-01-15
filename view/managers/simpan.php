<?php
include "../../controller/connection.php";
$id_barang             = isset($_POST['id_barang']) ? $_POST['id_barang'] : NULL;
$nama_barang             = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
$jenis_barang             = isset($_POST['jenis_barang']) ? $_POST['jenis_barang'] : '';
$kode_spt             = isset($_POST['kode_spt']) ? $_POST['kode_spt'] : '';
$img             = isset($_POST['img']) ? $_POST['img'] : '';
$quantity             = isset($_POST['quantity']) ? $_POST['quantity'] : '';
$price             = isset($_POST['price']) ? $_POST['price'] : '';
$fileName = $_FILES['brks']['tmp_name'];
$tj = basename($_FILES['brks']['name']);
$tujuan = "../../assets/img/barang/" . $tj;
$terupload = move_uploaded_file($fileName, $tujuan);

$_SESSION['$tj'];
$cek_data = mysqli_query($koneksi, "SELECT * from tb_barang");
$cek = mysqli_num_rows($cek_data);
$no = $cek++;
if ($id_barang) {

    $query = "UPDATE tb_barang
			SET nama_barang = '$nama_barang', jenis_barang= '$jenis_barang', kode_spt='$kode_spt', img='$tj', quantity='$quantity', price='$price'
			WHERE id_barang = '$id_barang'";
    mysqli_query($koneksi, $query);
    header("location:http://localhost/shoe_store/view/managers/index.php?act=shbarang&pesan=ubah");
    echo 'data berhasil diubah';
} else {
    $query = "INSERT INTO tb_barang SET id_barang='$id_barang', nama_barang='$nama_barang', jenis_barang='$jenis_barang', kode_spt='$kode_spt',
				img='$tj', quantity=60, price='$price'
				";
    mysqli_query($koneksi, $query);
    header("location:http://localhost/shoe_store/view/managers/index.php?act=shbarang&pesan=ditambahkan");
    echo 'data berhasil disimpan';
}
