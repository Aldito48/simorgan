<?php
session_start();
error_reporting(0);

if (empty($_SESSION['ses_nama']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{

include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_kode.php";
include "config/fungsi_thumbnail.php";
?>

<?php
$appurl='http://simorgan.uinsu.ac.id/';
//$appurl='localhost/simpeg/';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="SIMORGAN">
  
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.png">
    <title>SIMORGAN </title>
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="assets/switcher/demo.css" rel="stylesheet">
    <link href="js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>
<script>
  $(document).ready(function(){
      $('#select_all').on('click',function(){
          if(this.checked){
              $('.chk-box').each(function(){
                  this.checked = true;
              });
          }else{
              $('.chk-box').each(function(){
                  this.checked = false;
              });
          }
      });
  });
  
  /* Unit Kerja */
  function update_records_mstunitkerja()
  {
      document.frm.action = "simpeg.php?controller=edit_mstunitkerja";
      document.frm.submit();
  }

  function view_records_mstunitkerja()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstunitkerja";
      document.frm.submit();
  }

  function delete_records_mstunitkerja()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstunitkerja";
      document.frm.submit();
  }
  //===========================================================================

  /* Jabatan */
  function update_records_mstjabatan()
  {
      document.frm.action = "simpeg.php?controller=edit_mstjabatan";
      document.frm.submit();
  }

  function view_records_mstjabatan()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstjabatan";
      document.frm.submit();
  }

  function delete_records_mstjabatan()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstjabatan";
      document.frm.submit();
  }
  //===========================================================================

  /* Pangkat/Golongan */
  function update_records_mstpangkatgol()
  {
      document.frm.action = "simpeg.php?controller=edit_mstpangkatgol";
      document.frm.submit();
  }

  function view_records_mstpangkatgol()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstpangkatgol";
      document.frm.submit();
  }

  function delete_records_mstpangkatgol()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstpangkatgol";
      document.frm.submit();
  }
  //===========================================================================

  /* Provinsi */
  function update_records_mstprovinsi()
  {
      document.frm.action = "simpeg.php?controller=edit_mstprovinsi";
      document.frm.submit();
  }

  function view_records_mstprovinsi()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstprovinsi";
      document.frm.submit();
  }

  function delete_records_mstprovinsi()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstprovinsi";
      document.frm.submit();
  }
  //===========================================================================

  /* Kota/Kabupaten */
  function update_records_mstkotakab()
  {
      document.frm.action = "simpeg.php?controller=edit_mstkotakab";
      document.frm.submit();
  }

  function view_records_mstkotakab()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstkotakab";
      document.frm.submit();
  }

  function delete_records_mstkotakab()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstkotakab";
      document.frm.submit();
  }
  //===========================================================================

  /* Kecamatan */
  function update_records_mstkecamatan()
  {
      document.frm.action = "simpeg.php?controller=edit_mstkecamatan";
      document.frm.submit();
  }

  function view_records_mstkecamatan()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstkecamatan";
      document.frm.submit();
  }

  function delete_records_mstkecamatan()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstkecamatan";
      document.frm.submit();
  }
  //===========================================================================

  /* Penghargaan */
  function update_records_mstpenghargaan()
  {
      document.frm.action = "simpeg.php?controller=edit_mstpenghargaan";
      document.frm.submit();
  }

  function view_records_mstpenghargaan()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstpenghargaan";
      document.frm.submit();
  }

  function delete_records_mstpenghargaan()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstpenghargaan";
      document.frm.submit();
  }
  //===========================================================================
  
  /* Master Dokumen Tugas Belajar */
  function update_records_doktugasbelajar()
  {
      document.frm.action = "simpeg.php?controller=edit_doktugasbelajar";
      document.frm.submit();
  }

  function view_records_doktugasbelajar()
  {
      document.frm.action = "simpeg.php?controller=lihat_doktugasbelajar";
      document.frm.submit();
  }

  function delete_records_doktugasbelajar()
  {
      document.frm.action = "simpeg.php?controller=hapus_doktugasbelajar";
      document.frm.submit();
  }
  //===========================================================================
   
  /* Master Dokumen Pengaktifan Kembali */
  function update_records_dokaktifkembali()
  {
      document.frm.action = "simpeg.php?controller=edit_dokaktifkembali";
      document.frm.submit();
  }

  function view_records_dokaktifkembali()
  {
      document.frm.action = "simpeg.php?controller=lihat_dokaktifkembali";
      document.frm.submit();
  }

  function delete_records_dokaktifkembali()
  {
      document.frm.action = "simpeg.php?controller=hapus_dokaktifkembali";
      document.frm.submit();
  }
  //===========================================================================
  /* Master Dokumen NIDN */
  function update_records_doknidn()
  {
      document.frm.action = "simpeg.php?controller=edit_doknidn";
      document.frm.submit();
  }

  function view_records_doknidn()
  {
      document.frm.action = "simpeg.php?controller=lihat_doknidn";
      document.frm.submit();
  }

  function delete_records_doknidn()
  {
      document.frm.action = "simpeg.php?controller=hapus_doknidn";
      document.frm.submit();
  }
  //===========================================================================
