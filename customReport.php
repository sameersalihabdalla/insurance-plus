<!DOCTYPE html>
<html lang="ar">
<head>
<?php
$date1 = $_GET["datee"];
$date2 = $_GET["dateee"];
require('db_conn.php');
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=3508  height=2480">
<title>insurance PLUS</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="./css/main.css">
</head>

<body dir="rtl" class="m-0 p-0">
<h4 class="text-center" style="font-family:arial;font-size:24px;"><b>كشف  وثائق الطرف الثالث</b></h4>
<hr>
<h4 class="text-center" style="font-family:arial;font-size:24px;">الفترة من <span class="small"> <?=$date1?> حتى <?=$date2?></span></ا4>

 
<?php



if ($date1 !== "") {

$counter=1;
$sql = "SELECT * FROM sam where note='insurance' and   date>='".$date1."' AND date<='".$date2."' order by date  ";
echo'
<table class="table table-bordered text-right  small text-center p-0 m-0"   style="font-family:arial;font-size:12px; width="90%">
<thead>
 <tr >
<th class="small">#</th>
<th class="small m-0" style="width:20%;" >رقم الوثيقة</th>
<th class="small w-10" style=" min-width:160px;">اسم المؤمن له</th>
<th class="small" style=" min-width:80px;" >التاريخ</th>
<th class="small " style="min-width:70px;">نوع التأمين</th>
<th class="small"  style=" min-width:40px;">القسط</th>
<th class="small" style=" min-width:40px;" >الدمغة</th>
<th class="small" >الإشراف</th>
<th class="small" >الإصدار</th>
<th class="small">الركاب</th>
<th class="small"  style="width:50px;">أ.عمل</th>
<th class="small" hidden >َض د</th>
<th class="small" style="width:100px;">الإجمالي</th>
<th hidden   class="small">عمولة الأفراد</th>
<th   class="small"  style=" min-width:40px;" >العمولة</th>
<th  hidden class="small">الفائدة</th>

</thead>
</tr>
';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {

if($row['cancel']==0)
{
   echo"<tr><td class='p-0 m-0'>".$counter."</td>" ;
echo"<td class='p-0 m-0'>".$row['document']."</td>" ;
echo"<td class='p-0 m-0'>".$row['name']."</td>" ;
echo"<td class='p-0 m-0'><span>".$row['date']."<span></td>" ;
if($row['cat_name']=="تمديد وثيقة")
{
   echo"<td class='p-0 m-0 ' style='width:130px ; color:red;'><u><b>".$row['cat_name']."</b></u></td>" ;

}
else
{
   echo"<td class='p-0 m-0' style='width:130px ;'>".$row['cat_name']."</td>" ;

}
echo"<td class='p-0 m-1 ' dir='ltr'>".number_format($row['premium'])."</td>" ;
echo"<td class='p-0 m-1'>".number_format($row['StampCost'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['SuperVisionCost'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['issue'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['passengers'])."</td>" ;
echo"<td class='p-0 m-0' hidden>0</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['SupportTax'])."</td>" ;
echo"<td class='p-0 m-0'><b><u>".number_format($row['TotalCost'])."</u></b></td>" ;
echo"<td hidden class='p-0 m-0'><b><u>".number_format($row['commission_office'])."</u></b></td>" ;
echo"<td class='p-0 m-0'><b><u>".number_format($row['commission_agent'])."</u></b></td>" ;
echo"<td hidden class='p-0 m-0'><b><u>".number_format(($row['commission_agent'])-($row['commission_office']))."</u></b></td>";
}
else
{
echo"<tr class='table-info table-striped table-info thead-dark' style='  font-weight: 600; text-decoration-line: underline;' ><td  class='p-0 m-0'>".$counter."</td>" ;
echo"<td  class='p-0 m-0 '>".$row['document']."</td>" ;
echo"<td class='p-0 m-0'>".$row['name']."</td>" ;
echo"<td class='p-0 m-0'><span>".$row['date']."<span></td>" ;
echo"<td class='p-0 m-'>".$row['cat_name']."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['premium'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['StampCost'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['SuperVisionCost'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['issue'])."</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['passengers'])."</td>" ;
echo"<td class='p-0 m-0' hidden>0</td>" ;
echo"<td class='p-0 m-0'>".number_format($row['SupportTax'])."</td>" ;
echo"<td class='p-0 m-0 ' ><b><u>".number_format($row['TotalCost'])."</u></b></td>" ;
echo"<td hidden class='p-0 m-0'><b><u>".number_format($row['commission_office'])."</u></b></td>" ;
echo"<td class='p-0 m-0'><b><u>".number_format($row['commission_agent'])."</u></b></td>" ;
echo"<td hidden class='p-0 m-0 'hidden ><b><u>".number_format((($row['commission_agent'])-($row['commission_office'])))."</u></b></td>" ;
}

echo'</tr>';
$counter=$counter+1;
   }
}

$conn->close();

require('db_conn.php');

$totaly=0;
$ctotaly=0;

$sql = "SELECT sum(TotalCost) as sTotalCost,sum(commission_agent) as scommission_agent FROM sam where note='insurance' and  date>='".$date1."' AND date<='".$date2."' and cancel=1 order by date";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {  
$totaly=$row['sTotalCost'];
$ctotaly=$row['scommission_agent'];
}}

