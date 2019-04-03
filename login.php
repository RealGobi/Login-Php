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

            $data = file_get_contents('json/registration.json');
            $userDatas = json_decode($data);

            foreach ($userDatas as $userData) {
              if(password_verify($saltStart . $passwordInput. $saltEnd, $userData->password) && $emailInput == $userData->email){
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