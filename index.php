<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatkul Umar</title>
</head>
<body>

    <?php
        session_start();
        if(isset($_SESSION['pesan'])) {
            echo $_SESSION['pesan'];
        }
        unset($_SESSION['pesan']);
    ?>

    <div class="container">
        <form action="aksi.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="text" name="password">
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>

    <a class="btn btn-danger" href="login.php">Login</a>
    
</body>
</html>