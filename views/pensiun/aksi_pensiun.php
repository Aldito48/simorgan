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

  if ($controller=='pensiun' AND $act=='input'){
    if(isset($_POST['simpan_data'])){

    // id pegawai
    $nipPegawai = $_POST['nip_peg'];
    $queryIdPeg = mysqli_query($koneksi,"SELECT id FROM data_pegawai WHERE nip_baru = '$nipPegawai'");
    $dataId = mysqli_fetch_array($queryIdPeg);
    $IdPeg = $dataId['id'];
    // id pegawai

    $dir01 = "../file_pensiun/01/";
    $surat01_file = $_FILES['pasfoto']['name'];
    $file01_extension = pathinfo($surat01_file, PATHINFO_EXTENSION);
    if ($file01_extension == 'jpg' || $file01_extension == 'png' || $file01_extension == 'jpeg') {
        $encrypted_name_01 = md5(uniqid()) . "." . $file01_extension;
        $surat_01 = $encrypted_name_01;
        $temporary01 = $_FILES['pasfoto']['tmp_name'];
        move_uploaded_file($temporary01, $dir01 . $surat_01);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir02 = "../file_pensiun/02/";
    $surat02_file = $_FILES['scan_cpns']['name'];
    $file02_extension = pathinfo($surat02_file, PATHINFO_EXTENSION);
    if ($file02_extension == 'pdf') {
        $encrypted_name_02 = md5(uniqid()) . '.pdf';
        $surat_02 = $encrypted_name_02;
        $temporary02 = $_FILES['scan_cpns']['tmp_name'];
        move_uploaded_file($temporary02, $dir02 . $surat_02);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir03 = "../file_pensiun/03/";
    $surat03_file = $_FILES['scan_pns']['name'];
    $file03_extension = pathinfo($surat03_file, PATHINFO_EXTENSION);
    if ($file03_extension == 'pdf') {
        $encrypted_name_03 = md5(uniqid()) . '.pdf';
        $surat_03 = $encrypted_name_03;
        $temporary03 = $_FILES['scan_pns']['tmp_name'];
        move_uploaded_file($temporary03, $dir03 . $surat_03);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir04 = "../file_pensiun/04/";
    $surat04_file = $_FILES['scan_naikpangkat']['name'];
    $file04_extension = pathinfo($surat04_file, PATHINFO_EXTENSION);
    if ($file04_extension == 'pdf') {
        $encrypted_name_04 = md5(uniqid()) . '.pdf';
        $surat_04 = $encrypted_name_04;
        $temporary04 = $_FILES['scan_naikpangkat']['tmp_name'];
        move_uploaded_file($temporary04, $dir04 . $surat_04);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir05 = "../file_pensiun/05/";
    $surat05_file = $_FILES['scan_skp']['name'];
    $file05_extension = pathinfo($surat05_file, PATHINFO_EXTENSION);
    if ($file05_extension == 'pdf') {
        $encrypted_name_05 = md5(uniqid()) . '.pdf';
        $surat_05 = $encrypted_name_05;
        $temporary05 = $_FILES['scan_skp']['tmp_name'];
        move_uploaded_file($temporary05, $dir05 . $surat_05);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir06 = "../file_pensiun/06/";
    $surat06_file = $_FILES['scan_kgb']['name'];
    $file06_extension = pathinfo($surat06_file, PATHINFO_EXTENSION);
    if ($file06_extension == 'pdf') {
        $encrypted_name_06 = md5(uniqid()) . '.pdf';
        $surat_06 = $encrypted_name_06;
        $temporary06 = $_FILES['scan_kgb']['tmp_name'];
        move_uploaded_file($temporary06, $dir06 . $surat_06);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir07 = "../file_pensiun/07/";
    $surat07_file = $_FILES['scan_aktanikah']['name'];
    $file07_extension = pathinfo($surat07_file, PATHINFO_EXTENSION);
    if ($file07_extension == 'pdf') {
        $encrypted_name_07 = md5(uniqid()) . '.pdf';
        $surat_07 = $encrypted_name_07;
        $temporary07 = $_FILES['scan_aktanikah']['tmp_name'];
        move_uploaded_file($temporary07, $dir07 . $surat_07);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir08 = "../file_pensiun/08/";
    $surat08_file = $_FILES['scan_kk']['name'];
    $file08_extension = pathinfo($surat08_file, PATHINFO_EXTENSION);
    if ($file08_extension == 'pdf') {
        $encrypted_name_08 = md5(uniqid()) . '.pdf';
        $surat_08 = $encrypted_name_08;
        $temporary08 = $_FILES['scan_kk']['tmp_name'];
        move_uploaded_file($temporary08, $dir08 . $surat_08);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir09 = "../file_pensiun/09/";
    $surat09_file = $_FILES['scan_aktaanak']['name'];
    $file09_extension = pathinfo($surat09_file, PATHINFO_EXTENSION);
    if ($file09_extension == 'pdf') {
        $encrypted_name_09 = md5(uniqid()) . '.pdf';
        $surat_09 = $encrypted_name_09;
        $temporary09 = $_FILES['scan_aktaanak']['tmp_name'];
        move_uploaded_file($temporary09, $dir09 . $surat_09);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir10 = "../file_pensiun/10/";
    $surat10_file = $_FILES['scan_suratkematian']['name'];
    $file10_extension = pathinfo($surat10_file, PATHINFO_EXTENSION);
    if ($file10_extension == 'pdf') {
        $encrypted_name_10 = md5(uniqid()) . '.pdf';
        $surat_10 = $encrypted_name_10;
        $temporary10 = $_FILES['scan_suratkematian']['tmp_name'];
        move_uploaded_file($temporary10, $dir10 . $surat_10);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir11 = "../file_pensiun/11/";
    $surat11_file = $_FILES['scan_suratkejandaan']['name'];
    $file11_extension = pathinfo($surat11_file, PATHINFO_EXTENSION);
    if ($file11_extension == 'pdf') {
        $encrypted_name_11 = md5(uniqid()) . '.pdf';
        $surat_11 = $encrypted_name_11;
        $temporary11 = $_FILES['scan_suratkejandaan']['tmp_name'];
        move_uploaded_file($temporary11, $dir11 . $surat_11);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir12 = "../file_pensiun/12/";
    $surat12_file = $_FILES['scan_bukutabungan']['name'];
    $file12_extension = pathinfo($surat12_file, PATHINFO_EXTENSION);
    if ($file12_extension == 'pdf') {
        $encrypted_name_12 = md5(uniqid()) . '.pdf';
        $surat_12 = $encrypted_name_12;
        $temporary12 = $_FILES['scan_bukutabungan']['tmp_name'];
        move_uploaded_file($temporary12, $dir12 . $surat_12);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir13 = "../file_pensiun/13/";
    $surat13_file = $_FILES['scan_npwp']['name'];
    $file13_extension = pathinfo($surat13_file, PATHINFO_EXTENSION);
    if ($file13_extension == 'pdf') {
        $encrypted_name_13 = md5(uniqid()) . '.pdf';
        $surat_13 = $encrypted_name_13;
        $temporary13 = $_FILES['scan_npwp']['tmp_name'];
        move_uploaded_file($temporary13, $dir13 . $surat_13);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }

    $dir14 = "../file_pensiun/14/";
    $surat14_file = $_FILES['scan_ktp']['name'];
    $file14_extension = pathinfo($surat14_file, PATHINFO_EXTENSION);
    if ($file14_extension == 'pdf') {
        $encrypted_name_14 = md5(uniqid()) . '.pdf';
        $surat_14 = $encrypted_name_14;
        $temporary14 = $_FILES['scan_ktp']['tmp_name'];
        move_uploaded_file($temporary14, $dir14 . $surat_14);
    } else{
        echo "<script>alert('Hanya File PDF Saja');</script>";
    }
	
	$insert = "insert into usul_pensiun (id_peg, tahun, nip_peg, nama_peg, pangkat_peg, uk_peg, jabatan_peg, pasfoto, scan_cpns, scan_pns, scan_naikpangkat, scan_skp, scan_kgb, scan_aktanikah, scan_kk, scan_aktaanak, scan_suratkematian, scan_suratkejandaan, scan_npwp, scan_ktp, status) values('$IdPeg', '$_POST[tahun]', '$_POST[nip_peg]', '$_POST[nama_peg]', '$_POST[pangkat_peg]', '$_POST[uk_peg]', '$_POST[jabatan_peg]', '$surat_01', '$surat_02', '$surat_03', '$surat_04', '$surat_05', '$surat_06', '$surat_07', '$surat_08', '$surat_09', '$surat_10', '$surat_11', '$surat_12', '$surat_13', '$surat_14', '$_POST[status]')";
   
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
   window.location.replace('../../simpeg.php?controller=pensiun');
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
   window.location.replace('../../simpeg.php?controller=pensiun');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }
  
  elseif ($controller=='pensiun' AND $act=='update'){
    if(isset($_POST['edit_data'])){

        $querySurat01 = mysqli_query($koneksi, "SELECT surat_pengantar_permohonan FROM usul_pensiun WHERE id = '$id'");
        $row01 = mysqli_fetch_array($querySurat01);
        $existing_file_01 = $row01['surat_pengantar_permohonan'];
        $dir01 = "../file_pensiun/01/";
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

        $querySurat02 = mysqli_query($koneksi, "SELECT surat_lolos FROM usul_pensiun WHERE id = '$id'");
        $row02 = mysqli_fetch_array($querySurat02);
        $existing_file_02 = $row02['surat_lolos'];
        $dir02 = "../file_pensiun/02/";
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

        $querySurat03 = mysqli_query($koneksi, "SELECT surat_keputusan_pemberhentian FROM usul_pensiun WHERE id = '$id'");
        $row03 = mysqli_fetch_array($querySurat03);
        $existing_file_03 = $row03['surat_keputusan_pemberhentian'];
        $dir03 = "../file_pensiun/03/";
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

        $querySurat04 = mysqli_query($koneksi, "SELECT sk_pengangkatan FROM usul_pensiun WHERE id = '$id'");
        $row04 = mysqli_fetch_array($querySurat04);
        $existing_file_04 = $row04['sk_pengangkatan'];
        $dir04 = "../file_pensiun/04/";
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

        $querySurat05 = mysqli_query($koneksi, "SELECT sk_cpns FROM usul_pensiun WHERE id = '$id'");
        $row05 = mysqli_fetch_array($querySurat05);
        $existing_file_05 = $row05['sk_cpns'];
        $dir05 = "../file_pensiun/05/";
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

        $querySurat06 = mysqli_query($koneksi, "SELECT sk_pns FROM usul_pensiun WHERE id = '$id'");
        $row06 = mysqli_fetch_array($querySurat06);
        $existing_file_06 = $row06['sk_pns'];
        $dir06 = "../file_pensiun/06/";
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

        $querySurat07 = mysqli_query($koneksi, "SELECT surat_rekomendasi_pindah FROM usul_pensiun WHERE id = '$id'");
        $row07 = mysqli_fetch_array($querySurat07);
        $existing_file_07 = $row07['surat_rekomendasi_pindah'];
        $dir07 = "../file_pensiun/07/";
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

        $querySurat08 = mysqli_query($koneksi, "SELECT fotocopy_ijazah FROM usul_pensiun WHERE id = '$id'");
        $row08 = mysqli_fetch_array($querySurat08);
        $existing_file_08 = $row08['fotocopy_ijazah'];
        $dir08 = "../file_pensiun/08/";
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

        $querySurat09 = mysqli_query($koneksi, "SELECT jabatan_akademik FROM usul_pensiun WHERE id = '$id'");
        $row09 = mysqli_fetch_array($querySurat09);
        $existing_file_09 = $row09['jabatan_akademik'];
        $dir09 = "../file_pensiun/09/";
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

        $querySurat10 = mysqli_query($koneksi, "SELECT print_out FROM usul_pensiun WHERE id = '$id'");
        $row10 = mysqli_fetch_array($querySurat10);
        $existing_file_10 = $row10['print_out'];
        $dir10 = "../file_pensiun/10/";
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
  
      $update= "UPDATE usul_pensiun SET tahun = '$_POST[tahun]', nip_peg = '$_POST[nip_peg]', nama_peg = '$_POST[nama_peg]', pangkat_peg = '$_POST[pangkat_peg]', uk_peg = '$_POST[uk_peg]', jabatan_peg = '$_POST[jabatan_peg]', surat_pengantar_permohonan = '$surat_01', surat_lolos = '$surat_02', surat_keputusan_pemberhentian = '$surat_03', sk_pengangkatan = '$surat_04', sk_cpns = '$surat_05', sk_pns = '$surat_06', surat_rekomendasi_pindah = '$surat_07', fotocopy_ijazah = '$surat_08', jabatan_akademik = '$surat_09', print_out = '$surat_10', keputusan = '$_POST[keputusan]' WHERE id = '$_POST[id]'";
      
	
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
   window.location.replace('../../simpeg.php?controller=pensiun');
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
   window.location.replace('../../simpeg.php?controller=pensiun');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }

  elseif ($controller=='pensiun' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
        $querySurat = mysqli_query($koneksi, "SELECT * FROM usul_pensiun WHERE id = '$_POST[id]'") or die (mysqli_error($con));
        $result = mysqli_fetch_array($querySurat);
        unlink("../file_pensiun/01/".$result['surat_pengantar_permohonan']);
        unlink("../file_pensiun/02/".$result['surat_lolos']);
        unlink("../file_pensiun/03/".$result['surat_keputusan_pemberhentian']);
        unlink("../file_pensiun/04/".$result['sk_pengangkatan']);
        unlink("../file_pensiun/05/".$result['sk_cpns']);
        unlink("../file_pensiun/06/".$result['sk_pns']);
        unlink("../file_pensiun/07/".$result['surat_rekomendasi_pindah']);
        unlink("../file_pensiun/08/".$result['fotocopy_ijazah']);
        unlink("../file_pensiun/09/".$result['jabatan_akademik']);
        unlink("../file_pensiun/10/".$result['print_out']);
     $del3= "DELETE FROM usul_pensiun WHERE id = '$_POST[id]'";
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
   window.location.replace('../../simpeg.php?controller=pensiun');
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
   window.location.replace('../../simpeg.php?controller=pensiun');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysqli_close($koneksi);
    }


}
?>
