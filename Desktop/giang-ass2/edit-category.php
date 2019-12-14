<?php
require('db.php');
include("auth.php");
$id = $_REQUEST['id'];
$query = "SELECT * from category where id='" . $id . "' ";
$result = mysqli_query($con, $query) or die (mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update the Category</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<div class="form">
    <p><a href="dashboard.php">Dashboard</a>
        | <a href="insert-category.php">Create a new Category</a>
        | <a href="logout.php">Logout</a></p>
    <h1>Update the Category</h1>
    <?php
    $status = "";
    if (isset($_POST['new']) && $_POST['new'] == 1)
    {
        $id = $_REQUEST['id'];
        $trn_date = date("Y-m-d H:i:s");
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];
        $submittedby = $_SESSION["username"];
        $update = "update category set trn_date='" . $trn_date . "',
            name='" . $name . "', description='" . $description . "',
            submittedby='" . $submittedby . "' where id='" . $id . "'";
        mysqli_query($con, $update) or die(mysqli_error());
        $status = "Category Updated Successfully. </br></br>
            <a href='manage-category.php'>View Updated Category</a>";
        echo '<p style="color:#FF0000;">' . $status . '</p>';
    }else {
    ?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1"/>
            <input name="id" type="hidden" value="<?php echo $row['id']; ?>"/>
            <p><input type="text" name="name" placeholder="Enter Name" required
                      value="<?php echo $row['name']; ?>"/></p>
            <p>
                    <textarea rows="4" cols="50" name="description" placeholder="Enter description"
                              required><?php echo $row['description']; ?>
                    </textarea>
            </p>
            <p><input name="submit" type="submit" value="Update"/></p>
        </form>
        <?php } ?>
    </div>
</div>
</body>

</html>