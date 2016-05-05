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
				@$myEscapedEmail = stripslashes(htmlspecialchars($myEmail = $combineDataArrays[0]['Email']));
				@$myEscapedAdditionalEmail = stripslashes(htmlspecialchars($myAdditionalEmail = $combineDataArrays[0]['addl_email']));				
				@$myEscapedFirst = stripslashes(htmlspecialchars($myFirst = $combineDataArrays[0]['first_name']));
				@$myEscapedMiddle = stripslashes(htmlspecialchars($myMiddle = $combineDataArrays[0]['Middle']));
				@$myEscapedLast = stripslashes(htmlspecialchars($myLast = $combineDataArrays[0]['last_name']));
				@$myEscapedGender = stripslashes(htmlspecialchars($myGender = $combineDataArrays[0]['gender']));
				@$myEscapedSalutation = stripslashes(htmlspecialchars($mySalutation = $combineDataArrays[0]['nickname']));
				@$myEscapedTitle = stripslashes(htmlspecialchars($myTitle = $combineDataArrays[0]['title']));
				@$myEscapedCompany = stripslashes(htmlspecialchars($myCompany = $combineDataArrays[0]['billing_company']));
				@$myEscapedOfficePhone = stripslashes(htmlspecialchars($myOfficePhone = $combineDataArrays[0]['billing_phone']));
				@$myEscapedBillingAddress1 = stripslashes(htmlspecialchars($myBillingAddress1 = $combineDataArrays[0]['billing_address_1']));
				@$myEscapedBillingAddress2 = stripslashes(htmlspecialchars($myBillingAddress2 = $combineDataArrays[0]['billing_address_2']));
				@$myEscapedCity = stripslashes(htmlspecialchars($myCity = $combineDataArrays[0]['billing_city']));
				@$myEscapedState = stripslashes(htmlspecialchars($myState = $combineDataArrays[0]['billing_state']));	
				@$myEscapedZip = stripslashes(htmlspecialchars($myZip = $combineDataArrays[0]['billing_postcode']));
				@$myEscapedAss = stripslashes(htmlspecialchars($myAss = $combineDataArrays[0]['assistant']));
				@$myEscapedAssPhone = stripslashes(htmlspecialchars($myAssPhone = $combineDataArrays[0]['assistant_phone']));	
				@$myEscapedAssEmail = stripslashes(htmlspecialchars($myAssEmail = $combineDataArrays[0]['assistant_email']));
				@$myEscapedDeptSize = stripslashes(htmlspecialchars($myDeptSize = $combineDataArrays[0]['depart_size']));
				@$myEscapedTerritory = stripslashes(htmlspecialchars($myTerritory = $combineDataArrays[0]['Territory']));
				@$myEscapedJoinDate = stripslashes(htmlspecialchars($myJoinDate = $combineDataArrays[0]['date_i18n']));
				@$myEscapedMembersCode = stripslashes(htmlspecialchars($myMembersCode = $combineDataArrays[0]['members_code']));
				@$myEscapedIndustry = stripslashes(htmlspecialchars($myIndustry = $combineDataArrays[0]['industry']));
				@$myEscapedRecruitedBy = stripslashes(htmlspecialchars($myRecruitedBy = $combineDataArrays[0]['recruited_by']));
				@$myEscapedMobilePhone = stripslashes(htmlspecialchars($myMobilePhone = $combineDataArrays[0]['moble-phone']));
				@$myEscapedFax = stripslashes(htmlspecialchars($myFax = $combineDataArrays[0]['Fax']));
				@$myEscapedHome = stripslashes(htmlspecialchars($myHome = $combineDataArrays[0]['home']));
				@$myEscapedRole = stripslashes(htmlspecialchars($myRole = $combineDataArrays[0]['role']));
				@$myEscapedSource = stripslashes(htmlspecialchars($mySource = $combineDataArrays[0]['lead_source']));
				@$myEscapedChapter = stripslashes(htmlspecialchars($myChapter = $combineDataArrays[0]['chapter']));
				@$myEscapedGroups = stripslashes(htmlspecialchars($myGroups = $combineDataArrays[0]['groups']));
				@$myEscapedRemarks = stripslashes(htmlspecialchars($myRemarks = $combineDataArrays[0]['remarks']));
			echo 
			"<button type=\"button\" class=\"editButton\" data-toggle=\"modal\" data-target=\"#myModal\">Edit</button>
			<p class=\"fullName\">Profile for <span class=\"nameBold\">{$myGender} {$myFirst} {$myMiddle} {$myLast} or \"{$mySalutation}\" </span></p>
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
