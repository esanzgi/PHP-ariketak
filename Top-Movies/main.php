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
        echo "<h1>".$_POST['username']. " -(r)en Filmak</h1>";
        $username = $_POST['username'];
      }
    ?>
    <p><?php $izzzena ?></p>
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

      $izena = $_POST['izena'];
      $isan = $_POST['isan'];
      $urtea = $_POST['urtea'];
      $puntuazioa = $_POST['puntuazioa'];

      if(isset($izena) && empty($izena)) {
        echo '<p class="is-invalid">IZENA HUTSA</p>';
      }
    ?>
</body>
</html>
