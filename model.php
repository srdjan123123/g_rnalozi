<?php
include_once 'dbclass.php';

class ModelClass extends Baza {

protected function mesec() {
// glavna strana prikazuje unose samo za ovaj mesec
  $sql = "SELECT nalog.id,komercijala.Komercijalista, operater.Operater,
  nalog.Naziv, administracija.administracija, separacije.separacije,
  kupac.kupac, status.status, Sifra, Naziv, Napomena, datum, status_datum
  FROM nalog
  INNER JOIN komercijala on nalog.komercijalista_id=komercijala.komercijalista_id
  INNER JOIN operater on nalog.operater_id=operater.operater_id
  INNER JOIN administracija on nalog.administracija_id=administracija.administracija_id
  INNER JOIN separacije on nalog.separacije_id=separacije.separacije_id
  INNER JOIN kupac on nalog.kupac_id=kupac.kupac_id
  INNER JOIN status on nalog.status_id=status.status_id WHERE MONTH(datum) = MONTH(CURRENT_DATE())
AND YEAR(datum) = YEAR(CURRENT_DATE()) ORDER BY id desc ";

  $conn=$this->connect();
  $rn = $conn->query($sql);
  return $rn;

  }


protected function setk($Komercijalista) {
$sql = "INSERT INTO komercijala (Komercijalista)
VALUES (?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("s", $Komercijalista);
$stmt->execute();
$stmt->close();
}

protected function seto($Operater) {
$sql = "INSERT INTO operater (Operater)
VALUES (?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("s", $Operater);
$stmt->execute();
$stmt->close();
}

protected function setsep($Separacije) {
$sql = "INSERT INTO separacije (Separacije)
VALUES (?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("i", $Separacije);
$stmt->execute();
$stmt->close();
}


protected function seta($Administracija) {
$sql = "INSERT INTO administracija (Administracija)
VALUES (?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("s", $Administracija);
$stmt->execute();
$stmt->close();
}

protected function setku($Kupac) {
$sql = "INSERT INTO kupac (Kupac)
VALUES (?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("s", $Kupac);
$stmt->execute();
$stmt->close();
}

protected function sets($Status) {
$sql = "INSERT INTO status (Status)
VALUES (?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("s", $Status);
$stmt->execute();
$stmt->close();
}


protected function getk() {
$sql = "SELECT * FROM komercijala";
$conn=$this->connect();
$komercijalisti = $conn->query($sql);
return $komercijalisti;
}

protected function geto() {
$sql = "SELECT * FROM operater";
$conn=$this->connect();
$operateri = $conn->query($sql);
return $operateri;
}

protected function getsep() {
$sql = "SELECT * FROM separacije";
$conn=$this->connect();
$separacije = $conn->query($sql);
return $separacije;
}

protected function geta() {
$sql = "SELECT * FROM administracija";
$conn=$this->connect();
$administracija = $conn->query($sql);
return $administracija;
}

protected function getku() {
$sql = "SELECT * FROM kupac";
$conn=$this->connect();
$kupac = $conn->query($sql);
return $kupac;
}

protected function gets() {
$sql = "SELECT * FROM status";
$conn=$this->connect();
$status = $conn->query($sql);
return $status;
}

// return id statusa "završen"
protected function getstatusid($id) {
$sql = "SELECT status_id FROM status where status='završen'";
$conn=$this->connect();
$status_id = $conn->query($sql);
return $status_id;
}

protected function setrn($administracija_id,$komercijalista_id,
$kupac_id,$sifra,$napomena) {
$sql = "INSERT INTO nalog (administracija_id,komercijalista_id,
kupac_id,Sifra,Napomena)
VALUES (?,?,?,?,?)";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param("iiiss",$administracija_id,$komercijalista_id,
$kupac_id,$sifra,$napomena);
$stmt->execute();
$stmt->close();
}


protected function getrn() {


$sql = "SELECT nalog.id,komercijala.Komercijalista, operater.Operater,
nalog.Naziv, administracija.administracija, separacije.separacije,
kupac.kupac, status.status, Sifra, Naziv, Napomena, datum, status_datum
FROM nalog
INNER JOIN komercijala on nalog.komercijalista_id=komercijala.komercijalista_id
INNER JOIN operater on nalog.operater_id=operater.operater_id
INNER JOIN administracija on nalog.administracija_id=administracija.administracija_id
INNER JOIN separacije on nalog.separacije_id=separacije.separacije_id
INNER JOIN kupac on nalog.kupac_id=kupac.kupac_id
INNER JOIN status on nalog.status_id=status.status_id ORDER BY id desc";

$conn=$this->connect();
$rn = $conn->query($sql);
return $rn;
}


protected function deletern($id){
$sql= "DELETE from nalog WHERE id=$id";
$conn=$this->connect();
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

}

protected function getbyid($id) {



$sql = "SELECT nalog.id,komercijala.Komercijalista, operater.Operater,
nalog.Naziv, administracija.administracija, separacije.separacije,
kupac.kupac, status.status, Sifra, Naziv, Napomena, datum, status_datum
FROM nalog
INNER JOIN komercijala on nalog.komercijalista_id=komercijala.komercijalista_id
INNER JOIN operater on nalog.operater_id=operater.operater_id
INNER JOIN administracija on nalog.administracija_id=administracija.administracija_id
INNER JOIN separacije on nalog.separacije_id=separacije.separacije_id
INNER JOIN kupac on nalog.kupac_id=kupac.kupac_id
INNER JOIN status on nalog.status_id=status.status_id WHERE id=$id";

$conn=$this->connect();
$rn = $conn->query($sql);
return $rn;
}

protected function update($id, $operater_id,$separacije_id,
$status_id, $sifra,  $naziv) {

if ($operater_id !=1) {
$sql ="UPDATE nalog SET
operater_id=$operater_id
WHERE id=$id";
$conn=$this->connect();
$conn->query($sql);
}

if ($separacije_id !=1) {
$sql ="UPDATE nalog SET
separacije_id=$separacije_id
WHERE id=$id";
$conn=$this->connect();
$conn->query($sql);
}

if ($status_id !=1) {
$sql ="UPDATE nalog SET
status_id=$status_id
WHERE id=$id";
$conn=$this->connect();
$conn->query($sql);
// Update 'status_datum' - datum se menja samo kada se menja status radnog naloga
$sql ="UPDATE nalog SET
status_datum=CURRENT_TIMESTAMP
WHERE id=$id";
$conn=$this->connect();
$conn->query($sql);
}

if ($sifra !='') {
$sql ="UPDATE nalog SET
Sifra='$sifra'
WHERE id=$id";
$conn=$this->connect();
$conn->query($sql);
}

if ($naziv !='') {
$sql ="UPDATE nalog SET
Naziv='$naziv'
WHERE id=$id";
$conn=$this->connect();
$conn->query($sql);
}

}



protected function updatestatus($id, $status_id) {
  $sql ="UPDATE nalog SET
  status_id=$status_id
  WHERE id=$id";
  $conn=$this->connect();
  $conn->query($sql);
  // Update 'status_datum' - datum se menja samo kada se menja status radnog naloga
  $sql ="UPDATE nalog SET
  status_datum=CURRENT_TIMESTAMP
  WHERE id=$id";
  $conn=$this->connect();
  $conn->query($sql);
}



protected function getdate12($datum1, $datum2) {
  $sql = "SELECT nalog.id,komercijala.Komercijalista, operater.Operater,
  nalog.Naziv, administracija.administracija, separacije.separacije,
  kupac.kupac, status.status, Sifra, Naziv, Napomena, datum, status_datum
  FROM nalog
  INNER JOIN komercijala on nalog.komercijalista_id=komercijala.komercijalista_id
  INNER JOIN operater on nalog.operater_id=operater.operater_id
  INNER JOIN administracija on nalog.administracija_id=administracija.administracija_id
  INNER JOIN separacije on nalog.separacije_id=separacije.separacije_id
  INNER JOIN kupac on nalog.kupac_id=kupac.kupac_id
  INNER JOIN status on nalog.status_id=status.status_id WHERE DATE(datum) BETWEEN ? AND ? ORDER BY id desc";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param('ss',$datum1, $datum2);
$stmt->execute();
$rn = $stmt->get_result();
return $rn;
$stmt->close();
}

// Izveštaj
protected function datum_kupac($datum1, $datum2) {
  $sql = "SELECT nalog.id,komercijala.Komercijalista, operater.Operater,
  nalog.Naziv, administracija.administracija, separacije.separacije,
  kupac.kupac, status.status, Sifra, Naziv, Napomena, datum, status_datum
  FROM nalog
  INNER JOIN komercijala on nalog.komercijalista_id=komercijala.komercijalista_id
  INNER JOIN operater on nalog.operater_id=operater.operater_id
  INNER JOIN administracija on nalog.administracija_id=administracija.administracija_id
  INNER JOIN separacije on nalog.separacije_id=separacije.separacije_id
  INNER JOIN kupac on nalog.kupac_id=kupac.kupac_id
  INNER JOIN status on nalog.status_id=status.status_id WHERE DATE(datum) BETWEEN ? AND ? && status='završen' ORDER BY kupac asc";
$conn=$this->connect();
$stmt =$conn->prepare($sql);
$stmt->bind_param('ss',$datum1, $datum2);
$stmt->execute();
$rn = $stmt->get_result();
return $rn;
$stmt->close();
}

}


?>
