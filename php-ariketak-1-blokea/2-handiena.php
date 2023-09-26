<?php
  $zenb1 = random_int(1, 100);
  $zenb2 = random_int(1, 100);
  $zenb3 = random_int(1, 100);
  
  echo "Zenbakiak --> ".$zenb1.", ".$zenb2.", ".$zenb3." <br>";

  if($zenb1 > $zenb2 && $zenb1 > $zenb3) {
    echo "Handiena --> ".$zenb1;
  }elseif ($zenb1 < $zenb2 && $zenb2 > $zenb3) {
    echo "Handiena --> ".$zenb2;
  }elseif ($zenb3 > $zenb1 && $zenb2 < $zenb3){
    echo "Handiena --> ".$zenb3;
  }
?>