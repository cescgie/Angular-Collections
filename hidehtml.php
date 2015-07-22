<!DOCTYPE html>
<html>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="personCtrl">

<button ng-click="toggle()">Hide user</button>

<p ng-hide="myVar">
First Name: <input type=text ng-model="firstName"><br>
Last Name: <input type=text ng-model="lastName"><br><br>
Full Name: {{firstName + " " + lastName}}
</p>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('personCtrl', function($scope) {
    $scope.firstName = "John",
    $scope.lastName = "Doe"
    $scope.myVar = false;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    }
});
</script>

</body>
</html>
