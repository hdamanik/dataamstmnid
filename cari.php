<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<?php $IdAcc = $_POST['cariIdAcc']; // mengambil IdAcc dari form cari ?> 
			<h2>Pencarian Data ID Agent Account &raquo; IdAcc: <?php echo $IdAcc; // menampilkan IdAcc ?></h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM Masterlistams WHERE IDAGENTACCOUNT='$IdAcc'"); // query untuk memilih entri dengan IdAcc terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 74 ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM Masterlistams WHERE IDAGENTACCOUNT='$IdAcc'"); // query delete entri dengan IdAcc terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data Masterlistams hasil pencarian-->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">IDAGENTACCOUNT</th>
					<td><?php echo $row['IDAGENTACCOUNT']; ?></td>
				</tr>
				<tr>
					<th>Nama Kios</th>
					<td><?php echo $row['NAMAKIOS']; ?></td>
				</tr>
				<tr>
					<th>Tanggal Verificatin AMS</th>
					<td><?php echo $row['TANGGALVERIFICATINAMS']; ?></td>
				</tr>
				<tr>
					<th>Branch</th>
					<td><?php echo $row['BRANCH']; ?></td>
				</tr>
				<tr>
					<th>Id Card Type</th>
					<td><?php echo $row['IDCARDTYPE']; ?></td>
				</tr>
				<tr>
					<th>Check By</th>
					<td><?php echo $row['CHECKBY']; ?></td>
				</tr>
				<tr>
					<th>Document Status</th>
					<td><?php echo $row['DOCUMENTSTATUS']; ?></td>
				</tr>
				<tr>
					<th>Status Verification AMS</th>
					<td><?php echo $row['STATUSVERIFICATIONAMS']; ?></td>
				</tr>
				
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?IdAcc=<?php echo $row['IDAGENTACCOUNT']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&IdAcc=<?php echo $row['IDAGENTACCOUNT']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['NAMAKIOS']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>