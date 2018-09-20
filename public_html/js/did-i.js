var APIURL = "./api";

var app = angular.module("didIApplication", ["ui.router"]);

app.service("didiService", ["$http", function($http){
	var $fetch = function(urlpart, jsonData)
	{
		
		return $http({
			method: "POST",
			url: APIURL+"/"+urlpart,
			data: jsonData,
			headers: {
				"X-Protection-Token": "",
			}
		});
	};
	return {
		"listItem": function (data) {
			return $fetch("api-list.php", data);
		},
		"addItem": function (data) {
			return $fetch("api-add.php", data);
		},
		"deleteItem": function (data) {
			return $fetch("api-delete.php", data);
		},
	};
}]);

app.controller("addDidIController", ["$rootScope", "$scope", "didiService", function($rootScope, $scope, didiService) {
	$scope.data = {
		"name": "",
	};
	$scope.addData = function(){
		didiService.addItem($scope.data)
		.then(function(response) {
			$rootScope.$broadcast("dataAddedEvent");
			$scope.data.name = "";
			console.log(response.data);
		}, function(response) {
			console.log(response.data);
		});
		
		return false;
	};
}]);

app.controller("didIController", ["$rootScope", "$scope", "didiService", function($rootScope, $scope, didiService) {
	$scope.data = null;
	$scope.didi = {
		"available": {
			"red": {"name": "Red", "class": "w3-red"},
			"green": {"name": "Green", "class": "w3-green"},
		},
		"list": function(color) {
			didiService.listItem({})
			.then(function(response) {
				$scope.data = response.data;
				console.log(response.data);
			}, function(response) {
				console.log(response.data);
			});
		},
		"refresh": function(){
			$scope.didi.list();
		},
		"delete": function(item){
			//alert("Deleting...");
			didiService.deleteItem(item)
			.then(function(response) {
				//$scope.data = response.data;
				//console.log(response.data);
				$scope.didi.refresh();
			}, function(response) {
				//console.log(response.data);
			});
		},
	};

	$rootScope.$on("dataAddedEvent", function(event, args) {
		$scope.didi.list();
	});
	
	$scope.didi.refresh();
}]);
