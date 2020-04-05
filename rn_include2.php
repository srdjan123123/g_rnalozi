<?php

global $broj_rn,$rez_pretrage;
if ($rn->num_rows > 0) {
  $broj_rn= $rn->num_rows;
while($row = $rn->fetch_assoc()) {
$rez_pretrage[] =$row;
}
}

?>
