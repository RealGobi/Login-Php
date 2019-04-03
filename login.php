<?php
    try {
        $emailInput = $_POST['email'];
        $passwordInput = $_POST['password'];

        if (empty($emailInput) || empty($passwordInput)) {
            header('Location:/Lab1/home.php?error=emptyfeild=mail='.$emailInput);
            exit();
        }
        else if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)){
            header('Location:/Lab1/home.php?error=invalidEmail');
            exit();

        }
    }

    catch(Exception $err) {
    echo 'Fel'. $err->getMessage();
}

?>