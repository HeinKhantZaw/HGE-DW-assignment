<?php
include 'db/connect.php';
if(isset($_POST['btnSaveCategory'])) {
	$categoryName = $_POST['categoryName'];
}
if(isset($_POST['btnSave'])){
    $productName = $_POST['productName'];
    $productAmount = $_POST['productAmount'];
    $productQuantity = $_POST['productQuantity'];
    $description = $_POST['productDescription'];
    $productTypeId = $_POST['productType'];

    $folder = 'images/product/';
    $productImage1 = $_FILES['productImage1']['name'];
    $file1Name = $folder . $productImage1;
    $moveImg1 = move_uploaded_file($_FILES['productImage1']['tmp_name'], $file1Name);
        if(! ($moveImg1)){
            echo "Error uploading file";
            exit();
        }else{
            $select = "SELECT * FROM `product` WHERE `productName` = '$productName'";
            $result = mysqli_query($connection, $select);
            $count = mysqli_num_rows($result);
            if($count > 0) {
                echo "<script> alert(`Product ". $productName ." already exists`)</script>";
                echo "<script>window.open('product_entry.php', '_self')</script>";
            }else{
                $query = "INSERT INTO `product` (productName, productAmount, productQuantity, productImage1, productImage2, description, productTypeId) VALUES ('$productName', '$productAmount', '$productQuantity', '$productImage1', '$description', '$productTypeId')";
                $result = mysqli_query($connection, $query);
                if($result) {
                    echo "<script>alert('Product added successfully')</script>";
                    echo "<script>window.open('product_entry.php', '_self')</script>";
                    }else{
                        die("Query failed: " . mysqli_error($connection));
                    }
            }
        }
}
?>
<html lang="en">
<head>
    <title>Product entry form</title>
</head>
<body>
<form action="product_entry.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Category Entry</legend>
		<table align="center" width="500">
			<tr>
				<td>
					<label for="categoryName">Category Name:</label>
				</td>
				<td>
					<input type="text" name="categoryName" id="categoryName" placeholder="Enter category name"
					       required>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="btnSaveCategory" value="Save">
					<input type="reset" value="Clear">
				</td>
			</tr>
		</table>

	</fieldset>
</form>
    <form action="product_entry.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Product Entry</legend>
            <table align="center" width="500">
                <tr>
                    <td>
                        <label for="productName">Product Name:</label>
                    </td>
                    <td>
                        <input type="text" name="productName" id="productName" placeholder="Enter your product name"
                               required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productPrice">Product Amount:</label>
                    </td>
                    <td>
                        <input type="text" name="productAmount" id="productAmount" placeholder="Enter your product amount"
                               required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productQuantity">Product Quantity:</label>
                    </td>
                    <td>
                    <input type="text" name="productQuantity" id="productQuantity" placeholder="Enter your product quantity"
                               required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productImage1">Product Image 1:</label>
                    </td>
                    <td>
                        <input type="file" name="productImage1" id="productImage1" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productImage">Product Image 2:</label>
                    </td>
                    <td>
                        <input type="file" name="productImage2" id="productImage2" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productDescription">Product Description:</label>
                    </td>
                    <td>
                        <textarea name="productDescription" id="productDescription" cols="30" rows="10"
                                  placeholder="Enter your product description" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productType">Product Type:</label>
                    </td>
                    <td>
                        <select name="productType">
                            <option>Choose Type</option>
                            <?php
                            $sql = "SELECT * FROM product_type";
                            $result = mysqli_query($connection, $sql);
                            $count = mysqli_num_rows($result);
                            if($count > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $typeID = $row['id'];
                                    $typeName = $row['productType'];
                                    echo '<option value="'.$typeID.'">'."$typeID - $typeName".'</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnSave" value="Save">
                        <input type="reset" value="Clear">
                    </td>
                </tr>
            </table>

        </fieldset>
    </form>
</body>
</html>