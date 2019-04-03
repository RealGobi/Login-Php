<?php require 'header.php'; ?>
<body>
    <main>
        <h1>Regestrera dig!</h1>
        
        <form action="registration.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email...">
        <label>Lösenord:</label>
        <input type="password" name="password" placeholder="Lösenord...">
        <button type="submit">Registrera dig!</button>
    </form>
    </main>
</body>
</html>