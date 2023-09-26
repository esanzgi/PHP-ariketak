<?php
  class Pertsona {
    protected $izena;
    protected $abizena;
    protected $nan;

    public function __construct($izena, $abizena, $nan) {
      $this->izena = $izena;
      $this->abizena = $abizena;
      $this->nan = $nan;
    } 

    public function getIzenOsoa() {
      return "Pertsona: ".$this->izena." ".$this->abizena;
    }
}

class User extends Pertsona {
    private $puntuak;

    public function __construct($izena, $abizena, $nan, $puntuak) {
      parent::__construct($izena, $abizena, $nan);
      $this->puntuak = $puntuak;
    }

    public function getPuntuak() {
      return $this->puntuak;
    }

    public function setPuntuak($puntuak) {
      $this->puntuak = $puntuak;
    }

    public function getIzenOsoa() {
      return "Erabiltzailea: ".$this->izena." ".$this->abizena;
    }

    public function mezua() {
      if($this->puntuak < 100) {
        echo "Ehun puntu baino gutxiago dituzu";
      } else {
        echo "Ehun puntu baino gehiago dituzu";
      }
    }
}

  $pertsona = new Pertsona("Eneko", "Sanz", "49577255Y");
  echo "izen osoa -> ".$pertsona->getIzenOsoa()."<br>";

  $user = new User("Hodei", "Sanz", "4993387Z", 90);
  echo "izen osoa -> ".$user->getIzenOsoa()."<br>";

?>