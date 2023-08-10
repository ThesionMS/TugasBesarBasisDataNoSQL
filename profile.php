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
</ul>
</div>
<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
} else {
    // this pulls the MongoDB driver from vendor folder
    require_once 'vendor/autoload.php';

    // connect to MongoDB Database
    $databaseConnection = new MongoDB\Client;

    // connecting to specific database in mongoDB
    $myDatabase = $databaseConnection->myDB;

    // connecting to our mongoDB Collections
    $userCollection = $myDatabase->users;

    // fetch all users from MongoDB Users Collection
    $users = $userCollection->find();

?>

<div class="middle">
        <table class="table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['Firstname']; ?></td>
                    <td><?php echo $user['Lastname']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['Phone Number']; ?></td>
                    <td>
                        <a href="edit-profile.php?id=<?php echo $user['_id']; ?>" class="btn btn-info">Edit</a>
                        <a href="delete-profile.php?id=<?php echo $user['_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>   
</div>



</div>
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

<?php } ?>