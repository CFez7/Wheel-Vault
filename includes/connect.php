<?php
/* database connection details. Allows connection */
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "Fezza0707");
    define("DB_NAME", "wheel_trader");

    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno()) {
        die("Database connection failed: " . 
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
        );
    }
?>