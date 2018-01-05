<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Agen &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 137 ditekan
				$id_agenacc		    = $_POST['IDAGENTACCOUNT'];
				$tanggalverifikasi	= $_POST['tanggalverifikasi'];
				$statusverifikasi   = $_POST['statusverifikasi'];
				$branch	 			= $_POST['BRANCH'];
				$namakios	 		= $_POST['namakios'];
				$idcard	     		= $_POST['idcard'];
				$formpendaftaran 	= $_POST['formpendaftaran'];
				$buktisetoran		= $_POST['buktisetoran'];
				$buktiserahterima	= $_POST['buktiserahterima'];
				$fotolokasi		 	= $_POST['fotolokasi'];
				$pkskios	        = $_POST['pkskios'];
				$idcardtype	        = $_POST['idcardtype'];
				$domisili           = $_POST['domisili'];
				$documentstatus     = $_POST['documentstatus'];
				$checkby       		= $_POST['checkby'];
				$tanggalaktif       = $_POST['tanggalaktif'];
				$tanggalclose       = $_POST['tanggalclose'];
				$namaae        		= $_POST['namaae'];
				$nikae         		= $_POST['nikae'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM agen WHERE IDAGENTACCOUNT='$id_agenacc'"); // query untuk memilih entri dengan id_agenacc terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah id_agenacc yang akan ditambahkan tidak ada dalam database
					{ $insert = mysqli_query($koneksi, "INSERT INTO agen(IDAGENTACCOUNT, tanggalverifikasi, statusverifikasi, BRANCH, namakios, idcard,formpendaftaran, buktisetoran, buktiserahterima, fotolokasi, pkskios, idcardtype, domisili, documentstatus, checkby, tanggalaktif, tanggalclose, namaae, nikae) 
															VALUES('$id_agenacc','$tanggalverifikasi', '$statusverifikasi', '$branch', '$namakios', '$idcard','$formpendaftaran', '$buktisetoran', '$buktiserahterima', '$fotolokasi', '$pkskios', '$idcardtype', '$domisili', '$documentstatus', '$checkby', '$tanggalaktif', '$tanggalclose', '$namaae', '$nikae')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data agen Berhasil Di Simpan.</div>'; // maka tampilkan 'Data agen Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data agen Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data agen Gagal Di simpan!'
						}
					} 
				}else{ // mengecek jika id_agenacc yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>id_agenacc Sudah Ada..!</div>'; // maka tampilkan 'id_agenacc Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Id Agen Acc</label>
					<div class="col-sm-2">
						<input type="text" name="id_agenacc" class="form-control" placeholder="id_agenacc" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Verifikasi</label>
					<div class="col-sm-3">
						<input type="text" name="tanggalverifikasi" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status Verifikasi</label>
					<div class="col-sm-2">
						<select name="statusverifikasi" class="form-control">
							<option value=""> ----- </option>
                            <option value="Done">Done</option>
							<option value="Not Done">Not Done</option>
							<option value="Null">Null</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Branch</label>
					<div class="col-sm-2">
						<select name="branch" class="form-control">
							<option value=""> ----- </option>
                            <option value="Jakarta1">Jakarta1</option>
							<option value="Jakarta2">Jakarta2</option>
							<option value="Jakarta3">Jakarta3</option>
							<option value="Bandung">Bandung</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Kios</label>
					<div class="col-sm-4">
						<input type="text" name="namakios" class="form-control" placeholder="Nama Kios" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">id card</label>
					<div class="col-sm-4">
						<input type="text" name="idcard" class="form-control" placeholder="id card" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">form pendaftaran</label>
					<div class="col-sm-4">
						<input type="text" name="formpendaftaran" class="form-control" placeholder="form pendaftaran" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">bukti setoran</label>
					<div class="col-sm-4">
						<input type="text" name="buktisetoran" class="form-control" placeholder="bukti setoran" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">bukti serahterima</label>
					<div class="col-sm-4">
						<input type="text" name="buktiserahterima" class="form-control" placeholder="bukti serahterima" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">foto lokasi</label>
					<div class="col-sm-4">
						<input type="text" name="fotolokasi" class="form-control" placeholder="foto lokasi" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PKS Kios</label>
					<div class="col-sm-4">
						<input type="text" name="pkskios" class="form-control" placeholder="PKS Kios" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Id card type</label>
					<div class="col-sm-2">
						<select name="idcardtype" class="form-control" required>
							<option value=""> ----- </option>
							<option value="ktp">ktp</option>
							<option value="Paspor">Paspor</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">domisili</label>
					<div class="col-sm-2">
						<select name="idcardtype" class="form-control" required>
							<option value=""> ----- </option>
							<option value="kk">kk</option>
							<option value="pbb">Pbb</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">document status</label>
					<div class="col-sm-2">
						<select name="documentstatus" class="form-control" required>
							<option value=""> ----- </option>
							<option value="done">done</option>
							<option value="notdone">not done</option>
							<option value="null">null</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">check by</label>
					<div class="col-sm-2">
						<select name="checkby" class="form-control" required>
							<option value=""> ----- </option>
							<option value="saridevia">saridevia</option>
							<option value="kanialarasati">kanialarasati</option>
							<option value="null">null</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal aktif</label>
					<div class="col-sm-3">
						<input type="text" name="tanggalaktif" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal close</label>
					<div class="col-sm-3">
						<input type="text" name="tanggalclose" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">nama ae</label>
					<div class="col-sm-4">
						<input type="text" name="namaae" class="form-control" placeholder="nama ae" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">nik ae</label>
					<div class="col-sm-4">
						<input type="text" name="nikae" class="form-control" placeholder="nik ae" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data agen">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>