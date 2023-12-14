
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/pensiun/aksi_pensiun.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM usul_pensiun");
    $count = mysqli_num_rows($izin);
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
                <h3 class="card-title">Data Usul Pindah Homebase Entry</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=pensiun&act=tambah_pensiun"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_pensiun();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_pensiun();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pensiun();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				    <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">Tahun</th>
                    <th style="text-align:center;">NIP</th>
                    <th style="text-align:center;">Nama Pegawai</th>
                    <th style="text-align:center;">Pangkat Pegawai</th>
                    <th style="text-align:center;">Unit Kerja Pegawai</th>
                    <th style="text-align:center;">Jabatan Pegawai</th>
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from usul_pensiun where status='Diproses' order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                <tr>
				<td style='text-align:center'>
				<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                  </td> 
                  <td><?php echo" $no"; ?></td>
                  <td><?php echo" $ks[tahun]"; ?></td>
                  <td><?php echo" $ks[nip_peg]"; ?></td>
                  <td><?php echo" $ks[nama_peg]"; ?></td>
                  <td><?php echo" $ks[pangkat_peg]"; ?></td>
                  <td><?php echo" $ks[uk_peg]"; ?></td>
                  <td><?php echo" $ks[jabatan_peg]"; ?></td>
                </tr>
					  <?php
                $no++;
              }
              ?> 
              </tbody>
             </table>
            </div>
           </div> 
          </form>
        </div>
      </div>
     </div>
   </div>             
    </div>
   </div>
</div>
		
	<?php		  
	 break;
	   case "tambah_pensiun":
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
                                        <h3 class="card-title">Tambah Data Usul Pindah Homebase</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" enctype="multipart/form-data" novalidate action="<?php echo $aksi;?>?controller=pensiun&act=input" method="POST">
                                            <h4>1. Data Pegawai</h4>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <?php
                                                            $tahunSekarang = date("Y");
                                                        ?>
                                                        <label for="tahun">Tahun</label>
                                                        <input type="text" name="tahun" class="form-control" id="tahun" value="<?=$tahunSekarang?>" placeholder="Tahun" readonly required>
                                                        <div class="invalid-feedback">Data Tahun Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="nip_peg">NIP Pegawai</label>
                                                        <input type="text" name="nip_peg" class="form-control" id="nip_peg" placeholder="NIP Pegawai" required>
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
                                                            while ($nama_peg = mysqli_fetch_array($queryNama)) {
                                                        ?>
                                                                <option><?=$nama_peg['nama_peg']?></option>
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
                                                        <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat/Golongan" required>
                                                        <div class="invalid-feedback">Data Pangkat/Gol Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="uk_peg">Unit Kerja Pegawai</label>
                                                        <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" required>
                                                        <div class="invalid-feedback">Data Unit Kerja Pegawai Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="jabatan_peg">Jabatan Pegawai</label>
                                                        <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" required>
                                                        <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                            <!-- end -->
                                            <h4>2. Upload Dokumen</h4>
                                            <div class="row">
                                                <script>
                                                    function tampilkan01(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview01');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan02(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview02');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan03(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview03');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan04(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview04');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan05(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview05');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan06(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview06');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan07(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview07');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan08(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview08');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan09(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview09');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan10(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview10');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan11(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview11');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan12(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview12');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan13(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview13');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }

                                                    function tampilkan14(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('preview14');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                </script>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <img id="preview01" style="display: none; width :118px; height: 157.3px;">
                                                        <label for="pasfoto">Pasfoto Terbaru (3x4)</label>
                                                        <input class="form-control" id="pasfoto" name="pasfoto" onchange="tampilkan01(event)" type="file" accept=".jpg, .png, jpeg." required>
                                                        <div class="invalid-feedback">Pasfoto Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview02" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_cpns">Scan Keputusan CPNS</label>
                                                        <input class="form-control" id="scan_cpns" name="scan_cpns" onchange="tampilkan02(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan Keputusan CPNS Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview03" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_pns">Scan Keputusan PNS</label>
                                                        <input class="form-control" id="scan_cpns" name="scan_cpns" onchange="tampilkan03(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan Keputusan PNS Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview04" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_naikpangkat">Scan Kenaikan Pangkat</label>
                                                        <input class="form-control" id="scan_naikpangkat" name="scan_naikpangkat" onchange="tampilkan04(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan Kenaikan Pangkat Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview05" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_skp">Scan SKP (2 Tahun Terakhir)</label>
                                                        <input class="form-control" id="scan_skp" name="scan_skp" onchange="tampilkan05(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan SKP Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview06" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_kgb">Scan KGB</label>
                                                        <input class="form-control" id="scan_kgb" name="scan_kgb" type="file" onchange="tampilkan06(event)" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan KGB Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview07" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_aktanikah">Scan Akta Nikah</label>
                                                        <input class="form-control" id="scan_aktanikah" name="scan_aktanikah" onchange="tampilkan07(event)" type="file" accept=".pdf">
                                                        <div class="invalid-feedback">Scan Akta Nikah Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview08" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_kk">Scan Kartu Keluarga</label>
                                                        <input class="form-control" id="scan_kk" name="scan_kk" onchange="tampilkan08(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan Kartu Keluarga Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview09" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_aktaanak">Scan Akta Anak</label>
                                                        <input class="form-control" id="scan_aktaanak" name="scan_aktaanak" onchange="tampilkan09(event)" type="file" accept=".pdf">
                                                        <div class="invalid-feedback">Scan Akta Anak Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview10" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_suratkematian">Scan Surat Kematian</label>
                                                        <input class="form-control" id="scan_suratkematian" name="scan_suratkematian" onchange="tampilkan10(event)" type="file" accept=".pdf">
                                                        <div class="invalid-feedback">Scan Surat Kematian Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview11" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_suratkejandaan">Scan Surat Kejandaan</label>
                                                        <input class="form-control" id="scan_suratkejandaan" name="scan_suratkejandaan" onchange="tampilkan11(event)" type="file" accept=".pdf">
                                                        <div class="invalid-feedback">Scan Surat Kejandaan Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview12" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_bukutabungan">Scan Buku Tabungan</label>
                                                        <input class="form-control" id="scan_bukutabungan" name="scan_bukutabungan" onchange="tampilkan12(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan Buku Tabungan Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview13" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_npwp">Scan NPWP</label>
                                                        <input class="form-control" id="scan_npwp" name="scan_npwp" onchange="tampilkan13(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan NPWP Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="preview14" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="scan_ktp">Scan KTP</label>
                                                        <input class="form-control" id="scan_ktp" name="scan_ktp" onchange="tampilkan14(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Scan KTP Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                            <input type="hidden" value="Diproses" id="status" name="status">
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
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

