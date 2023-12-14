
<?php
  if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
    header('location:404.php');
  }
  else{
    $aksi = "views/users/aksi_users.php";
    
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch($act){
      default:
    $izin = mysqli_query($koneksi,"SELECT * FROM users ");
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
                <h3 class="card-title">Data Pengguna Sistem</h3>
               </div>
               <div class="card-body">
                <form method="post" name="frm">
									 
		   <div style="text-align:right">		
          <a  class="btn btn-primary bg-primary-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Tambah" href="?controller=users&act=tambah_users"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_users();" ><i class="fa fa-edit"></i> Edit</button> 
		   <button class="btn btn-warning bg-warning-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Lihat"  onClick="view_records_users();" ><i class="fa fa-desktop"></i> Lihat</button> 
		  <button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_users();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
                                            
         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered text-nowrap border-bottom" id="example2">
                 <thead>
                  <tr>
				   <th></th>
                    <th>No.</th>
                    <th style="text-align:center;">Username</th>
                    <th style="text-align:center;">Nama Lengkap</th>  
					<th style="text-align:center;">NIP/NIB</th>					
                 </tr>
                  </thead>
               <tbody>
					<?php  
					$no = 1;
					$aks =mysqli_query($koneksi,"select * from users order by id");
					while ($ks=mysqli_fetch_array($aks)){       
			       ?>
                  <tr>
					<td style='text-align:center'>
					 <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                    </td>
                    <td><?php echo" $no"; ?></td>
                    <td><?php echo" $ks[username]"; ?></td>
                    <td><?php echo" $ks[nama_lengkap]"; ?></td>
					<td><?php echo" $ks[nip]"; ?></td>
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
	   case "tambah_users":
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
                                        <h3 class="card-title">Tambah Data Pengguna Sistem</h3>
                                    </div>
                                    <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?controller=users&act=input" method="POST">
                                            <div class="form-col">
                                                <div class="col-xl-6 mb-3">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" class="form-control" id="username"
                                                        placeholder="Username" required>
                                                    <div class="invalid-feedback">Data Username Harus Diisi</div>
                                                </div>
												
												
												<div class="col-xl-6 mb-3">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password"
                                                        placeholder="Password" required>
                                                    <div class="invalid-feedback">Data Password Harus Diisi</div>
                                                </div>
                                                
                                                <div class="col-xl-6 mb-3">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                                        placeholder="Nama Lengkap" required>
                                                    <div class="invalid-feedback">Data Nama Lengkap Harus Diisi</div>
                                                </div>
                                                
												<div class="col-xl-6 mb-3">
                                                    <label for="nip">NIP/NIB</label>
                                                    <input type="text" name="nip" class="form-control" id="nip"
                                                        placeholder="NIP/NIB" required>
                                                    <div class="invalid-feedback">Data NIP/NIB Harus Diisi</div>
                                                </div>
												
					
										<div class="col-xl-6 mb-3">
                                            <label class="form-label"> Hak Akses</label>
                                            <select class="form-control select2-show-search form-select" data-placeholder="Hak Akses" name="level" id="level" required>
                                                    <option></option>
                                                    <?php
													$level = mysqli_query($koneksi,"SELECT * FROM hakakses order by id"); 
													while($p = mysqli_fetch_array($level)){
													echo"
													<option value=\"$p[nama_hak_akses]\">$p[nama_hak_akses]</option>\n";
													}
													echo"";	  
													?>				
                                                </select>
                                        </div>
										
													<div class="col-xl-6 mb-3">
                                                    <label for="nohp">No.Telepon/HP</label>
                                                    <input type="text" name="nohp" class="form-control" id="nohp"
                                                        placeholder="No.Telepon/HP">
													</div>
										
												
                                            </div>
                                            <button class="btn btn-primary" name="simpan_data" type="submit">Simpan</button>
											<a href="simpeg.php?controller=users" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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

