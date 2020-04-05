<?php

// Zaglavlje tabele
    echo "<font size='2'><table class='table table-striped table-bordered'>
    <tr><th>RN</th><th>Administracija</th><th>Komercijala</th><th>Kupac
    </th><th>Napomena</th><th>Datum</th><th>Šifra
    </th><th>Operater</th><th>Separacije</th><th>Status
    </th><th>Status/Datum</th><th>Naziv</th></tr>";

// filtrira rezultete pretrage na uslove postavljene u pretraga.php (POST name = save3)
// $rez_pretrage postavljen u rn_include2.php
for($a=0; $a<$GLOBALS['broj_rn']; $a++){

if ($_POST["kupac"]!='' && @$GLOBALS["rez_pretrage"]["$a"]['kupac']!=$_POST["kupac"])
{
    unset($GLOBALS["rez_pretrage"]["$a"]);
}
if ($_POST["administracija"]!='' && @$GLOBALS["rez_pretrage"]["$a"]["administracija"]!=$_POST["administracija"])
{
  unset($GLOBALS["rez_pretrage"][$a]);
}
if ($_POST["Komercijalista"]!='' && @$GLOBALS["rez_pretrage"]["$a"]['Komercijalista']!=$_POST["Komercijalista"])
{
  unset($GLOBALS["rez_pretrage"]["$a"]);
}
if ($_POST["Operater"]!='' && @$GLOBALS["rez_pretrage"]["$a"]['Operater']!=$_POST["Operater"])
{
  unset($GLOBALS["rez_pretrage"]["$a"]);
}
if ($_POST["separacije"]!='' && @$GLOBALS["rez_pretrage"]["$a"]['separacije']!=$_POST["separacije"])
{
  unset($GLOBALS["rez_pretrage"]["$a"]);
}
if ($_POST["status"]!='' && @$GLOBALS["rez_pretrage"]["$a"]['status']!=$_POST["status"])
{
  unset($GLOBALS["rez_pretrage"]["$a"]);
}

if (isset($_POST["save4"]) && @$GLOBALS["rez_pretrage"]["$a"]['status']!='')
{
  unset($GLOBALS["rez_pretrage"]["$a"]);
}

}

// Prikazuje reyultate pretrage nakon filtera
$broj_rezultata_pretrage=0;
for($a=0; $a<$GLOBALS['broj_rn']; $a++){
 if (@$GLOBALS["rez_pretrage"]["$a"]["id"] !=''){
   if(isset($GLOBALS["rez_pretrage"]["$a"]["id"])){
     $broj_rezultata_pretrage=$broj_rezultata_pretrage+1;
   }
         echo "<tr> <td>".@$GLOBALS["rez_pretrage"]["$a"]["id"]. "</td><td>"

         .@$GLOBALS["rez_pretrage"]["$a"]["administracija"]."</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["Komercijalista"]."</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["kupac"].         "</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["Napomena"].      "</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["datum"].         "</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["Sifra"].         "</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["Operater"] .     "</td><td>"
         .@$GLOBALS["rez_pretrage"]["$a"]["separacije"].    "</td>
        <td>" .@$GLOBALS["rez_pretrage"]["$a"]["status"].        "</td>
        <td>" .@$GLOBALS["rez_pretrage"]["$a"]["status_datum"].  "</td>
        <td>" .@$GLOBALS["rez_pretrage"]["$a"]["Naziv"].         "</td>
        <td>";

    /*    echo
        "<a href='delete.php?id=".@$GLOBALS["rez_pretrage"][$a][id]."' onclick='return FunctionDelete(".@$GLOBALS["rez_pretrage"][$a][id].")' type='button' class='btn btn-danger btn-sm'>Obriši</a>
         <a href='update.php?id=".@$GLOBALS["rez_pretrage"][$a][id]."' type='button' class='btn btn-primary btn-sm'>Izmeni</a>
        </td></tr>";*/

        if ($GLOBALS["rez_pretrage"]["$a"]["status"]==''){
        echo "<a href='delete.php?id=".@$GLOBALS["rez_pretrage"][$a][id]."' onclick='return FunctionDelete(".@$GLOBALS["rez_pretrage"][$a][id].")' type='button' class='btn btn-danger btn-sm'>Obriši</a>";
      }
        if ($GLOBALS["rez_pretrage"]["$a"]["status"]!='završen' && $GLOBALS["rez_pretrage"]["$a"]["status"]!='Obustavljen'){
        echo     "<a href='update.php?id=".@$GLOBALS["rez_pretrage"][$a][id]."' type='button' class='btn btn-primary btn-sm'>Izmeni</a>";
      }
      if ($GLOBALS["rez_pretrage"]["$a"]["status"]=='završen'){
      echo     "<button type='button' class='btn btn-success btn-sm'>završen</a>";
      }
        echo    "</td></tr>";



}

}
echo "Broj rezultata pretrage: ".$broj_rezultata_pretrage;
?>
