<?php
try {

    if (isset($_POST['email']) && isset($_POST['password'])){
        $firstNameInput = $_POST['email'];
        $lastNameInput = $_POST['password'];

        $jsonArray = array('email'=>$firstNameInput, 'password'=> $lastNameInput);
        print_r($jsonArray);
        $fp = fopen('json/registration.json', 'a');

        fwrite($fp, json_encode($jsonArray));
        fclose($fp);
    }

} catch(Exception $err) {
    echo 'Fel'. $err->getMessage();
}
?>