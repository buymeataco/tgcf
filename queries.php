<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include('dbConnect.php');

if (!isset($whichQuery)) {
	$whichQuery = $_GET['query'];
}

switch($whichQuery) {
case 'searchPageResults':
	$smartSearchParameter = $_POST['smartSearch'];
	//Get user ID.
	$query = "SELECT user_id FROM metaTest WHERE meta_value LIKE '%$smartSearchParameter%'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute query (1).");
	$idArray = [];
	$scrubbedIdArray = [];
	$scrubbedKeyArray = [];

	$acceptableKeys = ['first_name', 'last_name', 'billing_company', 'title'];
		while ($row = mysqli_fetch_array($result)) {
			extract ($row);
			array_push($idArray, $user_id);
		}

		foreach ($idArray as $checkValue) {
			if (!in_array($checkValue, $scrubbedIdArray)) {
				array_push($scrubbedIdArray, $checkValue);
			}	
		}	

	if (!empty($scrubbedIdArray)) {
	$userMetaValues = [];
	$userMetaKeys = [];
	$combinedKeyValuePairs = [];

	//Get all associated info matching user ID.
	foreach ($scrubbedIdArray as $value) {
		$nestedMetaValues = [];
		$nestedKeys = [];	
		$query2 = "SELECT meta_value FROM metaTest WHERE meta_key IN ('first_name','last_name','billing_company','title') AND user_id = '$value'";
		$result2 = mysqli_query($conn,$query2) or die ("<br />Could not execute query (2).");	
			while ($row2 = mysqli_fetch_array($result2)) {
				extract ($row2);
					array_push($nestedMetaValues, $row2[0]);
			} //while

	//Get all associated meta keys for user info.
		foreach ($nestedMetaValues as $value2) {
			$query3 = "SELECT meta_key FROM metaTest WHERE user_id = '$value' AND meta_value = '$value2'";
			$result3 = mysqli_query($conn,$query3) or die ("<p class=\"resultCountIndexPage\">Your search returned no results (3).</p>");
				while ($row3 = mysqli_fetch_array($result3)) {
					extract($row3);
						if (in_array($row3[0], $acceptableKeys)) {
							array_push($nestedKeys, $row3[0]);
						}	
				} //while
			}
			array_push($userMetaKeys, $nestedKeys);
			array_push($userMetaValues, $nestedMetaValues);	
	} //foreach

	//combines separate arrays & deletes empty pockets
	$lengthOfArray = count((array_keys($userMetaKeys)), COUNT_RECURSIVE);
	$i=0;
	while ($lengthOfArray > $i) {
			@$combinedArrays = array_combine($userMetaKeys[$i], $userMetaValues[$i]);
				if (!empty($combinedArrays)) {
					array_push($combinedKeyValuePairs, $combinedArrays);
				}
			$i++;	
		}

	displaySearchResults($combinedKeyValuePairs, $scrubbedIdArray);
	cleanup($result, $result2, $result3, $scrubbedIdArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues);
	} else {
		echo "<p class=\"resultCountIndexPage\">Your search returned no results.</p>";
	} //end if
break;
case 'memberDetails':
	$lookupUserId = $_GET["id"];
	if (!empty($lookupUserId)) {
	$individualMemberData = [];	
	$userMetaValues = [];
	$userMetaKeys = [];
	$nestedMetaValues = [];
	$nestedKeys = [];	
	$query4 = "SELECT meta_value FROM metaTest WHERE meta_key IN ('first_name','last_name','billing_company','title', 'salutation', 'Middle', 'nickname', 'billing_phone', 'Email', 'addl_email', 'moble-phone', 'Fax', 'chapter', 'recruited_by', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'assistant', 'assistant_phone', 'assistant_email', 'Territory', 'industry', 'depart_size', 'date_i18n', 'members_code', 'remarks', 'role', 'home', 'lead_source', 'groups') AND user_id = '$lookupUserId'";
	$result4 = mysqli_query($conn,$query4) or die ("<br />Could not execute query (2).");	
		while ($row4 = mysqli_fetch_array($result4)) {
			extract ($row4);
				array_push($nestedMetaValues, $row4[0]);
		} //while

	//Get all associated meta keys for user info.
		foreach ($nestedMetaValues as $value3) {
			$i=0;
			$query5 = "SELECT meta_key FROM metaTest WHERE user_id = '$lookupUserId' AND meta_value = '$value3'";
			$result5 = mysqli_query($conn,$query5) or die ("<p class=\"resultCountIndexPage\">Your search returned no results (5).</p>");
				while ($row5 = mysqli_fetch_array($result5)) {
					extract($row5);
						if (!empty($row5[$i])) {
							array_push($nestedKeys, $row5[$i]);
						} else {
							echo "<p class=\"resultCountIndexPage\">Your search returned no results (5).</p>";
						} 	
					$i++;		
				} //while
		}
		array_push($userMetaKeys, $nestedKeys);
		array_push($userMetaValues, $nestedMetaValues);

	//combines separate arrays & deletes empty pockets
	$lengthOfArray = count((array_keys($userMetaKeys)), COUNT_RECURSIVE);
	$i=0;
	while ($lengthOfArray > $i) {
		$combinedArrays = array_combine($userMetaKeys[$i], $userMetaValues[$i]);
			if (!empty($combinedArrays)) {
				array_push($individualMemberData, $combinedArrays);
			}
		$i++;	
	}
		cleanup2($result4, $result5, $individualMemberData);
	} else {
		echo "<p class=\"resultCountIndexPage\">Your search returned no results.</p>";
	}
break;

case 'updateMember':
$whichMember = $_GET['id'];

