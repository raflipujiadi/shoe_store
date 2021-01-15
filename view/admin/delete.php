<?php
include '../../controller/connection.php';

$id_user  =	$_GET['id_user'];

$query = "DELETE FROM tb_user WHERE id_user = $id_user ";
mysqli_query($koneksi, $query);

?>
<script type="text/javascript">
	window.location.href = "http://localhost/shoe_store/view/admin/index.php?";
</script>