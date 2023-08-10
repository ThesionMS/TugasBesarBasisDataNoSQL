<?php
// mulai sesi
session_start();

// cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
} else {
    // mengimpor driver MongoDB
    require_once 'vendor/autoload.php';

    // terhubung ke MongoDB
    $databaseConnection = new MongoDB\Client;

    // memilih database
    $myDatabase = $databaseConnection->myDB;

    // memilih koleksi
    $userCollection = $myDatabase->users;

    // menghapus dokumen dari koleksi
    $user_id = new MongoDB\BSON\ObjectID($_GET['id']);
    $userCollection->deleteOne(['_id' => $user_id]);

    // redirect ke halaman tabel
    header("Location: profile.php");
    exit();
}
?>