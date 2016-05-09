<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
      </div>
      <div class="modal-body">
      	<!-- start HTML template -->
        <?php
          $whichQuery = 'memberDetails';
          $whichMember = $_GET['id'];
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
          @$myEscapedRemarks = stripslashes($combinedDataArrays[0]['remarks']);
          @$myEscapedRecruitedBy = stripslashes($combinedDataArrays[0]['recruited_by']);
          @$myEscapedMobilePhone = stripslashes($combinedDataArrays[0]['moble-phone']);
          @$myEscapedFax = stripslashes($combinedDataArrays[0]['Fax']);
          @$myEscapedHome = stripslashes($combinedDataArrays[0]['home']);
          @$myEscapedRole = stripslashes($combinedDataArrays[0]['role']);
          @$myEscapedSource = stripslashes($combinedDataArrays[0]['lead_source']);
          @$myEscapedChapter = stripslashes($combinedDataArrays[0]['chapter']);
          @$myEscapedGroups = stripslashes($combinedDataArrays[0]['groups']);
        ?>
		<div class="wrapperContainer">
      <form action="queries.php?query=updateMember&id=<?php echo $whichMember; ?>" method="POST" name="form1">
      <ul class="fullName">
        <li>
          <select name="gender" class="gender" id="gender">
            <option selected="selected"><?php if ($myEscapedGenderNow) {echo $myEscapedGenderNow;} else {echo 'Choose One';}  ?></option> 
            <option value="Mr.">Mr.</option>
            <option value="Ms.">Ms.</option>
            <option value="Mrs.">Mrs.</option>
          </select>
        </li>       
        <li><label for="firstName">First:</label></li>
        <li>
          <input id="firstName" class="firstName" value="<?php echo $myEscapedFirst; ?>" name="first_name" type="text" size="128" maxlength="256" />
        </li>
        <li><label for="middleName">Middle:</label></li>
        <li>
          <input id="middleName" class="middleName" value="<?php echo $myEscapedMiddle; ?>" name="Middle" type="text" size="128" maxlength="256" />
        </li>
        <li><label for="lastName">Last:</label></li>
        <li>
          <input id="lastName" class="lastName" value="<?php echo $myEscapedLast; ?>" name="last_name" type="text" size="128" maxlength="256" />
        </li>
      </ul>
        <hr class="searchRule"/>
        <div class="details">
          <div class="rowOne cf">
            <div class="rowOneColOne cf">
              <ul class="leftListItem">
                <li><label for="salutation">Preferred Name:</label></li>
                <li>
                  <input id="salutation" class="salutation" value="<?php echo $myEscapedSalutation; ?>" name="nickname" type="text" size="128" maxlength="256" />
                </li>
              </ul>                       
              <ul class="leftListItem">
                <li><label for="title">Title:</label></li>
                <li>
                  <input id="title" class="title" value="<?php echo $myEscapedTitle; ?>" name="title" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="leftListItem">
                <li><label for="company">Company:</label></li>
                <li>
                  <input id="company" class="company" value="<?php echo $myEscapedCompany; ?>" name="billing_company" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="leftListItem">
                <li><label for="office">Office:</label></li>
                <li>
                  <input id="office" class="office" value="<?php echo $myEscapedOfficePhone; ?>" name="billing_phone" type="text" size="128" maxlength="256" />
                </li>
              </ul>               
            </div> <!-- rowOneColumnOne -->
            <div class="rowOneColTwo cf">
              <ul class="rightListItem">
                <li><label for="cell">Cell:</label></li>
                <li>
                  <input id="cell" placeholder="(000) 000-0000" class="cell" value="<?php echo $myEscapedMobilePhone; ?>" name="moble-phone" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="rightListItem">
                <li><label for="fax">Fax:</label></li>
                <li>
                  <input id="fax" class="fax" value="<?php echo $myEscapedFax; ?>" name="Fax" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="rightListItem">
                <li><label for="home">Home:</label></li>
                <li>
                  <input id="home" placeholder="(000) 000-0000" class="home" value="<?php echo $myEscapedHome; ?>" name="home" type="text" size="128" maxlength="256" />
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
                  <input id="address1" class="address1" value="<?php echo $myEscapedBillingAddress1; ?>" name="billing_address_1" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="leftListItem">
                <li><label for="address2">Address Line 2:</label></li>
                <li>
                  <input id="address2" class="address2" value="<?php echo $myEscapedBillingAddress2; ?>" name="billing_address_2" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="leftListItem cityState">
                <li><label for="city">City &amp; State</label></li>
                <li>
                  <input id="city" value="<?php echo $myEscapedCity; ?>" name="billing_city" type="text" maxlength="256" />
                </li>
                <li>
                  <select name="billing_state">
                    <option selected="selected"><?php if ($myEscapedState) {echo $myEscapedState;} else {echo 'Choose One';} ?></option>
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
                <li><label for="zip">Zip Code:</label></li>
                <li>
                  <input id="zip" value="<?php echo $myEscapedZip; ?>" name="billing_postcode" type="text" maxlength="5" />
                </li>
              </ul>
            </div> <!-- rowTwoColumnOne -->
            <div class="rowTwoColTwo cf">
              <ul class="rightListItem">
                <li><label for="primaryEmail">Primary Email:</label></li>
                <li>
                  <input id="txtEmail" class="primaryEmail" value="<?php echo $myEscapedEmail; ?>" name="Email" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="rightListItem">
                <li><label for="additionalEmail">Additional Email:</label></li>
                <li>
                  <input id="additionalEmail" class="primaryEmail" value="<?php echo $myEscapedAdditionalEmail; ?>" name="addl_email" type="text" size="128" maxlength="256" />
                </li>
              </ul>             
              <ul class="rightListItem">
                <li><label for="role">Role:</label></li>
                <li>
                  <select name="role" class="role" id="role">
                    <option selected="selected"><?php if ($myEscapedRole) {echo $myEscapedRole;} else {echo 'Choose One';} ?></option>    
                    <option value="Subscriber">Subscriber</option>
                    <option value="Follow-Up Emails Manager">Follow-Up Emails Manager</option>
                    <option value="Shop-Manager">Shop Manager</option>
                    <option value="s2Member Level 4">s2Member Level 4</option>
                    <option value="s2Member Level 3">s2Member Level 3</option>
                    <option value="s2Member Level 2">s2Member Level 2</option>
                    <option value="s2Member Level 1">s2Member Level 1</option>
                    <option value="Client">Client</option>
                    <option value="Contributor">Contributor</option>
                    <option value="Author">Author</option>
                    <option value="Editor">Editor</option>
                    <option value="Administrator">Administrator</option>
                    <option value="No role for this site.">No role for this site.</option>
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
                  <input id="recruitedBy" class="recruitedBy" value="<?php echo $myEscapedRecruitedBy; ?>" name="recruited_by" type="text" size="128" maxlength="256" />
                </li>
              </ul>               
              <ul class="leftListItem">
                <li><label for="contactType">Contact Type</label></li>
                <li>
                  <select name="members_code" class="contactType" id="contactType">
                    <option selected="selected"><?php if ($myEscapedMembersCode) {echo $myEscapedMembersCode;} else {echo 'Choose One';} ?></option>  
                    <option value="M1: Individual Corp.">M1: Individual Corp.</option>
                    <option value="M2: Non-Profit Gov't. Mun">M2: Non-Profit Gov't. Mun</option>
                    <option value="M3: Corp. Mentor Sponsor">M3: Corp. Mentor Sponsor</option>
                    <option value="M4: Legal Dept.">M4: Legal Dept.</option>
                    <option value="M5: Corp. Underwriter">M5: Corp. Underwriter</option>
                    <option value="M6: Displaced GC">M6: Displaced GC</option>
                    <option value="M7: GC Emeretus">M7: GC Emeretus</option>
                  </select>
                </li>
              </ul>
              <ul class="leftListItem">
                <li><label for="chapter">Chapter:</label></li>
                <li>  
                  <select name="chapter" class="chapter" id="chapter">
                    <option selected="selected"><?php if ($myEscapedChapter) {echo $myEscapedChapter;} else {echo 'Choose One';} ?></option>                      
                    <option value="ASA">Austin-San Antonio</option>
                    <option value="DFW">Dallas-Fort Worth</option>  
                    <option value="HOU">Houston</option>                
                  </select>
                </li> 
              </ul>             
              <ul class="leftListItem">               
                <li><label for="territory">Territory:</label></li>
                <li>
                  <input id="territory" class="territory" value="<?php echo $myEscapedTerritory; ?>" name="Territory" type="text" size="128" maxlength="256" />
                </li>
              </ul>
            </div> <!-- rowThreeColumnOne -->
            <div class="rowThreeColTwo cf">
              <ul class="rightListItem">
                <li><label for="joinDate">Join Date:</label></li>
                <li>
                  <input id="joinDate" placeholder="00/00/00" class="joinDate" value="<?php echo $myEscapedJoinDate; ?>" name="date_i18n" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="rightListItem">
                <li><label for="groups">Groups:</label></li>
                <li>
                  <input id="groups" class="groups" value="<?php echo $myEscapedGroups; ?>" name="groups" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="rightListItem">
                <li><label for="attorneys">Attorneys in Dept:</label></li>
                <li>
                  <select name="depart_size" class="attorneys" id="attorneys">
                    <option selected="selected"><?php if ($myEscapedDeptSize) {echo $myEscapedDeptSize;} else {echo 'Choose One';} ?></option>                                          
                    <option value="Solo">Solo</option>
                    <option value="Small: 2-5 Lawyers">Small: 2-5 Lawyers</option>
                    <option value="Medium: 6-9 Lawyers">Medium: 6-9 Lawyers</option>
                    <option value="Large: 11 or more Lawyers">Large: 11 or more Lawyers</option>
                  </select>
                </li>
              </ul>              
              <ul class="rightListItem">
                <li><label for="source">Source:</label></li>
                <li>
                  <select name="lead_source" class="source" id="source">
                    <option selected="selected"><?php if ($myEscapedSource) {echo $myEscapedSource;} else {echo 'Choose One';} ?></option>                      
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
                  <input id="assistant" class="assistant" value="<?php echo $myEscapedAss; ?>" name="assistant" type="text" size="128" maxlength="256" />
                </li>
              </ul>
              <ul class="leftListItem">
                <li><label for="assEmail">Assistant Email:</label></li>
                <li>
                  <input id="assEmail" class="assEmail" value="<?php echo $myEscapedAssEmail; ?>" name="assistant_email" type="text" size="128" maxlength="256" />
                </li>
              </ul>
            </div> <!-- rowFourColumnOne -->
            <div class="rowFourColTwo cf">
              <ul class="rightListItem">
                <li><label for="assOffice">Assistant Office:</label></li>
                <li>
                  <input id="assOffice" class="assOffice" value="<?php echo $myEscapedAssPhone; ?>" name="assistant_phone" type="text" size="128" maxlength="256" />
                </li>
              </ul>
            </div> <!-- rowFourColumnTwo -->  
          </div> <!-- row four -->
        <hr class="rowRule"/>         
          <div class="rowFive cf">
            <div class="rowFiveColOne cf">
              <ul class="leftListItem">
                <li class="industryLabel"><label for="industry">Industry:</label></li>
                <li>
                  <select name="industry" class="industry" id="industry">
                      <option selected="selected"><?php if ($myEscapedIndustry) {echo $myEscapedIndustry;} else {echo 'Choose One';} ?></option>                                                                              
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
                <li><textarea name="remarks" id="notes" cols="86" rows="6"><?php echo $myEscapedRemarks; ?></textarea></li>
              </ul>
            </div>  <!-- rowSixColumnOne -->
          </div> <!-- row six -->
        </div> <!-- details -->
        <button type="submit" class="saveButton">Save</button>
        <button type="button" class="cancelButton" data-dismiss="modal">Close</button>                                                  
      </form>
		</div> <!-- wrapperContainer -->
		<!-- end HTML template -->
      </div> <!-- end modal-body -->
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
