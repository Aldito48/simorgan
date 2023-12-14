
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/cutipeg/aksi_cutipeg.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM usul_cuti");
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
                <h3 class="card-title">Data Usul Cuti Entry</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=cutipeg&act=tambah_cutipeg"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_cutipeg();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_cutipeg();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_cutipeg();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				    <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">Nama Pegawai</th>
                    <th style="text-align:center;">NIP</th>
                    <th style="text-align:center;">Jabatan Pegawai</th>
                    <th style="text-align:center;">Lama Cuti</th>
                    <th style="text-align:center;">Tanggal</th>
                    <th style="text-align:center;">Jenis Cuti</th>
                    <th style="text-align:center;">Keputusan</th>
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from usul_cuti WHERE keputusan = 'Diproses' order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                <tr>
				<td style='text-align:center'>
				<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                  </td> 
                  <td><?php echo" $no"; ?></td>
                  <td><?php echo" $ks[nama_peg]"; ?></td>
                  <td><?php echo" $ks[nip_peg]"; ?></td>
                  <td><?php echo" $ks[jabatan_peg]"; ?></td>
                  <td><?php echo" $ks[lama_cuti]"; ?></td>
                  <td><?php echo" $ks[tgl_mulai]"; ?></td>
                  <td><?php echo" $ks[jenis_cuti]"; ?></td>
                  <td><?php echo" $ks[keputusan]"; ?></td>
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
	   case "tambah_cutipeg":
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
                                        <h3 class="card-title">Tambah Data Usul Cuti</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=cutipeg&act=input" method="POST">
                                            <h4>1. Data Pegawai</h4>
                                            <div class="row">
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
                                                        <label for="jabatan_peg">Jabatan Pegawai</label>
                                                        <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" required>
                                                        <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
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
                                                        <label for="masa_kerja">Masa Kerja</label>
                                                        <input type="text" name="masa_kerja" class="form-control" id="masa_kerja" placeholder="Masa Kerja" required>
                                                        <div class="invalid-feedback">Data Masa Kerja Harus Diisi</div>
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
                                                        <label for="nama_atasan">Nama Atasan</label>
                                                        <input type="text" name="nama_atasan" class="form-control" id="nama_atasan"
                                                            placeholder="Nama Atasan" required>
                                                        <div class="invalid-feedback">Data Nama Atasan Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="nip_atasan">NIP Atasan</label>
                                                        <input type="text" name="nip_atasan" class="form-control" id="nip_atasan"
                                                            placeholder="NIP Atasan" required>
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
                                                                    echo "<option>$option</option>";
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
                                                        <input type="text" name="alasan_cuti" class="form-control" id="alasan_cuti" placeholder="Alasan Cuti" required>
                                                        <div class="invalid-feedback">Data Alasan Cuti Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_mulai">Tanggal Mulai Cuti</label>
                                                        <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Tanggal Mulai Cuti" required>
                                                        <div class="invalid-feedback">Data Tanggal Mulai Cuti Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_selesai">Tanggal Selesai Cuti</label>
                                                        <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" placeholder="Tanggal Selesai Cuti" required>
                                                        <div class="invalid-feedback">Data Tanggal Selesai Cuti Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="lama_cuti">Lama Cuti</label>
                                                        <input type="text" name="lama_cuti" class="form-control" id="lama_cuti" value="0 Hari" placeholder="Lama Cuti" readonly required>
                                                        <div class="invalid-feedback">Data Lama Cuti Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <script>
                                                    var tanggalMulaiInput = document.getElementById('tgl_mulai');
                                                    var tanggalSelesaiInput = document.getElementById('tgl_selesai');
                                                    var lamaCutiInput = document.getElementById('lama_cuti');

                                                    tanggalSelesaiInput.disabled = true;

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

                                                        var options = tanggalSelesaiInput.querySelectorAll('option');
                                                        for (var i = 0; i < options.length; i++) {
                                                            var optionDate = new Date(options[i].value);
                                                            if (optionDate <= tanggalMulai) {
                                                                options[i].disabled = true;
                                                            } else {
                                                                options[i].disabled = false;
                                                            }
                                                        }

                                                        tanggalSelesaiInput.setAttribute('min', tanggalMulaiInput.value);

                                                        if (tanggalSelesai <= tanggalMulai) {
                                                            tanggalSelesaiInput.value = tanggalMulaiInput.value;
                                                        }
                                                    });

                                                    tanggalMulaiInput.addEventListener('change', function() {
                                                        tanggalSelesaiInput.disabled = false;
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
                                                            placeholder="Alamat Selama Cuti" required>
                                                        <div class="invalid-feedback">Data Alamat Selama Cuti Harus Diisi</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="no_telp">No. Telepon</label>
                                                        <input type="text" name="no_telp" class="form-control" id="no_telp"
                                                            placeholder="No. Telepon" required>
                                                        <div class="invalid-feedback">Data No. Telepon Diisi</div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="keputusan" class="form-control" id="keputusan" value="Diproses" required>
                                                <br>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
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

