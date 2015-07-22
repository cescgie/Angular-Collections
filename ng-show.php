<!DOCTYPE html>
<html>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body>
  <!--
  <div ng-app="">

  <p>
  <button ng-disabled="mySwitch">Click Me!</button>
  </p>

  <p>
  <input type="checkbox" ng-model="mySwitch">Button
  </p>

  </div>
-->
  <div ng-app="myApp" ng-controller="personCtrl">

  <p>
  <input type="checkbox" ng-model="myVar">Show
  </p>

  <p ng-show="myVar">
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
  });
  </script>
</body>
</html>