/* Master Dokumen Pensiun */
  function update_records_dokpensiun()
  {
      document.frm.action = "simpeg.php?controller=edit_dokpensiun";
      document.frm.submit();
  }

  function view_records_dokpensiun()
  {
      document.frm.action = "simpeg.php?controller=lihat_dokpensiun";
      document.frm.submit();
  }

  function delete_records_dokpensiun()
  {
      document.frm.action = "simpeg.php?controller=hapus_dokpensiun";
      document.frm.submit();
  }
  //===========================================================================
  /* Master Dokumen Pindah Home Base */
  function update_records_dokpindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=edit_dokpindahhomebase";
      document.frm.submit();
  }

  function view_records_dokpindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=lihat_dokpindahhomebase";
      document.frm.submit();
  }

  function delete_records_dokpindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=hapus_dokpindahhomebase";
      document.frm.submit();
  }
  //===========================================================================

  /* Tahun Aktif */
  function update_records_tahunaktif()
  {
      document.frm.action = "simpeg.php?controller=edit_tahunaktif";
      document.frm.submit();
  }

  function view_records_tahunaktif()
  {
      document.frm.action = "simpeg.php?controller=lihat_tahunaktif";
      document.frm.submit();
  }

  function delete_records_tahunaktif()
  {
      document.frm.action = "simpeg.php?controller=hapus_tahunaktif";
      document.frm.submit();
  }
  //===========================================================================

  /* Hak Akses */
  function update_records_hakakses()
  {
      document.frm.action = "simpeg.php?controller=edithakakses";
      document.frm.submit();
  }

  function view_records_hakakses()
  {
      document.frm.action = "simpeg.php?controller=lihathakakses";
      document.frm.submit();
  }

  function delete_records_hakakses()
  {
      document.frm.action = "simpeg.php?controller=hapushakakses";
      document.frm.submit();
  }
  //===========================================================================

  /* Pegawai */
  function update_records_mstpegawai()
  {
      document.frm.action = "simpeg.php?controller=edit_mstpegawai";
      document.frm.submit();
  }

  function view_records_mstpegawai()
  {
      document.frm.action = "simpeg.php?controller=lihat_mstpegawai";
      document.frm.submit();
  }

  function delete_records_mstpegawai()
  {
      document.frm.action = "simpeg.php?controller=hapus_mstpegawai";
      document.frm.submit();
  }
  //===========================================================================
  
  /* Pegawai */
  function update_records_users()
  {
      document.frm.action = "simpeg.php?controller=edit_users";
      document.frm.submit();
  }

  function view_records_users()
  {
      document.frm.action = "simpeg.php?controller=lihat_users";
      document.frm.submit();
  }

  function delete_records_users()
  {
      document.frm.action = "simpeg.php?controller=hapus_users";
      document.frm.submit();
  }
  //===========================================================================

  /* Usul cuti Pegawai (Entry) */
  function update_records_cutipeg()
  {
      document.frm.action = "simpeg.php?controller=edit_cutipeg";
      document.frm.submit();
  }

  function view_records_cutipeg()
  {
      document.frm.action = "simpeg.php?controller=lihat_cutipeg";
      document.frm.submit();
  }

  function delete_records_cutipeg()
  {
      document.frm.action = "simpeg.php?controller=hapus_cutipeg";
      document.frm.submit();
  }
  //===========================================================================

  /* Usul cuti Pegawai (Verifikasi) */
  function update_records_vfcutipeg()
  {
      document.frm.action = "simpeg.php?controller=edit_vfcutipeg";
      document.frm.submit();
  }

  function view_records_vfcutipeg()
  {
      document.frm.action = "simpeg.php?controller=lihat_vfcutipeg";
      document.frm.submit();
  }

  function delete_records_vfcutipeg()
  {
      document.frm.action = "simpeg.php?controller=hapus_vfcutipeg";
      document.frm.submit();
  }
  //===========================================================================

  /* Usul Pindah Homebase (Entry) */
  function update_records_pindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=edit_pindahhomebase";
      document.frm.submit();
  }

  function view_records_pindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=lihat_pindahhomebase";
      document.frm.submit();
  }

  function delete_records_pindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=hapus_pindahhomebase";
      document.frm.submit();
  }
  //===========================================================================

  /* Usul Pindah Homebase (Verifikasi) */
  function update_records_vfpindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=edit_vfpindahhomebase";
      document.frm.submit();
  }

  function view_records_vfpindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=lihat_vfpindahhomebase";
      document.frm.submit();
  }

  function delete_records_vfpindahhomebase()
  {
      document.frm.action = "simpeg.php?controller=hapus_vfpindahhomebase";
      document.frm.submit();
  }
  //===========================================================================

  /* Usul Pensiun (Entry) */
  function update_records_pensiun()
  {
      document.frm.action = "simpeg.php?controller=edit_pensiun";
      document.frm.submit();
  }

  function view_records_pensiun()
  {
      document.frm.action = "simpeg.php?controller=lihat_pensiun";
      document.frm.submit();
  }

  function delete_records_pensiun()
  {
      document.frm.action = "simpeg.php?controller=hapus_pensiun";
      document.frm.submit();
  }
  //===========================================================================

  /* Usul Pensiun (Verifikasi) */
  function update_records_vfpensiun()
  {
      document.frm.action = "simpeg.php?controller=edit_vfpensiun";
      document.frm.submit();
  }

  function view_records_vfpensiun()
  {
      document.frm.action = "simpeg.php?controller=lihat_vfpensiun";
      document.frm.submit();
  }

  function delete_records_vfpensiun()
  {
      document.frm.action = "simpeg.php?controller=hapus_vfpensiun";
      document.frm.submit();
  }
  //===========================================================================

