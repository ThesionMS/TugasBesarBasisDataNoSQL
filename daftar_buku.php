<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Perpustakaan Online</title>
</head>
<body>

<div id="container">
<div class="header"><img src="images/logo.png" width="100" height="100"><h1>Perpustakaan SD 42 Muara Jambi</h1>
</div>

<div class="main">
<div class="left">
<h3 align="center">MENU</h3>
<ul>
<li><a href="logout.php">Logout</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="tambah_buku.php" class="btn btn-primary">Tambah Buku</a></li>
</ul>
</div>
<?php
// Mengimpor driver MongoDB
require_once 'vendor/autoload.php';

// Terhubung ke MongoDB
$databaseConnection = new MongoDB\Client;

// Memilih database
$myDatabase = $databaseConnection->myDB;

// Memilih koleksi
$bookCollection = $myDatabase->buku;

// Mengecek apakah query pencarian (search) telah di-set pada URL
if(isset($_GET['search'])){
    $searchQuery = $_GET['search'];

    // Membuat filter pencarian berdasarkan judul, pengarang, penerbit, dan tahun terbit
    $filter = [
        '$or' => [
            ['judul' => ['$regex' => $searchQuery, '$options' => 'i']],
            ['pengarang' => ['$regex' => $searchQuery, '$options' => 'i']],
            ['penerbit' => ['$regex' => $searchQuery, '$options' => 'i']],
            ['tahun_terbit' => ['$regex' => $searchQuery, '$options' => 'i']]
        ]
    ];

    // Mencari dokumen yang sesuai dengan filter pencarian
    $books = $bookCollection->find($filter);
} else {
    // Jika query pencarian tidak di-set, tampilkan semua data buku
    $books = $bookCollection->find();
}
?>

<div class="middle">
    <form class="form-inline float-right" method="GET">
        <div class="form-group">
            <input type="text" class="form-control form-control-sm mr-2" name="search" placeholder="Cari buku...">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) { ?>
            <tr>
                <td><?php echo $book['judul']; ?></td>
                <td><?php echo $book['pengarang']; ?></td>
                <td><?php echo $book['penerbit']; ?></td>
                <td><?php echo $book['tahun_terbit']; ?></td>
                <td>
                    <a href="edit_buku.php?id=<?php echo $book['_id']; ?>" class="btn btn-info">Edit</a>
                    <a href="delete-buku.php?id=<?php echo $book['_id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="footer"><p align="center">Copyright © 2018 - Belajar CSS Responsive</a></p>
</div>
</div>

 <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


