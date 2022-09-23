<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$GLOBALS['title'] = "HGE - Checkout";
include 'components/header.php';
include 'db/connect.php';
include 'AutoID_Functions.php';
include 'Shopping_Cart_Functions.php';

if (!isset($_SESSION['cid'])) {
    echo "<script>alert('Please login first');</script>";
    echo "<script>window.location='signin.php'</script>";
    exit();
}
$id = AutoID("order", "orderId", "ORD-", 6);
$cusid = $_SESSION['cid'];
$query = "SELECT * FROM `customer` WHERE `id` = '$cusid'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$firstName = $row['customerFirstName'];
$lastName = $row['customerLastName'];
$email = $row['customerEmail'];
$address = $row['customerAddress'];
$phone = $row['customerPhone'];

if (isset($_POST['btnConfirm'])) {
    $status = "Pending";
    $txtOrderID = $_POST['txtOrderID'];
    $txtOrderDate = $_POST['txtOrderDate'];
    $txtTotalAmount = $_POST['txtTotalAmount'];
    $txtVAT = $_POST['txtVAT'];
    $txtGrandTotal = $_POST['txtGrandTotal'];
    $txtTotalQuantity = $_POST['txtTotalQuantity'];
    $txtRemark = $_POST['txtRemark'];
    $rdoPaymentType = $_POST['rdoPaymentType'];
    $rdoDeliveryType = $_POST['rdoDeliveryType'];
    if ($rdoDeliveryType == 1) {
        $txtDeliveryAddress = $_POST['txtDeliveryAddress'];
        $txtDeliveryPhone = $_POST['txtDeliveryPhone'];
    } else {
        $txtDeliveryAddress = $address;
        $txtDeliveryPhone = $phone;
    }
    $date = date('m/d/Y h:i:s a', time());
    $ODquery = "INSERT INTO `order`(orderId, customerId, orderDate, orderStatus) VALUES ('$txtOrderID', '$cusid', '$date', '$status')";
    $result = mysqli_query($connection, $ODquery);
    if ($result) {
        $size = count($_SESSION['ShoppingCartFunctions']);
        for ($i = 0; $i < $size; $i++) {
            $productId = $_SESSION['ShoppingCartFunctions'][$i]['productId'];
            $productAmount = $_SESSION['ShoppingCartFunctions'][$i]['productAmount'];
            $BuyQty = $_SESSION['ShoppingCartFunctions'][$i]['BuyQty'];
            $query = "INSERT INTO `orderdetails`(orderId, productId, orderLocation, orderPhone, quantity, price, tax, total, remark, paymentMethod) 
VALUES ('$txtOrderID', '$productId', '$txtTotalAmount', '$txtVAT', '$txtGrandTotal', '$txtTotalQuantity', '$txtRemark', '$rdoPaymentType', '', '', '$status', '$cusid')";
            $ODresult = mysqli_query($connection, $query);
            if (!$ODresult) {
                echo "<script>alert('Order failed in order details')</script>";
                exit();
            }
            $update = "UPDATE `product` SET productQuantity = productQuantity - '$BuyQty' WHERE productId = '$productId'";
            $updateResult = mysqli_query($connection, $update);
            if (!$updateResult) {
                echo "<script>alert('Order failed in update')</script>";
                exit();
            } else {
                unset($_SESSION['ShoppingCartFunctions']);
            }
        }
        echo "<script>alert('Order placed successfully');</script>";
        echo "<script>window.location='product_display.php'</script>";
    } else {
        echo "<script>alert('Order failed in order insert');</script>";
    }
} ?>
<div id="app"><!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
	<!--====== End - Main Header ======-->
	<div class="app-content">
		<!--====== Section 1 ======-->
		<div class="u-s-p-y-60">
			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="breadcrumb">
						<div class="breadcrumb__wrap">
							<ul class="breadcrumb__list">
								<li class="has-separator">

									<a href="index.php">Home</a></li>
								<li class="is-marked">

									<a href="checkout.php">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->

		<!--====== Section 2 ======-->
		<div class="u-s-p-b-60">
			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="checkout-f">
						<div class="row">
							<div class="col-lg-6">
								<h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
								<form class="checkout-f__delivery">
									<div class="u-s-m-b-30">
										<div class="u-s-m-b-15">

											<!--====== Check Box ======-->
											<div class="check-box">

												<input type="checkbox" id="get-address" checked aria-checked="true"
												       onclick="toggleInput()">
												<div class="check-box__state check-box__state--primary">

													<label class="check-box__label" for="get-address">Use default
														shipping and billing address from account</label></div>
											</div>
											<!--====== End - Check Box ======-->
										</div>

										<!--====== First Name, Last Name ======-->
										<div class="gl-inline">
											<div class="u-s-m-b-15">

												<label class="gl-label" for="billing-fname">FIRST NAME *</label>

												<input class="input-text input-text--primary-style disable-input"
												       type="text" id="billing-fname" data-bill=""
												       value="<?php echo $firstName; ?>"
												       placeholder="Enter your first name" disabled></div>
											<div class="u-s-m-b-15">

												<label class="gl-label" for="billing-lname">LAST NAME *</label>

												<input class="input-text input-text--primary-style disable-input"
												       type="text" id="billing-lname" data-bill=""
												       value="<?php echo $lastName; ?>"
												       placeholder="Enter your last name" disabled></div>
										</div>
										<!--====== End - First Name, Last Name ======-->


										<!--====== E-MAIL ======-->
										<div class="u-s-m-b-15">

											<label class="gl-label" for="billing-email">E-MAIL *</label>

											<input class="input-text input-text--primary-style disable-input"
											       type="text" id="billing-email" data-bill=""
											       value="<?php echo $email; ?>" placeholder="Enter your email"
											       disabled></div>
										<!--====== End - E-MAIL ======-->


										<!--====== PHONE ======-->
										<div class="u-s-m-b-15">

											<label class="gl-label" for="billing-phone">PHONE *</label>

											<input class="input-text input-text--primary-style" type="text"
											       value="<?php echo $phone; ?>" id="billing-phone" data-bill=""
											       pattern="[0-9]{9,}" placeholder="Enter your phone" disabled></div>
										<!--====== End - PHONE ======-->


										<!--====== Street Address ======-->
										<div class="u-s-m-b-15">

											<label class="gl-label" for="billing-street">STREET ADDRESS *</label>

											<input class="input-text input-text--primary-style" type="text"
											       value="<?php echo $address; ?>" id="billing-street"
											       placeholder="House name and street name" data-bill="" disabled></div>
										<!--====== End - Street Address ======-->

										<div class="u-s-m-b-10">

											<label class="gl-label" for="order-note">ORDER NOTE (REMARK)</label><textarea
													class="text-area text-area--primary-style"
													id="order-note"></textarea></div>

									</div>
								</form>

								<div class="o-summary__section u-s-m-b-30">
									<div class="o-summary__box">
										<h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
										<form class="checkout-f__payment">
											<div class="u-s-m-b-10">

												<!--====== Radio Box ======-->
												<div class="radio-box">

													<input type="radio" id="cash-on-delivery" name="payment" value="COD" checked>
													<div class="radio-box__state radio-box__state--primary">

														<label class="radio-box__label" for="cash-on-delivery">Cash
															on Delivery</label></div>
												</div>
												<!--====== End - Radio Box ======-->

												<span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery.</span>
											</div>
											<div class="u-s-m-b-10">
												<!--====== Radio Box ======-->
												<div class="radio-box">

													<input type="radio" id="mpu-payment" name="payment" value="MPU">
													<div class="radio-box__state radio-box__state--primary">

														<label class="radio-box__label" for="mpu-payment">MPU</label></div>
												</div>
												<!--====== End - Radio Box ======-->

												<span class="gl-text u-s-m-t-6">Make payment with your MPU card</span>
											</div>
											<div class="u-s-m-b-10">

												<!--====== Radio Box ======-->
												<div class="radio-box">

													<input type="radio" id="visa-payment" name="payment" value="VISA">
													<div class="radio-box__state radio-box__state--primary">

														<label class="radio-box__label" for="visa-payment">VISA</label></div>
												</div>
												<!--====== End - Radio Box ======-->

												<span class="gl-text u-s-m-t-6">Make payment with your VISA card</span>
											</div>
											<div class="u-s-m-b-10">

												<!--====== Radio Box ======-->
												<div class="radio-box">

													<input type="radio" id="master-payment" name="payment" value="Master">
													<div class="radio-box__state radio-box__state--primary">

														<label class="radio-box__label" for="master-payment">Master</label></div>
												</div>
												<!--====== End - Radio Box ======-->

												<span class="gl-text u-s-m-t-6">Make payment with your Master card</span>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<h1 class="checkout-f__h1">ORDER SUMMARY</h1>

								<!--====== Order Summary ======-->
								<div class="o-summary">
									<div class="o-summary__section u-s-m-b-30">
										<div class="o-summary__item-wrap gl-scroll">
											<div class="o-card">
												<div class="o-card__flex">
													<div class="o-card__img-wrap">

														<img class="u-img-fluid"
														     src="images/product/electronic/product3.jpg" alt="">
													</div>
													<div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>

														<span class="o-card__quantity">Quantity x 1</span>

														<span class="o-card__price">$150.00</span></div>
												</div>

												<a class="o-card__del far fa-trash-alt"></a>
											</div>
											<div class="o-card">
												<div class="o-card__flex">
													<div class="o-card__img-wrap">

														<img class="u-img-fluid"
														     src="images/product/electronic/product18.jpg" alt="">
													</div>
													<div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.html">Nikon DSLR Camera 4k</a></span>

														<span class="o-card__quantity">Quantity x 1</span>

														<span class="o-card__price">$150.00</span></div>
												</div>

												<a class="o-card__del far fa-trash-alt"></a>
											</div>
											<div class="o-card">
												<div class="o-card__flex">
													<div class="o-card__img-wrap">

														<img class="u-img-fluid" src="images/product/women/product8.jpg"
														     alt=""></div>
													<div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.html">New Dress D Nice Elegant</a></span>

														<span class="o-card__quantity">Quantity x 1</span>

														<span class="o-card__price">$150.00</span></div>
												</div>

												<a class="o-card__del far fa-trash-alt"></a>
											</div>
											<div class="o-card">
												<div class="o-card__flex">
													<div class="o-card__img-wrap">

														<img class="u-img-fluid" src="images/product/men/product8.jpg"
														     alt=""></div>
													<div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

														<span class="o-card__quantity">Quantity x 1</span>

														<span class="o-card__price">$150.00</span></div>
												</div>

												<a class="o-card__del far fa-trash-alt"></a>
											</div>
										</div>
									</div>
									<div class="o-summary__section u-s-m-b-30">
										<div class="o-summary__box">
											<h1 class="checkout-f__h1">SHIPPING & BILLING</h1>
											<div class="ship-b">

												<span class="ship-b__text">Ship to:</span>
												<div class="ship-b__box u-s-m-b-10">
													<p class="ship-b__p">No.214, Sanchaung Street, Yangon, Myanmar
														(Burma) (+0) 900901904</p>

													<a class="ship-b__edit btn--e-transparent-platinum-b-2"
													   data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
												</div>
												<div class="ship-b__box">

													<span class="ship-b__text">Bill to default billing address</span>

													<a class="ship-b__edit btn--e-transparent-platinum-b-2"
													   data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
												</div>
											</div>
										</div>
									</div>
									<div class="o-summary__section u-s-m-b-30">
										<div class="o-summary__box">
											<table class="o-summary__table">
												<tbody>
												<tr>
													<td>SHIPPING</td>
													<td>$4.00</td>
												</tr>
												<tr>
													<td>TAX</td>
													<td>$0.00</td>
												</tr>
												<tr>
													<td>SUBTOTAL</td>
													<td>$379.00</td>
												</tr>
												<tr>
													<td>GRAND TOTAL</td>
													<td>$379.00</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!--====== End - Order Summary ======-->
								<div>

									<button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
	</div>
</div>    <!--====== Main Footer ======-->
<?php include 'components/footer.php'; ?>
<!--====== Modal Section ======-->
<?php include 'components/scripts.php'; ?>

<script>
    $defaultAddressCheckbox = $('#get-address');
    $collectionFormBill = $('[data-bill]');

    // Default Billing Address
    function toggleInput() {
        if ($defaultAddressCheckbox.length) {
            $defaultAddressCheckbox.change(function () {
                if (this.checked) {
                    $collectionFormBill.prop("disabled", true);
                    $('#make-default-address').prop("checked", false);
                    $('#billing-fname').val("<?php echo $firstName;?>");
                    $('#billing-lname').val("<?php echo $lastName;?>");
                    $('#billing-email').val("<?php echo $email;?>");
                    $('#billing-phone').val("<?php echo $phone;?>");
                    $('#billing-street').val("<?php echo $address;?>");


                } else {
                    $collectionFormBill.prop("disabled", false);
                }
            });

        }
    };
</script>
