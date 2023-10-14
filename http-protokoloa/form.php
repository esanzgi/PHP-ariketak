<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Izena</title>
</head>
<body>
  <form action="formIkusi.php" method="post">
    <label for="izena">Izena-Abizenak: </label>
    <input type="text" name="izena" placeholder="Izen abizenak...">
    <label for="adina">Adina: </label>
    <input type="number" name="adina" placeholder="Adina...">
    <button type="submit" name="bidali">Bidali</button>
  </form>

  <div id="error-message">
    <br>
    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === 'izena_bakarra') {
            echo 'Izena ezin da hutsik utzi.';
        } elseif ($error === 'adina_non_numeric') {
            echo 'Adina zenbaki bat izan behar da.';
        } elseif ($error === 'izena_non_alphanumeric') {
            echo 'Izena hizki alfanumerikoak edo hutsuneak izan behar ditu.';
        } elseif ($error === 'izena_ez_da_bidalia') {
            echo 'Izena ez da bidalia.';
        } elseif ($error === 'formulario_ez_da_bidalia') {
            echo 'Formularioa ez da bidalia.';
        } elseif ($error === 'adina_hutsa') {
          echo 'Adina ezin da hutsik utzi';
        }
    }
    ?>
</div>

</body>
</html>