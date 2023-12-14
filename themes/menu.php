<!doctype html>
<html lang="en" dir="ltr">

<head>

</head>

<body class="app sidebar-mini ltr light-mode">

    <div id="global-loader">
        <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
   
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="?controller=beranda">
                            <img src="assets/images/brand/logouinsu3.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="assets/images/brand/logouinsu3.png" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block">
                            <input type="text" class="form-control" id="typehead" placeholder="Search for results...">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <!-- CART -->
                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        <!-- FULL-SCREEN -->
                            
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="images/logouinsu.png" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
													
				<?php
				include "../config/koneksi.php";
				
				$use =mysqli_query($koneksi,"select * from users where username='$_SESSION[ses_user]' "); 
				$us=mysqli_fetch_array($use);
				$foto=$us['foto'];
				if($foto==''){
					?>
					 <img src="images/logouinsu.png" class="avatar  profile-user brround cover-image" alt="User Image" />
				<?php	
				}else {
				?>
                  <img src="img/foto_user/<?php echo $_SESSION['ses_foto'];?>" class="avatar  profile-user brround cover-image"  />
				<?php  
				}
				?>
												
                 <h5 class="text-dark mb-0 fs-14 fw-semibold"><?php echo $_SESSION['ses_nama'];?></h5>
                   <small class="text-muted"><?php echo $_SESSION['ses_level'];?></small>
                     </div>
				</div>
				<div class="dropdown-divider m-0"></div>
													<a class="dropdown-item" href="logout.php">
                                                    <i class="dropdown-icon fe fe-power"></i> Keluar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="?controller=beranda">
                            <img src="img/logosimpeg.png" class="header-brand-img desktop-logo" alt="logo" class="avatar  profile-user brround cover-image">
                            <img src="img/logosimpeg.png" class="header-brand-img toggle-logo"
                                alt="logo" class="avatar  profile-user brround cover-image">
                            <img src="img/logosimpeg.png" class="header-brand-img light-logo" alt="logo" class="avatar  profile-user brround cover-image">
                            <img src="img/logosimpeg.png" class="header-brand-img light-logo1"
                                alt="logo" class="avatar  profile-user brround cover-image">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                      
                        <ul class="side-menu">
                           
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="?controller=beranda"><i
                                        class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">Beranda</span></a>
                            </li>
							
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-slack"></i><span
                                        class="side-menu__label">Master</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
                                                       
														 <li><a href="?controller=mstunitkerja" class="slide-item"> Unit Kerja</a></li>
                                                        <li><a href="?controller=mstjabatan" class="slide-item"> Jabatan</a></li>
                                                        <li><a href="?controller=mstpangkatgol" class="slide-item"> Pangkat/Golongan</a></li>
                                                        <li><a href="?controller=mstprovinsi" class="slide-item"> Provinsi</a></li>
														<li><a href="?controller=mstkotakab" class="slide-item"> Kota/Kabupaten</a></li>
														<li><a href="?controller=mstkecamatan" class="slide-item"> Kecamatan</a></li>
														<li><a href="?controller=mstpenghargaan" class="slide-item"> Penghargaan</a></li>
														<li><a href="?controller=doktugasbelajar" class="slide-item"> Dokumen Tugas Belajar</a></li>
														<li><a href="?controller=dokpindahhomebase" class="slide-item"> Dokumen Pindah Homebase</a></li>
														<li><a href="?controller=dokpensiun" class="slide-item"> Dokumen Pensiun</a></li>
														<li><a href="?controller=dokaktifkembali" class="slide-item"> Dokumen Pengaktifkan Kembali</a></li>
														<li><a href="?controller=doknidn" class="slide-item"> Dokumen Penerbitan NIDN</a></li>
														<li><a href="?controller=hakakses" class="slide-item"> Hak Akses</a></li>
													</ul>
                                                  
                                                </div>
									</li>
								</ul>
                            </li>
                           
							
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="?controller=mstpegawai"><i
                                   class="side-menu__icon fe fe-user-check"></i><span
                                   class="side-menu__label">Data Pegawai</span></a>
                            </li>
							
							<li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-layers"></i><span
                                        class="side-menu__label">Usulan Tugas Belajar</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=tugasbelajar" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vftugasbelajar" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
						
							<li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-shopping-bag"></i><span
                                        class="side-menu__label">Usulan Cuti</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=cutipeg" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vfcutipeg" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
                           
						   <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-shopping-bag"></i><span
                                        class="side-menu__label">Usulan Pindah Homebase</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=pindahhomebase" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vfpindahhomebase" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
							
							 <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-clipboard"></i><span
                                        class="side-menu__label">Usulan Penerbitan NIDN</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=terbitnidn" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vfterbitnidn" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
						   
						    <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-grid"></i><span
                                        class="side-menu__label">Usulan Satya Lencana</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=satyalencana" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vfsatyalencana" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
							
							 <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-briefcase"></i><span
                                        class="side-menu__label">Usulan Pensiun</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=pensiun" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vfpensiun" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
							
							 <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-briefcase"></i><span
                                        class="side-menu__label">Usulan Aktif Kembali</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side1">
													<ul class="sidemenu-list">
														 <li><a href="?controller=aktifkembali" class="slide-item"> Entry Usulan</a></li>
                                                        <li><a href="?controller=vfaktifkembali" class="slide-item"> Verifikasi</a></li>
													</ul>
                                                </div>
									</li>
								</ul>
                            </li>
							
							  <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="?controller=arsippegawai"><i
                                   class="side-menu__icon fe fe-user-check"></i><span
                                   class="side-menu__label">Arsip Pegawai</span></a>
                            </li>
						 
                            <li class="sub-category">
                                <h3>Pengguna Sistem</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-users"></i><span
                                        class="side-menu__label">Pengguna Sistem</span><i
                                        class="angle fe fe-chevron-right"></i>
                                </a>
								<ul class="slide-menu">
									<li class="panel sidetab-menu">
										
										<div class="panel-body tabs-menu-body p-0 border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="side21">
													<ul class="sidemenu-list">
                                                        <li class="side-menu-label1"><a href="javascript:void(0)">Pengguna Sistem</a></li>
                                                        <li><a href="?controller=users" class="slide-item"> Data Pengguna Sistem</a></li>
                                                       
													</ul>
                                                    
												</div>
												
											</div>
										</div>
									</li>
								</ul>
                            </li>
							
							<li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="logout.php"><i
                                        class="side-menu__icon fe fe-power"></i><span
                                        class="side-menu__label">Keluar</span></a>
                            </li>
                      
                        </ul>
                     
                    </div>
                </div>
            </div>
          
        </div>
      </div>
    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="assets/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="assets/plugins/p-scroll/pscroll.js"></script>
    <script src="assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="assets/plugins/chart/Chart.bundle.js"></script>
    <script src="assets/plugins/chart/utils.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="assets/js/apexcharts.js"></script>
    <script src="assets/plugins/apexchart/irregular-data-series.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="assets/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Vector js -->
    <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="assets/js/typehead.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="assets/js/index1.js"></script>

    <!-- Color Theme js -->
    <script src="assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="assets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="assets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="assets/switcher/js/switcher.js"></script>

</body>

</html>