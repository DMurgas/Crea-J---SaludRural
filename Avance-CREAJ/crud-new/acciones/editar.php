<?php
include '../bd/conex.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST["task_id"];
    $newTaskText = $_POST["new_task_text"];

    $sql = "UPDATE tasks SET task_text='$newTaskText' WHERE id=$taskId";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: index.html");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
