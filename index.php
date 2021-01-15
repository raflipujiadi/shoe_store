<?php
include "controller/connection.php";
$query = "SELECT * from tb_user";
$ambil_data = mysqli_query($koneksi, $query);
?>
<!DOCTYPE HTML>

<html>

<head>
	<?php
	include 'view/header.php';
	?>
</head>

<body>
	<?php
	session_start();
	if (isset($hal)) {
		//jika $hal ada isinya
		include $hal . ".php";
	} else {
		include "depan.php";
	}

	?>

</body>

<!-- Footer -->
<footer id="footer">
	<?php
	include 'view/footer.php'
	?>
</footer>

<script type="text/javascript">
	$(document).ready(function() {
		$(".grid-style").load("model/ambildatabarang.php");
		$(".button").click(function() {
			$id = $(this).data('id');
			$name = $('#name' + id).val();
			$price = $('#price' + id).val();
			$quantity = 1;

			$.ajax({
				url: 'model/cart.php',
				method: 'POST',
				dataType: 'json',
				data: {
					cart_id: id,
					cart_name: name,
					cart_price: price,
					cart_quantity: quantity,
					action: 'add'
				},
				success: function(data) {
					alert(data);
				}
			}).fail(function(xhr, textStatus, errorThrown) {
				alert(xhr.responseText);
			});
		})
	});
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</html>