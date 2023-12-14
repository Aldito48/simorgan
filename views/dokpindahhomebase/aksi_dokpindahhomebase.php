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

  if ($controller=='dokpindahhomebase' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	$insert = "insert into dokpindahhomebase (kdhomebase,
											uraianhomebase) 
											values('$_POST[kdhomebase]',
											'$_POST[uraianhomebase]')";
   
	$result = mysqli_query($koneksi,$insert);
   
if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pindah Homebase',
    text:  'Data Dokumen Pindah Homebase Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokpindahhomebase');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pindah Homebase',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokpindahhomebase');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='dokpindahhomebase' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
      $update= "UPDATE dokpindahhomebase SET kdhomebase = '$_POST[kdhomebase]',
											uraianhomebase = '$_POST[uraianhomebase]' 
											WHERE id = '$_POST[id]'";
      
      $result = mysqli_query($koneksi,$update);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pindah Homebase',
    text:  'Data Dokumen Pindah Homebase Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokpindahhomebase');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pindah Homebase',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokpindahhomebase');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='dokpindahhomebase' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
     $del3= "DELETE FROM dokpindahhomebase WHERE id = '$_POST[id]'";
			$result = mysqli_query($koneksi,$del3);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pindah Homebase',
    text:  'Data Dokumen Pindah Homebase Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokpindahhomebase');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Dokumen Pindah Homebase',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=dokpindahhomebase');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
