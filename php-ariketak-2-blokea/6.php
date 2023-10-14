<?php
  $jaioPertsonak = array(
      "urtarrila" => array("Mikel", "Ainara", "Xabi"),
      "otsaila" => array("Irati", "Ibai"),
      "martxoa" => array("Haiza")
  );

  function gehituIzena($hilabetea, $izena, &$jaioPertsonak) {
      if (array_key_exists($hilabetea, $jaioPertsonak)) {
          $jaioPertsonak[$hilabetea][] = $izena;
      } else {
          $jaioPertsonak[$hilabetea] = array($izena);
      }
  }

  gehituIzena("urtarrila", "Ander", $jaioPertsonak);
  gehituIzena("azaroa", "Eneko", $jaioPertsonak);

  foreach ($jaioPertsonak as $hilabetea => $pertsonak) {
      echo "<strong>$hilabetea:</strong> ";
      echo implode(", ", $pertsonak) . "<br>";
  }
?>
