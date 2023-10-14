<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    function getAusazkoZenbakiak() {
      $array = [];
      for($i=0; $i<20; $i++) {
        $array[$i] = random_int(1, 500);
      }
      return $array;
    }

    $zenbakiak = getAusazkoZenbakiak();
    $min = $zenbakiak[0];
    $max = $zenbakiak[0];
    $batura = $zenbakiak[0];

    for($j=1; $j<count($zenbakiak); $j++){
      $batura += $zenbakiak[$j];
      if($zenbakiak[$j] < $min) {
        $min = $zenbakiak[$j];
      }else if($zenbakiak[$j] > $max){
        $max = $zenbakiak[$j];
      }
    }
  ?>
</body>
</html>