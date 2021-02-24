<?php
    session_start();
    include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="contrainers">
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
        <form action="registerpro.php" method="post" enctype="multipart/form-data">
            User name : <input type="text" name="user_name" id="user_name"> <br>
            User Phone : <input type="tel" name="user_phone" id="user_phone"> <br>
            User Password : <input type="password" name="user_pass_1" id="user_pass"> <br>
            User Comfirm Password : <input type="password" name="user_pass_2" id="user_pass"> <br>
            User Picture : <input type="file" name="user_pic" id="user_pic"> <br>
            <input type="submit" value="Register" name="reg_user">
        </form>
    </div>

    <p> <a href="login.php"> Login </a> </p>

</body>

</html>