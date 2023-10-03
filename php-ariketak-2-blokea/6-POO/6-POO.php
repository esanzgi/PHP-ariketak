<?php
  class UrtekoJaiotegunak {
    private $jaiotegunak = [];

    public function gehituJaioteguna($hilabetea, $izena) {
        if (!isset($this->jaiotegunak[$hilabetea])) {
            $this->jaiotegunak[$hilabetea] = [];
        }
        $this->jaiotegunak[$hilabetea][] = $izena;
    }

    public function erakutsiIzenak() {
        foreach ($this->jaiotegunak as $hilabetea => $izenak) {
            echo $hilabetea . ":\n";
            foreach ($izenak as $izena) {
              echo ucfirst($izena) . "\n";            
            }
            echo '<br>';
        }
    }

    public function erregistratutakoPertsonenKopurua($hilabetea) {
        if (isset($this->jaiotegunak[$hilabetea])) {
            return count($this->jaiotegunak[$hilabetea]);
        } else {
            return 0; 
        }
    }
}

$jaiotegunak = new UrtekoJaiotegunak();

$jaiotegunak->gehituJaioteguna("Urtarrila", "Mikel");
$jaiotegunak->gehituJaioteguna("Urtarrila", "Ainara");
$jaiotegunak->gehituJaioteguna("Urtarrila", "Xabi");
$jaiotegunak->gehituJaioteguna("Otsaila", "Irati");
$jaiotegunak->gehituJaioteguna("Otsaila", "Ibai");
$jaiotegunak->gehituJaioteguna("Martxoa", "Haiza");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hilabetea = $_POST["hilabetea"];
    $izena = $_POST["izena"];

    $jaiotegunak->gehituJaioteguna($hilabetea, $izena);
}

$jaiotegunak->erakutsiIzenak();

$hilabetea = "Urtarrila";
$kopiak = $jaiotegunak->erregistratutakoPertsonenKopurua($hilabetea);
echo "Erregistratuta dauden pertsonen kopurua " . $hilabetea . " hilabetean: " . $kopiak;


?>