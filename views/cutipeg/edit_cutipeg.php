<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/cutipeg/aksi_cutipeg.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=cutipeg';
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
            <h3 class="card-title">Edit Data Usul Cuti</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=cutipeg&act=update">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from usul_cuti where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
        <h4>1. Data Pegawai</h4>
        <div class="row">
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

            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nip_peg">NIP Pegawai</label>
                    <input type="text" name="nip_peg" class="form-control" id="nip_peg" placeholder="NIP Pegawai" value="<?=$r['nip_peg']?>" required>
                    <div class="invalid-feedback">Data NIP Pegawai Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="jabatan_peg">Jabatan Pegawai</label>
                    <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" value="<?=$r['jabatan_peg']?>" required>
                    <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
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
                    <label for="masa_kerja">Masa Kerja</label>
                    <input type="text" name="masa_kerja" class="form-control" id="masa_kerja" value="<?=$r['masa_kerja']?>" placeholder="Masa Kerja" required>
                    <div class="invalid-feedback">Data Masa Kerja Harus Diisi</div>
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
                    <label for="nama_atasan">Nama Atasan</label>
                    <input type="text" name="nama_atasan" class="form-control" id="nama_atasan"
                        placeholder="Nama Atasan" value="<?=$r['nama_atasan']?>" required>
                    <div class="invalid-feedback">Data Nama Atasan Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nip_atasan">NIP Atasan</label>
                    <input type="text" name="nip_atasan" class="form-control" id="nip_atasan"
                        placeholder="NIP Atasan" value="<?=$r['nip_atasan']?>" required>
                    <div class="invalid-feedback">Data NIP Atasan Harus Diisi</div>
                </div>
            </div>
            <br>
        </div>
        <br>
        <h4>2. Cuti</h4>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="jenis_cuti">Jenis Cuti</label>
                    <?php
                        echo "<select class=\"form-control form-select select2\" id=\"jenis_cuti\" name=\"jenis_cuti\" required>
                                <option value=\"\" disabled selected style=\"display:none;\">Pilih Jenis Cuti</option>";
                                $jc = mysqli_query($koneksi, "SHOW COLUMNS FROM `usul_cuti` WHERE `field` = 'jenis_cuti'");
                                while($result = mysqli_fetch_row($jc)){
                                  foreach(explode("','",substr($result[1],6,-2)) as $option){
                                    $selected = ($option === $r['jenis_cuti']) ? 'selected' : '';
                                    echo "<option $selected>$option</option>";
                                  }
                                }
                        echo "</select>";
                    ?>
                    <div class="invalid-feedback">Data Jenis Cuti Harus Diisi</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="alasan_cuti">Alasan Cuti</label>
                    <input type="text" name="alasan_cuti" class="form-control" id="alasan_cuti" placeholder="Alasan Cuti" value="<?=$r['alasan_cuti']?>" required>
                    <div class="invalid-feedback">Data Alasan Cuti Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai Cuti</label>
                    <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" value="<?=$r['tgl_mulai']?>" placeholder="Tanggal Mulai Cuti" required>
                    <div class="invalid-feedback">Data Tanggal Mulai Cuti Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai Cuti</label>
                    <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" placeholder="Tanggal Selesai Cuti" value="<?=$r['tgl_selesai']?>" required>
                    <div class="invalid-feedback">Data Tanggal Selesai Cuti Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="lama_cuti">Lama Cuti</label>
                    <input type="text" name="lama_cuti" class="form-control" id="lama_cuti" placeholder="Lama Cuti" value="<?=$r['lama_cuti']?>" readonly required>
                    <div class="invalid-feedback">Data Lama Cuti Harus Diisi</div>
                </div>
            </div>
            <script>
                var tanggalMulaiInput = document.getElementById('tgl_mulai');
                var tanggalSelesaiInput = document.getElementById('tgl_selesai');
                var lamaCutiInput = document.getElementById('lama_cuti');

                tanggalSelesaiInput.addEventListener('change', function() {
                    var tanggalMulai = new Date(tanggalMulaiInput.value);
                    var tanggalSelesai = new Date(this.value);

                    var timeDifference = tanggalSelesai.getTime() - tanggalMulai.getTime();
                    var diffDays = Math.ceil(timeDifference / (1000 * 3600 * 24));

                    if (diffDays >= 0) {
                        lamaCutiInput.value = diffDays + ' Hari';
                    } else {
                        lamaCutiInput.value = '0 Hari';
                    }

                    tanggalSelesaiInput.setAttribute('min', tanggalMulaiInput.value);

                    if (tanggalSelesai <= tanggalMulai) {
                        tanggalSelesaiInput.value = tanggalMulaiInput.value;
                    }
                });

                tanggalMulaiInput.addEventListener('change', function() {
                    tanggalSelesaiInput.setAttribute('min', this.value);
                });
            </script>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0">
                        <tr>
                            <th colspan="2">Cuti Tahunan</th>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <th>Jumlah Hari</th>
                        </tr>
                        <?php
                            $currentYear = date("Y");
                            for ($i = $currentYear; $i >= $currentYear - 2; $i--) {
                                echo "<tr>
                                        <td>$i</td>
                                        <td>0 Hari</td>
                                    </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0">
                        <tr>
                            <th>Jenis Cuti</th>
                            <th>Jumlah</th>
                        </tr>
                        <tr>
                            <td>CUTI SAKIT</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>CUTI BESAR</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>CUTI MELAHIRKAN</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>CUTI DILUAR TANGGUNGAN NEGARA</td>
                            <td>0</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="alamat_cuti">Alamat Selama Cuti</label>
                    <input type="text" name="alamat_cuti" class="form-control" id="alamat_cuti"
                        placeholder="Alamat Selama Cuti" value="<?=$r['alamat_cuti']?>" required>
                    <div class="invalid-feedback">Data Alamat Selama Cuti Harus Diisi</div>
                </div>
            </div>
            <br>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="no_telp">No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp"
                        placeholder="No. Telepon" value="<?=$r['no_telp']?>" required>
                    <div class="invalid-feedback">Data No. Telepon Diisi</div>
                </div>
            </div>
            <input type="hidden" name="keputusan" class="form-control" id="keputusan" value="Diproses" required>
            <br>
        </div>
        <br>                            
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
		      <a type="submit"  href="simpeg.php?controller=cutipeg" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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