<?php
$query = "SELECT * FROM `order` WHERE `customerID` = " . $_SESSION['cid'];
$result = mysqli_query($connection, $query);
//get row count
$count = mysqli_num_rows($result);
?>
<div class="col-lg-3 col-md-12">

	<!--====== Dashboard Features ======-->
	<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
        <?php include 'components/dashboard_nav.php'; ?>
	</div>
	<div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
		<div class="dash__pad-1">
			<ul class="dash__w-list">
				<li>
					<div class="dash__w-wrap">
						<span class="dash__w-icon dash__w-icon-style-2">
							<i class="fas fa-cart-arrow-down"></i></span>
						<span class="dash__w-text"><?php echo $count;?></span>
						<span class="dash__w-name">Orders Placed</span></div>
				</li>
			</ul>
		</div>
	</div>
	<!--====== End - Dashboard Features ======-->
</div>
