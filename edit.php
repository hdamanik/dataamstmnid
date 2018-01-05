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
						<select name="TANGGALVERIFICATINAMS" class="form-control" required>
							<input type="text" name="tanggal_lahir" value="<?php echo $row ['TANGGALVERIFICATINAMS']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
							// <option value=""> - TANGGALVERIFICATINAMS - </option>
							// <option value="Laki-Laki">Laki-Laki</option>
							// <option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" value="<?php echo $row ['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal_lahir" value="<?php echo $row ['tanggal_lahir']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">CHECKBY</label>
					<div class="col-sm-3">
						<textarea name="CHECKBY" class="form-control" placeholder="CHECKBY"><?php echo $row ['CHECKBY']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="DOCUMENTSTATUS" value="<?php echo $row ['DOCUMENTSTATUS']; ?>" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUSVERIFICATIONAMS</label>
					<div class="col-sm-2">
						<select name="STATUSVERIFICATIONAMS" class="form-control" required>
							<option value=""> - STATUSVERIFICATIONAMS Terbaru - </option>
							<option value="Helper">Helper</option>
							<option value="Operator">Operator</option>
							<option value="Leader">Leader</option>
							<option value="Staf">Staf</option>
                            <option value="Supervisor">Supervisor</option>
							<option value="Manager">Manager</option>
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