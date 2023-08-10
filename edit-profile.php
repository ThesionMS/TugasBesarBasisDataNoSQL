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
    $fetch = $userCollection->findOne(['_id' => $user_id]);
	
}
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
    <form action="actions/edit-profile.php" method="POST">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" value="<?php echo $fetch['Firstname']; ?>" name="fname" id="fname" required="">
        </div>
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" value="<?php echo $fetch['Lastname']; ?>" name="lname" id="lname" required="">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" value="<?php echo $fetch['Email']; ?>" name="email" id="email" required="">
        </div>
        <div class="form-group">
            <label for="phoneNo">Phone Number:</label>
            <input type="text" class="form-control" value="<?php echo $fetch['Phone Number']; ?>" name="phoneNo" id="phoneNo" required="">
        </div>
        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $fetch['_id']; ?>">
        <button type="submit" class="btn btn-primary" name="update" id="update">Update Info</button>
    </form>
    <a href="profile.php" class="btn btn-secondary mt-3">Profile Page</a>
</div>

<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


