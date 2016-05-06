<?php
@define("SERVERNAME", "localhost");
@define("USERNAME", "root");
@define("PASSWORD", "kissaliv");
@define("DATABASE", "996718_tgcff");
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
	if (!$conn) {
		die("Uh-oh, the connection failed." . mysqli_connect_error());
	}
?>
