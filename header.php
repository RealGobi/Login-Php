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
    #lite olika info beroende på om $_SESSION är fylld eller ej
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
            <span>';
            if(isset($_GET['error'])){
                if($_GET['error'] == 'emptyfeild'){
                    echo '<p style="color:red; font-size:.73rem; padding-top:0px;">Fyll i alla fält.</p>';
                }
                else if ($_GET['error'] == 'invalidEmail'){
                    echo '<p style="color:red; font-size:.73rem; padding-top:0px;">Ej gilltlig email.</p>';  
                }
                else if ($_GET['error'] == 'invalidEmailOrPassword'){
                    echo '<p style="color:red; font-size:.73rem; padding-top:0px;">Fel email eller lösenord.</p>';  
                }
            } 
           echo '<p style="font-size:.85rem; padding-top:0px;">Eller registrera dig <a href="signup.php">här.</a></p>
            </span>';
            }
            
            ?>

</header>

