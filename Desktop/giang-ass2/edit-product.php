<?php
require('db.php');
include("auth.php");
$id = $_REQUEST['id'];
$query = "SELECT * from product where id='" . $id . "' ";
$result = mysqli_query($con, $query) or die (mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update the product</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<div class="form">
    <p><a href="dashboard.php">Dashboard</a>
        | <a href="insert-product.php">Create a new product</a>
        | <a href="logout.php">Logout</a></p>
    <h1>Update the product</h1>
    <?php
    $status = "";
    if (isset($_POST['new']) && $_POST['new'] == 1)
    {
        $id = $_REQUEST['id'];
        $trn_date = date("Y-m-d H:i:s");
        $name = $_REQUEST['name'];
        $image = $_REQUEST['image'];
        $price = $_REQUEST['price'];
        $description = $_REQUEST['description'];
        $categoryId = $_REQUEST['categoryId'];
        $submittedby = $_SESSION["username"];
        $update = "update product set trn_date='" . $trn_date . "',
            name='" . $name . "',image='" . $image . "',price='" . $price . "',
            description='" . $description . "',  categoryId='" . $categoryId . "',
            submittedby='" . $submittedby . "' where id='" . $id . "'";
        mysqli_query($con, $update) or die(mysqli_error());
        $status = "product Updated Successfully. </br></br>
            <a href='manage-product.php'>View Updated product</a>";
        echo '<p style="color:#FF0000;">' . $status . '</p>';
    }else {
    ?>
    <div>
        <form name="form" method="post" action="">
            <?php
            $string = implode(",", $row);
            $html = "<script>console.log('PHP: ${string}');</script>";
            echo($html);
            ?>
            <input type="hidden" name="new" value="1"/>
            <input name="id" type="hidden" value="<?php echo $row['id']; ?>"/>
            <p><input type="text" name="name" placeholder="Enter Name" required
                      value="<?php echo $row['name']; ?>"/></p>
            <p><input type="text" name="image" placeholder="Enter product's image url" required
                      value="<?php echo $row['image']; ?>"/></p>
            <p><input type="text" name="price" placeholder="Enter product's price" required
                      value="<?php echo $row['price']; ?>"/></p>
            <p>
                    <textarea rows="4" cols="50" name="description" placeholder="Enter description"
                              required><?php echo $row['description']; ?>
                    </textarea>
            </p>
            <p>
                Select Category?
                <select name="categoryId">
                    <option value="" selected>Select...</option>
                    <?php
                    $sel_query = "SELECT id as categoryId, name as categoryName
                            FROM category                                            
                            order by id desc";
                    $result = mysqli_query($con, $sel_query);
                    while ($tuple = mysqli_fetch_assoc($result)) {
                        ?>
                        <option <?php if ($row["categoryId"] == $tuple["categoryId"]) echo 'selected' ?>
                                value="<?php echo $tuple["categoryId"] ?>"> <?php echo $tuple["categoryName"] ?> </option>
                    <?php } ?>
                </select>
            </p>

            <p><input name="submit" type="submit" value="Update"/></p>
        </form>
        <?php } ?>
    </div>
</div>
</body>

</html>