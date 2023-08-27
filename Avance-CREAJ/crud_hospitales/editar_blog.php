<?php
// Incluye la conexión a la base de datos
include_once 'db_connection.php'; // Asegúrate de ajustar el nombre de tu archivo de conexión

// Verifica si se ha enviado el formulario de edición
if (isset($_POST["submit"])) {
    $blogId = $_POST['blog_id'];
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    // Realiza la actualización en la base de datos
    $updateSql = "UPDATE blogs SET titulo = '$titulo', contenido = '$contenido' WHERE id = $blogId";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: realizado_blog.php?id=$blogId"); // Redirige de vuelta a la página de detalles del blog
        exit();
    } else {
        echo "Error al actualizar el blog: " . $conn->error;
    }
}

// Recupera los datos del blog para mostrar en el formulario de edición
if (isset($_GET['id'])) {
    $blogId = $_GET['id'];
    $sql = "SELECT id, titulo, contenido FROM blogs WHERE id = $blogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
    } else {
        echo 'No se encontró el blog.';
        exit();
    }
} else {
    echo 'ID de blog no proporcionado.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>Editar Blog</h1>
    <form method="POST" class="bg-white p-6 rounded-md shadow-lg">
        <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
        <label class="block mb-2">Título:</label>
        <input type="text" name="titulo" class="w-full px-3 py-2 border rounded" value="<?php echo $blog['titulo']; ?>">

        <label class="block mb-2">Contenido:</label>
        <textarea name="contenido" rows="4" class="w-full px-3 py-2 border rounded"><?php echo $blog['contenido']; ?></textarea>

        <button type="submit" name="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-full">Guardar Cambios</button>
    </form>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
$conn->close();
?>
