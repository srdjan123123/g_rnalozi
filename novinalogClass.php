<?php
include_once "model.php";
//include "header.html";
class PlanNew extends ModelClass{

public function showall() {

$komercijalisti=$this-> getk();
$administracija=$this-> geta();
$kupac=$this-> getku();

// Meni za unosenje podataka za novi RN
if ($administracija->num_rows > 0) {
  echo "<form action='create.php' method='POST'>Administracija:
  <td><select name='administracija_id'>
    <option value='1'></option>";
while($row = $administracija->fetch_assoc()) {
  if($row['administracija_id'] >=2) {
    echo '<option value="'.$row['administracija_id'].'">'.$row['administracija'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}

echo "</br>";

echo "Komercijala: ";
if ($komercijalisti->num_rows > 0 ) {
  echo "
  <td><select name='komercijalista_id'>
    <option value='1'></option>";
while(($row = $komercijalisti->fetch_assoc())  ) {
if($row['komercijalista_id'] >=2) {
    echo '<option value="'.$row['komercijalista_id'].'">'.$row['Komercijalista'].'</option>';
}
}
echo "</select></td>";
}

else {
    echo "0 results</br>";
}
echo "</br>";

echo "Kupac: ";
if ($kupac->num_rows > 0) {
  echo "
  <td><select name='kupac_id'>
    <option value='1'></option>";
while($row = $kupac->fetch_assoc()) {
  if($row['kupac_id'] >=2) {
    echo '<option value="'.$row['kupac_id'].'">'.$row['kupac'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}
echo "</br>";
echo "Sifra: <input type='text' name='Sifra'></br>
      Napomena: <textarea name='Napomena' rows='1' cols='60'></textarea></br>
      <input type='submit' name='save'>
</form></br>";

}

// View.php

public function showall2($id) {

$operateri=$this-> geto();
$separacije=$this-> getsep();
$status=$this-> gets();


// Meni za update RN (edit RN)
if ($operateri->num_rows > 0) {
  echo "<form action='create.php' method='POST'>Operater:
  <td><select name='operater_id'>
    <option value='1'></option>";
while($row = $operateri->fetch_assoc()) {
  if($row['operater_id'] >=2) {
    echo '<option value="'.$row['operater_id'].'">'.$row['Operater'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}

echo "</br>";

echo "Separacije: ";
//$row = $komercijalisti->fetch_assoc();

if ($separacije->num_rows > 0 ) {
  echo "
  <td><select name='separacije_id'>
    <option value='1'></option>";

while(($row = $separacije->fetch_assoc())  ) {


if($row['separacije_id'] >=2) {
    echo '<option value="'.$row['separacije_id'].'">'.$row['separacije'].'</option>';
}
}
echo "</select></td>";
}

else {
    echo "0 results</br>";
}
echo "</br>";



echo "Status: ";
if ($status->num_rows > 0) {
  echo "
  <td><select name='status_id'>
    <option value='1'></option>";
while($row = $status->fetch_assoc()) {
  if($row['status_id'] >=3) {
    echo '<option value="'.$row['status_id'].'">'.$row['status'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}
echo "</br>";
$status2=$row['status']['id'];

//echo "Naziv: ";
echo 'Sifra: <input type="text" name="Sifra" ><br>
      Naziv: <input type="text" name="Naziv" ><br>
      <input type="hidden" name="id" value='.$id.'><br>
<!--      <font size="5">Radni nalog završen: </font><input type="checkbox" class="largerCheckbox" name="status" value="završen"><br><br> --!>
      <input type="submit" name="save2">
</form></br>';


}



}


?>
