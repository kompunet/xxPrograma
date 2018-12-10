<?php
#łączenie do bazy - powinno być w oddzielnym skrypcie inc, ale na potrzeby zadania zostawiam tutaj

$con = @mysqli_connect('23206.m.tld.pl', 'admin23206_kompunet', '8Sz9qv*M40', 'baza23206_kompunet');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

?>
<html><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="pl">
<META NAME ="Description" CONTENT="KOMPU.NET 2018">
<META NAME="Keywords" CONTENT="KOMPU.NET 2018">
	<title>Proste Menu Rekurencyjne</title>
</head>
<body>
<div id="menu">

<?php
$kategoria=""; #zerowanie zmiennych
$podkategoria="";
$produkt="";
$lp=(0); #zerowanie licznika
$sql = 'select id,kategoria,podkategoria,produkt from menu order by kategoria asc,podkategoria asc,id asc'; #zapytanie główne
$query 	= mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query)) #pętla
{
 if ($row[1]!="$kategoria") {echo "<ul><li><a href=\"#\">$row[1]</a>\r\n<ul>\r\n";} #warunki wyswietlania poszczególnych elementów
 if ($row[2]!="$podkategoria") {
	 if ($row[1]=="$kategoria") {echo "\r\n</ul>\r\n";}
	 $lp++;
	 if ($lp!="1") {
	  echo "</li>";
	 }
	 echo "<li><a href=\"#\">$row[2]</a>\r\n<ul>\r\n";}
 echo "<li><a href=\"#\">$row[3]</a></li>\r\n";

 $kategoria="$row[1]";
 $podkategoria="$row[2]"; 
 $produkt="$row[3]";
}
mysqli_close ($con);
echo "</ul></li></ul></li></ul></div>"; #zamknięcie znaczników i diva
?>
<!-- Poniżej arkusz styli dla menu rozwijanego -->

<style type="text/css">
* {font-family: verdana;}
ul {
     list-style: none;
     float: left;
}

ul > li {
     margin: 0;
     padding: 0;
     float: left; 
     position: relative;
     height: 30px;
}

ul > li > a {
     padding: 10px; 
     color: #444;
     text-decoration: none;
}

ul > li > a:hover, 
ul > li:hover > a {
     color: #de5f44;
     text-decoration: underline;
}

ul > li ul {
     padding: 0;
     position: absolute; 
     display: none; 
     left: 0px; 
     top: 30px; 
     width: 200px; 
     text-align: left;
     background-color: #fcfcfc;
     border: 1px solid #ccc;
}

ul li:hover > ul {
     display: block;
}

ul > li ul ul {
     left: 200px; 
     top: -1px;
}

ul > li ul li {
     margin: 0; 
     padding: 0;
     position: relative; 
     float: none; 
     height: auto;
}

ul > li ul li a {
     padding: 10px 20px; 
     color: #505050; 
     text-decoration: none;
     display: block;
}

ul > li ul li a:hover,
ul > li ul li:hover > a {
     text-decoration: none;
     color: #fff;
     background-color: red;
}
</style>
</head></html>