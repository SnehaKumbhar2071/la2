<?php
session_start();
include('db.php');

$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Store</title>
    <link rel="stylesheet" href="style.css">
    <script>
        var loginName = <?php echo isset($_SESSION['username']) ? json_encode($_SESSION['username']) : 'null'; ?>;
    </script>
    <script src="script.js"></script>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="hero-section">
        <h1>Welcome to Smart Gadgets</h1>
        <h2 id="greeting"></h2>
        <p>Explore a wide variety of products tailored just for you.</p>
        <a href="products.php" class="cta-button">Shop Now</a>
    </div>

    <section class="about-section">
        <h2>About Us</h2>
        <p>We are committed to providing top-quality products at affordable prices. Our store offers a diverse range of products to meet all your needs, from electronics to fashion and everything in between. Our mission is to make online shopping an easy and enjoyable experience for everyone.</p>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-list">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="product-item">
                        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <p>Price: $<?php echo number_format($row['price'], 2); ?></p>
                        <a href="product_details.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="details-button">View Details</a>

                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No featured products available.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="testimonials-section">
        <h2>What Our Customers Say</h2>
        <div class="testimonial">
            <p>"I had a fantastic experience shopping here. The product quality is excellent, and the customer service is top-notch!"</p>
            <h4>- Rani Sharma</h4>
        </div>
        <div class="testimonial">
            <p>"Fast shipping and great prices. I'll definitely be a returning customer."</p>
            <h4>- Ram Khore</h4>
        </div>
    </section>

    <section class="promo-banner">
        <h2>Exclusive Offer!</h2>
        <p>Get 20% off your first purchase. Use code <strong>WELCOME20</strong> at checkout.</p>
        <a href="products.php" class="cta-button">Start Shopping</a>
    </section>

    <?php include('footer.php'); ?>

    <?php
    $conn->close(); 
    ?>
</body>
</html>