<?php
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
        <?php include "components/cookiePopup.php"; ?>
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

                                        <a href="product-detail.html"><?php echo $product['productName']; ?></a></span>
									<div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
												class="fas fa-star"></i><i class="fas fa-star"></i><i
												class="fas fa-star"></i><i class="fas fa-star"></i>
									</div>

									<span class="product-o__price">
	                                <?php
                                    echo number_format($product['productPrice']) . " MMK"; ?>
	                                <span class="product-o__discount">
		                                <?php
                                        echo number_format($product['productPrice'] + (rand(3, 80) * 1000)) . " MMK"; ?>
	                                </span></span>
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

								<a class="banner-bg__shop-now btn--e-secondary" href="shop-side-version-2.html">Shop
									Now</a>
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
													   href="product-detail.html">

														<img class="aspect__img" src="<?php echo $imagePath; ?>"
														     alt="<?php echo $product['productName']; ?>"></a>
												</div>
												<div class="product-l__info-wrap">
                                                <span class="product-l__name">

                                                        <a href="product-detail.html"><?php echo $product['productName']; ?></a></span>

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
													   href="product-detail.html">

														<img class="aspect__img" src="<?php echo $imagePath; ?>"
														     alt="<?php echo $product['productName']; ?>"></a></div>
												<div class="product-l__info-wrap">

                                                <span class="product-l__name">

                                                        <a href="product-detail.html"><?php echo $product['productName']; ?></a></span>

													<span class="product-l__price"><?php echo number_format($product['productPrice']) . " MMK"; ?>

                                                        <span class="product-l__discount"><?php
                                                            echo number_format($product['productPrice'] + (rand(3, 80) * 1000)) . " MMK"; ?></span></span>
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
												   href="product-detail.html">
													<img class="aspect__img"
													     src="<?php echo $imagePath; ?>" alt="<?php echo $product['productName']; ?>"></a></div>
											<div class="product-l__info-wrap">
												<span class="product-l__name">
                                                        <a href="product-detail.html"><?php echo $product['productName']; ?></a></span>
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

									<span class="service__info-text-2">Free shipping on all Yangon order</span>
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
		<div class="u-s-p-b-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary u-s-m-b-12">LATEST FROM BLOG</h1>

								<span class="section__span u-c-silver">START YOU DAY WITH FRESH AND LATEST NEWS</span>
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
		</div>
		<!--====== End - Section 12 ======-->
	</div>
	<!--====== End - App Content ======-->


	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->


	<!--====== Quick Look Modal ======-->
	<!--	<div class="modal fade" id="quick-look">-->
	<!--		<div class="modal-dialog modal-dialog-centered">-->
	<!--			<div class="modal-content modal--shadow">-->
	<!---->
	<!--				<button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>-->
	<!--				<div class="modal-body">-->
	<!--					<div class="row">-->
	<!--						<div class="col-lg-5">-->
	<!---->
	<!--							<!--====== Product Breadcrumb ======-->-->
	<!--							<div class="pd-breadcrumb u-s-m-b-30">-->
	<!--								<ul class="pd-breadcrumb__list">-->
	<!--									<li class="has-separator">-->
	<!---->
	<!--										<a href="index.hml">Home</a></li>-->
	<!--									<li class="has-separator">-->
	<!---->
	<!--										<a href="shop-side-version-2.html">Electronics</a></li>-->
	<!--									<li class="has-separator">-->
	<!---->
	<!--										<a href="shop-side-version-2.html">DSLR Cameras</a></li>-->
	<!--									<li class="is-marked">-->
	<!---->
	<!--										<a href="shop-side-version-2.html">Nikon Cameras</a></li>-->
	<!--								</ul>-->
	<!--							</div>-->
	<!--							<!--====== End - Product Breadcrumb ======-->-->
	<!---->
	<!---->
	<!--							<!--====== Product Detail ======-->-->
	<!--							<div class="pd u-s-m-b-30">-->
	<!--								<div class="pd-wrap">-->
	<!--									<div id="js-product-detail-modal">-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-t-15">-->
	<!--									<div id="js-product-detail-modal-thumbnail">-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>-->
	<!--										<div>-->
	<!---->
	<!--											<img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--							<!--====== End - Product Detail ======-->-->
	<!--						</div>-->
	<!--						<div class="col-lg-7">-->
	<!---->
	<!--							<!--====== Product Right Side Details ======-->-->
	<!--							<div class="pd-detail">-->
	<!--								<div>-->
	<!---->
	<!--									<span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span></div>-->
	<!--								<div>-->
	<!--									<div class="pd-detail__inline">-->
	<!---->
	<!--										<span class="pd-detail__price">$6.99</span>-->
	<!---->
	<!--										<span class="pd-detail__discount">(76% OFF)</span>-->
	<!--										<del class="pd-detail__del">$28.97</del>-->
	<!--									</div>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!--									<div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i-->
	<!--												class="fas fa-star"></i><i class="fas fa-star"></i><i-->
	<!--												class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>-->
	<!---->
	<!--										<span class="pd-detail__review u-s-m-l-4">-->
	<!---->
	<!--                                                <a href="product-detail.html">23 Reviews</a></span></div>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!--									<div class="pd-detail__inline">-->
	<!---->
	<!--										<span class="pd-detail__stock">200 in stock</span>-->
	<!---->
	<!--										<span class="pd-detail__left">Only 2 left</span></div>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!---->
	<!--									<span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!--									<div class="pd-detail__inline">-->
	<!---->
	<!--                                            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>-->
	<!---->
	<!--                                                <a href="signin.html">Add to Wishlist</a>-->
	<!---->
	<!--                                                <span class="pd-detail__click-count">(222)</span></span></div>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!--									<div class="pd-detail__inline">-->
	<!---->
	<!--                                            <span class="pd-detail__click-wrap"><i-->
	<!--			                                            class="far fa-envelope u-s-m-r-6"></i>-->
	<!---->
	<!--                                                <a href="signin.html">Email me When the price drops</a>-->
	<!---->
	<!--                                                <span class="pd-detail__click-count">(20)</span></span></div>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!--									<ul class="pd-social-list">-->
	<!--										<li>-->
	<!---->
	<!--											<a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>-->
	<!--										</li>-->
	<!--										<li>-->
	<!---->
	<!--											<a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>-->
	<!--										</li>-->
	<!--										<li>-->
	<!---->
	<!--											<a class="s-insta--color-hover" href="#"><i-->
	<!--														class="fab fa-instagram"></i></a></li>-->
	<!--										<li>-->
	<!---->
	<!--											<a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>-->
	<!--										</li>-->
	<!--										<li>-->
	<!---->
	<!--											<a class="s-gplus--color-hover" href="#"><i-->
	<!--														class="fab fa-google-plus-g"></i></a></li>-->
	<!--									</ul>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!--									<form class="pd-detail__form">-->
	<!--										<div class="pd-detail-inline-2">-->
	<!--											<div class="u-s-m-b-15">-->
	<!---->
	<!--												<!--====== Input Counter ======-->-->
	<!--												<div class="input-counter">-->
	<!---->
	<!--													<span class="input-counter__minus fas fa-minus"></span>-->
	<!---->
	<!--													<input class="input-counter__text input-counter--text-primary-style"-->
	<!--													       type="text" value="1" data-min="1" data-max="1000">-->
	<!---->
	<!--													<span class="input-counter__plus fas fa-plus"></span></div>-->
	<!--												<!--====== End - Input Counter ======-->-->
	<!--											</div>-->
	<!--											<div class="u-s-m-b-15">-->
	<!---->
	<!--												<button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>-->
	<!--											</div>-->
	<!--										</div>-->
	<!--									</form>-->
	<!--								</div>-->
	<!--								<div class="u-s-m-b-15">-->
	<!---->
	<!--									<span class="pd-detail__label u-s-m-b-8">Product Policy:</span>-->
	<!--									<ul class="pd-detail__policy-list">-->
	<!--										<li><i class="fas fa-check-circle u-s-m-r-8"></i>-->
	<!---->
	<!--											<span>Buyer Protection.</span></li>-->
	<!--										<li><i class="fas fa-check-circle u-s-m-r-8"></i>-->
	<!---->
	<!--											<span>Full Refund if you don't receive your order.</span></li>-->
	<!--										<li><i class="fas fa-check-circle u-s-m-r-8"></i>-->
	<!---->
	<!--											<span>Returns accepted if product not as described.</span></li>-->
	<!--									</ul>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--							<!--====== End - Product Right Side Details ======-->-->
	<!--						</div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--====== End - Quick Look Modal ======-->


	<!--====== Add to Cart Modal ======-->
	<!--	<div class="modal fade" id="add-to-cart">-->
	<!--		<div class="modal-dialog modal-dialog-centered">-->
	<!--			<div class="modal-content modal-radius modal-shadow">-->
	<!---->
	<!--				<button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>-->
	<!--				<div class="modal-body">-->
	<!--					<div class="row">-->
	<!--						<div class="col-lg-6 col-md-12">-->
	<!--							<div class="success u-s-m-b-30">-->
	<!--								<div class="success__text-wrap"><i class="fas fa-check"></i>-->
	<!---->
	<!--									<span>Item is added successfully!</span></div>-->
	<!--								<div class="success__img-wrap">-->
	<!---->
	<!--									<img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt=""></div>-->
	<!--								<div class="success__info-wrap">-->
	<!---->
	<!--									<span class="success__name">Beats Bomb Wireless Headphone</span>-->
	<!---->
	<!--									<span class="success__quantity">Quantity: 1</span>-->
	<!---->
	<!--									<span class="success__price">$170.00</span></div>-->
	<!--							</div>-->
	<!--						</div>-->
	<!--						<div class="col-lg-6 col-md-12">-->
	<!--							<div class="s-option">-->
	<!---->
	<!--								<span class="s-option__text">1 item (s) in your cart</span>-->
	<!--								<div class="s-option__link-box">-->
	<!---->
	<!--									<a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE-->
	<!--										SHOPPING</a>-->
	<!---->
	<!--									<a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW CART</a>-->
	<!---->
	<!--									<a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO-->
	<!--										CHECKOUT</a></div>-->
	<!--							</div>-->
	<!--						</div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--====== End - Add to Cart Modal ======-->


	<!--====== Newsletter Subscribe Modal ======-->
	<!--    <div class="modal fade new-l" id="newsletter-modal">-->
	<!--        <div class="modal-dialog modal-dialog-centered">-->
	<!--            <div class="modal-content modal&#45;&#45;shadow">-->

	<!--                <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>-->
	<!--                <div class="modal-body">-->
	<!--                    <div class="row u-s-m-x-0">-->
	<!--                        <div class="col-lg-6 new-l__col-1 u-s-p-x-0">-->

	<!--                            <a class="new-l__img-wrap u-d-block" href="shop-side-version-2.html">-->

	<!--                                <img class="u-img-fluid u-d-block" src="https://www.syzygy.co.uk/app/themes/syzygy/assets/illustrations/cookie-layer.svg" alt=""></a>-->
	<!--                        </div>-->
	<!--                        <div class="col-lg-6 new-l__col-2">-->
	<!--                            <div class="new-l__section u-s-m-t-30">-->
	<!--                                <div class="u-s-m-b-8 new-l&#45;&#45;center">-->
	<!--                                    <h3 class="new-l__h3">We value your privacy</h3>-->
	<!--                                </div>-->
	<!--                                <div class="u-s-m-b-30 new-l&#45;&#45;center">-->
	<!--                                    <p class="new-l__p1">We use cookies to enhance your browsing experience, serve-->
	<!--                                        personalized ads or content, and analyze our traffic. By clicking "Accept All",-->
	<!--                                        you consent to our use of cookies.</p>-->
	<!--                                </div>-->

	<!--                                <div class="u-s-m-b-15 new-l&#45;&#45;center">-->
	<!--                                    <button class="shop-now-link btn&#45;&#45;e-brand">Accept All</button>-->
	<!--                                    <br>-->
	<!--                                    <a class="new-l__link" data-dismiss="modal"><u>No Thanks</u></a></div>-->
	<!--                                </div>-->
	<!--                            </div>-->
	<!--                        </div>-->
	<!--                    </div>-->
	<!--                </div>-->
	<!--            </div>-->
	<!--        </div>-->
</div><!--====== End - Main App ======-->


<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->

<?php include 'components/scripts.php'; ?>

<!--custom script-->
<script src="https://cdn.jsdelivr.net/npm/bigpicture@1.2.3/dist/BigPicture.min.js"></script>
