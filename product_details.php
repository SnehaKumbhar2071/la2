<?php
session_start();
include('db.php'); 


if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    

    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Product not found.");
    }
} else {
    die("Invalid product ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="style.css">
    <script>
        function handleBuyClick() {

            <?php if (isset($_SESSION['username'])): ?>

                alert('Thank you for buying!');
                window.location.href = 'thankyou.php'; 
            <?php else: ?>

                window.location.href = 'signup.php';
            <?php endif; ?>
        }
    </script>
</head>
<body>

    <?php include('navbar.php'); ?>

    <div class="container">
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
        <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <p>Price: $<?php echo number_format($product['price'], 2); ?></p>


        <button onclick="handleBuyClick()">Buy Now</button>
    </div>

    <?php include('footer.php'); ?>
    
    <?php $conn->close();  ?>
</body>
</html>
