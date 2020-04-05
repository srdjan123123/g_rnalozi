<?php

session_start();
//global $ErrOper, $ErrSep, $ErrNaz;
include 'controller.php';
include_once 'view.php';
//include "header.html";
// Podaci - insertform.php
if (isset($_GET["Komercijala"])) {
$Obj1=new Controller();
$Obj1-> createk($_GET["Komercijala"]);
header("Location:insertform.php");
}
elseif (isset($_GET["Operater"])) {
$Obj2=new Controller();
$Obj2-> createo($_GET["Operater"]);
header("Location:insertform.php");
}
elseif (isset($_GET["Separacije"])) {
$Obj3=new Controller();
$Obj3-> createsep($_GET["Separacije"]);
header("Location:insertform.php");
}
elseif (isset($_GET["Administracija"])) {
$Obj4=new Controller();
$Obj4-> createa($_GET["Administracija"]);
header("Location:insertform.php");
}
elseif (isset($_GET["Kupac"])) {
$Obj5=new Controller();
$Obj5-> createku($_GET["Kupac"]);
header("Location:insertform.php");
}
elseif (isset($_GET["Status"])) {
   if ($_GET["Status"] =='završen') {
     header("Location:insertform.php");
   } else {
$Obj6=new Controller();
$Obj6-> creates($_GET["Status"]);
header("Location:insertform.php");
}
}


// Novi radni nalog - novinalogClass.php
if (isset($_POST["save"]) ) {
  $ErrAdmin= $ErrKom= $ErrKup= $ErrNap='';

  if($_POST["administracija_id"]=='1'){
    $ErrAdmin="Nedostaje podatak \"Administracija\"";

  }
  if($_POST["komercijalista_id"]=='1'){
    $ErrKom="Nedostaje podatak \"Komercijala\"";
  }
  if($_POST["kupac_id"]=='1'){
    $ErrKup="Nedostaje podatak \"Kupac\"";
  }
  if($_POST["Napomena"]==''){
    $ErrNap="Nedostaje podatak \"Napomena\"";
  }
  if($_POST["administracija_id"]!='1' && $_POST["komercijalista_id"]!='1' && $_POST["kupac_id"]!='1' && $_POST["Napomena"]!=''){
    $Obj7=new Controller();
    $Obj7-> creatern($_POST["administracija_id"],$_POST["komercijalista_id"],$_POST["kupac_id"],
    $_POST["Sifra"],$_POST["Napomena"]);

    header("Location:index2.php");
  } else {
include "novinalogmenu.php";
  }

}


// EDIT RN - novinalogClass.php
if (isset($_POST["save2"])) {

$Obj8=new Controller();
$Obj8-> updatern($_POST["id"],$_POST["operater_id"],$_POST["separacije_id"],$_POST["status_id"],
$_POST["Sifra"],$_POST["Naziv"]);

}



if (isset($_POST["zavrsen"])) {
$id=$_POST["id"];
  if ($_POST["Operater"]!='' && $_POST["separacije"]!='0' && $_POST["Naziv"]!=''){
  $Obj9=new Controller();
  $Obj9-> statuszavrsen($_POST["id"],$_POST["status_id"]);
  
} else {

if($_POST["Operater"]==''){
  $_SESSION ["ErrOper"]="Nedostaje podatak \"Operater\"";
}
if($_POST["separacije"]=='0'){
  $_SESSION ["ErrSep"]="Nedostaje podatak \"Separacije\"";
}
if($_POST["Naziv"]==''){
  $_SESSION ["ErrNaz"]="Nedostaje podatak \"Naziv\"";
}

}
header("Location:update.php?id=$id");
}


 ?>
