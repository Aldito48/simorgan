<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{

  // Home (Beranda)
  if ($_GET['controller']=='beranda'){
    if ($_SESSION['ses_level']=='admin'){
      include "themes/body.php";
	  
    }  
  }
 //=======================================================================
 elseif ($_GET['controller']=='hakakses'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/hakakses/hakakses.php";
    }
  }
  
  elseif ($_GET['controller']=='hapushakakses'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/hakakses/hapushakakses.php";
    }
  }
  
  elseif ($_GET['controller']=='lihathakakses'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/hakakses/lihathakakses.php";
    }
  }
  
    elseif ($_GET['controller']=='edithakakses'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/hakakses/edithakakses.php";
    }
  }
  //=======================================================================
  elseif ($_GET['controller']=='resetpassword'){
   if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/resetpassword/resetpassword.php";
    }
  }
  
  
  elseif ($_GET['controller']=='editpassword'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/resetpassword/editpassword.php";
    }
  }
  
  elseif ($_GET['controller']=='fotouser'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/fotouser/fotouser.php";
    }
  }
    
  elseif ($_GET['controller']=='lihat_fotouser'){
   if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/fotouser/lihat_fotouser.php";
    }
  }
  
  elseif ($_GET['controller']=='edit_fotouser'){
  if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/fotouser/edit_fotouser.php";
    }
  }
 //====================================================
  elseif ($_GET['controller']=='users'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/users/users.php";
    }
  }

  elseif ($_GET['controller']=='edit_users'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/users/edit_users.php";
    }
  }

  elseif ($_GET['controller']=='lihat_users'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/users/lihat_users.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_users'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/users/hapus_users.php";
    }
  }
  
  //========================================================
  
   elseif ($_GET['controller']=='mstunitkerja'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstunitkerja/mstunitkerja.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstunitkerja'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstunitkerja/edit_mstunitkerja.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstunitkerja'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstunitkerja/hapus_mstunitkerja.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstunitkerja'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstunitkerja/lihat_mstunitkerja.php";
    }
  }

  //==================================================================
  
   elseif ($_GET['controller']=='doktugasbelajar'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doktugasbelajar/doktugasbelajar.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_doktugasbelajar'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doktugasbelajar/edit_doktugasbelajar.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_doktugasbelajar'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doktugasbelajar/hapus_doktugasbelajar.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_doktugasbelajar'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doktugasbelajar/lihat_doktugasbelajar.php";
    }
  }

  //==================================================================
  
   elseif ($_GET['controller']=='dokpindahhomebase'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpindahhomebase/dokpindahhomebase.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_dokpindahhomebase'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpindahhomebase/edit_dokpindahhomebase.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_dokpindahhomebase'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpindahhomebase/hapus_dokpindahhomebase.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_dokpindahhomebase'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpindahhomebase/lihat_dokpindahhomebase.php";
    }
  }

  //==================================================================
  elseif ($_GET['controller']=='doknidn'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doknidn/doknidn.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_doknidn'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doknidn/edit_doknidn.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_doknidn'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doknidn/hapus_doknidn.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_doknidn'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/doknidn/lihat_doknidn.php";
    }
  }

  //==================================================================
   elseif ($_GET['controller']=='dokpensiun'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpensiun/dokpensiun.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_dokpensiun'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpensiun/edit_dokpensiun.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_dokpensiun'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpensiun/hapus_dokpensiun.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_dokpensiun'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokpensiun/lihat_dokpensiun.php";
    }
  }

  //==================================================================
   elseif ($_GET['controller']=='dokaktifkembali'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokaktifkembali/dokaktifkembali.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_dokaktifkembali'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokaktifkembali/edit_dokaktifkembali.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_dokaktifkembali'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokaktifkembali/hapus_dokaktifkembali.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_dokaktifkembali'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/dokaktifkembali/lihat_dokaktifkembali.php";
    }
  }

  //==================================================================
  
  elseif ($_GET['controller']=='mstjabatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstjabatan/mstjabatan.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstjabatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstjabatan/edit_mstjabatan.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstjabatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstjabatan/hapus_mstjabatan.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstjabatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstjabatan/lihat_mstjabatan.php";
    }
  }
  
  //==================================================================
  
  elseif ($_GET['controller']=='mstpangkatgol'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpangkatgol/mstpangkatgol.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstpangkatgol'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpangkatgol/edit_mstpangkatgol.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstpangkatgol'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpangkatgol/hapus_mstpangkatgol.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstpangkatgol'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpangkatgol/lihat_mstpangkatgol.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='mstprovinsi'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstprovinsi/mstprovinsi.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstprovinsi'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstprovinsi/edit_mstprovinsi.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstprovinsi'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstprovinsi/hapus_mstprovinsi.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstprovinsi'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstprovinsi/lihat_mstprovinsi.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='mstkotakab'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkotakab/mstkotakab.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstkotakab'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkotakab/edit_mstkotakab.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstkotakab'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkotakab/hapus_mstkotakab.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstkotakab'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkotakab/lihat_mstkotakab.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='mstkecamatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkecamatan/mstkecamatan.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstkecamatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkecamatan/edit_mstkecamatan.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstkecamatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkecamatan/hapus_mstkecamatan.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstkecamatan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstkecamatan/lihat_mstkecamatan.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='mstpenghargaan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpenghargaan/mstpenghargaan.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstpenghargaan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpenghargaan/edit_mstpenghargaan.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstpenghargaan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpenghargaan/hapus_mstpenghargaan.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstpenghargaan'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpenghargaan/lihat_mstpenghargaan.php";
    }
  }
  
  //==================================================================
   elseif ($_GET['controller']=='mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/mstpegawai.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/edit_mstpegawai.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/hapus_mstpegawai.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/lihat_mstpegawai.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='tahunaktif'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/tahunaktif/tahunaktif.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_tahunaktif'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/tahunaktif/edit_tahunaktif.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_tahunaktif'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/tahunaktif/hapus_tahunaktif.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_tahunaktif'){
    if ($_SESSION['ses_level']=='admin'){
      include "views/tahunaktif/lihat_tahunaktif.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/mstpegawai.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/edit_mstpegawai.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/hapus_mstpegawai.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_mstpegawai'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/mstpegawai/lihat_mstpegawai.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='cutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/cutipeg/cutipeg.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_cutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/cutipeg/edit_cutipeg.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_cutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/cutipeg/hapus_cutipeg.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_cutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/cutipeg/lihat_cutipeg.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='vfcutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfcutipeg/vfcutipeg.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_vfcutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfcutipeg/edit_vfcutipeg.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_vfcutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfcutipeg/hapus_vfcutipeg.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_vfcutipeg'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfcutipeg/lihat_vfcutipeg.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='pindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pindahhomebase/pindahhomebase.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_pindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pindahhomebase/edit_pindahhomebase.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_pindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pindahhomebase/hapus_pindahhomebase.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_pindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pindahhomebase/lihat_pindahhomebase.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='vfpindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpindahhomebase/vfpindahhomebase.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_vfpindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpindahhomebase/edit_vfpindahhomebase.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_vfpindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpindahhomebase/hapus_vfpindahhomebase.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_vfpindahhomebase'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpindahhomebase/lihat_vfpindahhomebase.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='pensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pensiun/pensiun.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_pensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pensiun/edit_pensiun.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_pensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pensiun/hapus_pensiun.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_pensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/pensiun/lihat_pensiun.php";
    }
  }
  
  //==================================================================

  elseif ($_GET['controller']=='vfpensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpensiun/vfpensiun.php";
    }
  }
 
	elseif ($_GET['controller']=='edit_vfpensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpensiun/edit_vfpensiun.php";
    }
  }
  
   elseif ($_GET['controller']=='hapus_vfpensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpensiun/hapus_vfpensiun.php";
    }
  }
  
   elseif ($_GET['controller']=='lihat_vfpensiun'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='pegawai'){
      include "views/vfpensiun/lihat_vfpensiun.php";
    }
  }
  
  //==================================================================

  else{
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
                                        <div class="container text-center">
								<div class="error-template">
								<h1 class="display-1 mb-2">404<span class="text-center custom-emoji"></h1>
								<div class="m-5">
									<span class="fs-20">
                                    Halaman Ditemukan
									</span>
								<p>Coba Cek Penulisan Link Website Lakukan Refresh</p>
								</div>
							<div class="text-center">
                            <a class="btn btn-secondary mt-5 mb-5" href="?controller=beranda"> <i class="fa fa-long-arrow-left"></i> Kembali ke dashboard </a>
                        </div>
                    </div>
					</div>
                 </div>
              <div class="card-body">
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