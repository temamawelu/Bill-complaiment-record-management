<?php

//connect to a databse
$servername = "localhost";
$username = "root";
$password = "";
$us="010420";
$up="ethio#12";
// DB NAME
$dbname = "mytest";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 mysqli_query($conn,"set character_set_results='utf8'");
 mysqli_query($conn, "SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//TODAY
date_default_timezone_set('Africa/Addis_Ababa');

$QUESTION_DATE=date("Y-m-d");
//date('Y-m-d H:i:s');

$CURRENT_TIME= date("H:i:s");
//echo $CURRENT_TIME;
// echo $QUESTION_DATE;
//KEYWORD
$keyword = trim($_GET["keyword"]);
$sender =  trim($_GET["sender"]);
$to =  trim($_GET["to"]);
$name=trim($_GET['fullname']);
$adr=trim($_GET['adr']);
//CUSTOMER INFO
$CUSTOMER_INFO="";
if(($keyword == 'FL')||($keyword =='fl')||($keyword == 'Fl')||($keyword == 'fL'))
{
	echo "Dear Customer Wel Come TO Fixed Line SMS Registration\n"."You send:".$keyword."\n 
          Please send your Full name and Address"."Full name*Address\n"."e.g.Abebekebede*Addisabeba";


}
elseif(($keyword ==$name)&&){
echo "Dear".$name ."Thank You for your Registration".$sender;

}elseif(($keyword =='help')||($keyword =='Help')){
echo "string";

}else{
	echo "Incorrect";
}
if(){
	
}



?>