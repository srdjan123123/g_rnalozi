<?php

class Baza{
  private $servername;
  private  $username;
  private  $password;
  private  $dbname;


public function __construct() {

$this->servername = "localhost";
$this->username = "root";
$this->password = "";
$this->dbname = "gps";
}

protected function connect(){
// Create connection
$conn = new mysqli($this->servername, $this->username,$this->password, $this->dbname );
// Check connection
return $conn;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

}
}
