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

  if ($controller=='mstpangkatgol' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	$insert = "insert into mstpangkatgol (kodegol, namagol, namapangkat) values('$_POST[kodegol]', '$_POST[namagol]', '$_POST[namapangkat]')";
   
	$result = mysqli_query($koneksi,$insert);
   
if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pangkat/Golongan',
    text:  'Data Pangkat/Golongan Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpangkatgol');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pangkat/Golongan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpangkatgol');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='mstpangkatgol' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
      $update= "UPDATE mstpangkatgol SET kodegol = '$_POST[kodegol]', namagol = '$_POST[namagol]', namapangkat = '$_POST[namapangkat]' WHERE id = '$_POST[id]'";
      
	
      $result = mysqli_query($koneksi,$update);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pangkat/Golongan',
    text:  'Data Pangkat/Golongan Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpangkatgol');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pangkat/Golongan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpangkatgol');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='mstpangkatgol' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
     $del3= "DELETE FROM mstpangkatgol WHERE id = '$_POST[id]'";
			$result = mysqli_query($koneksi,$del3);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pangkat/Golongan',
    text:  'Data Pangkat/Golongan Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpangkatgol');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pangkat/Golongan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpangkatgol');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
