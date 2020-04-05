<?php
include_once "model.php";
//include "header.html";
class Pretraga extends ModelClass{

public function showall() {

$komercijalisti=$this-> getk();
$administracija=$this-> geta();
$kupac=$this-> getku();
$operateri=$this-> geto();
$separacije=$this-> getsep();
$status=$this-> gets();
echo "<h5>Pretraga</h5>";

// Submit za pretragu RN bez postavljenog statusa
echo "<form action='pretragamenu.php' method='POST'>";
echo "</br><input type='submit' name='save4' value='Novi radni nalozi'></br></br>";


// Meni za pretragu

  echo "Datum od:<input type='date' name='date1' >
  Datum do:<input type='date' name='date2'></br>";

if ($administracija->num_rows > 0) {
echo "Administracija:
  <td><select name='administracija'>
    <option value=''></option>";
while($row = $administracija->fetch_assoc()) {
  if($row['administracija_id'] >=2) {
    echo '<option value="'.$row['administracija'].'">'.$row['administracija'].'</option>';
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
  <td><select name='Komercijalista'>
    <option value=''></option>";
while(($row = $komercijalisti->fetch_assoc())  ) {
if($row['komercijalista_id'] >=2) {
    echo '<option value="'.$row['Komercijalista'].'">'.$row['Komercijalista'].'</option>';
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
  <td><select name='kupac'>
    <option value=''></option>";
while($row = $kupac->fetch_assoc()) {
  if($row['kupac_id'] >=2) {
    echo '<option value="'.$row['kupac'].'">'.$row['kupac'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}

echo "</br>";
echo "Operater: ";

if ($operateri->num_rows > 0) {
  echo "
  <td><select name='Operater'>
    <option value=''></option>";
while($row = $operateri->fetch_assoc()) {
  if($row['operater_id'] >=2) {
    echo '<option value="'.$row['Operater'].'">'.$row['Operater'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}

echo "</br>";

echo "Separacije: ";


if ($separacije->num_rows > 0 ) {
  echo "
  <td><select name='separacije'>
    <option value=''></option>";

while(($row = $separacije->fetch_assoc())  ) {


if($row['separacije_id'] >=2) {
    echo '<option value="'.$row['separacije'].'">'.$row['separacije'].'</option>';
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
  <td><select name='status'>
    <option value=''></option>";
while($row = $status->fetch_assoc()) {
  if($row['status_id'] >=2) {
    echo '<option value="'.$row['status'].'">'.$row['status'].'</option>';
}
}
echo "</select></td>";
}
else {
    echo "0 results</br>";
}



echo "</br><input type='submit' name='save3'>
</form></br>";




}


}

?>
