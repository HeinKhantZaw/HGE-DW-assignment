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
			<a class="<?php if ($page == 'manage') echo 'dash-active' ?>" href="dashboard.php">My Information</a>
		</li>
		<li>
			<a class="<?php if ($page == 'profile') echo 'dash-active' ?>" href="profile.php">My Profile</a></li>
		<li>
			<a class="<?php if ($page == 'order') echo 'dash-active' ?>" href="dashboard_order.php">My Orders</a>
		</li>
	</ul>
</div>
