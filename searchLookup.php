<?php
$whichQuery = 'searchPageResults';
include('queries.php');

function displaySearchResults($resultCountMetaValues, $userMetaValues) {
	$counter = 1;
	$resultCountAdjusted = $resultCountMetaValues/3; 
	echo "<p class=\"resultCountIndexPage\">Your search returned {$resultCountAdjusted} result(s).</p>";
			$arrayLength = count($userMetaValues, COUNT_RECURSIVE);
			for ($i=0; $i<=3;$i++) {
					// $returnedValue1 = $searchData[$i++]; //first_name
					// $returnedValue2 = $searchData[$i++]; //last_name
					// $returnedValue3 = $searchData[$i]; //city
			 		$counter++;
					$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
					echo "<a href=\"memberDetails.php?id=\"><div class=\"{$rowColor} cf\">
							<ul class=\"resultListLoop\">
								<li class=\"listResultName\"><a href=\"#\"></li>
								<li class=\"listResultTitle\"><a href=\"#\"></li>
							</ul>
					 	  </div></a>";
					 	  //echo $i;
			}
} // displaySearchResults()

// echo "<pre>";
// 	print_r($idArray);
// echo "</pre>";
// echo "<pre>";
// 	print_r($searchData);
// echo "</pre>";

//echo "ID lookup string from php page: " . $idLookupString;

?>