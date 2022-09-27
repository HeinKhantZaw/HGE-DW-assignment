<?php

function AddShoppingCart($productId, $BuyQty)
{
    include('db/connect.php');
    $query = "SELECT `product`.`id`, `product`.`productName`,`product`.`productPrice`, `product`.`productImage`, `category`.`categoryName` FROM `product`,`category` WHERE `product`.`id`= '$productId' AND `product`.`categoryId` = `category`.`id`";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if ($count < 1) {
        echo "<p>Product ID not found.</p>";
        exit();
    }
    $row = mysqli_fetch_array($result);
    if(!$result){
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
        exit();
    }
    $productName = $row['productName'];
    $productPrice =  $row['productPrice'];
    $productCategory = $row['categoryName'];
    $image = explode(",", $row['productImage']);
    $productImage = "/dw-assignment-HKZ/images/product/" . $image[0];

    if ($BuyQty < 1) {
        echo "<script>window.alert('Purchase Quantity Cannot be Zero (0)')</script>";
        echo "<script>window.location=self.location</script>";
        exit();
    }

    if (isset($_SESSION['ShoppingCart'])) {
        $Index = IndexOf($productId);

        if ($Index == -1) {
            $size = count($_SESSION['ShoppingCart']);

            $_SESSION['ShoppingCart'][$size]['productId'] = $productId;
            $_SESSION['ShoppingCart'][$size]['productName'] = $productName;
            $_SESSION['ShoppingCart'][$size]['productPrice'] = $productPrice;
            $_SESSION['ShoppingCart'][$size]['productCategory'] = $productCategory;
            $_SESSION['ShoppingCart'][$size]['BuyQty'] = $BuyQty;
            $_SESSION['ShoppingCart'][$size]['productImage'] = $productImage;
        } else {
            $_SESSION['ShoppingCart'][$Index]['BuyQty'] += $BuyQty;
        }
    } else {
        $_SESSION['ShoppingCart'] = array(); //Create Session Array

        $_SESSION['ShoppingCart'][0]['productId'] = $productId;
        $_SESSION['ShoppingCart'][0]['productName'] = $productName;
        $_SESSION['ShoppingCart'][0]['productPrice'] = $productPrice;
        $_SESSION['ShoppingCart'][0]['productCategory'] = $productCategory;
        $_SESSION['ShoppingCart'][0]['BuyQty'] = $BuyQty;
        $_SESSION['ShoppingCart'][0]['productImage'] = $productImage;
    }
    echo "<script>window.location='Shopping_Cart.php'</script>";
}

function RemoveShoppingCart($productId)
{
    $Index = IndexOf($productId);
    unset($_SESSION['ShoppingCart'][$Index]);
    $_SESSION['ShoppingCart'] = array_values($_SESSION['ShoppingCart']);

    echo "<script>window.location='Shopping_Cart.php'</script>";
}

function ClearShoppingCart()
{
    unset($_SESSION['ShoppingCart']);
    echo "<script>window.location='Shopping_Cart.php'</script>";
}

function CalculateTotalAmount()
{
    $TotalAmount = 0;

    $size = count($_SESSION['ShoppingCart']);

    for ($i = 0; $i < $size; $i++) {
        $productPrice = $_SESSION['ShoppingCart'][$i]['productPrice'];
        $BuyQty = $_SESSION['ShoppingCart'][$i]['BuyQty'];
        $TotalAmount += ($productPrice * $BuyQty);
    }
    return $TotalAmount;
}

function CalculateVAT()
{
    $VAT = 0;
    $VAT = CalculateTotalAmount() * 0.05;

    return $VAT;
}

function CalculateTotalQuantity()
{
    $TotalQuantity = 0;
    $size = count($_SESSION['ShoppingCart']);

    for ($i = 0; $i < $size; $i++) {
        $BuyQty = $_SESSION['ShoppingCart'][$i]['BuyQty'];
        $TotalQuantity += $BuyQty;
    }
    return $TotalQuantity;
}

function IndexOf($productId)
{
    if (!isset($_SESSION['ShoppingCart'])) {
        return -1;
    }

    $size = count($_SESSION['ShoppingCart']);

    if ($size < 1) {
        return -1;
    }

    for ($i = 0; $i < $size; $i++) {
        if ($productId == $_SESSION['ShoppingCart'][$i]['productId']) {
            return $i;
        }
    }
    return -1;
}

?>