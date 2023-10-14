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
        session_start();

        if(isset($_POST['username'])){
            $_SESSION['username'] = $_POST['username'];
            header("Location: main.php");
        }
    ?>

</body>
</html>
