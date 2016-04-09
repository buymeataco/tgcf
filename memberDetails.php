<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The General Counsel Forum</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
</head>
	<body>
		<div class="wrapper">
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Member</button>
			<?php
				// include ('queries.php');
				 include ('editMember.php');
				// $whichQuery = 'memberDetails';
				// function displaySearchResults($result) {
				// while ($row = mysqli_fetch_array($result)) {
				// 	extract ($row);
					// $myLast = $last;
					// $myFirst = $first;
					// $myMiddle = $middle;
					// $myEmployer = $employer;
					// $myTitle = $title;	$myLast = 'Munster';
					$myFirst = 'Herman';
					$myMiddle = '"Darn"';
					$myLast = 'Munster';
					// $myEmployer = 'Goodman, Goodbury & Graves';
					// $myTitle = 'Grave Digger';
					// $lastUpdate = '12/5/15';
			echo
				"<p class=\"resultCount\">Record last updated on: 2106-04-04.</p>
			<p class=\"fullName\">Profile for <span class=\"nameBold\">{$myFirst} {$myMiddle} {$myLast}</span></p>
			<hr class=\"searchRule\"/>
				<div class=\"profile\">
					<div class=\"rowOne cf\">
						<div class=\"rowOneColOne cf\">
							<ul class=\"leftListItem\">
								<li>Nickname:</li>
								<li>The Hairman</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Title:</li>
								<li>Chief Administration Officer and Chief Legal Counsel and Two Other Meaningless Titles</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>I am new to the<br />GC – CLO role?</li>
								<li>McLongCompanyName International Conglomerate of the World, Incorporated</li>
							</ul>
						</div> <!-- rowOneColumnOne -->
						<div class=\"rowOneColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Office:</li>
								<li>000-000-0000</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Cell:</li>
								<li>000-000-0000</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Fax:</li>
								<li>000-000-0000</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Home:</li>
								<li>000-000-0000</li>
							</ul>
						</div> <!-- rowOneColumnTwo -->
					</div> <!--rowOne -->
				<hr class=\"rowRule\"/>
					<div class=\"rowTwo cf\">
						<div class=\"rowTwoColOne cf\">
							<ul class=\"leftListItem\">
								<li>Number &amp; Street:</li>
								<li>12210 Merit Dr.</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Suite:</li>
								<li>900</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>City, State &amp; Zip:</li>
								<li>Dallas, TX 75251</li>
							</ul>
						</div> <!-- rowTwoColumnOne -->
						<div class=\"rowTwoColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Primary Email:</li>
								<li>harry.martin@leduffamerica.com</li>
							</ul>
								<ul class=\"rightListItem\">
								<li>Chapter:</li>
								<li>Austin/San Antonio</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Role:</li>
								<li>Treasurer</li>
							</ul>
						</div> <!-- rowTwoColumnTwo -->
					</div> <!-- rowTwo -->
				<hr class=\"rowRule\"/>
					<div class=\"rowThree cf\">
						<div class=\"rowThreeColOne cf\">
							<ul class=\"leftListItem\">
								<li>Recruited by:</li>
								<li>Lemmy Kilmister</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Customer Status:</li>
								<li>Member</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Territory:</li>
								<li>Dallas/Fort Worth</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Source:</li>
								<li>Why not</li>
							</ul>
						</div> <!-- rowThreeColumnOne -->
						<div class=\"rowThreeColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Member Code:</li>
								<li>007</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Membership Level:</li>
								<li>Platinum</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Join Date:</li>
								<li>04/05/2016</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Groups:</li>
								<li>TCGF CONF CME</li>
							</ul>
						</div> <!-- rowThreeColumnTwo -->
					</div> <!-- rowThree -->
				<hr class=\"rowRule\"/>
					<div class=\"rowFour cf\">
						<div class=\"rowFourColOne cf\">
							<ul class=\"leftListItem\">
								<li>Assistant:</li>
								<li>Lurch</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Assistant Email:</li>
								<li>lurch@leduffamerica.com</li>
							</ul>
						</div> <!-- rowFourColumnOne -->
						<div class=\"rowFourColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Asst. Office:</li>
								<li>000-000-0000</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Asst. Cell:</li>
								<li>000-000-0000</li>
							</ul>
						</div> <!-- rowFourColumnTwo -->	
					</div> <!-- row four -->
				<hr class=\"rowRule\"/>					
					<div class=\"rowFive cf\">
						<div class=\"rowFiveColOne cf\">
							<ul class=\"leftListItem\">
								<li>Attorneys in Dept:</li>
								<li>3</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Industry:</li>
								<li>Hospitality</li>
							</ul>
						</div> <!-- rowFiveColumnOne -->
						<div class=\"rowFiveColTwo cf\">
							<ul class=\"rightListItem\">
								<li>New in-house?</li>
								<li>No</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>New to GC-CLO?</li>
								<li>Yes</li>
							</ul>
						</div> <!-- rowFiveColumnTwo -->
					</div> <!-- row five -->
				<hr class=\"rowRule\"/>
					<div class=\"rowSix cf\">
						<div class=\"rowSixColOne cf\">
							<ul class=\"leftListItem\">
								<li>Notes:</li>
							</ul>
						<div class=\"notes\">
							<p>Notes here</p>
						</div>	
						</div> <!-- rowSixColumnOne -->					
					</div> <!-- row six -->
				</div> <!-- profile -->";
			?>		
		</div> <!-- end wrapper -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>		
<script src="js/script.min.js"></script>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
