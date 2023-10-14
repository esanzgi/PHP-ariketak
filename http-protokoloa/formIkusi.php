<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Ikusi</title>
</head>
<body>
  <h1>Formularioaren Emaitza:</h1>

  <?php
    if (isset($_POST['bidali'])) {
        if (isset($_POST['izena']) && !empty($_POST['izena'])) {
            if (preg_match('/^[a-zA-Z\s]+$/', $_POST['izena'])) {
                echo 'Izena --> ' . $_POST['izena'];
            } else {
                header('Location: form.php?error=izena_non_alphanumeric');
            }
            if (isset($_POST['adina']) && !empty($_POST['adina'])) {
                if (is_numeric($_POST['adina'])) {
                    echo '<br>Adina --> ' . $_POST['adina'];
                } else {
                    header('Location: form.php?error=adina_non_numeric');
                }
            }else{
              header('Location: form.php?error=adina_hutsa');
            }
        } else {
            header('Location: form.php?error=izena_bakarra');
        }
    } else {
        header('Location: form.php?error=formulario_ez_da_bidalia');
    }
  ?>

</body>
</html>