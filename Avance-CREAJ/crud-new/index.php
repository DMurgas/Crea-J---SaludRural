<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="flex">
    <!-- Barra de Navegación en el Lado Derecho -->
    <nav class="bg-gray-800 text-white w-1/5 h-screen p-4">
        <h2 class="text-xl font-semibold mb-4">Menú</h2>
        <ul class="space-y-2">
            <li><a href="#" class="hover:text-gray-300">Inicio</a></li>
            <li><a href="#" class="hover:text-gray-300">Agregar Tarea</a></li>
            <!-- Agrega más enlaces aquí -->
        </ul>
    </nav>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>

        <!-- Formulario de Agregar Tarea -->
        <form action="add_task.php" method="post" class="mb-4 flex">
            <input id="task" name="task" type="text" class="flex-grow px-3 py-2 rounded-l-md border" placeholder="Nueva tarea">
            <button type="submit" id="addTask" class="px-4 py-2 bg-blue-500 text-white rounded-r-md">Agregar</button>
        </form>

        <div class="overflow-x-auto">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">id</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Apellidos</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <?php include 'info/info-registro.php'; ?>
            </table>
        </div>
    </div>
</body>
</html>
