<?php
 require_once 'vendor/autoload.php';

 // terhubung ke MongoDB
 $databaseConnection = new MongoDB\Client;

 // memilih database
 $myDatabase = $databaseConnection->myDB;

 // memilih koleksi
 $bukuCollection = $myDatabase->buku;

 // menghapus dokumen dari koleksi
 $buku_id = new MongoDB\BSON\ObjectID($_GET['id']);
 $fetch = $bukuCollection->findOne(['_id' => $buku_id]);
 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form action="actions/edit-buku.php" method="POST">
        <div class="form-group">
            <label for="judul">Judul :</label>
            <input type="text" class="form-control" value="<?php echo $fetch['judul']; ?>" name="judul" id="judul" required="">
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang :</label>
            <input type="text" class="form-control" value="<?php echo $fetch['pengarang']; ?>" name="pengarang" id="pengarang" required="">
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit :</label>
            <input type="text" class="form-control" value="<?php echo $fetch['penerbit']; ?>" name="penerbit" id="penerbit" required="">
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit :</label>
            <input type="text" class="form-control" value="<?php echo $fetch['tahun_terbit']; ?>" name="tahun_terbit" id="tahun_terbit" required="">
        </div>
        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $fetch['_id']; ?>">
        <button type="submit" class="btn btn-primary" name="update" id="update">Update Info</button>
    </form>
    <a href="daftar_buku.php" class="btn btn-secondary mt-3">Back</a>
</div>

<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

