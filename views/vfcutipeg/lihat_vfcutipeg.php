<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/vfcutipeg/aksi_vfcutipeg.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=vfcutipeg';
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
            <h3 class="card-title">Lihat Data Usul Cuti</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=vfcutipeg">
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
                      <input type="text" name="nama_peg" class="form-control" id="nama_peg" placeholder="Nama Pegawai" value="<?php echo $r[nama_peg];?>" readonly>
                  </div>
              </div>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="nip_peg">NIP Pegawai</label>
                      <input type="text" name="nip_peg" class="form-control" id="nip_peg" placeholder="NIP Pegawai" value="<?php echo $r[nip_peg];?>" readonly>
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
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="uk_peg">Unit Kerja Pegawai</label>
                      <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" value="<?php echo $r[uk_peg];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="masa_kerja">Masa Kerja</label>
                      <input type="text" name="masa_kerja" class="form-control" id="masa_kerja" placeholder="Masa Kerja" value="<?php echo $r[masa_kerja];?>" readonly>
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
                      <label for="nama_atasan">Nama Atasan</label>
                      <input type="text" name="nama_atasan" class="form-control" id="nama_atasan" placeholder="Nama Atasan" value="<?php echo $r[nama_atasan];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="nip_atasan">NIP Atasan</label>
                      <input type="text" name="nip_atasan" class="form-control" id="nip_atasan" placeholder="NIP Atasan" value="<?php echo $r[nip_atasan];?>" readonly>
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
                      <input type="text" name="jenis_cuti" class="form-control" id="jenis_cuti" placeholder="Jenis Cuti" value="<?php echo $r[jenis_cuti];?>" readonly>
                  </div>
              </div>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="alasan_cuti">Alasan Cuti</label>
                      <input type="text" name="alasan_cuti" class="form-control" id="alasan_cuti" placeholder="Alasan Cuti" value="<?php echo $r[alasan_cuti];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="tgl_mulai">Tanggal Mulai Cuti</label>
                      <input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Tanggal Mulai" value="<?php echo $r[tgl_mulai];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="tgl_selesai">Tanggal Selesai Cuti</label>
                      <input type="text" name="tgl_selesai" class="form-control" id="tgl_selesai" placeholder="Tanggal Selesai" value="<?php echo $r[tgl_selesai];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="lama_cuti">Lama Cuti</label>
                      <input type="text" name="lama_cuti" class="form-control" id="lama_cuti" placeholder="Lama Cuti" value="<?php echo $r[lama_cuti];?>" readonly>
                  </div>
              </div>
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
                      <input type="text" name="alamat_cuti" class="form-control" id="alamat_cuti" placeholder="Alamat Cuti" value="<?php echo $r[alamat_cuti];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="no_telp">No. Telepon</label>
                      <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="No. Telp" value="<?php echo $r[no_telp];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="keputusan">Keputusan</label>
                      <input type="text" name="keputusan" class="form-control" id="keputusan" placeholder="Keputusan" value="<?php echo $r[keputusan];?>" readonly>
                  </div>
              </div>
              <br>
              <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="<?php echo $r[keterangan];?>" readonly>
                  </div>
              </div>
              <br>
          </div>
          <br>     
		    <a type="submit"  href="simpeg.php?controller=vfcutipeg" class="btn btn-danger"><i class="fa fa-remove"></i> Kembali</a>
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