<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Erabiltzailea" required>

        <br><br>
        <button type="submit">Login</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
            $username = $_POST['username'];

            // Cookie gehitu erabiltzailearen izenarekin
            setcookie('username', $username, time() + 3600); // Cookie 1h-rako
            header("Location: main.php");
        }
    ?>

</body>
</html>
