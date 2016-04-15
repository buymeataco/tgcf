<?php
include('dbConnect.php');

switch($whichQuery) {
case 'searchPageResults':
	$smartSearchParameter = $_POST['smartSearch'];
	//Get user ID.
	$query = "SELECT user_id FROM wp_uqzn_usermeta WHERE meta_value LIKE '%$smartSearchParameter%'";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute first query.");
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
		$query2 = "SELECT meta_value FROM wp_uqzn_usermeta WHERE meta_key IN ('first_name','last_name','billing_company','title') AND user_id = '$value'";
		$result2 = mysqli_query($conn,$query2) or die ("<br />Could not execute second query.");	
			while ($row2 = mysqli_fetch_array($result2)) {
				extract ($row2);
					array_push($nestedMetaValues, $row2[0]);
			} //while

	//Get all associated meta keys for user info.
	
			foreach ($nestedMetaValues as $value2) {
				$query3 = "SELECT meta_key FROM wp_uqzn_usermeta WHERE user_id = '$value' AND meta_value = '$value2'";
				$result3 = mysqli_query($conn,$query3) or die ("<p class=\"resultCountIndexPage\">Your search returned no results.</p>");
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

	//combines separate arrays & delets empty pockets
	$lengthOfArray = count((array_keys($userMetaKeys)), COUNT_RECURSIVE);
	$i=0;
	while ($lengthOfArray > $i) {
			@$combinedArrays = array_combine($userMetaKeys[$i], $userMetaValues[$i]);
				if (!empty($combinedArrays)) {
					array_push($combinedKeyValuePairs, $combinedArrays);
				}
			$i++;	
		}

	// echo "<pre>";
	// echo "Combined key/value pairs: ";
	// 	print_r($combinedKeyValuePairs);
	// echo "</pre>";
	// echo "<br />";

	displaySearchResults($combinedKeyValuePairs, $scrubbedIdArray);
	cleanup($result, $result2, $result3, $scrubbedIdArray, $userMetaValues, $userMetaKeys, $nestedKeys, $nestedMetaValues);
	} else {
		echo "<p class=\"resultCountIndexPage\">Your search returned no results.</p>";
	}
break;
case 'memberDetails':
	$lookupUserId = $_GET["id"];
	if (!empty($lookupUserId)) {
	$individualMemberData = [];	
	$userMetaValues = [];
	$userMetaKeys = [];
	$nestedMetaValues = [];
	$nestedKeys = [];	
	$query4 = "SELECT meta_value FROM wp_uqzn_usermeta WHERE meta_key IN ('first_name','last_name','billing_company','title', 'salutation', 'Middle', 'nickname', 'billing_phone', 'Email', 'mobile-phone', 'Fax', 'chapter', 'recruited_by', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'assistant', 'assistant_phone', 'assistant_email', 'Territory', 'industry', 'depart_size', 'date_i18n', 'members_code','remarks') AND user_id = '$lookupUserId'";
	$result4 = mysqli_query($conn,$query4) or die ("<br />Could not execute second query.");	
		while ($row4 = mysqli_fetch_array($result4)) {
			extract ($row4);
				array_push($nestedMetaValues, $row4[0]);
		} //while

	// echo "<pre>";
	// echo "Nested Meta Values: ";
	// 	print_r($nestedMetaValues);
	// echo "</pre>";
	// echo "<br />";

	//Get all associated meta keys for user info.
	
		foreach ($nestedMetaValues as $value3) {
			$i=0;
			$query5 = "SELECT meta_key FROM wp_uqzn_usermeta WHERE user_id = '$lookupUserId' AND meta_value = '$value3'";
			//echo " Value 3: " . $value3;
			$result5 = mysqli_query($conn,$query5) or die ("<p class=\"resultCountIndexPage\">Your search returned no results.</p>");
				while ($row5 = mysqli_fetch_array($result5)) {
					extract($row5);
						if (!empty($row5[$i])) {
							array_push($nestedKeys, $row5[$i]);
						}	
					$i++;		
				} //while
		}
		array_push($userMetaKeys, $nestedKeys);
		array_push($userMetaValues, $nestedMetaValues);

	// echo "<pre>";
	// echo "Nested Meta Keys: ";
	// 	print_r($nestedKeys);
	// echo "</pre>";
	// echo "<br />";

	//combines separate arrays & delets empty pockets
	$lengthOfArray = count((array_keys($userMetaKeys)), COUNT_RECURSIVE);
	$i=0;
	while ($lengthOfArray > $i) {
			@$combinedArrays = array_combine($userMetaKeys[$i], $userMetaValues[$i]);
				if (!empty($combinedArrays)) {
					array_push($individualMemberData, $combinedArrays);
				}
			$i++;	
		}

	// echo "<pre>";
	// echo "Individual Member Data: ";
	// 	print_r($individualMemberData);
	// echo "</pre>";
	// echo "<br />";

	cleanup2($result4, $result5, $individualMemberData);
	} else {
		echo "<p class=\"resultCountIndexPage\">Your search returned no results.</p>";
	}
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
	if (isset($conn)) {mysqli_close($conn); };
?>
