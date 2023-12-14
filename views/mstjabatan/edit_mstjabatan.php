<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/mstjabatan/aksi_mstjabatan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=mstjabatan';
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
            <h3 class="card-title">Edit Data Jabatan</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstjabatan&act=update">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from mstjabatan where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
         <div class="form-col">
            <div class="col-xl-6 mb-3">
               <label for="kodejab">Kode Jabatan</label>
                 <input type="text" name="kodejab" class="form-control" id="kodejab" placeholder="Kode Jabatan" value="<?php echo $r[kodejab];?>" required>
                  <div class="invalid-feedback">Data Kode Jabatan Harus Diisi</div>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
               <label for="namajab">Nama Jabatan</label>
                 <input type="text" name="namajab" class="form-control" id="namajab" placeholder="Nama Jabatan" value="<?php echo $r[namajab];?>" required>
                  <div class="invalid-feedback">Data Nama Jabatan Harus Diisi</div>
             </div>
             <br>
          </div>                             
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
		      <a type="submit"  href="simpeg.php?controller=mstjabatan" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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