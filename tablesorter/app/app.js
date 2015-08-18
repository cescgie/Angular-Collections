//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {
  //getTask(); // Load all available tasks
  getDatum();

  /*
  * Get Datumseinträge
  */
  function getDatum(){
  $http.post("ajax/getDatum.php").success(function(data){
        $scope.datums = data;
       });
  };

  /*
  * Get UserId from datum
  */
  $scope.getUid = function (datum) {
    $http.post("ajax/getUserId.php?datum="+datum.DateEntered).success(function(data){
        $scope.userids = data;
      });
  };

  /*
  * Get InfoUserId from UserId & datum
  */
  $scope.getInfoUid = function (userid,datum) {
    $http.post("ajax/getInfoUserId.php?datum="+datum+"&userid="+userid).success(function(data){
        $scope.userids2 = data;
        console.log(datum);
        console.log(userid);
        var fbcanvas = document.getElementById('uid');
        fbcanvas.innerHTML = "Info von UserId <span style='color: #ff0000'> "+userid+" </span>:";
      });
  };

  function getTask(){
  $http.post("ajax/getTask.php").success(function(data){
        $scope.tasks = data;
       });
  };
  $scope.addTask = function (task) {
    $http.post("ajax/addTask.php?task="+task).success(function(data){
        getTask();
        $scope.taskInput = "";
      });
  };
  $scope.deleteTask = function (task) {
    if(confirm("Are you sure to delete this line?")){
    $http.post("ajax/deleteTask.php?taskID="+task).success(function(data){
        getTask();
      });
    }
  };

  $scope.toggleStatus = function(item, status, task) {
    if(status=='2'){status='0';}else{status='2';}
      $http.post("ajax/updateTask.php?taskID="+item+"&status="+status).success(function(data){
        getTask();
      });
  };

  /*
  * get Datum
  */

  /*
  * getUserId
  */
  /*function getUserId(){
  $http.post("ajax/getUserId.php").success(function(data){
        $scope.userids = data;
       });
  };*/


});
