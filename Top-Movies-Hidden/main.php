<!DOCTYPE html>
<html>
<head>
    <title>Películas del Usuario</title>
    <style>
      .is-invalid {
        color: red;
      }
    </style>
</head>
<body>
    <?php
      if(isset($_POST['username'])){
        $username = $_POST['username'];

        echo '<br><br>';

        $jsonData = file_get_contents('datuak.json');
        $data = json_decode($jsonData, true);

        // Erabiltzaile logeatuaren film guztiak bistaratu
        if (isset($data[$username])) {
          echo "<h1>".$username. " -(r)en Filmak</h1>";
          echo "<table border='1'>";
          echo "<tr><th>ISAN</th><th>Izena</th><th>Urtea</th><th>Puntuazioa</th></tr>";
          foreach ($data[$username] as $film) {
              echo "<tr>";
              echo "<td>" . $film['isan'] . "</td>";
              echo "<td>" . $film['izena'] . "</td>";
              echo "<td>" . $film['urtea'] . "</td>";
              echo "<td>" . $film['puntuazioa'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
        }
      }
    ?>
    <h1>Film Formularioa</h1>
    <form action="main.php" method="POST">
        <input type="hidden" name="username" value="<?php echo $username; ?>">

        <label for="izena">Filmaren Izena:</label>
        <input type="text" id="izena" name="izena"><br><br>

        <label for="isan">ISAN Zenbakia:</label>
        <input type="text" id="isan" name="isan"><br><br>

        <label for="urtea">Urtea:</label>
        <input type="text" id="urtea" name="urtea"><br><br>

        <label for="puntuazioa">Puntuazioa:</label>
        <select id="puntuazioa" name="puntuazioa">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <button type="submit">Gorde</button>
    </form>

    <br><br>

    <?php

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $izena = $_POST['izena'];
        $isan = $_POST['isan'];
        $urtea = $_POST['urtea'];
        $puntuazioa = $_POST['puntuazioa'];

        if (!isset($data[$username])) {
          $data[$username] = []; 
        }
        
        $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
    
        file_put_contents('datuak.json', $newJsonData);
        
        $isanExists = false;
        foreach ($data[$username] as $film) {
            if ($film['isan'] === $isan) {
                $isanExists = true;
                break;
            }
        }

        if (!$isanExists) {
          // datu guztiak sartutak daudela egiaztatu
          if (!empty($izena) && !empty($urtea) && !empty($puntuazioa)) {
            // Gehitu erregistro berria erabiltzailearen zerrendara
            if(strlen($isan) === 8) {
              
              $newFilm = [
                'isan' => $isan,
                'izena' => $izena,
                'urtea' => $urtea,
                'puntuazioa' => $puntuazioa
              ];
              $data[$username][] = $newFilm;
            }else {
              echo '<p class="is-invalid">ISAN ZENBAKIAK 8 zenbaki behar ditu</p>';
            }
            
            // JSON datu berriekin eguneratu
            $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('datuak.json', $newJsonData);
          } else {
              echo '<p class="is-invalid">IZENA, URTEA, EDO PUNTUAZIOA GABE</p>';
          }
        } else {
            echo '<p class="is-invalid">ISAN DAGOEN JADA LISTAN</p>';
        }

        if(isset($izena) && empty($izena)) {
          echo '<p class="is-invalid">IZENA HUTSA</p>';
        }
        if(isset($isan) && empty($isan)) {
          echo '<p class="is-invalid">ISAN HUTSA</p>';
        }

        if (empty($isan) && !empty($izena)) {
          echo "<h2>'$izena' izeneko pelikulak:</h2>";
          echo "<ul>";
          foreach ($data as $film) {
            echo $izena.'<br>';
              if (stripos($film['izena'], $izena) !== false) {
                echo 'barruan';
                  echo "<li>'" . $film['izena'] . "' " . $film['urtea'] . " urtekoa - Puntuazioa: " . $film['puntuazioa'] . "</li>";
              }
          }
        
          echo "</ul>";
        }

      }

      
      
    ?>
</body>
</html>
