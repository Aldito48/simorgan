
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/pindahhomebase/aksi_pindahhomebase.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM usul_pindah_homebase");
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
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=pindahhomebase&act=tambah_pindahhomebase"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_pindahhomebase();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_pindahhomebase();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pindahhomebase();" ><i class="fa fa-remove"></i> Hapus </button>
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
					$aks =mysqli_query($koneksi,"select * from usul_pindah_homebase where status='Diproses' order by id");
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
	   case "tambah_pindahhomebase":
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
                                     <form class="needs-validation" enctype="multipart/form-data" novalidate action="<?php echo $aksi;?>?controller=pindahhomebase&act=input" method="POST">
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
                                                    function tampilkanSurat01(event) {
                                                        var input = event.target;
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.getElementById('previewSurat01');
                                                            output.style.display = 'block';
                                                            output.src = reader.result;
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
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                </script>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat01" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="surat_pengantar_permohonan">Surat Pengantar Permohonan Pindah Homebase</label>
                                                        <input class="form-control" id="surat_pengantar_permohonan" name="surat_pengantar_permohonan" onchange="tampilkanSurat01(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Surat Pengantar Permohonan Pindah Homebase Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat02" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="surat_lolos">Surat Lolos</label>
                                                        <input class="form-control" id="surat_lolos" name="surat_lolos" onchange="tampilkanSurat02(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Surat Lolos Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat03" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="surat_keputusan_pemberhentian">Surat Keputusan Pemberhentian</label>
                                                        <input class="form-control" id="surat_keputusan_pemberhentian" name="surat_keputusan_pemberhentian" onchange="tampilkanSurat03(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Surat Keputusan Pemberhentian Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat04" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="sk_pengangkatan">SK Pengangkatan/Pindah</label>
                                                        <input class="form-control" id="sk_pengangkatan" name="sk_pengangkatan" onchange="tampilkanSurat04(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">SK Pengangkatan Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat05" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="sk_cpns">SK CPNS</label>
                                                        <input class="form-control" id="sk_cpns" name="sk_cpns" onchange="tampilkanSurat05(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">SK CPNS Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat06" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="sk_pns">SK PNS</label>
                                                        <input class="form-control" id="sk_pns" name="sk_pns" type="file" onchange="tampilkanSurat06(event)" accept=".pdf" required>
                                                        <div class="invalid-feedback">SK PNS Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat07" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="surat_rekomendasi_pindah">Surat Rekomendasi Pindah Homebase</label>
                                                        <input class="form-control" id="surat_rekomendasi_pindah" name="surat_rekomendasi_pindah" onchange="tampilkanSurat07(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Surat Rekomendasi Pindah Homebase Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat08" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="fotocopy_ijazah">Fotocopy Ijazah</label>
                                                        <input class="form-control" id="fotocopy_ijazah" name="fotocopy_ijazah" onchange="tampilkanSurat08(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Fotocopy Ijazah Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat09" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="jabatan_akademik">Jabatan Akademik</label>
                                                        <input class="form-control" id="jabatan_akademik" name="jabatan_akademik" onchange="tampilkanSurat09(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Jabatan Akademik Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <embed id="previewSurat10" type="application/pdf" style="display: none; width :auto; height: auto;">
                                                        <label for="print_out">Print Out Data Dosen</label>
                                                        <input class="form-control" id="print_out" name="print_out" onchange="tampilkanSurat10(event)" type="file" accept=".pdf" required>
                                                        <div class="invalid-feedback">Print Out Data Dosen Harus Diunggah</div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                            <input type="hidden" value="Diproses" id="status" name="status">
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											<a type="submit"  href="simpeg.php?controller=pindahhomebase" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

