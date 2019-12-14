<?php
require('db.php');
include("auth.php");
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $trn_date = date("Y-m-d H:i:s");
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $price = $_REQUEST['price'];
    $description = $_REQUEST['description'];
    $categoryId = $_REQUEST['categoryId'];
    $submittedby = $_SESSION["username"];
    $ins_query = "insert into product
    (`trn_date`,`name`,`image`,`price`,`description`, `categoryId` ,`submittedby`)values
    ('$trn_date','$name','$image','$price','$description', '$categoryId','$submittedby')";
    mysqli_query($con, $ins_query)
    or die(mysql_error());
    $status = "New Product Inserted Successfully.
    </br></br><a href='manage-product.php'>View List Created Product</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create a new Product}</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="form">
    <p><a href="dashboard.php"> Dashboard </a>
        | <a href="manage-product.php">View Product List</a>
        | <a href="logout.php">Logout</a></p>
    <div>
        <h1>Create a new Product</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1"/>
            <p><input type="text" name="name" placeholder="Enter Name" required/></p>
            <p><input type="text" name="image" placeholder="Enter product's image url" required/></p>
            <p><input type="text" name="price" placeholder="Enter product's price" required/></p>
            <p><textarea rows="4" cols="50" name="description" placeholder="Enter Description" required></textarea></p>
            <p>
                Select Category?
                <select name="categoryId">
                    <option value="" selected>Select...</option>
                    <?php
                    $sel_query = "SELECT id as categoryId, name as categoryName
                            FROM category                                            
                            order by id desc";
                    $result = mysqli_query($con, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row["categoryId"] ?>"> <?php echo $row["categoryName"] ?> </option>
                    <?php } ?>
                </select>
            </p>

            <p><input name="submit" type="submit" value="Submit"/></p>
        </form>
        <p style="color:#FF0000;"><?php echo $status; ?></p>
    </div>
</div>
</body>
</html>