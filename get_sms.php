<div id="content" class="p-5 m-5">
  <table class="table">
    <td>التاريخ</td>
    <td>الاسم</td>
    <td>نوع التأمين</td>
    
    <td>المبلغ</td>
    <tr>
<?php
require('db_conn.php');
$q = $_REQUEST["q"];
$d1=$_REQUEST["date1"];
$d2=$_REQUEST["date2"];
$phone=$_REQUEST["phone"];
  $toto=0;

$text='Your invoice from : '.$d1.' *-* '.$d2.urlencode("\n");
$text2='Your invoice from : '." ".$d1.' *-* '.$d2."<br>";

if ($q !== "") {
$sql = "SELECT *  FROM sam where   date>='".$d1."' AND date<='".$d2."' and status='0' and broker_id='".$q."' order by id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $text= $text .''.$row['name'].'   *'.($row['TotalCost'] - $row['commission_office']).'*'.urlencode("\n");
    $text2= $text2 .''.$row['name'].'   *'.($row['TotalCost'] - $row['commission_office'])."* <br>";
    $toto=$toto+(($row['TotalCost'])-($row['commission_office']));
    echo"<td class='p-0 m-0'><span>".$row['date']."<span></td>" ;
    echo"<td class='p-0 m-0'><span>".$row['name']."<span></td>" ;
    echo"<td class='p-0 m-0'>".$row['cat_name']."</td>" ;
    echo"<td class='p-0 m-0'><u>".($row['TotalCost']-$row['commission_office'])."</u></td></tr>" ;
    
   }
}
echo'</table>';
$conn->close();
require('db_conn.php');

  $sql = "SELECT name,  sum(TotalCost) as ttc ,floor(sum(commission_office)) as co    FROM sam where   date>='".$d1."' AND date<='".$d2."'  and date='".date('Y-m-d')."' and status='0'  and  broker_id='".$q."' order by id";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
$text=$text. "_*Total:*_   ";
$text2=$text2. "_*Total:*_   ";

$text=$text.'*'.$toto."*  SDG" .urlencode("\n")."  ";
$text2=$text2.'*'.$toto."*  SDG"."  ";

echo'<code  dir="ltr">';
echo $text2."<br>";
echo'</code>';
echo'<a href="whatsapp://send?phone='.$phone.'&text='.($text).'"> Send <a/> ';


   }}}


?>


  </div>


