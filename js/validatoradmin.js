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

function datevalid(y,m,d){
	var f=1;
	var y=parseInt(y,10); // Convert string to int for calculating
	var m=parseInt(m,10);
	var d=parseInt(d,10);
	if (m<0||m>12||y<0) /*Date Validator*/
		f=0;
	switch(m)
	{
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
		if (d>31)
			f=0;
		break;
		case 4:
		case 6:
		case 9:
		case 11:
		if (d>30)
			f=0;
		break;
		case 2:
		if (y%4===0)
		{
			if(d>29)
				f=0;
		}
		else if(d>28)
			f=0;
		break;
	}
	return f;
}
function validate(){	
	var date_vaild=/^[0-9]{2}-[0-9]{2}-[0-9]{2}$/; //regular expression for date format
	var id_valid=/^2015[0-9]{2,}$/; //regular expression for userid format
	var startdate=document.getElementById("sdate").value;
	var enddate=document.getElementById("edate").value;
	var d1=document.getElementById("delegatorid").value;
	var d2=document.getElementById("delegateeid").value;
	if(!id_valid.test(d1)){ 
		document.getElementById("erid").innerHTML="Invalid UserID. It should begin with 2015. Check User List for valid user IDs.<br/>";
		return false;
	}
	if(!id_valid.test(d2)){ 
		document.getElementById("er1").innerHTML="Invalid UserID. It should begin with 2015. Check User List for valid user IDs.<br/>";
		return false;
	}
	if(!date_vaild.test(startdate)){
		document.getElementById("er2").innerHTML="Invalid Date. Enter valid date in DD-MM-YY format only.<br/>";
		return false;
	}
	if(!date_vaild.test(enddate)){
		document.getElementById("er2").innerHTML="Invalid Date. Enter valid date in DD-MM-YY format only.<br/>";
		return false;
	}

	var nsd=startdate.split("-");
	var ned=enddate.split("-");
	var f1=datevalid(20+nsd[2],nsd[1],nsd[0]);
	var f2=datevalid(20+ned[2],ned[1],ned[0]);
	var stdate=new Date(20+nsd[2],nsd[1]-1,nsd[0]);
	var endate=new Date(20+ned[2],ned[1]-1,ned[0]);
	if(f1===0 || f2===0){
		document.getElementById("er2").innerHTML ="Invalid Date. Enter valid date in DD-MM-YY format only.<br/>";
		return false;
	}
	else if(d1===d2){
		document.getElementById("er1").innerHTML = "Delegator ID and Delegatee ID must be different <br/>";
		return false;
	}

	else if(stdate>endate){
		document.getElementById("er2").innerHTML = "Start Date must be smaller than end date<br/>";
		return false;
	}
	else
		return true;
}