<!DOCTYPE html>
<html>
<head> <title>Financr - User Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="lib/jquery-3.2.1.min.js"></script>
<script src="lib/angular.min.js"></script>
<script src="js/dashboard.js"></script>
</head>
<script>
	var app = angular.module('testApp', []);
	app.controller('testController', function($scope) {
		$scope.products = ['Milk', 'Bread', 'Cheese'];
	});
</script>
<body>
	<div ng-app="testApp" ng-controller="testController">
		<span ng-repeat="x in products">{{x}}</span>
	</div>
</body>
</html>