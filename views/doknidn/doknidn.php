
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/doknidn/aksi_doknidn.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : ''; 

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM doknidn ");
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
                <h3 class="card-title">Data Dokumen Penerbitan NIDN</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=doknidn&act=tambah_doknidn"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_doknidn();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_doknidn();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_doknidn();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				    <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">Kode Dokumen</th>
                    <th style="text-align:center;">Nama Dokumen</th>    
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from doknidn order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                <tr>
				<td style='text-align:center'>
				<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                  </td> 
                  <td><?php echo" $no"; ?></td>
                  <td><?php echo" $ks[kdnidn]"; ?></td>
                  <td><?php echo" $ks[uraiannidn]"; ?></td>
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
	   case "tambah_doknidn":
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
                                        <h3 class="card-title">Tambah Data Dokumen Penerbitan NIDN</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=doknidn&act=input" method="POST">
                                            <div class="form-col">
                                                
												<div class="col-xl-6 mb-3">
                                                    <label for="kdnidn">Kode</label>
                                                    <input type="text" name="kdnidn" class="form-control" id="kdnidn"
                                                        placeholder="Kode" required>
                                                    <div class="invalid-feedback">Data Kode Harus Diisi</div>
                                                </div>
                                               
                                                <div class="col-xl-6 mb-3">
                                                    <label for="uraiannidn">Uraian Dokumen</label>
                                                    <input type="text" name="uraiannidn" class="form-control" id="uraiannidn"
                                                        placeholder="Uraian Dokumen" required>
                                                    <div class="invalid-feedback">Data Uraian Dokumen Harus Diisi</div>
                                                </div>
                                            </div>
                                           
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											<a href="simpeg.php?controller=doknidn" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

