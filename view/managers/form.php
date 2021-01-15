<?php
include '../../controller/connection.php';
$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : NULL;
$query = "SELECT * from tb_barang WHERE id_barang='$id_barang'";
$ambil_data = mysqli_query($koneksi, $query);
$getdata = mysqli_fetch_assoc($ambil_data);

if (!$id_barang) {
  echo '<h1>Tambah Barang</h1>';
} else {
  echo '<h3>Edit Data Barang</h3>';
}
?>

<form action="simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form">
    <label class="label" for="kode_spt">Kode Sepatu</label>
    <input name="kode_spt" type="text" id="kode_spt" class="input" placeholder="Kode Sepatu" value="<?php if (isset($id_barang)) echo $getdata['kode_spt']; ?>">
    <label class="label" for="price">Price</label>
    <input name="price" type="number" id="price" class="input" placeholder="Price" value="<?php if (isset($id_barang)) echo $getdata['price']; ?>">
    <label class="label" for="quantity">Quantity</label>
    <input name="quantity" type="number" id="quantity" class="input" placeholder="Stok" value="<?php if (isset($id_barang)) echo $getdata['quantity']; ?>">
    <label class="label" for="jenis_barang">Jenis Barang</label>
    <input name="jenis_barang" type="text" id="jenis_barang" class="input" placeholder="Jenis Barang" value="<?php if (isset($id_barang)) echo $getdata['jenis_barang']; ?>">
    <label class="label" for="nama_barang">Nama Barang</label>
    <input name="nama_barang" type="text" id="nama_barang" class="input" placeholder="Input Nama barang" value="<?php if (isset($id_barang)) echo $getdata['nama_barang']; ?>">
  </div>
  <br>
  <div class="file is-boxed">
    <label class="file-label">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <label for="brks" class="file-label">
          Choose a file…
          <input class="file-input" id="brks" type="file" name="brks" value="<?php if (isset($id_barang)) echo $getdata['img']; ?>">
        </label>
      </span>
    </label>
  </div>
  <div class="form">
    <input class="label" name="id_barang" type="hidden" id="id_barang" class="input" value="<?php echo $getdata['id_barang'] ?>">
  </div><br>
  <div class="field is-grouped">
    <div class="control">
      <button type="submit" class="button is-link">Submit</button>
    </div>
    <div class="control">
      <a href="index.php?act=shbarang">
        <button type="button" class="button is-link is-light">Cancel</button>
      </a>
    </div>
  </div>
</form>