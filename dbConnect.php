<?php
@define("SERVERNAME", "localhost");
@define("USERNAME", "root");
@define("PASSWORD", "");
@define("DATABASE", "");
//@define("DATABASE", "tgcf");
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
	if (!$conn) {
		die("Uh-oh, the connection failed." . mysqli_connect_error());
	}
?>
