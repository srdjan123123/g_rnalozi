<?php
// formiranje tabela
include_once 'dbclass.php';
Class Tabela extends Baza {

public function createoperater() {
  $sql ="CREATE TABLE if not exists operater (
  operater_id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  Operater VARCHAR(30)
  )";

$conn=$this->connect();


if ($conn->query($sql) === TRUE) {
    //echo "Table operater created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}


// dodajem prvu vrednost kao default za id=1
$sql2= "INSERT INTO operater (Operater)
VALUES ('')";
if ($conn->query($sql2) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();
}

public function createkomercijala() {
  $sql ="CREATE TABLE if not exists komercijala (
  komercijalista_id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  Komercijalista VARCHAR(30)
  )";

$conn=$this->connect();



if ($conn->query($sql) === TRUE) {
//    echo "Table komercijala created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// dodajem prvu vrednost kao default za id=1
$sql= "INSERT INTO komercijala (Komercijalista)
VALUES ('')";
if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

public function createseparacije() {
  $sql ="CREATE TABLE if not exists separacije (
  separacije_id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  separacije INT(3)
  )";

$conn=$this->connect();


if ($conn->query($sql) === TRUE) {
//    echo "Table separacije created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// dodajem prvu vrednost kao default za id=1
$sql= "INSERT INTO separacije (separacije)
VALUES ('')";
if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}

public function createadministracija() {
  $sql ="CREATE TABLE if not exists administracija (
  administracija_id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  administracija VARCHAR(30)
  )";

$conn=$this->connect();

if ($conn->query($sql) === TRUE) {
//    echo "Table administracija created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// dodajem prvu vrednost kao default za id=1
$sql= "INSERT INTO administracija (administracija)
VALUES ('')";
if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;

}
$conn->close();
}

public function createkupac() {
  $sql ="CREATE TABLE if not exists kupac (
  kupac_id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  kupac VARCHAR(30)
  )";

$conn=$this->connect();

if ($conn->query($sql) === TRUE) {
//    echo "Table kupac created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// dodajem prvu vrednost kao default za id=1
$sql= "INSERT INTO kupac (kupac)
VALUES ('')";
if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
public function createstatus() {
  $sql ="CREATE TABLE if not exists status (
  status_id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  status VARCHAR(30)
  )";

$conn=$this->connect();


if ($conn->query($sql) === TRUE) {
//    echo "Table status created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// dodajem prvu vrednost kao default za id=1
// drugi unos  za status je "završen" - blokirano da se dodaje ta vrednost u "Podaci"
$sql= "INSERT INTO status (status)
VALUES ('');";
$sql.= "INSERT INTO status (status)
VALUES ('završen')";
if ($conn->multi_query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
public function createnalog() {
  $sql ="CREATE TABLE if not exists nalog (
  id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  administracija_id INT(6) UNSIGNED DEFAULT '1',
  komercijalista_id INT(6) UNSIGNED DEFAULT '1' ,
  operater_id INT(6) UNSIGNED DEFAULT '1',
separacije_id INT(6) UNSIGNED DEFAULT '1',

kupac_id INT(6) UNSIGNED DEFAULT '1',
status_id INT(6) UNSIGNED DEFAULT '1',
  Sifra VARCHAR(30) DEFAULT '',
  Naziv VARCHAR(100) DEFAULT '',
  Napomena VARCHAR(250) DEFAULT '',
  datum DATE DEFAULT CURRENT_DATE,
  status_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY(komercijalista_id) REFERENCES komercijala(komercijalista_id),
FOREIGN KEY(operater_id) REFERENCES operater(operater_id),
FOREIGN KEY(separacije_id) REFERENCES separacije(separacije_id),
FOREIGN KEY(administracija_id) REFERENCES administracija(administracija_id),
FOREIGN KEY(kupac_id) REFERENCES kupac(kupac_id),
FOREIGN KEY(status_id) REFERENCES status(status_id)


  )";
$conn=$this->connect();

if ($conn->query($sql) === TRUE) {
//    echo "Table nalog created successfully</br>";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
}


}


$tabelaoperater=new Tabela();
$tabelaoperater-> createoperater();
$tabelakomercijala=new Tabela();
$tabelakomercijala-> createkomercijala();
$tabelaseparacije=new Tabela();
$tabelaseparacije-> createseparacije();
$tabeladministracija=new Tabela();
$tabeladministracija-> createadministracija();
$tabelakupac=new Tabela();
$tabelakupac-> createkupac();
$tabelastatus=new Tabela();
$tabelastatus-> createstatus();
$tabelanalog=new Tabela();
$tabelanalog-> createnalog();
?>
