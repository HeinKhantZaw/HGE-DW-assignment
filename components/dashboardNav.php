<?php
$page = '';
if (isset($_SESSION['dashboardNav'])) {
    $page = $_SESSION['dashboardNav'];
}
?>
<div class="dash__pad-1">

	<span class="dash__text u-s-m-b-16">Hello, <?php echo $_SESSION['cname'] ?></span>
	<ul class="dash__f-list">
		<li>

			<a class="<?php if ($page == 'manage') echo 'dash-active' ?>" href="dashboard.php">Manage My Account</a>
		</li>
		<li>

			<a class="<?php if ($page == 'profile') echo 'dash-active' ?>" href="profile.php">My Profile</a></li>
		<li>

			<a href="dash-my-order.html">My Orders</a></li>
		<li>

			<a href="dash-payment-option.html">My Payment Options</a></li>
		<li>

			<a href="dash-cancellation.html">My Returns & Cancellations</a></li>
	</ul>
</div>
