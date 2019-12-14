
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<?php
session_start();
?>
<body>
<div class="form">
    <?php if(isset($_SESSION['username']))  {?>
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
    <?php } else {?>
        <p><a href="login.php">Click here to login</a></p>
    <?php } ?>
</div>

<?php

$product = array("Product A", "Product B", "Product C");
$price = array(1500, 1000, 500);

// when cart is empty
if (!isset($_SESSION["cart"])) {
    $_SESSION["total"] = 0;
    for ($i = 0; $i < count($product); $i++) {
        $_SESSION["quantity"][$i] = 0;
        $_SESSION["amount"][$i] = 0;
    }
}
//$_SESSION["total"] = 0;



// remove
if (isset($_REQUEST["remove"])) {
    $i = $_REQUEST["remove"];
    if( $_SESSION["quantity"][$i] > 0) {
        $quantity = $_SESSION["quantity"][$i] - 1;
        $_SESSION["quantity"][$i] = $quantity;
        if ($quantity == 0) {
            unset($_SESSION["cart"][$i]);
        } else {
            $_SESSION["amount"][$i] = $price[$i] * $quantity;
        }
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
?>

<center>
    <br>
    <?php
    $flag = false;
    if ((isset($_SESSION["cart"])) && (count($_SESSION["cart"]) != 0)) {
        ?>
        <h3>View cart</h3>
        <table border="1">
            <thead>
            <tr>
                <th>
                    Product No.
                </th>
                <th>
                    Product Price.
                </th>
                <th>
                    Product Quantity
                </th>
                <th>
                    Amount of money
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_SESSION["cart"] as $i) {
                ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $price[$i]; ?>
                    </td>
                    <td>
                        <?= $_SESSION["quantity"][$i]; ?>
                    </td>
                    <td>
                        <?= $_SESSION["amount"][$i]; ?>
                    </td>
                    <td>
                        <a style="margin: 6px" href="cart.php?remove=<?= $i; ?>"  class="btn btn-danger" >Remove</a>
                    </td>
                </tr>
                <?php
                $_SESSION["total"] = $_SESSION["total"] + $_SESSION["amount"][$i];
            }
            ?>
            <tr>
                <td>
                    Total
                </td>
                <td align="right" colspan="4">
                    <?= $_SESSION["total"] ?> $
                </td>
            </tr>
            <tr>
                <td colspan="5" align="center">
                    <a href="index.php?reset=true" style="text-decoration: none">
                        <button style="margin: 5px" class="btn btn-primary">Reset Cart</button>
                    </a>
<!--                    <a href="cart.php.php?save=true" style="text-decoration: none;">-->
<!--                        <button>Check in</button>-->
<!--                    </a>-->
                </td>
            </tr>
            </tbody>
        </table>
    <?php
//         if (isset($_REQUEST["save"]))
//        {
//           if ($_REQUEST["save"] == "true")
//            {
//            $query1 = "INSERT INTO tblorder VALUES(0," . $_SESSION["total"] . ")";
//            $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
//               if ($result1)
//                {
//                ?>
<!--                    <script>-->
<!--                        alert("Saved");-->
<!--                        location.assign("index.php");-->
<!--                    </script>-->
<!--                    --><?php
//                    unset($_SESSION["quantity"]);
//                    unset($_SESSION["amount"]);
//                    unset($_SESSION["total"]);
//                    unset($_SESSION["cart"]);
//
//                }
//            }
//        }
    }
    ?>
</center>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>