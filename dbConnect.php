<?php
@define("SERVERNAME", "localhost");
@define("USERNAME", "root");
@define("PASSWORD", "kissaliv");
@define("DATABASE", "tgcf");
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
	if (!$conn) {
		die("Uh-oh, the connection failed. That wansn't supposed to happen! Please email: tom@buymeataco.com and let me know. Thanks!" . mysqli_connect_error());
	}
?>
