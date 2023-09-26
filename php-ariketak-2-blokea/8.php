<?php
  function existeFile($file) {
    if(file_exists($file)) {
      echo 'Existitzen da';
    }else {
      throw new Exception('El archivo no existe');
    }
  }

  existeFile('81.php');
?>