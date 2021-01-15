<?php
include "../controller/connection.php";
$query = "SELECT * from tb_barang";
$ambil_data = mysqli_query($koneksi, $query);

?>
<?php

echo '<header class="align-center">
				<p class="special">OUR PRODUCT</p>
				<h2>Just For You</h2>
			</header>
			<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>';
$no = 0;
while ($getdata = mysqli_fetch_assoc($ambil_data)) {;
	$no++
?>
	<div>
		<div class="box">
			<div class="image fit ">
				<img src="assets/img/barang/<?php echo $getdata['img'] ?>" alt="produk" />
			</div>
			<div class="content">
				<header class="align-center">
					<p id="name"><?php echo $getdata['nama_barang']; ?></p>
					<h2 id="price">$<?php echo $getdata['price']; ?></h2>
				</header>
				<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>
				<footer class="align-center">
					<h2 id="stock">Stok : <?php echo $getdata['quantity']; ?></h2>
					<a class=" <?php echo "button button" . $no ?>" href="model/cart.php?id=<?php echo $getdata['id_barang']; ?>&action=add" class="button alt">Add to cart</a>
				</footer>
			</div>
		</div>
	</div>

<?php
}
?>