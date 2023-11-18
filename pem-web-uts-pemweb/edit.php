<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mendapatkan data produk berdasarkan ID
    $product_query = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($product_query);

    if ($product) { ?>
        <!--Form untuk mengedit data -->
        <h2>Edit Data Produk</h2>
        <form action="./backend/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="image_old" value="<?= $product['image'] ?>">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            Nama Produk: <input type="text" name="name" value="<?= $product['name'] ?>">
            <br>
            Harga: <input type="number" name="price" value="<?= $product['price'] ?>">
            <br>
            Gambar : <img src=".<?= $product['image'] ?>" alt="<?= $product['image'] ?>" width="100">
            <br>
            <input type="file" name="image">
            <button type="submit" name="submit">Edit</button>
        </form>

<?php
    } else {
        echo "Data produk tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>