var app = angular.module('financrDashboard', []);
app.controller('mainController', function($scope) {
	

		
});

app.controller('firstTimeSetupController', function($scope) {
	$scope.adults_employed = 1;

	// Don't let the user choose 0 or -1 for number of adults.
	$scope.checkForZero = function() {
		if($scope.adults_employed < 1) {
			$scope.adults_employed = 1;
		}
	}

	$scope.initJQUIComponents = function() {
		if($("#firsttime_setup_accordian").length) {
			$('#firsttime_setup_accordian').accordion();
		}
	}

	$scope.range = function(count){
	  var ratings = []; 

	  for (var i = 0; i < count; i++) { 
	    ratings.push(i) 
	  } 

	  return ratings;
	}

	$scope.initJQUIComponents();
});

