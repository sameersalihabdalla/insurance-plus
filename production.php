<?php
include('config.php');

# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insurance plus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
</head>

<body dir="rtl">
<?php include('navbar.php'); ?>
  <div class="col-12 ">
   
    <div class="row justify-content-center m-0 p-0">
      <div class="col-lg-2 text-center m-0 p-0">
        
        <hr>
        <form class="form p-1" action="insert_document.php" method="GET">
<input type="text" class="form-control m-2" required id="doc" name="doc" placeholder="رقم الوثيقة">
<input type="text" class="form-control m-2" required id="name" name="name" placeholder="اسم المؤمن له">
<input type="date" class="form-control m-2" required id="date" name="date"  placeholder="التاريخ" value="<?=date("Y-m-d"); ?>">
<select placeholder="نوع التأمين" required class="form-control m-2" name="type" onChange="get_data()" id="type"  onselect="get_data()" onFocus="get_data()">
<?php
require('config.php');
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}
else
{
  $sql = "SELECT * from cat";
$result = $link->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())
{	
echo'<option value='.$row["id"].'>'.$row["name"].'</option>';
}
} else {
echo "0 results";
}
$link->close();
}

?>	


</select>



<select class="form-control m-2"  id="broker" name="broker" require>
<?php
require('config.php');

if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
  }
$sql = "SELECT * from clients order by name";
$result = $link->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())
{	
echo'<option   value='.$row["id"].'>'.$row["name"].'</option>';
}
} else {
echo "0 results";
}
$link->close();
?>	

</select>



<hr>
       <table id="tbl" name="tbl" class="table border m-1 p-1 small">
     
    
       </table>

       <?php
if(isset($_REQUEST['msg'])){

  if ($_REQUEST['msg']='true')
  {
    echo'<script>
    
    alert("your Data Saved");
    
    </script>';

  }

}

       ?>
    <hr>
<input type="submit" value="حفظ" name="submit" class="btn btn-success m-2 " >
</form>


      </div>
      <div class="col-lg-10" >
      <iframe src="http://35.154.250.192:8080/" width="100%" height="900px" style="" dir="ltr">
</iframe>

      </div>
   
  </div>
</body>

<script>

function get_data() {
var strrr =document.getElementById("type").value;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
	  document.getElementById("tbl").innerHTML = this.responseText;

}
};
xmlhttp.open("GET", "get_data.php?q=" +strrr, true);
xmlhttp.send();
}


</script>


</html>