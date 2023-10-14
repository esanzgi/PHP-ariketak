<?php
  $matriz = [];
  $zenbakiak = [];
  $faktorialak = [];

  function getFaktoriala($zenb) {
    $sum=1;
    for($j=1; $j<=$zenb; $j++) {
      $sum *= $j;
    }
    return $sum;
  }
  
  for($i = 1; $i<=10; $i++) {
    $zenbakiak[$i-1] = $i;
    $faktorialak[$i-1] = getFaktoriala($i);
  }
  $matriz[] = $zenbakiak;
  $matriz[] = $faktorialak;

  for($z=0; $z<count($matriz); $z++){
    for($y=0; $y<count($matriz[$z]); $y++){
      echo $matriz[$z][$y]." - ";
    }
    echo "<br>";
  }
?>