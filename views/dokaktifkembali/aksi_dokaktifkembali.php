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
  
  $controller = $_GET['controller'];
  $act    = $_GET['act'];

  if ($controller=='dokaktifkembali' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	$insert = "insert into dokaktifkembali (kdaktif,
											uraianaktif) 
											values('$_POST[kdaktif]',
											'$_POST[uraianaktif]')";
   
	$result = mysqli_query($koneksi,$insert);
   
if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pengaktifan Kembali',
    text:  'Data Dokumen Pengaktifan Kembali Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokaktifkembali');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pengaktifan Kembali',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokaktifkembali');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='dokaktifkembali' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
      $update= "UPDATE dokaktifkembali SET kdaktif = '$_POST[kdaktif]',
											uraianaktif = '$_POST[uraianaktif]' 
											WHERE id = '$_POST[id]'";
      
      $result = mysqli_query($koneksi,$update);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pengaktifan Kembali',
    text:  'Data Dokumen Pengaktifan Kembali Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokaktifkembali');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pengaktifan Kembali',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokaktifkembali');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='dokaktifkembali' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
     $del3= "DELETE FROM dokaktifkembali WHERE id = '$_POST[id]'";
			$result = mysqli_query($koneksi,$del3);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pengaktifan Kembali',
    text:  'Data Dokumen Pengaktifan Kembali Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokaktifkembali');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pengaktifan Kembali',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokaktifkembali');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
