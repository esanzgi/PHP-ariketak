

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  function taulaSortu($row, $col){
    $taula = '<table border="1">';

    for($i=0; $i<$row; $i++) {
      $taula .= "<tr>";
      for($j=0; $j<$col; $j++) {
        $taula .= '<td width="100px" height="100px" border="1"></td>';
      }
      $taula .= '</tr>';
    }

    $taula .= "</table>";
    
    echo $taula;
  }

  taulaSortu(3, 6);

?>
</body>
</html>