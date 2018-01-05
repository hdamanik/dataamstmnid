<?php

$connectionInfo = array("UID" => "amstmnid@amstmnid", "pwd" => "{uEdBDcce7br29ERjmp6WTtEtTr2iQolfn6ddx1cnuWX5Yk5ma9E7sMuLbfgt}", "Database" => "masterlistams", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:amstmnid.database.windows.net,1433";
$koneksi = sqlsrv_connect($serverName, $connectionInfo);

if(mysqli_connect_error()){ // mengecek apakah koneksi database error
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
}
?>