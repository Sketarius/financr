var app = angular.module('financrDashboard', []);
app.controller('mainController', function($scope) {
	

		
});

app.controller('firstTimeSetupController', function($scope, $http) {
	$scope.adults_employed = 1;
	$scope.phoneVal = '';

	// Don't let the user choose 0 or -1 for number of adults.
	$scope.checkForZero = function() {
		if($scope.adults_employed < 1) {
			$scope.adults_employed = 1;
		}
	}

	$scope.range = function(count){
         var ratings = [];

         for (var i = 0; i < count; i++) {
           ratings.push(i)
         }

         return ratings;
    }

	$scope.getPhoneCarriers = function() {
		$http.get('index.php?f=ajax&s=carriers&action=get').then(function(response) {
			var carriers_select = $('#cell_phone_carrier');
			for(var i = 0; i < response.data.length; i++) {
				carriers_select.append('<option value="' + response.data[i]['sms_id'] + '">' + response.data[i]['sms_carrier']);
			}
		});
	}

	$scope.initJQUIComponents = function() {
		if($("#firsttime_setup_accordian").length) {
			$('#firsttime_setup_accordian').accordion();
		}
	}

	$scope.initJQUIComponents();
	$scope.getPhoneCarriers();
});