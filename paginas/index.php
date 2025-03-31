<?php
$servername = "localhost";
$username = "root";  // o tu usuario de MySQL
$password = "";      // o tu contraseña de MySQL
$dbname = "e-comerce";
$port = 3306;        // Puerto 3307

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener productos y sus imágenes
$sql = "SELECT p.id_Producto, p.nombre_Producto, p.descripcion, p.precio, i.url as ruta_imagen
        FROM Producto p
        LEFT JOIN Imagen i ON p.id_Producto = i.id_Producto";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Tienda</title>
    <link rel="stylesheet" href="estilos/registro_estilo.css">
    <script>

        function validarBusqueda(event) {
            var busqueda = document.getElementById('busqueda').value;
            
            if (busqueda.trim() === "") {
                event.preventDefault(); 
                alert("Por favor, ingresa algo para buscar."); 
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>E-Comerce</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <form action="inicio.php" method="get" onsubmit="validarBusqueda(event)">
                <input type="search" name="busqueda" id="busqueda" placeholder="Buscar productos...">
                <button type="submit">Buscar</button>
            </form>
            <a href="carrito.php">
                <img src="imagenes/carrito.png" alt="Carrito de compras" id="carrito-icono">
            </a>
            <a href="iniciosesion.php">
                <img src="imagenes/usuario.png" alt="inicio-sesion" id="inisio-sesion">
            </a>
        </nav>
    </header>
    
    <main>
    <h2>Bienvenido a mi tienda en línea</h2>
    <p>Encuentra los mejores productos al mejor precio.</p>
    <div>
        <?php
        if ($result->num_rows > 0) {
            // muestra productos
            while($row = $result->fetch_assoc()) {
                echo '<a href="">';
                echo '<img src="' . $row['ruta_imagen'] . '" alt="' . $row['nombre_Producto'] . '">';
                echo '<p>' . $row['nombre_Producto'] . '</p>';
                echo '</a>';
            }
        } else {
            echo "No hay productos disponibles.";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</main>
    <footer>
        <p>© 2025 Carlos Santellan. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

