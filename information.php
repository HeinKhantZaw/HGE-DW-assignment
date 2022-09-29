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

																	<a href="product-detail.php?productId=<?php echo $product['id']; ?>"><i
																				class="fas fa-cart-plus"></i></a>
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

										<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="blog.php?id=1">

											<img class="aspect__img" src="images/blog/blog-1.jpg" alt=""></a>
										<!--====== End - Image Code ======-->
									</div>
									<div class="bp-mini__content">
										<div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>10 August 2022</span></a></span></span>

											<span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a href="#">Richard</a></span></span>

											<span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog.php?id=1"></span></span></div>


										<span class="bp-mini__h1">

                                            <a href="blog.php?id=1">Is the ‘Treadmill Strut’ Workout Trend Worth the Hype?</a></span>
										<p class="bp-mini__p">Does strutting along to Taylor Swift, Lizzo, and Arianna
											Grande count as a workout?

											Allie Bennett, the self-proclaimed “CEO of the treadmill strut,” skyrocketed
											to viral TikTok fame in April 2022 when she decided to create a 36-minute
											treadmill workout set to a playlist of Taylor Swift songs: the original
											treadmill strut workout.

											In that first video, which has garnered 3.7 million
											views so far, she posted instructions for the workout: Starting with the
											first song on the playlist, find your pace. When the song changes, increase
											the pace of the treadmill by 0.1 miles per hour. When you get to the final
											two songs, either stay at the pace you land at, or crank it up to jogging
											speed. Then lower the pace for the last song to whichever speed allows you
											to cool down (and strut it out).</p>

									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="bp-mini bp-mini--img u-h-100">
									<div class="bp-mini__thumbnail">

										<!--====== Image Code ======-->

										<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="blog.php?id=2">

											<img class="aspect__img" src="images/blog/blog-2.jpg" alt=""></a>
										<!--====== End - Image Code ======-->
									</div>
									<div class="bp-mini__content">
										<div class="bp-mini__stat">
                                            <span class="bp-mini__stat-wrap">
                                                <span class="bp-mini__publish-date">
                                                    <a>
                                                        <span>16 September 2022</span></a></span></span>
											<span class="bp-mini__stat-wrap">
                                                <span class="bp-mini__preposition">By</span>
                                                <span class="bp-mini__author">
                                                    <a href="#">Bob</a></span></span>
											<span class="bp-mini__stat">
                                                <span class="bp-mini__comment">
                                                    <a href="blog.php?id=2">
                                                </span>
											</span>
										</div>
										<span class="bp-mini__h1">

                                            <a href="blog.php?id=2">VR Fitness Games That Will Get You Hooked and Make You Sweat</a></span>
										<p class="bp-mini__p">Slicing orbs to the beat of your favorite song, jumping
											over and ducking under laser beams, or sword fighting orcs in the middle of
											a forest — if these workouts sound like a lot more fun than clocking miles
											on the treadmill, read on.

											With virtual reality (VR) technology, you can break a sweat and burn some
											serious calories from the comfort of your living room, says Jimmy Bagley,
											PhD, an associate professor of kinesiology and research director of the
											Strength and Conditioning Lab at San Francisco State University, where he
											studies virtual reality health and exercise. Plus, the games can be a whole
											lot of fun.

											“Virtual reality games aren’t always marketed as exercise, but our research
											shows that when you play them, some can deliver the workout equivalent of
											walking on a treadmill or cycling on a stationary bike,” Dr. Bagley
											says.</p>

									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="bp-mini bp-mini--img u-h-100">
									<div class="bp-mini__thumbnail">

										<!--====== Image Code ======-->

										<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="blog.php?id=3">

											<img class="aspect__img" src="images/blog/blog-3.jpg" alt=""></a>
										<!--====== End - Image Code ======-->
									</div>
									<div class="bp-mini__content">
										<div class="bp-mini__stat">

                                            <span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__publish-date">

                                                    <a>

                                                        <span>20 September 2022</span></a></span></span>

											<span class="bp-mini__stat-wrap">

                                                <span class="bp-mini__preposition">By</span>

                                                <span class="bp-mini__author">

                                                    <a>David</a></span></span>

											<span class="bp-mini__stat">

                                                <span class="bp-mini__comment">

                                                    <a href="blog.php?id=3"></span></span></div>


										<span class="bp-mini__h1">

                                            <a href="blog.php?id=3">Should You Get a Personal Trainer?</a></span>
										<p class="bp-mini__p">Personal training isn’t just for people who are looking to
											get perfectly toned bodies. A lot of people (no matter what shape they're
											in) can benefit from working with a personal trainer to set exercise goals
											and accomplish them (in good health and injury-free).

											Personal trainers are fitness professionals who work with individuals to
											teach exercise form and technique, keep clients accountable to their
											exercise goals, and create customized workout plans based on the
											individual’s specific health and fitness needs.

											Many exercise institutions, such as the American Council on Exercise (ACE),
											the American College of Sports Medicine (ACSM), the National Academy of
											Sports Medicine (NASM), and the National Strength and Conditioning
											Association (NSCA) certify personal trainers. </p>

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