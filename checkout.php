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
    $txtDeliveryAddress = $_POST['txtDeliveryAddress'];
    $txtDeliveryPhone = $_POST['txtDeliveryPhone'];
    $txtRemark = $_POST['txtRemark'];
    $txtVAT = $_POST['txtVAT'];
    $txtSubTotal = $_POST['txtSubTotal'];
    $txtGrandTotal = $_POST['txtGrandTotal'];
    $paymentMethod = $_POST['PaymentType'];
    $date = date('Y-m-d', time());
    $orderQuery = "INSERT INTO `order`(orderId, customerId, orderDate, orderLocation, orderPhone, remark, subTotal, tax, grandTotal, paymentMethod, orderStatus) 
VALUES ('$txtOrderID', '$cusid', '$date', '$txtDeliveryAddress', '$txtDeliveryPhone','$txtRemark', '$txtSubTotal','$txtVAT', '$txtGrandTotal', '$paymentMethod', '$status')";
    $result = mysqli_query($connection, $orderQuery);
    if ($result) {

        $size = count($_SESSION['ShoppingCart']);
        for ($i = 0; $i < $size; $i++) {
            $productId = $_SESSION['ShoppingCart'][$i]['productId'];
            $BuyQty = $_SESSION['ShoppingCart'][$i]['BuyQty'];
            $productPrice = $_SESSION['ShoppingCart'][$i]['productPrice'];
            $total = $productPrice * $BuyQty;
            $query = "INSERT INTO `orderdetails`(orderId, productId, quantity, price, total, status) 
VALUES ('$txtOrderID', '$productId', '$BuyQty', '$productPrice', '$total', '$status' )";
            $ODresult = mysqli_query($connection, $query);
            if (!$ODresult) {
                echo mysqli_error($connection);
                echo '<div class="message-info danger">
						<strong>Order Failed</strong> - Something went wrong in order details.
					</div>';
                exit();
            }
            $update = "UPDATE `product` SET productQuantity = productQuantity - '$BuyQty' WHERE id = '$productId'";
            $updateResult = mysqli_query($connection, $update);
            if (!$updateResult) {
                echo "<script>alert('Order failed in update')</script>";
                exit();
            }
        }
        unset($_SESSION['ShoppingCart']);
        echo '<div class="message-info success">
						<strong>Order Successful</strong> - We will deliver the products to you soon!
					</div>';
    } else {
        echo mysqli_error($connection);
        echo '<div class="message-info danger">
						<strong>Order Failed</strong> - Something went wrong.
					</div>';
    }
}
?>
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
								<li class="has-separator">

									<a href="Shopping_Cart.php">Shopping Cart</a></li>
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
												<input class="hide" id="customerID" value="<?php echo $cusid ?>">
												<label class="gl-label" for="billing-fname">FIRST NAME</label>

												<input class="input-text input-text--primary-style" type="text"
												       id="billing-fname" value="<?php echo $firstName; ?>"
												       placeholder="Enter your first name" disabled></div>
											<div class="u-s-m-b-15">

												<label class="gl-label" for="billing-lname">LAST NAME</label>

												<input class="input-text input-text--primary-style" type="text"
												       id="billing-lname" value="<?php echo $lastName; ?>"
												       placeholder="Enter your last name" disabled></div>
										</div>
										<!--====== End - First Name, Last Name ======-->


										<!--====== E-MAIL ======-->
										<div class="u-s-m-b-15">

											<label class="gl-label" for="billing-email">E-MAIL</label>

											<input class="input-text input-text--primary-style" type="text"
											       id="billing-email" value="<?php echo $email; ?>"
											       placeholder="Enter your email" disabled></div>
										<!--====== End - E-MAIL ======-->


										<!--====== PHONE ======-->
										<div class="u-s-m-b-15">

											<label class="gl-label" for="billing-phone">PHONE *</label>

											<input class="input-text input-text--primary-style" type="text"
											       value="<?php echo $phone; ?>" id="txtDeliveryPhone" data-bill=""
											       pattern="[0-9]{9,}" placeholder="Enter your phone" disabled></div>
										<!--====== End - PHONE ======-->


										<!--====== Street Address ======-->
										<div class="u-s-m-b-15">

											<label class="gl-label" for="billing-street">STREET ADDRESS *</label>

											<input class="input-text input-text--primary-style" type="text"
											       value="<?php echo $address; ?>" id="txtDeliveryAddress"
											       placeholder="House name and street name" data-bill="" disabled></div>
										<!--====== End - Street Address ======-->

										<div class="u-s-m-b-10">

											<label class="gl-label" for="order-note">ORDER NOTE
												(REMARK)</label><textarea class="text-area text-area--primary-style"
											                              id="txtRemark"></textarea></div>

									</div>
								</form>

								<div class="o-summary__section u-s-m-b-30">
									<div class="o-summary__box">
										<h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
										<form class="form-card">
											<div class="row justify-content-center mb-4 radio-group">
												<div class="col-sm-3 col-5">
													<div class='radio selected mx-auto' data-value="cod"
													     onclick="hidePaymentTable()">
														<img class="fit-image" src="https://i.imgur.com/Df0I7cm.jpg"
														     width="105px" height="45px">
													</div>
												</div>
												<div class="col-sm-3 col-5">
													<div class='radio mx-auto' data-value="visa"
													     onclick="showPaymentTable()">
														<img class="fit-image" src="https://i.imgur.com/Ff2cq3F.jpg"
														     width="105px" height="45px">
													</div>
												</div>
												<div class="col-sm-3 col-5">
													<div class='radio mx-auto' data-value="master"
													     onclick="showPaymentTable()">
														<img class="fit-image" src="https://i.imgur.com/WIAP9Ku.jpg"
														     width="105px" height="45px">
													</div>
												</div>
												<div class="col-sm-3 col-5">
													<div class='radio mx-auto' data-value="mpu"
													     onclick="showPaymentTable()">
														<img class="fit-image" src="https://i.imgur.com/OyCY3P6.png"
														     width="105px" height="45px">
													</div>
												</div>
												<br>
											</div>
											<div id="PaymentTable">
												<div class="row justify-content-center">
													<div class="col-12">
														<div class="input-group">
															<label for="cardName">Name</label>
															<input id="cardName" type="text" name="Name"
															       placeholder="John Doe"/>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-12">
														<div class="input-group">
															<label for="cr_no">Card Number</label>
															<input type="text" id="cr_no" name="card-no"
															       placeholder="0000 0000 0000 0000" minlength="19"
															       maxlength="19"/>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-12">
														<div class="row">
															<div class="col-6">
																<div class="input-group">
																	<label for="exp">Expiry Date</label>
																	<input type="text" id="exp" name="expdate"
																	       placeholder="MM/YY" minlength="5"
																	       maxlength="5"/>
																</div>
															</div>
															<div class="col-6">
																<div class="input-group">
																	<label for="cardCVV">CVV</label>
																	<input type="password" name="cvv" id="cardCVV"
																	       placeholder="&#9679;&#9679;&#9679;"
																	       minlength="3" maxlength="3"/>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

							</div>
							<div class="col-lg-6">
								<h1 class="checkout-f__h1">ORDER SUMMARY</h1>

								<!--====== Order Summary ======-->
                                <?php if (isset($_SESSION['ShoppingCart'])) { ?>
									<div class="o-summary">
										<div class="o-summary__section u-s-m-b-30">
											<div class="o-summary__item-wrap gl-scroll">
                                                <?php
                                                $size = count($_SESSION['ShoppingCart']);
                                                for ($i = 0; $i < $size; $i++) {
                                                    $productID = $_SESSION['ShoppingCart'][$i]['productId'];
                                                    $productName = $_SESSION['ShoppingCart'][$i]['productName'];
                                                    $productPrice = $_SESSION['ShoppingCart'][$i]['productPrice'];
                                                    $productCategory = $_SESSION['ShoppingCart'][$i]['productCategory'];
                                                    $productQuantity = $_SESSION['ShoppingCart'][$i]['BuyQty'];
                                                    $productImage = $_SESSION['ShoppingCart'][$i]['productImage'];
                                                    $subTotal = number_format($productPrice * $productQuantity) . " MMK";
                                                    ?>
													<div class="o-card">
														<div class="o-card__flex">
															<div class="o-card__img-wrap">

																<img class="u-img-fluid"
																     src="<?php echo $productImage; ?>"
																     alt="<?php echo $productName; ?>">
															</div>
															<div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.php?productId=<?php echo $productID; ?>"><?php echo $productName; ?></a></span>

																<span class="o-card__quantity">Quantity x <?php echo $productQuantity ?></span>

																<span class="o-card__price"> <?php echo number_format($productPrice) . " MMK" ?> </span>
															</div>
														</div>
													</div>
                                                <?php } ?>
											</div>
										</div>

										<div class="o-summary__section u-s-m-b-30">
											<div class="o-summary__box">
												<table class="o-summary__table">
													<tbody>
													<tr>
														<td>ORDER ID</td>
														<td id="txtOrderID"><?php echo AutoID('order', 'orderId', 'ORD-', 6); ?></td>
													</tr>
													<tr>
														<td>ORDER DATE</td>
														<td id="txtOrderDate"><?php echo date('d-m-Y'); ?></td>
													</tr>
													<tr>
														<td>SUBTOTAL</td>
														<input id="txtSubTotal" hidden
														       value="<?php echo CalculateTotalAmount(); ?>"/>
														<td><?php echo number_format(CalculateTotalAmount()) . " MMK"; ?></td>
													</tr>
													<tr>
														<td>TAX(5%)</td>
														<input id="txtVAT" hidden
														       value="<?php echo CalculateVAT(); ?>"/>
														<td id="txtVAT"><?php echo number_format(CalculateVAT()) . " MMK" ?></td>
													</tr>
													<tr>
														<td>GRAND TOTAL</td>
														<input id="txtGrandTotal" hidden
														       value="<?php echo CalculateTotalAmount() + CalculateVAT(); ?>"/>
														<td id="txtGrandTotal"><?php echo number_format(CalculateVAT() + CalculateTotalAmount()) . " MMK"; ?></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>                                <!--====== End - Order Summary ======-->

									<div>
										<button class="btn btn--e-brand-b-2" id="placeOrder">PLACE ORDER
										</button>
									</div>
                                <?php } else if (!isset($_SESSION['ShoppingCart'])) {
                                    echo "<h3 class='u-s-m-b-30'>Your Shopping Cart is Empty</h3>";
                                } ?>
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
    }

    $(document).ready(function () {
        let cardNum = document.getElementById('cr_no');
        cardNum.onkeyup = function (e) {
            if (this.value == this.lastValue) return;
            let caretPosition = this.selectionStart;
            let sanitizedValue = this.value.replace(/[^0-9]/gi, '');
            let parts = [];
            for (let i = 0, len = sanitizedValue.length; i < len; i += 4) {
                parts.push(sanitizedValue.substring(i, i + 4));
            }
            for (let i = caretPosition - 1; i >= 0; i--) {
                let c = this.value[i];
                if (c < '0' || c > '9') {
                    caretPosition--;
                }
            }
            caretPosition += Math.floor(caretPosition / 4);
            this.value = this.lastValue = parts.join('-');
            this.selectionStart = this.selectionEnd = caretPosition;
        }
//For Date formatted input
        let expDate = document.getElementById('exp');
        expDate.onkeyup = function (e) {
            if (this.value == this.lastValue) return;
            let caretPosition = this.selectionStart;
            let sanitizedValue = this.value.replace(/[^0-9]/gi, '');
            let parts = [];
            for (let i = 0, len = sanitizedValue.length; i < len; i += 2) {
                parts.push(sanitizedValue.substring(i, i + 2));
            }
            for (let i = caretPosition - 1; i >= 0; i--) {
                let c = this.value[i];
                if (c < '0' || c > '9') {
                    caretPosition--;
                }
            }
            caretPosition += Math.floor(caretPosition / 2);
            this.value = this.lastValue = parts.join('/');
            this.selectionStart = this.selectionEnd = caretPosition;
        }
// Radio button
        $('.radio-group .radio').click(function () {
            $(this).parent().parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $('#placeOrder').click(
            function () {
                let txtOrderID = $('#txtOrderID').html();
                let txtSubTotal = $('#txtSubTotal').val();
                let txtVAT = $('#txtVAT').val();
                let txtGrandTotal = $('#txtGrandTotal').val();
                let PaymentType = $('.radio.selected').data("value");
                let txtDeliveryAddress = $('#txtDeliveryAddress').val();
                let txtDeliveryPhone = $('#txtDeliveryPhone').val();
                let txtRemark = $('#txtRemark').val() || "-";

                let form = $(document.createElement('form'));
                $(form).attr("action", "checkout.php");
                $(form).attr("method", "POST");
                $(form).css("display", "none");

                let input_employee_name = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtOrderID")
                    .val(txtOrderID);
                $(form).append($(input_employee_name));

                let input_sub_total = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtSubTotal")
                    .val(txtSubTotal);

                $(form).append($(input_sub_total));

                let input_vat = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtVAT")
                    .val(txtVAT);
                $(form).append($(input_vat));

                let input_grand_total = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtGrandTotal")
                    .val(txtGrandTotal);

                $(form).append($(input_grand_total));

                let input_payment_type = $("<input>")
                    .attr("type", "text")
                    .attr("name", "PaymentType")
                    .val(PaymentType);
                $(form).append($(input_payment_type));

                let input_delivery_address = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtDeliveryAddress")
                    .val(txtDeliveryAddress);

                $(form).append($(input_delivery_address));

                let input_delivery_phone = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtDeliveryPhone")
                    .val(txtDeliveryPhone);

                $(form).append($(input_delivery_phone));

                let input_remark = $("<input>")
                    .attr("type", "text")
                    .attr("name", "txtRemark")
                    .val(txtRemark);
                $(form).append($(input_remark));

                let input_confirm = $("<input>")
                    .attr("type", "text")
                    .attr("name", "btnConfirm")
                    .val("true");
                $(form).append($(input_confirm));

                form.appendTo(document.body);
                $(form).submit();
            }
        );
    })

    function showPaymentTable() {
        document.getElementById('PaymentTable').style.display = "block";
    }

    function hidePaymentTable() {
        document.getElementById("PaymentTable").style.display = "none";
    }

    setTimeout(function () {
        $(".message-info").fadeOut("slow");
    }, 2000);
</script>

