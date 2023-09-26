<?php
  $zenb = 13;
  echo $zenb;
  while($zenb!==1) {
    if($zenb % 2 === 0) {
      $zenb /= 2;
    }else{
      $zenb = ($zenb * 3) +1;
    }
    echo ",".$zenb;
  }
?>