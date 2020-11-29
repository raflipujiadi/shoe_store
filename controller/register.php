<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include_once("connection.php");

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);

// menambahkan data user dengan username dan password yang sesuai
mysqli_query($koneksi, "INSERT INTO tb_user SET username='$username',
				password=md5('$password')");

header("location:../login.php");