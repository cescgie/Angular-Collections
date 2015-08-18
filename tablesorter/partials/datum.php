<div class="widget-box" id="recent-box" ng-controller="tasksController">
<div class="widget-header header-color-blue">
<div class="row">
<div class="col-sm-6">
	<h4 class="bigger lighter">
		<i class="glyphicon glyphicon-align-justify"></i>&nbsp;
		DATUM
	</h4>
</div>
<div class="col-sm-3">
	<select data-ng-options="datum.DateEntered for datum in datums track by datum.DateEntered" ng-model="filterDatum" ng-change="getUid(filterDatum)" class="form-control search header-elements-margin">
	 	<option style="display:none" value="">Select ein Datum</option>
	</select>
</div>
</div></div>
	<div class="widget-body ">
		<table>
			<tr>
				<td width="30%" style="vertical-align:top;">
					<div class="datum">
						<table border="1">
						<tr ng-repeat="userid in userids track by userid.UserId| filter : filterDatum">
								<td><a ng-click="getInfoUid(userid.UserId,userid.DateEntered)">{{userid.UserId}}</a></td>
								<td>{{userid.Summe}}</td>
							</tr>
						</table>
					</div>
				</td>
				<td width="30%"></td>
				<td width="30%">
					<?php
					if(isset($_GET['userid'])){
					$uid = $_GET['userid'];
					echo $uid;
					}
					?>
					<span id="uid"></span>
					<div class="userid">
						<table border="1">
						<tr ng-repeat="userid2 in userids2">
								<td>{{userid2.WebsiteId}}</a></td>
								<td>{{userid2.IpAddress}}</td>
								<td>{{userid2.Hour}}</td>
								<td>{{userid2.Summe}}</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
