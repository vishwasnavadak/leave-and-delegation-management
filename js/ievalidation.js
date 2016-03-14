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

//This is only used when the browser is internet explorer because it fails to execute HTML5 required tag.
$(document).ready(function(){
  $("#forminputs").submit(function(){
    var a=new Array("userid","sdate","edate","delegatorid","delegateeid");
    for(i=0;i<a.length;i++){
      if(document.getElementById(a[i])){
        var v=document.getElementById(a[i]).value;
        var l=v.trim();
        if(l.length===0){
          document.getElementById("er").innerHTML = "Fill all fields <br/>";
          return false;
        }}
      }
    });
});