<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:../index.php');
}
else{
	include "../config/library.php";
?>	

	   <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>SIMPEG</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
	
	
	
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
		  	
			<?php  if ($_SESSION['ses_level']=='admin'){ ?>
			
			
			<?php } ?>
			
			
			
            </section>
         
<?php
}
?>			