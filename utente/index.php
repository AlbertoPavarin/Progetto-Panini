<?php
session_start();
include_once dirname(__FILE__) . '/functions/checkLogin.php';

$user = checkLogin();

echo "s";
?>