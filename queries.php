<?php
include ('dbConnect.php');

switch($whichQuery) {
case 'searchPageResults':
	$smartSearchParameter = $_POST['smartSearch'];
	$query = "SELECT * FROM members WHERE last LIKE '%$smartSearchParameter%' ORDER BY first ASC";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute a query, please see system administrator.");
	$resultCount = mysqli_num_rows($result);
		if ($resultCount >= 1) {
			displaySearchResults($result, $resultCount);
		} else {
			echo "<p class=\"resultCount\">Your search returned no results.</p>";
		}
	cleanupScripts($result);
break;
case 'memberDetails':
	$profileSearchParameter = $_GET["id"];
	$query = "SELECT * FROM members WHERE id = '$profileSearchParameter'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute a query, please see system administrator.");
	$resultCount = mysqli_num_rows($result);
		if ($resultCount >= 1) {
			displaySearchResults($result, $resultCount);
		} else {
			echo "<p class=\"resultCount\">OOPS! This wasn't supposed to happen! Please see system administrator.</p>";
		}
	cleanupScripts($result);
break;
}

	function cleanupScripts($result) {
		mysqli_free_result($result);
		if (isset($conn)) { mysqli_close($conn); };
	}
?>