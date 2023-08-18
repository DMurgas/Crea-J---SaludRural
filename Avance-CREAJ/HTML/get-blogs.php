<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
include("../PHP/conex.php");

if (isset($_GET['id'])) {
    $blogId = $_GET['id'];
    $sql = "SELECT id, titulo, contenido, imagen FROM blogs WHERE id = $blogId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-md hover:shadow-lg transition duration-300">';
        echo '<img src="' . $row['imagen'] . '" alt="Imagen del artículo" class="w-full h-32 object-cover">';
        echo '<div class="p-4">';
        echo '<h2 class="text-xl font-semibold text-indigo-600 mb-2">' . $row['titulo'] . '</h2>';
        echo '<p class="text-gray-700">' . $row['contenido'] . '</p>';
        echo '<a href="../HTML/blog.php" class="block text-center text-indigo-600 mt-4 hover:underline">Volver a la lista de blogs</a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo 'No se encontró el blog.';
    }
} else {
    echo 'ID de blog no proporcionado.';
}
?>
</body>
</html>

