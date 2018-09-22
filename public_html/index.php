<html>
<head>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/did-i.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/angular.min.js"></script>
	<script src="js/angular-ui-router.min.js"></script>
</head>
<body class="w3-lime" ng-app="didIApplication">
<div class="wrapper">

	<div ng-controller="addDidIController" class="w3-indigo" style="padding: 20px;">
		<input type="text" ng-model="data.name" value="" placeholder="Item..." autocomplete="off" style="padding:6px;" />
		<button class="w3-btn w3-blue" ng-click="addData()">Add</button>
	</div>
	
	<div ng-controller="didIController">
		<table class="_w3-table w3-bordered w3-striped w3-border">
			<thead class="w3-green">
				<tr>
					<th width="80%">Item</th>
					<th width="20%">?</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="d in data track by d.id">
					<td>{{d.item}}</td>
					<td><span class="w3-btn w3-red" ng-click="didi.delete(d)">X</span></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script src="js/did-i.js"></script>
</body>
</html>
