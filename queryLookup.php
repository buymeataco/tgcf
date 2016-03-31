<?php
@define("SERVERNAME", "localhost");
@define("USERNAME", "root");
@define("PASSWORD", "kissaliv");
@define("DATABASE", "tgcf");
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
		if (!$conn) {
			die("Uh-oh, the connection failed. That wansn't supposed to happen! Please email: tom@buymeataco.com and let me know. Thanks!" . mysqli_connect_error());
		}
?>

<?php
	$smartSearchParameter = $_POST['smartSearch'];
	$query = "SELECT * FROM name WHERE last = '$smartSearchParameter' ORDER BY first ASC";
	$result = mysqli_query($conn,$query) or die ("<br />Could not execute a query, please see system administrator.");
	$resultCount = mysqli_num_rows($result);
		if ($resultCount >= 1) {
			displaySearchResults($result, $resultCount);
		} else {
			echo "Your search returned no results.";
		}
	cleanupScripts($result);
?>

<?php
function displaySearchResults($result, $resultCount) {
	echo "Your search returned {$resultCount} results.";
	$counter = 1;
	while ($row = mysqli_fetch_array($result)) {
	extract ($row);
	$myLast = $last;
	$myFirst = $first;
	//ternary operator alternates row colors on search results
	$counter++;
	$rowColor = ($counter & 1) ? $rowColor = 'resultDCDCDC' : $rowColor = 'resultC8DAE8';
	echo
	"<div class={$rowColor}>
		<ul class=\"resultList\">
			<li class=\"fullName\">{$myLast}, {$myFirst}</li>
		</ul>
	</div>";
	} // end loop
} //end displaySearchResults()

function cleanupScripts($result) {
	mysqli_free_result($result);
	if (isset($conn)) { mysqli_close($conn); };
}
?>
