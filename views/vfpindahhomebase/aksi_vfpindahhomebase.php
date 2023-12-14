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

  if ($controller=='vfpindahhomebase' AND $act=='input'){
    if(isset($_POST['simpan_data'])){

    // id pegawai
    $nipPegawai = $_POST['nip_peg'];
    $queryIdPeg = mysqli_query($koneksi,"SELECT id FROM data_pegawai WHERE nip_baru = '$nipPegawai'");
    $dataId = mysqli_fetch_array($queryIdPeg);
    $IdPeg = $dataId['id'];
    // id pegawai

    $dir01 = "../file/01/";
    $surat01_file = $_FILES['surat_pengantar_permohonan']['name'];
    $file01_extension = pathinfo($surat01_file, PATHINFO_EXTENSION);
    if ($file01_extension == 'pdf') {
        $encrypted_name_01 = md5(uniqid()) . '.pdf';
        $surat_01 = $encrypted_name_01;
        $temporary01 = $_FILES['surat_pengantar_permohonan']['tmp_name'];
        move_uploaded_file($temporary01, $dir01 . $surat_01);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir02 = "../file/02/";
    $surat02_file = $_FILES['surat_lolos']['name'];
    $file02_extension = pathinfo($surat02_file, PATHINFO_EXTENSION);
    if ($file02_extension == 'pdf') {
        $encrypted_name_02 = md5(uniqid()) . '.pdf';
        $surat_02 = $encrypted_name_02;
        $temporary02 = $_FILES['surat_lolos']['tmp_name'];
        move_uploaded_file($temporary02, $dir02 . $surat_02);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir03 = "../file/03/";
    $surat03_file = $_FILES['surat_keputusan_pemberhentian']['name'];
    $file03_extension = pathinfo($surat03_file, PATHINFO_EXTENSION);
    if ($file03_extension == 'pdf') {
        $encrypted_name_03 = md5(uniqid()) . '.pdf';
        $surat_03 = $encrypted_name_03;
        $temporary03 = $_FILES['surat_keputusan_pemberhentian']['tmp_name'];
        move_uploaded_file($temporary03, $dir03 . $surat_03);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir04 = "../file/04/";
    $surat04_file = $_FILES['sk_pengangkatan']['name'];
    $file04_extension = pathinfo($surat04_file, PATHINFO_EXTENSION);
    if ($file04_extension == 'pdf') {
        $encrypted_name_04 = md5(uniqid()) . '.pdf';
        $surat_04 = $encrypted_name_04;
        $temporary04 = $_FILES['sk_pengangkatan']['tmp_name'];
        move_uploaded_file($temporary04, $dir04 . $surat_04);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir05 = "../file/05/";
    $surat05_file = $_FILES['sk_cpns']['name'];
    $file05_extension = pathinfo($surat05_file, PATHINFO_EXTENSION);
    if ($file05_extension == 'pdf') {
        $encrypted_name_05 = md5(uniqid()) . '.pdf';
        $surat_05 = $encrypted_name_05;
        $temporary05 = $_FILES['sk_cpns']['tmp_name'];
        move_uploaded_file($temporary05, $dir05 . $surat_05);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir06 = "../file/06/";
    $surat06_file = $_FILES['sk_pns']['name'];
    $file06_extension = pathinfo($surat06_file, PATHINFO_EXTENSION);
    if ($file06_extension == 'pdf') {
        $encrypted_name_06 = md5(uniqid()) . '.pdf';
        $surat_06 = $encrypted_name_06;
        $temporary06 = $_FILES['sk_pns']['tmp_name'];
        move_uploaded_file($temporary06, $dir06 . $surat_06);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir07 = "../file/07/";
    $surat07_file = $_FILES['surat_rekomendasi_pindah']['name'];
    $file07_extension = pathinfo($surat07_file, PATHINFO_EXTENSION);
    if ($file07_extension == 'pdf') {
        $encrypted_name_07 = md5(uniqid()) . '.pdf';
        $surat_07 = $encrypted_name_07;
        $temporary07 = $_FILES['surat_rekomendasi_pindah']['tmp_name'];
        move_uploaded_file($temporary07, $dir07 . $surat_07);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir08 = "../file/08/";
    $surat08_file = $_FILES['fotocopy_ijazah']['name'];
    $file08_extension = pathinfo($surat08_file, PATHINFO_EXTENSION);
    if ($file08_extension == 'pdf') {
        $encrypted_name_08 = md5(uniqid()) . '.pdf';
        $surat_08 = $encrypted_name_08;
        $temporary08 = $_FILES['fotocopy_ijazah']['tmp_name'];
        move_uploaded_file($temporary08, $dir08 . $surat_08);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir09 = "../file/09/";
    $surat09_file = $_FILES['jabatan_akademik']['name'];
    $file09_extension = pathinfo($surat09_file, PATHINFO_EXTENSION);
    if ($file09_extension == 'pdf') {
        $encrypted_name_09 = md5(uniqid()) . '.pdf';
        $surat_09 = $encrypted_name_09;
        $temporary09 = $_FILES['jabatan_akademik']['tmp_name'];
        move_uploaded_file($temporary09, $dir09 . $surat_09);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir10 = "../file/10/";
    $surat10_file = $_FILES['print_out']['name'];
    $file10_extension = pathinfo($surat10_file, PATHINFO_EXTENSION);
    if ($file10_extension == 'pdf') {
        $encrypted_name_10 = md5(uniqid()) . '.pdf';
        $surat_10 = $encrypted_name_10;
        $temporary10 = $_FILES['print_out']['tmp_name'];
        move_uploaded_file($temporary10, $dir10 . $surat_10);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }
	
	$insert = "insert into usul_pindah_homebase (id_peg, tahun, nip_peg, nama_peg, pangkat_peg, uk_peg, jabatan_peg, surat_pengantar_permohonan, surat_lolos, surat_keputusan_pemberhentian, sk_pengangkatan, sk_cpns, sk_pns, surat_rekomendasi_pindah, fotocopy_ijazah, jabatan_akademik, print_out, status) values('$IdPeg', '$_POST[tahun]', '$_POST[nip_peg]', '$_POST[nama_peg]', '$_POST[pangkat_peg]', '$_POST[uk_peg]', '$_POST[jabatan_peg]', '$surat_01', '$surat_02', '$surat_03', '$surat_04', '$surat_05', '$surat_06', '$surat_07', '$surat_08', '$surat_09', '$surat_10', '$_POST[status]')";
   
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
   window.location.replace('../../simpeg.php?controller=vfpindahhomebase');
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
   window.location.replace('../../simpeg.php?controller=vfpindahhomebase');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='vfpindahhomebase' AND $act=='update'){
    if(isset($_POST['edit_data'])){

        $querySurat01 = mysqli_query($koneksi, "SELECT surat_pengantar_permohonan FROM usul_pindah_homebase WHERE id = '$id'");
        $row01 = mysqli_fetch_array($querySurat01);
        $existing_file_01 = $row01['surat_pengantar_permohonan'];
        $dir01 = "../file/01/";
        if(isset($_FILES['surat_pengantar_permohonan']) && $_FILES['surat_pengantar_permohonan']['error'] === UPLOAD_ERR_OK){
            $surat01_file = $_FILES['surat_pengantar_permohonan']['name'];
            $file01_extension = pathinfo($surat01_file, PATHINFO_EXTENSION);
            if ($file01_extension == 'pdf') {
                $encrypted_name_01 = md5(uniqid()) . '.pdf';
                $surat_01 = $encrypted_name_01;
                $temporary01 = $_FILES['surat_pengantar_permohonan']['tmp_name'];
                if($existing_file_01 != $surat_01){
                    $lokasi_01 = $dir01 . $existing_file_01;
                    unlink($lokasi_01);
                } else {
                    $surat_01 = $existing_file_01;
                }
                move_uploaded_file($temporary01, $dir01 . $surat_01);
            } else{
                $surat_01 = $existing_file_01;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_01 = $existing_file_01;
        }

        $querySurat02 = mysqli_query($koneksi, "SELECT surat_lolos FROM usul_pindah_homebase WHERE id = '$id'");
        $row02 = mysqli_fetch_array($querySurat02);
        $existing_file_02 = $row02['surat_lolos'];
        $dir02 = "../file/02/";
        if(isset($_FILES['surat_lolos']) && $_FILES['surat_lolos']['error'] === UPLOAD_ERR_OK){
            $surat02_file = $_FILES['surat_lolos']['name'];
            $file02_extension = pathinfo($surat02_file, PATHINFO_EXTENSION);
            if ($file02_extension == 'pdf') {
                $encrypted_name_02 = md5(uniqid()) . '.pdf';
                $surat_02 = $encrypted_name_02;
                $temporary02 = $_FILES['surat_lolos']['tmp_name'];
                if($existing_file_02 != $surat_02){
                    $lokasi_02 = $dir02 . $existing_file_02;
                    unlink($lokasi_02);
                } else {
                    $surat_02 = $existing_file_02;
                }
                move_uploaded_file($temporary02, $dir02 . $surat_02);
            } else{
                $surat_02 = $existing_file_02;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_02 = $existing_file_02;
        }

        $querySurat03 = mysqli_query($koneksi, "SELECT surat_keputusan_pemberhentian FROM usul_pindah_homebase WHERE id = '$id'");
        $row03 = mysqli_fetch_array($querySurat03);
        $existing_file_03 = $row03['surat_keputusan_pemberhentian'];
        $dir03 = "../file/03/";
        if(isset($_FILES['surat_keputusan_pemberhentian']) && $_FILES['surat_keputusan_pemberhentian']['error'] === UPLOAD_ERR_OK){
            $surat03_file = $_FILES['surat_keputusan_pemberhentian']['name'];
            $file03_extension = pathinfo($surat03_file, PATHINFO_EXTENSION);
            if ($file03_extension == 'pdf') {
                $encrypted_name_03 = md5(uniqid()) . '.pdf';
                $surat_03 = $encrypted_name_03;
                $temporary03 = $_FILES['surat_keputusan_pemberhentian']['tmp_name'];
                if($existing_file_03 != $surat_03){
                    $lokasi_03 = $dir03 . $existing_file_03;
                    unlink($lokasi_03);
                } else {
                    $surat_03 = $existing_file_03;
                }
                move_uploaded_file($temporary03, $dir03 . $surat_03);
            } else{
                $surat_03 = $existing_file_03;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_03 = $existing_file_03;
        }

        $querySurat04 = mysqli_query($koneksi, "SELECT sk_pengangkatan FROM usul_pindah_homebase WHERE id = '$id'");
        $row04 = mysqli_fetch_array($querySurat04);
        $existing_file_04 = $row04['sk_pengangkatan'];
        $dir04 = "../file/04/";
        if(isset($_FILES['sk_pengangkatan']) && $_FILES['sk_pengangkatan']['error'] === UPLOAD_ERR_OK){
            $surat04_file = $_FILES['sk_pengangkatan']['name'];
            $file04_extension = pathinfo($surat04_file, PATHINFO_EXTENSION);
            if ($file04_extension == 'pdf') {
                $encrypted_name_04 = md5(uniqid()) . '.pdf';
                $surat_04 = $encrypted_name_04;
                $temporary04 = $_FILES['sk_pengangkatan']['tmp_name'];
                if($existing_file_04 != $surat_04){
                    $lokasi_04 = $dir04 . $existing_file_04;
                    unlink($lokasi_04);
                } else {
                    $surat_04 = $existing_file_04;
                }
                move_uploaded_file($temporary04, $dir04 . $surat_04);
            } else{
                $surat_04 = $existing_file_04;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_04 = $existing_file_04;
        }

        $querySurat05 = mysqli_query($koneksi, "SELECT sk_cpns FROM usul_pindah_homebase WHERE id = '$id'");
        $row05 = mysqli_fetch_array($querySurat05);
        $existing_file_05 = $row05['sk_cpns'];
        $dir05 = "../file/05/";
        if(isset($_FILES['sk_cpns']) && $_FILES['sk_cpns']['error'] === UPLOAD_ERR_OK){
            $surat05_file = $_FILES['sk_cpns']['name'];
            $file05_extension = pathinfo($surat05_file, PATHINFO_EXTENSION);
            if ($file05_extension == 'pdf') {
                $encrypted_name_05 = md5(uniqid()) . '.pdf';
                $surat_05 = $encrypted_name_05;
                $temporary05 = $_FILES['sk_cpns']['tmp_name'];
                if($existing_file_05 != $surat_05){
                    $lokasi_05 = $dir05 . $existing_file_05;
                    unlink($lokasi_05);
                } else {
                    $surat_05 = $existing_file_05;
                }
                move_uploaded_file($temporary05, $dir05 . $surat_05);
            } else{
                $surat_05 = $existing_file_05;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_05 = $existing_file_05;
        }

        $querySurat06 = mysqli_query($koneksi, "SELECT sk_pns FROM usul_pindah_homebase WHERE id = '$id'");
        $row06 = mysqli_fetch_array($querySurat06);
        $existing_file_06 = $row06['sk_pns'];
        $dir06 = "../file/06/";
        if(isset($_FILES['sk_pns']) && $_FILES['sk_pns']['error'] === UPLOAD_ERR_OK){
            $surat06_file = $_FILES['sk_pns']['name'];
            $file06_extension = pathinfo($surat06_file, PATHINFO_EXTENSION);
            if ($file06_extension == 'pdf') {
                $encrypted_name_06 = md5(uniqid()) . '.pdf';
                $surat_06 = $encrypted_name_06;
                $temporary06 = $_FILES['sk_pns']['tmp_name'];
                if($existing_file_06 != $surat_06){
                    $lokasi_06 = $dir06 . $existing_file_06;
                    unlink($lokasi_06);
                } else {
                    $surat_06 = $existing_file_06;
                }
                move_uploaded_file($temporary06, $dir06 . $surat_06);
            } else{
                $surat_06 = $existing_file_06;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_06 = $existing_file_06;
        }

        $querySurat07 = mysqli_query($koneksi, "SELECT surat_rekomendasi_pindah FROM usul_pindah_homebase WHERE id = '$id'");
        $row07 = mysqli_fetch_array($querySurat07);
        $existing_file_07 = $row07['surat_rekomendasi_pindah'];
        $dir07 = "../file/07/";
        if(isset($_FILES['surat_rekomendasi_pindah']) && $_FILES['surat_rekomendasi_pindah']['error'] === UPLOAD_ERR_OK){
            $surat07_file = $_FILES['surat_rekomendasi_pindah']['name'];
            $file07_extension = pathinfo($surat07_file, PATHINFO_EXTENSION);
            if ($file07_extension == 'pdf') {
                $encrypted_name_07 = md5(uniqid()) . '.pdf';
                $surat_07 = $encrypted_name_07;
                $temporary07 = $_FILES['surat_rekomendasi_pindah']['tmp_name'];
                if($existing_file_07 != $surat_07){
                    $lokasi_07 = $dir07 . $existing_file_07;
                    unlink($lokasi_07);
                } else {
                    $surat_07 = $existing_file_07;
                }
                move_uploaded_file($temporary07, $dir07 . $surat_07);
            } else{
                $surat_07 = $existing_file_07;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_07 = $existing_file_07;
        }

        $querySurat08 = mysqli_query($koneksi, "SELECT fotocopy_ijazah FROM usul_pindah_homebase WHERE id = '$id'");
        $row08 = mysqli_fetch_array($querySurat08);
        $existing_file_08 = $row08['fotocopy_ijazah'];
        $dir08 = "../file/08/";
        if(isset($_FILES['fotocopy_ijazah']) && $_FILES['fotocopy_ijazah']['error'] === UPLOAD_ERR_OK){
            $surat08_file = $_FILES['fotocopy_ijazah']['name'];
            $file08_extension = pathinfo($surat08_file, PATHINFO_EXTENSION);
            if ($file08_extension == 'pdf') {
                $encrypted_name_08 = md5(uniqid()) . '.pdf';
                $surat_08 = $encrypted_name_08;
                $temporary08 = $_FILES['fotocopy_ijazah']['tmp_name'];
                if($existing_file_08 != $surat_08){
                    $lokasi_08 = $dir08 . $existing_file_08;
                    unlink($lokasi_08);
                } else {
                    $surat_08 = $existing_file_08;
                }
                move_uploaded_file($temporary08, $dir08 . $surat_08);
            } else{
                $surat_08 = $existing_file_08;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_08 = $existing_file_08;
        }

        $querySurat09 = mysqli_query($koneksi, "SELECT jabatan_akademik FROM usul_pindah_homebase WHERE id = '$id'");
        $row09 = mysqli_fetch_array($querySurat09);
        $existing_file_09 = $row09['jabatan_akademik'];
        $dir09 = "../file/09/";
        if(isset($_FILES['jabatan_akademik']) && $_FILES['jabatan_akademik']['error'] === UPLOAD_ERR_OK){
            $surat09_file = $_FILES['jabatan_akademik']['name'];
            $file09_extension = pathinfo($surat09_file, PATHINFO_EXTENSION);
            if ($file09_extension == 'pdf') {
                $encrypted_name_09 = md5(uniqid()) . '.pdf';
                $surat_09 = $encrypted_name_09;
                $temporary09 = $_FILES['jabatan_akademik']['tmp_name'];
                if($existing_file_09 != $surat_09){
                    $lokasi_09 = $dir09 . $existing_file_09;
                    unlink($lokasi_09);
                } else {
                    $surat_09 = $existing_file_09;
                }
                move_uploaded_file($temporary09, $dir09 . $surat_09);
            } else{
                $surat_09 = $existing_file_09;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_09 = $existing_file_09;
        }

        $querySurat10 = mysqli_query($koneksi, "SELECT print_out FROM usul_pindah_homebase WHERE id = '$id'");
        $row10 = mysqli_fetch_array($querySurat10);
        $existing_file_10 = $row10['print_out'];
        $dir10 = "../file/10/";
        if(isset($_FILES['print_out']) && $_FILES['print_out']['error'] === UPLOAD_ERR_OK){
            $surat10_file = $_FILES['print_out']['name'];
            $file10_extension = pathinfo($surat10_file, PATHINFO_EXTENSION);
            if ($file10_extension == 'pdf') {
                $encrypted_name_10 = md5(uniqid()) . '.pdf';
                $surat_10 = $encrypted_name_10;
                $temporary10 = $_FILES['print_out']['tmp_name'];
                if($existing_file_10 != $surat_10){
                    $lokasi_10 = $dir10 . $existing_file_10;
                    unlink($lokasi_10);
                } else {
                    $surat_10 = $existing_file_10;
                }
                move_uploaded_file($temporary10, $dir10 . $surat_10);
            } else{
                $surat_10 = $existing_file_10;
                echo "<script>alert('Hanya File PDF Saja');</script>";
            }
        } else{
            $surat_10 = $existing_file_10;
        }
  
      $update= "UPDATE usul_pindah_homebase SET keputusan = '$_POST[keputusan]' WHERE id = '$_POST[id]'";
      
	
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
   window.location.replace('../../simpeg.php?controller=vfpindahhomebase');
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
   window.location.replace('../../simpeg.php?controller=vfpindahhomebase');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='vfpindahhomebase' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
        $querySurat = mysqli_query($koneksi, "SELECT * FROM usul_pindah_homebase WHERE id = '$_POST[id]'") or die (mysqli_error($con));
        $result = mysqli_fetch_array($querySurat);
        unlink("../file/01/".$result['surat_pengantar_permohonan']);
        unlink("../file/02/".$result['surat_lolos']);
        unlink("../file/03/".$result['surat_keputusan_pemberhentian']);
        unlink("../file/04/".$result['sk_pengangkatan']);
        unlink("../file/05/".$result['sk_cpns']);
        unlink("../file/06/".$result['sk_pns']);
        unlink("../file/07/".$result['surat_rekomendasi_pindah']);
        unlink("../file/08/".$result['fotocopy_ijazah']);
        unlink("../file/09/".$result['jabatan_akademik']);
        unlink("../file/10/".$result['print_out']);
     $del3= "DELETE FROM usul_pindah_homebase WHERE id = '$_POST[id]'";
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
   window.location.replace('../../simpeg.php?controller=vfpindahhomebase');
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
   window.location.replace('../../simpeg.php?controller=vfpindahhomebase');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
