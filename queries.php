<?php
include('dbConnect.php');

if (!isset($whichQuery)) {
	$whichQuery = $_GET['query'];
}

switch($whichQuery) {
case 'searchPageResults':
$smartSearchParameter = $_POST['smartSearch'];

//Get user ID.
function getUserID($smartSearchParameter, $conn) {
	$query = "SELECT user_id FROM metaTest WHERE meta_value LIKE '%$smartSearchParameter%'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (1).");
	$idArray = [];
	$scrubbedIdArray = [];
	$scrubbedKeyArray = [];
	$acceptableKeys = ['first_name', 'Middle', 'last_name', 'billing_company', 'title'];
	while ($row = mysqli_fetch_array($result)) {
		extract ($row);
		array_push($idArray, $user_id);
	}
	foreach ($idArray as $checkValue) {
		if (!in_array($checkValue, $scrubbedIdArray)) {
			array_push($scrubbedIdArray, $checkValue);
		}	
	}
	return array($scrubbedIdArray, $acceptableKeys);
}
$userID = getUserID($smartSearchParameter, $conn);

//Get all associated info and meta_keys for matching user ID. Combines separate arrays & deletes empty pockets.			
function getMemberDetails($scrubbedIdArray, $acceptableKeys, $conn) {
	if (!empty($scrubbedIdArray)) {

		$userMetaValues = [];
		$userMetaKeys = [];
		$nestedMetaValues = [];
		$nestedKeys = [];	
		$combinedKeyValuePairs = [];

		foreach ($scrubbedIdArray as $value) {
			$query = "SELECT meta_value FROM metaTest WHERE meta_key IN ('first_name','Middle','last_name','billing_company','title') AND user_id = '$value'";
			$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (2).");	
			while ($row = mysqli_fetch_array($result)) {
				extract ($row);
					array_push($nestedMetaValues, $row[0]);
			}
		}

		foreach ($nestedMetaValues as $value2) {
			$query2 = "SELECT meta_key FROM metaTest WHERE user_id = '$value' AND meta_value = '$value2'";
			$result2 = mysqli_query($conn,$query2) or die ("<p class=\"resultCountIndexPage\">Your search returned no results (3).</p>");
				while ($row2 = mysqli_fetch_array($result2)) {
					extract($row2);
							if (in_array($row2[0], $acceptableKeys)) {
									array_push($nestedKeys, $row2[0]);
							}	
				}
		}

	array_push($userMetaKeys, $nestedKeys);
	array_push($userMetaValues, $nestedMetaValues);	

	$lengthOfArray = count((array_keys($userMetaKeys)), COUNT_RECURSIVE);
	$i=0;

		while ($lengthOfArray > $i) {
				@$combinedArrays = array_combine($userMetaKeys[$i], $userMetaValues[$i]);
					if (!empty($combinedArrays)) {
						array_push($combinedKeyValuePairs, $combinedArrays);
					}
			$i++;	
		}
	}
	return array(@$combinedKeyValuePairs, $scrubbedIdArray);
}
$memberDetails = getMemberDetails($userID[0], $userID[1], $conn);

displaySearchResults($memberDetails[0], $memberDetails[1]);

break;
case 'memberDetails':
$lookupUserId = $_GET["id"];

//Halts script if no user specified
function checkLookupID($lookupUserId) {
	if (empty($lookupUserId) || !is_numeric($lookupUserId)) {
		echo "<p class=\"error\">No user ID or non-numeric ID in query string.</p>";
		echo "<br />";
		return;
	}
}
checkLookupID($lookupUserId);

//Returns meta_values in a nested array.
function nestedMetaValues($lookupUserId, $conn) {	
	$nestedMetaValues = [];
	$query = "SELECT meta_value FROM metaTest WHERE meta_key IN ('gender','first_name', 'Middle', 'last_name', 'nickname', 'title', 'billing_company', 'billing_phone', 'moble-phone', 'Fax', 'home', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'Email', 'addl_email', 'role', 'recruited_by', 'members_code', 'chapter', 'Territory', 'date_i18n', 'groups', 'lead_source', 'assistant', 'assistant_email', 'assistant_phone', 'depart_size', 'industry', 'remarks') AND user_id = '$lookupUserId'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (2).");	
	while ($row = mysqli_fetch_array($result)) {
		extract ($row);
			array_push($nestedMetaValues, addslashes($row[0]));
	}
	return $nestedMetaValues;
}
$nestedMetaValues = nestedMetaValues($lookupUserId, $conn);

