<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The General Counsel Forum</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
	<body>
		<div class="wrapper">
			<?php
				$whichQuery = 'memberDetails';
				include ('queries.php');
				function displaySearchResults($result) {
					while ($row = mysqli_fetch_array($result)) {
						extract ($row);
						$myLast = $last;
						$myFirst = $first;
						$myMiddle = $middle;
						$myEmployer = $employer;
						$myTitle = $title;
							echo
								"<p>Profile for <strong>{$myFirst} {$myLast}</strong></p>
								<hr class=\"memberDetailsPage\"/>
								<p class=\"lastUpdate\">Record last updated on: {$lastUpdate}.</p>
								<div class=\"profile\">
									<ul class=\"resultList\">
										<li class=\"listResultName\">{$myLast}, {$myFirst} {$myMiddle}</li>
										<li class=\"listResultEmployer\">{$employer}</li>
										<li class=\"listResultTitle\">{$title}</li>
									</ul>
								</div>";
					} // loop			
				} // displaySearchResults()
			?>		
		</div> <!-- end wrapper -->
<script src="js/script.min.js"></script>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
