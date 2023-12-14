<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/doknidn/aksi_doknidn.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=doknidn';
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
            <h3 class="card-title">Edit Data Dokumen Penerbitan NIDN</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=doknidn&act=update">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from doknidn where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
         <div class="form-col">
           <div class="col-xl-6 mb-3">
			<label for="kdnidn">Kode</label>
              <input type="text" name="kdnidn" class="form-control" id="kdnidn" placeholder="Kode" value="<?php echo $r[kdnidn];?>" required>
                <div class="invalid-feedback">Data Kode Harus Diisi</div>
              </div>
                                               
            <div class="col-xl-6 mb-3">
              <label for="uraiannidn">Uraian Dokumen</label>
               <input type="text" name="uraiannidn" class="form-control" id="uraiannidn" placeholder="Uraian Dokumen" value="<?php echo $r[uraiannidn];?>" required>
              <div class="invalid-feedback">Data Uraian Dokumen Harus Diisi</div>
            </div>
            
          </div>                             
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
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