<?php
  $dirua = random_int(5000, 50000);
  echo "Irabazitako dirua: ".$dirua."<br>";
  $komisioa = 0;
  if($dirua < 10000){
    $komisioa = $dirua * 0.05;
  }else if($dirua >= 10000 && $dirua < 20000){
    $komisioa = $dirua * 0.08;
  }else if($dirua >= 20000 && $dirua < 40000){
    $komisioa = $dirua * 0.1;
  }else if($dirua >= 40000){
    $komisioa = $dirua * 0.13;
  }
  echo "Komisioa --> ".$komisioa;
?>