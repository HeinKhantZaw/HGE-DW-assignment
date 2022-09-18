<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$GLOBALS['title'] = "HGE - Dashboard";
include 'components/header.php';
include 'db/connect.php';
$_SESSION['dashboardNav'] = 'profile';

if (!isset($_SESSION['cname']) && $_SESSION['cname']) {
    echo "<script>window.open('signin.php', '_self')</script>";
    header("Location: login.php");
} else {
    $query = "SELECT * FROM `customer` WHERE `id` = " . $_SESSION['cid'];
    $result = mysqli_query($connection, $query);
    $customer = mysqli_fetch_assoc($result);
}
if (isset($_POST['saveProfileBtn'])) {
    $customerFirstName = $_POST['customerFirstName'];
    $customerLastName = $_POST['customerLastName'];
    $customerEmail = $_POST['customerEmail'];
    $customerPhone = $_POST['customerPhone'];
    $customerAddress = $_POST['customerAddress'];
    $query = "UPDATE `customer` SET `customerFirstName` = '$customerFirstName', `customerLastName` = '$customerLastName', `customerEmail` = '$customerEmail', `customerPhone` = '$customerPhone', `customerAddress` = '$customerAddress' WHERE `customer`.`id` = " . $_SESSION['cid'];
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['cname'] = $customerFirstName . " " . $customerLastName;
        echo '<div class="message-info success">
						<strong>Success</strong> - Profile updated successfully.
					</div>';
        echo "<script>setTimeout(() => window.open('profile.php', '_self'), 1000);</script>";

    } else {
        echo '<div class="message-info danger">
						<strong>Error</strong> - Something went wrong.
					</div>';
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
								<div class="col-lg-3 col-md-12">

									<!--====== Dashboard Features ======-->
									<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <?php include 'components/dashboardNav.php'; ?>
									</div>
									<div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
										<div class="dash__pad-1">
											<ul class="dash__w-list">
												<li>
													<div class="dash__w-wrap">

														<span class="dash__w-icon dash__w-icon-style-1"><i
																	class="fas fa-cart-arrow-down"></i></span>

														<span class="dash__w-text">4</span>

														<span class="dash__w-name">Orders Placed</span></div>
												</li>
												<li>
													<div class="dash__w-wrap">

														<span class="dash__w-icon dash__w-icon-style-2"><i
																	class="fas fa-times"></i></span>

														<span class="dash__w-text">0</span>

														<span class="dash__w-name">Cancel Orders</span></div>
												</li>
												<li>
													<div class="dash__w-wrap">

														<span class="dash__w-icon dash__w-icon-style-3"><i
																	class="far fa-heart"></i></span>

														<span class="dash__w-text">0</span>

														<span class="dash__w-name">Wishlist</span></div>
												</li>
											</ul>
										</div>
									</div>
									<!--====== End - Dashboard Features ======-->
								</div>
								<div class="col-lg-9 col-md-12">
									<div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
										<div class="dash__pad-2">
											<h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

											<span class="dash__text u-s-m-b-30">Looks like you haven't updated your profile</span>
											<div class="row">
												<div class="col-lg-12">
													<form class="dash-edit-p" action="profile.php" method="post">
														<div class="gl-inline">
															<div class="u-s-m-b-30">

																<label class="gl-label" for="c-fname">FIRST NAME
																	*</label>

																<input class="input-text input-text--primary-style"
																       type="text" id="c-fname" name="customerFirstName"
																       value="<?php echo $customer['customerFirstName']; ?>">
															</div>
															<div class="u-s-m-b-30">

																<label class="gl-label" for="c-lname">LAST NAME
																	*</label>

																<input class="input-text input-text--primary-style"
																       type="text" id="c-lname" name="customerLastName"
																       value="<?php echo $customer['customerLastName']; ?>">
															</div>
														</div>
														<div class="gl-inline">
															<div class="u-s-m-b-30">

																<label class="gl-label" for="c-email">E-mail *</label>

																<input class="input-text input-text--primary-style"
																       type="text" id="c-email" name="customerEmail"
																       value="<?php echo $customer['customerEmail']; ?>">
															</div>
															<div class="u-s-m-b-30">

																<label class="gl-label" for="c-phone">Phone Number
																	*</label>

																<input class="input-text input-text--primary-style"
																       type="text" pattern="[0-9]{9,}" id="c-phone"
																       name="customerPhone"
																       value="<?php echo $customer['customerPhone']; ?>">
															</div>
														</div>
														<div class="gl-inline">
															<div class="u-s-m-b-30">

																<label class="gl-label" for="c-address">Address
																	*</label>

																<input class="input-text input-text--primary-style"
																       type="text" id="c-address" name="customerAddress"
																       value="<?php echo $customer['customerAddress']; ?>">
															</div>

														</div>

														<button class="btn btn--e-brand-b-2" name="saveProfileBtn"
														        type="submit">SAVE
														</button>
													</form>
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