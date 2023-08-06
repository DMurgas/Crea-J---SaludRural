<?php
// Conexión a la base de datos (cambia estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saludrural";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$imagenNombre = $_FILES['imagen']['name'];
$imagenTmpName = $_FILES['imagen']['tmp_name'];

// Ruta donde se almacenarán las imágenes (ajusta según tu configuración)
$rutaImagen = "ruta/del/almacenamiento/" . $imagenNombre;

// Mueve la imagen a la ruta de almacenamiento
move_uploaded_file($imagenTmpName, $rutaImagen);

// Inserta los datos en la base de datos
$sql = "INSERT INTO blogs (titulo, contenido, imagen) VALUES ('$titulo', '$contenido', '$rutaImagen')";

if ($conn->query($sql) === TRUE) {
    echo "Blog publicado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
