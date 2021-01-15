<?php
include "../controller/connection.php";
$id_barang = isset($_GET['id']) ? $_GET['id'] : NULL;
if (isset($_GET['id']) && !isset($_POST['update'])) {
    $sql = "UPDATE tb_barang SET quantity=quantity - 1 WHERE id_barang=$id_barang AND quantity>0";
    $ambil_data = mysqli_query($koneksi, $sql);
    mysqli_fetch_object($ambil_data);
}
header('location:http://localhost/shoe_store/');
