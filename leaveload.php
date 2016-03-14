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
 
if(isset($_POST["userid"])){ //insert only when a value given. This condition prevents the SQL errors when this file is opened directly without the form values
	function idgen($c){
		// receive no. of rows and genearte an unique id using current date.
		if($c<9) $id=date('Ymd')."0".++$c;
		else if($c<99) $id=date('Ymd').++$c; 
		return $id;
	}

	$userid=$_POST["userid"];
	$sdate=DateTime::createFromFormat('d-m-y',$_POST["startdate"]);
	$edate=DateTime::createFromFormat('d-m-y',$_POST["enddate"]);
	$startdate=$sdate->format('Y-m-d');
	$enddate=$edate->format('Y-m-d');

require_once("credentials.php"); //load connection credentials.
$sql=new mysqli("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);
if($sql->connect_error)
	die("Couldnot connect");
echo "hy";
$q="select * from tuserleaveinformations;";
if(!($sql->query($q)))
	echo $sql->error;
else
	$c=$sql->query($q);

$id=idgen($c->num_rows); // get number of rows present in the table and send it to idgen function to generate a Leave ID

$q="insert into tuserleaveinformations values('$id','$userid','$startdate','$enddate');";
if(!($sql->query($q)))
{

	if($sql->errno==1452)
		header("location:user.php?error=true");
}
else{

	$q="insert into tleavemanagement values('$id','0');";
	if(!($sql->query($q)))
		echo $sql->error;
	else
		header("location:user.php?upload=done&id=$id");
}
}
else{
	echo "No data Received. <a href=\"user.php\" >click me to go back</a>";
}
?>