<style>

.x
{

}
.x:hover
{
  background-color: yellow;
  cursor: pointer;
  font-weight:bold;
}
</style>
<div class="row justify-content-center m-0 p-0">
<div class="col-lg-10 text-center m-0 p-0">
<?php
require('db_conn.php');
$q = $_REQUEST["q"];
$d1=$_REQUEST["date1"];
$d2=$_REQUEST["date2"];
$st=$_REQUEST["st"];

if ($q !== "") {


if ($q==0)
{

  $sql = "SELECT * FROM sam where   date>='".$d1."' AND date<='".$d2."'    order by id";


}
else
{
  $sql = "SELECT * FROM sam where   date>='".$d1."' AND date<='".$d2."' and broker_id='".$q."'  and status='".$st."'   order by id";
}
echo'
<table id="tab" class="table table-striped  table-bordered text-center col-12 display "  style="font-size:18px;">
<thead>
 <tr>
<th   class="small">#</th>
<th  class="small w-10" >رقم الوثيقة</th>
<th class="small w-10">اسم المؤمن له</th>
<th class="small w-10">بواسطة</th>
<th class="small w-30" >التاريخ</th>
<th   class="small">نوع التأمين</th>
<th   class="small">الإجمالي</th>
<th   class="small">حالة السداد</th>
<th   class="small">تسديد</th>
<th   class="small">حذف</th>
<th   class="small">الغاء</th>
<th   class="small"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
</svg></th>

</thead>
</tr>
';
$counter=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
echo"<tr class='x'><td class='p-0 m-0 table-danger'>".$counter."</td>" ;
echo"<td class='p-0 m-0'>".$row['document']."</td>" ;
echo"<td class='p-0 m-0'>".$row['name']."</td>" ;
echo"<td class='p-0 m-0'>".$row['client_name']."</td>" ;
echo"<td class='p-0 m-0'><span>".$row['date']."<span></td>" ;
echo"<td class='p-0 m-0'>".$row['cat_name']."</td>" ;
echo"<td class='p-0 m-0'><u>".$row['TotalCost']."</u></td>" ;
if ($row['status']==1)
{
  echo"<td class='p-0 m-0 table-success'>مسددة</td>" ;

}
else
{
  echo"<td class='p-0 m-0 table-danger'>غير مسددة</td>" ;

}
echo'<td class="p-0 m-0"><button class="btn   p-0 m-0 ps-2 pe-2"  onclick="pay('.$row['id'].');"  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
<path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
<path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
<path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
</svg></button></td>' ;
echo'<td class="p-0 m-0"><button class="btn   p-0 m-0 ps-2 pe-2"  onclick="dele('.$row['id'].');" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button></td>' ;
if($row['cancel']==0)
{echo'<td class="p-0 m-0"><button class="btn   p-0 m-0 ps-2 pe-2"  onclick="cance('.$row['id'].');" ><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
  <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
  <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
</svg> </b></button></td>' ;}
else
{echo'<td class="p-0 m-0"><button class="btn btn-success  p-0 m-0 ps-2 pe-2"  onclick="cance('.$row['id'].');" ><b>إعادة تفعيل </b></button></td>' ;}
  echo"<td class='p-0 m-0'><a class='btn  p-0 m-0 ps-2 pe-2' href='send_sms.php?id=".$row['broker_id']."'><b>";
  echo'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
</svg>';
  
  echo"</b></a></td>" ;


$counter=$counter+1;



echo'</tr>';
   }
}

$conn->close();

require('db_conn.php');

if($q==0)
{
  $sql = "SELECT  sum(StampCost)  as tsc,sum(premium)as tp,sum(SuperVisionCost)  as tsvc  ,sum(issue) tissue,sum(passengers) as tpassengers,sum(SupportTax) as tst,sum(TotalCost) as ttc ,floor(sum(commission_office)) as tco  ,floor(sum(commission_agent)) as tca FROM sam   where   date>='".$d1."' AND date<='".$d2."'    order by date";

}
else
{
  $sql = "SELECT  sum(StampCost)  as tsc,sum(premium)as tp,sum(SuperVisionCost)  as tsvc  ,sum(issue) tissue,sum(passengers) as tpassengers,sum(SupportTax) as tst,sum(TotalCost) as ttc ,floor(sum(commission_office)) as tco  ,floor(sum(commission_agent)) as tca FROM sam where   date>='".$d1."' AND date<='".$d2."'  and date='".date('Y-m-d')."' and   broker_id='".$q."'  and status='".$st."'  order by date";

}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
echo"<tr class='x'><td class='p-0 m-0'></td>" ;
echo"<td class='p-0 m-0'></td>" ;
echo"<td class='p-0 m-0'></td>" ;
echo"<td class='p-0 m-0'></td>" ;
echo"<td class='p-0 m-0'></td>" ;
echo"<td class='p-0 m-0'></td>" ;

echo"<td class='p-0 m-0'><b>".$row['ttc']."</b></td>" ;
echo"<td class='p-0 m-0'></td>" ;
echo"<td class='p-0 m-0'></td>" ;

echo'</tr>';


echo'</table>';



   }}}

?>


</div>

      <div class="col-lg-2 text-center m-0 ps-0 pe-2">


<h5 class="bg-danger text-white p-3">المديونية</h5>
      <?php
 $s=0;

$sql = "SELECT
broker_id,`client_name`
, `status`
,(SUM(`TotalCost`)-SUM(`commission_office`)) AS sa
FROM
`extra_insurance`.`sam` WHERE STATUS='0'
GROUP BY client_name
";
echo'<table id="table" class="table table-responsive  table-striped    table-bordered text-center col-12 small" style="font-size:14px;">
 <tr>
 <th   class=" p-2 table-danger">العميل</th>
<th  class="table-danger" >جملة المبلغ</th>
<th   class="table-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
</svg></th>
</tr>';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
echo"<tr class='x'><td class='p-0 m-0' >".$row['client_name']."</td>" ;
echo"<td class='p-0 m-0'>".$row['sa']."</td>
";
echo"<td class='p-0 m-0'><a class='btn  p-0 m-0 ps-2 pe-2' href='send_sms.php?id=".$row['broker_id']."'><b>";
echo'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
</svg>';
echo"</b></a></td>" ;
echo"</tr>" ;
$s= $s+$row['sa'];

   }
}
echo'<tr><th class="table-danger">الجملة</th>';
echo'<td class="table-danger"><b>'.$s.'<b></b></td>
<td class="table-danger"><b>-<b></b></td>
</tr>';
echo'</table>';



?>

      </div>





      

