<?php
try {
    if (isset($_POST['email']) && isset($_POST['password'])){
        $emailInput = $_POST['email'];
        $passwordInput = $_POST['password'];
        $passwordInput2 = $_POST['password2'];
        #kollar så allt är rätt ifyllt
        if (empty($emailInput) || empty($passwordInput) || empty($passwordInput2)) {
            header('Location:/Lab1/signup.php?error=emptyfeildReg');
            exit();
        }
        else if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)){
            header('Location:/Lab1/signup.php?error=invalidEmail');
            exit();

        }
        else if ( $passwordInput!= $passwordInput2){
            header('Location:/Lab1/signup.php?error=passwordcheckfailed');
            exit();
        } 
        else {
            #salt och hash av lösen
            $saltStart = "123abc";
            $saltEnd = "890zyw";
            $bcryptedPassword = password_hash($saltStart.$passwordInput.$saltEnd, PASSWORD_BCRYPT);
            
            #öppnar json 
            $openData = file_get_contents('json/registration.json');
            $fileData = json_decode($openData,true);

            #sparar i json
            $jsonArray = array('email'=>$emailInput, 'password'=> $bcryptedPassword);
            $fileData[]= $jsonArray;
            $putData = json_encode($fileData);       
            file_put_contents('json/registration.json', $putData);
            header('Location:/Lab1/signup.php?signup=success');
            exit();
            
        }

    }

} catch(Exception $err) {
    echo 'Fel'. $err->getMessage();
}
?>