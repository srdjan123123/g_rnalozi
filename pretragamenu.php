<?php
include "header.php";
include "pretraga.php";
include "view.php";


$planObj101=new Pretraga();
$planObj101-> showall();

// Pretraga za RN bez statusa - pretraga.php
if (isset($_POST["save4"])) {
  $planObj111=new PlanView();
  $planObj111-> showrn2();

echo "</br>";
echo "Kupac: ".$_POST["kupac"];  echo "</br>";
echo "Administracija: ".$_POST["administracija"]; echo "</br>";
echo "Komercijalista: ".$_POST["Komercijalista"]; echo "</br>";
echo "Operater: ".$_POST["Operater"]; echo "</br>";
echo "Broj boja: ".$_POST["separacije"]; echo "</br>";
echo "Status: ".$_POST["status"]; echo "</br></br>";
include "rezultatipretrage4.php";
}

// pretraga.php
if (isset($_POST["save3"])) {
$planObj91=new PlanView();
if (isset($_POST["date1"])&&isset($_POST["date2"]) && $_POST["date1"]!='' && $_POST["date1"]!='') {
  $date1=date_create($_POST['date1']);
  $date2=date_create($_POST['date2']);
  echo "Od ".date_format($date1,"d-m-Y")." do ".date_format($date2,"d-m-Y");

$planObj91-> showdate34($_POST['date1'], $_POST['date2']);
}
else {
  $planObj91-> showrn2();
}
//echo $GLOBALS['broj_rn'];
echo "</br>";
echo "Kupac: ".$_POST["kupac"];  echo "</br>";
echo "Administracija: ".$_POST["administracija"]; echo "</br>";
echo "Komercijalista: ".$_POST["Komercijalista"]; echo "</br>";
echo "Operater: ".$_POST["Operater"]; echo "</br>";
echo "Broj boja: ".$_POST["separacije"]; echo "</br>";
echo "Status: ".$_POST["status"]; echo "</br></br>";
include "rezultatipretrage4.php";


}


 ?>
