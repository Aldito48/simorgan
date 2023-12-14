<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/pensiun/aksi_pensiun.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=pensiun';
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
            <h3 class="card-title">Hapus Data Usul Pindah Homebase</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=pensiun&act=hapus">
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
                    <label for="tahun">Tahun</label>
                    <input type="text" name="tahun" class="form-control" id="tahun" value="<?=$r['tahun']?>" placeholder="Tahun" readonly>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="nip_peg">NIP Pegawai</label>
                      <input type="text" name="nip_peg" class="form-control" id="nip_peg" placeholder="NIP Pegawai" value="<?php echo $r[nip_peg];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="nama_peg">Nama Pegawai</label>
                      <input type="text" name="nama_peg" class="form-control" id="nama_peg" placeholder="Nama Pegawai" value="<?php echo $r[nama_peg];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="pangkat_peg">Pangkat/Gol</label>
                      <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat/Gol Pegawai" value="<?php echo $r[pangkat_peg];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="uk_peg">Unit Kerja Pegawai</label>
                      <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" value="<?php echo $r[uk_peg];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="jabatan_peg">Jabatan Pegawai</label>
                      <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" value="<?php echo $r[jabatan_peg];?>" readonly>
                  </div>
              </div>
              <br>
          </div>
          <br>
          <h4>2. Cuti</h4>
          <div class="row">
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="surat_pengantar_permohonan">Surat Pengantar Permohonan</label>
                    <embed id="oldSurat01" src="views/file_pensiun/01/<?=$r['surat_pengantar_permohonan']?>" type="application/pdf" width="auto" style="display: block;" height="auto" alt="Surat Pengantar Permohonan">
                  </div>
              </div>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="surat_lolos">Surat Lolos</label>
                    <embed id="oldSurat02" src="views/file_pensiun/02/<?=$r['surat_lolos']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Lolos">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="surat_keputusan_pemberhentian">Surat Keputusan Pemberhentian</label>
                      <embed id="oldSurat03" src="views/file_pensiun/03/<?=$r['surat_keputusan_pemberhentian']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Keputusan Pemberhentian">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="sk_pengangkatan">SK Pengangkatan</label>
                      <embed id="oldSurat04" src="views/file_pensiun/04/<?=$r['sk_pengangkatan']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK Pengangkatan">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="sk_cpns">SK CPNS</label>
                      <embed id="oldSurat05" src="views/file_pensiun/05/<?=$r['sk_cpns']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK CPNS">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="sk_pns">SK PNS</label>
                    <embed id="oldSurat06" src="views/file_pensiun/06/<?=$r['sk_pns']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK PNS">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="surat_rekomendasi_pindah">Surat Rekomendasi Pindah</label>
                    <embed id="oldSurat07" src="views/file_pensiun/07/<?=$r['surat_rekomendasi_pindah']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Rekomendasi Pindah">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="fotocopy_ijazah">Fotocopy Ijazah</label>
                      <embed id="oldSurat08" src="views/file_pensiun/08/<?=$r['fotocopy_ijazah']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Fotocopy Ijazah">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="jabatan_akademik">Jabatan Akademik</label>
                      <embed id="oldSurat09" src="views/file_pensiun/09/<?=$r['jabatan_akademik']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Jabatan Akademik">
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="print_out">Print Out Data Dosen</label>
                      <embed id="oldSurat10" src="views/file_pensiun/10/<?=$r['print_out']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Print Out Data Dosen">
                  </div>
              </div>
              <input type="hidden" name="keputusan" class="form-control" id="keputusan" value="Diproses" required>
              <br>
          </div>
          <br>                      
          <button class="btn btn-primary" name="hapus_data" type="submit">Hapus</button>
		      <a type="submit"  href="simpeg.php?controller=pensiun" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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