<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Biodata</h2>
			<hr />
			
			<?php
			$id_agenacc = $_GET['id_agenacc']; // mengambil data id_agenacc dari id_agenacc yang terpilih
			
			$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_agenacc='$id_agenacc'"); // query memilih entri id_agenacc pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 75 ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id_agenacc='$id_agenacc'"); // query delete entri dengan id_agenacc terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data karyawan -->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">id agen acc</th>
					<td><?php echo $row['id_agenacc']; ?></td>
				</tr>
				<tr>
					<th>tanggal verifikasi</th>
					<td><?php echo $row['tanggalverifikasi']; ?></td>
				</tr>
				<tr>
					<th>status verifikasi</th>
					<td><?php echo $row['statusverifikasi']; ?></td>
				</tr>
				<tr>
					<th>branch</th>
					<td><?php echo $row['branch'].; ?></td>
				</tr>
				<tr>
					<th>nama kios</th>
					<td><?php echo $row['namakios']; ?></td>
				</tr>
				<tr>
					<th>id card</th>
					<td><?php echo $row['idcard']; ?></td>
				</tr>
				<tr>
					<th>form pendaftaran</th>
					<td><?php echo $row['formpendaftaran']; ?></td>
				</tr>
				<tr>
					<th>bukti setoran</th>
					<td><?php echo $row['buktisetoran']; ?></td>
				</tr>
				<tr>
					<th>bukti serahterima</th>
					<td><?php echo $row['buktiserahterima']; ?></td>
				</tr>
				<tr>
					<th>foto lokasi</th>
					<td><?php echo $row['fotolokasi']; ?></td>
				</tr>
				<tr>
					<th>pks kios</th>
					<td><?php echo $row['pkskios']; ?></td>
				</tr>
				<tr>
					<th>id card type</th>
					<td><?php echo $row['idcardtype']; ?></td>
				</tr>
				<tr>
					<th>domisili</th>
					<td><?php echo $row['domisili']; ?></td>
				</tr>
				<tr>
					<th>document status</th>
					<td><?php echo $row['documentstatus']; ?></td>
				</tr>
				<tr>
					<th>check by</th>
					<td><?php echo $row['checkby']; ?></td>
				</tr>
				<tr>
					<th>tanggal aktif</th>
					<td><?php echo $row['tanggalaktif']; ?></td>
				</tr>
				<tr>
					<th>tanggal close</th>
					<td><?php echo $row['tanggalclose']; ?></td>
				</tr>
				<tr>
					<th>namaae</th>
					<td><?php echo $row['namaae']; ?></td>
				</tr>
				<tr>
					<th>nikae</th>
					<td><?php echo $row['nikae']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?id_agenacc=<?php echo $row['id_agenacc']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&id_agenacc=<?php echo $row['id_agenacc']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>