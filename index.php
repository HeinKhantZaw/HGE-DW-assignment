<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$GLOBALS['title'] = "HGE - Home";
include 'components/header.php';
include 'db/connect.php';
$query = "SELECT * FROM `product` WHERE `productStatus` LIKE '%Featured';";
$result = mysqli_query($connection, $query);
if ($result) {
    $featuredProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//    echo "<pre>";
//    print_r($featuredProducts);
//    echo "</pre>";
}
$query = "SELECT * FROM `product` WHERE `productStatus` LIKE 'New' order by 'id' DESC LIMIT 3;";
$result = mysqli_query($connection, $query);
if ($result) {
    $latestProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
$query = "SELECT * FROM `product` WHERE `productStatus` LIKE 'Second Hand' LIMIT 3;";
$result = mysqli_query($connection, $query);
if ($result) {
    $secondHandProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$query = "SELECT * FROM `product` ORDER BY `productPrice` DESC LIMIT 3;";
$result = mysqli_query($connection, $query);
if ($result) {
    $premiumProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
if (isset($_SESSION['cid'])) {
	$query = "UPDATE `customer` SET `viewCount` = (SELECT `viewCount` FROM `customer` WHERE `id` = {$_SESSION['cid']}) + 1 WHERE `id` = {$_SESSION['cid']}";
	$result = mysqli_query($connection, $query);
	if(!$result){
		echo mysqli_error($connection);
		exit();
	}
	$query = "SELECT viewCount FROM `customer` WHERE `id` = {$_SESSION['cid']}";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);
	$viewCount = $row['viewCount'];
}
?>
<!--====== Main App ======-->
<div id="app">

	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
	<!--====== End - Main Header ======-->


	<!--====== App Content ======-->
	<div class="app-content">

		<!--====== Primary Slider ======-->
        <?php include "components/slider.php"; ?>
		<!--====== End - Primary Slider ======-->
		<!--====== Cookie Policy Modal ======-->
        <?php include "components/cookie_popup.php"; ?>
		<!--====== End - Cookie Policy Modal ======-->
		<!--====== Section 1 ======-->
		<div class="u-s-p-y-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="content-span-1 u-c-silver u-s-m-b-12">ARE YOU READY TO</h1>
								<span class="section__heading u-c-secondary"> Get Fit, Stay Strong & Motivated</span>
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

						<div class="col-lg-7 col-md-7 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--1286-890">
								<img class="aspect__img collection__img" src="images/home/gym-trainer-1.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-5 col-md-5 u-s-m-b-30">
							<span class="content-span-2 u-c-black">BEAST MODE ON</span>
							<blockquote class="testimonial__block-quote">
								<p>
									After you've gotten into the habit of going to the gym on a daily basis, the most
									difficult part will be giving it up. When you feel like giving up is the time you've
									really put in some work. </p>
							</blockquote>

							<blockquote>
								<p>
									The sport of bodybuilding is indeed not different to any other sport. If you want to
									be successful, you have to give one hundred percent of yourself to your workouts,
									food, and mental attitude. </p>
							</blockquote>
							</a></div>
						<div class="col-lg-7 col-md-7 u-s-m-b-30">
							<span class="content-span-2 u-c-black text-align-right text-margin-top">BE STRONGER THAN YOUR EXCUSES</span>
						</div>
						<div class="col-lg-5 col-md-5 u-s-m-b-30">

							<div class="aspect aspect--square">
								<img class="aspect__img" src="images/home/gym-trainer.png" alt="Gym Trainer">
							</div>
							<blockquote>
								<p>Let's face it: it's not always simple to get yourself to the gym. You know you should
									prioritize your health and fitness, but you might use some motivation to get started
									(or finish) your newest at-home workout.</p>
							</blockquote>
						</div>
					</div>
				</div>
			</div>

			<!--====== Section Content ======-->
		</div>
		<!--====== End - Section 1 ======-->


		<!--====== Section 3 ======-->
		<div class="u-s-p-b-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary u-s-m-b-12">FEATURED PRODUCT OF THIS
									MONTH</h1>

								<span class="section__span u-c-silver">WE SELECT ONE OF OUR FAVORITE PRODUCTS EACH MONTH TO HIGHLIGHT AND SHOW OFF.</span>

								<span class="section__span u-c-silver">ADD THESE ON YOUR CART.</span>
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
                        <?php
                        $videoLinks = ['sCgT9P175OU', '0kVN_s3LYrI'];
                        foreach ($featuredProducts as $index => $product) {
                            $image = explode(",", $product['productImage']);
                            $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                            ?>
							<div class="col-lg-6 col-md-6 u-s-m-b-30">
								<div class="product-o product-o--radius product-o--hover-off u-h-100">
									<div class="product-o__wrap">
										<div class="ugb-video-popup" data-video='<?php echo $videoLinks[$index]; ?>'>
											<div style="padding-top: 100%">
												<a href="#"></a>
												<span class="ugb-play-button">
                                           <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px"
                                                viewBox="0 0 50 50" version="1.1">
												<g id="surface1">
												<path style=" stroke:none;fill-rule:nonzero;fill:rgb(96.862745%,22.352941%,45.490196%);fill-opacity:1;"
												      d="M 50 25 C 50 38.789062 38.789062 50 25 50 C 11.210938 50 0 38.789062 0 25 C 0 11.210938 11.210938 0 25 0 C 38.789062 0 50 11.210938 50 25 Z M 50 25 "/>
												<path style=" stroke:none;fill-rule:nonzero;fill:rgb(86.666667%,2.745098%,44.705882%);fill-opacity:1;"
												      d="M 25 0 C 38.789062 0 50 11.210938 50 25 C 50 38.789062 38.789062 50 25 50 "/>
												<path style=" stroke:none;fill-rule:nonzero;fill:rgb(92.941176%,14.901961%,43.137255%);fill-opacity:1;"
												      d="M 7.339844 7.339844 C 17.097656 -2.417969 32.902344 -2.417969 42.660156 7.339844 C 52.417969 17.097656 52.417969 32.902344 42.660156 42.660156 "/>
												<path style=" stroke:none;fill-rule:nonzero;fill:rgb(86.666667%,2.745098%,44.705882%);fill-opacity:1;"
												      d="M 21.453125 36.371094 C 21.289062 36.371094 21.046875 36.289062 20.886719 36.210938 C 20.484375 36.046875 20.160156 35.566406 20.160156 35.160156 L 20.160156 20.082031 C 20.160156 19.675781 20.484375 19.195312 20.886719 19.03125 C 21.289062 18.871094 21.773438 18.871094 22.175781 19.113281 L 32.417969 26.695312 C 32.742188 26.933594 32.902344 27.257812 32.902344 27.660156 C 32.902344 28.066406 32.742188 28.386719 32.417969 28.628906 L 22.175781 36.210938 C 21.933594 36.289062 21.695312 36.371094 21.453125 36.371094 Z M 21.453125 36.371094 "/>
												<path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;"
												      d="M 21.453125 33.710938 C 21.289062 33.710938 21.046875 33.628906 20.886719 33.546875 C 20.484375 33.386719 20.160156 32.902344 20.160156 32.5 L 20.160156 17.417969 C 20.160156 17.015625 20.484375 16.53125 20.886719 16.371094 C 21.289062 16.210938 21.773438 16.210938 22.175781 16.453125 L 32.417969 24.03125 C 32.742188 24.273438 32.902344 24.597656 32.902344 25 C 32.902344 25.402344 32.742188 25.726562 32.417969 25.96875 L 22.175781 33.546875 C 21.933594 33.628906 21.695312 33.710938 21.453125 33.710938 Z M 21.453125 33.710938 "/>
												</g>
											</svg>

                                        </span>
											</div>
										</div>
										<img style="margin-top: -93%" class="aspect__img"
										     src='<?php echo $imagePath; ?>'
										     alt='<?php echo $product['productName']; ?>'></a>
										<div class="product-o__special-count-wrap">
											<div class="countdown countdown--style-special"
											     data-countdown="2022-10-30"></div>
										</div>
									</div>

									<span class="product-o__name">

                                        <a href="product-detail.php?productId=<?php echo $product['id']; ?>"><?php echo $product['productName']; ?></a></span>
									<div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
												class="fas fa-star"></i><i class="fas fa-star"></i><i
												class="fas fa-star"></i><i class="fas fa-star"></i>
									</div>

									<span class="product-o__price">
	                                <?php
                                    echo number_format($product['productPrice']) . " MMK"; ?>
	                                </span>
								</div>
							</div>
                            <?php
                        }
                        ?>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 3 ======-->

		<!--====== Section 5 ======-->
		<div class="banner-bg">

			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="banner-bg__countdown">
								<div class="countdown countdown--style-banner" data-countdown="2022/10/30"></div>
							</div>
							<div class="banner-bg__wrap">
								<div class="banner-bg__text-1">
									<span class="u-c-white">Global Offers</span></div>
								<div class="banner-bg__text-2">
									<span class="u-c-white">Don't Miss The Offer!</span></div>

								<span class="banner-bg__text-block banner-bg__text-3 u-c-white">Enjoy Free Shipping when you buy 2 items and above!</span>

								<a class="banner-bg__shop-now btn--e-secondary" href="gallery.php">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 5 ======-->


		<!--====== Section 6 ======-->
		<div class="u-s-p-y-60">

		</div>
		<!--====== End - Section 6 ======-->


		<!--====== Section 7 ======-->
		<div class="u-s-p-b-60">
			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary u-s-m-b-12">Tutorials for using Home Gym
									Equipments</h1>

								<span class="section__span u-c-silver">You can learn how to use our products here</span>
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
						<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--video">
								<div class="ugb-video-popup" style="background: #000;" data-video='3BCBfricSD8'>
									<div class="ugb-video-preview" style="
                                    background-image: url(https://img.youtube.com/vi/3BCBfricSD8/maxresdefault.jpg);
                                    "></div>
									<div class="ugb-video-wrapper">
										<a href="#"></a>
										<span class="ugb-play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 34 34"><path
			                                            d="M17 34C7.6 34 0 26.4 0 17S7.6 0 17 0s17 7.6 17 17-7.6 17-17 17zm0-32C8.7 2 2 8.7 2 17s6.7 15 15 15 15-6.7 15-15S25.3 2 17 2z"/><path
			                                            d="M12 25.7V8.3L27 17l-15 8.7zm2-14v10.5l9-5.3-9-5.2z"/></svg>
                                        </span>
									</div>
								</div>
							</div>
							<div class="promotion__content">
								<div class="promotion__text-wrap">
									<div class="promotion__text-1">

										<span class="u-c-secondary">Tutorial 1</span></div>
									<div class="promotion__text-2">
										<span class="u-c-brand">Leg Curl combination machine</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--video">
								<div class="ugb-video-popup" style="background: #000;" data-video='G_lNqeQVH-E'>
									<div class="ugb-video-preview" style="
                                    background-image: url(https://img.youtube.com/vi/G_lNqeQVH-E/maxresdefault.jpg);
                                    "></div>
									<div class="ugb-video-wrapper">
										<a href="#"></a>
										<span class="ugb-play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 34 34"><path
			                                            d="M17 34C7.6 34 0 26.4 0 17S7.6 0 17 0s17 7.6 17 17-7.6 17-17 17zm0-32C8.7 2 2 8.7 2 17s6.7 15 15 15 15-6.7 15-15S25.3 2 17 2z"/><path
			                                            d="M12 25.7V8.3L27 17l-15 8.7zm2-14v10.5l9-5.3-9-5.2z"/></svg>
                                        </span>
									</div>
								</div>
							</div>
							<div class="promotion__content">
								<div class="promotion__text-wrap">
									<div class="promotion__text-1">

										<span class="u-c-secondary">Tutorial 2</span></div>
									<div class="promotion__text-2">
										<span class="u-c-brand">Functional trainer machine</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--video">
								<div class="ugb-video-popup" style="background: #000;" data-video='5bcCMeSCXlI'>
									<div class="ugb-video-preview" style="
                                    background-image: url(https://img.youtube.com/vi/5bcCMeSCXlI/maxresdefault.jpg);
                                    "></div>
									<div class="ugb-video-wrapper">
										<a href="#"></a>
										<span class="ugb-play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 34 34"><path
			                                            d="M17 34C7.6 34 0 26.4 0 17S7.6 0 17 0s17 7.6 17 17-7.6 17-17 17zm0-32C8.7 2 2 8.7 2 17s6.7 15 15 15 15-6.7 15-15S25.3 2 17 2z"/><path
			                                            d="M12 25.7V8.3L27 17l-15 8.7zm2-14v10.5l9-5.3-9-5.2z"/></svg>
                                        </span>
									</div>
								</div>
							</div>
							<div class="promotion__content">
								<div class="promotion__text-wrap">
									<div class="promotion__text-1">

										<span class="u-c-secondary">Tutorial 3</span></div>
									<div class="promotion__text-2">
										<span class="u-c-brand">The XPK Parallettes</span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--video">
								<div class="ugb-video-popup" style="background: #000;" data-video='VnYUMgasU-E'>
									<div class="ugb-video-preview" style="
                                    background-image: url(https://img.youtube.com/vi/VnYUMgasU-E/maxresdefault.jpg);
                                    "></div>
									<div class="ugb-video-wrapper">
										<a href="#"></a>
										<span class="ugb-play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 34 34"><path
			                                            d="M17 34C7.6 34 0 26.4 0 17S7.6 0 17 0s17 7.6 17 17-7.6 17-17 17zm0-32C8.7 2 2 8.7 2 17s6.7 15 15 15 15-6.7 15-15S25.3 2 17 2z"/><path
			                                            d="M12 25.7V8.3L27 17l-15 8.7zm2-14v10.5l9-5.3-9-5.2z"/></svg>
                                        </span>
									</div>
								</div>
							</div>
							<div class="promotion__content">
								<div class="promotion__text-wrap">
									<div class="promotion__text-1">

										<span class="u-c-secondary">Tutorial 4</span></div>
									<div class="promotion__text-2">
										<span class="u-c-brand">V950 Cross Trainer Machine</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--video">
								<div class="ugb-video-popup" style="background: #000;" data-video='baY7kuEcsVg'>
									<div class="ugb-video-preview" style="
                                    background-image: url(https://img.youtube.com/vi/baY7kuEcsVg/maxresdefault.jpg);
                                    "></div>
									<div class="ugb-video-wrapper">
										<a href="#"></a>
										<span class="ugb-play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 34 34"><path
			                                            d="M17 34C7.6 34 0 26.4 0 17S7.6 0 17 0s17 7.6 17 17-7.6 17-17 17zm0-32C8.7 2 2 8.7 2 17s6.7 15 15 15 15-6.7 15-15S25.3 2 17 2z"/><path
			                                            d="M12 25.7V8.3L27 17l-15 8.7zm2-14v10.5l9-5.3-9-5.2z"/></svg>
                                        </span>
									</div>
								</div>
							</div>
							<div class="promotion__content">
								<div class="promotion__text-wrap">
									<div class="promotion__text-1">

										<span class="u-c-secondary">Tutorial 5</span></div>
									<div class="promotion__text-2">
										<span class="u-c-brand">HGK37 Home Gym machine</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="aspect aspect--bg-grey aspect--video">
								<div class="ugb-video-popup" style="background: #000;" data-video='qJRfqRAVBWw'>
									<div class="ugb-video-preview" style="
                                    background-image: url(https://img.youtube.com/vi/qJRfqRAVBWw/maxresdefault.jpg);
                                    "></div>
									<div class="ugb-video-wrapper">
										<a href="#"></a>
										<span class="ugb-play-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 viewBox="0 0 34 34"><path
			                                            d="M17 34C7.6 34 0 26.4 0 17S7.6 0 17 0s17 7.6 17 17-7.6 17-17 17zm0-32C8.7 2 2 8.7 2 17s6.7 15 15 15 15-6.7 15-15S25.3 2 17 2z"/><path
			                                            d="M12 25.7V8.3L27 17l-15 8.7zm2-14v10.5l9-5.3-9-5.2z"/></svg>
                                        </span>
									</div>
								</div>
							</div>
							<div class="promotion__content">
								<div class="promotion__text-wrap">
									<div class="promotion__text-1">

										<span class="u-c-secondary">Tutorial 6</span></div>
									<div class="promotion__text-2">
										<span class="u-c-brand">SPG2000 Home Gym Equipment</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 7 ======-->


		<!--====== Section 8 ======-->
		<div class="u-s-p-b-60">

			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
							<div class="column-product">

								<span class="column-product__title u-c-secondary u-s-m-b-25">LATEST PRODUCTS</span>
								<ul class="column-product__list">
                                    <?php
                                    foreach ($latestProducts as $product) {
                                        $image = explode(",", $product['productImage']);
                                        $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                        ?>
										<li class="column-product__item">
											<div class="product-l">
												<div class="product-l__img-wrap">

													<a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
													   href="product-detail.php?productId=<?php echo $product['id']; ?>">

														<img class="aspect__img" src="<?php echo $imagePath; ?>"
														     alt="<?php echo $product['productName']; ?>"></a>
												</div>
												<div class="product-l__info-wrap">
                                                <span class="product-l__name">

                                                        <a href="product-detail.php?productId=<?php echo $product['id']; ?>"><?php echo $product['productName']; ?></a></span>

													<span class="product-l__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></span>
												</div>
											</div>
										</li>
                                    <?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
							<div class="column-product">
								<span class="column-product__title u-c-secondary u-s-m-b-25">SECOND HAND PRODUCTS</span>
								<ul class="column-product__list">
                                    <?php
                                    foreach ($secondHandProducts as $product) {
                                        $image = explode(",", $product['productImage']);
                                        $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                        ?>
										<li class="column-product__item">
											<div class="product-l">
												<div class="product-l__img-wrap">

													<a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
													   href="product-detail.php?productId=<?php echo $product['id']; ?>">

														<img class="aspect__img" src="<?php echo $imagePath; ?>"
														     alt="<?php echo $product['productName']; ?>"></a></div>
												<div class="product-l__info-wrap">

                                                <span class="product-l__name">

                                                        <a href="product-detail.php?productId=<?php echo $product['id']; ?>"><?php echo $product['productName']; ?></a></span>

													<span class="product-l__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></span>
												</div>
											</div>
										</li>
                                    <?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
							<div class="column-product">

								<span class="column-product__title u-c-secondary u-s-m-b-25">PREMIUM PRODUCTS</span>
								<ul class="column-product__list">
                                    <?php
                                    foreach ($premiumProducts

                                    as $product) {
                                    $image = explode(",", $product['productImage']);
                                    $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                    ?>
									<li class="column-product__item">
										<div class="product-l">
											<div class="product-l__img-wrap">
												<a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
												   href="product-detail.php?productId=<?php echo $product['id']; ?>">
													<img class="aspect__img"
													     src="<?php echo $imagePath; ?>" alt="<?php echo $product['productName']; ?>"></a></div>
											<div class="product-l__info-wrap">
												<span class="product-l__name">
                                                        <a href="product-detail.php?productId=<?php echo $product['id']; ?>"><?php echo $product['productName']; ?></a></span>
												<span class="product-l__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></span>
											</div>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 8 ======-->


		<!--====== Section 9 ======-->
		<div class="u-s-p-b-60">

			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 u-s-m-b-30">
							<div class="service u-h-100">
								<div class="service__icon"><i class="fas fa-truck"></i></div>
								<div class="service__info-wrap">

									<span class="service__info-text-1">Free Shipping</span>

									<span class="service__info-text-2">Free shipping on all <span id="location"></span> order</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 u-s-m-b-30">
							<div class="service u-h-100">
								<div class="service__icon"><i class="fas fa-redo"></i></div>
								<div class="service__info-wrap">

									<span class="service__info-text-1">Shop with Confidence</span>

									<span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 u-s-m-b-30">
							<div class="service u-h-100">
								<div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
								<div class="service__info-wrap">

									<span class="service__info-text-1">24/7 Help Center</span>

									<span class="service__info-text-2">24/7 service to provide a stress-free shopping expedition</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 9 ======-->


		<!--====== Section 10 ======-->
<!--		<div class="u-s-p-b-60">-->
<!---->
<!--			====== Section Intro ======-->
<!--			<div class="section__intro u-s-m-b-46">-->
<!--				<div class="container">-->
<!--					<div class="row">-->
<!--						<div class="col-lg-12">-->
<!--							<div class="section__text-wrap">-->
<!--								<h1 class="section__heading u-c-secondary u-s-m-b-12">LATEST FROM BLOG</h1>-->
<!---->
<!--								<span class="section__span u-c-silver">START YOU DAY WITH FRESH AND LATEST NEWS</span>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			====== End - Section Intro ======-->
<!---->
<!---->
<!--			====== Section Content ======-->
<!--			<div class="section__content">-->
<!--				<div class="container">-->
<!--					<div class="row">-->
<!--						<div class="col-lg-4 col-md-6 u-s-m-b-30">-->
<!--							<div class="bp-mini bp-mini--img u-h-100">-->
<!--								<div class="bp-mini__thumbnail">-->
<!---->
<!--									====== Image Code ======-->
<!---->
<!--									<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"-->
<!--									   href="blog-detail.html">-->
<!---->
<!--										<img class="aspect__img" src="images/blog/post-2.jpg" alt=""></a>-->
<!--									====== End - Image Code ======-->
<!--								</div>-->
<!--								<div class="bp-mini__content">-->
<!--									<div class="bp-mini__stat">-->
<!---->
<!--                                            <span class="bp-mini__stat-wrap">-->
<!---->
<!--                                                <span class="bp-mini__publish-date">-->
<!---->
<!--                                                    <a>-->
<!---->
<!--                                                        <span>25 February 2018</span></a></span></span>-->
<!---->
<!--										<span class="bp-mini__stat-wrap">-->
<!---->
<!--                                                <span class="bp-mini__preposition">By</span>-->
<!---->
<!--                                                <span class="bp-mini__author">-->
<!---->
<!--                                                    <a href="#">Dayle</a></span></span>-->
<!---->
<!--										<span class="bp-mini__stat">-->
<!---->
<!--                                                <span class="bp-mini__comment">-->
<!---->
<!--                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>-->
<!---->
<!--                                                        <span>8</span></a></span></span></div>-->
<!--									<div class="bp-mini__category">-->
<!---->
<!--										<a>Learning</a>-->
<!---->
<!--										<a>News</a>-->
<!---->
<!--										<a>Health</a></div>-->
<!---->
<!--									<span class="bp-mini__h1">-->
<!---->
<!--                                            <a href="blog-detail.html">Life is an extraordinary Adventure</a></span>-->
<!--									<p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and-->
<!--										typesetting industry.</p>-->
<!--									<div class="blog-t-w">-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="col-lg-4 col-md-6 u-s-m-b-30">-->
<!--							<div class="bp-mini bp-mini--img u-h-100">-->
<!--								<div class="bp-mini__thumbnail">-->
<!---->
<!--									====== Image Code ======-->
<!---->
<!--									<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"-->
<!--									   href="blog-detail.html">-->
<!---->
<!--										<img class="aspect__img" src="images/blog/post-12.jpg" alt=""></a>-->
<!--									====== End - Image Code ======-->
<!--								</div>-->
<!--								<div class="bp-mini__content">-->
<!--									<div class="bp-mini__stat">-->
<!---->
<!--                                            <span class="bp-mini__stat-wrap">-->
<!---->
<!--                                                <span class="bp-mini__publish-date">-->
<!---->
<!--                                                    <a>-->
<!---->
<!--                                                        <span>25 February 2018</span></a></span></span>-->
<!---->
<!--										<span class="bp-mini__stat-wrap">-->
<!---->
<!--                                                <span class="bp-mini__preposition">By</span>-->
<!---->
<!--                                                <span class="bp-mini__author">-->
<!---->
<!--                                                    <a href="#">Dayle</a></span></span>-->
<!---->
<!--										<span class="bp-mini__stat">-->
<!---->
<!--                                                <span class="bp-mini__comment">-->
<!---->
<!--                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>-->
<!---->
<!--                                                        <span>8</span></a></span></span></div>-->
<!--									<div class="bp-mini__category">-->
<!---->
<!--										<a>Learning</a>-->
<!---->
<!--										<a>News</a>-->
<!---->
<!--										<a>Health</a></div>-->
<!---->
<!--									<span class="bp-mini__h1">-->
<!---->
<!--                                            <a href="blog-detail.html">Wait till its open</a></span>-->
<!--									<p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and-->
<!--										typesetting industry.</p>-->
<!--									<div class="blog-t-w">-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="col-lg-4 col-md-6 u-s-m-b-30">-->
<!--							<div class="bp-mini bp-mini--img u-h-100">-->
<!--								<div class="bp-mini__thumbnail">-->
<!---->
<!--									====== Image Code ======-->
<!---->
<!--									<a class="aspect aspect--bg-grey aspect--1366-768 u-d-block"-->
<!--									   href="blog-detail.html">-->
<!---->
<!--										<img class="aspect__img" src="images/blog/post-5.jpg" alt=""></a>-->
<!--									====== End - Image Code ======-->
<!--								</div>-->
<!--								<div class="bp-mini__content">-->
<!--									<div class="bp-mini__stat">-->
<!---->
<!--                                            <span class="bp-mini__stat-wrap">-->
<!---->
<!--                                                <span class="bp-mini__publish-date">-->
<!---->
<!--                                                    <a>-->
<!---->
<!--                                                        <span>25 February 2018</span></a></span></span>-->
<!---->
<!--										<span class="bp-mini__stat-wrap">-->
<!---->
<!--                                                <span class="bp-mini__preposition">By</span>-->
<!---->
<!--                                                <span class="bp-mini__author">-->
<!---->
<!--                                                    <a href="#">Dayle</a></span></span>-->
<!---->
<!--										<span class="bp-mini__stat">-->
<!---->
<!--                                                <span class="bp-mini__comment">-->
<!---->
<!--                                                    <a href="blog-detail.html"><i class="far fa-comments u-s-m-r-4"></i>-->
<!---->
<!--                                                        <span>8</span></a></span></span></div>-->
<!--									<div class="bp-mini__category">-->
<!---->
<!--										<a>Learning</a>-->
<!---->
<!--										<a>News</a>-->
<!---->
<!--										<a>Health</a></div>-->
<!---->
<!--									<span class="bp-mini__h1">-->
<!---->
<!--                                            <a href="blog-detail.html">Tell me difference between smoke and vape</a></span>-->
<!--									<p class="bp-mini__p">Lorem Ipsum is simply dummy text of the printing and-->
<!--										typesetting industry.</p>-->
<!--									<div class="blog-t-w">-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Travel</a>-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Culture</a>-->
<!---->
<!--										<a class="gl-tag btn--e-transparent-hover-brand-b-2">Place</a></div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			====== End - Section Content ======-->
<!--		</div>-->
		<!--====== End - Section 10 ======-->


		<!--====== Section 12 ======-->
		<div class="u-s-p-b-60">
			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary u-s-m-b-12">Trusted By</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Intro ======-->
			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<!--====== Brand Slider ======-->
					<div class="slider-fouc">
						<div class="owl-carousel" id="brand-slider" data-item="5">
							<div class="brand-slide">
								<img src="images/brand/b1.png" alt="Precor logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b2.png" alt="York Barbell logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b3.png" alt="Fit King logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b4.png" alt="Legend Fitness logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b5.png" alt="Finnlo Fitness logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b6.png" alt="BH Fitness logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b7.png" alt="Fit n Fast logo"></div>
							<div class="brand-slide">
								<img src="images/brand/b8.png" alt="Anytime Fitness logo"></div>

						</div>
					</div>
					<!--====== End - Brand Slider ======-->
				</div>
			</div>
			<!--====== End - Section Content ======-->
			<?php if(isset($_SESSION['cid'])){ ?>

			<div class="section__content u-s-m-t-20">
				<div class="panel">
					<span class="section__heading u-c-secondary">Number of views : &nbsp;</span>
					<div class="box">
						<p class="counter section__heading u-c-secondary" data-speed="1"><?php echo $viewCount;?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!--====== End - Section 12 ======-->
	</div>
	<!--====== End - App Content ======-->


	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->

</div><!--====== End - Main App ======-->


<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->

<?php include 'components/scripts.php'; ?>
<script>
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    document.getElementById("location").innerHTML = "Yangon";

    let popUp = document.getElementById("cookiePopup");
    //When user clicks the accept button
    document.getElementById("denyCookie").addEventListener("click", function () {
        //Hide the popup
        popUp.classList.add("hide");
        popUp.classList.remove("show");
        sessionStorage.setItem("cookieDenied", "true");
    });
    document.getElementById("acceptCookie").addEventListener("click", () => {
        //Create date object
        let d = new Date();
        //Increment the current time by 1 minute (cookie will expire after 1 minute)
        d.setMinutes(2 + d.getMinutes());
        $.getJSON('https://json.geoiplookup.io/?callback=?', function (data) {
            let userInfo = JSON.stringify(data);
            document.cookie = "info=" + userInfo + "; expires = " + d + ";";
        });
        //Hide the popup
        popUp.classList.add("hide");
        popUp.classList.remove("show");
    });
    //Check if cookie is already present
    const checkCookie = () => {
        //Read the cookie and split on "="
        let input = document.cookie.split("=");
        //Check for our cookie
        if (input[0] === "info") {
            //Hide the popup
            const userInfo = getCookie("info");
            const countryName = JSON.parse(userInfo).country_name;
            document.getElementById("location").innerHTML = countryName
            popUp.classList.add("hide");
            popUp.classList.remove("show");
        } else {
            //Show the popup
            if (sessionStorage.getItem("cookieDenied") !== "true") {
                popUp.classList.add("show");
                popUp.classList.remove("hide");
            }
        }
    };
    //Check if cookie exists when page loads
    window.onload = () => {
        setTimeout(() => {
            checkCookie();
        }, 2000);
    }

    let counter = document.querySelectorAll(".counter");
    let arr = Array.from(counter);

    arr.map((item) => {
        let count = item.innerHTML;
        item.innerHTML = 0;
        let counterValue = 1;

        function counterUP() {
            item.innerHTML = counterValue++;

            if (counterValue > count) {
                clearInterval(counting);
            }
        }

        let counting = setInterval(() => {
            counterUP();
        }, item.dataset.speed / count);
    });
</script>
<!--custom script-->
<script src="https://cdn.jsdelivr.net/npm/bigpicture@1.2.3/dist/BigPicture.min.js"></script>
