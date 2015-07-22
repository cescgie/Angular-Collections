<!DOCTYPE html>
<html>
<link rel="stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body style="margin-left:50px">
<h2>Validation Example</h2>


<form ng-app="myApp" ng-controller="validateCtrl" name="myForm" novalidate>
  <p><input type="checkbox" ng-model="myVar">Show Form</p>
  <div ng-show="myVar">
    <p>Username:<br>
      <input type="text" name="user" ng-model="user" required>*
      <span style="color:red" ng-show="myForm.user.$dirty && myForm.user.$invalid">
        <span ng-show="myForm.user.$error.required">Username is required.</span>
      </span>
    </p>
    <p ng-bind="user"></p>

    <p>Email:<br>
      <input type="email" name="email" ng-model="email" required>*
      <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
      <span ng-show="myForm.email.$error.required">Email is required.</span>
        <span ng-show="myForm.email.$error.email">Invalid email address.</span>
      </span>
    </p>
    <p ng-bind="email"></p>

    <p>Website:<br>
      <input type="url" name="url" ng-model="url" http-prefix placeholder="http://www.foo.com">
      <span style="color:red" ng-show="myForm.url.$dirty && myForm.url.$invalid">
      <span ng-show="myForm.url.$error.url">Invalid url.</span>
    </p>
    <p ng-bind="url"></p>

    <p>
      <input type="submit">
    </p>
  </div>
</form>
<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
    $scope.user = 'John Doe';
    $scope.email = 'john.doe@gmail.com';
});

app.directive('httpPrefix', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attrs, controller) {
            function ensureHttpPrefix(value) {
                // Need to add prefix if we don't have http:// prefix already AND we don't have part of it
                if(value && !/^(http):\/\//i.test(value)
                   && 'http://'.indexOf(value) === -1) {
                    controller.$setViewValue('http://' + value);
                    controller.$render();
                    return 'http://' + value;
                }
                else
                    return value;
            }
            controller.$formatters.push(ensureHttpPrefix);
            controller.$parsers.push(ensureHttpPrefix);
        }
    };
});
</script>
</body>
</html>
