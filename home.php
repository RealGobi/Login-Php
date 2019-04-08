<?php require 'header.php'; ?>
<body>
    <main>
        <h1>Home</h1>
        <?php
            #lite olika info beroende på om $_SESSION är fylld eller ej
            if(isset($_SESSION['email'])){
                echo '<p>Du är inloggad, roligare än så var det inte.</p>
                <img src="img/inloggad.png" alt="tumme">';
            }
            else {
                echo '<p>Registrera dig och logga in om du vill se mitt hemliga medelande!</p>';
            }
            ?>
    </main>

</body>
</html>