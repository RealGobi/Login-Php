<?php 
require 'header.php'; ?>
<body>
    <main>
        <h1>Regestrera dig!</h1>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyfeildReg'){
                echo '<p style="color:red">Fyll i alla fält.</p>';
            }
            else if ($_GET['error'] == 'invalidEmail'){
                echo '<p style="color:red">Ej gilltlig email.</p>';   
            }
            else if ($_GET['error'] == 'passwordcheckfailed'){
                echo '<p style="color:red">Oops! Lösenorden matchade inte, gö om gö rätt!.</p>';   
            }
            else if ($_GET['error'] == 'mailinuse'){
                echo '<p style="color:red; font-size:.73rem; padding-top:0px;">Email-adressen finns redan i arkivet.</p>';  
            }
       
        }
        else if(isset($_GET['signup']) == 'success'){
            echo '<p style="color:green">Registrering klar, testa logga in uppe i högra hörnet.</p>';
        } 
        
        
        

        ?>
        <form action="registration.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email...">
        <label>Lösenord:</label>
        <input type="password" name="password" minlength="5" placeholder="Lösenord...">
        <input type="password" name="password2" minlength="5" placeholder="Ta lösenordet igen...">
        <button type="submit">Registrera dig!</button>
    </form>
    </main>
</body>
</html>