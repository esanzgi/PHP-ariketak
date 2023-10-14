<?php
  $str = 'apple pear lemon watermelon melon';

  $hitzZerrenda = explode(" ", $str); 

  $arrayAsoziatiboa = [];

  foreach($hitzZerrenda as $hitza) {
    $arrayAsoziatiboa[$hitza] = strlen($hitza);
  }

  foreach($arrayAsoziatiboa as $hitza => $indizea) {
    echo $hitza.' - '.$indizea.'<br>';
  }
?>