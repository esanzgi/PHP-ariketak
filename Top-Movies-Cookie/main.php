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
      //TAULA SORTZEKO FUNTZIOA
      function sortuTaula($data, $username) {
        echo "<h1>".$username. " -(r)en Filmak</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ISAN</th><th>Izena</th><th>Urtea</th><th>Puntuazioa</th></tr>";
        foreach ($data as $film) {
            echo "<tr>";
            echo "<td>" . $film['isan'] . "</td>";
            echo "<td>" . $film['izena'] . "</td>";
            echo "<td>" . $film['urtea'] . "</td>";
            echo "<td>" . $film['puntuazioa'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
      }

      //Erabiltzailea cookian dagoen frogatu
      if(isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        $filmBerria = $_POST['filmBerria'];

        echo '<br><br>';

        $jsonData = file_get_contents('datuak.json');
        $data = json_decode($jsonData, true);

        // Erabiltzaile logeatuaren film guztiak bistaratu
        if (isset($data[$username]) && $filmBerria != 'true') {
          sortuTaula($data[$username], $username);
        }
      }
    ?>
    <h1>Film Formularioa</h1>
    <form action="main.php" method="POST">
        <input type="hidden" name="filmBerria" value="true">

        <label for="izena">Filmaren Izena:</label>
        <input type="text" id="izena" name="izena"><br><br>

        <label for="isan">ISAN Zenbakia:</label>
        <input type="text" id="isan" name="isan"><br><br>

        <label for="urtea">Urtea:</label>
        <input type="text" id="urtea" name="urtea"><br><br>

        <label for="puntuazioa">Puntuazioa:</label>
        <select id="puntuazioa" name="puntuazioa">
            <option value="0" selected>0</option>
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

        // Erabiltzailea ez bada existitzen array huts bat gehitu eta .json eguneratu
        if (!isset($data[$username])) {
          $data[$username] = []; 
          $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
          file_put_contents('datuak.json', $newJsonData);
        }
        
        //Ea isan kodea existitzen dela egiaztatu
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

              // Bestela errore mezua bistaratu
            }else {
              echo '<p class="is-invalid">ISAN ZENBAKIAK 8 zenbaki behar ditu</p>';
            }
            
            // JSON datu berriekin eguneratu
            $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('datuak.json', $newJsonData);

            // Bestela errore mezua bistaratu
          } else {
              echo '<p class="is-invalid">IZENA, URTEA, EDO PUNTUAZIOA GABE</p>';
          }
          // Bestela errore mezua bistaratu
        } else {
            echo '<p class="is-invalid">ISAN Zenbakia existitzen da dagoeneko</p>';
        }

        if(isset($izena) && empty($izena)) {
          echo '<p class="is-invalid">IZENA HUTSA</p>';
        }
        if(isset($isan) && empty($isan)) {
          echo '<p class="is-invalid">ISAN HUTSA</p>';
        }

        //Isan hutsa badago eta izena ez, izen hori daukaten filmak zerrendatuko ditu
        if (empty($isan) && !empty($izena)) {
          $izena = iconv('UTF-8', 'ASCII//TRANSLIT', $izena);
          $izena = strtolower($izena);

          echo "<h2>'$izena' izeneko pelikulak:</h2>";
          echo "<ul>";
          foreach ($data[$username] as $film) {
              $filmIzena = iconv('UTF-8', 'ASCII//TRANSLIT', $film['izena']);
              $filmIzena = strtolower($filmIzena);

              if (stripos($filmIzena, $izena) !== false) {
                  echo "<li>'" . $film['izena'] . "' " . $film['urtea'] . " urtekoa - Puntuazioa: " . $film['puntuazioa'] . "</li>";
              }
          }
          echo "</ul>";
        }

        //ISAN zenbakia jada zerrendan badago eta beste eremuak hutsik ez badaude. 
        if($isanExists && !empty($izena) && !empty($urtea) && !empty($puntuazioa)) {
          foreach ($data[$username] as $index => $film) {
            if ($film['isan'] === $isan) {
                // Aurkitutako pelikula eguneratu
                $data[$username][$index]['izena'] = $izena;
                $data[$username][$index]['urtea'] = $urtea;
                $data[$username][$index]['puntuazioa'] = $puntuazioa;
                $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
                file_put_contents('datuak.json', $newJsonData);
                break; 
            }
          }
        }

        if(!empty($isan) && empty($izena)) {
          foreach ($data[$username] as $index => $film) {
            if($film['isan'] === $isan) {
              //Pelicula ezabatu
              unset($data[$username][$index]);

              // Reindexar el array para eliminar el espacio vacío
              $data[$username] = array_values($data[$username]);

              // Datuak gorde json formatua mantenduz
              $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
              file_put_contents('datuak.json', $newJsonData);
              break;
            }
          }
        }
        
      }

      if (isset($data[$username]) && $filmBerria == 'true') {
        sortuTaula($data[$username], $username);
      }

    ?>
</body>
</html>
