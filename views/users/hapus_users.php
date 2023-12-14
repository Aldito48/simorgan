<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/users/aksi_users.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=users';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

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
            <h3 class="card-title">Hapus Data Pengguna Sistem</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="needs-validation" novalidate enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=users&act=hapus">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from users where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
										<div class="form-col">
          
												<div class="col-xl-6 mb-3">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" class="form-control" id="username"
                                                        placeholder="Username" value="<?php echo $r[username];?>"  readonly>
                                                </div>
												
                                                <div class="col-xl-6 mb-3">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"                                                    placeholder="Nama Lengkap" value="<?php echo $r[nama_lengkap];?>" readonly> 
                                                </div>
                                                
												<div class="col-xl-6 mb-3">
                                                    <label for="nip">NIP/NIB</label>
                                                    <input type="text" name="nip" class="form-control" id="nip"
                                                        placeholder="NIP/NIB" value="<?php echo $r[nip];?>" readonly>
                                                </div>
												
					
											<div class="col-xl-6 mb-3">
                                            <label class="form-label"> Hak Akses</label>
                                            <select class="form-control select2-show-search form-select" data-placeholder="Hak Akses" name="level" id="level" disabled>
                                                    <option><?php echo $r[level];?></option>
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
                                                        placeholder="No.Telepon/HP" value="<?php echo $r[nohp];?>" readonly>
													</div>
           
          </div>                             
          <button class="btn btn-primary" name="hapus_data" type="submit">Hapus</button>
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