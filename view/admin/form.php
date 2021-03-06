<?php
include '../../controller/connection.php';
$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';
$query = "SELECT * from tb_user WHERE id_user='$id_user' AND username='$username'";
$ambil_data = mysqli_query($koneksi, $query);
$getdata = mysqli_fetch_assoc($ambil_data);
if (!$id_user) {
  echo '<h3>Tambah Data Member</h3>';
} else {
  echo '<h3>Edit Data Member</h3>';
}
?>

<form action="simpan.php" method="POST">
  <div class="form">
    <label class="label" for="username">Username</label>
    <input name="username" type="text" id="username" class="input" placeholder="Input Username" value="<?php if (isset($id_user)) echo $getdata['username']; ?>">
  </div>
  <div class="form">
    <label class="label" for="password">Password</label>
    <input name="password" type="password" id="password" class="input" placeholder="Input Password" value="<?php if (isset($id_user)) echo $getdata['password']; ?>">
  </div>

  <div class="form">
    <label class="label" for="level">Level</label>
    <select name="level" id="level" class="select">
      <option value="admin" <?php if (isset($getdata) && $getdata['level'] == "admin") echo 'selected' ?>>admin</option>
      <option value="managers" <?php if (isset($getdata) && $getdata['level'] == "managers") echo 'selected' ?>>managers</option>
      <option value="karyawan" <?php if (isset($getdata) && $getdata['level'] == "karyawan") echo 'selected' ?>>karyawan</option>
      <!-- fungsi isset akan mengembalikan nilai true jika variabel sudah didefinisikan dengan nilai tertentu dan false jika belum didefiniskan-->
    </select>
  </div>

  <div class="form">
    <input class="label" name="id_user" type="hidden" id="id_user" class="input" value="<?php echo $getdata['id_user'] ?>">
  </div><br>
  <div class="field is-grouped">
    <div class="control">
      <button type="submit" class="button is-link">Submit</button>
    </div>
    <div class="control">
      <a href="index.php?act=shmembers">
        <button type="button" class="button is-link is-light">Cancel</button>
      </a>
    </div>
  </div>
</form>