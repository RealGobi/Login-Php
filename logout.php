<?php
session_start();
session_destroy();
header('Location:/Lab1/home.php?logout=success');
?>