<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/mstkotakab/aksi_mstkotakab.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=mstkotakab';
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
            <h3 class="card-title">Lihat Data Kota/Kabupaten</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstkotakab">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from mstkotakab where id=".$id);
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
             <div class="col-xl-6 mb-3">
                <label for="kodekota">Kode Kota</label>
                <input type="text" name="kodekota" class="form-control" id="kodekota" placeholder="Kode kota" value="<?php echo $r[kodekota];?>" readonly>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
                <label for="namakota">Nama Kota</label>
                <input type="text" name="namakota" class="form-control" id="namakota" placeholder="Nama Kota" value="<?php echo $r[namakota];?>" readonly>
             </div>
             <br>
          </div>
                    
		      <a type="submit"  href="simpeg.php?controller=mstkotakab" class="btn btn-danger"><i class="fa fa-remove"></i> Kembali</a>
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