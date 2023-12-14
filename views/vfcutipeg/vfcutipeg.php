
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/vfcutipeg/aksi_vfcutipeg.php";
    
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
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_vfcutipeg();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_vfcutipeg();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_vfcutipeg();" ><i class="fa fa-remove"></i> Hapus </button>
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
					$aks =mysqli_query($koneksi,"select * from usul_cuti order by id");
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
	   case "tambah_vfcutipeg":
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
                                        <h3 class="card-title">Tambah Data Usul Cuti Entry</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=vfcutipeg&act=input" method="POST">
                                            <div class="form-col">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="nama_peg">Nama Pegawai</label>
                                                    <input type="text" name="nama_peg" class="form-control" id="nama_peg"
                                                        placeholder="Nama Pegawai" required>
                                                    <div class="invalid-feedback">Data Nama Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" name="nip" class="form-control" id="nip"
                                                        placeholder="NIP" required>
                                                    <div class="invalid-feedback">Data NIP Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="jabatan_peg">Jabatan Pegawai</label>
                                                    <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg"
                                                        placeholder="Jabatan Pegawai" required>
                                                    <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="lama_cuti">Lama Cuti</label>
                                                    <input type="text" name="lama_cuti" class="form-control" id="lama_cuti"
                                                        placeholder="Lama Cuti" required>
                                                    <div class="invalid-feedback">Data Lama Cuti Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="tgl">Tanggal</label>
                                                    <input type="date" name="tgl" class="form-control" id="tgl"
                                                        placeholder="Tanggal" required>
                                                    <div class="invalid-feedback">Data Tanggal Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="jenis_cuti">Jenis Cuti</label>
                                                    <input type="text" name="jenis_cuti" class="form-control" id="jenis_cuti"
                                                        placeholder="Jenis Cuti" required>
                                                    <div class="invalid-feedback">Data Jenis Cuti Harus Diisi</div>
                                                </div>
                                                <input type="hidden" name="status" class="form-control" id="status" value="Diproses" required>
                                                <br>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											                      <a type="submit"  href="simpeg.php?controller=vfcutipeg" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

