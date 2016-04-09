<?php
include('dbConnect.php');

switch($whichQuery) {
case 'searchPageResults':
	$smartSearchParameter = $_POST['smartSearch'];
	//Get user ID.
	$query = "SELECT user_id FROM metaTest WHERE meta_value LIKE '%$smartSearchParameter%'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute first query.");
	$idArray = [];
		while ($row = mysqli_fetch_array($result)) {
			extract ($row);
			array_push($idArray, $user_id);
		}
	if (!EMPTY($idArray)) {
	//converts id's back to a string suitable for use in a query
	$idLookupString = implode(",", $idArray);
	//Get all associated info matching user ID.
	$query2 = "SELECT meta_value FROM metaTest WHERE meta_key IN ('first_name', 'last_name', 'city') = user_id IN ($idLookupString)";
	$result2 = mysqli_query($conn,$query2) or die ("<br />Could not execute second query.");
	$resultCount = mysqli_num_rows($result2);
	$searchData = [];
		while ($row = mysqli_fetch_array($result2)) {
			extract ($row);
			array_push($searchData, $meta_value);
		}
		displaySearchResults($searchData, $resultCount, $idArray);
		cleanup($result, $result2, $idArray, $idLookupString, $searchData);
	} else {
		echo "<p class=\"resultCountIndexPage\">Your search returned no results.</p>";
	}	
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
	cleanup($result, $result2, $idArray, $idLookupString);
break;
}

function cleanup($result, $result2, $idArray, $idLookupString, $searchData) {
	if (isset($idArray, $idLookupString)) { unset($idArray, $idLookupString, $searchData); }
	mysqli_free_result($result);
	mysqli_free_result($result2);	
	if (isset($conn)) { mysqli_close($conn); };
} // end cleanupScripts()

?>