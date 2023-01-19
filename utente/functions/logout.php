<?php

function logout()
{
    session_start();
        unset($_SESSION['user_id']);

    header("Location: ../login.php");
}

logout();

?>