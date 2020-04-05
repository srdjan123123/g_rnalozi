<?php

// include za izvestaj
echo "Broj završenih radnih naloga: ".$rn->num_rows;

if ($rn->num_rows > 0) {

    echo "<font size='4'><table class='table table-striped table-bordered'>
    <tr><th>RN</th><th>Datum</th><th>Kupac</th><th>Naziv</th><th>Broj Boja
    </th><th>Status</th><th>Završeno</th></tr>";

    while($row = $rn->fetch_assoc()) {
$datum1=date_create($row["datum"]);
$datum1=date_format($datum1,"d-M-Y");
$datum2=date_create($row["status_datum"]);
$datum2=date_format($datum2,"d-M-Y");
         echo "<tr> <td>".$row["id"]. "</td><td>"
         .$datum1."</td><td>"
         .$row["kupac"]."</td><td>"
         .$row["Naziv"]."</td><td>"
         .$row["separacije"].         "</td><td>"
         .$row["status"].      "</td><td>"
         .$datum2.         "</td><tr>"
         ;

    }

echo "</table></font>";

}
?>
