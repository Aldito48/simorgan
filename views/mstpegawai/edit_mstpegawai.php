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
            <h3 class="card-title">Update Data Pegawai</h3>
          </div>
         <div class="card-body">

      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?controller=mstpegawai&act=update">
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
                <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" value="<?php echo $r[nip];?>">
             </div>
			
            <div class="col-xl-6 mb-3">
                <label for="nip_baru">NIP Baru</label>
                <input type="text" name="nip_baru" class="form-control" id="nip_baru" placeholder="NIP Baru" value="<?php echo $r[nip_baru];?>" required>
                <div class="invalid-feedback">Data NIP Baru Harus Diisi</div>
             </div>
            
             <div class="col-xl-6 mb-3">
                <label for="nama_peg">Nama Pegawai</label>
                <input type="text" name="nama_peg" class="form-control" id="nama_peg" placeholder="Nama Pegawai" value="<?php echo $r[nama_peg];?>" required>
                <div class="invalid-feedback">Data Nama Pegawai Harus Diisi</div>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
                <label for="pangkat_peg">Pangkat Pegawai</label>
                <input type="text" name="pangkat_peg" class="form-control" id="pangkat_peg" placeholder="Pangkat Pegawai" value="<?php echo $r[pangkat_peg];?>" required>
                <div class="invalid-feedback">Data Pangkat Pegawai Harus Diisi</div>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
                <label for="uk_peg">Unit Kerja Pegawai</label>
                <input type="text" name="uk_peg" class="form-control" id="uk_peg" placeholder="Unit Kerja Pegawai" value="<?php echo $r[uk_peg];?>" required>
                <div class="invalid-feedback">Data Unit Kerja Pegawai Harus Diisi</div>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
                <label for="jabatan_peg">Jabatan Pegawai</label>
                <input type="text" name="jabatan_peg" class="form-control" id="jabatan_peg" placeholder="Jabatan Pegawai" value="<?php echo $r[jabatan_peg];?>" required>
                <div class="invalid-feedback">Data Jabatan Pegawai Harus Diisi</div>
             </div>
             <br>
             <div class="col-xl-6 mb-3">
               <label for="status_peg">Status Pegawai</label>
               <?php
                  echo "<select class=\"form-control form-select select2\" id=\"status_peg\" name=\"status_peg\" required>
                        <option value=\"\" disabled selected style=\"display:none;\">Pilih</option>";
                        $sp = mysqli_query($koneksi, "SHOW COLUMNS FROM `data_pegawai` WHERE `field` = 'status_peg'");
                        while($result = mysqli_fetch_row($sp)){
                           foreach(explode("','",substr($result[1],6,-2)) as $option){
                           $selected = ($option === $r['status_peg']) ? 'selected' : '';
                           echo "<option $selected>$option</option>";
                           }
                        }
                  echo "</select>";
               ?>
               <div class="invalid-feedback">Data Status Pegawai Harus Diisi</div>
             </div>
             <br>
          </div>                             
          <button class="btn btn-primary" name="edit_data" type="submit">Simpan</button>
		    <a href="simpeg.php?controller=mstpegawai" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
			  
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="panel panel-primary">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs panel-info">
                                        <li><a href="#tabjab" class="active" data-bs-toggle="tab"><span></span>Jabatan</a></li>
                                        <li><a href="#tabalamat" data-bs-toggle="tab"><span></span>Alamat</a></li>
                                        <li><a href="#tabdiri" data-bs-toggle="tab"><span></span>Ket.Diri</a></li>
                                        <li><a href="#tabpend" data-bs-toggle="tab"><span></span>Pendidikan</a></li>
                                        <li><a href="#tabpekerjaan" data-bs-toggle="tab"><span></span>Pekerjaan</a></li>
                                        <li><a href="#tabjasa" data-bs-toggle="tab"><span></span>Tanda Jasa</a></li>
                                        <li><a href="#tabpengalaman" data-bs-toggle="tab"><span></span>Pengalaman</a></li>
                                        <li><a href="#tabkel" data-bs-toggle="tab"><span></span>Keluarga</a></li>
                                        <li><a href="#taborganisasi" data-bs-toggle="tab"><span></span>Organisasi</a></li>
                                        <li><a href="#tabpenelitian" data-bs-toggle="tab"><span></span>Penelitian</a></li>
                                        <li><a href="#tabdisiplin" data-bs-toggle="tab"><span></span>Indisiplin</a></li>
                                        <li><a href="#tabkgb" data-bs-toggle="tab"><span></span>KGB</a></li>
                                        <li><a href="#tabskp" data-bs-toggle="tab"><span></span>SKP</a></li>
                                        <li><a href="#tabcltn" data-bs-toggle="tab"><span></span>CLTN</a></li>
                                        <li><a href="#tablain" data-bs-toggle="tab"><span></span>Ket.Lainnya</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabjab">
                                        
										<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_jabatanpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_jabatanpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_jabatanpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Unit Kerja</th>  
                                                            <th style="text-align:center;">Kel Unit Kerja</th>
															<th style="text-align:center;">Pangkat/Gol</th>
															<th style="text-align:center;">TMT</th>
															<th style="text-align:center;">Pendidikan</th>
															<th style="text-align:center;">Tahun Lulus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from jabatan_peg WHERE nip = '$r[nip]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[unitkerja]"; ?></td>
                                                        <td><?php echo" $ks[kelunitkerja]"; ?></td>
														<td><?php echo" $ks[pangkat_gol]"; ?></td>
														<td><?php echo" $ks[tmtjabatan]"; ?></td>
														<td><?php echo" $ks[pendidikan]"; ?></td>
														<td><?php echo" $ks[thnpendidikan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabalamat">
									
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_alamatpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example2">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Alamat</th>  
                                                            <th style="text-align:center;">Kota/Kab</th>
															<th style="text-align:center;">Provinsi</th>
															<th style="text-align:center;">Kode Pos</th>
															<th style="text-align:center;">No.Telepon/HP</th>
															<th style="text-align:center;">Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from data_pegawai WHERE nip_baru = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[alamat_1]"; ?>-<?php echo" $ks[alamat_2]"; ?></td>
                                                        <td><?php echo" $ks[kab_kota]"; ?></td>
														<td><?php echo" $ks[provinsi]"; ?></td>
														<td><?php echo" $ks[kode_pos]"; ?></td>
														<td><?php echo" $ks[telepon]"; ?>/<?php echo" $ks[no_hp]"; ?></td>
														<td><?php echo" $ks[email]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="tab-pane" id="tabdiri">
                                        <button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_diripeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example3">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Tinggi Badan</th>  
                                                            <th style="text-align:center;">Berat Badan</th>
															<th style="text-align:center;">Rambut</th>
															<th style="text-align:center;">Bentuk Muka</th>
															<th style="text-align:center;">Warna Kulit</th>
															<th style="text-align:center;">Ciri Khas</th>
															<th style="text-align:center;">Cacat Tubuh</th>
															<th style="text-align:center;">Kegemaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from data_pegawai WHERE nip_baru = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tinggi_badan]"; ?></td>
                                                        <td><?php echo" $ks[berat_badan]"; ?></td>
														<td><?php echo" $ks[rambut]"; ?></td>
														<td><?php echo" $ks[bentuk_muka]"; ?></td>
														<td><?php echo" $ks[warna_kulit]"; ?></td>
														<td><?php echo" $ks[cirikhas]"; ?></td>
														<td><?php echo" $ks[cacat]"; ?></td>
														<td><?php echo" $ks[kegemaran]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabpend">
									
									 <div class="card-header">
									<h3 class="card-title">Pendidikan Didalam atau Diluar Negeri Pegawai</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pendpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pendpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pendpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Tingkat</th>  
                                                            <th style="text-align:center;">Nama Sekolah/PT</th>
															<th style="text-align:center;">Fakultas</th>
															<th style="text-align:center;">Jurusan</th>
															<th style="text-align:center;">Akta</th>
															<th style="text-align:center;">Thn Lulus</th>
															<th style="text-align:center;">Tempat</th>
															<th style="text-align:center;">Penandatanganan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pendidikan_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tingkat]"; ?></td>
                                                        <td><?php echo" $ks[nama_instansi]"; ?></td>
														<td><?php echo" $ks[fakultas]"; ?></td>
														<td><?php echo" $ks[jurusan]"; ?></td>
														<td><?php echo" $ks[akta]"; ?></td>
														<td><?php echo" $ks[thn_lulus]"; ?></td>
														<td><?php echo" $ks[tempat]"; ?></td>
														<td><?php echo" $ks[penandatanganan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
                                      
									<div class="card-header">
									<h3 class="card-title">Kursus/Latihan Didalam atau Diluar Negeri Pegawai</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_kursuspeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_kursuspeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_kursuspeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Nama Kursus/Pelatihan</th>  
                                                            <th style="text-align:center;">Periode</th>
															<th style="text-align:center;">Jam</th>
															<th style="text-align:center;">Hari</th>
															<th style="text-align:center;">Bulan</th>
															<th style="text-align:center;">Tahun</th>
															<th style="text-align:center;">Tempat</th>
															<th style="text-align:center;">Penyelenggara</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from kursus_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[nama_kursus]"; ?></td>
                                                        <td><?php echo" $ks[periode_awal]"; ?>-<?php echo" $ks[periode_akhir]"; ?></td>
														<td><?php echo" $ks[jam]"; ?></td>
														<td><?php echo" $ks[hari]"; ?></td>
														<td><?php echo" $ks[bulan]"; ?></td>
														<td><?php echo" $ks[tahun]"; ?></td>
														<td><?php echo" $ks[tempat]"; ?></td>
														<td><?php echo" $ks[penyelenggara]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
									  </div>
                                    <div class="tab-pane" id="tabpekerjaan">
									<div class="card-header">
									<h3 class="card-title">Riwayat Kepangkatan Golongan Ruang</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pangkatpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pangkatpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pangkatpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">jenis sk</th>  
                                                            <th style="text-align:center;">pangkat</th>
															<th style="text-align:center;">gol ruang</th>
															<th style="text-align:center;">no sk</th>
															<th style="text-align:center;">tgl sk</th>
															<th style="text-align:center;">tmt sk</th>
															<th style="text-align:center;">gaji pokok</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pekerjaan_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[jenis_sk]"; ?></td>
                                                        <td><?php echo" $ks[pangkat]"; ?></td>
														<td><?php echo" $ks[gol_ruang]"; ?></td>
														<td><?php echo" $ks[no_sk]"; ?></td>
														<td><?php echo" $ks[tgl_sk]"; ?></td>
														<td><?php echo" $ks[tmt_sk]"; ?></td>
														<td><?php echo" $ks[gaji_pokok]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
                                      
									<div class="card-header">
									<h3 class="card-title">Pengalaman Jabatan/Pekerjaan Pegawai</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pengalamanjab();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pengalamanjab();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pengalamanjab();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Keterangan Jabatan</th>  
                                                            <th style="text-align:center;">TMT</th>
															<th style="text-align:center;">Gol/Ruang</th>
															<th style="text-align:center;">Pak</th>
															<th style="text-align:center;">tunjangan</th>
															<th style="text-align:center;">Surat Keputusan</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pengalaman_jabatan WHERE nip_baru = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[ktrg_jabatan]"; ?></td>
                                                        <td><?php echo" $ks[tmt]"; ?></td>
														<td><?php echo" $ks[gol_ruang]"; ?></td>
														<td><?php echo" $ks[pak]"; ?></td>
														<td><?php echo" $ks[tunjangan]"; ?></td>
														<td><?php echo" $ks[surat_keputusan]"; ?></td>
														
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
									</div>
                                    <div class="tab-pane" id="tabjasa">
									
									<div class="card-header">
									<h3 class="card-title">Data Penghargaan</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_jasapeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_jasapeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_jasapeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama penghargaan</th>  
                                                            <th style="text-align:center;">Tahun</th>
															<th style="text-align:center;">nama pemberi</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from penghargaan_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[nama_penghargaan]"; ?></td>
                                                        <td><?php echo" $ks[tahun_perolehan]"; ?></td>
														<td><?php echo" $ks[nama_pemberi]"; ?></td>
														
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
									
									</div>
                                    <div class="tab-pane" id="tabpengalaman">
									
									<div class="card-header">
									<h3 class="card-title">Pengalaman Kunjungan Keluar Negeri</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_luarnegeripeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_luarnegeripeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_luarnegeripeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example8">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">Negara</th>  
															 <th style="text-align:center;">Tahun</th>
                                                            <th style="text-align:center;">Lamanya</th>
															<th style="text-align:center;">Yang Membiayai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pengalaman_luarnegeri WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[negara]"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
														<td><?php echo" $ks[lama]"; ?></td>
														<td><?php echo" $ks[pembiaya]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Pengalaman Mengajar</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pengalaman_ngajar();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pengalaman_ngajar();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pengalaman_ngajar();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example9">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">mata kuliah</th>  
															 <th style="text-align:center;">jenjang</th>
                                                            <th style="text-align:center;">prodi</th>
															<th style="text-align:center;">Periode</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pengalaman_ngajar WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[matakuliah]"; ?></td>
                                                        <td><?php echo" $ks[jenjang]"; ?></td>
														<td><?php echo" $ks[prodi]"; ?></td>
														<td><?php echo" $ks[periode_awal]"; ?>-<?php echo" $ks[periode_akhir]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Pengalaman Konferensi/Seminar/Lokakarya/Simposium</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pengalaman_seminar();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pengalaman_seminar();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pengalaman_seminar();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example10">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">tahun</th>  
															 <th style="text-align:center;">nama kegiatan</th>
                                                            <th style="text-align:center;">penyelenggara</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pengalaman_seminar WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
                                                        <td><?php echo" $ks[namakegiatan]"; ?></td>
														<td><?php echo" $ks[penyelenggara]"; ?></td>
														
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Kegiatan Profesional/Pengabdian Pada Masyarakat</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pengalaman_pengabdian();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pengalaman_pengabdian();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pengalaman_pengabdian();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example10">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">tahun</th>  
															 <th style="text-align:center;">nama kegiatan</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pengalaman_pengabdian WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
                                                        <td><?php echo" $ks[namakegiatan]"; ?></td>
														
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Pengalaman Membimbing Mahasiswa</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pengalaman_pembimbing();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pengalaman_pembimbing();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pengalaman_pembimbing();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example11">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">tahun</th>  
															<th style="text-align:center;">Pembimbing/Pembinaan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from pengalaman_pembimbing WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
                                                        <td><?php echo" $ks[pembimbing]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									</div>
                                    
									<div class="tab-pane" id="tabkel">
									<div class="card-header">
									<h3 class="card-title">Data Istri/Suami</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_pasanganpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_pasanganpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_pasanganpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example5">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama</th>  
                                                            <th style="text-align:center;">tempat lahir</th>
															<th style="text-align:center;">tanggal lahir</th>
															<th style="text-align:center;">tanggal nikah</th>
															<th style="text-align:center;">pekerjaan</th>
															<th style="text-align:center;">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from istri_suami_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[nama]"; ?></td>
                                                        <td><?php echo" $ks[tmpt_lahir]"; ?></td>
														<td><?php echo" $ks[tgl_lahir]"; ?></td>
														<td><?php echo" $ks[tgl_nikah]"; ?></td>
														<td><?php echo" $ks[pekerjaan]"; ?></td>
														<td><?php echo" $ks[keterangan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Data Anak</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_anakpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_anakpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_anakpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example6">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama</th>  
															 <th style="text-align:center;">jenis kelamin</th>
                                                            <th style="text-align:center;">tempat lahir</th>
															<th style="text-align:center;">tanggal lahir</th>
															<th style="text-align:center;">status</th>
															<th style="text-align:center;">pekerjaan</th>
															<th style="text-align:center;">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from anak_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[namaanak]"; ?></td>
                                                        <td><?php echo" $ks[jenis_kelamin]"; ?></td>
														<td><?php echo" $ks[tmpt_lahir]"; ?></td>
														<td><?php echo" $ks[tgl_lahir]"; ?></td>
														<td><?php echo" $ks[status]"; ?></td>
														<td><?php echo" $ks[pekerjaan]"; ?></td>
														<td><?php echo" $ks[keterangan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
									
									<div class="card-header">
									<h3 class="card-title">Data Bapak/Ibu Kandung</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_orangtuapeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_orangtuapeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_orangtuapeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example7">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama</th>  
															 <th style="text-align:center;">jenis kelamin</th>
                                                            <th style="text-align:center;">tempat lahir</th>
															<th style="text-align:center;">tanggal lahir</th>
															<th style="text-align:center;">status</th>
															<th style="text-align:center;">pekerjaan</th>
															<th style="text-align:center;">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from orangtua_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[namaorangtua]"; ?></td>
                                                        <td><?php echo" $ks[jenis_kelamin]"; ?></td>
														<td><?php echo" $ks[tmpt_lahir]"; ?></td>
														<td><?php echo" $ks[tgl_lahir]"; ?></td>
														<td><?php echo" $ks[status]"; ?></td>
														<td><?php echo" $ks[pekerjaan]"; ?></td>
														<td><?php echo" $ks[keterangan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Data Bapak/Ibu Mertua</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_mertuapeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_mertuapeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_mertuapeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example7">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama</th>  
															 <th style="text-align:center;">jenis kelamin</th>
                                                            <th style="text-align:center;">tempat lahir</th>
															<th style="text-align:center;">tanggal lahir</th>
															<th style="text-align:center;">status</th>
															<th style="text-align:center;">pekerjaan</th>
															<th style="text-align:center;">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from mertua_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[namamertua]"; ?></td>
                                                        <td><?php echo" $ks[jenis_kelamin]"; ?></td>
														<td><?php echo" $ks[tmpt_lahir]"; ?></td>
														<td><?php echo" $ks[tgl_lahir]"; ?></td>
														<td><?php echo" $ks[status]"; ?></td>
														<td><?php echo" $ks[pekerjaan]"; ?></td>
														<td><?php echo" $ks[keterangan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
									
									</div>
                                    <div class="tab-pane" id="taborganisasi">
									
									<div class="card-header">
									<h3 class="card-title">Semasa Mengikuti Pendidikan Pada SLTA ke Bawah</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_organisasi_smapeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_organisasi_smapeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_organisasi_smapeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example11">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama organisasi</th>  
															<th style="text-align:center;">kedudukan</th>
															<th style="text-align:center;">Periode</th>
															<th style="text-align:center;">tempat</th>
															<th style="text-align:center;">nama pimpinan</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from organisasi_sma_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[nama_organisasi]"; ?></td>
                                                        <td><?php echo" $ks[kedudukan]"; ?></td>
														<td><?php echo" $ks[periode_awal]"; ?>-<?php echo" $ks[periode_akhir]"; ?></td>
														<td><?php echo" $ks[tempat]"; ?></td>
														<td><?php echo" $ks[nama_pimpinan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Semasa Mengikuti Pendidikan Pada Perguruan Tinggi</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_organisasi_kuliahpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_organisasi_kuliahpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_organisasi_kuliahpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example12">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama organisasi</th>  
															<th style="text-align:center;">kedudukan</th>
															<th style="text-align:center;">Periode</th>
															<th style="text-align:center;">tempat</th>
															<th style="text-align:center;">nama pimpinan</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from organisasi_kuliah_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[nama_organisasi]"; ?></td>
                                                        <td><?php echo" $ks[kedudukan]"; ?></td>
														<td><?php echo" $ks[periode_awal]"; ?>-<?php echo" $ks[periode_akhir]"; ?></td>
														<td><?php echo" $ks[tempat]"; ?></td>
														<td><?php echo" $ks[nama_pimpinan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Semasa Selesai Pendidikan dan atau Selama Menjadi Pegawai</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_organisasi_peg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_organisasi_peg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_organisasi_peg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example13">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">nama organisasi</th>  
															<th style="text-align:center;">kedudukan</th>
															<th style="text-align:center;">Periode</th>
															<th style="text-align:center;">tempat</th>
															<th style="text-align:center;">nama pimpinan</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from organisasi_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[nama_organisasi]"; ?></td>
                                                        <td><?php echo" $ks[kedudukan]"; ?></td>
														<td><?php echo" $ks[periode_awal]"; ?>-<?php echo" $ks[periode_akhir]"; ?></td>
														<td><?php echo" $ks[tempat]"; ?></td>
														<td><?php echo" $ks[nama_pimpinan]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									</div>
                                    <div class="tab-pane" id="tabpenelitian">
									
									<div class="card-header">
									<h3 class="card-title">Pengalaman Penelitian</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_penelitianpeg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_penelitianpeg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_penelitianpeg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example14">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">tahun</th>  
															<th style="text-align:center;">judul penelitian</th>
															<th style="text-align:center;">jabatan</th>
															<th style="text-align:center;">sumber dana</th>
															
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from penelitian_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
                                                        <td><?php echo" $ks[judul_penelitian]"; ?></td>
														<td><?php echo" $ks[jabatan]"; ?></td>
														<td><?php echo" $ks[sumber_dana]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									<div class="card-header">
									<h3 class="card-title">Pengalaman Karya Tulis (a) Buku/Bab/Jurnal</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_karyailmiah_a_peg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_karyailmiah_a_peg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_karyailmiah_a_peg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example15">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">tahun</th>  
															<th style="text-align:center;">judul penelitian</th>
															<th style="text-align:center;">penyelenggara</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from karyailmiah_a_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
                                                        <td><?php echo" $ks[judul_penelitian]"; ?></td>
														<td><?php echo" $ks[penyelenggara]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
										  <div class="card-header">
									<h3 class="card-title">Pengalaman Karya Tulis (b) Makalah/Poster</h3>
									</div>
									<button class="btn btn-primary bg-primary-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Tambah"  onClick="tambah_records_karyailmiah_b_peg();" ><i class="fa fa-save"></i> Tambah</button> 
										
										<button class="btn btn-success bg-success-gradient mt-3 btn-pill"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="edit_records_karyailmiah_b_peg();" ><i class="fa fa-edit"></i> Edit</button> 
										
										<button class="btn btn-danger bg-danger-gradient mt-3 btn-pill" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_karyailmiah_b_peg();" ><i class="fa fa-remove"></i> Hapus </button>
										
										<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="example16">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>No.</th>
                                                            <th style="text-align:center;">tahun</th>  
															<th style="text-align:center;">judul penelitian</th>
															<th style="text-align:center;">penyelenggara</th>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $no = 1;
                                                            $aks =mysqli_query($koneksi,"select * from karyailmiah_b_peg WHERE nip = '$r[nip_baru]'");
                                                            while ($ks=mysqli_fetch_array($aks)){       
                                                        ?>
                                                        <tr>
                                                        <td style='text-align:center'>
                                                        <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ks['id'];?>"/>
                                                        </td> 
                                                        <td><?php echo" $no"; ?></td>
                                                        <td><?php echo" $ks[tahun]"; ?></td>
                                                        <td><?php echo" $ks[judul_penelitian]"; ?></td>
														<td><?php echo" $ks[penyelenggara]"; ?></td>
                                                        </tr>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?> 
                                                    </tbody>
                                                </table>
                                            </div>
										  </div>
										  
									</div>
                                    <div class="tab-pane" id="tabdisiplin"></div>
                                    <div class="tab-pane" id="tabkgb"></div>
                                    <div class="tab-pane" id="tabskp"></div>
                                    <div class="tab-pane" id="tabcltn"></div>
                                    <div class="tab-pane" id="tablain"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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