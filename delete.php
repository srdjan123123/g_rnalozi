<?php
include 'controller.php';
if (isset($_GET['id'])) {
$obrisi=new Controller;
$obrisi->obrisirn($_GET['id']);
}

?>
