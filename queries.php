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
	//$idLookupString = implode(",", $idArray);
	$userMetaValues = [];
	$userMetaKeys = [];
	$combinedKeyValuePairs = [];
	//Get all associated info matching user ID.
	foreach ($idArray as $value) {
		$nestedMetaValues = [];
		$nestedKeys = [];		
		$query2 = "SELECT meta_value FROM metaTest WHERE meta_key IN ('first_name','last_name','employer','title') AND user_id = '$value'";
		$result2 = mysqli_query($conn,$query2) or die ("<br />Could not execute second query.");	
			while ($row2 = mysqli_fetch_array($result2)) {
				extract ($row2);
					array_push($nestedMetaValues, $row2[0]);
			} //while

	//Get all associated meta keys for user info.
		foreach ($nestedMetaValues as $value2) {
			$query3 = "SELECT meta_key FROM metaTest WHERE user_id = '$value' AND meta_value = '$value2'";
			$result3 = mysqli_query($conn,$query3) or die ("<br />Could not execute third query.");
				while ($row3 = mysqli_fetch_array($result3)) {
					extract($row3);
					array_push($nestedKeys, $row3[0]);
				} //while
		} //foreach
		array_push($userMetaValues, $nestedMetaValues);
		array_push($userMetaKeys, $nestedKeys);
	} //foreach			

	foreach ($userMetaValues as $value4) {
			foreach ($userMetaKeys as $values5) {
				$combinedArrays = array_combine($values5, $value4);
			}
		array_push($combinedKeyValuePairs, $combinedArrays);	
	}		

	displaySearchResults($combinedKeyValuePairs);
	cleanup($result, $result2, $result3, $idArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues);
	} else {
		echo "<p class=\"resultCountIndexPage\">Your search returned no results.</p>";
	}
break;

case 'memberDetails':
	$profileSearchParameter = $_GET["id"];
}

function cleanup($result, $result2, $result3, $idArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues) {
	if (isset($idArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues)) {unset($idArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues); }
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_free_result($result3);	
	
	if (isset($conn)) {mysqli_close($conn); };
} // end cleanupScripts()

?>
