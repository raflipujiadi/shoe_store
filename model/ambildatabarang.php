<?php
session_start();
include "../controller/connection.php";
include "item.php";

if (isset($_GET['id']) && !isset($_POST['update'])) {
	$sql = "SELECT * FROM product WHERE id=" . $_GET['id'];
	$result = mysqli_query($koneksi, $sql);
	$product = mysqli_fetch_object($result);
	$item = new Item();
	$item->id = $product->id;
	$item->name = $product->name;
	$item->price = $product->price;
	$iteminstock = $product->quantity;
	$item->quantity = 1;
	//Periksa produk dalam keranjang
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart']));
	for ($i = 0; $i < count($cart); $i++)
		if ($cart[$i]->id == $_GET['id']) {
			$index = $i;
			break;
		}
	if ($index == -1)
		$_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
	else {

		if (($cart[$index]->quantity) < $iteminstock)
			$cart[$index]->quantity++;
		$_SESSION['cart'] = $cart;
	}
}
//Menghapus produk dalam keranjang
if (isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Perbarui jumlah dalam keranjang
if (isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];
	$cart = unserialize(serialize($_SESSION['cart']));
	for ($i = 0; $i < count($cart); $i++) {
		$cart[$i]->quantity = $arrQuantity[$i];
	}
	$_SESSION['cart'] = $cart;
}
?>

<?php

echo '<header class="align-center">
				<p class="special">OUR PRODUCT</p>
				<h2>Just For You</h2>
			</header>
			<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>';

?>
<form method="POST">
	<?php
	$no = 0;
	$s = 150000;
	$index = 0;
	while ($getdata = mysqli_fetch_assoc($ambil_data)) {;
		$no++;
		$s += $cart[$i]->price * $cart[$i]->quantity;
	?>
		<div class="box">
			<div class="image fit ">
				<img src="assets/img/barang/<?php echo $getdata['img'] ?>" alt="produk" />
			</div>
			<div class="content">
				<header class="align-center">
					<p><?php echo $getdata['nama_barang']; ?></p>
					<h2>Lorem ipsum dolor</h2>
					<td>
						<h1 class="active"> Rp.<?php echo $s; ?> </h1>
					</td>

				</header>
				<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>
				<footer class="align-center">
					<a href="model/ambildatabarang.php?id=<?php echo $getdata['id_barang']; ?>&action=add">Add to cart</a>
				</footer>
				<tr>
					<td colspan="5" style="text-align:right; font-weight:bold">
						<input type="hidden" name="update">
					</td>
				</tr>
			</div>
		</div>
</form>

<?php
	}
?>

<?php
if (isset($_GET["id"]) || isset($_GET["index"])) {
	header('Location: model/ambildatabarang.php');
}
?>