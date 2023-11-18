<?php
require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $price = $_POST['price'];
    $gambar_lama = $_POST['image_old'];
    $gambar = $gambar_lama;

    if (isset($_FILES['image']) && $_FILES['image']['error'] !== 4) {
        $gambar = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

        $tempImage = $_FILES['image']['tmp_name'];

        $randomFilename = time() . '-' . md5(rand()) . '-' . $gambar;  // Ganti $image menjadi $gambar
        $uploadPath = '../upload/' . $randomFilename;

        $gambar = "/upload/$randomFilename";

        $upload = move_uploaded_file($tempImage, $uploadPath);
        if (!$upload) {
            echo "gagal upload";
            exit;
        }
    }

    $updateQuery = "UPDATE products SET
     name = '$name',
     price = '$price',
     image = '$gambar' 
     WHERE id = '$id'";


    mysqli_query($db_connect, $updateQuery);
    header('location: ./../show.php');
}
