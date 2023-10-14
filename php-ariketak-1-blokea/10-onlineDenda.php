<?php
  $erosketaMota = 'maskotak';
  $erosketa = random_int(1,250);
  $erosketa += random_int(0,10) / 15;
  $a = number_format($erosketa, 2);

  if($erosketa < 19) {
    if($erosketaMota === 'maskotak'){
      echo "<br>Ezin bidali";
    }
  }
  if(($erosketa >= 19 && $erosketa < 40) || $erosketaMota === 'jantziak'){
    echo "<br>Bidalketa gastuak 9€ dira";
  }
  if($erosketa > 80){
    echo "<br>Bidalketa doakoa da!";
  }

  if($erosketaMota == 'jantziak'){
    $a -= ($a * 0.21);  
  }
  if($erosketaMota == 'maskotak'){
    $a -= ($a * 0.1);  
  }
  echo "<br>Gastua: $a"; 
?>