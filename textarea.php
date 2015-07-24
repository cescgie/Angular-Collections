<!DOCTYPE html>
<html>
<link rel="stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body style="margin-left:50px">
<h2>Textarea</h2>


<form method="post" action="aksi.php" ng-app="myApp" ng-controller="validateCtrl" name="myForm" novalidate>
    <p>Comment<br>
      <textarea rows="8" cols="100" ng-bind="textarea"></textarea>

      <textarea name="textarea" id = "textarea" rows="8" cols="100" ng-model="textarea" onfocus="countChars();" onkeydown="countChars();" onkeyup="countChars();" placeholder="Write comment here"></textarea>
      <span style="color:red" ng-show="myForm.textarea.$dirty && myForm.textarea.$invalid">
        <span ng-show="myForm.textarea.$error.required">Textarea is required.</span>
      </span>
    </p>
    <input disabled="" size="5" value="20000" name="txtLen" id="txtLen">
    <script type="text/javascript">
									function countChars(){
										var l = "20000";
										var obj = document.getElementById("textarea") || document.getElementById("textarea");
										var str = obj.value;
										var len = str.length;
										document.getElementById("txtLen").value=l-len;
										if(len > l) document.getElementById("txtLen").style.color='red';
										else
										document.getElementById("txtLen").style.color='';
									}
		</script>
    <input type="submit" value="Send" />

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
<script type="text/javascript">
$('textarea').keypress(function(event) {
   if (event.which == 13) {
      event.preventDefault();
      var s = $(this).val();
      $(this).val(s+"\n");
   }
});​
</script>
</body>
</html>
