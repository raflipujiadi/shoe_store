
<?php
include "../../controller/connection.php";
// mengecek apakah nilai dari form apakah true atau false
$id_user             = isset($_POST['id_user']) ? $_POST['id_user'] : NULL;
$username             = isset($_POST['username']) ? $_POST['username'] : '';
$password         = isset($_POST['password']) ? $_POST['password'] : '';
$level             = isset($_POST['level']) ? $_POST['level'] : '';

if ($id_user != NULL) {
	// eksekusi
	$query = "UPDATE tb_user SET username='$username',
				password=md5('$password'),
				level='$level'
				WHERE id_user='$id_user'";
	mysqli_query($koneksi, $query);
	header('location:http://localhost/shoe_store/view/admin/index.php?act=shmembers');
	echo 'data berhasil diubah';
} else {
	// eksekusi
	$query = "INSERT INTO tb_user SET username='$username',
				password=md5('$password'),
				level='$level'
				";
	mysqli_query($koneksi, $query);
	header('location:http://localhost/shoe_store/view/admin/index.php?act=shmembers');
	echo 'data berhasil disimpan';
}
echo '<br> Terima Kasih';
?>




