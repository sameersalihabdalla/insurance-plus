
<?php
$q = $_REQUEST["id"];



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
  <div class="col-12 p-4">
   <h1 class="mt-3 ">

  كشف الحساب و الرسائل القصيرة </h1>
  <hr>
  <div class="row">


  <div class="col-1">
<label>تاريخ البداية</label>

<input type="date" id="date1" value="<?=date('Y-m-d')?>" class="form-control inline" onchange="get_data()";  onclick="get_data();">
</div>
<div class="col-1">
<label>تاريخ النهاية</label>

<input type="date" id="date2"  onclick="get_data();" onchange="get_data()";  value="<?=date('Y-m-d')?>" class="form-control "></div>


<?php

require('db_conn.php');
$sql = "SELECT * FROM clients where   id='".$q."' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {

    
echo'<div class="col-1">
<label>معرف العميل</label>
<input type="text" disabled id="id"  onclick="get_data();" value="'.$row['id'].'" class="form-control "></div> 
<div class="col-2">
<label>اسم العميل</label>
<input type="text" disabled id="name"  onclick="get_data();" value="'.$row['name'].'" class="form-control "></div>
<div class="col-1">
<label> رقم الهاتف</label>
<input type="phone" disabled id="phone"  onclick="get_data();" value="'.$row['phone'].'" class="form-control "></div>';


}
}
?>


</div>
<div id="goal">
</div>
</div>

  </div>
</body>






<script>

function get_data() {
var strrr =document.getElementById("id").value;
var d1 =document.getElementById("date1").value;
var d2 =document.getElementById("date2").value;
var phone=document.getElementById("phone").value;

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
	  document.getElementById("goal").innerHTML = this.responseText;
}
};
xmlhttp.open("GET", "get_sms.php?q=" +strrr+"&date1="+d1+"&date2="+d2+"&phone="+phone, true);
xmlhttp.send();
}

get_data();

</script>


</html>



