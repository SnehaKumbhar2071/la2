<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signup.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h2>Thank You for Your Purchase!</h2>
        <p>We appreciate your business. Your product will be delivered soon.</p>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
