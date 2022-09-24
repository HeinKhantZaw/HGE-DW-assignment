<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$GLOBALS['title'] = "HGE - Dashboard";
include 'components/header.php';
include 'db/connect.php';
$_SESSION['dashboardNav'] = 'manage';

if (!isset($_SESSION['cname']) && $_SESSION['cname']) {
    echo "<script>window.open('signin.php', '_self')</script>";
    header("Location: login.php");
} else {
    $query = "SELECT * FROM `customer` WHERE `id` = " . $_SESSION['cid'];
    $result = mysqli_query($connection, $query);
    $customer = mysqli_fetch_assoc($result);
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
									<li class="is-marked">

										<a href="dashboard.php">Dashboard</a></li>
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
											<h1 class="dash__h1 u-s-m-b-14">My Information</h1>

											<span class="dash__text u-s-m-b-30">From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</span>
											<div class="row">
												<div class="col-lg-4 u-s-m-b-30">
													<div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
														<div class="dash__pad-3">
															<h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>

															<span class="dash__text"><?php echo $customer['customerFirstName'] . ' ' . $customer['customerLastName']; ?></span>

															<span class="dash__text"><?php echo $customer['customerEmail']; ?></span>
														</div>
													</div>
												</div>
												<div class="col-lg-4 u-s-m-b-30">
													<div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
														<div class="dash__pad-3">
															<h2 class="dash__h2 u-s-m-b-8">ADDRESS BOOK</h2>

															<span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>

															<span class="dash__text"><?php echo $customer['customerAddress']; ?></span>

															<span class="dash__text"><?php echo $customer['customerPhone']; ?></span>
														</div>
													</div>
												</div>
												<div class="col-lg-4 u-s-m-b-30">
													<div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
														<div class="dash__pad-3">
															<h2 class="dash__h2 u-s-m-b-8">BILLING ADDRESS</h2>

															<span class="dash__text-2 u-s-m-b-8">Default Billing Address</span>

															<span class="dash__text"><?php echo $customer['customerAddress']; ?></span>

															<span class="dash__text"><?php echo $customer['customerPhone']; ?></span>

														</div>
													</div>
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