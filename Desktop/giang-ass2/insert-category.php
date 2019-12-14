<?php
require('db.php');
include("auth.php");
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $trn_date = date("Y-m-d H:i:s");
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $submittedby = $_SESSION["username"];
    $ins_query = "insert into category
    (`trn_date`,`name`,`description`,`submittedby`)values
    ('$trn_date','$name','$description','$submittedby')";
    mysqli_query($con, $ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='manage-category.php'>View Created Category</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create a new Category</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="form">
    <p><a href="dashboard.php"> Dashboard </a>
        | <a href="manage-category.php">View Category List</a>
        | <a href="logout.php">Logout</a></p>
    <div>
        <h1>Create a new Category</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1"/>
            <p><input type="text" name="name" placeholder="Enter Name" required/></p>
            <p><textarea  rows="4" cols="50" name="description" placeholder="Enter Description" required></textarea></p>
            <p><input name="submit" type="submit" value="Submit"/></p>
        </form>
        <p style="color:#FF0000;"><?php echo $status; ?></p>
    </div>
</div>
</body>
</html>