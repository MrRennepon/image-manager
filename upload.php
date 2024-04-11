<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check != false) {
            echo "Файл является изображением - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Файл не является изображением.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "<br>Извините, файл уже существует.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<br>Извините, ваш файл слишком большой.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "Извините, разрешены только файлы в формате JPG, JPEG, PNG и GIF.";
            $uploadOk = 0;
        }

    if ($uploadOk == 0) {
        echo " Ваш файл не был загружен.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<br>Файл " . basename($_FILES["fileToUpload"]["name"]) . " успешно загружен.";
        } else {
            echo "Произошла ошибка при загрузке файла";
        }
    }
?>