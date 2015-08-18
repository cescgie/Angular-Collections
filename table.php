<!DOCTYPE html>
<html>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<style>
table, th , td {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd) {
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>
<body>

  <div ng-app="myApp" ng-controller="customersCtrl">

  <table>
    <tr ng-repeat="x in names | orderBy : 'Name'">
      <td>{{ $index + 1 }}</td>
      <td>{{ x.Name }}</td>
      <td>{{ x.Country }}</td>
    </tr>
  </table>

  </div>

  <script>
  var app = angular.module('myApp', []);
  app.controller('customersCtrl', function($scope, $http) {
      $http.get("http://www.w3schools.com/angular/customers.php")
      .success(function (response) {$scope.names = response.records;});
  });
  </script>
</body>
</html>
