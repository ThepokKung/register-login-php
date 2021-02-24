<?php 
session_start();
include('connect.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="loginpro.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="success">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        User name : <input type="text" name="user_name" id="user_name"> <br>
        User Password : <input type="password" name="user_pass" id="user_pass"> <br>

        <input type="submit" value="Sing up" name="login_user"> <br>
    </form>

    <p> <a href="register.php"> Register </a> </p>

</body>

</html>