<?php
include "header.php";
?>

<html>
<body>
<h5>Izveštaj:</h5></br>
<form action="izvestajmenu.php">
  Datum od:
  <input type="date" name="date1" method="GET">
  Datum do:
  <input type="date" name="date2" method="GET">
  <input type="submit" name="datumi">
</form>
</body>
</html></br>
<?php

// GET - datumi za Izveštaj
include "view.php";
if (isset($_GET["datumi"])){

  $date1=date_create($_GET['date1']);
  $date2=date_create($_GET['date2']);
$planObj101=new PlanView();
echo "Od ".date_format($date1,"d-M-Y")." do ".date_format($date2,"d-M-Y");

echo "</br>";
$planObj101-> izvestaj($_GET["date1"], $_GET["date2"]);
}
 ?>
