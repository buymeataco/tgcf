<?php
$whichQuery = 'searchPageResults';
include('queries.php');

function displaySearchResults($combinedKeyValuePairs) {
	$counter = 1;
	$i=0;
	$arrayLength = count((array_keys($combinedKeyValuePairs)), COUNT_RECURSIVE);
	// echo "<pre>";
	// 	print_r($combinedKeyValuePairs);
	// echo "</pre>";
	echo "<p class=\"resultCountIndexPage\">Your search returned {$arrayLength} result(s).</p>";
			while ($i < $arrayLength) {			
					$myFirstName = $combinedKeyValuePairs[$i]["first_name"];
					$myLastName = $combinedKeyValuePairs[$i]["last_name"];
					$myTitle = $combinedKeyValuePairs[$i]["title"];
					$myEmployer = $combinedKeyValuePairs[$i]["employer"];
			 		$counter++;
					$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
					echo "<a href=\"memberDetails.php?id=\"><div class=\"{$rowColor} cf\">
							<ul class=\"resultListLoop\">
								<li class=\"listResultName\"><a href=\"#\">{$myFirstName} {$myLastName}</li>
								<li class=\"listResultTitle\"><a href=\"#\">{$myTitle}</li>
								<li class=\"listResultTitle\"><a href=\"#\">{$myEmployer}</li>
							</ul>
					 	  </div></a>";
					$i++;
			}
} // end displaySearchResults()
?>
