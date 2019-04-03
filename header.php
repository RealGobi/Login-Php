<?php define('TITEL', 'Login Lab1'); 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="SCSS/style.css">
    <link rel="stylesheet" href="SCSS/main.css">
    <title><?php echo TITEL ?></title>
</head>
<header>
    <ul>
        <img src="img/logo.png" alt="logo">
        <li><a href="home.php">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    <?php
            if(isset($_SESSION['email'])){
                echo '<form action="logout.php" method="POST">
                      <button type="submit">Logga ut!</button>
                      </form>';
            }
            else {
                echo '<form action="login.php" method="POST">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Email...">
                <label>Lösenord:</label>
                <input type="password" name="password" minlength="5"  placeholder="Lösenord...">
                <button type="submit">Logga in!</button>
                </form>
            <span>
            <p>Eller registrera dig <a href="signup.php">här.</a></p>
            </span>';
            }
            ?>

</header>
