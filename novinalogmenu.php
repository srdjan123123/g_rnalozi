<?php
include "header.php";
include "novinalogClass.php";
//echo "<div class='alert alert-danger>";
if (@$ErrAdmin !='') {
echo '<div class="alert alert-danger">'.@$ErrAdmin.'</div>';}
if (@$ErrKom !='') {
echo '<div class="alert alert-danger">'.@$ErrKom.'</div>';}
if (@$ErrKup !='') {
echo '<div class="alert alert-danger">'.@$ErrKup.'</div>';}
if (@$ErrNap !='') {
echo '<div class="alert alert-danger">'.@$ErrNap.'</div>';}
// Novi nalog - meni za administracija, komercijala, kupac, sifra i napomena
$planObj51=new PlanNew();
echo "<h5>Novi nalog:</h5></br>";
$planObj51-> showall();
