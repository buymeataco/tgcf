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
				$whichQuery = 'memberDetails';
				include ('queries.php');
				include ('editMember.php');				
					@$myEmail = $individualMemberData[0]['Email'];
					@$myFirst = $individualMemberData[0]['first_name'];
					@$myMiddle = $individualMemberData[0]['Middle'];
					@$myLast = $individualMemberData[0]['last_name'];
					@$mySalutation = $individualMemberData[0]['salutation'];
					@$myTitle = $individualMemberData[0]['title'];
					@$myCompany = $individualMemberData[0]['billing_company'];
					@$myOfficePhone = $individualMemberData[0]['billing_phone'];
					@$myBillingAddress1	= $individualMemberData[0]['billing_address_1'];
					@$myBillingAddress2	= $individualMemberData[0]['billing_address_2'];
					@$myNickName	= $individualMemberData[0]['nickname'];
					@$myCity	= $individualMemberData[0]['billing_city'];
					@$myState = $individualMemberData[0]['billing_state'];	
					@$myZip = $individualMemberData[0]['billing_postcode'];
					@$myAss	= $individualMemberData[0]['assistant'];
					@$myAssPhone = $individualMemberData[0]['assistant_phone'];	
					@$myAssEmail = $individualMemberData[0]['assistant_email'];
					@$myDeptSize = $individualMemberData[0]['depart_size'];
					@$myTerritory = $individualMemberData[0]['Territory'];
					@$myJoinDate = $individualMemberData[0]['date_i18n'];
					@$myMembersCode = $individualMemberData[0]['members_code'];
					@$myIndustry = $individualMemberData[0]['industry'];
					@$myRemarks = $individualMemberData[0]['remarks'];
					@$myRecruitedBy = $individualMemberData[0]['recruited_by'];
					@$myMobilePhone = $individualMemberData[0]['mobile-phone'];
					@$myFax = $individualMemberData[0]['Fax'];
					@$myHome = $individualMemberData[0]['Home'];
					@$myRole = $individualMemberData[0]['role'];
					@$myAdditionalEmail = $individualMemberData[0]['additionalEmail'];
					@$myContactType = $individualMemberData[0]['contactType'];
					@$mySource = $individualMemberData[0]['source'];
					@$myChapter = $individualMemberData[0]['chapter'];
					@$myJoinDate = $individualMemberData[0]['date_i18n'];
					@$myGroups = $individualMemberData[0]['groups'];
			echo
				"<p class=\"fullName\">Profile for <span class=\"nameBold\">Mr. {$myFirst} {$myMiddle} {$myLast} or \"{$mySalutation}\" </span></p>
			<hr class=\"searchRule\"/>
				<div class=\"profile\">
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
								<li>{$myContactType}</li>
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
							<ul class=\"rightListItem\">
								<li>Members Code:</li>
								<li>{$myMembersCode}</li>
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
						<div class=\"rowSixColOne cf\">
							<ul class=\"leftListItem\">
								<li>Notes:</li>
							</ul>
						<div class=\"notes\">
							<p>{$myRemarks}</p>
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
