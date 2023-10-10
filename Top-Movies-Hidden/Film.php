
<?php
  class Film {
    private $izena;
    private $isan;
    private $urtea;
    private $puntuazioa;

    public function __construct($izena, $isan, $urtea, $puntuazioa) {
      $this->izena = $izena;
      $this->isan = $isan;
      $this->urtea = $urtea;
      $this->puntuazioa = $puntuazioa;
    }

    public function printInfo() {
      echo "Izena: " . $this->izena."<br>";
      echo "ISAN Zenbakia: ".$this->isan."<br>";
      echo "Urtea: ".$this->urtea."<br>";
      echo "Puntuazioa: ".$this->puntuazioa."<br>";
      echo "-----------------------------<br>";
    }

  }


?>