$conn->close();
require('db_conn.php');

$sql2 = "SELECT *,  sum(StampCost)  as tsc,sum(premium)as tp,sum(SuperVisionCost)  as tsvc  ,sum(issue) tissue,sum(passengers) as tpassengers,sum(SupportTax) as tst,sum(TotalCost) as ttc ,floor(sum(commission_office)) as tco  ,floor(sum(commission_agent)) as tca FROM sam where  date>='".$date1."' AND date<='".$date2."' order by date";
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2) > 0) {
   while($row = mysqli_fetch_assoc($result2)) {  
      echo"<tr  style='font-size:16px;' >" ;
      echo"<th class='table-info' colspan=4>الجملة</th>" ;
      echo "<td>-</td>";
      echo"<td class=' table-info'>".number_format($row['tp'])."</td>" ;
      echo"<td class='  table-info'>".number_format($row['tsc'])."</td>" ;
      echo"<td class=' table-info'>".number_format($row['tsvc'])."</td>" ;
      echo"<td class=' table-info'>".number_format($row['tissue'])."</td>" ;
      echo"<td class=' table-info'>".number_format($row['tpassengers'])."</td>" ;
      echo"<td class=' table-info' hidden>0</td>" ;
      echo"<td class='table-info'>".number_format($row['tst'])."</td>" ;
      echo"<td class=' table-info'>".number_format($row['ttc'])."</td>" ;
      echo'<td hidden>'.number_format($row['tco']).'</td>';
      echo'<td class=" table-info">'.number_format($row['tca']).'</td>';
      echo'<td hidden>'.number_format((($row['tca'])-($row['tco']))).'</td></tr>';
//echo $row['TotalCost'];
echo'</table></div>';
$total=$row['ttc'];
$t_com=$row['tca'];
echo'
<table class="table small table-bordered text-centr p-0 m-0 " style="font-family:arial;font-size:14px; width="80%" >
<th class="table-danger">البيان</th><th class="table-danger">الوثائق السارية</th><th class="table-danger">الوثائق الملغية</th><tr>
<td>جملة تقرير فونكس</td><th>'.number_format($row['ttc']).'</th><td>'.$totaly.'</td></td><tr>
<td> العمولة</td><th>'.number_format($row['tca']).'</th><td>'.$ctotaly.'</td></td><tr>';
echo'<td>الإجمالي</td><th>'.number_format((($total)-($t_com))).'</th><td>'.number_format(($totaly-$ctotaly)).'</td><tr><td class="table-danger"  colspan="3"><h4>المبلغ المطلوب سداده هو : <b><u> '.number_format(((($total)-($t_com))-($totaly-$ctotaly))).' </u></b></h4></td></tr>';
}
}}
   echo'</table>
   <table class="table small table-bordered text-centr p-0 m-0" style="font-family:arial;font-size:14px; width="80%" >';
   echo'<th class="p-1 m-0">النوع</th>';
   echo'<th class="p-1 m-0">العدد</th>';
   echo'<th class="p-1 m-0">القسط </th>';
   echo'<th class="p-1 m-0">ض . ا . ع</th>';
   echo'<th class="p-1 m-0">رسوم الإشراف</th>';
   echo'<th class="p-1 m-0">ضريبة دعم</th>';
   echo'<th class="p-1 m-0">دمغة</th>';
   echo'<th class="p-1 m-0">الجملة</th>';
$sql="SELECT
`type`
, `cat_name`
, sum(`Employertax`) as Employertax
, sum(`SuperVisionCost`) as SuperVisionCost
, sum(`SupportTax`) as SupportTax
, sum(`StampCost`) as StampCost
, sum(`TotalCost`) as TotalCost
, sum(`premium`) as premium
, `id`
,COUNT(`id`) AS COUN
FROM
`extra_insurance`.`sam` where note='insurance'  and  date>='".$date1."' AND date<='".$date2."' 
GROUP BY `type`";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
      echo'<tr class="p-1 m-0 text-center"><td class="p-1 m-1">'. $row['cat_name'].' </td>';
      echo'<td class="p-1 m-1">'.number_format($row['COUN']).'</td>';
      echo'<td class="p-1 m-1">'.number_format($row['premium']).'</td>';
      echo'<td class="p-1 m-1">'.number_format($row['Employertax']).'</td>';
      echo'<td class="p-1 m-1">'.number_format($row['SuperVisionCost']).'</td>';
      echo'<td class="p-1 m-1">'.number_format($row['SupportTax']).'</td>';
      echo'<td class="p-1 m-1">'.number_format($row['StampCost']).'</td>';
      echo'<td class="p-1 m-1">'.number_format($row['TotalCost']).'</td>';
      echo'</tr>';
   }}
   echo'</table></div>';  
?>

</body>

</html>

