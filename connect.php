<?php
    $conn = mysqli_connect('localhost', 'root', 'mysql', 'socialnetwork');

    if (!$conn) {
        die("connect error" . mysqli_connect_error());
    }else{
        //echo "Connect complete";
    }
    
