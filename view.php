<?php
//session_start();
global $broj_rn, $rez_pretrage;

include_once "model.php";
//include "header.html";

class PlanView extends ModelClass{

// Prikazuje sve RN
public function showrn() {
$rn=$this-> mesec();
  //echo gettype ($rn);
//  var_dump($rn);
//include "rn_include.php";
include "rn_include.php";
}


public function showid($id) {
$rn=$this->getbyid($id);

include "rn_include.php";

}

public function showid2($id) {
$rn=$this->getbyid($id);

$rn= $rn->fetch_assoc();echo "</br>";

// status_id za status=zavrsen
$status_id=$this->getstatusid($id);
$status_id= $status_id->fetch_array();
$status_id=$status_id['0'];
//echo $status_id;
echo "</br>";

echo '<form action="create.php" method="post">';
echo '<input type="hidden" name="Operater" value='.$rn["Operater"].'>';
echo '<input type="hidden" name="separacije" value='.$rn["separacije"].'>';
echo '<input type="hidden" name="Naziv" value='.$rn["Naziv"].'>';
echo '<input type="hidden" name="id" value='.$rn["id"].'>';
echo '<input type="hidden" name="status_id" value='.$status_id.'>';
echo '<input type="submit" value="Radni nalog '.$rn["id"].' -završen" name="zavrsen" class="btn btn-success"></form>';


}

// Prikazuje završene RN između dva datuma
public function izvestaj($datum1, $datum2){
$rn=$this->datum_kupac($datum1, $datum2);
include "izvestaj.php";
}

// Ukoliko su podeseni datumi u pretrazi
public function showdate34($datum1, $datum2){
$rn=$this->getdate12($datum1, $datum2);
include "rn_include2.php";
}

// Ukoliko nisu podeseni datumi u pretrazi - uzima sve podatke
public function showrn2() {
$rn=$this-> getrn();
  //echo gettype ($rn);
  //var_dump($rn);

include "rn_include2.php";
}


}

?>

<script>
function FunctionDelete(id) {
var r = confirm('obrisati RN broj '+id);
if (r == false) {
   return false;
}
}

</script>
