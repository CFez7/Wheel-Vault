<?php
    // destroys current session information logging the user out.
    session_start ();
    session_destroy ();
    header("Location: ../index.php");
?>