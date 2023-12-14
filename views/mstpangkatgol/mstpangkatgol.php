
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/mstpangkatgol/aksi_mstpangkatgol.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : ''; 

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM mstpangkatgol ");
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
                <h3 class="card-title">Data Pangkat/Golongan</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=mstpangkatgol&act=tambah_mstpangkatgol"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_mstpangkatgol();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_mstpangkatgol();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_mstpangkatgol();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				   <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">Kode Golongan</th>
                    <th style="text-align:center;">Nama Golongan</th>
                    <th style="text-align:center;">Nama Pangkat</th>      
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from mstpangkatgol order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                  <tr>
					<td style='text-align:center'>
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                    </td>
                    <td><?php echo" $no"; ?></td>
                    <td><?php echo" $ks[kodegol]"; ?></td>
                    <td><?php echo" $ks[namagol]"; ?></td>
                    <td><?php echo" $ks[namapangkat]"; ?></td>
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
	   case "tambah_mstpangkatgol":
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
                                        <h3 class="card-title">Tambah Data Pangkat/Golongan</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=mstpangkatgol&act=input" method="POST">
                                            <div class="form-col">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="kodegol">Kode Golongan</label>
                                                    <input type="text" name="kodegol" class="form-control" id="kodegol"
                                                        placeholder="Kode Golongan" required>
                                                    <div class="invalid-feedback">Data Kode Golongan Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="namagol">Nama Golongan</label>
                                                    <input type="text" name="namagol" class="form-control" id="namagol"
                                                        placeholder="Nama Golongan" required>
                                                    <div class="invalid-feedback">Data Nama Golongan Harus Diisi</div>
                                                </div>
                                                <br>
                                                <div class="col-xl-6 mb-3">
                                                    <label for="namapangkat">Nama Pangkat</label>
                                                    <input type="text" name="namapangkat" class="form-control" id="namapangkat"
                                                        placeholder="Nama Pangkat" required>
                                                    <div class="invalid-feedback">Data Nama Pangkat Harus Diisi</div>
                                                </div>
                                                <br>
                                            </div>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											                      <a type="submit"  href="simpeg.php?controller=mstpangkatgol" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

