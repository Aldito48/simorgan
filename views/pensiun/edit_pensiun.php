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
            <h3 class="card-title">Edit Data Usul Pindah Homebase</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=pensiun&act=update">
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
                    <input type="text" name="nip_peg" class="form-control" id="nip_peg" value="<?=$r['nip_peg']?>" placeholder="NIP Pegawai" required>
                    <div class="invalid-feedback">Data NIP Pegawai Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nama_peg">Nama Pegawai</label>
                    <select class="form-control select2-show-search form-select" id="nama_peg" name="nama_peg" required>
                        <option disabled selected style="display: none;">Pilih Nama Pegawai</option>
                      <?php
                        $queryNama = mysqli_query($koneksi, "SELECT nama_peg FROM data_pegawai");
                        while ($nama_peg = mysqli_fetch_assoc($queryNama)) {
                            $selected = ($nama_peg['nama_peg'] === $r['nama_peg']) ? 'selected' : '';
                      ?>
                            <option <?=$selected?>><?=$nama_peg['nama_peg']?></option>
                      <?php
                        }
                      ?>
                    </select>
                    <div class="invalid-feedback">Data Nama Pegawai Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="pangkat_peg">Pangkat/Gol</label>
                    <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat/Golongan" value="<?=$r['pangkat_peg']?>" required>
                    <div class="invalid-feedback">Data Pangkat/Gol Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="uk_peg">Unit Kerja Pegawai</label>
                    <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" value="<?=$r['uk_peg']?>" required>
                    <div class="invalid-feedback">Data Unit Kerja Pegawai Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="jabatan_peg">Jabatan Pegawai</label>
                    <input type="text" value="<?=$r['jabatan_peg']?>" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" required>
                    <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
                </div>
            </div>
            <br>
        </div>
        <br>
        <!-- ------------------------------------ -->
        <h4>2. Upload Dokumen</h4>
        <div class="row">
            <script>
                function tampilkanSurat01(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat01');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat01');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat02(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat02');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat02');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat03(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat03');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat03');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat04(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat04');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat04');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat05(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat05');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat05');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat06(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat06');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat06');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat07(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat07');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat07');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat08(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat08');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat08');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat09(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat09');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat09');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }

                function tampilkanSurat10(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('previewSurat10');
                        output.style.display = 'block';
                        output.src = reader.result;

                        // Sembunyikan Surat Lama
                        var oldSurat = document.getElementById('oldSurat10');
                        oldSurat.style.display = 'none';
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            </script>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat01" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat01" src="views/file_pensiun/01/<?=$r['surat_pengantar_permohonan']?>" type="application/pdf" width="auto" style="display: block;" height="auto" alt="Surat Pengantar Permohonan">
                    <label for="surat_pengantar_permohonan">Surat Pengantar Permohonan Pindah Homebase</label>
                    <input class="form-control" id="surat_pengantar_permohonan" name="surat_pengantar_permohonan" type="file" accept=".pdf" onchange="tampilkanSurat01(event)">
                    <div class="invalid-feedback">Surat Pengantar Permohonan Pindah Homebase Harus Diunggah</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat02" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat02" src="views/file_pensiun/02/<?=$r['surat_lolos']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Lolos">
                    <label for="surat_lolos">Surat Lolos</label>
                    <input class="form-control" id="surat_lolos" name="surat_lolos" type="file">
                    <div class="invalid-feedback">Surat Lolos Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat03" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat03" src="views/file_pensiun/03/<?=$r['surat_keputusan_pemberhentian']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Keputusan Pemberhentian">
                    <label for="surat_keputusan_pemberhentian">Surat Keputusan Pemberhentian</label>
                    <input class="form-control" id="surat_keputusan_pemberhentian" name="surat_keputusan_pemberhentian" type="file">
                    <div class="invalid-feedback">Surat Keputusan Pemberhentian Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat04" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat04" src="views/file_pensiun/04/<?=$r['sk_pengangkatan']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK Pengangkatan">
                    <label for="sk_pengangkatan">SK Pengangkatan/Pindah</label>
                    <input class="form-control" id="sk_pengangkatan" name="sk_pengangkatan" type="file">
                    <div class="invalid-feedback">SK Pengangkatan Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat05" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat05" src="views/file_pensiun/05/<?=$r['sk_cpns']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK CPNS">
                    <label for="sk_cpns">SK CPNS</label>
                    <input class="form-control" id="sk_cpns" name="sk_cpns" type="file">
                    <div class="invalid-feedback">SK CPNS Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat06" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat06" src="views/file_pensiun/06/<?=$r['sk_pns']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="SK PNS">
                    <label for="sk_pns">SK PNS</label>
                    <input class="form-control" id="sk_pns" name="sk_pns" type="file">
                    <div class="invalid-feedback">SK PNS Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat07" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat07" src="views/file_pensiun/07/<?=$r['surat_rekomendasi_pindah']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Surat Rekomendasi Pindah">
                    <label for="surat_rekomendasi_pindah">Surat Rekomendasi Pindah Homebase</label>
                    <input class="form-control" id="surat_rekomendasi_pindah" name="surat_rekomendasi_pindah" type="file">
                    <div class="invalid-feedback">Surat Rekomendasi Pindah Homebase Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat08" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat08" src="views/file_pensiun/08/<?=$r['fotocopy_ijazah']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Fotocopy Ijazah">
                    <label for="fotocopy_ijazah">Fotocopy Ijazah</label>
                    <input class="form-control" id="fotocopy_ijazah" name="fotocopy_ijazah" type="file">
                    <div class="invalid-feedback">Fotocopy Ijazah Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat09" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat09" src="views/file_pensiun/09/<?=$r['jabatan_akademik']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Jabatan Akademik">
                    <label for="jabatan_akademik">Jabatan Akademik</label>
                    <input class="form-control" id="jabatan_akademik" name="jabatan_akademik" type="file">
                    <div class="invalid-feedback">Jabatan Akademik Harus Diunggah</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <embed id="previewSurat10" type="application/pdf" style="display: none; width :auto; height: auto;">
                    <embed id="oldSurat10" src="views/file_pensiun/10/<?=$r['print_out']?>" type="application/pdf" width="auto" height="auto" style="display: block;" alt="Print Out Data Dosen">
                    <label for="print_out">Print Out Data Dosen</label>
                    <input class="form-control" id="print_out" name="print_out" type="file">
                    <div class="invalid-feedback">Print Out Data Dosen Harus Diunggah</div>
                </div>
            </div>
            <br>
        </div>
        <br>                           
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
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