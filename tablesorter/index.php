<html ng-app="myApp">
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/taskman.css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    </head>
    <body ng-controller="tasksController">

    <div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">
			<small>
				Datenanalyse
			</small>
		</a><!-- /.brand -->

	</div><!-- /.navbar-header -->

	</div>
	</div>
	<div class="row">
    	<div class="container">
    		<!--<blockquote><h1><a href="http://angularcode.com/simple-task-manager-application-using-angular-js-php-mysql/">Task Manager Application using Angular JS</a></h1></blockquote>-->
    		<div class="col-sm-13">
    			<!--<div ng-include src="'partials/task.html'"></div>-->
          <div ng-include src="'partials/datum.php'"></div>

    		</div>

    	</div>
    </div>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="app/app.js"></script>
  <script type="text/javascript">
  </script>
    </body>
</html>
