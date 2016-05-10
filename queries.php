<?php
//Written by Thomas Rowley. May 2015. tom@buymeataco.com
include('dbConnect.php');

if (!isset($_GET['query']) && isset($_POST['smartSearch'])) {
	$whichQuery = 'searchPageResults';
} else {
	if (isset($_GET['query']) && !isset($_POST['smartSearch'])) {
		$whichQuery = $_GET['query'];
	}
}

switch($whichQuery) {
case 'searchPageResults':
$checkBoxState = $_POST['checkBoxState'];
$smartSearchParameter = $_POST['smartSearch'];
//Get user ID.
function getUserID($smartSearchParameter, $checkBoxState, $conn) {
	if ($checkBoxState == 'false') {
		$searchTolerance = "SELECT user_id FROM wp_uqzn_usermeta WHERE meta_value = '{$smartSearchParameter}' AND meta_key = 'last_name'";
	} else {
		$searchTolerance = "SELECT user_id FROM wp_uqzn_usermeta WHERE meta_value LIKE '%{$smartSearchParameter}%'";		
	}
	$query = $searchTolerance;
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (A).");
	$idArray = [];
	$uniqueIDArray = [];
	while ($row = mysqli_fetch_array($result)) {
		extract ($row);
		array_push($idArray, $user_id);
	}
	foreach ($idArray as $value) {
		if (!in_array($value, $uniqueIDArray)) {
			array_push($uniqueIDArray, $value);
		}	
	}	
	if (empty($uniqueIDArray)) {
		echo "<p class=\"resultCountIndexPage\">Your search returned 0 result(s).</p>";
		exit;
	}
	return array($uniqueIDArray, $result);
}
$uniqueUserIDs = getUserID($smartSearchParameter, $checkBoxState, $conn);

//Get all associated meta_values for matching user ID. Combines separate arrays & deletes empty pockets.			
function getMemberDetails($uniqueUserIDs, $conn) {
	//Gets all meta_values for the potential search matches.
	function getSearchMetaValues($uniqueUserIDs, $conn) {
	$nestedResultArray = [];
		foreach ($uniqueUserIDs as $value) {
			$searchResultArray = [];
			$query = "SELECT meta_value FROM wp_uqzn_usermeta WHERE meta_key IN ('first_name', 'Middle', 'last_name', 'billing_company', 'title') AND user_id = '$value'";
			$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (B).");
				while ($row = mysqli_fetch_array($result)) {
					extract($row);
					array_push($searchResultArray, addslashes($row[0]));
				}
		array_push($nestedResultArray, $searchResultArray);
		}
		$combinedSearchArray = array_combine($uniqueUserIDs, $nestedResultArray);
		return $combinedSearchArray;
	}
	$searchMetaValuesArray = getSearchMetaValues($uniqueUserIDs[0], $conn);	

	//Gets all meta_keys for search matches and deletes the mismatches.
	function getSearchMetaKeys($searchMetaValuesArray, $conn) {
		$acceptableKeys = array('first_name', 'Middle', 'last_name', 'billing_company', 'title');
		$i=0;
		$searchMetaValuesArrayKeysOnly = array_keys($searchMetaValuesArray);
		$searchMetaKeys = [];
			foreach ($searchMetaValuesArray as $nestedArray[0]) {
				$uniqueUserIDsCounter = $searchMetaValuesArrayKeysOnly[$i];
				$searchMetaKeysTemp = [];
					foreach ($nestedArray[0] as $value1) {
						$query = "SELECT meta_key FROM wp_uqzn_usermeta WHERE meta_value = '$value1' AND user_id = $uniqueUserIDsCounter";
						$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (C).");
							while ($row = mysqli_fetch_array($result)) {
								extract($row);
									//The db contains similar meta_key names which PHP was matching (e.g., first_name & billing_first_name), so I had to restrict the pulled values to the ones in the $acceptableKeys array that I was using.
									if (in_array($row[0], $acceptableKeys)) {
										array_push($searchMetaKeysTemp, $row[0]);
									}
							}
					}
					$i++;
					array_push($searchMetaKeys, $searchMetaKeysTemp);
			}
			return array($searchMetaKeys);
	}
	$searchMetaKeysArray = getSearchMetaKeys($searchMetaValuesArray, $conn);

	//Combines the keys and values to be echoed on the search results page.
	function combineSearchKeysAndValues($searchMetaKeysArray, $searchMetaValuesArray, $uniqueUserIDs) {
		$lengthOfArray = count(array_keys($uniqueUserIDs[0]), COUNT_RECURSIVE);
		$i=0;
		$combinedSearchResults = [];
		$finalCombinedSearchResults = [];
			while ($lengthOfArray > $i) {
				foreach ($uniqueUserIDs[0] as $value) {
					@$combinedSearchArrays = array_combine($searchMetaKeysArray[0][$i], $searchMetaValuesArray[$value]);
					array_push($combinedSearchResults, $combinedSearchArrays);
					$i++;
				}
			}
			$finalCombined = array_combine($uniqueUserIDs[0], $combinedSearchResults);
			array_push($finalCombinedSearchResults, $finalCombined);
			return $finalCombinedSearchResults;										
}
$masterKeyValueArray = combineSearchKeysAndValues($searchMetaKeysArray, $searchMetaValuesArray, $uniqueUserIDs);

function displayResults($masterKeyValueArray, $uniqueUserIDs) {
	$counter = 1;
	$i=0;
	$arrayLength = count((array_keys($masterKeyValueArray)), COUNT_RECURSIVE);
	$resultCount = count((array_keys($masterKeyValueArray[0])), COUNT_RECURSIVE);	
	echo "<p class=\"resultCountIndexPage\">Your search returned {$resultCount} result(s).</p>";
			while ($i < $arrayLength) {
				foreach($uniqueUserIDs[0] as $value) {
					@$myFirstName = stripslashes($masterKeyValueArray[0][$value]["first_name"]);
					@$myMiddleName = stripslashes($masterKeyValueArray[0][$value]["Middle"]);
					@$myLastName = stripslashes($masterKeyValueArray[0][$value]["last_name"]);
					@$myTitle = stripslashes($masterKeyValueArray[0][$value]["title"]);
					@$myBilling_company = stripslashes($masterKeyValueArray[0][$value]["billing_company"]);
					$myUserId = $value;
			 		$counter++;
					$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
					echo "<a href=\"memberDetails.php?query=memberDetails&id={$myUserId}\">
							<div class=\"{$rowColor} cf\">
								<ul class=\"resultListLoop\">
									<li class=\"listResultName\">{$myFirstName} {$myMiddleName} {$myLastName}</li>
									<li class=\"listResultTitle\">{$myTitle}</li>
									<li class=\"listResultTitle\">{$myBilling_company}</li>
								</ul>
					 		</div>
					 	  </a>";
					} 	  
			$i++;
			}
} // end displaySearchResults()
displayResults($masterKeyValueArray, $uniqueUserIDs);		

} //getMemberDetails
$memberDetails = getMemberDetails($uniqueUserIDs, $conn);
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
	$query = "SELECT meta_value FROM wp_uqzn_usermeta WHERE meta_key IN ('myGender','first_name', 'Middle', 'last_name', 'nickname', 'title', 'billing_company', 'billing_phone', 'moble-phone', 'Fax', 'home', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'Email', 'addl_email', 'role', 'recruited_by', 'members_code', 'chapter', 'Territory', 'date_i18n', 'groups', 'lead_source', 'assistant', 'assistant_email', 'assistant_phone', 'depart_size', 'industry', 'remarks') AND user_id = '$lookupUserId'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (2).");	
	while ($row = mysqli_fetch_array($result)) {
		extract ($row);
			array_push($nestedMetaValues, $row[0]);			
	}
	return array($nestedMetaValues, $result);
}
$nestedMetaValues = nestedMetaValues($lookupUserId, $conn);

