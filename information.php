<?php
$GLOBALS['title'] = "HGE - Information";
include 'components/header.php';
include 'db/connect.php';
$query = "SELECT `product`.`id`, `product`.`productName`,`product`.`productPrice`, `product`.`productDescription`, `product`.`productImage`, `category`.`categoryName` FROM `product`,`category` WHERE `product`.`productStatus` LIKE 'New' AND `product`.`categoryId`=`category`.`id` order by `product`.`id` LIMIT 6;";
$result = mysqli_query($connection, $query);
$query = "SELECT `categoryName` FROM `category` WHERE `categoryName` NOT LIKE 'Wearable%' ORDER BY `categoryName` DESC ;";
$result2 = mysqli_query($connection, $query);
$topProductQuery = "SELECT `product`.`id`, `product`.`productName`,`product`.`productPrice`, `product`.`productDescription`, `product`.`productImage`, `category`.`categoryName` FROM `product`,`category` WHERE `product`.`productStatus` LIKE 'New%' AND `product`.`categoryId`=`category`.`id` AND `category`.`categoryName` NOT LIKE 'Wearable%';";
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

									<a href="information.php">Information</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->

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
												   href="product-detail.php?productId=<?php echo $product['id']; ?>">

													<img class="aspect__img" src="<?php echo $imagePath; ?>"
													     alt="<?php echo $product['productName']; ?>"></a>

												<div class="product-o__action-wrap">
													<ul class="product-o__action-list">
														<li>

															<a href="product-detail.php?productId=<?php echo $product['id']; ?>">
																<i class="fa fa-cart-plus"></i></a>
														</li>
													</ul>
												</div>
											</div>
											<span class="product-o__category">

                                            <a href="shop-side-version-2.html"><?php echo $product['categoryName'] ?></a></span>
											<span class="product-o__name">

                                            <a href="product-detail.php?productId=<?php echo $product['id']; ?>"><?php echo $product['productName'] ?></a></span>
											<span class="product-o__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></span>
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
														   href="product-detail.php?productId=<?php echo $product['id']; ?>">

															<img class="aspect__img" src="<?php echo $imagePath; ?>"
															     alt=""></a>
														<div class="product-o__action-wrap">
															<ul class="product-o__action-list">
																<li>

																	<a href="product-detail.php?productId=<?php echo $product['id']; ?>"><i class="fas fa-cart-plus"></i></a>
																</li>
															</ul>
														</div>
													</div>

													<span class="product-o__category">

                                                    <a href="shop-side-version-2.html"><?php echo $product['categoryName']; ?></a></span>

													<span class="product-o__name">

                                                    <a href="product-detail.php?productId=<?php echo $product['id']; ?>"><?php echo $product['productName']; ?></a></span>

													<span class="product-o__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></span>
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

</div>

<?php include 'components/scripts.php'; ?>
<script>


</script>