<?php
$GLOBALS['title'] = "HGE - Information";
include 'components/header.php';
include 'db/connect.php';
$query = "SELECT * FROM `product`,`category` WHERE `product`.`productStatus` LIKE 'New' AND `product`.`categoryId`=`category`.`id` order by `product`.`id` LIMIT 6;";
$result = mysqli_query($connection, $query);
$query = "SELECT `categoryName` FROM `category` WHERE `categoryName` NOT LIKE 'Wearable%' ORDER BY `categoryName` DESC ;";
$result2 = mysqli_query($connection, $query);
$topProductQuery = "SELECT * FROM `product`,`category` WHERE `product`.`productStatus` LIKE 'New%' AND `product`.`categoryId`=`category`.`id` AND `category`.`categoryName` NOT LIKE 'Wearable%';";
$resultProduct = mysqli_query($connection, $topProductQuery);
if ($result) {
    $latestProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
if ($resultProduct) {
    $topProducts = mysqli_fetch_all($resultProduct, MYSQLI_ASSOC);
}
?>
<!--====== Main App ======-->
<div id="app">
	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
	<!--====== End - Main Header ======-->
	<div class="app-content">
        <?php include "components/cookiePopup.php"; ?>
		<div class="u-s-p-y-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="content-span-1  u-c-silver u-s-m-b-12">Latest Products and Information</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Intro ======-->

			<!--====== Section 4 ======-->
			<div class="u-s-p-b-60">

				<!--====== Section Intro ======-->
				<div class="section__intro u-s-m-b-46">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="section__text-wrap">
									<h1 class="section__heading u-c-secondary u-s-m-b-12">LATEST PRODUCTS</h1>

									<span class="section__span u-c-silver">GET UP FOR NEW ARRIVALS</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Intro ======-->


				<!--====== Section Content ======-->
				<div class="section__content">
					<div class="container">
						<div class="slider-fouc">
							<div class="owl-carousel product-slider" data-item="4">
                                <?php
                                foreach ($latestProducts as $key => $product) {
                                    $image = explode(",", $product['productImage']);
                                    $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                    ?>
									<div class="u-s-m-b-30">
										<div class="product-o product-o--hover-on">
											<div class="product-o__wrap">

												<a class="aspect aspect--bg-grey aspect--square u-d-block"
												   href="product-detail.html">

													<img class="aspect__img" src="<?php echo $imagePath; ?>"
													     alt="<?php echo $product['productName']; ?>"></a>

												<div class="product-o__action-wrap">
													<ul class="product-o__action-list">
														<li>

															<a data-modal="modal" data-modal-id="#quick-look">
																<i class="fas fa-search-plus"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<span class="product-o__category">

                                            <a href="shop-side-version-2.html"><?php echo $product['categoryName'] ?></a></span>
											<span class="product-o__name">

                                            <a href="product-detail.html"><?php echo $product['productName'] ?></a></span>
											<span class="product-o__price">$125.00</span>
										</div>
									</div>
                                <?php } ?>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>
			<!--====== End - Section 4 ======-->
			<!--====== Section Content ======-->
			<div class="u-s-p-b-60">

				<!--====== Section Intro ======-->
				<div class="section__intro u-s-m-b-16">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="section__text-wrap">
									<h1 class="section__heading u-c-secondary u-s-m-b-12">TOP PRODUCTS</h1>
									<span class="section__span u-c-silver">CHOOSE CATEGORY</span>
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
							<div class="col-lg-12">
								<div class="filter-category-container">
									<div class="filter__category-wrapper">

										<button class="btn filter__btn filter__btn--style-1 js-checked" type="button"
										        data-filter="*">ALL
										</button>
									</div>
                                    <?php
                                    while ($category = mysqli_fetch_assoc($result2)) { ?>
										<div class="filter__category-wrapper">
											<button class="btn filter__btn filter__btn--style-1" type="button"
											        data-filter="<?php echo "." . strtok($category['categoryName'], " "); ?>"><?php echo $category['categoryName'] ?>
											</button>
										</div>
                                        <?php
                                    }
                                    ?>
								</div>
								<div class="filter__grid-wrapper u-s-m-t-30">
									<div class="row">
                                        <?php
                                        foreach ($topProducts as $key => $product) {
                                            $image = explode(",", $product['productImage']);
                                            $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                            ?>
											<div class="<?php echo "col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item " . strtok($product['categoryName'], " "); ?>">
												<div class="product-o product-o--hover-on product-o--radius">
													<div class="product-o__wrap">

														<a class="aspect aspect--bg-grey aspect--square u-d-block"
														   href="product-detail.html">

															<img class="aspect__img"
															     src="<?php echo $imagePath; ?>"
															     alt=""></a>
														<div class="product-o__action-wrap">
															<ul class="product-o__action-list">
																<li>

																	<a data-modal="modal" data-modal-id="#quick-look"><i
																				class="fas fa-search-plus"></i></a>
																</li>
															</ul>
														</div>
													</div>

													<span class="product-o__category">

                                                    <a href="shop-side-version-2.html"><?php echo $product['categoryName']; ?></a></span>

													<span class="product-o__name">

                                                    <a href="product-detail.html"><?php echo $product['productName']; ?></a></span>

													<span class="product-o__price"><?php echo $product['productPrice']; ?></span>
												</div>
											</div>
                                        <?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>

			<!--====== Section 10 ======-->
			<div class="u-s-p-b-60">

				<!--====== Section Intro ======-->
				<div class="section__intro u-s-m-b-46">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="section__text-wrap">
									<h1 class="section__heading u-c-secondary u-s-m-b-12">FITNESS INFORMATION</h1>
									<span class="section__span u-c-silver">START YOU DAY WITH LATEST FITNESS INFORMATION</span>
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
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="bp-mini bp-mini--img u-h-100">
									<div class="bp-mini__thumbnail">

										<!--====== Image Code ======-->

										<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"
										   href="blog-detail.html">

											<img class="aspect__img" src="images/blog/post-2.jpg" alt=""></a>
										<!--====== End - Image Code ======-->
									</div>
									<div class="bp-mini__content">
										<div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>25 February 2018</span></a></span></span>

											<span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Dayle</a></span></span>

											<span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>

                                                        <span>8</span></a></span></span></div>
										<div class="bp-mini__category">

											<a>Learning</a>

											<a>News</a>

											<a>Health</a></div>

										<span class="bp-mini__h1">

                                            <a href="blog-detail.html">Life is an extraordinary Adventure</a></span>
										<p class="bp-mini__p">
											At HGE, We are aware of how important it is to provide high-quality repair
											and maintenance services for gym equipment on a continuous basis. Not only
											are we certain that we will be able to resolve your problem, but we are also
											dedicated to doing it in a way that ensures long-term success at an
											affordable price. This is the reason why we provide ongoing maintenance
											plans. Large-scale repairs can be both expensive and inconvenient to deal
											with. Get rid of the sign that says "out of order" and sign up for
											preventative maintenance instead; we promise that our qualified specialists
											will be able to fix your equipment, which means that sudden equipment
											failures will no longer be an issue! </p>
										<div class="blog-t-w">

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="bp-mini bp-mini--img u-h-100">
									<div class="bp-mini__thumbnail">

										<!--====== Image Code ======-->

										<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"
										   href="blog-detail.html">

											<img class="aspect__img" src="images/blog/post-12.jpg" alt=""></a>
										<!--====== End - Image Code ======-->
									</div>
									<div class="bp-mini__content">
										<div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>25 February 2018</span></a></span></span>

											<span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Dayle</a></span></span>

											<span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>

                                                        <span>8</span></a></span></span></div>
										<div class="bp-mini__category">

											<a>Learning</a>

											<a>News</a>

											<a>Health</a></div>

										<span class="bp-mini__h1">

                                            <a href="blog-detail.html">Wait till its open</a></span>
										<p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and
											typesetting industry.</p>
										<div class="blog-t-w">

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="bp-mini bp-mini--img u-h-100">
									<div class="bp-mini__thumbnail">

										<!--====== Image Code ======-->

										<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"
										   href="blog-detail.html">

											<img class="aspect__img" src="images/blog/post-5.jpg" alt=""></a>
										<!--====== End - Image Code ======-->
									</div>
									<div class="bp-mini__content">
										<div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>25 February 2018</span></a></span></span>

											<span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Dayle</a></span></span>

											<span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>

                                                        <span>8</span></a></span></span></div>
										<div class="bp-mini__category">

											<a>Learning</a>

											<a>News</a>

											<a>Health</a></div>

										<span class="bp-mini__h1">

                                            <a href="blog-detail.html">Tell me difference between smoke and vape</a></span>
										<p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and
											typesetting industry.</p>
										<div class="blog-t-w">

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>

											<a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>
			<!--====== End - Section 10 ======-->


		</div>
	</div>
	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
	<!--====== Quick Look Modal ======-->
	<div class="modal fade" id="quick-look">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content modal--shadow">

				<button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-5">

							<!--====== Product Breadcrumb ======-->
							<div class="pd-breadcrumb u-s-m-b-30">
								<ul class="pd-breadcrumb__list">
									<li class="has-separator">

										<a href="index.hml">Home</a></li>
									<li class="has-separator">

										<a href="shop-side-version-2.html">Electronics</a></li>
									<li class="has-separator">

										<a href="shop-side-version-2.html">DSLR Cameras</a></li>
									<li class="is-marked">

										<a href="shop-side-version-2.html">Nikon Cameras</a></li>
								</ul>
							</div>
							<!--====== End - Product Breadcrumb ======-->


							<!--====== Product Detail ======-->
							<div class="pd u-s-m-b-30">
								<div class="pd-wrap">
									<div id="js-product-detail-modal">
										<div>

											<img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
									</div>
								</div>
								<div class="u-s-m-t-15">
									<div id="js-product-detail-modal-thumbnail">
										<div>

											<img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
										<div>

											<img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
									</div>
								</div>
							</div>
							<!--====== End - Product Detail ======-->
						</div>
						<div class="col-lg-7">

							<!--====== Product Right Side Details ======-->
							<div class="pd-detail">
								<div>

									<span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span></div>
								<div>
									<div class="pd-detail__inline">

										<span class="pd-detail__price">$6.99</span>

										<span class="pd-detail__discount">(76% OFF)</span>
										<del class="pd-detail__del">$28.97</del>
									</div>
								</div>
								<div class="u-s-m-b-15">
									<div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i
												class="fas fa-star"></i><i class="fas fa-star"></i><i
												class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

										<span class="pd-detail__review u-s-m-l-4">

                                                <a href="product-detail.html">23 Reviews</a></span></div>
								</div>
								<div class="u-s-m-b-15">
									<div class="pd-detail__inline">

										<span class="pd-detail__stock">200 in stock</span>

										<span class="pd-detail__left">Only 2 left</span></div>
								</div>
								<div class="u-s-m-b-15">

									<span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
								</div>
								<div class="u-s-m-b-15">
									<div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                                <a href="signin.html">Add to Wishlist</a>

                                                <span class="pd-detail__click-count">(222)</span></span></div>
								</div>
								<div class="u-s-m-b-15">
									<div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i
			                                            class="far fa-envelope u-s-m-r-6"></i>

                                                <a href="signin.html">Email me When the price drops</a>

                                                <span class="pd-detail__click-count">(20)</span></span></div>
								</div>
								<div class="u-s-m-b-15">
									<ul class="pd-social-list">
										<li>

											<a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
										</li>
										<li>

											<a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
										</li>
										<li>

											<a class="s-insta--color-hover" href="#"><i
														class="fab fa-instagram"></i></a></li>
										<li>

											<a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
										</li>
										<li>

											<a class="s-gplus--color-hover" href="#"><i
														class="fab fa-google-plus-g"></i></a></li>
									</ul>
								</div>
								<div class="u-s-m-b-15">
									<form class="pd-detail__form">
										<div class="pd-detail-inline-2">
											<div class="u-s-m-b-15">

												<!--====== Input Counter ======-->
												<div class="input-counter">

													<span class="input-counter__minus fas fa-minus"></span>

													<input class="input-counter__text input-counter--text-primary-style"
													       type="text" value="1" data-min="1" data-max="1000">

													<span class="input-counter__plus fas fa-plus"></span></div>
												<!--====== End - Input Counter ======-->
											</div>
											<div class="u-s-m-b-15">

												<button class="btn btn--e-brand-b-2" type="submit">Add to Cart
												</button>
											</div>
										</div>
									</form>
								</div>
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
							</div>
							<!--====== End - Product Right Side Details ======-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--====== End - Quick Look Modal ======-->
</div>

<?php include 'components/scripts.php'; ?>
<script>


</script>