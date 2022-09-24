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
    $query = "SELECT * FROM `order` WHERE `customerId` = " . $_SESSION['cid'];
    $result = mysqli_query($connection, $query);
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
									<li class="is-marked">

										<a href="dashboard_order.php">My Orders</a></li>
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
									<div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
										<div class="dash__pad-2">
											<h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

											<span class="dash__text u-s-m-b-30">Here you can see all your orders.</span>

											<div class="m-order__list">
                                                <?php foreach ($orders as $order) {
                                                    ?>
													<div class="m-order__get">
														<div class="manage-o__header u-s-m-b-1">
															<div class="dash-l-r">
																<div>
																	<div class="manage-o__text-2 u-c-secondary">Order
																		: <?php echo $order['orderId']; ?></div>
																	<div class="manage-o__text u-c-silver">Placed
																		on <?php echo $order['orderDate']; ?></div>
																</div>
																<div>
																	<div class="dash__link dash__link--brand">

																		<a href="dashboard_order_details.php?orderId=<?php echo $order['orderId'];?>">VIEW</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
                                                <?php } ?>
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