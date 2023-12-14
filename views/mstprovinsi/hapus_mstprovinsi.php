<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/mstprovinsi/aksi_mstprovinsi.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=mstprovinsi';
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
            <h3 class="card-title">Hapus Data Provinsi</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstprovinsi&act=hapus">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from mstprovinsi where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
         <div class="form-col">
            <div class="col-xl-6 mb-3">
               <label for="kodeprovinsi">Kode Provinsi</label>
                 <input type="text" name="kodeprovinsi" class="form-control" id="kodeprovinsi" placeholder="Kode Provinsi" value="<?php echo $r[kodeprovinsi];?>" readonly>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
               <label for="namaprovinsi">Nama Provinsi</label>
                 <input type="text" name="namaprovinsi" class="form-control" id="namaprovinsi" placeholder="Nama Provinsi" value="<?php echo $r[namaprovinsi];?>" readonly>
             </div>
             <br>
          </div>
                                           
          <button class="btn btn-primary" name="hapus_data" type="submit">Hapus</button>
		      <a type="submit"  href="simpeg.php?controller=mstprovinsi" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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