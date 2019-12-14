<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Secured Page</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="form">
    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <p>Dashboard</p>
    <p><a href="manage-category.php">Manage Category</a></p>
    <p><a href="manage-product.php">Manage Product</a></p>
    <p><a href="manage-user.php">Manage User (for Admin)</a></p>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>