<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data agen</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 90 dibawah
				$IDAGENTACCOUNT = $_GET['IDAGENTACCOUNT']; // ambil nilai IDAGENTACCOUNT
				$cek = mysqli_query($koneksi, "SELECT * FROM Masterlistams WHERE IDAGENTACCOUNT='$IDAGENTACCOUNT'"); // query untuk memilih entri dengan IDAGENTACCOUNT yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri IDAGENTACCOUNT yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri IDAGENTACCOUNT yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM Masterlistams WHERE IDAGENTACCOUNT='$IDAGENTACCOUNT'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan status -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data agen</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="done" <?php if($filter == 'done'){ echo 'selected'; } ?>>done</option>
						<option value="notdone" <?php if($filter == 'notdone'){ echo 'selected'; } ?>>notdone</option>
                        <option value="null" <?php if($filter == 'null'){ echo 'selected'; } ?>>null</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Id Agen Acc</th>
						<th>Nama Kios</th>
						<th>Tanggal Verifikasi</th>
						<th>BRANCH</th>
						<th>Id Card Type</th>
						<th>Check by</th>
						<th>Documen Status</th>
						<th>Status Verifikasi</th>
						<th>Tools</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM Masterlistams WHERE status='$filter' ORDER BY IDAGENTACCOUNT ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM Masterlistams ORDER BY IDAGENTACCOUNT ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['IDAGENTACCOUNT'].'</td>
								<td><a href="profile.php?IDAGENTACCOUNT='.$row['IDAGENTACCOUNT'].'">'.$row['NAMAKIOS'].'</a></td>
								<td>'.$row['TANGGALVERIFICATINAMS'].'</td>
								<td>'.$row['BRANCH'].'</td>
								<td>'.$row['IDCARDTYPE'].'</td>
								<td>'.$row['CHECKBY'].'</td>
								<td>'.$row['DOCUMENTSTATUS'].'</td>
								<td>'.$row['STATUSVERIFICATIONAMS'].'</td>
								
								<td>
									
									<a href="edit.php?IDAGENTACCOUNT='.$row['IDAGENTACCOUNT'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="index.php?aksi=delete&IDAGENTACCOUNT='.$row['IDAGENTACCOUNT'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['NAMAKIOS'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>