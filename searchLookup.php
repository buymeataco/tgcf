<?php
$whichQuery = 'searchPageResults';
include('queries.php');

function displaySearchResults($combinedKeyValuePairs, $scrubbedIdArray) {
	$counter = 1;
	$i=0;
	$arrayLength = count((array_keys($combinedKeyValuePairs)), COUNT_RECURSIVE);
	echo "<p class=\"resultCountIndexPage\">Your search returned {$arrayLength} result(s).</p>";
			while ($i < $arrayLength) {			
					$myFirstName = $combinedKeyValuePairs[$i]["first_name"];
					$myLastName = $combinedKeyValuePairs[$i]["last_name"];
					$myTitle = $combinedKeyValuePairs[$i]["title"];
					$myBilling_company = $combinedKeyValuePairs[$i]["billing_company"];
					$myUserId = $scrubbedIdArray[$i];
			 		$counter++;
					$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
					echo "<a href=\"memberDetails.php?id={$myUserId}\">
							<div class=\"{$rowColor} cf\">
								<ul class=\"resultListLoop\">
									<li class=\"listResultName\">{$myFirstName} {$myLastName}</li>
									<li class=\"listResultTitle\">{$myTitle}</li>
									<li class=\"listResultTitle\">{$myBilling_company}</li>
								</ul>
					 		</div>
					 	  </a>";
					$i++;
			}
} // end displaySearchResults()
?>
