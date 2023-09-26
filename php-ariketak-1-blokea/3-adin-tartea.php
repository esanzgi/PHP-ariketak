<?php
  $zenb = random_int(0, 100);

  echo "zenbakia ".$zenb." da eta adin tarte honetan dago --> ";

  $hamartar = intval($zenb/10);

  echo ($hamartar*10)." - ".($hamartar*10)+10;
?>