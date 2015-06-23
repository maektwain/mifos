<!DOCTYPE html>
<html lang="en" ng-app="loanapp">
<head>
	<meta charset="UTF-8">
	<title>Wizards</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/app.css" type="text/css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
	<link rel="stylesheet" href="http://danielcrisp.github.io/angular-rangeslider/angular.rangeSlider.css">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/angular/angular.min.js"></script>
	<script type="text/javascript" src="js/angular/ng-file-upload-shim.min.js"></script>
	<script type="text/javascript" src="js/angular/ng-file-upload.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.1.2/angular-strap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.1.2/angular-strap.tpl.min.js"></script>
	<script type="text/javascript" src="js/ui-bootstrap-custom-0.13.0.min.js"></script>
	<script type="text/javascript" src="js/ui-bootstrap-custom-tpls-0.13.0.min.js"></script>
	<script type="text/javascript" src="js/angular/loan-controller.js"></script>	
	<script type="text/javascript" src="http://danielcrisp.github.io/angular-rangeslider/angular.rangeSlider.js"></script>
</head>
<body style="background-color:#F3F5F8" ng-controller="loanController">
	<div class="container">
		<div class="row lap-container">
			<div id="detLoan" class="lap lap-now col-md-23 col-sm-23">
				<div class="lap-header"><i class="fa fa-check"></i></div>
				<div class="lap-content">
					<h3 class="lap-title">Stage 1</h3>
				</div>
			</div>

			<div id="calcLoan" class="lap col-md-23 col-sm-23">
				<div class="lap-header"><i class="fa fa-check"></i></div>
				<div class="lap-content">
					<h3 class="lap-title">Stage 2</h3>
				</div>
			</div>

			<div id="panEn" class="lap col-md-23 col-sm-23">
				<div class="lap-header"><i class="fa fa-check"></i></div>
				<div class="lap-content">
					<h3 class="lap-title">Stage 3</h3>
				</div>
			</div>

			<div id="proDet" class="lap col-md-23 col-sm-23">
				<div class="lap-header"><i class="fa fa-check"></i></div>
				<div class="lap-content">
					<h3 class="lap-title">Stage 4</h3>
				</div>
			</div>
			<div id="CustDet" class="lap col-md-23 col-sm-23">
				<div class="lap-header"><i class="fa fa-check"></i></div>
				<div class="lap-content">
					<h3 class="lap-title">Stage 5</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div class="container">
			<div class="row">
			    <div id="createCli" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Create Client</b></h3><!-- {{jsonData}} -->
						<div class="row">
							<div class="col-sm-12 col-md-4">
								<label class="control-label" for="name">First name *</label>
								<div class="form-group">
			                        <input type="text" ng-model="jsonData.firstname" id="name" name="name" placeholder="First name" class="form-control input-lg" placeholder="First Name" tabindex="1">
			                        <div class="alert alert-danger" style="background-color:#FF4B4B" ng-show="firstNameErr">
			                        	<p style="color:#fff">{{firstNameErr}}</p>
			                        </div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<label class="control-label" for="email">Middle name</label>
								<div class="form-group">
									<input type="text" ng-model="jsonData.middlename" name="email" id="email" class="form-control input-lg" placeholder="Middle name" tabindex="2">
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<label class="control-label" for="email">Last name *</label>
								<div class="form-group">
									<input type="text" ng-model="jsonData.lastname" name="email" id="email" class="form-control input-lg" placeholder="Last name" tabindex="2">
									<div class="alert alert-danger" style="background-color:#FF4B4B" ng-show="lastNameErr">
			                        	<p style="color:#fff">{{lastNameErr}}</p>
			                        </div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" for="father">Father/Husband</label>
							<input type="text" ng-model="jsonData.fathername" name="father" id="father" class="form-control input-lg" placeholder="Father/Husband" tabindex="3">
						</div>
						<div class="form-group">
							<label class="control-label" for="dob">DOB *</label>
							<input type="text" class="form-control input-lg" ng-model="mustBeTeen" autoclose="true" data-date-format="dd MMMM yyyy" name="date" placeholder="01 January 2000" bs-datepicker>
							<!-- <input type="text" ng-model="jsonData.dateOfBirth" name="dob" id="dob" class="form-control input-lg" placeholder="dd/mm/yyyy" tabindex="3"> -->
							<div class="alert alert-danger" style="background-color:#FF4B4B" ng-if="dobErr">
	                        	<p style="color:#fff">{{dobErr}}</p>
	                        </div>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input type="text" ng-model="jsonData.emailAddress" name="email" id="email" class="form-control input-lg" placeholder="xyz@xyz.com" tabindex="4">
							<!-- <div class="alert alert-danger" style="background-color:#FF4B4B" ng-if="dobErr">
	                        	<p style="color:#fff">{{emailErr}}</p>
	                        </div> -->
						</div>
						<div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">Mobile No</label>
							<input type="text" ng-model="jsonData.mobileNo" name="mobile" id="mobile" class="form-control input-lg" placeholder="Enter Your 10 digit Mobile number" tabindex="4">
							<div class="alert alert-danger" style="background-color:#FF4B4B" ng-if="mobiErr">
	                        	<p style="color:#fff">{{mobiErr}}</p>
	                        </div>
						</div>
						
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<span style="color:#fff"><b>Step 1</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
										<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedOne();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>		
				<div id="otpGen" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>One Time Password</b></h3>
						<div class="row">
							<div class="col-sm-12 col-md-6 col-md-offset-3">
								<label class="control-label" for="name">Enter Your OTP password which we send to your mobile</label>
								<div class="form-group">
			                        <input type="text" id="otp" name="otp" class="form-control input-lg" tabindex="1">
								</div>
								<div class="checkbox">
								    <label>
								      <input type="checkbox" class="inline" ng-model="authentic"> I authenticate representatives to call me or email me. The consent will override any DNC registration
								    </label>
								</div>
							</div>
						</div>
						<!-- <div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">Mobile No *</label>
							<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Enter Your 10 digit Mobile number" tabindex="4">
						</div> -->
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
										<span style="color:#fff"><b>Step 2</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedTwo();" ng-disabled="!authentic" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="chosenOne" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<div class="row" style="padding-bottom: 25px;">
							<!-- <div class="col-md-12">
								<div class="row" id="chooseLo">
									<div class="col-md-4 col-xs-12 text-center" style="padding:0">
										<a id="igold" style="display:block;background-color: gold;padding: 20px;font-weight:bold;text-decoration:none;color:#fff;cursor:pointer">Gold</a>
									</div>
									<div class="col-md-4 col-xs-12 text-center" style="padding:0">
										<a id="imotor" style="display:block;background-color: #72C8FA;padding: 20px;font-weight:bold;text-decoration:none;color:#fff;cursor:pointer">Two Wheeler</a>
									</div>
									<div class="col-md-4 col-xs-12 text-center" style="padding:0">
										<a id="imsme" style="display:block;background-color: #71DAA2;padding: 20px;font-weight:bold;text-decoration:none;color:#fff;cursor:pointer">MSME</a>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-md-12" style="margin-top:30px;" id="relGold">
								<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b class="gL">Gold Loan</b></h3>
								<div class="row">
									<div class="form-group">
										<label class="control-label" for="estg">Product *</label>
										<div class="radio">
										  <label>
										    <input type="radio" name="prod" id="emi" ng-model="percenta" value="emiPer">EMI <b ng-show="percenta == 'emiPer'">15 %</b>
										  </label>
										  <label style="margin-left:15px;">
										    <input type="radio" name="prod" id="tln" ng-model="percenta" value="termLoan">Term Loan <b ng-show="percenta == 'termLoan'">24 %</b>
										  </label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label" for="estg">Estimated Gold Value *</label>
										<p id="ires" class="form-control-static">{{esgol}}</p>
									</div>
									<div class="form-group">
										<label class="control-label" for="estrng">Estimate Range</label>
										<div range-slider min="0" max="300000" model-max="esgol" pin-handle="min"></div>
										<div range-slider min="0" max="300000" model-max="esgol" pin-handle="min"></div>
										model-min="demo6.min" model-max="demo6.max"
									</div>
									<div class="form-group">
										<label class="control-label" for="tor">Tenor * <small>(in months)</small></label>
										<select name="" id="" class="form-control input-lg" style="padding: 0 16px;">
											<option value="12">12 Months</option>
											<option value="18">18 Months</option>
											<option value="24">24 Months</option>
											<option value="36">36 Months</option>
											<option value="48">48 Months</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="estg">When do you want it *</label>
										<select class="form-control input-lg" name="" id="" style="padding: 0 16px;">
											<option value="">Today</option>
											<option value="">Within a Week</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="ires">Interest * </label>
										<p id="ires" class="form-control-static">12323</p>
									</div>
								</div>
							</div> -->
							<div class="col-md-12" style="margin-top:30px;" id="relWheel">
								<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b class="tW">Two Wheeler Loan</b></h3>
								<div class="row">
									<!-- <div class="form-group">
										<label class="control-label" for="estg">Product *</label>
										<div class="radio">
										  <label>
										    <input type="radio" name="prod" id="emi">EMI
										  </label>
										</div>
									</div> -->
									<div class="form-group">
										<label class="control-label" for="estg">Cost of bike(on road) *</label>
										<p id="ires" class="form-control-static">{{esgol}}</p>
									</div>
									<div class="form-group">
										<label class="control-label" for="estrng">Estimate Range</label>
										<div range-slider min="0" max="300000" model-max="esgol" pin-handle="min"></div>
										<div class="alert alert-danger" style="background-color:#FF4B4B" ng-if="principalErr">
				                        	<p style="color:#fff">{{principalErr}}</p>
				                        </div>
									</div>
									<div class="form-group">
										<label class="control-label" for="tor">Tenor * <small>(in months)</small></label>
										<select class="form-control input-lg" style="padding: 0 16px;" ng-model="defMonth" ng-change="tenorIn(defMonth)" ng-options="month.name for month in monthsLs">
											<option value="">Select Months</option>		
										</select>
										<!-- <select class="form-control input-lg" style="padding: 0 16px;" ng-init="somethingHere = options[0]" ng-model="noPayment" ng-change="createNewLoan(noPayment)"> -->
									</div>
									<div class="form-group">
										<label class="control-label" for="estg">When do you want it *</label>
										<select class="form-control input-lg" style="padding: 0 16px;" ng-change="createNewLoan()" ng-model="opton" ng-options="relieve for relieve in wenrel">
											<option value="">When do you want?</option>
										</select>
									</div>
									<!-- <div class="form-group">
										<label class="control-label" for="ires">Interest * </label>
										<p id="ires" class="form-control-static">{{abinterest}}</p>
									</div> -->
									<div class="form-group">
										<label class="control-label" for="wibike">Which bike * </label>
										<select class="form-control input-lg" ng-model="selectBike" style="padding: 0 16px;" ng-options="bike.name for bike in bikeType"></select>
									</div>
								</div>
							</div>
							<!-- <div class="col-md-12 hide" style="margin-top:30px;" id="relMsme">
								<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b class="mS">MSME Loan</b></h3>
								<div class="row">
									<div class="form-group">
										<label class="control-label" for="estg">Product *</label>
										<div class="radio">
										  <label>
										    <input type="radio" name="prod" id="emi" ng-model="mspercenta" value="msemiPer">EMI <b ng-if="mspercenta == 'msemiPer'">15 %</b>
										  </label>
										  <label style="margin-left:15px;">
										    <input type="radio" name="prod" id="tln" ng-model="mspercenta" value="mstermLoan">Term Loan <b ng-if="mspercenta == 'mstermLoan'">24 %</b>
										  </label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label" for="estg">Amount *</label>
										<p id="ires" class="form-control-static">12323</p>
									</div>
									<div class="form-group">
										<label class="control-label" for="tor">Tenor * <small>(in months)</small></label>
										<select name="" id="" class="form-control input-lg" style="padding: 0 16px;">
											<option value="12">12 Months</option>
											<option value="18">18 Months</option>
											<option value="24">24 Months</option>
											<option value="36">36 Months</option>
											<option value="48">48 Months</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="estrng">Estimate Range</label>
										<div range-slider min="0" max="300000" model-max="esgol" pin-handle="min"></div>
									</div>
									<div class="form-group">
										<label class="control-label" for="estg">When do you want it *</label>
										<select class="form-control input-lg" name="" id="" style="padding: 0 16px;">
											<option value="">Today</option>
											<option value="">Within a Week</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="ires">Interest * </label>
										<p id="ires" class="form-control-static">12323</p>
									</div>
									<div class="form-group">
										<label class="control-label" for="ecv">Estimated Property Value(Collateral) </label>
										<input type="text" name="ecv" id="ecv" class="form-control input-lg" tabindex="3">
									</div>
								</div>
							</div> -->
						</div>
						<!-- <div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">Mobile No *</label>
							<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Enter Your 10 digit Mobile number" tabindex="4">
						</div> -->
						
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<span style="color:#fff"><b>Step 1</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
										<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedThree();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="elAmount" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Eligibility Amount</b></h3>
						<div class="row">
							<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
								<label class="control-label">An eligibility amount is declared</label>
							</div>
							<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
								<label class="control-label">Eligibility Amount - {{eligibilityAmount}}</label>
							</div>
							<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
								<label class="control-label">Interest - 15%</label>
							</div>
							<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
								<label class="control-label">Are you interested?</label>
							</div>
						</div>
						<!-- <div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">Mobile No *</label>
							<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Enter Your 10 digit Mobile number" tabindex="4">
						</div> -->
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
										<span style="color:#fff"><b>Step 2</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedFour();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="uploadPan" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Upload PAN Documents</b></h3>
						<div class="form-group">
							<label class="control-label" for="father">Pan no *</label>
							<input type="text"  class="form-control input-lg" ng-model="panNumber" placeholder="Pan no">
						</div>
						<div class="form-group">
							<label class="control-label" for="dob">Upload PAN card *</label>
							<button class="btn btn-default" ngf-select ng-model="files" style="display:block;font-size:18px"> Choose File </button>
							<span>{{file.name}}</span>
							<!-- <input type="file" id="file" class="uplBtn" ng-model="files" style="padding-left:0"> -->
							<!-- ngf-select="" ng-model="files" ngf-multiple="true" -->
						</div>
						<div class="form-group">
							<label class="control-label" for="email">KYC no</label>
							<input type="text" class="form-control input-lg" ng-model="kyc.documentKey" placeholder="KYC no">
						</div>
						<div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">ID Type</label>
							<select class="form-control input-lg" ng-model="proofTypeId" style="padding: 0 16px;" ng-options="type for type in idType">
								<option value="">Select Id Type</option>		
							</select>
						</div>
						<div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">*Upload KYC</label>
							<!-- to upload multiple files ngf-multiple="true" -->
							<button class="btn btn-default" ngf-select ng-model="kycfiles" style="display:block;font-size:18px"> Choose File </button>
							<span>{{kycDoc.name}}</span>
						</div>
						
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<span style="color:#fff"><b>Step 1</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button ng-click="proceedFive();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="uploadState" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Upload Statements</b></h3>
						<div class="form-group">
							<label class="control-label" for="father">Category *</label>
							<select id="clienttypeId" ng-model="updateClient.clientTypeId" class="form-control input-lg" style="padding: 0 16px;" ng-options="clienttype.id as clienttype.name for clienttype in clienttypeOptions">
								<option value="">Select Client type</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="father">Profession *</label>
							<select id="clientClassificationId" ng-model="updateClient.clientClassificationId" class="form-control input-lg" style="padding: 0 16px;" ng-options="clientClassification.id as clientClassification.name for clientClassification in clientClassificationOptions">
								<option value="">Select Client Classification</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="father">Salary *</label>
							<!-- Gross Income_cd_Gross Income  key value -->
							<select ng-model="grossId" ng-options="gross.id as gross.value for gross in grossIncome" class="form-control input-lg" style="padding: 0 16px;">
								<option value="">Select one</option>
							</select>
						</div>
						<div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">*Upload Picture</label>
							<div>
								<button class="btn btn-default" ngf-select ng-model="pics" style="display:inline-block;font-size:18px"> Choose File </button>
								<span>{{picture.name}}</span>
								<span><b>or</b></span>
								<button class="btn btn-default" ng-click="capturePic()" style="display:inline-block;font-size:18px"> Webcam </button>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">*Upload Bank Statement</label>
							<button class="btn btn-default" ngf-select ng-model="bankstat" style="display:block;font-size:18px"> Choose File </button>
							<span>{{statement.name}}</span>
						</div>
						
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<span style="color:#fff"><b>Step 1</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedSix();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div id="officialAddre" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Custom Details</b></h3>
						<div class="form-group">
							<label class="control-label" for="father">Name of Employer</label>
							<input type="text" ng-model="official.employer" class="form-control input-lg" placeholder="Name of Employer" tabindex="3">
						</div>
						<div class="form-group">
							<label class="control-label" for="father">Permanent Residential Address</label>
							<input type="text" ng-model="official.address" class="form-control input-lg" placeholder="Permanent Residential Address" tabindex="3">
						</div>
						
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<span style="color:#fff"><b>Step 1</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
										<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedSeven();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div id="congRats" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);">
					<form role="form" method="post">
						<h3 class="text-center" style="margin-bottom: 10px;color:#8A92A1"><b>Congratulations You are eligible for a loan amount</b></h3>
						<p class="text-center" style="margin-bottom: 10px;color:#8A92A1">We will soon get in touch</p>
						<div class="row">
							<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
								<label class="control-label">Loan Reference no - {{loanId}}</label>
							</div>
							<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
								<label class="control-label">Eligibility Amount - {{eligibilityAmount}}</label>
							</div>
						</div>
						<!-- <div class="form-group" style="margin-bottom: 30px;">
							<label class="control-label" for="mobile">Mobile No *</label>
							<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Enter Your 10 digit Mobile number" tabindex="4">
						</div> -->
						<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
								<div class="col-md-6">
									<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
										<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
										<span style="color:#fff"><b>Step 2</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
									</ul>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<button type="submit" ng-click="proceedEight();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-12">
		<script type="text/ng-template" id="capturepic.html">
		    <div class="modal-header">
		        <h3 class="bolder">Take Snap and Upload Your Picture</h3>
		    </div>
		    <div class="modal-body">
	            <div class="row">
	            	<div class="col-md-6">
		                 <webcam on-stream="onStream(stream)" on-error="onError(err)" on-streaming="onSuccess()" channel="channel">
				            <div class="alert alert-danger" ng-show="webcamError">
				                <span>Webcam could not be started. Did you give access to it?</span>
				            </div>
				        </webcam>
				    </div>
				    <div class="col-md-6">
			        	<canvas id="snapshot" class="well" style="width:100%;padding:0"></canvas>
			        </div>	
		            <div class="col-md-12 text-center" style="margin-bottom: 10px">
		                <button class="btn btn-warning" ng-click="makeSnapshot()">
		                    <i class="fa fa-camera"></i> Snapshot
		                </button>
		            </div>
	    		</div>
			    <div class="modal-footer">
			        <button class="btn btn-warning" ng-click="cancel()">cancel</button>
			        <button class="btn btn-primary" ng-click="uploadSnap()">upload</button>
			    </div>
		</script>
	</div>
	<!-- <script type="text/javascript">
	
	(function(){
	
		// Stage2 tabs Change 
		$('#igold').click(function() {
			$('#relWheel').addClass('hide')
			$('#relMsme').addClass('hide')
			$('#relGold').removeClass('hide');
		});
		$('#imotor').click(function() {
			$('#relGold').addClass('hide')
			$('#relMsme').addClass('hide')
			$('#relWheel').removeClass('hide');
		});
		$('#imsme').click(function() {
			$('#relGold').addClass('hide')
			$('#relWheel').addClass('hide')
			$('#relMsme').removeClass('hide');
		});
	
	})();
	
	</script> -->
	<script type="text/javascript" src="js/webcam.min.js"></script>
</body>
</html>