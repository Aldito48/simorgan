<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/resetpassword/aksi_reset.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $ush = mysql_query("SELECT * FROM users ");
  $count=mysql_num_rows($ush);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Ganti Password</h2>
				</div>  ";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
         
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn bg-olive btn-flat margin"  title="Ganti Password"  onClick="update_records_reset();" ><i class="fa fa-edit"></i> Ganti Password</button> 
		  
		  </div>
			
		<?php } ?>	
			
				<?php if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='persediaan' or $_SESSION['ses_level']=='pembelian' or $_SESSION['ses_level']=='gudang' or $_SESSION['ses_level']=='maintenance' or $_SESSION['ses_level']=='marketing' or $_SESSION['ses_level']=='kasir' or $_SESSION['ses_level']=='accounting'){ ?>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
						<th>level</th>
						<th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$ush =mysql_query("select * from users where username='$_SESSION[ses_user]' ");
					while ($us=mysql_fetch_array($ush)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $us['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						<td><?php echo" $us[nik]"; ?></td>
                        <td><?php echo" $us[nama_lengkap]"; ?></td>
                        <td><?php echo" $us[username]"; ?></td>
						<td><?php echo" $us[level]"; ?></td>
						<td align="center">
						<?php
						$foto=$us['foto'];
						if($foto==''){
						?>
						<img src="images/foto_user/blank.png" width="50">
						<?php }else { ?>	
						<img src="img/foto_user/<?php echo $us['foto'];?>" width="50"> 
						<?php } ?>
						
						</td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  </form>
                </div>
              </div>
			  <?php
				}
				   else {
			  ?>
			  <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
						<th>level</th>
						<th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$ush =mysql_query("select * from users where username='$_SESSION[ses_user]' ");
					while ($us=mysql_fetch_array($ush)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $us['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $us[nama_lengkap]"; ?></td>
                        <td><?php echo" $us[username]"; ?></td>
						<td><?php echo" $us[level]"; ?></td>
						<td align="center"><img src="img/foto_user/<?php echo $us['foto'];?>" width="78"> </td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  </form>
                </div>
              </div>
				   <?php } ?>
			  
	<?php		  
	 break;
	   {
	 ?>
	
	 <?php
		}
			
  }
}
?>				