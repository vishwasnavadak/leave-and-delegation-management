<!DOCTYPE html>
<!-- 
Leave and Delegation System is a Web Application that helps to manage Leaves and Delegation easily. 

**Project Guide: 
Hemanth Kumar G (hemanthjois@gmail.com) 
Dept. of Computer Science, 
NMAM Institute of Technology,Nitte.

**Group Name: 
Decryptors

**Group Members: 
Dharmitha S Shetty (dsdishashetty@gmail.com) 
Laxmikanth Madhyastha (laxmikanthmadhyastha.35@gmail.com) 
Manjuprasad Shetty N (manju.mpsn@gmail.com) 
Pallavi A (pallaviangraje@gmail.com) 
Vishwasa Navada K (navadavishwas@gmail.com) 

-->
<html lang='en'>
<head>
	<title>SalesPerson - Leave and Delegation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="libraries/font-awesome/css/font-awesome.min.css"/>
	<script src="libraries/jquery.min.js"></script>
	<script type="text/javascript" src="js/validatoruser.js"></script>
	<!-- Use the below js for Internet Explorer for validation of required tags -->
	<!--[if IE]>
	<script type="text/javascript" src="js/ievalidation.js"></script>
	<![endif]-->

</head>
<body>
	<header><h2>Leave and Delegation Management System</h2>
		<div class="subhead"><h3 style="float: left;"><small>Welcome,</small> SalesPerson</h3>
			<nav>
				<a href="index.php"><span class="fa fa-home"></span>Home</a>
				<a href="userlist.php"><span class="fa fa-users"></span> User List</a>
				<a href="developers.html"><span class="fa fa-code"></span> Developers</a>
			</nav>
		</div>
	</header>
	<section>

		<div class="content">
			<h3>Apply For Leave</h3>
			<div class="formc"><form class="forminputs" id="forminputs" action="leaveload.php" method="POST" onsubmit="return validate()"><span class="decl"  id="erid"></span>
				<label for="userid">Your UserID:<span class="decl">*</span>  <br/></label><input type="text" name="userid" id="userid" autofocus required/><br/><span class="decl"  id="er1"></span>
				<label for="sdate">Leave Start Date: <span class="decl">*</span> <br/></label><input type="text" name="startdate" id="sdate" placeholder="DD-MM-YY" required/><br/>
				<label for="edate">Leave End Date: <span class="decl">*</span> <br/></label><input type="text" name="enddate" id="edate" placeholder="DD-MM-YY" required/><br/>
				<div class="buttons"><br/><span class="decl" id="er"></span><br/><button type="submit"  ><span class="fa fa-check"></span> Submit</button>
					<button type="reset" ><span class="fa fa-remove"></span>Reset</button><?php if(isset($_GET["upload"])){ echo "<p >Leave Application(id=".$_GET["id"].") Successfully submitted for review of SuperAdmin.<br/>You can check its status in the sidebar of this page.</p>"; }  ?></div>
				</form></div>
			</div>
		</section>
		<aside>
			<div class="side"><h5>Check Leave Status and Delegations</h5>
				<form class="forminputs"  method="post"><input style="width:60% !important;display: inline;" type="text" name="suserid" placeholder="Enter UserID" required/><button style="padding: 0 !important;height:25px !important;width:35% !important;" type="submit" ><span class="fa fa-search"></span> Check</button></form>
			</div>
			<?php if(isset($_POST["suserid"])){ ?>
			<div class="side"><h5>Leave Status of <?php echo $_POST["suserid"]; ?></h5>
				<?php 
				require_once("credentials.php");
				$sql=new mysqli("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);
				if($sql->connect_error)
					die("Couldnot connect");
				$uid=$_POST["suserid"];
				$q="select id,flag from tleavemanagement where id in (select id from tuserleaveinformations where userid='$uid');";
				if(!($sql->query($q)))
					echo $sql->error;
				else
					$c=$sql->query($q);
				$n=$c->num_rows;
				if($n>0){
					?>
					<table class="table3">
						<tr>
							<th>Leave ID</th>
							<th>Status</th>
						</tr>
						<?php  
						while ($leaves=$c->fetch_assoc()) {
							echo "<tr><td>".$leaves["id"]."</td><td>";
							if($leaves["flag"]==0)
								echo "Pending";
							else if($leaves["flag"]==1)
								echo "<span class=\"aprv\">Approved</span>";
							else if($leaves["flag"]==-1)
								echo "<span class=\"decl\">Declined</span>";
							echo "</td></tr>";
						}
						?>	
					</table>
					<?php } else if($n==0) echo "No leaves to show";?>
				</div>
				<div class="side"><h5>Delegated Jobs</h5>
					<table class="table4">

						<?php 
						$q="select DelegatorsUserID,date_format(DelegationStartDate,'%d-%m-%y') as startdate, date_format(DelegationEndDate,'%d-%m-%y') as enddate from tuserreportingdelegation where DelegateesUserID='$uid';";
						if(!($sql->query($q)))
							echo $sql->error.$sql->errno;
						else
							$d=$sql->query($q);
						if($d->num_rows==0)
							echo "No Delegations Assigned";
						else{
							echo "<tr> <th>Delegator ID</th> <th>Period</th> </tr>";
							while ($dele=$d->fetch_assoc()) {
								echo "<tr><td>".$dele["DelegatorsUserID"]."</td><td>".$dele["startdate"]." to ".$dele["enddate"]."</td></tr>";
							}	
						}
						?>
					</table>
				</div>
				<?php }?>
				<?php if(isset($_GET["error"])){ echo "<script>alert(\"UserID not found.Check User List for valid user IDs.\");</script>";} ?>
			</aside>
		</body>
		</html>