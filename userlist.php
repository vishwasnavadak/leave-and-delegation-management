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
<html>
<head>
	<title>Users list - Leave and Delegation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="libraries/font-awesome/css/font-awesome.min.css"/>

</head>
<body>
	<header><h1>Leave and Delegation Management System</h1>
		<div class="subhead">
			<nav>
				<a href="index.php"><span class="fa fa-home"></span>Home</a>
				<a href="developers.html"><span class="fa fa-code"></span> Developers</a>
			</nav>
		</div>
	</header>
	<section style="float: none;margin:25px auto;width:65% !important;max-width: 55% !important;">

		<div class="content">
			<table class="table5">
			<tr>
				<th>User ID</th>
				<th>Full Name</th>
				<th>Email Address</th>
			</tr>
			<?php 
			require_once("credentials.php");
			$sql=new mysqli("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);
			if($sql->connect_error)
				die("Couldnot connect");
			$query="select * from tuserinformations";
			if(!($sql->query($query)))
				echo $sql->error;
			else
				$c=$sql->query($query);
			while ($userlist = $c->fetch_assoc()) {
				echo "<tr><td>".$userlist["ID"]."</td><td>".$userlist["FullName"]."</td><td>".$userlist["EMailAddress"]."</td></tr>";
			}
			?>
		</table>
		<div class="buttons"><button onclick="window.print();"><strong><span class="fa fa-print"></span> Print</strong></button><br/><small>Printing only works in Computer Browsers.</small></div>
		</div>
	</section>

</body>
</html>