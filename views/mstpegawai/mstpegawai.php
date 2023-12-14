
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/mstpegawai/aksi_mstpegawai.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM data_pegawai ");
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
                <h3 class="card-title">Data Pegawai</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=mstpegawai&act=tambah_mstpegawai"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Update"  onClick="update_records_mstpegawai();" ><i class="fa fa-edit"></i> Update</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_mstpegawai();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_mstpegawai();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				   <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">NIP/NIB</th>
                    <th style="text-align:center;">Nama Pegawai</th>
                   
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from data_pegawai order by nama_lengkap");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                  <tr>
					<td style='text-align:center'>
					 <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                    </td>
                    <td><?php echo "$no"; ?></td>
                    <td><?php echo "$ks[nip_baru]"; ?></td>
                    <td><?php echo "$ks[nama_peg]"; ?></td>
                   
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
	   case "tambah_mstpegawai":
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
                                        <h3 class="card-title">Tambah Data Pegawai</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=mstpegawai&act=input" method="POST" enctype="multipart/form-data">
                                            <div class="form-col">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="nip_baru">NIP</label>
                                                    <input type="text" name="nip_baru" class="form-control" id="nip_baru" placeholder="NIP" required>
                                                    <div class="invalid-feedback">Data NIP Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="nama_peg">Nama Pegawai</label>
                                                    <input type="text" name="nama_peg" class="form-control" id="nama_peg" placeholder="Nama Pegawai" required>
                                                    <div class="invalid-feedback">Data Nama Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="pangkat_peg">Pangkat Pegawai</label>
                                                    <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat Pegawai" required>
                                                    <div class="invalid-feedback">Data Pangkat Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="uk_peg">Unit Kerja Pegawai</label>
                                                    <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" required>
                                                    <div class="invalid-feedback">Data Unit Kerja Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="jabatan_peg">Jabatan Pegawai</label>
                                                    <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" required>
                                                    <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="status_peg">Status Pegawai</label>
                                                    <?php
                                                        // echo "<select class=\"form-control form-select select2\" id=\"status_peg\" name=\"status_peg\" required>
                                                        //     <option value=\"\" disabled selected style=\"display:none;\">Pilih</option>";
                                                        //     $sp = mysqli_query($koneksi, "SHOW COLUMNS FROM `data_pegawai` WHERE `field` = 'status_peg'");
                                                        //     while($result = mysqli_fetch_row($sp)){
                                                        //         foreach(explode("','",substr($result[1],6,-2)) as $option){
                                                        //           echo "<option>$option</option>";
                                                        //         }
                                                        //     }
                                                        // echo "</select>";
                                                    ?>
                                                    <input type="text" name="status_peg" class="form-control" id="status_peg" placeholder="Status Pegawai" value="Aktif" required>
                                                    <div class="invalid-feedback">Data Status Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                            </div>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											                      <a type="submit"  href="simpeg.php?controller=mstpegawai" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

