<?php
try {
    if (isset($_POST['email']) && isset($_POST['password'])){
        $emailInput = $_POST['email'];
        $passwordInput = $_POST['password'];
        $passwordInput2 = $_POST['password2'];

        if (empty($emailInput) || empty($passwordInput) || empty($passwordInput2)) {
            header('Location:/Lab1/signup.php?error=emptyfeild=mail='.$emailInput);
            exit();
        }
        else if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)){
            header('Location:/Lab1/signup.php?error=invalidEmail');
            exit();

        }
        else if ( $passwordInput!= $passwordInput2){
            header('Location:/Lab1/signup.php?error=passwordcheckfailed'.$emailInput);
            echo("Oops! Lösenorden matchade inte, gö om gö rätt!");
            exit();
        } 
        $passwordInput = $_POST["password"];
        $saltStart = "123abc";
        $saltEnd = "890zyw";

        $bcryptedPassword = password_hash($saltStart.$passwordInput.$saltEnd, PASSWORD_BCRYPT);

        $jsonArray = array('email'=>$emailInput, 'password'=> $bcryptedPassword);
        print_r($jsonArray);
        $fp = fopen('json/registration.json', 'a');

        fwrite($fp, json_encode($jsonArray));
        fclose($fp);
        header('Location:/Lab1/home.php?signin=success');
        exit();
    }

} catch(Exception $err) {
    echo 'Fel'. $err->getMessage();
}
?>