//Get all associated meta keys for user info.
function getUserKeys($nestedMetaValues, $conn, $lookupUserId) {
	$nestedKeys = [];
	$userMetaKeys = [];
	$userMetaValues = [];	
	foreach ($nestedMetaValues as $value) {
		$i=0;
		$escapedValue = mysqli_real_escape_string($conn, $value);
		$query = "SELECT meta_key FROM wp_uqzn_usermeta WHERE user_id = '$lookupUserId' AND meta_value = '$escapedValue'";
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
$getUserKeysAndValues = getUserKeys($nestedMetaValues[0], $conn, $lookupUserId);

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
$combinedDataArrays = combineDataArrays($getUserKeysAndValues[0], $getUserKeysAndValues[1]);
break;
case 'updateMember':
$whichMember = $_GET['id'];

//predefined application meta keys
$applicationMetaKeys = array('myGender','first_name', 'Middle', 'last_name', 'nickname', 'title', 'billing_company', 'billing_phone', 'moble-phone', 'Fax', 'home', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'Email', 'addl_email', 'role', 'recruited_by', 'members_code', 'chapter', 'Territory', 'date_i18n', 'groups', 'depart_size', 'lead_source', 'assistant', 'assistant_email', 'assistant_phone', 'industry', 'remarks');

//Returns an array of user submitted form values.
function userSubmittedFormValues($conn) {
		$submittedFormValues = [];
		foreach ($_POST as $value) {
			if (isset($value)) {
				array_push($submittedFormValues, $value);
			}			
		}
		return $submittedFormValues;
}
$userFormValues = userSubmittedFormValues($conn);

//Combines predefined application meta keys with user submitted form values into an array.
function combineFormValuesWithAppKeys($applicationMetaKeys, $userFormValues) {
		@$combinedKeysAndSubmittedValues = array_combine($applicationMetaKeys, $userFormValues);
		return $combinedKeysAndSubmittedValues;	
}
$alphaFormArray = combineFormValuesWithAppKeys($applicationMetaKeys, $userFormValues);

//Pulls all existing meta_keys from the specified user.
function getExistingMetaKeys($whichMember, $conn) {
		$existingMetaKeysArray = [];
		$query = "SELECT DISTINCT meta_key FROM wp_uqzn_usermeta WHERE user_id = '$whichMember'";
		$result = mysqli_query($conn,$query) or die ("<p class=\"resultCountIndexPage\">Your search returned 0 result(s) (6).</p>");
			while ($row = mysqli_fetch_array($result)) {
				extract($row);			
					array_push($existingMetaKeysArray, $row[0]);
			}		
			return array($existingMetaKeysArray, $result);
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
$queryArrays = (decideWhichQuery($existingMetaKeys[0], $applicationMetaKeys));

//Using the $queryArrays multi-d array, separates $alphaFormArray into inserts and updates arrays.
function insertUpdateQueries($queryArrays, $alphaFormArray, $whichMember, $conn) {

//Generates insert vs. update query MD array. Keys in the first MDpocket, values in the second.
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

//Inserts meta_keys, then updates their correspodning values, all from querySetupArray().
function insertKeysAndUpdateValues($querySetupArray, $whichMember, $conn) {
	if (empty($querySetupArray[0])) {
		return;
	}
	$metaKeyInsert = [];
	$i=0;
		foreach ($querySetupArray[0] as $value[1][0]) {
			array_push($metaKeyInsert, $value[1][0][0]);
			$query = "INSERT INTO wp_uqzn_usermeta (meta_key, user_id) VALUES ('{$value[1][0][0]}', '$whichMember')";
			$result = mysqli_query($conn,$query) or die ("<br /><br />Could not execute query (7).");
		}
		foreach ($querySetupArray[0] as $value[1][0]) {
		$insertMetaKey = $metaKeyInsert[$i];
		$escapedValue = mysqli_real_escape_string($conn, $value[1][0][1]);
		$query = "UPDATE wp_uqzn_usermeta SET meta_value='$escapedValue' WHERE meta_key='$insertMetaKey' AND user_id = '$whichMember'";
		$result = mysqli_query($conn,$query) or die ("<br /><br />Could not execute query (8).");
		$i++;				
		}
		header("Location: http://tgcf/memberDetails.php?id=$whichMember");
}
insertKeysAndUpdateValues($querySetupArray, $whichMember, $conn);

//Updates meta_keys, then updates their correspodning values from querySetupArray().
function updateValues($querySetupArray, $whichMember, $conn) {
		if (!empty($querySetupArray[0])) {
			return;
		}
		foreach ($querySetupArray[1] as $value[1][0]) {
			$escapedValue = mysqli_real_escape_string($conn, $value[1][0][1]);
			$query = "UPDATE wp_uqzn_usermeta SET meta_value='$escapedValue' WHERE meta_key='{$value[1][0][0]}' AND user_id = '$whichMember'";
			$result = mysqli_query($conn,$query) or die ("<br /><br />Could not execute query (8).");
		}
		header("Location: http://tgcf/memberDetails.php?id=$whichMember");
}
updateValues($querySetupArray, $whichMember, $conn);
} //insertUpdateQueries()

insertUpdateQueries($queryArrays, $alphaFormArray, $whichMember, $conn);
break;
} //end case switch

if (isset($result)) {mysqli_free_result($result);}
if (isset($result2)) {mysqli_free_result($result2);}	
if (isset($conn)) {mysqli_close($conn);}
?>
