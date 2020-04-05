<?php

include_once 'model.php';
//include_once 'operater.class.php';
class Controller extends ModelClass{

public function createk($Komercijalista) {
$this->setk($Komercijalista);
}

public function createo($Operater) {
$this->seto($Operater);
}

public function createsep($Separacije) {
$this->setsep($Separacije);
}

public function createa($Administracija) {
$this->seta($Administracija);
}

public function createku($Kupac) {
$this->setku($Kupac);
}

public function creates($Status) {
$this->sets($Status);
}


public function creatern($administracija_id,$komercijalista_id,
$kupac_id, $sifra,  $napomena) {
$this->setrn($administracija_id,$komercijalista_id,
$kupac_id, $sifra,  $napomena);
}

public  function obrisirn($id) {
$this->deletern($id);
header("Location:index2.php");
}


public function updatern($id, $operater_id,$separacije_id,
$status_id, $sifra,  $naziv) {
$this->update($id, $operater_id,$separacije_id,
$status_id, $sifra,  $naziv);
header("Location:update.php?id=$id");
}

public function statuszavrsen($id, $status_id) {
$this->updatestatus($id, $status_id);
header("Location:update.php?id=$id");
}

public function showid($id) {
$rn=$this->getbyid($id);
$row = $rn->fetch_assoc();

}


}

?>
