<!DOCTYPE html>
<html>
<head>
	<title>Dubai visa application form </title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
		body {
			margin: 0;
		    padding: 20px 0;
		    font-family: 'Inter', sans-serif;
		    background: #ddd;
		}
		.visa-application {
		    width: 80%;
		    margin: 0 auto;
		    padding: 35px;
		    background: #fff;
		    box-shadow: 0 0 10px #0000002e;
		}
		.visa-application .form-title {
		    border: 1px solid #000;
		    text-align: center;
		    padding: 20px;
		    font-size: 18px;
		    line-height: 28px;
		    font-weight: 600;
		}
		.visa-application label {
		    font-size: 15px;
		    margin-bottom: 10px;
		    display: inline-block;
		    padding: 0 10px;
		}
		.visa-application table.table tr td {
		    border: 1px solid #ddd;
		    padding: 7px 12px;
		    font-size: 14px;
		}
		.visa-application table.table {
		    width: 100%;
		    padding: 15px 0;
		}
		.visa-application table.table tr th {
		    border: 1px solid #ddd;
		    padding: 7px 12px;
		    font-size: 14px;
		}
		.visa-application .note {
		    margin: 0;
		    border: 1px solid #000;
		    padding: 15px;
		}
		.visa-application ol li {
		    padding-bottom: 12px;
		}
		.visa-application .text-center {
		    text-align: center;
		}
		.visa-application .sign {
		    text-align: right;
		}
		.visa-application .terms ol li {
		    font-size: 14px;
		}
		.visa-application .terms {
		    padding: 15px 0;
		}
		.visa-application span.line {
		    border-bottom: 1px solid #000;
		    width: 150px;
		    display: inline-block;
		}
	</style>
