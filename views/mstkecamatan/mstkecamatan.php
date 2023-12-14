
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/mstkecamatan/aksi_mstkecamatan.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM mstkecamatan ");
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
                <h3 class="card-title">Data Kecamatan</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=mstkecamatan&act=tambah_mstkecamatan"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_mstkecamatan();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_mstkecamatan();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_mstkecamatan();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				   <th></th>
                    <th>No.</th>
					<th style="text-align:center;">Kode Kecamatan</th>
                    <th style="text-align:center;">Nama Kecamatan</th>     
                    <th style="text-align:center;">Kode Kota</th>
                    <th style="text-align:center;">Nama Kota</th>
                     <th style="text-align:center;">Kode Provinsi</th>
                    <th style="text-align:center;">Nama Provinsi</th>
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from mstkecamatan order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                  <tr>
				 <td style='text-align:center'>
					 <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                    </td>
                    <td><?php echo" $no"; ?></td>
					  <td><?php echo" $ks[kodekec]"; ?></td>
                    <td><?php echo" $ks[namakec]"; ?></td>
                    <td><?php echo" $ks[kodekota]"; ?></td>
                    <td><?php echo" $ks[namakota]"; ?></td>
                    <td><?php echo" $ks[kodeprovinsi]"; ?></td>
                    <td><?php echo" $ks[namaprovinsi]"; ?></td>
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
	   case "tambah_mstkecamatan":
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
                                        <h3 class="card-title">Tambah Data Kecamatan</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=mstkecamatan&act=input" method="POST">
                                            <div class="form-col">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="kodeprovinsi">Kode Provinsi</label>
                                                    <input type="text" name="kodeprovinsi" class="form-control" id="kodeprovinsi"
                                                        placeholder="Kode Provinsi" required>
                                                    <div class="invalid-feedback">Data Kode Provinsi Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="namaprovinsi">Nama Provinsi</label>
                                                    <input type="text" name="namaprovinsi" class="form-control" id="namaprovinsi"
                                                        placeholder="Nama Provinsi" required>
                                                    <div class="invalid-feedback">Data Nama Provinsi Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="kodekota">Kode Kota</label>
                                                    <input type="text" name="kodekota" class="form-control" id="kodekota"
                                                        placeholder="Kode Kota" required>
                                                    <div class="invalid-feedback">Data Kode Kota Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="namakota">Nama Kota</label>
                                                    <input type="text" name="namakota" class="form-control" id="namakota"
                                                        placeholder="Nama Kota" required>
                                                    <div class="invalid-feedback">Data Nama Kota Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="kodekec">Kode Kecamatan</label>
                                                    <input type="text" name="kodekec" class="form-control" id="kodekec"
                                                        placeholder="Kode Kecamatan" required>
                                                    <div class="invalid-feedback">Data Kode Kecamatan Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="namakec">Nama Kecamatan</label>
                                                    <input type="text" name="namakec" class="form-control" id="namakec"
                                                        placeholder="Nama Kecamatan" required>
                                                    <div class="invalid-feedback">Data Nama Kecamatan Harus Diisi</div>
                                                </div>
                                                <br>
                                            </div>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											<a type="submit"  href="simpeg.php?controller=mstkecamatan" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

