<?php
  $oinarria = 5;

  for ($i = 1; $i <= $oinarria; $i++) {
    for ($j = 1; $j <= ($oinarria - $i); $j++) {
        echo "&nbsp;";
    }

    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }

    echo "<br>";
}
?>