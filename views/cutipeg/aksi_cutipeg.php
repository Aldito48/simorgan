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

  if ($controller=='cutipeg' AND $act=='input'){
    if(isset($_POST['simpan_data'])){

  // id pegawai
  $nipPegawai = $_POST['nip_peg'];
  $queryIdPeg = mysqli_query($koneksi,"SELECT id FROM data_pegawai WHERE nip_baru = '$nipPegawai'");
  $dataId = mysqli_fetch_array($queryIdPeg);
  $IdPeg = $dataId['id'];
  // id pegawai
	
	$insert = "insert into usul_cuti (id_peg, nama_peg, nip_peg, jabatan_peg, uk_peg, masa_kerja, pangkat_peg, nama_atasan, nip_atasan, jenis_cuti, alasan_cuti, tgl_mulai, tgl_selesai, lama_cuti, alamat_cuti, no_telp, keputusan) values('$IdPeg', '$_POST[nama_peg]', '$_POST[nip_peg]', '$_POST[jabatan_peg]', '$_POST[uk_peg]', '$_POST[masa_kerja]', '$_POST[pangkat_peg]', '$_POST[nama_atasan]', '$_POST[nip_atasan]', '$_POST[jenis_cuti]', '$_POST[alasan_cuti]', '$_POST[tgl_mulai]', '$_POST[tgl_selesai]', '$_POST[lama_cuti]', '$_POST[alamat_cuti]', '$_POST[no_telp]', '$_POST[keputusan]')";
   
	$result = mysqli_query($koneksi,$insert);
   
if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Jabatan',
    text:  'Data Jabatan Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=cutipeg');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Jabtan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=cutipeg');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='cutipeg' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
      $update= "UPDATE usul_cuti SET nama_peg = '$_POST[nama_peg]', nip_peg = '$_POST[nip_peg]', jabatan_peg = '$_POST[jabatan_peg]', uk_peg = '$_POST[uk_peg]', masa_kerja = '$_POST[masa_kerja]', pangkat_peg = '$_POST[pangkat_peg]', nama_atasan = '$_POST[nama_atasan]', nip_atasan = '$_POST[nip_atasan]', jenis_cuti = '$_POST[jenis_cuti]', alasan_cuti = '$_POST[alasan_cuti]', tgl_mulai = '$_POST[tgl_mulai]', tgl_selesai = '$_POST[tgl_selesai]', lama_cuti = '$_POST[lama_cuti]', alamat_cuti = '$_POST[alamat_cuti]', no_telp = '$_POST[no_telp]', keputusan = '$_POST[keputusan]' WHERE id = '$_POST[id]'";
      
	
      $result = mysqli_query($koneksi,$update);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Jabatan',
    text:  'Data Jabatan Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=cutipeg');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Jabatan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=cutipeg');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='cutipeg' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
     $del3= "DELETE FROM usul_cuti WHERE id = '$_POST[id]'";
			$result = mysqli_query($koneksi,$del3);

if(!$result){
  echo mysqli_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Jabatan',
    text:  'Data Jabatan Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=cutipeg');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Jabatan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../simpeg.php?controller=cutipeg');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
