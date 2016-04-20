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
		<?php
			$whichQuery = 'memberDetails';
			include ('queries.php');
			$whichMember = $_GET['id'];
			echo "Which member: " . $whichMember;
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
			@$myNickName = $individualMemberData[0]['nickname'];
			@$myCity = $individualMemberData[0]['billing_city'];
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
      	?>
      	<!-- start HTML template -->
		<div class="wrapperContainer">
			<form action="submit.php" method="POST">
			<ul class="fullName">
				<li>
					<select name="salutation" class="salutation" id="salutation">
					  <option value="1">Mr.</option>
					  <option value="2">Ms.</option>
					  <option value="3">Mrs.</option>
					</select>
				</li>				
				<li><label for="firstName">First:</label></li>
				<li>
					<input id="firstName" class="firstName" value="<?php echo $myFirst; ?>" name="firstName" type="text" size="128" maxlength="256" />
				</li>
				<li><label for="middleName">Middle:</label></li>
				<li>
					<input id="middleName" class="middleName" value="<?php echo $myMiddle; ?>" name="middleName" type="text" size="128" maxlength="256" />
				</li>
				<li><label for="lastName">Last:</label></li>
				<li>
					<input id="lastName" class="lastName" value="<?php echo $myLast; ?>" name="lastName" type="text" size="128" maxlength="256" />
				</li>
			</ul>
				<hr class="searchRule"/>
				<div class="details">
					<div class="rowOne cf">
						<div class="rowOneColOne cf">
							<ul class="leftListItem">
								<li><label for="name">Preferred Name:</label></li>
								<li>
									<input id="name" class="merchant" value="<?php echo $mySalutation; ?>" name="name" type="text" size="128" maxlength="256" />
								</li>
							</ul>							
							<ul class="leftListItem">
								<li><label for="title">Title:</label></li>
								<li>
									<input id="title" class="title" value="<?php echo $myTitle; ?>" name="title" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="company">Company:</label></li>
								<li>
									<input id="company" class="company" value="<?php echo $myCompany; ?>" name="company" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowOneColumnOne -->
						<div class="rowOneColTwo cf">
							<ul class="rightListItem">
								<li><label for="office">Office:</label></li>
								<li>
									<input id="office" class="office" value="<?php echo $myOfficePhone; ?>" name="office" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="cell">Cell:</label></li>
								<li>
									<input id="cell" class="cell" value="<?php echo $myMobilePhone; ?>" name="cell" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="fax">Fax:</label></li>
								<li>
									<input id="fax" class="fax" value="<?php echo $myFax; ?>" name="fax" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="home">Home:</label></li>
								<li>
									<input id="home" class="home" value="<?php echo $myHome; ?>" name="home" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowOneColumnTwo -->
					</div> <!--rowOne -->
				<hr class="rowRule"/>
					<div class="rowTwo cf">
						<div class="rowTwoColOne cf">
							<ul class="leftListItem">
								<li><label for="address1">Address Line 1:</label></li>
								<li>
									<input id="address1" class="address1" value="<?php echo $myBillingAddress1; ?>" name="address1" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="address2">Address Line 2:</label></li>
								<li>
									<input id="address2" class="address2" value="<?php echo $myBillingAddress2; ?>" name="address2" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem cityState">
								<li><label for="cityStateZip">City &amp; State</label></li>
								<li>
									<input id="cityStateZip" class="cityStateZip" value="<?php echo $myCity; ?>" name="cityStateZip" type="text" maxlength="256" />
								</li>
								<li>
									<select name="state">
										<option selected="selected"><?php if ($myState) {echo $myState;} else {echo 'Choose One';}  ?></option>
										<option value="AL">AL</option>
										<option value="AK">AK</option>
										<option value="AZ">AZ</option>
										<option value="AR">AR</option>
										<option value="CA">CA</option>
										<option value="CO">CO</option>
										<option value="CT">CT</option>
										<option value="DE">DE</option>
										<option value="DC">DC</option>
										<option value="FL">FL</option>
										<option value="GA">GA</option>
										<option value="HI">HI</option>
										<option value="ID">ID</option>
										<option value="IL">IL</option>
										<option value="IN">IN</option>
										<option value="IA">IA</option>
										<option value="KS">KS</option>
										<option value="KY">KY</option>
										<option value="LA">LA</option>
										<option value="ME">ME</option>
										<option value="MD">MD</option>
										<option value="MA">MA</option>
										<option value="MI">MI</option>
										<option value="MN">MN</option>
										<option value="MS">MS</option>
										<option value="MO">MO</option>
										<option value="MT">MT</option>
										<option value="NE">NE</option>
										<option value="NV">NV</option>
										<option value="NH">NH</option>
										<option value="NJ">NJ</option>
										<option value="NM">NM</option>
										<option value="NY">NY</option>
										<option value="NC">NC</option>
										<option value="ND">ND</option>
										<option value="OH">OH</option>
										<option value="OK">OK</option>
										<option value="OR">OR</option>
										<option value="PA">PA</option>
										<option value="RI">RI</option>
										<option value="SC">SC</option>
										<option value="SD">SD</option>
										<option value="TN">TN</option>
										<option value="TX">TX</option>
										<option value="UT">UT</option>
										<option value="VT">VT</option>
										<option value="VA">VA</option>
										<option value="WA">WA</option>
										<option value="WV">WV</option>
										<option value="WI">WI</option>
										<option value="WY">WY</option>
									</select>
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="cityStateZip">Zip Code:</label></li>
								<li>
									<input id="cityStateZip" class="cityStateZip" value="<?php echo $myZip; ?>" name="cityStateZip" type="text" maxlength="5" />
								</li>
							</ul>
						</div> <!-- rowTwoColumnOne -->
						<div class="rowTwoColTwo cf">
							<ul class="rightListItem">
								<li><label for="primaryEmail">Primary Email:</label></li>
								<li>
									<input id="primaryEmail" class="primaryEmail" value="<?php echo $myEmail; ?>" name="primaryEmail" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="additionalEmail">Additional Email:</label></li>
								<li>
									<input id="additionalEmail" class="primaryEmail" value="<?php echo $myAdditionalEmail; ?>" name="additionalEmail" type="text" size="128" maxlength="256" />
								</li>
							</ul>							
							<ul class="rightListItem">
								<li><label for="role">Role:</label></li>
								<li>
									<select name="role" class="role" id="role">
									  <option selected="selected"><?php if ($myRole) {echo $myRole;} else {echo 'Choose One';}  ?></option>		
									  <option value="1">Subscriber</option>
									  <option value="2">Follow-Up Emails Manager</option>
									  <option value="3">Shop Manager</option>
									  <option value="4">s2Member Level 4</option>
									  <option value="5">s2Member Level 3</option>
									  <option value="6">s2Member Level 2</option>
									  <option value="7">s2Member Level 1</option>
									  <option value="8">Client</option>
									  <option value="9">Contributor</option>
									  <option value="10">Author</option>
									  <option value="11">Editor</option>
									  <option value="12">Administrator</option>
									  <option value="13">No role for this site</option>
									</select>
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="recruitedBy">Recruited by:</label></li>
								<li>
									<input id="recruitedBy" class="recruitedBy" value="<?php echo $myRecruitedBy; ?>" name="recruitedBy" type="text" size="128" maxlength="256" />
								</li>
							</ul>							
						</div> <!-- rowTwoColumnTwo -->
					</div> <!-- rowTwo -->
				<hr class="rowRule"/>
					<div class="rowThree cf">
						<div class="rowThreeColOne cf">
							<ul class="leftListItem">
								<li><label for="contactType">Contact Type</label></li>
								<li>
									<select name="contactType" class="contactType" id="contactType">
									  <option selected="selected"><?php if ($myMembersCode) {echo $myMembersCode;} else {echo 'Choose One';} ?></option>	
									  <option value="1">M1 - Individual Corp.</option>
									  <option value="2">M2 - Non-Profit Gov't. Mun</option>
									  <option value="3">M3 - Corp. Mentor Sponsor</option>
									  <option value="4">M4 - Legal Dept.</option>
									  <option value="5">M5 - Corp. Underwriter</option>
									  <option value="6">M6 - Displaced GC</option>
									  <option value="7">M7 - GC Emeretus</option>
									</select>
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="chapter">Chapter:</label></li>
								<li>	
									<select name="chapter" class="chapter" id="chapter">
									  <option selected="selected"><?php if ($myChapter) {echo $myChapter;} else {echo 'Choose One';} ?></option>											
										<option value="1">Austin-San Antonio</option>
										<option value="2">Dallas-Fort Worth</option>	
									 	<option value="3">Houston</option>								
									</select>
								</li>	
							</ul>							
							<ul class="leftListItem">								
								<li><label for="territory">Territory:</label></li>
								<li>
									<input id="territory" class="territory" value="<?php echo $myTerritory; ?>" name="territory" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowThreeColumnOne -->
						<div class="rowThreeColTwo cf">
							<ul class="rightListItem">
								<li><label for="joinDate">Join Date:</label></li>
								<li>
									<input id="joinDate" class="joinDate" value="<?php echo $myJoinDate; ?>" name="joinDate" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="groups">Groups:</label></li>
								<li>
									<input id="groups" class="groups" value="<?php echo $myGroups; ?>" name="groups" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="source">Source:</label></li>
								<li>
									<select name="source" class="source" id="source">
									  <option selected="selected"><?php if ($mySource) {echo $mySource;} else {echo 'Choose One';} ?></option>											
										<option value="AUS BIZ JOUR">Austin Business Journal</option>
 										<option value="BOD RECRU">BOD Recruitment</option>
 										<option value="CONFERENCE">Joined to attend Conference</option>
 										<option value="DEN PROSP">2014 Denver Prospects</option>
 										<option value="FILL ALUM">FILL Alumni- Any Year</option>
 										<option value="FORMER UND">Prev. Underwriter via From</option>
 										<option value="LINKEDIN">Linkedin General Councel</option>
 										<option value="LINKEDINNJ">Req. to Join LinkedIn Gr.</option>
 										<option value="MAILINGS">Brochure Mail Outs</option>
 										<option value="MCC">Digital Monthly Issue of MCC</option>
 										<option value="MEM REFERL">Member Referral</option>
 										<option value="MKTING LST">Marketing List</option>
 										<option value="NETWORKING">Networking Mixers/Meetings</option>
 										<option value="REJOIN">Previous Member</option>
 										<option value="REPL M">New GC/MC Replaced Prev.</option>
 										<option value="SEE SUC REC">See Successor Record</option>
 										<option value="SPNR">Sponsor Referral</option>
 										<option value="STATE BAR">Chapter State Bar</option>
 										<option value="TGCF">The Forum</option>
 										<option value="TX CORP">TX Corporate Counsel Dir.</option>
 										<option value="TX LAWBOOKLIST">Texas Lawnbook List</option>
 										<option value="TX LWYR">Monthly In-House TX Issue</option>
 										<option value="TXLAWBK">Monthly Texas Lawbook</option>
 										<option value="UND REF">Currently an Underwriter Ref.</option>
 										<option value="UND REFRL">Underwriter Referral</option>
 										<option value="WEBSITE">Website</option>
									</select>	
								</li>
							</ul>							
						</div> <!-- rowThreeColumnTwo -->
					</div> <!-- rowThree -->
				<hr class="rowRule"/>
					<div class="rowFour cf">
						<div class="rowFourColOne cf">
							<ul class="leftListItem">
								<li><label for="assistant">Assistant:</label></li>
								<li>
									<input id="assistant" class="assistant" value="<?php echo $myAss; ?>" name="assistant" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="assEmail">Assistant Email:</label></li>
								<li>
									<input id="assEmail" class="assEmail" value="<?php echo $myAssEmail; ?>" name="assEmail" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowFourColumnOne -->
						<div class="rowFourColTwo cf">
							<ul class="rightListItem">
								<li><label for="assOffice">Assistant Office:</label></li>
								<li>
									<input id="assOffice" class="assOffice" value="<?php echo $myAssPhone; ?>" name="assOffice" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowFourColumnTwo -->	
					</div> <!-- row four -->
				<hr class="rowRule"/>					
					<div class="rowFive cf">
						<div class="rowFiveColOne cf">
							<ul class="leftListItem">
								<li><label for="attorneys">Attorneys in Dept:</label></li>
								<li>
									<select name="attorneys" class="attorneys" id="attorneys">
									  <option selected="selected"><?php if ($myDeptSize) {echo $myDeptSize;} else {echo 'Choose One';} ?></option>																					
									  <option value="1">Solo</option>
									  <option value="2">Small 2-5 Lawyers</option>
									  <option value="3">Medium 6-9 Lawyers</option>
									  <option value="4">Large 11 or more Lawyers</option>
									</select>
								</li>
							</ul>
							<ul class="leftListItem">
								<li class="industryLabel"><label for="industry">Industry:</label></li>
								<li>
									<select name="industry" class="industry" id="industry">
									    <option selected="selected"><?php if ($myIndustry) {echo $myIndustry;} else {echo 'Choose One';} ?></option>																																							
										<option value="Agriculture &amp; Forestry Sector">Agriculture &amp; Forestry Sector</option>
										<option value="Arts Entertainment &amp; Recreation Sector">Arts Entertainment &amp; Recreation Sector</option>
										<option value="Beverage Manufacturing">Beverage Manufacturing</option>
										<option value="Biotechnology Product Manufacturing">Biotechnology Product Manufacturing</option>
										<option value="Business Services Sector">Business Services Sector</option>
										<option value="Chemical Manufacturing">Chemical Manufacturing</option>
										<option value="Commercial Equipment Repair &amp; Maintenance">Commercial Equipment Repair &amp; Maintenance</option>
										<option value="Commercial Printing">Commercial Printing</option>
										<option value="Computer Hardware Manufacturing">Computer Hardware Manufacturing</option>
										<option value="Computer Software">Computer Software</option>
										<option value="Construction Sector">Construction Sector</option>
										<option value="Consumer Products Manufacturing">Consumer Products Manufacturing</option>
										<option value="Consumer Services">Consumer Services</option>
										<option value="Contract Electronics Manufacturing">Contract Electronics Manufacturing</option>
										<option value="Control Electromedical Measuring &amp; Navigational Instruments Manufacturing">Control Electromedical Measuring &amp; Navigational Instruments Manufacturing</option>
										<option value="Education Sector">Education Sector</option>
										<option value="Electric Power Generation">Electric Power Generation</option>
										<option value="Electric Utilities">Electric Utilities</option>
										<option value="Electrical Products Manufacturing">Electrical Products Manufacturing</option>
										<option value="Fabricated Metal Product Manufacturing">Fabricated Metal Product Manufacturing</option>
										<option value="Finance &amp; Insurance Sector">Finance &amp; Insurance Sector</option>
										<option value="Food Manufacturing">Food Manufacturing</option>
										<option value="Government">Government</option>
										<option value="Health Care Products Manufacturing">Health Care Products Manufacturing</option>
										<option value="Health Care Sector">Health Care Sector</option>
										<option value="HVAC Equipment Manufacturing">HVAC Equipment Manufacturing</option>
										<option value="Insurance">Insurance</option>
										<option value="Leasing of Intangible Assets">Leasing of Intangible Assets</option>
										<option value="Lodging">Lodging</option>
										<option value="Machinery Manufacturing">Machinery Manufacturing</option>
										<option value="Magnetic &amp; Optical Media Manufacturing">Magnetic &amp; Optical Media Manufacturing &amp; Reproduction</option>
										<option value="Managed Application &map; Network Services">Managed Application &amp; Network Services</option>
										<option value="Management of Companies &amp; Enterprises">Management of Companies &amp; Enterprises</option>
										<option value="Manufacturing Sector">Manufacturing Sector</option>
										<option value="Media">Media</option>
										<option value="Membership Organizations">Membership Organizations</option>
										<option value="Mining">Mining</option>
										<option value="Miscellaneous Manufacturing">Miscellaneous Manufacturing</option>
										<option value="Natural Gas Distribution &amp; Marketing">Natural Gas Distribution &amp; Marketing</option>
										<option value="Nonclassifiable Establishments">Nonclassifiable Establishments</option>
										<option value="Nonmetallic Mineral Product Manufacturing">Nonmetallic Mineral Product Manufacturing</option>
										<option value="Nonprofit Institutions">Nonprofit Institutions</option>
										<option value="Oil &amp; Gas Exploration &amp; Production">Oil &amp; Gas Exploration &amp; Production</option>
										<option value="Oil &amp; Gas Field Services">Oil &amp; Gas Field Services</option>
										<option value="Oil &amp; Gas Well Drilling">Oil &amp; Gas Well Drilling</option>
										<option value="Petroleum &amp; Coal Products Manufacturing">Petroleum &amp; Coal Products Manufacturing</option>
										<option value="Pharmaceutical Manufacturing">Pharmaceutical Manufacturing</option>
										<option value="Primary Metals Manufacturing">Primary Metals Manufacturing</option>
										<option value="Private Households">Private Households</option>
										<option value="Professional Services Sector">Professional Services Sector</option>
										<option value="Real Estate">Real Estate</option>
										<option value="Religious Organizations">Religious Organizations</option>
										<option value="Rental &amp; Leasing<">Rental &amp; Leasing</option>
										<option value="Restaurants">Restaurants</option>
										<option value="Bars &amp; Food Services">Bars &amp; Food Services</option>
										<option value="Retail Sector">Retail Sector</option>
										<option value="Security Products Manufacturing">Security Products Manufacturing</option>
										<option value="Semiconductor &amp; Other Electronic Component Manufacturing">Semiconductor &amp; Other Electronic Component Manufacturing</option>
										<option value="Telecommunications Equipment Manufacturing<">Telecommunications Equipment Manufacturing</option>
										<option value="Transportation Equipment Manufacturing">Transportation Equipment Manufacturing</option>
										<option value="Transportation Services Sector">Transportation Services Sector</option>
										<option value="Water &amp; Sewer Utilities">Water &amp; Sewer Utilities</option>
										<option value="Web Development">Web Development</option>
										<option value="Wholesale Sector">Wholesale Sector</option>
										<option value="Wood Product Manufacturing">Wood Product Manufacturing</option>
										<option value="Other">Other</option>
									</select>	
								</li>
							</ul>
						</div> <!-- rowFiveColumnOne -->
						<div class="rowFiveColTwo cf">
						</div> <!-- rowFiveColumnTwo -->
					</div> <!-- row five -->
				<hr class="rowRule"/>
					<div class="rowSix cf">
						<div class="rowSixColOne cf">
							<ul class="leftListItem">
								<li><label for="notes">Notes:</label></li>
								<li><textarea name="notes" id="notes" cols="86" rows="12"><?php echo $myRemarks; ?></textarea></li>
							</ul>
						</div>	<!-- rowSixColumnOne -->
					</div> <!-- row six -->
				</div> <!-- details -->
				<button type="submit" class="saveButton">Save</button>
				<button type="button" class="cancelButton" data-dismiss="modal">Close</button>
				<input type="hidden" name="whichMember" value="<?php echo $whichMember; ?>" method="POST"/>
				<input type="hidden" name="email" value="<?php echo $myEmail; ?>" method="POST"/>
				<input type="hidden" name="firstName" value="<?php echo $myFirst; ?>" method="POST"/>
				<input type="hidden" name="middle" value="<?php echo $myMiddle; ?>" method="POST"/>				
				<input type="hidden" name="lastName" value="<?php echo $myLast; ?>" method="POST"/>
				<input type="hidden" name="salutation" value="<?php echo $mySalutation; ?>" method="POST"/>
				<input type="hidden" name="title" value="<?php echo $myTitle; ?>" method="POST"/>
				<input type="hidden" name="company" value="<?php echo $myCompany; ?>" method="POST"/>
				<input type="hidden" name="officePhone" value="<?php echo $myOfficePhone; ?>" method="POST"/>
				<input type="hidden" name="billingAddress1" value="<?php echo $myBillingAddress1; ?>" method="POST"/>
				<input type="hidden" name="billingAddress2" value="<?php echo $myBillingAddress2; ?>" method="POST"/>
				<input type="hidden" name="nickname" value="<?php echo $myNickName; ?>" method="POST"/>
				<input type="hidden" name="city" value="<?php echo $myCity; ?>" method="POST"/>
				<input type="hidden" name="state" value="<?php echo $myState; ?>" method="POST"/>
				<input type="hidden" name="zip" value="<?php echo $myZip; ?>" method="POST"/>
				<input type="hidden" name="ass" value="<?php echo $myAss; ?>" method="POST"/>
				<input type="hidden" name="assPhone" value="<?php echo $myAssPhone; ?>" method="POST"/>
				<input type="hidden" name="assEmail" value="<?php echo $myAssEmail; ?>" method="POST"/>
				<input type="hidden" name="deptSize" value="<?php echo $myDeptSize; ?>" method="POST"/>
				<input type="hidden" name="territory" value="<?php echo $myTerritory; ?>" method="POST"/>
				<input type="hidden" name="joinDate" value="<?php echo $myJoinDate; ?>" method="POST"/>
				<input type="hidden" name="membersCode" value="<?php echo $myMembersCode; ?>" method="POST"/>
				<input type="hidden" name="industry" value="<?php echo $myIndustry; ?>" method="POST"/>
				<input type="hidden" name="remarks" value="<?php echo $myRemarks; ?>" method="POST"/>
				<input type="hidden" name="recruitedBy" value="<?php echo $myRecruitedBy; ?>" method="POST"/>
				<input type="hidden" name="mobilePhone" value="<?php echo $myMobilePhone; ?>" method="POST"/>
				<input type="hidden" name="fax" value="<?php echo $myFax; ?>" method="POST"/>
				<input type="hidden" name="home" value="<?php echo $myHome; ?>" method="POST"/>
				<input type="hidden" name="role" value="<?php echo $myRole; ?>" method="POST"/>
				<input type="hidden" name="additionalEmail" value="<?php echo $myAdditionalEmail; ?>" method="POST"/>
				<input type="hidden" name="contactType" value="<?php echo $myContactType; ?>" method="POST"/>
				<input type="hidden" name="source" value="<?php echo $mySource; ?>" method="POST"/>
				<input type="hidden" name="chapter" value="<?php echo $myChapter; ?>" method="POST"/>
				<input type="hidden" name="groups" value="<?php echo $myGroups; ?>" method="POST"/>							 				  								        		
			</form>			
		</div> <!-- wrapperContainer -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/script.min.js"></script>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
