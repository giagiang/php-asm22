<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Manage category page</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="form">
    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <p><a href="index.php">Home</a>
        | <a href="insert-product.php">Create a new Product</a>
        | <a href="logout.php">Logout</a></p>
    <h2>Product List</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
        <tr>
            <th><strong>S.No</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Image</strong></th>
            <th><strong>Price</strong></th>
            <th><strong>Category</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Delete</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        $sel_query = "SELECT product.id as id, product.name as name, product.description as description
                        , category.name as categoryName , product.image as image, product.price as price
                        FROM product
                        inner join category
                        on product.categoryId = category.id
                        order by id desc";
        $result = mysqli_query($con, $sel_query);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["name"]; ?></td>
                <td align="center"><?php echo $row["description"]; ?></td>
                <td align="center"><img width="150px" height="100px" src="<?php echo  $row["image"]; ?>"></td>
                <td align="center"><?php echo $row["price"]; ?></td>
                <td align="center"><?php echo $row["categoryName"]; ?></td>
                <td align="center">
                    <a href="edit-product.php?id=<?php echo $row["id"]; ?>">Edit</a>
                </td>
                <td align="center">
                    <a href="delete-product.php?id=<?php echo $row["id"]; ?>">Delete</a>
                </td>
            </tr>
            <?php $count++;
        } ?>
        </tbody>
    </table>
</div>
</body>
</html>