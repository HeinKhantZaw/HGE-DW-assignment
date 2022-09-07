<?php
$GLOBALS['title'] = "HGE - Featured";
include 'components/header.php';
include 'db/connect.php';
$query = "SELECT * FROM `product`,`category` WHERE `productStatus`='New' AND `product`.`categoryId` = `category`.`id` AND `category`.`categoryName` LIKE 'Wearable%' ORDER BY RAND()
LIMIT 4;";
$result = mysqli_query($connection, $query);
if ($result) {
    $wearableProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);

} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
$imagePath = [];
$categoryName = [];
foreach ($wearableProduct as $key => $product) {
    $image = explode(",", $product['productImage']);
    $imagePath[] = '/dw-assignment-HKZ/images/product/' . $image[0];
    $categoryName[] = explode('-', $product['categoryName'])[1];
}
?>
<div id="app">
	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
	<!--====== End - Main Header ======-->

	<!--====== Section 1 ======-->
	<div class="u-s-p-y-60">

		<!--====== Section Intro ======-->
		<div class="section__intro u-s-m-b-46">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__text-wrap">
							<h1 class="section__heading u-c-secondary u-s-m-b-12">MOST FEATURED WEARABLE
								TECHNOLOGY </h1>
							<span class="section__span u-c-silver">FOR FITNESS AND HEALTH </span>
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
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[0]; ?></h1>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">
								<img class="aspect__img collection__img" src="<?php echo $imagePath[0]; ?>"
								     alt="<?php echo $wearableProduct[0]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[1]; ?></h1>
						</div>
					</div>
					<div class="col-lg-5 col-md-7 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">

								<img class="aspect__img collection__img" src="<?php echo $imagePath[1]; ?>"
								     alt="<?php echo $wearableProduct[1]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-5 col-md-7 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">

								<img class="aspect__img collection__img" src="<?php echo $imagePath[2]; ?>"
								     alt="<?php echo $wearableProduct[2]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[2]; ?></h1>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">

								<img class="aspect__img collection__img" src="<?php echo $imagePath[3]; ?>"
								     alt="<?php echo $wearableProduct[3]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[3]; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--====== Section Content ======-->
	</div>
	<!--====== End - Section 1 ======-->
	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
</div>

<?php include 'components/scripts.php'; ?>
