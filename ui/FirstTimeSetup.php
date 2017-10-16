<?php require_once('../core/FinancrNotifications.php'); ?>

<div ng-controller="firstTimeSetupController" style="font-family: Arial; margin: 50px; margin-top: 10px; display: inline-block; width: 50%;">
			 <h3>Before you start using Financr, we'll need to gather some information...	</h3>
				<div id="firsttime_setup_accordian">
					<h3> Basic Details </h3>
					<div>
						<table>
							<tr>
								<td>First Name </td><td><input type="text" name="first_name" style="width: 150px;" /></td>
							</tr>
							<tr>
								<td>Last Name </td><td><input type="text" name="last_name" style="width: 150px;" /></td>
							</tr>
							<tr>
								<td>Address 1 </td><td><input type="text" name="address1" /></td>
							</tr>
							<tr>
								<td>Address 2 </td><td><input type="text" name="address2" /></td>
							</tr>
							<tr>
								<td>City </td><td><input type="text" name="city" style="width: 95px;" /></td>
							</tr>
							<tr>
								<td>State </td><td><input type="text" name="state" style="width: 40px;" /></td>
							</tr>
							<tr>
								<td>Country </td><td><input type="text" name="country" style="width: 80px;" /></td>
							</tr>
						</table>
					</div>
					<h3> Financial Details </h3>
					<div>
						<div style="margin: 10px; color: #ff0000;"> Don't worry if you don't have all your account information, you can add additonal accounts later.</div>
						<table>
							<tr>
								<td>How many accounts in the household will we finance for?</td>
								<td>
									<input ng-model="adults_employed" ng-change="checkForZero()" type="number" name="adults_employed" />
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<th>
									Account Name
								</th>
								<th>
									Starting Balance
								</th>
							</tr>
							<tr ng-repeat="start in range(adults_employed)">
								<td style="padding-right: 50px;"><input type="text" placeholder="Account Name" /></td>
								<td>$ <input placeholder="0.00" type="currency" name="{{start+1}}_balance" /></td>
							</tr>
						</table>
					</div>
					<h3> Notification Settings </h3>
					<div>
						<table>
							<tr>
								<td>Cell-Phone (For SMS Notifications) </td>
								<td><input type="number" name="cell_phone" /> </td>
							</tr>
							<tr>
								<td>Cell-Phone Carrier</td>
								<td>
									<select id="cell_phone_carrier" name="cell_phone_carrier" >
									</select>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>