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
				$IDAGENTACCOUNT		    = $_POST['IDAGENTACCOUNT'];
				$TANGGALVERIFICATINAMS	= $_POST['TANGGALVERIFICATINAMS'];
				$STATUSVERIFICATIONAMS  = $_POST['STATUSVERIFICATIONAMS'];
				$BRANCH	 				= $_POST['BRANCH'];
				$NAMAKIOS	 			= $_POST['NAMAKIOS'];
				$IDCARD	     			= $_POST['IDCARD'];
				$FORMPENDAFTARAN 		= $_POST['FORMPENDAFTARAN'];
				$BUKTISETORAN			= $_POST['BUKTISETORAN'];
				$BUKTISERAHTERIMAEDC	= $_POST['BUKTISERAHTERIMAEDC'];
				$FOTOLOKASI		 		= $_POST['FOTOLOKASI'];
				$PKSKIOS	        	= $_POST['PKSKIOS'];
				$IDCARDTYPE	        	= $_POST['IDCARDTYPE'];
				$DOMISILIDLL           	= $_POST['DOMISILIDLL'];
				$DOCUMENTSTATUS     	= $_POST['DOCUMENTSTATUS'];
				$CHECKBY       			= $_POST['CHECKBY'];
				$TANGGALACTIVE       	= $_POST['TANGGALACTIVE'];
				$TANGGALCLOSEACCOUNT    = $_POST['TANGGALCLOSEACCOUNT'];
				$NAMAAE        			= $_POST['NAMAAE'];
				$NIKAE         		= $_POST['NIKAE'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM Masterlistams WHERE IDAGENTACCOUNT='$IDAGENTACCOUNT'"); // query untuk memilih entri dengan IDAGENTACCOUNT terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah IDAGENTACCOUNT yang akan ditambahkan tidak ada dalam database
					{ $insert = mysqli_query($koneksi, "INSERT INTO Masterlistams(IDAGENTACCOUNT, TANGGALVERIFICATINAMS, STATUSVERIFICATIONAMS, BRANCH, NAMAKIOS, IDCARD,FORMPENDAFTARAN, BUKTISETORAN, BUKTISERAHTERIMAEDC, FOTOLOKASI, PKSKIOS, IDCARDTYPE, DOMISILIDLL, DOCUMENTSTATUS, CHECKBY, TANGGALACTIVE, TANGGALCLOSEACCOUNT, NAMAAE, NIKAE) 
															VALUES('$IDAGENTACCOUNT','$TANGGALVERIFICATINAMS', '$STATUSVERIFICATIONAMS', '$BRANCH', '$NAMAKIOS', '$IDCARD','$FORMPENDAFTARAN', '$BUKTISETORAN', '$BUKTISERAHTERIMAEDC', '$FOTOLOKASI', '$PKSKIOS', '$IDCARDTYPE', '$DOMISILIDLL', '$DOCUMENTSTATUS', '$CHECKBY', '$TANGGALACTIVE', '$TANGGALCLOSEACCOUNT', '$NAMAAE', '$NIKAE')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data agen Berhasil Di Simpan.</div>'; // maka tampilkan 'Data agen Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data agen Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data agen Gagal Di simpan!'
						}
					} 
				}else{ // mengecek jika IDAGENTACCOUNT yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>IDAGENTACCOUNT Sudah Ada..!</div>'; // maka tampilkan 'IDAGENTACCOUNT Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID AGENT ACCOUNT</label>
					<div class="col-sm-2">
						<input type="text" name="IDAGENTACCOUNT" class="form-control" placeholder="IDAGENTACCOUNT" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL VERIFICATINAMS</label>
					<div class="col-sm-3">
						<input type="text" name="TANGGALVERIFICATINAMS" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS VERIFICATIONAMS</label>
					<div class="col-sm-2">
						<select name="STATUSVERIFICATIONAMS" class="form-control">
							<option value=""> ----- </option>
                            <option value="DONE">DONE</option>
							<option value="Not DONE">Not DONE</option>
							<option value="Null">Null</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">BRANCH</label>
					<div class="col-sm-2">
						<select name="BRANCH" class="form-control">
							<option value=""> ----- </option>
                            <option value="BALI">BALI</option>
							<option value="BALIKPAPAN">BALIKPAPAN</option>
							<option value="BANDUNG">BANDUNG</option>
							<option value="BANTEN">BANTEN</option>
							<option value="JAKARTA">JAKARTA</option>
							<option value="JAKARTA 1">JAKARTA 1</option>
							<option value="JAKARTA 2">JAKARTA 2</option>
							<option value="JAKARTA 3">JAKARTA 3</option>
							<option value="MAKASSAR">MAKASSAR</option>
							<option value="MEDAN">MEDAN</option>
							<option value="PALEMBANG">PALEMBANG</option>
							<option value="SURABAYA">SURABAYA</option>
							<option value="YOGYAKARTA">YOGYAKARTA</option>
							<option value="CORPORATE">CORPORATE</option>
							<option value="COMMERCE">COMMERCE</option>
							<option value="SYARIAH">SYARIAH</option>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA KIOS</label>
					<div class="col-sm-4">
						<input type="text" name="NAMAKIOS" class="form-control" placeholder="Nama Kios" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">IDCARD</label>
					<div class="col-sm-4">
						<input type="text" name="IDCARD" class="form-control" placeholder="id card" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">FORM PENDAFTARAN</label>
					<div class="col-sm-4">
						<input type="text" name="FORMPENDAFTARAN" class="form-control" placeholder="form pendaftaran" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">BUKTI SETORAN</label>
					<div class="col-sm-4">
						<input type="text" name="BUKTISETORAN" class="form-control" placeholder="bukti setoran" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">BUKTI SERAH TERIMA EDC</label>
					<div class="col-sm-4">
						<input type="text" name="BUKTISERAHTERIMAEDC" class="form-control" placeholder="bukti serahterima" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">FOTO LOKASI</label>
					<div class="col-sm-4">
						<input type="text" name="FOTOLOKASI" class="form-control" placeholder="foto lokasi" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PKS KIOS</label>
					<div class="col-sm-4">
						<input type="text" name="PKSKIOS" class="form-control" placeholder="PKS Kios" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ID CARD TYPE</label>
					<div class="col-sm-2">
						<select name="IDCARDTYPE" class="form-control" required>
							<option value=""> ----- </option>
							<option value="KTP">KTP</option>
							<option value="SIM">SIM</option>
							<option value="PASPOR">PASPOR</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">DOMISILIDLL</label>
					<div class="col-sm-2">
						<select name="IDCARDTYPE" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Kartu Keluarga">Kartu Keluarga</option>
							<option value="PBB">PBB</option>
							<option value="SIUP">SIUP</option>
							<option value="Surat Domisili dari RT/RW">Surat Domisili dari RT/RW</option>
							<option value="Lain-lain">Lain-lain</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">DOCUMENT STATUS</label>
					<div class="col-sm-2">
						<select name="DOCUMENTSTATUS" class="form-control" required>
							<option value=""> ----- </option>
							<option value="DONE">DONE</option>
							<option value="NotDONE">Not DONE</option>
							<option value="null">null</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">CHECK BY</label>
					<div class="col-sm-2">
						<select name="CHECKBY" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Agustin Citra Candra">Agustin Citra Candra</option>
							<option value="AldiNugraha">AldiNugraha</option>
							<option value="AngraNurwinsyah">AngraNurwinsyah</option>
							<option value="ArsiliaLestari">ArsiliaLestari</option>
							<option value="AstridRetcitaBilhaq">AstridRetcitaBilhaq</option>
							<option value="DeswitaNataliaBrBangun">DeswitaNataliaBrBangun</option>
							<option value="DwiPujiRahayu">DwiPujiRahayu</option>
							<option value="FadhilYazidElRasyid">FadhilYazidElRasyid</option>
							<option value="FitriParamita">FitriParamita</option>
							<option value="IzzaNurKhoiriyah">IzzaNurKhoiriyah</option>
							<option value="JoanSalha">JoanSalha</option>
							<option value="KaniaLarasati">KaniaLarasati</option>
							<option value="LibriMonicaPricilia">LibriMonicaPricilia</option>
							<option value="LilyHildaNurdin">LilyHildaNurdin</option>
							<option value="LisnaMirnawatiSilitonga">LisnaMirnawatiSilitonga</option>
							<option value="MiatuzZuhro">MiatuzZuhro</option>
							<option value="NoviNurmiaSari">NoviNurmiaSari</option>
							<option value="NurAeni">NurAeni</option>
							<option value="NurtaufikAbdurahman">NurtaufikAbdurahman</option>
							<option value="PutriArumPurwati">PutriArumPurwati</option>
							<option value="PutriRahmawati">PutriRahmawati</option>
							<option value="RakaAdnanRuhussalam">RakaAdnanRuhussalam</option>
							<option value="RianApriyanto">RianApriyanto</option>
							<option value="RudiAndryanto">RudiAndryanto</option>
							<option value="SabrinaFitryanti">SabrinaFitryanti</option>
							<option value="SariDeviaAgustina">SariDeviaAgustina</option>
							<option value="SonjaDewiCahyawati">SonjaDewiCahyawati</option>
							<option value="SuciZahara">SuciZahara</option>
							<option value="SyahlinaAdinda">SyahlinaAdinda</option>
							<option value="TengkuVitaHeswina">TengkuVitaHeswina</option>
							<option value="TetyYuliarti">TetyYuliarti</option>
							<option value="WastiArdiyantiKondoBoroh">WastiArdiyantiKondoBoroh</option>
							<option value="WiwiWidianty">WiwiWidianty</option>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL ACTIVE</label>
					<div class="col-sm-3">
						<input type="text" name="TANGGALACTIVE" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL CLOSE ACCOUNT</label>
					<div class="col-sm-3">
						<input type="text" name="TANGGALCLOSEACCOUNT" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA AE</label>
					<div class="col-sm-4">
						<input type="text" name="NAMAAE" class="form-control" placeholder="nama ae" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK AE</label>
					<div class="col-sm-4">
						<input type="text" name="NIKAE" class="form-control" placeholder="NIK AE" required>
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