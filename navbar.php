<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Insurance+ </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-3 me-3" id="mynavbar">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="index.php">الرئيسية </a>
        </li>

      <li class="nav-item">
          <a class="nav-link" href="production.php">الإنتاج </a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="report.php">التقرير الكامل</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="report_today.php">تقرير اليوم</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="DebtReport.php">تقرير المديونية</a>
        </li>
        <li  class="nav-item">
        <a href="./logout.php" class="nav-link">تسجيل الخروج</a></span>

        </li>
      </ul>
      <form class="d-flex ms-3 me-3"  id="form" action="CustomReport.php" method="get">
      <label class="p-2 m-1">من</label>  <input class="form-control p-0 m-0 ps-3 pe-3" name="datee"  type="date" value="<?=date('Y-m-d')?>" placeholder="تاريخ البداية">
      <label class="p-2 m-1">إلى</label>   <input class="form-control p-0 m-0 ps-3 pe-3" type="date"  name="dateee" value="<?=date('Y-m-d')?>" placeholder="تاريخ النهاية">
        
        <input  class="btn btn-primary small p-0 ms-1 me-3 m-0 p-1" type="submit" value="تقرير الشركة" >
        <input  class="btn btn-primary small p-0 ms-1 me-3 m-0 p-1" type="submit" onclick="g();" value=" تقرير المديونية" >
        
      </form>
    </div>
  </div>
</nav>

<script>

function g()
{
document.getElementById('form').action="debit.php"
}
  </script>
