<?php
session_start();
session_unset();
session_destroy();
header('Location:/Lab1/home.php?logout=success');
?>