<?php
require '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = mysqli_query($db_connect, "DELETE FROM products WHERE id = $id");

    if ($delete_query) {
        echo '<script>alert("produk berhasil dihapus.");</script>';
        header("Location: ../show.php"); 
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak valid.";
}
?>
