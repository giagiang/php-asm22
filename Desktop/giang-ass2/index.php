<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
require('db.php');
session_start();
?>
<body>
<div style="float: right;margin-right: 300px;">
    <a href="cart.php?save=true" style="text-decoration: none;">
        <button style="margin-top: 10px" type="button" class="btn  btn-success">View Cart</button>
    </a>
    <br>
    <b>Number of product in Cart: <?php echo $_SESSION["qt"] ?> </b>
</div>

<div class="form">
    <?php if (isset($_SESSION['username'])) { ?>
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <p><a href="login.php">Click here to login</a></p>
    <?php } ?>
</div>

<?php

//$product = array("Product A", "Product B", "Product C");
//$price = array(1500, 1000, 500);

$product = array();
$price = array();
$image = array();
$category = array();
//
$sel_query = "SELECT product.id as id, product.name as name, product.description as description
                        , category.name as categoryName , product.image as image, product.price as price
                        FROM product
                        inner join category
                        on product.categoryId = category.id
                        order by id desc";
$result = mysqli_query($con, $sel_query);
while ($row = mysqli_fetch_assoc($result)) {
    $product[] = $row["name"];
    $price[] = $row["price"];
    $image[] = $row["image"];
    $category[] = $row["categoryName"];
}

//


// when cart is empty
if (!isset($_SESSION["cart"])) {
    $_SESSION["total"] = 0;
    for ($i = 0; $i < count($product); $i++) {
        $_SESSION["quantity"][$i] = 0;
        $_SESSION["amount"][$i] = 0;
    }
}
$_SESSION["total"] = 0;
$_SESSION["qt"] = 0;

// add
if (isset($_REQUEST["add"])) {
    $i = $_REQUEST["add"];
    $quantity = $_SESSION["quantity"][$i] + 1;
    $_SESSION["cart"][$i] = $i;
    $_SESSION["amount"][$i] = $price[$i] * $quantity;
    $_SESSION["quantity"][$i] = $quantity;

    foreach ($_SESSION["cart"] as $i) {
        $_SESSION["qt"] = $_SESSION["qt"] + $_SESSION["quantity"][$i];
    }

    echo "<script>alert('Added 1 more product into cart');</script>";
}

// remove
if (isset($_REQUEST["remove"])) {
    $i = $_REQUEST["remove"];
    $quantity = $_SESSION["quantity"][$i] - 1;
    $_SESSION["quantity"][$i] = $quantity;
    if ($quantity == 0) {
        unset($_SESSION["cart"][$i]);
    } else {
        $_SESSION["amount"][$i] = $price[$i] * $quantity;
    }
}

// reset
if (isset($_REQUEST["reset"])) {
    if ($_REQUEST["reset"] == "true") {
        unset($_SESSION["cart"]);
        unset($_SESSION["quantity"]);
        unset($_SESSION["amount"]);
        unset($_SESSION["total"]);
    }
}

// search
if (isset($_POST['searchProduct']) && $_POST['searchProduct'] == 1) {
    $html = "<script>console.log('PHP: ');</script>";

    echo($html);
    echo($html);
    unset($product);
    $searchText = $_REQUEST['searchText'];
    $sel_query = "SELECT product.id as id, product.name as name, product.description as description
                        , category.name as categoryName , product.image as image, product.price as price
                        FROM product
                        inner join category
                        on product.categoryId = category.id
                        where product.name like '%$searchText%'
                        order by id desc";
    $result = mysqli_query($con, $sel_query);

    while ($row = mysqli_fetch_assoc($result)) {
        $html = "<script>console.log('PHP: suck');</script>";
        echo($html);
        $product[] = $row["name"];
        $price[] = $row["price"];
        $image[] = $row["image"];
        $category[] = $row["categoryName"];
    }
}

?>

<center>
    <h3>List of products</h3>
    <form name="formSearch" method="post" action="">
        <div class="form-group">
            <input type="hidden" name="searchProduct" value="1"/>
            <input style="width: 300px;" name="searchText" type="text" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Enter product name to search   ">
        </div>
        <button style="margin-bottom: 20px" type="submit" class="btn btn-primary">Search </button>
    </form>

    <table border="1">
        <thead>
        <tr>
            <th>
                Product No.
            </th>
            <th>
                Product Name
            </th>
            <th>
                Product Image
            </th>
            <th>
                Product Price
            </th>
            <th>
                Product's Category
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if( isset($product)) {
            for ($i = 0; $i < count($product); $i++) {
                ?>
                <tr>
                    <td>
                        <?= ($i + 1); ?>
                    </td>
                    <td>
                        <?= $product[$i]; ?>
                    </td>
                    <td align="center"><img width="150px" height="100px" src="<?php echo  $image[$i]; ?>"></td>
                    <td>
                        <?= $price[$i]; ?>$
                    </td>
                    <td>
                        <?= $category[$i]; ?>
                    </td>
                    <td>
                        <a href="index.php?add=<?= $i; ?>"  class="btn  btn-outline-primary">Add to cart</a>
                    </td>
                </tr>
                <?php
            }
        }

        ?>
        </tbody>
    </table>
    <br>

</center>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>