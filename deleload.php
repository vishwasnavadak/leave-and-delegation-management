<?php
// Leave and Delegation System is a Web Application that helps to manage Leaves and Delegation easily. 

// **Project Guide: 
// Hemanth Kumar G (hemanthjois@gmail.com) 
// Dept. of Computer Science, 
// NMAM Institute of Technology,Nitte.

// **Group Name: 
// Decryptors

// **Group Members: 
// Dharmitha S Shetty (dsdishashetty@gmail.com) 
// Laxmikanth Madhyastha (laxmikanthmadhyastha.35@gmail.com) 
// Manjuprasad Shetty N (manju.mpsn@gmail.com) 
// Pallavi A (pallaviangraje@gmail.com) 
// Vishwasa Navada K (navadavishwas@gmail.com)  
 
if(isset($_POST["delegatorid"])){ //insert only when a value given. This condition prevents the SQL errors when this file is opened directly without the form values.
	$delegatorid=$_POST["delegatorid"];
	$delegateeid=$_POST["delegateeid"];
	$sdate=DateTime::createFromFormat('d-m-y',$_POST["startdate"]); //convert dd-mm-yy to MYSQL stadard format YYYY-MM-DD
	$edate=DateTime::createFromFormat('d-m-y',$_POST["enddate"]);
	$startdate=$sdate->format('Y-m-d');
	$enddate=$edate->format('Y-m-d');

	require_once("credentials.php"); //load connection credentials.
	$sql=new mysqli("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);
	if($sql->connect_error)
		die("Couldnot connect");

	$q="select * from tuserreportingdelegation;";
	if(!($sql->query($q)))
		echo $sql->error;
	else
		$c=$sql->query($q);

	$id=$c->num_rows; 
	$id++;
	echo $id;
	$q="insert into tuserreportingdelegation values('$id','$delegatorid','$delegateeid','$startdate','$enddate');";
	if(!($sql->query($q)))
	{
		echo $sql->error;
		if($sql->errno==1452) // Show an error when invalid User Id is entered.
			header("location:superadmin.php?error=true"); 
	}
	else
		header("location:superadmin.php?upload=done"); //send acknowledgment when insertion is sucessfull
}
else{
	echo "No data Received. <a href=\"superadmin.php\" >click me to go back</a>";
}
?>