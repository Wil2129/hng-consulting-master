<?php
    include('common/functions.php');
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('location:index_fr.php');
?>