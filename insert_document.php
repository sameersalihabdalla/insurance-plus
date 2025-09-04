<?php 

if(isset($_REQUEST['submit'])){
	$doc= $_REQUEST['doc'];
	$name= $_REQUEST['name'];
	$date= $_REQUEST['date'];
	$type= $_REQUEST['type'];
	$broker_id=$_REQUEST['broker'];
	$premium= $_REQUEST['premium'];
	$passengers= $_REQUEST['passengers'];
	$StampCost= $_REQUEST['StampCost'];
	$SuperVisionCost=$_REQUEST['SuperVisionCost'];
	$issue=$_REQUEST['issue'];
	$SupportTax= $_REQUEST['SupportTax'];
	$commission_office=$_REQUEST['commission_office'];
	$commission_agent= $_REQUEST['commission_agent'];
	$TotalCost= $_REQUEST['TotalCost'];
	$note="insurance";

	include "db_conn.php";

	if ($_REQUEST['type']=='16')
	{

	$premium= $_REQUEST['premium'];
	$passengers='0';
	$StampCost= '0';
	$SuperVisionCost='0';
	$issue='0';
	$SupportTax= '0';
	$commission_office='0';
	$commission_agent=($premium*35)/100;
	$TotalCost=$premium;
	$note="insurance";
	}

	if ($_REQUEST['type']=='19')
	{

	$premium= $_REQUEST['premium'];
	$passengers='0';
	$StampCost= '0';
	$SuperVisionCost='0';
	$issue='0';
	$SupportTax= '0';
	$commission_office='0';
	$commission_agent=0;
	$TotalCost=$premium;
	$note="printing";
	}
	
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO document (
	name,document
    , date
    , type
    , premium
    , passengers
    , commission_office
    , commission_agent
    , issue
    , StampCost
    , SupportTax
    , SuperVisionCost
    , TotalCost
    , broker_id
	,note

)
VALUES (
'$name','$doc','$date','$type','$premium','$passengers','$commission_office','$commission_agent','$issue','$StampCost','$SupportTax','$SuperVisionCost','$TotalCost','$broker_id','$note'
)";





if ($conn->query($sql) === TRUE) {
 header("Location: production.php?msg=true");

} else {
	 header("Location: production.php?error=حدث خطأ ما");
	 echo ($conn->error);
}

$conn->close();
	
	

//header("Location: index.php?error=User Name is Required");
//header("Location: index.php");
}

?>


