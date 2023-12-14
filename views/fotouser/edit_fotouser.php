<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/fotouser/aksi_fotouser.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=fotouser';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>

     <center><h3 class="box-title">ENTRY GANTI FOTO</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=fotouser&act=update" id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysql_query("select * from users where id=".$id);
			$r=mysql_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
			
				<div class="col-md-6">
                  <div class="box-body">
				  
					<div class="form-group">
					  <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="nip" value="<?php echo $r[nip];?>" placeholder="NIK"readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $r[nama_lengkap];?>"readonly>
                       </div>
					 </div>
					
					 <div class="form-group">
					  <label for="" class="col-sm-4 control-label">Upload Foto <span class="text-danger"> *</span></label>
					  <div class="btn btn-success btn-file">
						<i class="fa fa-faperclip"></i>+
						
                        <input type="file" name="foto"  class="validate[required]"  onchange="readURLfotouser(this);" >
                       </div>
					   <?php 
							$ftuser=$r['foto'];
							if (empty($ftuser)) {
								?>
								 <br></br>
								  <img id="preview_gambarfotouser" src="img/foto_user/kosong.jpg">
							<?php	  
							} else {
							?>
					   
					    <img id="preview_gambarfotouser" src="img/foto_user/<?php echo $r['foto']; ?>" style="width:150px; height:150px">
					
						<?php
							}
						?>
					  
					 </div>
					 
					 
						
				  </div>
				</div>
			
		<div class="divider"></div>
		<?php
			
		}
		?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button name="edit_data" class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Upload Foto" ><i class="fa fa-save"></i>
                   Upload Foto
                </button>
				
				 <a class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Batal" href="appmaster.php?module=fotouser"><i class="fa fa-remove"></i>
                    Batal
                </a>
            </div>
        </div>
    </form>
  </div>

 
	<?php
    }
}
?>