</head>
<body>
	<div class="visa-application">
		<div class="form-title">
			DUBAI VISA APPLICATION FORM -UAE <br>(PLEASE FILL IN BLOCK LETTERS)
		</div>
		<ol>
			<li>
				<b> Type of visa being applied for (Tick one): </b>
				<label>14Days / Service Visa</label>
				<input type="checkbox" name="">
				<label>Tourist / 30Days</label>
				<input type="checkbox" name="">
				<label>90Days / Visit</label>
				<input type="checkbox" name="">
				<label>Multi Entry Short Term: 30 Days</label>
				<input type="checkbox" name="">
				<label>Multi Entry Long Term: 90 Days</label>
				<input type="checkbox" name="">
				<label>Express Service</label>
				<input type="checkbox" name="">
				<br>
				<label>Emirates PNR</label>
				<input type="text" name="">
				<label>Ticket No</label>
				<input type="text" name="">
				<label>Travel Date</label>
				<input type="text" name="">
				<p>* Express Service: This is an optional service available to Visa Applicants, who will receive priority in processing Visa applications.<br>The Visa Applications will be processed and sent to EK on a priority basis. (Please see terms and conditions). </p>
			</li>
			<li><b>Full name of Applicant:</b> {{$booking->name}}</li>
			<li>
				<label>Skyward membership number, if any</label>
				<input type="text" name="">
				<label>Blue</label>
				<input type="text" name="">
				<label>Silver</label>
				<input type="text" name="">
				<label>Silver</label>
				<input type="text" name="">
			</li>
			<li>
				<b>Current residential address (Mandatory Information for Correspondence)</b>
				<table class="table" cellpadding="0" cellspacing="0"> 
					<tr>
						<td>Line -1</td>
						<td></td>
					</tr>
					<tr>
						<td>Line - 2</td>
						<td></td>
					</tr>
					<tr>
						<td>City, Country</td>
						<td></td>
					</tr>
					<tr>
						<td>Mobile</td>
						<td></td>
					</tr>
					<tr>
						<td>Land Line</td>
						<td></td>
					</tr>
					<tr>
						<td>Fax No.</td>
						<td></td>
					</tr>
					<tr>
						<td>Email ID</td>
						<td></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Are you applying as a dependent of Principal Applicant?</b><span class="line"></span><br>
				<input type="checkbox" name="">
				<label>Yes: Write name of the Principal Applicant:</label><br>
				<input type="checkbox" name="">
				<label>No</label>
			</li>
			<li>
				<b>If applying as Principal Applicant, complete the following:-</b><br>
				<table class="table" cellpadding="0" cellspacing="0">
					<tr>
						<td>Name of Business/Employer</td>
						<td></td>
					</tr>
					<tr>
						<td>Address of Business/Employer</td>
						<td></td>
					</tr>
					<tr>
						<td>Designation</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2"><b>IMPORTANT:</b> unemployed or retired persons should indicate above the details of last employment, and indicate date of cessation of last employment here: <span class="line"></span></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Personal details</b>
				<table class="table" cellpadding="0" cellspacing="0">
					<tr>
						<td>a. Nationality</td>
						<td></td>
					</tr>
					<tr>
						<td>b. Previous nationality if any</td>
						<td></td>
					</tr>
					<tr>
						<td>c. Full name (Name, middle name, surname) </td>
						<td></td>
					</tr>
					<tr>
						<td>d. Father’s name (Name, middle name, surname)</td>
						<td></td>
					</tr>
					<tr>
						<td>e. Mother’s name (Name, middle name, surname)</td>
						<td></td>
					</tr>
					<tr>
						<td>e. Mother’s name (Name, middle name, surname)</td>
						<td><input type="text" name=""><label>Male</label><input type="text" name=""><label>Female</label></td>
					</tr>
					<tr>
						<td>g. Marital Status</td>
						<td></td>
					</tr>
					<tr>
						<td>h. Married female applicants – husband’s name</td>
						<td></td>
					</tr>
					<tr>
						<td>i. Occupation</td>
						<td></td>
					</tr>
					<tr>
						<td>j. Religion</td>
						<td></td>
					</tr>
					<tr>
						<td>k. Educational qualifications</td>
						<td></td>
					</tr>
					<tr>
						<td>l. Main language spoken</td>
						<td></td>
					</tr>
					<tr>
						<td>m. Date of birth (dd-mm-yyyy)</td>
						<td></td>
					</tr>
					<tr>
						<td>n. Place of birth</td>
						<td><label>Country</label> <label>Place</label></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Passport details</b><br>
				<table class="table" cellpadding="0" cellspacing="0">
					<tr>
						<td>a. Passport type</td>
						<td colspan="2"><label>Ordinary</label><input type="checkbox" name=""><label>Diplomatic/Official</label><input type="checkbox" name=""></td>
						<td></td>
					</tr>
					<tr>
						<td>b. Passport number</td>
						<td></td>
						<td>c. Issuing Government</td>
						<td></td>
					</tr>
					<tr>
						<td>d. Place and date of issue</td>
						<td></td>
						<td>E. Expiry date</td>
						<td></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Purpose of Visit</b>
				<input type="checkbox" name="">
				<label>Tourist</label>
				<input type="checkbox" name="">
				<label>Business</label>
				<input type="checkbox" name="">
				<label>Family</label>
				<input type="checkbox" name="">
				<label>Visit</label>
			</li>
			<li>
				<b>Names of family members accompanying you on this trip</b><br>
				<table class="table" cellpadding="0" cellspacing="0">
					<tr>
						<th>Name</th>
						<th>Passport no.</th>
						<th>Relation</th>
					</tr>
					<tr>
						<td>1.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>2.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>3.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>4.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>5.</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Contact in UAE (Mandatory Information)</b><br>
				<table class="table" cellpadding="0" cellspacing="0"> 
					<tr>
						<td>Name / Relationship with host</td>
						<td></td>
					</tr>
					<tr>
						<td>Address / Hotel Confirmation Voucher</td>
						<td></td>
					</tr>
					<tr>
						<td>Area - City</td>
						<td></td>
					</tr>
					<tr>
						<td>Phone No.</td>
						<td></td>
					</tr>
					<tr>
						<td>E-mail ID</td>
						<td></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Mandatory documents to be submitted with the Visa Application form:</b><br>
				<table class="table" cellpadding="0" cellspacing="0">
					<tr>
						<th>List of documents</th>
						<th>Applicant</th>
						<th>Application Centre</th>
					</tr>
					<tr>
						<td>1. Completed visa application form</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>2. Applicants colour photograph with white background</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>3. Photocopy of Emirates and/or Fly Dubai Airline confirmed ticket</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>4. Applicant's clear colored passport copy (Bio Pages & Observation Page if any). The passport must be valid for at least 6 months</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>5. Guarantor’s passport with a photocopy of Bio Pages, UAE residence visa page Copy showing validity of the residency for 6 months at least.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>6 Emirates ID, Labor contract, along with original for verification and service letter original OR If self-employed then trade license copy with original copy for Verification.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>7. Security Deposit of AED 1000 paid in cash, which is refundable once the applicant Exits out of UAE.</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</li>
			<li>
				<b>Have you applied for a Dubai Visa through VFS in the past? </b> 
				<label>Yes</label>
				<input type="checkbox" name="">
				<label>No</label>
				<input type="checkbox" name=""><br>
				<label>If you have ticked Yes, then kindly provide date of last travel in the space:-</label>
				<input type="text" name="">
				<p><b>***  Visa Fees are subject to change without prior notice. </b></p>
				<p class="note">IMPORTANT: You are recommended not to travel to Dubai if your flights out of Dubai do not get confirmed. Any overstay beyond duration of Visa invites heavy fines and penal action - there will be no waiver on any grounds. Please note and strictly comply - All applicants should read the conditions mentioned below before signing the application form. Incomplete and unsigned applications will not be accepted.</p>

				<div class="terms">
					<p class="text-center"><b>TERMS AND CONDITIONS</b></p>
					<ol>
						<li>The facility is open only to a valid passport holder and Nationals of countries requiring a prearranged UAE visa visiting Dubai traveling on Emirates Airline (herein referred to “EK”) and Fly Dubai Airlines (herein referred to “FZ”)fulfilling the eligibility conditions announced from time to time by the Government of Dubai / Dubai Naturalization and Residency Department (“DNRD”). Issuance and approval of a visa is solely regulated by Government of Dubai / and governed by their rules and regulations that are amended from time to time. Subject to the applicant passenger fulfilling the eligibility conditions EK will sponsor the applicant to Dubai.</li>
						<li>The facility of applying through VFS (GCC) LLC. Herein referred to as (“VFS (GCC) LLC”) is open only to valid passport holders a valid passport holder and Nationals of countries requiring a prearranged UAE visa visiting Dubai traveling on Emirates Airline (herein referred to “EK”) and Fly Dubai Airlines (herein referred to “FZ”) EK and FZ has outsourced the administrative process of facilitating Visa applications to VFS (GCC) LLC. VFS (GCC) LLC has setup and is managing the Dubai Visa Processing Centre (herein after referred to as “DVPC”) for this purpose. VFS  GCC) LLC role is limited to accepting the visa application and required documentation, forwarding the application to Government of Dubai / DNRD for consideration of visa issue and communicating the Government of Dubai’s / DNRD’s Decision on the application for visa to the applicant. We have contracted elements of our services to our authorized subcontracted agents Vasco Worldwide</li>
						<li>Visa fees are non-refundable under any circumstances whatsoever.</li>
						<li>Each visa applicant desirous of being sponsored for a visa by EK OR FZ should be holding a valid ticket issued by EK OR FZ and booked to travel on EK/FZ. VFS (GCC) LLC/EK/FZ will not responsible for and will not be liable for the applicant not been able to travel due to denied boarding offloading, cancellation of flight, delays or and any other cause or circumstances beyond their control. VFS (GCC) LLC shall also not be liable in the case of any change in the date of travel not being communicated to VFS (GCC) LLC.</li>
						<li>The Applicant/passenger will be required to fill in a Visa Application Form accurately and submit the same with the applicable visa fees, valid passport and necessary documentation as specified in the Visa Application Form. Applicants must hold valid travel documents and comply with the requirements of Government of Dubai / DNRD and requirements specified on the Visa Application Form.</li>
						<li>VFS (GCC) LLC does not accept any responsibility for late, lost or misplaced applications and / or the veracity of the contents of the application. Incomplete and double applications will be disregarded.</li>
						<li>The decision to grant or refuse a visa is the sole prerogative of the Government of Dubai / DNRD. VFS (GCC) LLC merely forwards the application and the issuance or pendency or refusal of the visa is the prerogative of the Government of Dubai / DNRD. The decision of the Government of Dubai / DNRD is final. In case of rejection of visa application, no correspondence will be entertained and no visa fees will be refunded and no reasons will be required to be given. It is clarified that processing of the visa application is prevented, delayed or restricted or interfered with for any reasons whatsoever resulting in delay by Government of Dubai / DNRD to process the applicants visa application, then VFS (GCC) LLC/EK/FZ shall not be liable to the applicant for any loss or damage which may be suffered as result of such causes and VFS (GCC) LLC/EK/FZ shall be discharged of all its obligations hereunder.</li>
						<li>Issuance of a visa or approval on the visa application does not in any way give the applicant/passenger a right to enter Dubai. The entry is at the sole discretion of the Immigration officer at Dubai Airport who is a representative of Government of Dubai / DNRD. In case of denial of visa or entry into Dubai by the Government of Dubai / DNRD, VFS (GCC) LLC /EK/FZ shall in no way be liable to the applicant in any manner whatsoever.</li>
						<li>The visa must be accepted as offered and is non – transferable.</li>
						<li>When the Visa application of the Applicants is approved by the Government of Dubai / DNRD, it is the applicant’s sole responsibility to ensure that they have received copy of the approved visa from the respective Visa Application Centre on email and the same is required to be submitted to the Dubai authorities on arrival in Dubai.</li>
						<li>VFS (GCC) LLC /EK/FZ shall not be liable for any losses or damages, which the applicant may suffer arising from delay in processing or receiving the visa.</li>
						<li>The visa is valid as per the Government of Dubai / DNRD rules and regulations as amended from time to time. The visa must be availed within its period of validity.</li>
						<li>Applicants understand and agree that forwarding Visa application to Government of Dubai / DNRD is at the sole discretion of EK/FZ as the sponsor and VFS (GCC) LLC will not be liable in any manner for the same including for any delay and or rejection.</li>
						<li>Respective Countries and Dubai Government regulations apply and in case this facility is deemed invalid or cancelled due to any countries / Dubai Government regulation or order, VFS (GCC) LLC shall not be liable in any manner whatsoever to the applicant.</li>
						<li>Applicants will be solely responsible to ensure they fulfill their respective country and Dubai Government requirements for travel which may include Police Clearance, etc.</li>
						<li>VFS (GCC) LLC shall take all reasonable measures to ensure that information provided by the Applicants in its application form shall remain Confidential. However VFS (GCC) LLC shall not be liable for any unauthorized access by any means to that information.</li>
						<li>Express Service Facility: is meant to give priority to Applicants in processing of their Visa applications and sending the same for processing such applications to EK and/or FZ on a priority basis. VFS/ EK and/or FZ do not assure any time frame by which the Government of Dubai/DNRD will process the Visa application. The Applicant understands and agrees that fulfillment of the Express service facility within the stipulated time depends solely on the approval of the Government of Dubai / DNRD and VFS shall not be liable in case of refusal or delay by Government of Dubai / DNRD in providing the Visa. Express Service Facility is expected to quicken the processing of the Visa application at VFS/EK and/or FZ.</li>
						<li>The Applicant agrees to indemnify and hold VFS (GCC) LLC, its officers, directors, agents, subsidiaries, clients, joint venture partners and employees, harmless from any Claim, expense, loss, damages or demand, including reasonable attorney’s fees, incurred or sustained by VFS (GCC) LLC and / or its officers, directors, agents, subsidiaries, clients, joint venture partners and employees arising out of the breach of these terms & conditions by the Applicant and / or any act of omission or Commission attributable to the Applicant (or) violation by the Applicant of any law of any country or the rights of a third party.</li>
						<li>In no event and under no circumstances shall VFS (GCC) LLC, and/or its representatives be liable for any direct, indirect, punitive, incidental, special, consequential Damages or any damages whatsoever to anyone.</li>
						<li>VFS (GCC) LLC / EK/FZ reserves the right to add, alter or vary these terms and conditions at any time without notice or liability and all applicants availing of this facility shall be bound by the same.</li>
						<li>Security Deposit refundable on return (hereinafter referred to as “Security deposit”) in the form of a Cash shall be paid by the sponsor applying for Visa. The Security deposit is returned to the sponsor once the applicant exits from Dubai, & the photocopy of the entry & exit stamp from Dubai is submitted in the respective VAC. However in the event the Applicant does not collect the security deposit within a period of 30 days from the date of expiry of his/her visa, the said security deposit will be banked.</li>
						<li>These terms and conditions shall be governed by and construed in accordance with the laws of UAE. Any claims or disputes arising in relation to the services provided by VFS (GCC) LLC for the applicant shall be subject to the exclusive jurisdiction of the court of Dubai UAE, territorial jurisdiction.</li>
						<li>If you have not opted out of receiving marketing materials, we may also use your personal information to identify other products and services that might be of interest to you and to market additional goods, services and special offers from us, our affiliates or our third party business associates. You can choose not to allow VFS (GCC) LLC to use or disclose your personal information for marketing purposes by indicating your preference on the visa application form.</li>
						<li>Applicants expressly declare that they do understand these terms & conditions and are individuals and not a company or any professional and or commercial entity</li>
					</ol>
				</div>
			</li>
		</ol>
		<div class="note">
			<b>I confirm that the above terms and conditions have been read and understood by me and I agree to abide by them.</b><br>
			<input type="checkbox" name="">
			<label>I hereby give my consent to VFS to use my personal information to identify other products and services that might be of interest to me and to market additional goods, services and special offers from VFS, its affiliates, or VFS’s third party business associates.</label>
			<p class="text-center"><b>OR</b></p>
			<input type="checkbox" name="">
			<label>I do not wish to have my personal information used to identify other products and services that might be of interest to me and to market additional goods, services and special offers from VFS, its affiliates, or VFS’s third party business associates.</label>
		</div>
		<p class="text-center">STRICTLY FOR OFFICE USE</p>
		<p><u>ASSESSMENT</u></p>
		<input type="checkbox" name="">
		<label>Pending</label>
		<input type="checkbox" name="">
		<label>Comments:</label>
		<input type="checkbox" name="">
		<label>Forward to Appraisal Team</label>
		<div class="sign">
			<label>Sign:</label><span class="line"></span>
			<label>Date:</label><span class="line"></span>
			<label>Time:</label><span class="line"></span><br>
			<label>Pending cleared: Sign:</label><span class="line"></span>
			<label>Date:</label><span class="line"></span>
			<label>Time:</label><span class="line"></span>
		</div>
		<hr>
		<p><u>APPRAISAL</u></p>
		<input type="checkbox" name="">
		<label>Approved</label>
		<input type="checkbox" name="">
		<label>Comments:</label>
		<input type="checkbox" name="">
		<label>Refused</label>
		<div class="sign">
			<label>Sign:</label><span class="line"></span>
			<label>Date:</label><span class="line"></span>
			<label>Time:</label><span class="line"></span>
		</div>
		<hr>
		<p><u>CONFIRMATION</u></p>
		<label>SRN:</label><span class="line"></span>
		<label>Application #</label><span class="line"></span><br>
		<input type="checkbox" name="">
		<label>Comments, if Any:</label>
		<div class="sign">
			<label>Sign:</label><span class="line"></span>
			<label>Date:</label><span class="line"></span>
			<label>Time:</label><span class="line"></span>
		</div>
		<hr>
		<p><u>DNRD</u></p>
		<input type="checkbox" name="">
		<label>Approved</label>
		<input type="checkbox" name="">
		<label>Refused</label>
		<div class="sign">
			<label>VCN:</label><span class="line"></span>
			<label>Issued on:</label><span class="line"></span><br>
			<label>Sign:</label><span class="line"></span>
			<label>Date:</label><span class="line"></span>
			<label>Time:</label><span class="line"></span>
		</div>
		<hr>
		<p><u>AUDIT</u></p>
		<input type="checkbox" name="">
		<label>Comments, if any:</label>
		<div class="sign">
			<label>Sign:</label><span class="line"></span>
			<label>Date:</label><span class="line"></span>
			<label>Time:</label><span class="line"></span>
		</div>
	</div>
</body>
</html>