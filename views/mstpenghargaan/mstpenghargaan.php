
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/mstpenghargaan/aksi_mstpenghargaan.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM mstpenghargaan ");
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
                <h3 class="card-title">Data Penghargaan</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=mstpenghargaan&act=tambah_mstpenghargaan"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_mstpenghargaan();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_mstpenghargaan();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_mstpenghargaan();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				   <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">Kode Penghargaan</th>
                    <th style="text-align:center;">Nama Penghargaan</th>    
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from mstpenghargaan order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                  <tr>
					<td style='text-align:center'>
						<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                    </td>
                    <td><?php echo" $no"; ?></td>
                    <td><?php echo" $ks[kode]"; ?></td>
                    <td><?php echo" $ks[penghargaan]"; ?></td>
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
	   case "tambah_mstpenghargaan":
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
                                        <h3 class="card-title">Tambah Data Penghargaan</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=mstpenghargaan&act=input" method="POST">
                                            <div class="form-col">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="kode">Kode Penghargaan</label>
                                                    <input type="text" name="kode" class="form-control" id="kode"
                                                        placeholder="Kode penghargaan" required>
                                                    <div class="invalid-feedback">Data Kode Penghargaan Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="penghargaan">Nama Penghargaan</label>
                                                    <input type="text" name="penghargaan" class="form-control" id="penghargaan"
                                                        placeholder="Nama Penghargaan" required>
                                                    <div class="invalid-feedback">Data Nama Penghargaan Harus Diisi</div>
                                                </div>
                                                <br>
                                            </div>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											                      <a type="submit"  href="simpeg.php?controller=mstpenghargaan" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

