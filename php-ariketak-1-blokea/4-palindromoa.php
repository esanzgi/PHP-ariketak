<?php
  $hitza = 'Zaaaz';
  $hitza = strtolower($hitza);
  $i=0;
  $x=strlen($hitza)-1;
  $isPalindromo = true;
  while($i <= $x){
    if($hitza[$i] !== $hitza[$x]){
      $isPalindromo = false;
      break;
    }
    $i++;
    $x--;
  }

  if($isPalindromo){
    echo $hitza." Palindromoa da";
  }else{
    echo $hitza." ez da palindromoa";
  }
?>