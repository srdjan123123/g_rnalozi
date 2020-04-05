<?php

if (isset($_GET["id"])){
  echo "Radni nalog broj: ".$_GET["id"]."</br>";
} else {
  echo "Radni nalozi za ".date('m Y')."</br>";
  echo "Broj radnih naloga: ".$rn->num_rows."</br>";
}
if ($rn->num_rows > 0) {

    // output data of each row
    echo "</br><font size='2'><table class='table table-striped table-bordered'>
    <tr><th>RN</th><th>Administracija</th><th>Komercijala</th><th>Kupac
    </th><th>Napomena</th><th>Datum</th><th>Šifra
    </th><th>Operater</th><th>Separacije</th><th>Status
    </th><th>Status/Datum</th><th>Naziv</th></tr>";


    while($row = $rn->fetch_assoc()) {

         echo "<tr> <td>".$row["id"]. "</td><td>"
         .$row["administracija"]."</td><td>"
         .$row["Komercijalista"]."</td><td>"
         .$row["kupac"].         "</td><td>"
         .$row["Napomena"].      "</td><td>"
         .$row["datum"].         "</td><td>"
         .$row["Sifra"].         "</td><td>"
         .$row["Operater"] .     "</td><td>"
         .$row["separacije"].    "</td>
        <td>" .$row["status"].        "</td>
        <td>" .$row["status_datum"].  "</td>
        <td>" .$row["Naziv"].         "</td>
        <td>";



  if ($row["status"]==''){
  echo "<a href='delete.php?id=$row[id]' onclick='return FunctionDelete($row[id])' type='button' class='btn btn-danger btn-sm'>Obriši  </a>";
}
  if ($row["status"]!='završen' && $row["status"]!='Obustavljen' ){
  echo     "<a href='update.php?id=$row[id]'  type='button' class='btn btn-primary btn-sm'>Izmeni  </a>";
}
if ($row["status"]=='završen'){
echo     "<button type='button' class='btn btn-success btn-sm'>Završen</a>";
}
  echo    "</td></tr>";

    }

echo "</table></font>";
echo "</br>";

} else {
    echo "0 results";
}


?>
