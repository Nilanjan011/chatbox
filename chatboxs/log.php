<?php
session_start();
if (isset($_REQUEST["out"])) {
    session_destroy();
    // unset($_SESSION['name']);
    header("location: index.php");
}
