<tbody class="relative">
                    <?php
                    include 'bd/conex.php';               
                    $sql = "SELECT * FROM registro";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td class="border p-4">' . $row['id'] . '</td>';
                            echo '<td class="border p-4">' . $row['nombre'] . '</td>';
                            echo '<td class="border px-4 py-2">' . $row['apellidos'] . '</td>';
                            echo '<td class="border px-4 py-2">' . $row['telefono'] . '</td>';
                            echo '<td class="border px-4 py-2">' . $row['correo'] . '</td>';
                            echo '<td class="border px-4 py-2 text-center">';
                            echo '<a href="acciones/editar.php?id=' . $row['id'] . '" class="text-green-500 mr-2">Editar</a>';
                            echo '<a href="delete_task.php?id=' . $row['id'] . '" class=" text-red-500">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<td class="border px-4 py-2" colspan="4">No hay registros disponibles.</td>';
                        echo '</tr>';
                    }
                    
                    $conn->close();
                    ?>
                </tbody>