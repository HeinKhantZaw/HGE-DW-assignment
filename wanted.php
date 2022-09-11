<?php
$GLOBALS['title'] = "HGE - Wanted";
include 'components/header.php';
include 'db/connect.php';
$search = false;
$productFound = false;
if (isset($_GET['q'])) {
    $search = true;
    $name = $_GET['q'];
    $query = "SELECT * FROM `product`,`category` WHERE `product`.`categoryId` = `category`.`id` AND `productStatus` = 'Second Hand' AND `productName` LIKE '%$name%';";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $productFound = true;
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
} else {
    $query = "SELECT * FROM `product`,`category` WHERE `product`.`categoryId` = `category`.`id` AND `productStatus` = 'Second Hand';";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
	<div id="app">
	<!--====== Main Header ======-->
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

									<a href="wanted.php">Wanted</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->
        <?php if ($search && !$productFound) { ?>
			<!--====== Section 1 ======-->    <!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="row post-center-wrap">
						<div class="col-lg-12 col-md-12 u-s-m-b-30">
							<div class="empty">
								<div class="empty__wrap">
									<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
									<lottie-player src="images/not-found.json" background="transparent" speed="1"
									               style="width: 300px; height: 300px; margin: 0 auto;" loop
									               autoplay></lottie-player>

									<span class="empty__big-text">SORRY</span>

									<span class="empty__text-1">Your search did not match any products. Suggestions: Make sure that all words are spelled correctly. Try different keywords.</span>
									<a class="about__link btn--e-secondary" href="index.html" target="_blank">See
										all products</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>    <!--====== End - Section 1 ======-->
        <?php } else { ?>
			<!--====== Section 2 ======-->
			<div class="u-s-p-y-60">

				<!--====== Section Intro ======-->
				<div class="section__intro u-s-m-b-46">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="section__text-wrap">
									<h1 class="section__heading u-c-secondary u-s-m-b-12">USED GYM EQUIPMENTS</h1>
									<blockquote>
										HGE is Yangon's favorite choice for cheap, dependable, and officially certified
										pre-owned exercise machinery from the best national brands. Our fitness center
										equipment assortment includes both standalone cardio and strength machines and
										all-inclusive gym bundles. Purchasing used fitness equipment might be
										challenging,
										but our staff is here to lend a hand by offering the knowledge you require.
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Intro ======-->
			</div>    <!--====== End - Section 2 ======-->
			          <!--====== Section 3 ======-->
			<div class="u-s-p-y-90">
				<div class="container">
					<div class="row post-center-wrap">

						<div class="col-lg-9 col-md-12">
							<div class="shop-p">
                                <?php
                                if ($search && $productFound) { ?>
									<div class="shop-p__toolbar u-s-m-b-30">
										<div class="shop-p__meta-wrap u-s-m-b-60">

											<span class="shop-p__meta-text-1">FOUND <?php echo ($count == 1) ? $count . " RESULT" : $count . " RESULTS" ?>  for - <?php echo $_GET['q'] ?></span>
										</div>

									</div>
                                <?php } ?>
								<div class="shop-p__collection">
									<div class="row is-list-active">
                                        <?php
                                        foreach ($products as $product) {
                                            $image = explode(",", $product['productImage']);
                                            $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                            ?>
											<div class="col-lg-4 col-md-6 col-sm-6">
												<div class="product-m">
													<div class="product-m__thumb">

														<a class="aspect aspect--bg-grey aspect--square u-d-block"
														   href="product-detail.html">

															<img class="aspect__img" src="<?php echo $imagePath ?>"
															     alt="<?php echo $product['productName']; ?>"></a>
														<div class="product-m__add-cart">

															<a class="btn--e-brand" href="product-detail.html">View
																Product</a></div>
													</div>
													<div class="product-m__content">
														<div class="product-m__category">

															<a href="shop-side-version-2.html"><?php echo $product['categoryName']; ?></a>
														</div>
														<div class="product-m__name">

															<a href="product-detail.html"><?php echo $product['productName']; ?></a>
														</div>
														<br>

														<div class="product-m__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></div>
														<div class="product-m__hover">
															<div class="product-m__preview-description">

																<span><?php echo $product['productDescription']; ?></span>
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
			</div>    <!--====== End - Section 3======-->
        <?php } ?>
		<!--====== Main Footer ======-->
        <?php include 'components/footer.php'; ?>
		<!--====== Modal Section ======-->
	</div>

<?php include 'components/scripts.php'; ?>