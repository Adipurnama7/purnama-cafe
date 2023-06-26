<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "purnacoffe";

$con = mysqli_connect($host,$username,$password,$db);

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}


function query($query) {
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}

?>