//Get all associated meta keys for user info.
function getUserKeys($nestedMetaValues, $conn, $lookupUserId) {
	$nestedKeys = [];
	$userMetaKeys = [];
	$userMetaValues = [];	
	foreach ($nestedMetaValues as $value) {
		$i=0;
		$query = "SELECT meta_key FROM metaTest WHERE user_id = '$lookupUserId' AND meta_value = '$value'";
		$result = mysqli_query($conn,$query) or die ("<p class=\"resultCountIndexPage\">Your search returned 0 result(s) (5).</p>");
			while ($row = mysqli_fetch_array($result)) {
				extract($row);
					if (!empty($row[$i])) {
						array_push($nestedKeys, $row[$i]);
					} else {
						echo "<p class=\"resultCountIndexPage\">Your search returned 0 result(s) (5).</p>";
					} 	
				$i++;		
			}
	}
	array_push($userMetaKeys, $nestedKeys);
	array_push($userMetaValues, $nestedMetaValues);
	return array($userMetaKeys, $userMetaValues);
}
$getUserKeysAndValues = getUserKeys($nestedMetaValues, $conn, $lookupUserId);

//Combines separate arrays & deletes empty pockets.
function combineDataArrays($userMetaKeys, $userMetaValues) {
	$i=0;
	$individualMemberData = [];
	$lengthOfArray = count((array_values($userMetaKeys)), COUNT_RECURSIVE);
		while ($lengthOfArray > $i) {
			@$combinedArrays = array_combine($userMetaKeys[$i], $userMetaValues[$i]);
				if (!empty($combinedArrays)) {
					array_push($individualMemberData, $combinedArrays);
				} 
			$i++;	
		}
		return $individualMemberData;
}
$combineDataArrays = combineDataArrays($getUserKeysAndValues[0], $getUserKeysAndValues[1]);

break;
case 'updateMember':
$whichMember = $_GET['id'];

