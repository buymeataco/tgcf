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
		<div class="wrapperContainer">
			<?php
				$whichQuery = 'memberDetails';
				include ('queries.php');
				include ('editMember.php');			
				@$myEscapedEmail = stripslashes($combinedDataArrays[0]['Email']);
				@$myEscapedAdditionalEmail = stripslashes($combinedDataArrays[0]['addl_email']);
				@$myEscapedFirst = stripslashes($combinedDataArrays[0]['first_name']);
				@$myEscapedMiddle = stripslashes($combinedDataArrays[0]['Middle']);
				@$myEscapedLast = stripslashes($combinedDataArrays[0]['last_name']);
				@$myEscapedGenderNow = stripslashes($combinedDataArrays[0]['myGender']);
				@$myEscapedSalutation = stripslashes($combinedDataArrays[0]['nickname']);
				@$myEscapedTitle = stripslashes($combinedDataArrays[0]['title']);
				@$myEscapedCompany = stripslashes($combinedDataArrays[0]['billing_company']);
				@$myEscapedOfficePhone = stripslashes($combinedDataArrays[0]['billing_phone']);
				@$myEscapedBillingAddress1 = stripslashes($combinedDataArrays[0]['billing_address_1']);
				@$myEscapedBillingAddress2 = stripslashes($combinedDataArrays[0]['billing_address_2']);
				@$myEscapedCity = stripslashes($combinedDataArrays[0]['billing_city']);
				@$myEscapedState = stripslashes($combinedDataArrays[0]['billing_state']);	
				@$myEscapedZip = stripslashes($combinedDataArrays[0]['billing_postcode']);
				@$myEscapedAss = stripslashes($combinedDataArrays[0]['assistant']);
				@$myEscapedAssPhone = stripslashes($combinedDataArrays[0]['assistant_phone']);
				@$myEscapedAssEmail = stripslashes($combinedDataArrays[0]['assistant_email']);
				@$myEscapedDeptSize = stripslashes($combinedDataArrays[0]['depart_size']);
				@$myEscapedTerritory = stripslashes($combinedDataArrays[0]['Territory']);
				@$myEscapedJoinDate = stripslashes($combinedDataArrays[0]['date_i18n']);
				@$myEscapedMembersCode = stripslashes($combinedDataArrays[0]['members_code']);
				@$myEscapedIndustry = stripslashes($combinedDataArrays[0]['industry']);
				@$myEscapedRecruitedBy = stripslashes($combinedDataArrays[0]['recruited_by']);
				@$myEscapedMobilePhone = stripslashes($combinedDataArrays[0]['moble-phone']);
				@$myEscapedFax = stripslashes($combinedDataArrays[0]['Fax']);
				@$myEscapedHome = stripslashes($combinedDataArrays[0]['home']);
				@$myEscapedRole = stripslashes($combinedDataArrays[0]['role']);
				@$myEscapedSource = stripslashes($combinedDataArrays[0]['lead_source']);
				@$myEscapedChapter = stripslashes($combinedDataArrays[0]['chapter']);
				@$myEscapedGroups = stripslashes($combinedDataArrays[0]['groups']);
				@$myEscapedRemarks = stripslashes($combinedDataArrays[0]['remarks']);
			echo 
			"<button type=\"button\" class=\"editButton\" data-toggle=\"modal\" data-target=\"#myModal\">Edit</button>
			<p class=\"fullName\">Profile for <span class=\"nameBold\">{$myEscapedGenderNow} {$myEscapedFirst} {$myEscapedMiddle} {$myEscapedLast} or \"{$myEscapedSalutation}\" </span></p>
			<hr class=\"searchRule\"/>
				<div class=\"details\">
					<div class=\"rowOne cf\">
						<div class=\"rowOneColOne cf\">
							<ul class=\"leftListItem\">
								<li>Title:</li>
								<li>{$myEscapedTitle}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Company:</li>
								<li>{$myEscapedCompany}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Office:</li>
								<li>{$myEscapedOfficePhone}</li>
							</ul>							
						</div> <!-- rowOneColumnOne -->
						<div class=\"rowOneColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Cell:</li>
								<li>{$myEscapedMobilePhone}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Fax:</li>
								<li>{$myEscapedFax}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Home:</li>
								<li>{$myEscapedHome}</li>
							</ul>
						</div> <!-- rowOneColumnTwo -->
					</div> <!--rowOne -->
				<hr class=\"rowRule\"/>
					<div class=\"rowTwo cf\">
						<div class=\"rowTwoColOne cf\">
							<ul class=\"leftListItem\">
								<li>Address Line 1:</li>
								<li>{$myEscapedBillingAddress1}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Address Line 2:</li>
								<li>{$myEscapedBillingAddress2}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>City, State &amp; Zip</li>
								<li>{$myEscapedCity}, {$myEscapedState} {$myEscapedZip}</li>
							</ul>
						</div> <!-- rowTwoColumnOne -->
						<div class=\"rowTwoColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Primary Email:</li>
								<li>{$myEscapedEmail}</li>
							</ul>
								<ul class=\"rightListItem\">
								<li>Additional Email:</li>
								<li>{$myEscapedAdditionalEmail}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Role:</li>
								<li>{$myEscapedRole}</li>
							</ul>
						</div> <!-- rowTwoColumnTwo -->
					</div> <!-- rowTwo -->
				<hr class=\"rowRule\"/>
					<div class=\"rowThree cf\">
						<div class=\"rowThreeColOne cf\">
							<ul class=\"leftListItem\">
								<li>Recruited by:</li>
								<li>{$myEscapedRecruitedBy}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Contact Type:</li>
								<li>{$myEscapedMembersCode}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Chapter</li>
								<li>{$myEscapedChapter}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Territory</li>
								<li>{$myEscapedTerritory}</li>
							</ul>							
							<ul class=\"leftListItem\">
								<li>Source:</li>
								<li>{$myEscapedSource}</li>
							</ul>
						</div> <!-- rowThreeColumnOne -->
						<div class=\"rowThreeColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Join Date:</li>
								<li>{$myEscapedJoinDate}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Groups:</li>
								<li>{$myEscapedGroups}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Attorneys in Dept:</li>
								<li>{$myEscapedDeptSize}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Industry:</li>
								<li>{$myEscapedIndustry}</li>
							</ul>
						</div> <!-- rowThreeColumnTwo -->
					</div> <!-- rowThree -->
				<hr class=\"rowRule\"/>
					<div class=\"rowFour cf\">
						<div class=\"rowFourColOne cf\">
							<ul class=\"leftListItem\">
								<li>Assistant:</li>
								<li>{$myEscapedAss}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Assistant Email:</li>
								<li>{$myEscapedAssEmail}</li>
							</ul>
						</div> <!-- rowFourColumnOne -->
						<div class=\"rowFourColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Assistant Office:</li>
								<li>{$myEscapedAssPhone}</li>
							</ul>
						</div> <!-- rowFourColumnTwo -->	
					</div> <!-- row four -->
				<hr class=\"rowRule\"/>					
					<div class=\"rowFive cf\">
						<div class=\"rowFiveColOne cf\">
							<ul class=\"leftListItem\">
								<li>Notes:</li>
								<li>{$myEscapedRemarks}</li>
							</ul>
						</div> <!-- rowFiveColumnOne -->					
					</div> <!-- row five -->
				</div> <!-- details -->";
			?>
		</div> <!-- end wrapper -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>		
<script src="js/script.min.js"></script>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
