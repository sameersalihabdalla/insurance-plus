




<!DOCTYPE html>
<html lang="ar">

<head>
<?php
	
require('db_conn.php');
?>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=1220">


  <title>insurance PLUS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">

</head>

<body dir="rtl" class="m-0 p-2">
<h2 class="text-center" style="font-family:arial;font-size:24px;"><b>تقرير مديونية وثائق الطرف الثالث</b></h2>
<hr>
<h2 class="text-center" style="font-family:arial;font-size:24px;">الفترة من </h2>

<?php
 $s=0;

$sql = "SELECT
`client_name`
, `status`
,SUM(`TotalCost`) AS sa
FROM
`extra_insurance`.`sam` WHERE STATUS='0'
GROUP BY client_name
";
echo'
<table class="table table-responsive table-bordered text-center col-12 small" style="font-family:arial;font-size:14px;">
 <tr>
<th   class="small">العميل</th>
<th  class="small w-10" >جملة المبلغ</th>
</tr>

';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
echo"<tr><td class='p-0 m-0'>".$row['client_name']."</td>" ;
echo"<td class='p-0 m-0'>".$row['sa']."</td></tr>" ;
$s= $s+$row['sa'];


   }
}

echo'<tr><td class="table-danger">الجملة</td>';
echo'<td class="table-danger">'.$s.'</td></tr>';
echo'</table>';



?>
<button onclick="window.print()">Print this page</button>

            </section>
            



</body>

</html>

