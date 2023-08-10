<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
} else {
    // Mengimpor driver MongoDB
    require_once 'vendor/autoload.php';

    // Terhubung ke MongoDB
    $databaseConnection = new MongoDB\Client;

    // Memilih database
    $myDatabase = $databaseConnection->myDB;

    // Memilih koleksi
    $bookCollection = $myDatabase->buku;

    // Menghapus dokumen dari koleksi
    $book_id = new MongoDB\BSON\ObjectID($_GET['id']);
    $bookCollection->deleteOne(['_id' => $book_id]);

    // Redirect ke halaman tabel
    header("Location: daftar_buku.php");
    exit();
}
?>