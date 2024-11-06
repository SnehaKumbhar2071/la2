<?php
include('db.php'); 

$sql = "SELECT id, title, LEFT(content, 100) AS snippet FROM blogs ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Section</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('navbar.php'); ?> 
    <h1>Blog Section</h1>
    
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <h3><a href="blog_detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                    <p><?php echo $row['snippet']; ?>...</p>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No blogs available.</p>
    <?php endif; ?>

    <p><a href="all_blogs.php">View all blogs</a></p> 
    <p><a href="main.php">Back to Home</a></p>
    <?php include('footer.php'); ?>
</body>
</html>

<?php
$conn->close();
?>
