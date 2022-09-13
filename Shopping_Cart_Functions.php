<?php  

function AddShoppingCart($productId,$BuyQty)
{
	include('connect.php');
	$query="SELECT * FROM Product WHERE productId=$productId";
	$result=mysqli_query($connection,$query);
	$count=mysqli_num_rows($result);

	if($count < 1) 
	{
		echo "<p>Product ID not found.</p>";
		exit();
	}
	$row=mysqli_fetch_array($result);
	$productName=$row['productName'];
	$productAmount=$row['productAmount'];
	$productImage1=$row['productImage1'];

	if($BuyQty < 1)
	{
		echo "<script>window.alert('Purchase Quantity Cannot be Zero (0)')</script>";
		echo "<script>window.location='Shopping_Cart.php'</script>";
		exit();
	}

	if(isset($_SESSION['ShoppingCartFunctions'])) 
	{
		$Index=IndexOf($productId);
		
		if($Index == -1) 
		{
			$size=count($_SESSION['ShoppingCartFunctions']);

			$_SESSION['ShoppingCartFunctions'][$size]['productId']=$productId;
			$_SESSION['ShoppingCartFunctions'][$size]['productName']=$productName;
			$_SESSION['ShoppingCartFunctions'][$size]['productAmount']=$productAmount;
			$_SESSION['ShoppingCartFunctions'][$size]['BuyQty']=$BuyQty;
			$_SESSION['ShoppingCartFunctions'][$size]['productImage1']=$productImage1;
		}
		else
		{
			$_SESSION['ShoppingCartFunctions'][$Index]['BuyQty']+=$BuyQty;
		}
	}
	else
	{
		$_SESSION['ShoppingCartFunctions']=array(); //Create Session Array

		$_SESSION['ShoppingCartFunctions'][0]['productId']=$productId;
		$_SESSION['ShoppingCartFunctions'][0]['productName']=$productName;
		$_SESSION['ShoppingCartFunctions'][0]['productAmount']=$productAmount;
		$_SESSION['ShoppingCartFunctions'][0]['BuyQty']=$BuyQty;
		$_SESSION['ShoppingCartFunctions'][0]['productImage1']=$productImage1;
	}
	echo "<script>window.location='Shopping_Cart.php'</script>";
}

function RemoveShoppingCart($productId)
{
	$Index=IndexOf($productId);
	unset($_SESSION['ShoppingCartFunctions'][$Index]);
	$_SESSION['ShoppingCartFunctions']=array_values($_SESSION['ShoppingCartFunctions']);

	echo "<script>window.location='Shopping_Cart.php'</script>";
}

function ClearShoppingCart()
{	
	unset($_SESSION['ShoppingCartFunctions']);
	echo "<script>window.location='Shopping_Cart.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	$size=count($_SESSION['ShoppingCartFunctions']);

	for($i=0;$i<$size;$i++) 
	{ 
		$productAmount=$_SESSION['ShoppingCartFunctions'][$i]['productAmount'];
		$BuyQty=$_SESSION['ShoppingCartFunctions'][$i]['BuyQty'];
		$TotalAmount+=($productAmount * $BuyQty);
	}
	return $TotalAmount;
}

function CalculateVAT()
{
	$VAT=0;
	$VAT=CalculateTotalAmount() * 0.05;

	return $VAT;
}
function CalculateTotalQuantity()
{
	$TotalQuantity=0;
	$size=count($_SESSION['ShoppingCartFunctions']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$BuyQty=$_SESSION['ShoppingCartFunctions'][$i]['BuyQty'];
		$TotalQuantity+=$BuyQty;
	}
	return $TotalQuantity;
}

function IndexOf($productId)
{
	if (!isset($_SESSION['ShoppingCartFunctions'])) 
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCartFunctions']);

	if ($size < 1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($productId == $_SESSION['ShoppingCartFunctions'][$i]['productId']) 
		{
			return $i;
		}
	}
	return -1;
}

?>