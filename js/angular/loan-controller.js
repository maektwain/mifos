(function() {
	var app = angular.module("loanapp", ['mgcrea.ngStrap','ui-rangeSlider','ngFileUpload','ui.bootstrap','webcam']);
	app.controller("loanController", function($scope, $http, Upload, $modal, $timeout) {

		$scope.esgol = 0;

		$scope.url = "https://control.decimus.in:8443/mifosng-provider/api/v1/";

		
		$scope.nexmoUrl = "https://rest.nexmo.com/sms/json";
		$scope.nexmoAPIKey = "992e64c6";
		$scope.nexmoAPISecret = "7fec7f12";
		
		$http({
			url: "api-secret.php",
			method: "GET",
			datatype: "json",
			cache : false
		}).
		success(function(data, status, headers, config) {
			$scope.authenticatData = data;
			$scope.basicAuthKey = data.base64EncodedAuthenticationKey;
			console.log($scope.basicAuthKey);

			if($scope.authenticatData) {
		        $scope.$watch(function() {return $scope.authenticatData.officeId;}, function(newvalue) {
		        	console.log(newvalue);
			        if(newvalue) {
			        	$scope.jsonData.officeId = newvalue;
			        }
			    });
		    }

		    $http({
				url: $scope.url + "clients/template?tenantIdentifier=default&pretty=true",
				method: "GET",
				datatype: "json",
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey
				}
			}).
			success(function(data, status, headers, config) {
				console.log(data);
				$scope.dependentOpt = data.dependentOptions;
   				$scope.educationOpt = data.educationOptions;
   				$scope.genderOpt = data.genderOptions;
   				$scope.maritalOpt = data.maritalOptions;
   				$scope.religionOpt = data.religionOptions;
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
			});

		}).
		error(function(data, status, headers, config) {
			console.log('Error');
		});

        $scope.jsonData = {
        	officeId: '',
        	firstname: '',
        	middlename: '',
        	lastname: '',
        	fathername: '',
        	dateFormat: 'dd MMMM yyyy',
        	locale: 'en',
        	dateOfBirth: '',
        	emailAddress: '',
        	mobileNo: '',
        	activationDate: "09 June 2015",
        	active: true
        };

		$scope.proceedOne = function() {
			
			var months = Array('January','February','March','April','May','June','July','August','September','October','November','December');
			var date = new Date($scope.mustBeTeen);
			var day = date.getDate();
			var month = date.getMonth();
			var yy = date.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
			$scope.jsonData.dateOfBirth = day + " " + months[month] + " " + year;


			$scope.getd = day + " " + months[month] + " " + year;
			console.log($scope.jsonData);
			$http({
				url: $scope.url + "clients?tenantIdentifier=default&pretty=true",
				method: "POST",
				datatype: "json",
				data: $scope.jsonData,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).
			success(function(data, status, headers, config) {
				$scope.clientDetails = data;
				console.log($scope.clientDetails.clientId);
				if($scope.clientDetails.clientId) {
					$scope.jsonData.code = Math.random().toString(36).substring(7);
					$http({
						url: $scope.nexmoUrl + "?api_key=" + $scope.nexmoAPIKey + "&api_secret=" + $scope.nexmoAPISecret + "&from=NEXMO&to=91" + $scope.jsonData.mobileNo + "&text=" + $scope.jsonData.code,
						method: 'JSONP',
						dataType: 'jsonp',
						headers: { 'Content-Type': 'application/json' },
						data: {code: $scope.jsonData.code}
					}).
					success(function(data, status, headers, config) {
						console.log(data, status, headers);
					}).
					error(function(data, status, headers, config) {
						console.log($scope.jsonData.code);
						console.log('Error');
					});
				}

				$('#createCli').addClass('hide');
				$('#otpGen').removeClass('hide');
				$('#otpGen').addClass('bounceInRight animated');

			}).
			error(function(data, status, headers, config) {
				console.log('Create Client Error');
				console.log(data, status, headers);
				
				$scope.firstNameErr = '';
				$scope.lastNameErr = '';
				$scope.dobErr = '';
				$scope.mobiErr = '';
				$.each(data.errors, function(index, val) {
					 if(val.parameterName == 'firstname' || $scope.firstNameErr) {
					 	$scope.firstNameErr = (($scope.firstNameErr) ? $scope.firstNameErr : val.defaultUserMessage);
					 }
					 else {
					 	$scope.firstNameErr = "";	
					 }

					 if(val.parameterName == 'lastname' || $scope.lastNameErr) {
					 	$scope.lastNameErr = (($scope.lastNameErr) ? $scope.lastNameErr : val.defaultUserMessage);
					 }
					 else {
					 	$scope.lastNameErr = "";
					 }

					 if(val.parameterName == 'dateOfBirth') {
					 	$scope.dobErr = (($scope.dobErr) ? $scope.firstNameErr : val.defaultUserMessage);
					 }
					 else {
					 	$scope.dobErr = "";
					 }
					 
					 if(val.parameterName == 'mobileNo') {
					 	$scope.mobiErr = (($scope.mobiErr) ? $scope.firstNameErr : val.defaultUserMessage);
					 }
					 else {
					 	$scope.mobiErr = "";
					 }

				});

			});
		}
		$scope.proceedTwo = function() {
			
			$('#otpGen').addClass('hide');
			$('#chosenOne').removeClass('hide');
			$('#chosenOne').addClass('bounceInRight animated');

			$('#detLoan').removeClass('lap-now');
			$('#detLoan').addClass('lap-finish');
			$('#calcLoan').addClass('lap-now');

		}

		 $scope.monthsLs = [
			{name:'1 Months', value: 1},
			{name:'2 Months', value: 2},
			{name:'3 Months', value: 3},
			{name:'4 Months', value: 4},
			{name:'5 Months', value: 5},
			{name:'6 Months', value: 6},
			{name:'7 Months', value: 7},
			{name:'8 Months', value: 8},
			{name:'9 Months', value: 9},
			{name:'10 Months', value: 10},
			{name:'11 Months', value: 11},
			{name:'12 Months', value: 12}
	    ];


	    $scope.wenrel = [
			'Today',
			'With in a week'
	    ];



		$scope.callCollateral = function() {
			var months = Array('January','February','March','April','May','June','July','August','September','October','November','December');
			var curDate = new Date();
			var day = curDate.getDate();
			var month = curDate.getMonth();
			var yy = curDate.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;

			$scope.wholeAmt = $scope.esgol;

			$scope.disburse = day + " " + months[month] + " " + year;
			console.log("$scope.disburse",$scope.disburse);

			$scope.loanCreateData = {
				"amortizationType": 1,
				"clientId": $scope.clientDetails.clientId,
				"dateFormat": "dd MMMM yyyy",
				"disbursementData": [],
				"expectedDisbursementDate": $scope.disburse,
				"fundId": 1,
				"interestCalculationPeriodType": 1,
				"interestRatePerPeriod": 2,
				"interestType": 0,
				"loanTermFrequency": $scope.monthString,
				"loanTermFrequencyType": 2,
				"loanType": "individual",
				"locale": "en",
				"numberOfRepayments": 9,
				"principal": $scope.wholeAmt,
				"productId": 3,
				"repaymentEvery": 1,
				"repaymentFrequencyType": 2,
				"submittedOnDate": $scope.disburse,
				"transactionProcessingStrategyId": 6
	        };

			$http({
				url: $scope.url + "loans?tenantIdentifier=default&pretty=true",
				method: "POST",
				datatype: "json",
				data: $scope.loanCreateData,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).
			success(function(data, status, headers, config) {
				$scope.returnLoanId = data;
				$scope.loanId = $scope.returnLoanId.loanId;
				if($scope.loanId) {
					$http({
						url: $scope.url + "loans/" + $scope.loanId + "/collaterals/template?tenantIdentifier=default&pretty=true",
						method: "GET",
						datatype: "json",
						cache : false,
						headers: {
							'Authorization': 'Basic ' + $scope.basicAuthKey
						}
					}).
					success(function(data, status, headers, config) {
						console.log(data, status, headers);
						$scope.collateralData = data;
						$scope.bikeType = $scope.collateralData.allowedMakeTwoTypes;
					}).
					error(function(data, status, headers, config) {
						console.log('Error');
					});
				}
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
				console.log(data, status, headers);
				
				$scope.principalErr = '';
				$.each(data.errors, function(index, val) {
					 if(val.parameterName == 'principal' || $scope.principalErr) {
					 	$scope.principalErr = (($scope.principalErr) ? $scope.principalErr : val.defaultUserMessage);
					 }
					 else {
					 	$scope.principalErr = "";	
					 }
				});

			});
		}

		$scope.tenorIn = function(period) {
			$scope.monthString = period.value;
			if(!$scope.loanId) {
				$scope.callCollateral();
			}
		}
		
		$scope.createNewLoan = function() {
			if(!$scope.loanId) {
				$scope.callCollateral();
			}
		}

		$scope.proceedThree = function() {

			$scope.eligibilityAmount = ((85 / 100) * $scope.esgol);

			$scope.returnEligibleAmt = {
				"actualcost": $scope.esgol,
				"collateralTypeId": 73,
				"description": "Pulsar",
				"goldfineTypeId": 81,
				"jewelleryTypeId": 82,
				"locale": "en",
				"maketwoTypeId": 151,
				"value": $scope.eligibilityAmount
			};
			$http({				
				url: $scope.url + "loans/" + $scope.loanId + "/collaterals?tenantIdentifier=default&pretty=true",
				method: "POST",
				datatype: "json",
				data: $scope.returnEligibleAmt,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).
			success(function(data, status, headers, config) {
				console.log(data, status, headers);
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
			});

			$('#chosenOne').addClass('hide');
			$('#elAmount').removeClass('hide');
			$('#elAmount').addClass('bounceInRight animated');
		}

		$scope.proceedFour = function() {

			$('#calcLoan').removeClass('lap-now');
			$('#calcLoan').addClass('lap-finish');
			$('#panEn').addClass('lap-now');

			$('#elAmount').addClass('hide');
			$('#uploadPan').removeClass('hide');
			$('#uploadPan').addClass('bounceInRight animated');
		};


		$scope.$watch('files', function (files) {
	        $scope.formUpload = false;
	        if (files != null) {
	            for (var i = 0; i < files.length; i++) {
	                $scope.errorMsg = null;
	                $scope.file = files[i];
	            }
	        }
	    });

		$scope.idType = [
			'ID Only',
			'Address Only',
			'ID and Address'
	    ];

	    $scope.createPanDoc = function() {
	    	Upload.upload({
            	url: $scope.url + "clients/" + $scope.clientDetails.clientId + "/documents?tenantIdentifier=default&pretty=true",
                fields: {name: $scope.panNumber},
                file: $scope.file,
                headers: {
				'Authorization': 'Basic ' + $scope.basicAuthKey
				}
            }).success(function(data, status, headers, config) {
			console.log(data, status, headers);
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
			});
	    };

	    $scope.kyc = {
			dateFormat: "dd MMMM yyyy",
			documentTypeId: 4,
			documentKey: "",
			proofTypeId: 70,
			locale: "en",
			validity: "16 June 2016"
		};

		$scope.$watch('kycfiles', function (kycfiles) {
	        $scope.formUpload = false;
	        if (kycfiles != null) {
	            for (var i = 0; i < kycfiles.length; i++) {
	                $scope.errorMsg = null;
	                $scope.kycDoc = kycfiles[i];
	            }
	        }
	    });

	    $scope.createKycDoc = function() {

			$http({
				url: $scope.url + "clients/" + $scope.clientDetails.clientId + "/identifiers?tenantIdentifier=default&pretty=true",
				method: "POST",
				datatype: "json",
				data: $scope.kyc,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).success(function(data, status, headers, config) {
				console.log(data, status, headers);
				$scope.resourceId = data.resourceId;
				Upload.upload({
	            	url: $scope.url + "client_identifiers/" + $scope.resourceId + "/documents?tenantIdentifier=default&pretty=true",
	                fields: {name : "KYC Documents"},
	                file: $scope.kycDoc,
	                headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey
					}
	            }).success(function(data, status, headers, config) {
					console.log(data, status, headers);
				}).
				error(function(data, status, headers, config) {
					console.log('Error');
					console.log(data, status, headers);
					console.log($scope.kycDoc);
				});
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
				console.log(data, status, headers, config);
			});
	    };

		$scope.proceedFive = function() {

                $scope.createPanDoc();
                $scope.createKycDoc();

				$('#uploadPan').addClass('hide');
				$('#uploadState').removeClass('hide');
				$('#uploadState').addClass('bounceInRight animated');

				$http({
					url: $scope.url + "clients/template?tenantIdentifier=default&pretty=true",
					method: "GET",
					datatype: "json",
					cache : false,
					headers: {
						'Authorization': 'Basic ' + $scope.basicAuthKey
					}
				}).
				success(function(data, status, headers, config) {
					$scope.clienttypeOptions = data.clientTypeOptions;
                	$scope.clientClassificationOptions = data.clientClassificationOptions;
				}).
				error(function(data, status, headers, config) {
					console.log('Error');
				});

				$http({
					url: $scope.url + "datatables/Official/" + $scope.clientDetails.clientId + "?genericResultSet=true&tenantIdentifier=default&pretty=true",
					method: "GET",
					datatype: "json",
					cache : false,
					headers: {
						'Authorization': 'Basic ' + $scope.basicAuthKey
					}
				}).
				success(function(data, status, headers, config) {
					console.log(data, status, headers);
					$scope.grossIncome = data.columnHeaders[8].columnValues;
				}).
				error(function(data, status, headers, config) {
					console.log('Error');
				});

				/** Changing Current Tabs **/
				$('#panEn').removeClass('lap-now');
				$('#panEn').addClass('lap-finish');
				$('#proDet').addClass('lap-now');
		}

		$scope.$watch('pics', function (pics) {
	        $scope.formUpload = false;
	        if (pics != null) {
	            for (var i = 0; i < pics.length; i++) {
	                $scope.errorMsg = null;
	                $scope.picture = pics[i];
	            }
	        }
	    });

	    $scope.$watch('bankstat', function (bankstat) {
	        $scope.formUpload = false;
	        if (bankstat != null) {
	            for (var i = 0; i < bankstat.length; i++) {
	                $scope.errorMsg = null;
	                $scope.statement = bankstat[i];
	            }
	        }
	    });

		$scope.proceedSix = function() {

			$http({
				url: $scope.url + "clients/" + $scope.clientDetails.clientId + "?tenantIdentifier=default&pretty=true",
				method: "PUT",
				datatype: "json",
				data: $scope.updateClient,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).success(function(data, status, headers, config) {
				console.log(data, status, headers);
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
				console.log(data, status, headers, config);
			});
			
			

			Upload.upload({
            	url: $scope.url + "clients/" + $scope.clientDetails.clientId + "/images?tenantIdentifier=default&pretty=true",
                file: $scope.picture,
                headers: {
				'Authorization': 'Basic ' + $scope.basicAuthKey
				}
            }).success(function(data, status, headers, config) {
			console.log(data, status, headers);
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
			});

			Upload.upload({
            	url: $scope.url + "clients/" + $scope.clientDetails.clientId + "/documents?tenantIdentifier=default&pretty=true",
                fields: {name: 'Bank Statement'},
                file: $scope.statement,
                headers: {
				'Authorization': 'Basic ' + $scope.basicAuthKey
				}
            }).success(function(data, status, headers, config) {
			console.log(data, status, headers);
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
			});

			$('#uploadState').addClass('hide');
			$('#officialAddre').removeClass('hide');
			$('#officialAddre').addClass('bounceInRight animated');

			$('#proDet').removeClass('lap-now');
			$('#proDet').addClass('lap-finish');
			$('#CustDet').addClass('lap-now');

		}

		$scope.capturePic = function () {
			$scope.modalInstance=$modal.open({
		        templateUrl: 'capturepic.html',
		        scope:$scope
		    });
        };

    	var _video = null,
    		patData = null;

	    $scope.showDemos = false;
	    $scope.edgeDetection = false;
	    $scope.mono = false;
	    $scope.invert = false;

	    $scope.patOpts = {x: 0, y: 0, w: 25, h: 25};

	   
	    $scope.channel = {};

	    $scope.webcamError = false;
	    $scope.onError = function (err) {
	        $scope.$apply(
	            function() {
	                $scope.webcamError = err;
	            }
	        );
	    };

	    $scope.onSuccess = function () {
	        _video = $scope.channel.video;
	        $scope.$apply(function() {
	            $scope.patOpts.w = _video.width;
	            $scope.patOpts.h = _video.height;
	            $scope.showDemos = true;
	        });
	    };

	    $scope.onStream = function (stream) {
	    };


	    $scope.makeSnapshot = function makeSnapshot() {
	        if (_video) {
	            var patCanvas = document.querySelector('#snapshot');
	            if (!patCanvas) return;

	            patCanvas.width = _video.width;
	            patCanvas.height = _video.height;
	            var ctxPat = patCanvas.getContext('2d');

	            var idata = getVideoData($scope.patOpts.x, $scope.patOpts.y, $scope.patOpts.w, $scope.patOpts.h);
	            ctxPat.putImageData(idata, 0, 0);

	            sendSnapshotToServer(patCanvas.toDataURL());

	            patData = idata;
	        }
	    };

	    var sendSnapshotToServer = function sendSnapshotToServer(imgBase64) {
	        $scope.snapshotData = imgBase64;
	    };

	    var getVideoData = function getVideoData(x, y, w, h) {
	        var hiddenCanvas = document.createElement('canvas');
	        hiddenCanvas.width = _video.width;
	        hiddenCanvas.height = _video.height;
	        var ctx = hiddenCanvas.getContext('2d');
	        ctx.drawImage(_video, 0, 0, _video.width, _video.height);
	        return ctx.getImageData(x, y, w, h);
	    };

  
        $scope.uploadSnap = function () {
            if($scope.snapshotData != null) {
                $http({
                    method: 'POST',
                    url: $scope.url + "clients/" + $scope.clientDetails.clientId + "/images?tenantIdentifier=default&pretty=true",
	                data: $scope.snapshotData,
	                headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey
					}
                }).success(function(data, status, headers, config) {
					console.log(data, status, headers);
					$scope.modalInstance.close();
				}).
				error(function(data, status, headers, config) {
					console.log('Error');
					console.log(data, status, headers, config);
				});
            }
        };

        $scope.cancel=function(){
		    $scope.modalInstance.dismiss();
		};

		
		$scope.official = {};

		$scope.proceedSeven = function() {

			$scope.officialData = {
				"Name of Employer": $scope.official.employer,
				"Address Line1": $scope.official.address,
				"Landmark":"Landmark",
				"City":"City",
				"State UT_cd_State UT": 47,
				"Pin Code":"613002",
				"Gross Income_cd_Gross Income":120,
				"locale":"en",
				"dateFormat":"dd MMMM yyyy",
				"Address Line2":""
			}

			$http({
				url: $scope.url + "datatables/Official/" + $scope.clientDetails.clientId + "?genericResultSet=true&tenantIdentifier=default&pretty=true",
				method: "POST",
				datatype: "json",
				data: $scope.officialData,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).success(function(data, status, headers, config) {
				console.log(data, status, headers);
				$('#officialAddre').addClass('hide');
				$('#congRats').removeClass('hide');
				$('#congRats').addClass('bounceInRight animated');
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
				console.log(data, status, headers, config);
				$('#officialAddre').addClass('hide');
				$('#congRats').removeClass('hide');
				$('#congRats').addClass('bounceInRight animated');
			});
			
		}

		$scope.proceedEight = function() {

			$scope.emailContent = {
				"email" : $scope.jsonData.emailAddress
			};

			$http({				
				url: "send-email.php",
				method: "POST",
				datatype: "json",
				data: $scope.emailContent,
				cache : false
			}).
			success(function(data, status, headers, config) {
				console.log(data, status, headers);
				window.location.href = "conclude.php?clientId=" + $scope.clientDetails.clientId + "&loanId=" + $scope.loanId;
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
			});

		}

		$scope.putClient = {};

		$scope.getClientId = $('#cliId').val();
		$scope.getLoanId = $('#lonId').val();

		$scope.loanCreated = function() {

			$http({
				url: $scope.url + "clients/" + $scope.getClientId + "?tenantIdentifier=default&pretty=true",
				method: "PUT",
				datatype: "json",
				data: $scope.putClient,
				cache : false,
				headers: {
					'Authorization': 'Basic ' + $scope.basicAuthKey,
					'Content-Type': 'application/json; charset=UTF-8'
				}
			}).success(function(data, status, headers, config) {
				console.log(data, status, headers);
				$('#upaClient').addClass('hide');
				$('#uploColl').removeClass('hide');
				$('#uploColl').addClass('bounceInRight animated');
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
				console.log(data, status, headers, config);
			});

		};


	    $scope.uploadCollateral = function() {
	    	Upload.upload({
            	url: $scope.url + "loans/" + $scope.getLoanId + "/documents?tenantIdentifier=default&pretty=true",
                fields: {name : "Collateral Documents"},
                file: $scope.colfile,
                headers: {
				'Authorization': 'Basic ' + $scope.basicAuthKey
				}
            }).success(function(data, status, headers, config) {
			console.log(data, status, headers);
			}).
			error(function(data, status, headers, config) {
				console.log('Error');
				console.log(data, status, headers);
				console.log($scope.colfile);
			});
	    };


	});
}());
