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

  if ($controller=='mstpegawai' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	

	    $insert = "INSERT INTO data_pegawai (nip_baru, nama_peg, pangkat_peg, uk_peg, jabatan_peg, status_peg) VALUES ('$_POST[nip_baru]', '$_POST[nama_peg]', '$_POST[pangkat_peg]', '$_POST[uk_peg]', '$_POST[jabatan_peg]', '$_POST[status_peg]')";
   
	    $result = mysqli_query($koneksi,$insert);
   
      if(!$result){
        echo mysqli_error($koneksi);
      } else {
?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Data Pegawai Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpegawai');
  } ,2000); 
 </script>
	
<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpegawai');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='mstpegawai' AND $act=='update'){
    if(isset($_POST['edit_data'])){
  
      $update= "UPDATE data_pegawai SET nip_baru = '$_POST[nip_baru]', nama_peg = '$_POST[nama_peg]', pangkat_peg = '$_POST[pangkat_peg]', uk_peg = '$_POST[uk_peg]', jabatan_peg = '$_POST[jabatan_peg]', status_peg = '$_POST[status_peg]' WHERE id = '$_POST[id]'";
      
      $result = mysqli_query($koneksi,$update);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Data Pegawai Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpegawai');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpegawai');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='mstpegawai' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){
      $del3= "DELETE FROM data_pegawai WHERE id = '$_POST[id]'";
			$result = mysqli_query($koneksi,$del3);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Data Pegawai Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpegawai');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=mstpegawai');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
