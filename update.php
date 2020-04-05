<?php
session_start();
//global $ErrOper, $ErrSep, $ErrNaz;
include 'view.php';
include "novinalogClass.php";
include "header.php";



//include "rnzavrsen.php";

//echo $_SESSION["ErrOper"];

if (@$_SESSION["ErrOper"] !='') {
echo '<div class="alert alert-danger">'.@$_SESSION["ErrOper"].'</div>';}
if (@$_SESSION["ErrSep"] !='') {
echo '<div class="alert alert-danger">'.@$_SESSION["ErrSep"].'</div>';}
if (@$_SESSION["ErrNaz"] !='') {
echo '<div class="alert alert-danger">'.@$_SESSION["ErrNaz"].'</div>';}


if (isset($_GET['id'])) {

//echo $_SESSION["ErrOper"];

$prikazi=new PlanView;
$prikazi->showid($_GET['id']);
$novinalog= New PlanNew;
//$novinalog->showall();
$novinalog->showall2($_GET['id']);


$zavrsen=new PlanView;
$zavrsen->showid2($_GET['id']);


}

session_unset();
?>
