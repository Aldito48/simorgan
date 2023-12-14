<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/mstpenghargaan/aksi_mstpenghargaan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=mstpenghargaan';
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
            <h3 class="card-title">Edit Data Penghargaan</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstpenghargaan&act=update">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from mstpenghargaan where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
         <div class="form-col">
            <div class="col-xl-6 mb-3">
               <label for="kode">Kode Penghargaan</label>
                 <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Penghargaan" value="<?php echo $r[kode];?>" required>
                  <div class="invalid-feedback">Data Kode Penghargaan Harus Diisi</div>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
               <label for="penghargaan">Nama Penghargaan</label>
                 <input type="text" name="penghargaan" class="form-control" id="penghargaan" placeholder="Nama Penghargaan" value="<?php echo $r[penghargaan];?>" required>
                  <div class="invalid-feedback">Data Nama Penghargaan Harus Diisi</div>
             </div>
             <br>
          </div>                             
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
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