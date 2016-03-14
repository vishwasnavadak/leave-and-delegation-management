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
	<title>SuperAdmin Page - Leave and Delegation</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" type="text/css" href="libraries/font-awesome/css/font-awesome.min.css"/>
	<script src="libraries/jquery.min.js"></script>
	<script type="text/javascript" src="js/validatoradmin.js"></script>
	
	<!--[if IE]>
	<script type="text/javascript" src="js/ievalidation.js"></script>
	<![endif]-->
	<script> 
	$(document).ready(function(){
		$(".tog").click(function(){
			$(".leaves").slideToggle(400);
		});
	});
	</script>

</head>
<body>
	<header><h2>Leave and Delegation Management System</h2>
		<div class="subhead"><h3 style="float: left;"><small>Welcome,</small> SuperAdmin</h3>
			<nav>
				<a href="index.php"><span class="fa fa-home"></span>Home</a>
				<a href="userlist.php"><span class="fa fa-users"></span> User List</a>
				<a href="developers.html"><span class="fa fa-code"></span> Developers</a>
			</nav>
		</div>
	</header>
	<?php 
	require_once("credentials.php");
	$sql=new mysqli("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);
	if($sql->connect_error)
		die("Couldnot connect");

	if(isset($_GET["leave"]))
	{	
		$id=$_GET["id"];
		if($_GET["leave"]=="approve"){
			$q="update tleavemanagement set flag='1' where id='$id'";
			if(!($sql->query($q)))
				echo $sql->error;
		}
		else if($_GET["leave"]=="decline"){
			$q="update tleavemanagement set flag='-1' where id='$id'";
			if(!($sql->query($q)))
				echo $sql->error;
		}
		echo "<script> $(document).ready(function(){  $(\".leaves\").show();  }); </script>";
	}
	?>
	<section>
		<div class="content">
			<?php 


			$q="select id,userid, date_format(leavestartdate,'%d-%m-%y') as leavestartdate, date_format(leaveenddate,'%d-%m-%y') as leaveenddate from tuserleaveinformations where id in(select id from tleavemanagement where flag=0);";
			if(!($sql->query($q)))
				echo $sql->error;
			else
				$c=$sql->query($q);
			$num=$c->num_rows;

			?>
			<h3><span  class="tog" >Leaves Pending Approval(<?php echo $num; ?>)</span></h3>
			<div  class="leaves">
				<?php if($num>0){ ?>
				<table >
					<tr><th>UserID</th><th>Leave Start Date</th><th>Leave End Date</th><th>Action</th></tr>
					<?php 
					while ($oneleave=$c->fetch_assoc()) {
						echo "<tr>";
						echo "<td>".$oneleave["userid"]."</td><td>".$oneleave['leavestartdate']."</td><td>".$oneleave['leaveenddate']."</td><td><a class=\"aprv\" href=\"?leave=approve&amp;id=".$oneleave["id"]."\" >Approve</a>/<a class=\"decl\" href=\"?leave=decline&amp;id=".$oneleave["id"]."\" >Decline</a></td></tr>";
					}
					?>
				</table>
				<?php }
				else echo "No Leaves to review.";
				?>

			</div>
			<h3>Delegation </h3>
			<div class="formc"><form class="forminputs" id="forminputs" action="deleload.php" method="POST" onsubmit="return validate()"><span class="decl"  id="erid"></span>
				<label for="delegatorid">Delegator UserID: <span class="decl">*</span> <br/></label><input type="text" id="delegatorid" name="delegatorid" autofocus required/><br/><span class="decl"  id="er1"></span>
				<label for="delegateeid">Delegatee UserID: <span class="decl">*</span><br/></label><input type="text" id="delegateeid" name="delegateeid" required/><br/><span class="decl"  id="er2"></span>
				<label for="sdate">Delegation Start Date: <span class="decl">*</span><br/></label><input type="text" name="startdate" id="sdate" placeholder="DD-MM-YY" required/><br/>
				<label for="edate">Delegation End Date: <span class="decl">*</span><br/></label><input type="text" name="enddate" id="edate" placeholder="DD-MM-YY" required/><br/>
				<div class="buttons"><span class="decl" id="er"></span><br/><button type="submit"  ><span class="fa fa-check"></span> Submit</button>
					<button type="reset" ><span class="fa fa-remove"></span>Reset</button><?php if(isset($_GET["upload"])){ echo "<p>Delegation Successfully Assigned</p>"; } ?></div>
				</form></div>
			</div>
		</section>
		<aside>
			<div class="side"><h5>Sales Teams Info</h5>

				<table class="table1" >
					<tr>
						<th>Team Lead ID</th>
						<th>Team Name</th>
					</tr>
					<?php 
					$que="select teamleadid,teamname from tsalesteaminformation;";
					if(!($sql->query($que)))
						echo $sql->error;
					else
						$c=$sql->query($que);
					while($teams=$c->fetch_assoc()){
						echo "<tr><td>".$teams["teamleadid"]." </td><td><a href=\"?teamname=".$teams["teamname"]."\"> ".$teams["teamname"]."</a></td></tr>";
					}
					?></table>
				</div>
				<div class="side"><h5>Team Member Info</h5>
					<table class="table2">

						<?php 
						if(isset($_GET["teamname"]))
						{	
							echo "<tr> <th>User ID</th> <th>Full Name</th> </tr>";
							$teamn=$_GET["teamname"];
							$que="select id,fullname from tuserinformations where id in (select id from tteammemberinfo where teamname='$teamn');";
							if(!($sql->query($que)))
								echo $sql->error;
							else
								$m=$sql->query($que);
							while ($memberinfo = $m->fetch_assoc()) {
								echo "<tr><td>".$memberinfo["id"]."</td><td>".$memberinfo["fullname"]."</td></tr>";
							}
						}
						else
							echo "<p><small>Click on any Team Name to get Team Member Info</small></p>";
						?>
					</table>
				</div>
			</aside>
			<?php if(isset($_GET["error"])){ echo "<script>alert(\"Entered UserID not found.Check User List for valid user IDs.\");</script>";} ?>
		</body>
		</html>