</script><!-- akhir cekbox -->

<script>
function FormatCurrency(objNum)
{
   var num = objNum.value
   var ent, dec;
   if (num != '' && num != objNum.oldvalue)
   {
     num = HapusTitik(num);
     if (isNaN(num))
     {
       objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
     } else {
       var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
       if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
       {
         alert(num.split('.')[1]);
         objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
       }
       else
       {
         objNum.value = TambahTitik(num.split('.')[0]);
       }
       objNum.oldvalue = objNum.value;
     }
   }
}
function HapusTitik(num)
{
   return (num.replace(/\./g, ''));
}

function TambahTitik(num)
{
   numArr=new String(num).split('').reverse();
   for (i=3;i<numArr.length;i+=3)
   {
     numArr[i]+='.';
   }
   return numArr.reverse().join('');
} 
        
function formatCurrency(num) {
   num = num.toString().replace(/\$|\./g,'');
   if(isNaN(num))
   num = "0";
   sign = (num == (num = Math.abs(num)));
   num = Math.floor(num*100+0.50000000001);
   cents = num0;
   num = Math.floor(num/100).toString();
   for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
   num = num.substring(0,num.length-(4*i+3))+'.'+
   num.substring(num.length-(4*i+3));
   return (((sign)?'':'-') + num);
}
</script>  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
			
		
			function readURLfotopeg(input) { // Mulai membaca inputan gambar
			if (input.files && input.files[0]) {
			var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
			 
			reader.onload = function (e) { // Mulai pembacaan file
			$('#preview_gambarpeg') // Tampilkan gambar yang dibaca ke area id #preview_gambar
			.attr('src', e.target.result)
			.width(150); // Menentukan lebar gambar preview (dalam pixel)
			//.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
			};
			 
			reader.readAsDataURL(input.files[0]);
			}
			}
			
			function readURLfotouser(input) { // Mulai membaca inputan gambar
			if (input.files && input.files[0]) {
			var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
			 
			reader.onload = function (e) { // Mulai pembacaan file
			$('#preview_gambarfotouser') // Tampilkan gambar yang dibaca ke area id #preview_gambar
			.attr('src', e.target.result)
			.width(250); // Menentukan lebar gambar preview (dalam pixel)
			//.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
			};
			 
			reader.readAsDataURL(input.files[0]);
			}
			}
			
			
	</script>

  <body class="app sidebar-mini ltr light-mode">
   
  
    <?php include "themes/header.php";?>
        <section class="content"> 
          <div class="page">
            <div class="page-main">
              <?php include "content.php";?>
              <?php include "themes/menu.php";?>
            </div>
           
          </div>
        </section>
     
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
  
  
   <script src="assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- INPUT MASK JS-->
    <script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- SIDE-MENU JS -->
    <script src="assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="assets/js/typehead.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <script src="assets/js/form-validation.js"></script>
    <!-- DATA TABLE JS-->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/table-data.js"></script>
	
    <script src="assets/js/select2.js"></script>

    <script src="assets/plugins/sidebar/sidebar.js"></script>

    <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="assets/plugins/p-scroll/pscroll.js"></script>
    <script src="assets/plugins/p-scroll/pscroll-1.js"></script>

	
    <script>
      $(function () {
        $("#example1").DataTable();
		$("#example2").DataTable();
		$("#example3").DataTable();
		$("#example4").DataTable();
		$("#example5").DataTable();
		$("#example6").DataTable();
		$("#example7").DataTable();
		$("#example8").DataTable();
		$("#example9").DataTable();
		$("#example10").DataTable();
		$("#example11").DataTable();
		$("#example12").DataTable();
		$("#example13").DataTable();
		$("#example14").DataTable();
		$("#example15").DataTable();
		$("#example16").DataTable();
		$("#example17").DataTable();
		$("#example18").DataTable();
		$("#example19").DataTable();
		$("#example20").DataTable();
		$("#example21").DataTable();
    </script>
	
		
    <script>
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    </script>

	
    <script>
      $(function () {
        //Date range picker
        $('#reservation').daterangepicker(); 

        $(".select2").select2();
        
        $("#compose-textarea").wysihtml5();

        CKEDITOR.replace('editor3'); 

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	
	<script>
    $(function() {
        $( "#tanggal" ).datepicker();
        
    });
    </script>
	<script type="text/javascript" src="js/plugins/sweetalert/dist/sweetalert.min.js"></script>   
	
	<script>

				$(document).on('click', '.pilih1', function (e) {
				 document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kode").value = $(this).attr('data-kode');
				document.getElementById("nama_kec").value = $(this).attr('data-nama_kec');
                $('#myModal1').modal('hide');
            });
	</script>		
	
	
	
  </body>
</html>

<?php
  }
?>