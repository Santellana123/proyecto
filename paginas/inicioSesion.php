<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <header>
        <h1>E-Comerce</h1>
        <nav>
            <a href="index.php">Inicio</a>
        </nav>
    </header>
    <div>
         <form action="" method="post">
            <label for="usuario">Ingres tu usuario</label>
            <input type="text" name="Usuario" required placeholder="Usuario"><br>
             <label for="contraseña">Ingresa contraseña</label>
             <input type="password"name="Contraseña" required placeholder="contraseña"> <br>
             <input type="submit">
        </form>
        <Button onclick="window.location.href='registro.php'" >Registrarse</Button>
    </div>
    <footer>
        <p>© 2025 Carlos Santellan. Todos los derechos reservados.</p>
    </footer>
</body>
</html>