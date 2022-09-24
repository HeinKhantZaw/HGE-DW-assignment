<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$GLOBALS['title'] = "HGE - My Orders";
include 'components/header.php';
include 'db/connect.php';
$_SESSION['dashboardNav'] = 'order';

if (!isset($_SESSION['cname']) && $_SESSION['cname']) {
    echo "<script>window.open('signin.php', '_self')</script>";
    header("Location: login.php");
} else {
    $customerId = $_SESSION['cid'];
    $query = "SELECT * FROM `order` WHERE `customerId`= '$customerId' AND `orderId` = '$_GET[orderId]';";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $orderDetails = mysqli_fetch_assoc($result);
        $query = "SELECT * FROM `orderdetails` WHERE `orderId` = '$_GET[orderId]';";
        $result = mysqli_query($connection, $query);
        $orderDetails['orderItems'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
<!--====== Main App ======-->
<div id="app">
	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
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

									<a href="dashboard.php">Dashboard</a></li>
								<li class="has-separator">

									<a href="dashboard_order.php">My Orders</a></li>
								<li class="is-marked">

									<a href="dashboard_order_details.php?id=<?php echo $_GET['orderId']; ?>"><?php echo $_GET['orderId']; ?></a>
								</li>

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
				<div class="dash">
					<div class="container">
						<div class="row">
                            <?php include 'components/orders.php'; ?>
							<div class="col-lg-9 col-md-12">
								<h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
								<div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
									<div class="dash__pad-2">
										<div class="dash-l-r">
											<div>
												<div class="manage-o__text-2 u-c-secondary">
													Order <?php echo $_GET['orderId']; ?></div>
												<div class="manage-o__text u-c-silver">Placed
													on <?php echo $orderDetails['orderDate']; ?></div>
											</div>
											<div>
												<div class="manage-o__text-2 u-c-silver">Total:

													<span class="manage-o__text-2 u-c-secondary"><?php echo number_format($orderDetails['grandTotal']) . " MMK"; ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
									<div class="dash__pad-2">
										<div class="manage-o">

											<div class="manage-o__timeline">
												<div class="timeline-row">
													<div class="col-lg-4 u-s-m-b-30">
														<div class="timeline-step">
															<div class="timeline-l-i timeline-l-i--finish">

																<span class="timeline-circle"></span></div>

															<span class="timeline-text">Processing</span>
														</div>
													</div>
													<div class="col-lg-4 u-s-m-b-30">
														<div class="timeline-step">
															<div class="timeline-l-i timeline-l-i">

																<span class="timeline-circle"></span></div>

															<span class="timeline-text">Shipped</span>
														</div>
													</div>
													<div class="col-lg-4 u-s-m-b-30">
														<div class="timeline-step">
															<div class="timeline-l-i">

																<span class="timeline-circle"></span></div>

															<span class="timeline-text">Delivered</span>
														</div>
													</div>
												</div>
											</div>
                                            <?php
                                            foreach ($orderDetails['orderItems'] as $item) {
                                                $product = "SELECT * FROM product WHERE id = " . $item['productId'];
                                                $product = mysqli_query($connection, $product);
                                                $product = mysqli_fetch_assoc($product);
                                                $image = explode(",", $product['productImage']);
                                                $imagePath = "/dw-assignment-HKZ/images/product/" . $image[0];
                                                ?>
												<div class="manage-o__description">
													<div class="description__container">
														<div class="description__img-wrap">

															<img class="u-img-fluid" src="<?php echo $imagePath; ?>"
															     alt="<?php echo $product['productName']; ?>">
														</div>
														<div class="description-title"><?php echo $product['productName']; ?></div>
													</div>
													<div class="description__info-wrap">
														<div>

                                                            <span class="manage-o__text-2 u-c-silver">Price:
                                                                <span class="manage-o__text-2 u-c-secondary"><?php echo number_format($item['price']) . " MMK"; ?></span></span>
														</div>
														<div>

                                                            <span class="manage-o__text-2 u-c-silver">Quantity:
                                                                <span class="manage-o__text-2 u-c-secondary"><?php echo $item['quantity']; ?></span></span>
														</div>
														<div>

                                                            <span class="manage-o__text-2 u-c-silver">Total:

                                                                <span class="manage-o__text-2 u-c-secondary"><?php echo number_format($item['total']) . " MMK"; ?></span></span>
														</div>
													</div>
												</div>    <br/><br/>
                                            <?php } ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
											<div class="dash__pad-3">
												<h2 class="dash__h2 u-s-m-b-8">Address</h2>

												<span class="dash__text-2"><?php echo $orderDetails['orderLocation'];?></span>

												<span class="dash__text-2"><?php echo $orderDetails['orderPhone'];?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
											<div class="dash__pad-3">
												<h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
												<div class="dash-l-r u-s-m-b-8">
													<div class="manage-o__text-2 u-c-secondary">Subtotal</div>
													<div class="manage-o__text-2 u-c-secondary"><?php echo number_format($orderDetails['subTotal']) . " MMK"; ?></div>
												</div>
												<div class="dash-l-r u-s-m-b-8">
													<div class="manage-o__text-2 u-c-secondary">Tax (5%)</div>
													<div class="manage-o__text-2 u-c-secondary"><?php echo number_format($orderDetails['tax']) . " MMK"; ?></div>
												</div>
												<div class="dash-l-r u-s-m-b-8">
													<div class="manage-o__text-2 u-c-secondary">Total</div>
													<div class="manage-o__text-2 u-c-secondary"><?php echo number_format($orderDetails['grandTotal']) . " MMk"; ?></div>
												</div>

												<span class="dash__text-2">Paid by <?php
                                                    if ($orderDetails['paymentMethod'] == 'cod') {
                                                        echo "Cash on Delivery";
                                                    } else {
                                                        echo strtoupper($orderDetails['paymentMethod']);
                                                    }
                                                    ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 2 ======-->
	</div>
	<!--====== End - App Content ======-->
    <?php include 'components/footer.php'; ?>
</div>
<?php include 'components/scripts.php'; ?>
