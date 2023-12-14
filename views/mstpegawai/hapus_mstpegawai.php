<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "views/mstpegawai/aksi_mstpegawai.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'simpeg.php?controller=mstpegawai';
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
            <h3 class="card-title">Hapus Data Pegawai</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstpegawai&act=hapus">
	  <?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from data_pegawai where id=".$id);
			$r=mysqli_fetch_array($res);
		}
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
        <div class="form-col">
            <div class="col-xl-6 mb-3">
                <label for="nip">NIP</label>
                <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" value="<?php echo $r[nip];?>" readonly>
            </div>
            <br>
            <div class="col-xl-6 mb-3">
                <label for="nama_peg">Nama Pegawai</label>
                <input type="text" name="nama_peg" class="form-control" id="nama_peg" placeholder="Nama Pegawai" value="<?php echo $r[nama_peg];?>" readonly>
            </div>
            <br>
            <div class="col-xl-6 mb-3">
                <label for="pangkat_peg">Pangkat Pegawai</label>
                <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat Pegawai" value="<?php echo $r[pangkat_peg];?>" readonly>
            </div>
            <br>
            <div class="col-xl-6 mb-3">
                <label for="uk_peg">Unit Kerja Pegawai</label>
                <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" value="<?php echo $r[uk_peg];?>" readonly>
            </div>
            <br>
            <div class="col-xl-6 mb-3">
                <label for="jabatan_peg">Jabatan Pegawai</label>
                <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" value="<?php echo $r[jabatan_peg];?>" readonly>
            </div>
            <br>
            <div class="col-xl-6 mb-3">
                <label for="status_peg">Status Pegawai</label>
                <input type="text" name="status_peg" class="form-control" id="status_peg" placeholder="Status Pegawai" value="<?php echo $r[status_peg];?>" readonly>
            </div>
            <br>
        </div>
                                           
          <button class="btn btn-primary" name="hapus_data" type="submit">Hapus</button>
		      <a type="submit"  href="simpeg.php?controller=mstpegawai" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
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