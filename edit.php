<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data ID Agent &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$IDAGENTACCOUNT = $_GET['IDAGENTACCOUNT']; // assigment IDAGENTACCOUNT dengan nilai IDAGENTACCOUNT yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM Masterlistams WHERE IDAGENTACCOUNT='$IDAGENTACCOUNT'"); // query untuk memilih entri data dengan nilai IDAGENTACCOUNT terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Save' dengan properti name="save" pada baris 135 ditekan
				$IDAGENTACCOUNT		     			= $_POST['IDAGENTACCOUNT'];
				$NAMAKIOS		     		= $_POST['NAMAKIOS'];
				$TANGGALVERIFICATINAMS   	= $_POST['TANGGALVERIFICATINAMS'];
				$BRANCH	 					= $_POST['BRANCH'];
				$IDCARDTYPE	 				= $_POST['IDCARDTYPE'];
				$CHECKBY		     		= $_POST['CHECKBY'];
				$DOCUMENTSTATUS		 		= $_POST['DOCUMENTSTATUS'];
				$STATUSVERIFICATIONAMS		= $_POST['STATUSVERIFICATIONAMS'];
				$status			 			= $_POST['status'];
				
				$update = mysqli_query($koneksi, "UPDATE Masterlistams SET NAMAKIOS='$NAMAKIOS', TANGGALVERIFICATINAMS='$TANGGALVERIFICATINAMS', IDCARDTYPE='$IDCARDTYPE', tanggal_lahir='$tanggal_lahir', CHECKBY='$CHECKBY', DOCUMENTSTATUS='$DOCUMENTSTATUS', STATUSVERIFICATIONAMS='$STATUSVERIFICATIONAMS', status='$status' WHERE IDAGENTACCOUNT='$IDAGENTACCOUNT'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?IDAGENTACCOUNT=".$IDAGENTACCOUNT."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">IDAGENTACCOUNT</label>
					<div class="col-sm-2">
						<input type="text" name="IDAGENTACCOUNT" value="<?php echo $row ['IDAGENTACCOUNT']; ?>" class="form-control" placeholder="IDAGENTACCOUNT" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA KIOS</label>
					<div class="col-sm-4">
						<input type="text" name="NAMAKIOS" value="<?php echo $row ['NAMAKIOS']; ?>" class="form-control" placeholder="NAMAKIOS" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL VERIFICATINAMS</label>
					<div class="col-sm-2">
											
						<input type="text" name="tanggal_lahir" value="<?php echo $row ['TANGGALVERIFICATINAMS']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
							
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">BRANCH</label>
					<div class="col-sm-4">
						<select name="BRANCH" class="form-control" required>
							<option value=""> - BRANCH - </option>
							<option value="JAKARTA 1">JAKARTA 1</option>
							<option value="JAKARTA 2">JAKARTA 2</option>
							<option value="JAKARTA 3">JAKARTA 3</option>
							<option value="BMT">BMT</option>
                            <option value="BANTEN">BANTEN</option>
							<option value="BALIKPAPAN">BALIKPAPAN</option>
							<option value="BANDUNG">BANDUNG</option>
							<option value="MEDAN">MEDAN</option>
							<option value="PALEMBANG">PALEMBANG</option>
							<option value="YOGYAKARTA">YOGYAKARTA</option>
							<option value="SURABAYA">SURABAYA</option>
							<option value="BALI">BALI</option>
							<option value="MAKASSAR">MAKASSAR</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">IDCARD TYPE</label>
					<div class="col-sm-4">
						<select name="BRANCH" class="form-control" required>
							<option value=""> - IDCARDTYPE - </option>
							<option value="KTP">KTP</option>
							<option value="SIM">SIM</option>
							<option value="PASPOR">PASPOR</option>						
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">CHECK BY</label>
					<div class="col-sm-3">
						<select name="BRANCH" class="form-control" required>
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
					<label class="col-sm-3 control-label">DOCUMENTSTATUS</label>
					<div class="col-sm-3">
						<select name="BRANCH" class="form-control" required>
							<option value=""> - DOCUMENTSTATUS - </option>
							<option value="DONE">DONE</option>
							<option value="NotDONE">NotDone</option>						
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUSVERIFICATIONAMS</label>
					<div class="col-sm-2">
						<select name="STATUSVERIFICATIONAMS" class="form-control" required>
							<option value=""> - STATUSVERIFICATIONAMS Terbaru - </option>
							<option value="DONE">DONE</option>
							<option value="NotDONE">NotDone</option>
							
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>STATUSVERIFICATIONAMS Sekarang :</b> <span class="label label-success"><?php echo $row['STATUSVERIFICATIONAMS']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value="">- Status Terbaru -</option>
                            <option value="Outsourcing">Outsourcing</option>
							<option value="Kontrak">Kontrak</option>
							<option value="Tetap">Tetap</option>
						</select> 
					</div>
                    <div class="col-sm-3">
                    <b>Status Sekarang :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
				    </div>
                </div>
				<!--<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php //echo $row['username']; ?>" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" value="<?php //echo $row['password']; ?>" class="form-control" placeholder="Password">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Masterlistams">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>