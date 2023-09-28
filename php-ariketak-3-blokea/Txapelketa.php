<?php
  include_once 'Korrikalari.php';

  class Txapelketa {

    private array $korrikalariak;

    public function __construct(){
      $this->korrikalariak = Array();
    }

    public function korrikalariaGehitu(Korrikalari $korrikalaria){
      $kodea = $korrikalaria->getKodea();
      $this->korrikalariak[$kodea] = $korrikalaria;
    }

    public function gehituLasterketaKorrikalariari($kodea, $denbora) {
      // if(isset($this->korrikalariak[$kodea])) {
      //   $korrikalari = $this->korrikalariak[$kodea];
      //   $korrikalari->lasterketaGehitu($denbora);
      // }
      
      foreach($this->korrikalariak as $korrikalari_kode => $korrikalaria){
        if($korrikalari_kode === $kodea){
          $korrikalaria->lasterketaGehitu($denbora);
          break;
        }
      }
    }

    function getKorrikalariak(){
      return $this->korrikalariak;
    }
  }
  

?>