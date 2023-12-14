<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/vfpindahhomebase/aksi_vfpindahhomebase.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=vfpindahhomebase';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
 <div class="main-content app-content mt-0">
   <div class="side-app">
    <div class="main-container container-fluid">
      <div class="page-header">
      </div>
       <div class="row">
        <div class="col-lg-12 col-md-12">
         <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Data Usul Pindah Homebase</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=vfpindahhomebase&act=update">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from usul_pindah_homebase where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
        <h4>1. Data Pegawai</h4>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nip_peg">NIP Pegawai</label>
                    <input type="text" name="nip_peg" class="form-control" id="nip_peg" value="<?=$r['nip_peg']?>" placeholder="NIP Pegawai" readonly>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nama_peg">Nama Pegawai</label>
                    <input type="text" name="nama_peg" class="form-control" id="nama_peg" value="<?=$r['nama_peg']?>" placeholder="Nama Pegawai" readonly>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="pangkat_peg">Pangkat/Gol</label>
                    <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat/Golongan" value="<?=$r['pangkat_peg']?>" readonly>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="uk_peg">Unit Kerja Pegawai</label>
                    <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" value="<?=$r['uk_peg']?>" readonly>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="jabatan_peg">Jabatan Pegawai</label>
                    <input type="text" value="<?=$r['jabatan_peg']?>" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" readonly>
                </div>
            </div>
            <br>
        </div>
        <br>
        <!-- ------------------------------------ -->
        <h4>2. Upload Dokumen</h4>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="surat_pengantar_permohonan">Surat Pengantar Permohonan Pindah Homebase</label>
                    <embed id="oldSurat01" src="views/file/01/<?=$r['surat_pengantar_permohonan']?>" type="application/pdf" width="auto" style="display: block;" height="auto" alt="Surat Pengantar Permohonan">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="surat_lolos">Surat Lolos</label>
                    <embed id="oldSurat02" src="views/file/02/<?=$r['surat_lolos']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Lolos">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="surat_keputusan_pemberhentian">Surat Keputusan Pemberhentian</label>
                    <embed id="oldSurat03" src="views/file/03/<?=$r['surat_keputusan_pemberhentian']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Keputusan Pemberhentian">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="sk_pengangkatan">SK Pengangkatan/Pindah</label>
                    <embed id="oldSurat04" src="views/file/04/<?=$r['sk_pengangkatan']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK Pengangkatan">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="sk_cpns">SK CPNS</label>
                    <embed id="oldSurat05" src="views/file/05/<?=$r['sk_cpns']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK CPNS">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="sk_pns">SK PNS</label>
                    <embed id="oldSurat06" src="views/file/06/<?=$r['sk_pns']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK PNS">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="surat_rekomendasi_pindah">Surat Rekomendasi Pindah Homebase</label>
                    <embed id="oldSurat07" src="views/file/07/<?=$r['surat_rekomendasi_pindah']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Rekomendasi Pindah">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="fotocopy_ijazah">Fotocopy Ijazah</label>
                    <embed id="oldSurat08" src="views/file/08/<?=$r['fotocopy_ijazah']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Fotocopy Ijazah">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="jabatan_akademik">Jabatan Akademik</label>
                    <embed id="oldSurat09" src="views/file/09/<?=$r['jabatan_akademik']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Jabatan Akademik">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="print_out">Print Out Data Dosen</label>
                    <embed id="oldSurat10" src="views/file/10/<?=$r['print_out']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Print Out Data Dosen">
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <?php
                        echo "<select class=\"form-control form-select select2\" id=\"status\" name=\"status\" required>
                                <option value=\"\" disabled selected style=\"display:none;\">Pilih Keputusan</option>";
                                $sp = mysqli_query($koneksi, "SHOW COLUMNS FROM `usul_pindah_homebase` WHERE `field` = 'status'");
                                while($result = mysqli_fetch_row($sp)){
                                    foreach(explode("','",substr($result[1],6,-2)) as $option){
                                        $selected = ($option === $r['status']) ? 'selected' : '';
                                        echo "<option $selected>$option</option>";
                                    }
                                }
                        echo "</select>";
                    ?>
                    <div class="invalid-feedback">Data Status Harus Diisi</div>
                </div>
            </div>
            <br>
        </div>
        <br>
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
		      <a type="submit"  href="simpeg.php?controller=vfpindahhomebase" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
       </form>
     </div>
   </div>
   </div>
  </div>
  </div>
 </div>
</div>
	
	<?php
    }
}
?>