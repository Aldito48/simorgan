
	
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/fotouser/aksi_fotouser.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $fotouser = mysql_query("SELECT * FROM users ");
  $count=mysql_num_rows($fotouser);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>GANTI FOTO USER</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
	    
		  
		<?php
		if($count > 0)
        {
		?>			
		   
		   <button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Foto User"  onClick="update_records_fotouser();" ><i class="fa fa-camera"></i> Foto User</button>
		  
		   
		   <button class="btn bg-green btn-flat margin" data-toggle="tooltip" data-placement="top" title="Lihat Foto"  onClick="view_records_fotouser();" ><i class="fa fa-desktop"></i> Lihat Foto</button>
		 
		  </div>
			
		<?php } ?>	
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                       
						<th>NIP</th>
                        <th>Nama</th>
                        <th>Username</th>
						<th>level</th>
						<th>Foto</th>
						
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$slid =mysql_query("select * from users where username='$_SESSION[ses_user]' ");
					while ($sl=mysql_fetch_array($slid)){       
					?>
                      <tr>
					  <td style='text-align:center'>
					  
						<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $sl['id'];?>"/>
                       </td> 
						<td><?php echo" $sl[nip]"; ?></td>
                        <td><?php echo" $sl[nama_lengkap]"; ?></td>
                        <td><?php echo" $sl[username]"; ?></td>
						<td><?php echo" $sl[level]"; ?></td>
						
						<td align="center">
						<?php
						$fotouser=$sl['foto'];
						if($fotouser==''){
						?>
						<img src="img/foto_user/kosong.jpg" width="150" height="150">
						<?php }else { ?>	
						<img src="img/foto_user/<?php echo $sl['foto'];?>" width="150" height="150"> 
						<?php } ?>
						</td>
						
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                  </table>
				  </div>
				  </form>
                </div>
              </div>
	<?php		  
	 
	 ?>
	 
		
		
			
	 <?php
			
  }
}
?>				