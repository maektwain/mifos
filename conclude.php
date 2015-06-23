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
	<style>
		.star-cb-group {
		  font-size: 0;
		  unicode-bidi: bidi-override;
		  direction: rtl;
		}
		.star-cb-group * {
		  font-size: 1rem;
		}
		.star-cb-group > input {
		  display: none;
		}
		.star-cb-group > input + label {
		  display: inline-block;
		  overflow: hidden;
		  text-indent: 9999px;
		  width: 1em;
		  white-space: nowrap;
		  cursor: pointer;
		}
		.star-cb-group > input + label:before {
		  display: inline-block;
		  text-indent: -9999px;
		  content: "☆";
		  color: #888;
		}
		.star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
		  content: "★";
		  color: #e52;
		  text-shadow: 0 0 1px #333;
		}
		.star-cb-group > .star-cb-clear + label {
		  text-indent: -9999px;
		  width: .5em;
		  margin-left: -.5em;
		}
		.star-cb-group > .star-cb-clear + label:before {
		  width: .5em;
		}
		.star-cb-group:hover > input + label:before {
		  content: "☆";
		  color: #888;
		  text-shadow: none;
		}
		.star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
		  content: "★";
		  color: #e52;
		  text-shadow: 0 0 1px #333;
		}

		:root {
		  font-size: 2em;
		  font-family: Helvetica, arial, sans-serif;
		}

	</style>
</head>
<?php 
$clientId = $_REQUEST['clientId'];
$loanId = $_REQUEST['loanId'];
?>
<body style="background-color:#F3F5F8" ng-controller="loanController">
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
	<div class="container">
		<div class="row">
		    <div id="upaClient" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37); margin-top: 40px;">
				<form role="form" method="post">
					<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Update Client Details</b></h3><!-- {{jsonData}} -->
					<div class="form-group">
						<label class="control-label" for="email">Gender</label>
						<select id="genderId" ng-model="putClient.genderId" ng-options="gender.id as gender.name for gender in genderOpt" class="form-control input-lg">
							<option value="">Select Gender</option>		
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="father">Marital Status</label>
						<select id="maritalId" ng-model="putClient.maritalId" class="form-control input-lg" style="padding: 0 16px;" ng-options="marital.id as marital.name for marital in maritalOpt">
							<option value="">Select Marital Status</option>		
						</select>
					</div>
					<div class="form-group" style="margin-bottom: 30px;">
						<label class="control-label" for="mobile">Religion</label>
						<select id="religionId" ng-model="putClient.religionId" class="form-control input-lg" ng-options="religion.id as religion.name for religion in religionOpt" style="padding: 0 16px;">
							<option value="">Select Religion</option>		
						</select>
					</div>
					<div class="form-group" style="margin-bottom: 30px;">
						<label class="control-label" for="mobile">Education</label>
						<select id="educationId" class="form-control input-lg" ng-model="putClient.educationId" class="form-control input-lg" style="padding: 0 16px;" ng-options="education.id as education.name for education in educationOpt">
							<option value="">Select Education</option>		
						</select>
					</div>
					<div class="form-group" style="margin-bottom: 30px;">
						<label class="control-label" for="mobile">Dependents</label>
						<select id="dependentId" class="form-control input-lg" style="padding: 0 16px;" ng-model="putClient.dependentId" class="form-control input-lg" ng-options="dependent.id as dependent.name for dependent in dependentOpt">
							<option value="">Select Dependents</option>		
						</select>
					</div>
					<div class="checkbox">
					    <label>
					      <input type="checkbox" class="inline" ng-model="authentic"> Check if there is any co-applicant
					    </label>
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
								<input type="hidden" id="cliId" value="<?php echo $clientId ?>">
								<input type="hidden" id="lonId" value="<?php echo $loanId ?>">
								<button type="submit" ng-click="loanCreated();" name="submit2" value="submit" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Proceed Next &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div id="uploColl" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 xs-offset-0 hide" style="background : #fff;border-radius: 6px;padding:25px 25px 0 25px;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37); margin-top: 40px;">
				<form role="form" method="post">
					<h3 class="text-center" style="margin-bottom: 20px;color:#8A92A1"><b>Upload Collateral</b></h3><!-- {{jsonData}} -->
					<div class="form-group">
						<label class="control-label" for="dob">Upload Collateral Documents *</label>
						<div>
							<button class="btn btn-default" ngf-select ng-model="colfile" style="display:inline-block;margin-right:15px;font-size:18px"> Choose File </button>
							<button class="btn btn-primary" ng-show="colfile" ng-click="uploadCollateral()" style="display:inline-block;margin-right:15px;font-size:18px"> Click to upload </button>
							<span>{{colfile.name}}</span>						
						</div>
					</div>

					<div class="form-group">
						<label class="control-label">Share on Facebook</label>
						<div class="fb-share-button btn-block" data-href="https://developers.facebook.com/docs/plugins/" data-layout="box_count"></div>
					</div>

					<div class="form-group">
						<label class="control-label">Share on Twitter</label>
						<a href="https://twitter.com/share" class="twitter-share-button btn-block">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>

					<div class="form-group">
						<label class="control-label">Rate Your Experience</label>
						<form>
							<fieldset>
							    <span class="star-cb-group">
							      <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
							      <input type="radio" id="rating-4" name="rating" value="4" checked="checked" /><label for="rating-4">4</label>
							      <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
							      <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
							      <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
							      <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
							    </span>
							</fieldset>
						</form>
					</div>
					
					<div class="row" style="background:#586272;margin:0 -25px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
						<div class="col-xs-12 col-md-12 text-center" style="padding-right: 0;padding-left: 0;box-shadow: 5px 0 4px -5px rgba(0, 0, 0, 0.37),-5px 0 4px -5px rgba(0, 0, 0, 0.37);">
							<div class="col-md-6">
								<ul class="pull-left" style="list-style-type: none;padding: 0;margin-bottom: 0;line-height: 28px;">
									<li style="display: inline-block;margin: 10px;color:#bbb"><i class="fa fa-dot-circle-o"></i></li>
									<span style="color:#fff"><b>Step 2</b></span> <li style="display: inline-block;margin: 10px;color:#fff"><i class="fa fa-dot-circle-o" style="text-shadow: 0px 0px 10px #FFF;"></i></li>
								</ul>
							</div>
							<div class="col-md-6" style="padding-right:0">
								<a href="index.php" class="btn btn-primary pull-right" style="padding:14px;background-color:#6DD9AA;  font-weight: bold;border-radius: 0;border: none;border-bottom-right-radius: 6px;">Done</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/webcam.min.js"></script>
</body>
</html>
