<?php
  include 'Korrikalari.php';
  include 'Txapelketa.php';

  $korrikalari = new Korrikalari("Eneko","K1");

  $txapelketa = new Txapelketa();

  $txapelketa->korrikalariaGehitu($korrikalari);

  var_dump($txapelketa->getKorrikalariak());
  
  echo '<br>';

  $txapelketa->gehituLasterketaKorrikalariari("K1", 140);

  var_dump($txapelketa->getKorrikalariak());

  echo '<br>';

  var_dump($korrikalari->getDenborak());


?>