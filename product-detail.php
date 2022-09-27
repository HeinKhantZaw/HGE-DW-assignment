<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$GLOBALS['title'] = "HGE - Product Details";
include 'components/header.php';
include 'db/connect.php';
include 'Shopping_Cart_Functions.php';
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $query = "SELECT * FROM `product`,`category` WHERE `product`.`id` = $productId AND `product`.`categoryId` = `category`.`id`";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "<p>Product ID not found.</p>";
        exit();
    } else {
        $row = mysqli_fetch_array($result);
        $productName = $row['productName'];
        $productPrice = number_format($row['productPrice']) . " MMK";
        $productQuantity = $row['productQuantity'];
        $productImage = $row['productImage'];
        $productStatus = $row['productStatus'];
        $productDescription = $row['productDescription'];
        $productCategory = $row['categoryName'];
    }
}
$imageList = explode(",", $productImage);
array_walk($imageList, function (&$item) {
    $item = '/dw-assignment-HKZ/images/product/' . $item;
});
$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (isset($_POST['AddToCartBtn'])) {
    AddShoppingCart($productId, $_POST['BuyQty']);
}
?>

	<div id="app">    <!--====== Main Header ======-->
        <?php include 'components/navbar.php'; ?>
		<!--====== End - Main Header ======-->
		<div class="app-content">
			<!--====== Section 1 ======-->
			<div class="u-s-p-t-90">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">

							<!--====== Product Breadcrumb ======-->
							<div class="pd-breadcrumb u-s-m-b-30">
								<ul class="pd-breadcrumb__list">
									<li class="has-separator">

										<a href="index.php">Home</a></li>
									<li>
										<a href="product-detail.php?productId=<?php echo $_GET['productId'] ?>"><?php echo $productName; ?></a>
									</li>
								</ul>
							</div>
							<!--====== End - Product Breadcrumb ======-->


							<!--====== Product Detail Zoom ======-->
							<div class="pd u-s-m-b-30">
								<div class="slider-fouc pd-wrap">
									<div id="pd-o-initiate">
                                        <?php
                                        foreach ($imageList as $image) {
                                            ?>
											<div class="pd-o-img-wrap" data-src="<?php echo $image; ?>">
												<img class="u-img-fluid" src="<?php echo $image; ?>"
												     data-zoom-image="<?php echo $image; ?>"
												     alt="<?php echo $productName; ?>">
											</div>
                                        <?php } ?>
									</div>

									<span class="pd-text">Click for larger zoom</span>
								</div>
								<div class="u-s-m-t-15">
									<div class="slider-fouc">
										<div id="pd-o-thumbnail">
                                            <?php
                                            foreach ($imageList as $image) {
                                                ?>
												<div>
													<img class="u-img-fluid" src="<?php echo $image; ?>"
													     alt="<?php echo $productName; ?>">
												</div>
                                            <?php } ?>
										</div>
									</div>
								</div>
							</div>
							<!--====== End - Product Detail Zoom ======-->
						</div>
						<div class="col-lg-7">

							<!--====== Product Right Side Details ======-->
							<div class="pd-detail">
								<div>

									<span class="pd-detail__name"><?php echo $productName ?></span></div>
								<div>
									<div class="pd-detail__inline">

										<span class="pd-detail__price"><?php echo $productPrice; ?></span>

									</div>
								</div>
								<div class="u-s-m-b-15">
									<span class="pd-detail__review u-s-m-l-4">
                                            <a data-click-scroll="#disqus_thread" class="disqus-comment-count"
                                               data-disqus-identifier="<?php echo $productId; ?>">See Comments</a></span>
								</div>
							</div>
							<div class="u-s-m-b-15">
								<div class="pd-detail__inline">
                                    <?php if ($productQuantity > 0) { ?>
										<span class="pd-detail__stock"><?php echo $productQuantity; ?> In Stock</span>
                                    <?php } else { ?>
									<span class="pd-detail__left">Out Of Stock</span></div>
                                <?php } ?>
							</div>
							<div class="u-s-m-b-15">

								<span class="pd-detail__preview-desc">
									<?php echo $productDescription; ?>
							</span>
							</div>
							<br/>
							<div class="u-s-m-b-15">

								<span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
								<ul class="pd-detail__policy-list">
									<li><i class="fas fa-check-circle u-s-m-r-8"></i>

										<span>Buyer Protection.</span></li>
									<li><i class="fas fa-check-circle u-s-m-r-8"></i>

										<span>Full Refund if you don't receive your order.</span></li>
									<li><i class="fas fa-check-circle u-s-m-r-8"></i>

										<span>Returns accepted if product not as described.</span></li>
								</ul>
							</div>
							<br/>
							<div class="u-s-m-b-15">
								<form class="pd-detail__form" method="post">
									<div class="pd-detail-inline-2">
										<div class="u-s-m-b-15">

											<!--====== Input Counter ======-->
											<div class="input-counter">

												<span class="input-counter__minus fas fa-minus"></span>

												<input class="input-counter__text input-counter--text-primary-style"
												       type="text" value="<?php if ($productQuantity>0) echo 1; else echo 0?>" data-min="<?php if ($productQuantity>0) echo 1;?>" name="BuyQty"
												       data-max="<?php echo $productQuantity; ?>">

												<span class="input-counter__plus fas fa-plus"></span></div>
											<!--====== End - Input Counter ======-->
										</div>
										<div class="u-s-m-b-15">

											<button class="btn btn--e-brand-b-2" name="AddToCartBtn" type="submit">Add
												to Cart
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!--====== End - Product Right Side Details ======-->
					</div>
				</div>
			</div>

			<div class="u-s-p-y-90">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div id="disqus_thread"></div>
							<script>

                                var disqus_config = function () {
                                    this.page.url = '<?php echo $currentURL?>';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '<?php echo $productId?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                (function () { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://hge-1.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
									powered by
									Disqus.</a></noscript>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>	<!--====== Main Footer ======-->
<?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
	<script id="dsq-count-scr" src="//hge-1.disqus.com/count.js" async></script>
<?php include 'components/scripts.php'; ?>