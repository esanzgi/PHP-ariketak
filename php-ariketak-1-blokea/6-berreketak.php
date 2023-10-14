<?php
  $potentzia = 3;
  $kantitatea = 100;
  $i = 0;
  $respuesta = 0;
  while($respuesta<=$kantitatea){
    $respuesta = $potentzia ** $i;
    if($respuesta<=$kantitatea) {
      echo $respuesta." - ";
    }
    $i++;
  }
?>