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
			<p class="resultCount">Record last updated on: 2106-04-04.</p>
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
					<input id="firstName" class="firstName" name="firstName" type="text" size="128" maxlength="256" />
				</li>
				<li><label for="middleName">Middle:</label></li>
				<li>
					<input id="middleName" class="middleName" name="middleName" type="text" size="128" maxlength="256" />
				</li>
				<li><label for="lastName">Last:</label></li>
				<li>
					<input id="lastName" class="lastName" name="lastName" type="text" size="128" maxlength="256" />
				</li>
			</ul>
				<hr class="searchRule"/>
				<div class="profile">
					<div class="rowOne cf">
						<div class="rowOneColOne cf">
							<ul class="leftListItem">
								<li><label for="name">Preferred Name:</label></li>
								<li>
									<input id="name" class="merchant" name="name" type="text" size="128" maxlength="256" />
								</li>
							</ul>							
							<ul class="leftListItem">
								<li><label for="title">Title:</label></li>
								<li>
									<input id="title" class="title" name="title" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="company">Company:</label></li>
								<li>
									<input id="company" class="company" name="company" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowOneColumnOne -->
						<div class="rowOneColTwo cf">
							<ul class="rightListItem">
								<li><label for="office">Office:</label></li>
								<li>
									<input id="office" class="office" name="office" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="cell">Cell:</label></li>
								<li>
									<input id="cell" class="cell" name="cell" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="fax">Fax:</label></li>
								<li>
									<input id="fax" class="fax" name="fax" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="home">Home:</label></li>
								<li>
									<input id="home" class="home" name="home" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowOneColumnTwo -->
					</div> <!--rowOne -->
				<hr class="rowRule"/>
					<div class="rowTwo cf">
						<div class="rowTwoColOne cf">
							<ul class="leftListItem">
								<li><label for="numStreet">Address Line 1:</label></li>
								<li>
									<input id="numStreet" class="numStreet" name="numStreet" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="suite">Address Line 2:</label></li>
								<li>
									<input id="suite" class="suite" name="suite" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="cityStateZip">City, State &amp; Zip:</label></li>
								<li>
									<input id="cityStateZip" class="cityStateZip" name="cityStateZip" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowTwoColumnOne -->
						<div class="rowTwoColTwo cf">
							<ul class="rightListItem">
								<li><label for="primaryEmail">Primary Email:</label></li>
								<li>
									<input id="primaryEmail" class="primaryEmail" name="primaryEmail" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="additionalEmail">Additional Email:</label></li>
								<li>
									<input id="additionalEmail" class="primaryEmail" name="additionalEmail" type="text" size="128" maxlength="256" />
								</li>
							</ul>							
							<ul class="rightListItem">
								<li><label for="role">Role:</label></li>
								<li>
									<select name="role" class="role" id="role">
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
						</div> <!-- rowTwoColumnTwo -->
					</div> <!-- rowTwo -->
				<hr class="rowRule"/>
					<div class="rowThree cf">
						<div class="rowThreeColOne cf">
							<ul class="leftListItem">
								<li><label for="recruitedBy">Recruited by:</label></li>
								<li>
									<input id="recruitedBy" class="recruitedBy" name="recruitedBy" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="status">Contact Type</label></li>
								<li>
									<select name="status" class="status" id="status">
									  <option value="1">Customer</option>
									  <option value="2">Lead</option>
									  <option value="3">Follow-up</option>
									  <option value="4">Prospect</option>
									  <option value="5">Favourite</option>
									  <option value="6">Blocked</option>
									  <option value="7">Flagged</option>
									</select>
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="chapter">Chapter:</label></li>
								<li>	
									<select name="chapter" class="chapter" id="chapter">
										<option value="1">Austin-San Antonio</option>
										<option value="2">Dallas-Fort Worth</option>	
									 	<option value="3">Houston</option>								
									</select>
								</li>	
							</ul>							
							<ul class="leftListItem">								
								<li><label for="territory">Territory:</label></li>
								<li>
									<input id="territory" class="territory" name="territory" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="source">Source:</label></li>
								<li>
									<input id="source" class="source" name="source" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowThreeColumnOne -->
						<div class="rowThreeColTwo cf">
							<ul class="rightListItem">
								<li><label for="joinDate">Join Date:</label></li>
								<li>
									<input id="joinDate" class="joinDate" name="joinDate" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="rightListItem">
								<li><label for="groups">Groups:</label></li>
								<li>
									<input id="groups" class="groups" name="groups" type="text" size="128" maxlength="256" />
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
									<input id="assistant" class="assistant" name="assistant" type="text" size="128" maxlength="256" />
								</li>
							</ul>
							<ul class="leftListItem">
								<li><label for="assEmail">Asst. Email:</label></li>
								<li>
									<input id="assEmail" class="assEmail" name="assEmail" type="text" size="128" maxlength="256" />
								</li>
							</ul>
						</div> <!-- rowFourColumnOne -->
						<div class="rowFourColTwo cf">
							<ul class="rightListItem">
								<li><label for="assOffice">Asst. Office:</label></li>
								<li>
									<input id="assOffice" class="assOffice" name="assOffice" type="text" size="128" maxlength="256" />
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
								<li><label for="source">Notes:</label></li>
							</ul>
						<div class="notes">
							<p>Notes here</p>
						</div>	
						</div> <!-- rowSixColumnOne -->					
					</div> <!-- row six -->
				</div> <!-- profile -->	
		</div> <!-- wrapper -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/script.min.js"></script>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