//predefined application meta keys
$applicationMetaKeys = array('gender','first_name', 'Middle', 'last_name', 'nickname', 'title', 'billing_company', 'billing_phone', 'moble-phone', 'Fax', 'home', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'Email', 'addl_email', 'role', 'recruited_by', 'members_code', 'chapter', 'Territory', 'date_i18n', 'groups', 'depart_size', 'lead_source', 'assistant', 'assistant_email', 'assistant_phone', 'industry', 'remarks');

	//Returns an array of user submitted form values.
	function userSubmittedFormValues() {
		$submittedFormValues = [];
		foreach ($_POST as $value) {
			if (isset($value)) {
				array_push($submittedFormValues, $value);
			}			
		}
		return $submittedFormValues;
	}
	$userFormValues = userSubmittedFormValues();

	//Combines predefined application meta keys with user submitted form values into an array.
	function combineFormValuesWithAppKeys($applicationMetaKeys, $userFormValues) {
		@$combinedKeysAndSubmittedValues = array_combine($applicationMetaKeys, $userFormValues);
		return $combinedKeysAndSubmittedValues;	
	}
	$alphaFormArray = combineFormValuesWithAppKeys($applicationMetaKeys, $userFormValues);

	//Pulls all existing meta_keys from the specified user.
	function getExistingMetaKeys($whichMember, $conn) {
		$existingMetaKeysArray = [];
		$query = "SELECT DISTINCT meta_key FROM metaTest WHERE user_id = '$whichMember'";
		$result = mysqli_query($conn,$query) or die ("<p class=\"resultCountIndexPage\">Your search returned 0 result(s) (6).</p>");
			while ($row = mysqli_fetch_array($result)) {
				extract($row);			
					array_push($existingMetaKeysArray, $row[0]);
			}
			return $existingMetaKeysArray;
	}
	$existingMetaKeys = getExistingMetaKeys($whichMember, $conn);

	//Separates keys/value pairs into inserts vs. updates and returns them in a multi-d array.
	function decideWhichQuery($existingMetaKeys, $applicationMetaKeys) {
		$insertArray = [];
		$updateArray = [];			
		foreach ($applicationMetaKeys as $value) {
			if(in_array($value, $existingMetaKeys)) {
				array_push($updateArray, $value);
			} else {
				array_push($insertArray, $value);
			}
		}
		return array($insertArray, $updateArray);
	}
	$queryArrays = (decideWhichQuery($existingMetaKeys, $applicationMetaKeys));

	//Using the $queryArrays multi-d array, separates $alphaFormArray into inserts and updates arrays.
	function insertUpdateQueries($queryArrays, $alphaFormArray, $whichMember, $conn) {

	//Generates insert vs. update query arrays.
	function setupEachQueryArray($queryArrays, $alphaFormArray) {

			$insertQueryArray = [];
			$updateQueryArray = [];
			foreach ($queryArrays[0] as $value) {
				if ($alphaFormArray[$value] != NULL && $alphaFormArray[$value] != 'Choose One') {
					$pocketTemp = $value . ".: " . $alphaFormArray[$value];	
					array_push($insertQueryArray, explode(".: ",  $pocketTemp));
				}
			}
			foreach ($queryArrays[1] as $value2) {
				if ($alphaFormArray[$value2] != 'Choose One') {
					$pocketTemp2 = $value2 . ".: " . $alphaFormArray[$value2];	
					array_push($updateQueryArray, explode(".: ",  $pocketTemp2));
				}
			}
			return array($insertQueryArray, $updateQueryArray);
	}
	$querySetupArray = setupEachQueryArray($queryArrays, $alphaFormArray);

	//Separates querySetupArray into 2 strings (meta_key & meta_value) suitable for a MySQL query.
	function insertQueries($querySetupArray) {
		$insertKeysArray = [];
		$insertValuesArray = [];

		foreach ($querySetupArray as $value) {
			array_push($insertKeysArray, $value[0]);
		}

		foreach ($querySetupArray as $value) {
			array_push($insertValuesArray, $value[1]);
		}
		return array($insertKeysArray, $insertValuesArray);
	}			
	$resultInsertArray = insertQueries($querySetupArray[0]);

	//Inserts meta_keys, then updates their correspodning values, all from insertQueries().
	function insertKeysAndValues($resultInsertArray, $whichMember, $conn) {
		$i=0;
		foreach ($resultInsertArray[0] as $value[0]) {
			$query1 = "INSERT INTO metaTest (meta_key, user_id) VALUES ('$value[0]', '$whichMember')";
			$result = mysqli_query($conn,$query1) or die ("<br /><br />Could not execute query (7).");
			$conCatVar = $resultInsertArray[1]["$i"];
			$query2 = "UPDATE metaTest SET meta_value='$conCatVar' WHERE meta_key='$value[0]' AND user_id = '$whichMember'";
			$result2 = mysqli_query($conn,$query2) or die ("<br /><br />Could not execute query (8).");	
			$i++;			
		}
	}
	insertKeysAndValues($resultInsertArray, $whichMember, $conn);

	//Separates querySetupArray.
	function updateQueries($querySetupArray) {
		$updateKeysArray = [];
		$updateValuesArray = [];

		foreach ($querySetupArray as $value) {
			array_push($updateKeysArray, $value[0]);
		}

		foreach ($querySetupArray as $value) {
			array_push($updateValuesArray, $value[1]);
		}
		return array($updateKeysArray, $updateValuesArray);
	}			
	$resultUpdateArray = updateQueries($querySetupArray[1]);

	//Updates meta_keys, then updates their correspodning values from resultUpdateArray().
	function updateKeysAndValues($resultUpdateArray, $whichMember, $conn) {
		$combinedUpdateKeysAndValues = array_combine($resultUpdateArray[0], $resultUpdateArray[1]);

		foreach ($combinedUpdateKeysAndValues as $key => $value) {
			$escapedString = mysqli_real_escape_string($conn, $value);

			$query = "UPDATE metaTest SET meta_value = '$escapedString' WHERE meta_key = '$key' AND user_id = '$whichMember'";
			$result = mysqli_query($conn,$query) or die ("<br /><br />Could not execute query (9).");
		}
		header("Location: http://tgcf/memberDetails.php?id=$whichMember");
	}
	updateKeysAndValues($resultUpdateArray, $whichMember, $conn);

} //insertUpdateQueries()
	insertUpdateQueries($queryArrays, $alphaFormArray, $whichMember, $conn);
break;
} //end case switch

if (isset($idArray, $scrubbedIdArray, $scrubbedKeyArray, $acceptableKeys, $userMetaValues, $userMetaKeys, $combinedKeyValuePairs, $nestedMetaValues, $nestedKeys, $individualMemberData, $combinedArrays, $submittedFormValues, $combinedKeysAndSubmittedValues, $existingMetaKeysArray, $insertArray, $updateArray, $insertQueryArray, $updateQueryArray, $insertKeysArray, $insertValuesArray, $updateKeysArray, $updateValuesArray, $combinedUpdateKeysAndValues, $comboUpdateKeysAndValues)) {
		unset($idArray, $scrubbedIdArray, $scrubbedKeyArray, $acceptableKeys, $userMetaValues, $userMetaKeys, $combinedKeyValuePairs, $nestedMetaValues, $nestedKeys, $individualMemberData, $combinedArrays, $submittedFormValues, $combinedKeysAndSubmittedValues, $existingMetaKeysArray, $insertArray, $updateArray, $insertQueryArray, $updateQueryArray, $insertKeysArray, $insertValuesArray, $updateKeysArray, $updateValuesArray, $combinedUpdateKeysAndValues, $comboUpdateKeysAndValues);
}

if (isset($result)) {mysqli_free_result($result);}
if (isset($result2)) {mysqli_free_result($result);}	
if (isset($conn)) {mysqli_close($conn);}

?>
