<?php
error_reporting(0);
include "config/koneksi.php";

function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}
$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));


  $query  = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
  $login  = mysqli_query($koneksi,$query);
  $ketemu = mysqli_num_rows($login);
  $r      = mysqli_fetch_array($login);

// Apabila username dan password ditemukan
  if ($ketemu > 0){
    session_start();

    $_SESSION['ses_user']     = $r['username'];
    $_SESSION['ses_nama']     = $r['nama_lengkap'];
    $_SESSION['ses_password'] = $r['password'];
    $_SESSION['ses_foto']       = $r['foto'];
    $_SESSION['ses_level']    = $r['level'];
	$_SESSION['ses_nip']    = $r['nip'];
	$_SESSION['thnaktif']    = $_POST['tahunaktif'];
    session_regenerate_id();
    $sid_baru = session_id();
    mysqli_query($koneksi,"UPDATE users SET id_sesi='$sid_baru' WHERE username='$username'");


    header('location:simpeg.php?controller=beranda');
  }
  else{
     echo "<script>alert('Username Atau Password Anda Salah'); window.location = 'index.php'</script>";
  }

?>
