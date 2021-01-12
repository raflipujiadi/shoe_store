<?php
session_start();
require '../controller/connection.php';
require 'item.php';

if (isset($_GET['id']) && !isset($_POST['update'])) {
    $sql = "SELECT * FROM tb_barang WHERE id_barang=" . $_GET['id'];
    $result = mysqli_query($koneksi, $sql);
    $product = mysqli_fetch_object($result);
    $item = new Item();
    $item->id_barang = $product->id_barang;
    $item->nama_barang = $product->nama_barang;
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
<h2> Items in your cart: </h2>
<form method="POST">
    <table id="t01">
        <tr>
            <th>Option</th>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>

            <th>Total</th>
        </tr>
        <?php

        $s = 0;
        $index = 0;
        $cart = array("Volvo", "BMW", "Toyota");
        for ($i = 0; $i < count($cart); $i++) {
            $s += $cart[$i]->price * $cart[$i]->quantity;
        ?>
            <tr>
                <td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')">Delete</a> </td>
                <td> <?php echo $cart[$i]->id_barang; ?> </td>
                <td> <?php echo $cart[$i]->nama_barang; ?> </td>
                <td>Rp. <?php echo $cart[$i]->price; ?> </td>
                <td> <input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>
                <td> Rp.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?> </td>
            </tr>
        <?php
            $index++;
        } ?>
        <tr>
            <td colspan="5" style="text-align:right; font-weight:bold">Sum
                <input id="saveimg" type="image" src="images/save.png" name="update" alt="Save Button">
                <input type="hidden" name="update">
            </td>
            <td> Rp.<?php echo $s; ?> </td>
        </tr>
    </table>
</form>
<br>
<a href="index.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a>
<?php
if (isset($_GET["id"]) || isset($_GET["index"])) {
    header('Location: cart.php');
}
?>