<link href="../../js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
<script type="text/javascript" src="../../js/plugins/sweetalert/dist/sweetalert.min.js"></script>   

<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../index.php'); 
}

else{
  include "../../config/koneksi.php";
  include "../../config/library.php";
  include "../../config/fungsi_thumbnail.php";
  
  $module = $_GET['module'];
  $act    = $_GET['act'];

  if ($module=='fotouser' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Ganti Foto',
    text:  'Data Ganti Foto Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../appmaster.php?module=fotouser');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Ganti Foto',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../appmaster.php?module=fotouser');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='fotouser' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
   
  
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $tipe_file   = $_FILES['foto']['type'];
    $nama_file   = $_FILES['foto']['name'];
    $acak           = rand(1,99);
    
	 $nama_file_unik = $acak.$nama_file; 
	 
	 $ftfotouser = "SELECT foto from users where id='$_POST[id]'";
        $lfoto = mysql_query($ftfotouser);
        $k     = mysql_fetch_array($lfoto);
        
        if ($k['foto']!=''){
          $namafile = $k['foto'];
          
          // hapus filenya
          unlink("../../img/foto_user/$namafile");   
        } 
		 
	 
	  Uploadfotouser($nama_file_unik ,'../../img/foto_user/');
  
		$update= "UPDATE users SET  foto= '$nama_file_unik'
                                   WHERE id = '$_POST[id]'";
  
      
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Ganti Foto',
    text:  'Data Ganti Foto Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../appmaster.php?module=fotouser');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Ganti Foto',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../appmaster.php?module=fotouser');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	
	
}
?>
