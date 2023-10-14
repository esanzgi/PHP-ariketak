<?php
  function getEremua($aldea) {
    if ($aldea <= 0) {
      throw new Exception("Aldea negatiboa ezin da izan.");
    }

    $laukia = $aldea * $aldea;
    return $laukia;
  }

  $zenbakiak =  [2,4,6,8,-10];

  foreach ($zenbakiak as $zenbakia) {
    try {
        $laukia = getEremua($zenbakia);
        echo "Aldea: $zenbakia, Eremua: $laukia<br>";
    } catch (Exception $e) {
        echo "Aldea: $zenbakia --> Errorea: " . $e->getMessage() . "<br>";
    }
  }

?>