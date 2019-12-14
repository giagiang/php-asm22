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
        | <a href="insert-category.php">Create a new Category</a>
        | <a href="logout.php">Logout</a></p>
    <h2>Category List</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
        <tr>
            <th><strong>S.No</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Delete</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        $sel_query = "Select * from category ORDER BY id desc;";
        $result = mysqli_query($con, $sel_query);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["name"]; ?></td>
                <td align="center"><?php echo $row["description"]; ?></td>
                <td align="center">
                    <a href="edit-category.php?id=<?php echo $row["id"]; ?>">Edit</a>
                </td>
                <td align="center">
                    <a href="delete-category.php?id=<?php echo $row["id"]; ?>">Delete</a>
                </td>
            </tr>
            <?php $count++;
        } ?>
        </tbody>
    </table>
</div>
</body>
</html>