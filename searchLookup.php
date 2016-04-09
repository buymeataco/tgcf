<?php
$whichQuery = 'searchPageResults';
include('queries.php');

function displaySearchResults($searchData, $resultCount, $idArray) {
	$counter = 1;
	$resultCountAdjusted = $resultCount/3; 
	echo "<p class=\"resultCountIndexPage\">Your search returned {$resultCountAdjusted} result(s).</p>";
			$arrayLength = count($searchData, COUNT_RECURSIVE);
			for ($i=0; $i!=$arrayLength; $i++) {
					$returnedValue1 = $searchData[$i++];
					$returnedValue2 = $searchData[$i++];
					$returnedValue3 = $searchData[$i];
			 		$counter++;
					$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
					echo "<div class=\"{$rowColor} cf\">
							<ul class=\"resultListLoop\">
								<li><a href=\"#\">{$returnedValue1}</a></li>
								<li><a href=\"#\">{$returnedValue2}</a></li>
								<li><a href=\"#\">{$returnedValue3}</a></li>
							</ul>
					 	  </div>";	
			}
} // displaySearchResults()

?>
