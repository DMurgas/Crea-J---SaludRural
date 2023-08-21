<?php
session_start();
include("../PHP/conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentario = $_POST['comentario'];
    $blogId = $_POST['blog_id'];
    $userId = $_SESSION['id']; // Obtén el ID del usuario desde la sesión

    // Verificar si el ID del blog existe en la tabla blogs
    $checkBlogSql = "SELECT id FROM blogs WHERE id = $blogId";
    $checkBlogResult = $conn->query($checkBlogSql);

    if ($checkBlogResult->num_rows > 0) {
        // El ID del blog es válido, proceder con la inserción del comentario
        $insertSql = "INSERT INTO comentarios (contenido, blog_id, user_id) VALUES ('$comentario', $blogId, $userId)";

        if ($conn->query($insertSql) === TRUE) {
            header("Location: blog.php?id=$blogId"); // Redirige de vuelta a la página de detalles del blog
            exit();
        } else {
            echo "Error al agregar el comentario: " . $conn->error;
        }
    } else {
        echo "El ID del blog no es válido.";
    }

    $conn->close();
}
?>
