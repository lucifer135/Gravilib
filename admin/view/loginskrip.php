<?php
	session_start();	
	$error='';
	if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			$error = "Username atau Password salah woi";
		}
		else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
					// Membangun koneksi ke database
			include('../config/db.php');

			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			
			// SQL query untuk memeriksa apakah karyawan terdapat di database?
			$query = mysql_query("select * from petugas where password_petugas='$password' AND username_petugas='$username'", $connection);
			$rows = mysql_num_rows($query);
				if ($rows == 1) {
					$_SESSION['login_user_admin']=$username; // Membuat Sesi/session
					header("Location: loginpro.php"); // Mengarahkan ke halaman profil
					} else {
					$error = "Username atau Password belum terdaftar";
					}
			mysql_close($connection); // Menutup koneksi
		}
	}
?>