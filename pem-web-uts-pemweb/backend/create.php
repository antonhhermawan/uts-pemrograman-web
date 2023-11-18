<?php

require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productImage = $_FILES['image']['name'];

    // Insert product data into the database
    $insertProduct = mysqli_query($db_connect, "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$productImage')");

    if ($insertProduct) {
        echo '<script>alert("Produk berhasil ditambahkan.");</script>';
        header('Location: ../show.php');
    } else {
        echo "Terjadi kesalahan saat menambahkan produk: " . mysqli_error($db_connect);
    }
}


