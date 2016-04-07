<?php
	$whichQuery = 'searchPageResults';
	include ('dbConnect.php');
	include ('queries.php');
?>

<?php
function displaySearchResults($result, $resultCount) {
	echo "<p class=\"resultCountIndexPage\">Your search returned {$resultCount} result(s).</p>";
	$counter = 1;
	while ($row = mysqli_fetch_array($result)) {
	extract ($row);
	$myLast = $last;
	$myFirst = $first;
	$myMiddle = $middle;
	$myEmployer = $employer;
	$myTitle = $title;
	$myId = $id;
	$counter++;
	$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
	echo
	"<a href=\"memberDetails.php?id={$myId}\"><div class=\"{$rowColor} cf\">
		<ul class=\"resultList\">
			<li class=\"listResultName\">{$myLast}, {$myFirst} {$myMiddle}</li>
			<li class=\"listResultEmployer\">{$employer}</li>
			<li class=\"listResultTitle\">{$title}</li>
		</ul>
	</div></a>";
	} // end loop
} // displaySearchResults()
?>
