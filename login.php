<?php
// session
session_start();
?>
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

        
        function inlogg(){
            $emailInput = $_POST['email'];
            $passwordInput = $_POST['password'];

            $saltStart = "123abc";
            $saltEnd = "890zyw";

            $getData = file_get_contents('json/registration.json');
            $users = json_decode($getData);

            foreach ($users as $user) {
              if($emailInput == $user->email && password_verify($saltStart . $passwordInput. $saltEnd, $user->password)){
                $_SESSION["email"] = $emailInput;
                header('Location:/Lab1/home.php?login=success');
                exit();
              } 
              else {
                header('Location:/Lab1/home.php?error=invalidEmailOrPassword');
                exit();
            }
            }

            }
            inlogg();
     }

    catch(Exception $err) {
    echo 'Fel'. $err->getMessage();
}

?>