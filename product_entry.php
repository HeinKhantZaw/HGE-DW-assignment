<?php
include 'db/connect.php';
if (isset($_POST['btnSaveCategory'])) {
    $categoryName = $_POST['categoryName'];
    $query = "INSERT INTO `category`(`categoryName`) VALUES ('$categoryName')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Category added successfully');</script>";
        echo "<script>window.open('product_entry.php', '_self')</script>";
    } else {
        echo "<script>alert('Category could not be added');</script>";
        echo "<script>window.open('product_entry.php', '_self')</script>";
    }
}
if (isset($_POST['btnSave'])) {
    $productName = mysqli_real_escape_string($connection, $_POST['productName']);
	// Add mysqli_real_escape_string() to all $_POST variables
    $description = mysqli_real_escape_string($connection, $_POST['productDescription']);
	$productPrice = mysqli_real_escape_string($connection, $_POST['productPrice']);
	$productQuantity = mysqli_real_escape_string($connection, $_POST['productQuantity']);

    $productStatus = $_POST['productStatus'];
    $productTypeId = $_POST['categoryId'];

    $folder = 'images/product/';
    $productImage = $_FILES['productImage1']['name'];
    $target = $folder . basename($_FILES['productImage1']['name']);
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['productImage1']['tmp_name'], $target);
    }
    if ($_FILES['productImage2']['name'] != null) {
        $productImage .= ',' . $_FILES['productImage2']['name'];
        $target = $folder . basename($_FILES['productImage2']['name']);
        $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['productImage2']['tmp_name'], $target);
        }
    }
    if ($_FILES['productImage3']['name'] != null) {
        $productImage .= ',' . $_FILES['productImage3']['name'];
        $productImage3 = $_FILES['productImage3']['name'];
        $target = $folder . basename($_FILES['productImage3']['name']);
        $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['productImage3']['tmp_name'], $target);
        }
    }
    if ($_FILES['productImage4']['name'] != null) {
        $productImage .= ',' . $_FILES['productImage4']['name'];
        $productImage4 = $_FILES['productImage4']['name'];
        $target = $folder . basename($_FILES['productImage4']['name']);
        $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['productImage4']['tmp_name'], $target);
        }
    }
    $select = "SELECT * FROM `product` WHERE `productName` = '$productName'";
    $result = mysqli_query($connection, $select);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script> alert(`Product " . $productName . " already exists`)</script>";
        echo "<script>window.open('product_entry.php', '_self')</script>";
    } else {
        $query = "INSERT INTO `product` (productName, productPrice, productQuantity, productImage, productDescription, productStatus, categoryID) VALUES ('$productName', '$productPrice', '$productQuantity', '$productImage', '$description', '$productStatus', '$productTypeId')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "<script>alert('Product added successfully')</script>";
            echo "<script>window.open('product_entry.php', '_self')</script>";
        } else {
			echo "$result";
            die("Query failed: " . mysqli_error($connection));
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
					<input type="text" name="categoryName" id="categoryName" placeholder="Enter category name" required>
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
					<label for="productPrice">Product Price:</label>
				</td>
				<td>
					<input type="number" name="productPrice" id="productPrice" placeholder="Enter your product price"
					       required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="productQuantity">Product Quantity:</label>
				</td>
				<td>
					<input type="number" name="productQuantity" id="productQuantity"
					       placeholder="Enter your product quantity" required>
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
					<label for="productImage2">Product Image 2:</label>
				</td>
				<td>
					<input type="file" name="productImage2" id="productImage2">
				</td>
			</tr>
			<tr>
				<td>
					<label for="productImage3">Product Image 3:</label>
				</td>
				<td>
					<input type="file" name="productImage3" id="productImage3">
				</td>
			</tr>
			<tr>
				<td>
					<label for="productImage4">Product Image 4:</label>
				</td>
				<td>
					<input type="file" name="productImage4" id="productImage4">
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
					<label for="productDescription">Product Status:</label>
				</td>
				<td>
					<select name="productStatus" id="productStatus">
						<option value="New">New</option>
						<option value="Second Hand">Second Hand</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="categoryId">Product Type:</label>
				</td>
				<td>
					<select name="categoryId">
						<option>Choose Type</option>
                        <?php
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($connection, $sql);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $typeID = $row['id'];
                                $typeName = $row['categoryName'];
                                echo '<option value="' . $typeID . '">' . "$typeID - $typeName" . '</option>';
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