<?php
class Liczby
{
   public $liczba1;
   public $liczba2;
   #Poniżej celowo zostawiam bramkę, na wypadek, gdyby liczby 1 i 2 nie miały być KOLEJNYMI liczbami, a podowane miały być oddzielnie.
   public function setLiczby($liczba1, $liczba2)
   {
      $this->liczba1 = $liczba1;
      $this->liczba2 = $liczba2;
   }
                
   public function getLiczby()
   {
	  if ($this->liczba1%2==0) { #sprawdzenie, czy pierwsza liczba jest parzysta
	   $opispierwszej="( JEST PARZYSTA więc mnożymy razy trzy )";
	   $opisdrugiej="( KTÓRA JEST NIEPARZYSTA więc mnożymy razy dwa )";
	   $liczbaa = (3*$this->liczba1); #wyliczanie liczb wynikowych, które następnie porównamy
	   $liczbab = (2*$this->liczba2); #tu druga z pary	  
	  } else {
	   $opispierwszej="( JEST NIEPARZYSTA więc mnożymy razy dwa )";
	   $opisdrugiej="( KTÓRA JEST PARZYSTA więc mnożymy razy trzy )";
	   $liczbaa = (2*$this->liczba1); #wyliczanie liczb wynikowych, które następnie porównamy	  		  
	   $liczbab = (3*$this->liczba2); #tu też
	  }
		  
	  if ($liczbaa > $liczbab) {
       return '<b>'.$this->liczba1.'</b> '.$opispierwszej.' <i>= '.$liczbaa.'</i> <br><big>jest wieksza</big> od <br><b>'.$this->liczba2.' </b> '.$opisdrugiej. ' <i>= ' .$liczbab.'</i>';
	  } else if ($liczbaa == $liczbab) {
	   return '<b>'.$this->liczba1.'</b> '.$opispierwszej.' <i>= '.$liczbaa.'</i> <br><big>jest RÓWNA</big> <br><b>'.$this->liczba2.' </b> '.$opisdrugiej. ' <i>= ' .$liczbab.'</i>';
	  } else {
	   return '<b>'.$this->liczba1.'</b> '.$opispierwszej.' <i>= '.$liczbaa.'</i> <br><big>jest mniejsza</big> od <br><b>'.$this->liczba2.' </b> '.$opisdrugiej. ' <i>= ' .$liczbab.'</i>';
	  }
   }
}

?>
<HTML><HEAD><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="pl">
<META NAME ="Description" CONTENT="KOMPU.NET 2018">
<META NAME="Keywords" CONTENT="KOMPU.NET 2018">
<title>Michał Krüger 2018</title>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<style>
 * {font-family: 'Roboto Condensed', sans-serif; color: grey;}
</style>
 </head><body><table width=100% align=center><tr><td align=center>
<?php
$dana = $_POST['dana']; #przyjęcie danej z formularza ręcznego

if ($dana=="") {
 $podana = 0; #Jeśli nie podajemy liczby, skrypt przyjmuje 0 za pierwszą (niższą) liczbę pary
} else {
 if (is_numeric($dana)) {echo "PODANA WARTOŚĆ JEST LICZBĄ<br>";} else {echo "PODANA WARTOŚĆ <b>$dana</b> NIE JEST LICZBĄ<br>";} #Sprawdzanie, czy podana w formularzu wartość jest liczbą
 $dana = round($dana,0); #zaokrąglanie, jako pierwszy stopień walidacji do liczby naturalnej
 if ($dana < 0) {$dana=(0-$dana); echo "<br>LICZBY NATURALNE, to liczby całkowite dodatnie. Przyjęto wartość bezwzgędną podanej liczby<br>";} #przyjowanie wartości bezwzględnej dla podanych ewentualnie liczb ujemnych
 echo "DO OBLICZENIA PRZYJĘTO LICZBĘ <b>$dana</b><br><br>"; #wyjaśnienie co sie wydarzyło
 $podana = $dana;
}
$kolejna=($podana+1);
$para = new Liczby;
$para->setLiczby($podana, $kolejna);

echo 'Porównanie liczb po prostym przekształceniu arytmetycznym:<br> '.$para->getLiczby().'<br/>'; #wynik

echo "<form method=post action=1.index.php><input name=dana value=$podana> <input type=submit value=\"PODAJ INNĄ LICZBĘ\"></form>"; #formularz pozwalający na sprawdzenie poprawności skryptu poprzez wprowadzenie niższej wartości dla pary - ręcznie
echo "</td></tr></table>";
?>