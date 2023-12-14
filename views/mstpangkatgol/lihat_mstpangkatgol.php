<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/mstpangkatgol/aksi_mstpangkatgol.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=mstpangkatgol';
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
            <h3 class="card-title">Lihat Data Pangkat/Golongan</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstpangkatgol">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from mstpangkatgol where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
         <div class="form-col">
            <div class="col-xl-6 mb-3">
                <label for="kodegol">Kode Golongan</label>
                <input type="text" name="kodegol" class="form-control" id="kodegol" placeholder="Kode Golongan" value="<?php echo $r[kodegol];?>" readonly>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
                <label for="namagol">Nama Golongan</label>
                <input type="text" name="namagol" class="form-control" id="namagol" placeholder="Nama Golongan" value="<?php echo $r[namagol];?>" readonly>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
                <label for="namapangkat">Nama Pangkat</label>
                <input type="text" name="namapangkat" class="form-control" id="namapangkat" placeholder="Nama Pangkat" value="<?php echo $r[namapangkat];?>" readonly>
             </div>
             <br>
          </div>
                    
		      <a type="submit"  href="simpeg.php?controller=mstpangkatgol" class="btn btn-danger"><i class="fa fa-remove"></i> Kembali</a>
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