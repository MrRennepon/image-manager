<?php
    if (isset($_POST['fileToDelete'])) {
        $filename = $_POST['fileToDelete'];
        $filepath = "uploads/" . $filename;

        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                echo "Файл $filename успешно удален.";
            } else {
                echo "Ошибка при удалении файла $filename.";
            }
        } else {
            echo "Файл $filename не существует.";
        }
    }
?>