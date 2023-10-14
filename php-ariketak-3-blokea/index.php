<?php
  include 'Korrikalari.php';
  include 'Txapelketa.php';

  
  // Korrikalarien instantziak sortu
  $korrikalari1 = new Korrikalari('Korrikalari 1', 'K1');
  $korrikalari2 = new Korrikalari('Korrikalari 2e', 'K2');
  $korrikalari3 = new Korrikalari('Korrikalari 3e', 'K3');

  // Lasterketak gehitu
  $korrikalari1->lasterketaGehitu(16);
  $korrikalari2->lasterketaGehitu(8);
  $korrikalari3->lasterketaGehitu(12);

  // Txapelketa instantzia sortu
  $txapelketa = new Txapelketa();

  // Korrikalariak txapelketara gehitu
  $txapelketa->korrikalariaGehitu($korrikalari1);
  $txapelketa->korrikalariaGehitu($korrikalari2);
  $txapelketa->korrikalariaGehitu($korrikalari3);

  $txapelketa->gehituLasterketaKorrikalariari("K1", 16);

  //Batazbesteko denbora
  $totalDenbora = [];
  $denborakByKodea = [];
  
  foreach ($txapelketa->getKorrikalariak() as $k) {
    $denborakByKodea[$k->getKodea()] = $k->getDenborak(); 
    foreach ($k->getDenborak() as $d) {
      $totalDenbora[] = $d;
    }
  } 

  $denboraAzkarrena = PHP_INT_MAX; 
  $korrikalariBizkorrena = '';
  $hamabostBainoGehiago = [];

  foreach ($denborakByKodea as $kodea => $d) {
    $kont = 0;
    foreach($d as $denb){
      if($denb < $denboraAzkarrena) {
        $denboraAzkarrena = $denb;
        $korrikalariBizkorrena = $txapelketa->getKorrikalariak()[$kodea]->getIzena();
      }
      if($denb > 15) {
        $kont++;
      }
    }
    if($kont >= 2) {
      $hamabostBainoGehiago[] = $txapelketa->getKorrikalariak()[$kodea]->getIzena();
    }
  }

$korrikalariakErekinAmaitzen = [];

foreach ($txapelketa->getKorrikalariak() as $korrikalari) {
    $izena = $korrikalari->getIzena();
    if (substr($izena, -1) === 'e') {
        $korrikalariakErekinAmaitzen[] = $izena;
    }
}

  if (count($totalDenbora) > 0) {
    $batezBestekoDenbora = array_sum($totalDenbora) / count($totalDenbora);
  } else {
    $batezBestekoDenbora = 0;
  }

  if ($denboraAzkarrena !== PHP_INT_MAX) {
    echo 'Batazbesteko denbora --> '.$batezBestekoDenbora;
    echo '<br>Korrikalari azkarrena '.$korrikalariBizkorrena.' izan da '.$denboraAzkarrena.' segundurekin' ;
  }
  echo '<br>15 segundu baino gehiago iraun dituzten korrikalariak: ';
  var_dump($hamabostBainoGehiago);

  echo '<br>';
  var_dump($korrikalariakErekinAmaitzen);

?>