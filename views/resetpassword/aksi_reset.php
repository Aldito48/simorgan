<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../index.php'); 
}
// 
else{
  include "../../config/koneksi.php";
  include "../../config/fungsi_thumbnail.php";


  $module = $_GET['module'];
  $act    = $_GET['act'];

  if ($module=='resetpassword' AND $act=='input'){
	   $lokasi_file5 = $_FILES['gambar_user']['tmp_name'];
	   $tipe_file5  = $_FILES['gambar_user']['type'];
       $nama_file5   = $_FILES['gambar_user']['name'];
       $acak5        = rand(1,99);
	   $nama_gambar5 = $acak5.$nama_file5; 
	  if (empty($lokasi_file5)){
		  $username = $_POST['username'];
		  $nama_lengkap = $_POST['nama_lengkap'];
		  $password     = md5($_POST['password']);
		  $nik = $_POST['nik'];
		  $nohp = $_POST['nohp'];
      $input= "insert into users(username,
								 nama_lengkap,
								 password,
								 nik,
								nohp								 
								) Values(
								'$username',
								'$nama_lengkap',
								'$password',
								'$nik',
								'$nohp'
								)";
	
      $result = mysql_query($input);

if(!$result){
	 echo mysql_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Password Berhasil tambah');
        window.location.href = '../../app.php?module=resetpassword';
    </script>
    <?php
	
}

// 
mysql_close($koneksi);
	 		 		
		}
			else {
	$ukuran5 = 200; 
	$folder5  = "../../img/foto_user/"; // 
	UploadFotoUser($nama_gambar5, $folder5, $ukuran5);				
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$password     = md5($_POST['password']);
	$nik = $_POST['nik'];
	$nohp = $_POST['nohp'];
      $input= "insert into users(username,
								 nama_lengkap,
								 password, 
								 nik,
								 nohp,
								 foto
								 
								) Values(
								'$username',
								'$nama_lengkap',
								'$password',
								'$nik',
								'$nohp',
								'$nama_gambar5'
								)";
	
      $result = mysql_query($input);
      

if(!$result){
	 echo mysql_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data User dan Foto Berhasil tambah');
        window.location.href = '../../app.php?module=resetpassword';
    </script>
    <?php
	
}

// 
mysql_close($koneksi);
      
    }
  }	
  

  // 
  elseif ($module=='resetpassword' AND $act=='update'){
    $lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file  = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak       = rand(1,99);
	$nama_gambar = $acak.$nama_file; 
	 if (empty($lokasi_file)){
    	
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$password     = md5($_POST['password']);
	$nik = $_POST['nik'];
	$nohp = $_POST['nohp'];
    $id = $_POST['id'];
	$chkcount = count($id);
	 if (empty($_POST['password'])) {
    
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',	
								 nik		= '$nik[$i]',
								  nohp		= '$nohp[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = mysql_query($update);
	 } else {
		  $password = md5($_POST['password']);
			for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',	
								 password	= '$password',
								 nik		= '$nik[$i]',
								 nohp		= '$nohp[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = mysql_query($update); 
	 }
if(!$result){
	 echo mysql_error($koneksi);
} else {
  
	 ?>
	<script>
        alert('Data Password Berhasil diganti');
        window.location.href = '../../app.php?module=resetpassword';
    </script>
    
    <?php
	
}

// Close the connection
mysql_close($koneksi);
	 } else {
    $lokasi_file = $_FILES['fupload']['tmp_name'];
	$tipe_file  = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak       = rand(1,99);
	$fupload_name = $acak.$nama_file; 
	$ukuran = 200; 
	$folder  = "../../img/foto_user/"; // 
	UploadFoto($fupload_name, $folder, $ukuran);				 
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$password     = md5($_POST['password']);
	$nik = $_POST['nik'];
	$nohp = $_POST['nohp'];
    $id = $_POST['id'];
	$chkcount = count($id);
	
    if (empty($_POST['password'])) {
    
   	for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',
								 foto		  = '$fupload_name',	
								 nik		= '$nik[$i]',
								  nohp		= '$nohp[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = mysql_query($update);
	 } else {
		  $password = md5($_POST['password']);
			for($i=0; $i<$chkcount; $i++)
	{	
      $update= "UPDATE users SET username     = '$username[$i]',
								 nama_lengkap = '$nama_lengkap[$i]',	
								 foto		  = '$nama_gambar6',	
								 password	= '$password',
								 nohp	= '$nohp',
								 nik		= '$nik[$i]'
                                   WHERE id = '$id[$i]'";
      
	}
      $result = mysql_query($update); 
	 }

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	 ?>
	<script>
        alert('Data Password dan Foto Berhasil diganti');
        window.location.href = '../../app.php?module=resetpassword';
    </script>
    
    <?php
	
}

// Close the connection
mysql_close($koneksi);
		 
		 
	 }

    }
	
	

	}
?>
