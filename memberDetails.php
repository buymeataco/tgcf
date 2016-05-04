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
				//include ('editMember.php');			
				@htmlspecialchars($myEmail = $individualMemberData[0]['Email']);
				@htmlspecialchars($myAdditionalEmail = $individualMemberData[0]['addl_email']);				
				@htmlspecialchars($myFirst = $individualMemberData[0]['first_name']);
				@htmlspecialchars($myMiddle = $individualMemberData[0]['Middle']);
				@htmlspecialchars($myLast = $individualMemberData[0]['last_name']);
				@htmlspecialchars($mySalutation = $individualMemberData[0]['nickname']);
				@htmlspecialchars($myTitle = $individualMemberData[0]['title']);
				@htmlspecialchars($myCompany = $individualMemberData[0]['billing_company']);
				@htmlspecialchars($myOfficePhone = $individualMemberData[0]['billing_phone']);
				@htmlspecialchars($myBillingAddress1 = $individualMemberData[0]['billing_address_1']);
				@htmlspecialchars($myBillingAddress2 = $individualMemberData[0]['billing_address_2']);
				@htmlspecialchars($myNickName = $individualMemberData[0]['nickname']);
				@htmlspecialchars($myCity = $individualMemberData[0]['billing_city']);
				@htmlspecialchars($myState = $individualMemberData[0]['billing_state']);	
				@htmlspecialchars($myZip = $individualMemberData[0]['billing_postcode']);
				@htmlspecialchars($myAss = $individualMemberData[0]['assistant']);
				@htmlspecialchars($myAssPhone = $individualMemberData[0]['assistant_phone']);	
				@htmlspecialchars($myAssEmail = $individualMemberData[0]['assistant_email']);
				@htmlspecialchars($myDeptSize = $individualMemberData[0]['depart_size']);
				@htmlspecialchars($myTerritory = $individualMemberData[0]['Territory']);
				@htmlspecialchars($myJoinDate = $individualMemberData[0]['date_i18n']);
				@htmlspecialchars($myMembersCode = $individualMemberData[0]['members_code']);
				@htmlspecialchars($myIndustry = $individualMemberData[0]['industry']);
				@htmlspecialchars($myRecruitedBy = $individualMemberData[0]['recruited_by']);
				@htmlspecialchars($myMobilePhone = $individualMemberData[0]['mobile-phone']);
				@htmlspecialchars($myFax = $individualMemberData[0]['Fax']);
				@htmlspecialchars($myHome = $individualMemberData[0]['Home']);
				@htmlspecialchars($myRole = $individualMemberData[0]['role']);
				@htmlspecialchars($mySource = $individualMemberData[0]['source']);
				@htmlspecialchars($myChapter = $individualMemberData[0]['chapter']);
				@htmlspecialchars($myGroups = $individualMemberData[0]['groups']);
				@htmlspecialchars($myRemarks = $individualMemberData[0]['remarks']);
			echo 
"<button type=\"button\" class=\"editButton\" data-toggle=\"modal\" data-target=\"#myModal\">Edit</button>
			<p class=\"fullName\">Profile for <span class=\"nameBold\">Mr. {$myFirst} {$myMiddle} {$myLast} or \"{$mySalutation}\" </span></p>
			<hr class=\"searchRule\"/>
				<div class=\"details\">
					<div class=\"rowOne cf\">
						<div class=\"rowOneColOne cf\">
							<ul class=\"leftListItem\">
								<li>Preferred Name:</li>
								<li>{$myNickName}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Title:</li>
								<li>{$myTitle}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Company:</li>
								<li>{$myCompany}</li>
							</ul>
						</div> <!-- rowOneColumnOne -->
						<div class=\"rowOneColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Office:</li>
								<li>{$myOfficePhone}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Cell:</li>
								<li>{$myMobilePhone}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Fax:</li>
								<li>{$myFax}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Home:</li>
								<li>{$myHome}</li>
							</ul>
						</div> <!-- rowOneColumnTwo -->
					</div> <!--rowOne -->
				<hr class=\"rowRule\"/>
					<div class=\"rowTwo cf\">
						<div class=\"rowTwoColOne cf\">
							<ul class=\"leftListItem\">
								<li>Address Line 1:</li>
								<li>{$myBillingAddress1}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Address Line 2:</li>
								<li>{$myBillingAddress2}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>City, State & Zip</li>
								<li>{$myCity}, {$myState} {$myZip}</li>
							</ul>
						</div> <!-- rowTwoColumnOne -->
						<div class=\"rowTwoColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Primary Email:</li>
								<li>{$myEmail}</li>
							</ul>
								<ul class=\"rightListItem\">
								<li>Additional Email:</li>
								<li>{$myAdditionalEmail}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Role:</li>
								<li>{$myRole}</li>
							</ul>
						</div> <!-- rowTwoColumnTwo -->
					</div> <!-- rowTwo -->
				<hr class=\"rowRule\"/>
					<div class=\"rowThree cf\">
						<div class=\"rowThreeColOne cf\">
							<ul class=\"leftListItem\">
								<li>Recruited by:</li>
								<li>{$myRecruitedBy}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Contact Type:</li>
								<li>{$myMembersCode}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Chapter</li>
								<li>{$myChapter}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Territory</li>
								<li>{$myTerritory}</li>
							</ul>							
							<ul class=\"leftListItem\">
								<li>Source:</li>
								<li>{$mySource}</li>
							</ul>
						</div> <!-- rowThreeColumnOne -->
						<div class=\"rowThreeColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Join Date:</li>
								<li>{$myJoinDate}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Groups:</li>
								<li>{$myGroups}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Attorneys in Dept:</li>
								<li>{$myDeptSize}</li>
							</ul>
							<ul class=\"rightListItem\">
								<li>Industry:</li>
								<li>{$myIndustry}</li>
							</ul>
						</div> <!-- rowThreeColumnTwo -->
					</div> <!-- rowThree -->
				<hr class=\"rowRule\"/>
					<div class=\"rowFour cf\">
						<div class=\"rowFourColOne cf\">
							<ul class=\"leftListItem\">
								<li>Assistant:</li>
								<li>{$myAss}</li>
							</ul>
							<ul class=\"leftListItem\">
								<li>Assistant Email:</li>
								<li>{$myAssEmail}</li>
							</ul>
						</div> <!-- rowFourColumnOne -->
						<div class=\"rowFourColTwo cf\">
							<ul class=\"rightListItem\">
								<li>Assistant Office:</li>
								<li>{$myAssPhone}</li>
							</ul>
						</div> <!-- rowFourColumnTwo -->	
					</div> <!-- row four -->
				<hr class=\"rowRule\"/>					
					<div class=\"rowFive cf\">
						<div class=\"rowFiveColOne cf\">
							<ul class=\"leftListItem\">
								<li>Notes:</li>
								<li>{$myRemarks}</li>
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
