<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['cid'])) {
    echo "<script>alert('Please login first');</script>";
    echo "<script>window.location='signin.php'</script>";
    exit();
}
$GLOBALS['title'] = "HGE - Shopping Cart";
include 'components/header.php';
include 'db/connect.php';
include 'Shopping_Cart_Functions.php';
if (isset($_REQUEST['Action'])) {
    $Action = $_REQUEST['Action'];
    if ($Action == 'Remove') {
        $productId = $_REQUEST['productId'];
        RemoveShoppingCart($productId);
    } elseif ($Action == 'Buy') {
        $txtProductId = $_REQUEST['txtProductID'];
        $txtBuyQty = $_REQUEST['txtBuyQuantity'];
        AddShoppingCart($txtProductId, $txtBuyQty);
    } else {
        ClearShoppingCart();
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
									<li class="is-marked">

										<a href="Shopping_Cart.php">Shopping Cart</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section 1 ======-->

			<!--====== Section 2 ======-->
			<div class="u-s-p-b-60">

				<!--====== Section Intro ======-->
				<div class="section__intro u-s-m-b-60">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="section__text-wrap">
									<h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Intro ======-->


				<!--====== Section Content ======-->
				<div class="section__content">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <?php
                                if (!isset($_SESSION['ShoppingCart']) || $_SESSION['ShoppingCart'] == null) {?>
								<div class="row">
									<div class="col-lg-12">
										<div class="section__text-wrap">
	                                <span class="section__heading u-c-silver">SHOPPING CART IS EMPTY</span>
										</div>
									</div>
								</div>
                                <?php } else {
                                    ?>
									<div class="table-responsive">
										<table class="table-p">
											<tbody>
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
												<!--====== Row ======-->
												<tr>
													<td>
														<div class="table-p__box">
															<div class="table-p__img-wrap">

																<img class="u-img-fluid"
																     src="<?php echo $productImage; ?>"
																     alt="<?php echo $productName; ?>">
															</div>
															<div class="table-p__info">

                                                            <span class="table-p__name">

                                                                <a href="product-detail.php?productId=<?php echo $productID; ?>"><?php echo $productName; ?></a></span>

																<span class="table-p__category">

                                                                <?php echo $productCategory; ?></span>
																<ul class="table-p__variant-list">
																	<li>

																		<span>Price: <?php echo number_format($productPrice) . " MMK" ?> </span>
																	</li>
																	<li>

																		<span>Quantity: <?php echo $productQuantity ?></span>
																	</li>
																</ul>
															</div>
														</div>
													</td>
													<td>
														<span class="table-p__price">Amount</span>
														<br>
														<span class="table-p__price"><?php echo $subTotal; ?></span>
													</td>
													<td>
														<div class="table-p__input-counter-wrap">
															<span class="table-p__price">Quantity</span>
															<!--====== Input Counter ======-->
															<div class="input-counter">

																<input class="input-counter__text input-counter--text-primary-style"
																       type="text"
																       value="<?php echo $productQuantity ?>" disabled>
															</div>
															<!--====== End - Input Counter ======-->
														</div>
													</td>
													<td>
														<div class="table-p__del-wrap">

															<a class="far fa-trash-alt table-p__delete-link"
															   href="Shopping_Cart.php?Action=Remove&productId=<?php echo $productID; ?>"></a>
														</div>
													</td>
												</tr>    <!--====== End - Row ======-->
                                            <?php } ?>
											<tr>
												<td>
													<div class="table-p__box"></div>
												</td>
												<td>
													<span class="table-p__price">Total Quantity</span>
												</td>
												<td>
													<span class="table-p__price"><?php echo CalculateTotalQuantity() ?></span>
												</td>
												<td></td>
											</tr>
											</tbody>
										</table>
									</div>
                                    <?php
                                }
                                ?>
							</div>
							<div class="col-lg-12">
								<div class="route-box">
									<div class="route-box__g1">

										<a class="route-box__link" href="gallery.php"><i
													class="fas fa-long-arrow-alt-left"></i>

											<span>CONTINUE SHOPPING</span></a></div>
									<div class="route-box__g2">

										<a class="route-box__link" href="Shopping_Cart.php?Action=ClearAll"><i
													class="fas fa-trash"></i>

											<span>CLEAR CART</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>
			<!--====== End - Section 2 ======-->
            <?php if (isset($_SESSION['ShoppingCart']) && $_SESSION['ShoppingCart'] != null) {
                ?>
				<!--====== Section 3 ======-->
				<div class="u-s-p-b-60">

					<!--====== Section Content ======-->
					<div class="section__content">
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
									<form class="f-cart" action="checkout.php">
										<div class="row">
											<div class="col-lg-4 col-md-6 u-s-m-b-30"></div>
											<div class="col-lg-4 col-md-6 u-s-m-b-30"></div>
											<div class="col-lg-4 col-md-6 u-s-m-b-30">
												<div class="f-cart__pad-box">
													<div class="u-s-m-b-30">
														<table class="f-cart__table">
															<tbody>
															<tr>
																<td>VAT(5%)</td>
																<td><?php echo number_format(CalculateVAT()) . " MMK" ?></td>
															</tr>
															<tr>
																<td>SUBTOTAL</td>
																<td><?php echo number_format(CalculateTotalAmount()) . " MMK"; ?></td>
															</tr>
															<tr>
																<td>GRAND TOTAL</td>
																<td><?php echo number_format(CalculateVAT() + CalculateTotalAmount()) . " MMK"; ?></td>
															</tr>
															</tbody>
														</table>
													</div>
													<div>

														<button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO
															CHECKOUT
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--====== End - Section Content ======-->
				</div>                <!--====== End - Section 3 ======-->
                <?php
            } ?>
		</div>
	</div>

	<!--====== Main Footer ======-->
<?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
<?php include 'components/scripts.php'; ?>