//predefined application meta keys
$applicationMetaKeys = array('gender', 'first_name', 'Middle', 'last_name', 'nickname', 'title', 'billing_company', 'billing_phone', 'moble-phone', 'Fax', 'home', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'Email', 'addl_email', 'role', 'recruited_by', 'members_code', 'chapter', 'Territory', 'date_i18n', 'groups', 'lead_source', 'assistant', 'assistant_email', 'assistant_phone', 'depart_size', 'industry', 'remarks');

	//returns an array of user submitted form values
	function userSubmittedFormValues() {
		$submittedFormValues = [];
		foreach ($_POST as $value) {
			if (isset($value)) {
				array_push($submittedFormValues, $value);
			}			
		} //foreach
		return $submittedFormValues;		
	}
	$userFormValues = userSubmittedFormValues();

	//combines predefined application meta keys with user submitted form values into an array
	function combineFormValuesWithAppKeys($applicationMetaKeys, $userFormValues) {
		@$combinedKeysAndSubmittedValues = array_combine($applicationMetaKeys, $userFormValues);
		return $combinedKeysAndSubmittedValues;
	}
	$alphaFormArray = combineFormValuesWithAppKeys($applicationMetaKeys, $userFormValues);

	//grabs the existing meta_keys for a specified user
	$existingMetaKeys = [];
	$query6 = "SELECT DISTINCT meta_key FROM metaTest WHERE user_id = '$whichMember'";
	$result6 = mysqli_query($conn,$query6) or die ("<p class=\"resultCountIndexPage\">Your search returned no results (6).</p>");
		while ($row6 = mysqli_fetch_array($result6)) {
			extract($row6);			
				array_push($existingMetaKeys, $row6[0]);
		} //while

	//figures out which keys/value pairs will be inserts vs. updates and returns it in a multi-d array
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
		$referenceQueryArray = [$insertArray, $updateArray];
		return $referenceQueryArray;
	}
	$queryArrays = (decideWhichQuery($existingMetaKeys, $applicationMetaKeys));

	//using the $queryArrays mulit-d array, splits the $alphaFormArray into inserts and updates
	function betaQueryArray($queryArrays, $alphaFormArray, $whichMember, $conn) {
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

		//Preps the insertQueryArray into two strings (meta_key and meta_value) suitable for a MySQL query.
		function insertQueries($insertQueryArray) {
			$insertKeysArray = [];
			$insertValuesArray = [];

			foreach ($insertQueryArray as $value) {
				array_push($insertKeysArray, $value[0]);
			}

			foreach ($insertQueryArray as $value) {
				array_push($insertValuesArray, $value[1]);
			}
			return array($insertKeysArray, $insertValuesArray);
		}			
		$resultInsertArray = insertQueries($insertQueryArray);

		//Inserts meta_keys, then updates their correspodning values all from insertQueries().
		function insertKeysAndValues($resultInsertArray, $whichMember, $conn) {
			$i=0;
			foreach ($resultInsertArray[0] as $value[0]) {
				$query7 = "INSERT INTO metaTest (meta_key, user_id) VALUES ('$value[0]', '$whichMember')";			
				//$result7 = mysqli_query($conn,$query7) or die ("<br /><br />Could not execute query (7).");
				$conCatVar = $resultInsertArray[1]["$i"];
				$query8 = "UPDATE metaTest SET meta_value='$conCatVar' WHERE meta_key='$value[0]' AND user_id = '$whichMember'";
				//$result8 = mysqli_query($conn,$query8) or die ("<br /><br />Could not execute query (8).");				
				$i++;			
			}		
		}
		insertKeysAndValues($resultInsertArray, $whichMember, $conn);

		//Preps the updateQueryArray into two strings (meta_key and meta_value) suitable for a MySQL query.
		function updateQueries($updateQueryArray) {
			$updateKeysArray = [];
			$updateValuesArray = [];

			foreach ($updateQueryArray as $value) {
				array_push($updateKeysArray, $value[0]);
			}

			foreach ($updateQueryArray as $value) {
				array_push($updateValuesArray, $value[1]);
			}
			return array($updateKeysArray, $updateValuesArray);
		}			
		$resultUpdateArray = updateQueries($updateQueryArray);

		//Updates meta_keys, then updates their correspodning values all from updateQueries().
		function updateKeysAndValues($resultUpdateArray, $whichMember, $conn) {
			foreach ($resultUpdateArray[0] as $value[0]) {		
				$query9 = "UPDATE metaTest SET meta_value='$conCatVar' WHERE meta_key='$value[0]' AND user_id = '$whichMember'";
				//$result8 = mysqli_query($conn,$query8) or die ("<br /><br />Could not execute query (8).");										
			}		
		}
		updateKeysAndValues($resultUpdateArray, $whichMember, $conn);

		 echo "<pre>";
			print_r($resultUpdateArray);
		 echo "<pre>";		
		
	} //betaQueryArray()
	betaQueryArray($queryArrays, $alphaFormArray, $whichMember, $conn);

	cleanup3($result6, $existingMetaKeys);
break;
} //end case switch

function cleanup($result, $result2, $result3, $scrubbedIdArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues) {
	if (isset($scrubbedIdArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues)) {unset($scrubbedIdArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues); }
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_free_result($result3);	
}	
function cleanup2($result4, $result5, $individualMemberData) {
	if (isset($individualMemberData)) {unset($individualMemberData); }
		mysqli_free_result($result4);
		mysqli_free_result($result5);
}
function cleanup3($result6, $existingMetaKeys) {
	if (isset($existingMetaKeys)) {unset($existingMetaKeys); }
		mysqli_free_result($result6);
}
	if (isset($conn)) {mysqli_close($conn); };
?>
