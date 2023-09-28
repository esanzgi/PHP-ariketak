<?php
  class Korrikalari {
    private $izena;
    private $kodea;
    private $denborak;

    public function __construct($izena, $kodea) {
      $this->izena = $izena;
      $this->kodea = $kodea;
      $this->denborak = Array();
    }

    public function lasterketaGehitu($denbora) {
      if($denbora < 5) {
        throw new Exception('Errorea --> Denbora 5s baino gutxiagokoa da');
      }elseif(count($this->denborak) >= 5) {
        throw new Exception('Errorea --> Dagoeneko 5 lasterketa gehitu dira');
      }
      $this->denborak[] = $denbora;
    }

    public function getKodea() {
      return $this->kodea;
    }

    function getDenborak() {
      return $this->denborak;
    }
  }

?>