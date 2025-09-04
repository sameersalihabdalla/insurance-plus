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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <script src='js/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='js/jquery.dataTables.min.js'></script>
<script src='js/dataTables.responsive.min.js'></script>
<script src='js/dataTables.bootstrap5.min.js'></script>
</head>

<body dir="rtl">
<?php include('navbar.php'); ?>
  <div class="col-12 p-4">
   <h1 class="mt-3 ">

  قائمة الوثائق</h1>
  <div class="row">
<div class="col-3">
<label for="client">اسم العميل</label>
<select id="client" name="client" class="form-control" onclick="get_data();">
  <option value="0">-</option>
 <?php
if ($link->connect_error) {
die("Connection failed: " );
}
else
{
  $sql = "SELECT * from clients order by name";
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
</div>
<div class="col-3">
<label>تاريخ البداية</label>

<input type="date" id="date1" value="<?=date('Y-m-d')?>" class="form-control inline"  onchange="get_data();"  onclick="get_data();">
</div>
<div class="col-3">
<label>تاريخ النهاية</label>
<input type="date" id="date2"  onclick="get_data();" onchange="get_data();" value="<?=date('Y-m-d')?>" class="form-control "></div>
<div class="col-2">
<div class="form-check">
  <input class="form-check-input" onclick="get_data();" type="radio" name="flexRadioDefault" id="r1" checked>
  <label class="form-check-label" for="flexRadioDefault1">
    الوثائق غير المسددة
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" onclick="get_data();" type="radio" name="flexRadioDefault" id="r2" >
  <label class="form-check-label" for="flexRadioDefault2">
الوثائق المسددة
</label>
</div>
</div>
</div>

</div>
<body id="top">
<main class="cd__main p-5 ">
<div id="goal">
</div>
</main>


</div>
  </div>
</body>


<script>

function get_data() {
var strrr =document.getElementById("client").value;
var d1 =document.getElementById("date1").value;
var d2 =document.getElementById("date2").value;
var st=0;
if((document.getElementById("r1").checked)==true)
{
  st=0;
}
else
{
st=1;
}



var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
	  document.getElementById("goal").innerHTML = this.responseText;
}
};
xmlhttp.open("GET", "get_details.php?q=" +strrr+"&date1="+d1+"&date2="+d2+"&st="+st, true);
xmlhttp.send();
}










get_data();

</script>




<script>



function pay($x) {


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
}
};
xmlhttp.open("GET", "pay.php?id=" +$x, true);
xmlhttp.send();



get_data();



alert('Data Saved');

}



  </script>
  <script>


function dele($xx) {


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
}
};
xmlhttp.open("GET","delete.php?id="+$xx,true);
xmlhttp.send();
get_data();

alert('Remove Saved');

}



function cance($xx) {


var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
}
};
xmlhttp.open("GET","cancel.php?id="+$xx,true);
xmlhttp.send();
get_data();

alert('Cancel Changed');

}

    </script>









</html>