<!DOCTYPE html>
<html>
    <head>
        <title>Менеджер изображений</title>
    </head>
    <body>
        <h1>Менеджер изображений</h1>

        <!-- Форма загрузки изображений -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Выберите изображение для загрузки:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Загрузить изображение" name="submit">
        </form>

        <h2>Список загруженных изображений</h2>
        <?php
        // Проверяем существование папки uploads
        $upload_dir = "uploads/";
        if(!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $files = scandir($upload_dir);
        foreach($files as $file) {
            if ($file != "." && $file != "..") {
                echo "<img src='$upload_dir$file' width='200px' height='auto'>";
                echo "<form action='delete.php' method='post'>";
                echo "<input type='hidden' name='fileToDelete' value='$file'>";
                echo "<input type='submit' value='Удалить'>";
                echo "</form>";
                echo "<br>";
            }
        }
        ?>
        <hr>

        <!-- Форма для обновления файла -->
        <form action="update.php" method="post">
            <input type="submit" value="Обновить трансферную цепочку">
        </form>
    </body>
</html>