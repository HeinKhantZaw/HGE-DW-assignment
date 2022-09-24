<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$GLOBALS['title'] = "HGE - Workshop";
include 'components/header.php';
include 'db/connect.php';
if (isset($_SESSION['cid'])) {
    $query = "SELECT * FROM customer WHERE id = '" . $_SESSION['cid'] . "'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $customerEmail = $row['customerEmail'];
}
if (isset($_POST['bookBtn'])) {
    $id = $_SESSION['cid'];
    $email = $_POST['bookingEmail'];
    $bookingType = $_POST['bookingType'];
    $query = "INSERT INTO `bookings`(`customerId`,`email`, `bookingType`) VALUES ('$id','$email','$bookingType')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<div class="message-info success">
						<strong>Booking Successful</strong> - We will reach out to you soon!
					</div>';
    } else {
        echo '<div class="message-info danger">
						<strong>Booking Error</strong> - Something went wrong.
					</div>';
    }
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

									<a href="workshop.php">Workshop</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->

		<div class="section__content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="about">
							<div class="about__container">
								<div class="about__info">
									<h2 class="about__h2">Welcome to our workshop!</h2>
									<div class="about__p-wrap">
										<p class="about__p">In HGE, We are aware of how important it is to provide
											high-quality
											repair and maintenance services for gym equipment on a continuous basis. Not
											only are we certain that we will be able to resolve your problem, but we are
											also dedicated to doing it in a way that ensures long-term success at an
											affordable price. This is the reason why we provide ongoing maintenance
											plans. Large-scale repairs can be both expensive and inconvenient to deal
											with. Get rid of the sign that says "out of order" and sign up for
											preventative maintenance instead; we promise that our qualified specialists
											will be able to fix your equipment, which means that sudden equipment
											failures will no longer be an issue!</p>
									</div>
                                    <?php
                                    if (isset($_SESSION['cid'])) {
                                        echo "<button class='about__link btn--e-secondary' onclick='openModal()'>Book Now</button>";
                                    } else {
                                        echo "<a class='about__link btn--e-secondary' href='signin.php'>Login to book</a>";
                                    }
                                    ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!--====== Section 1 ======-->
		<div class="u-s-p-y-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary u-s-m-b-12">GYM REPAIR SERVICES</h1>

								<span class="section__span u-c-silver">We also care about maintenance!</span>
								<blockquote>
									<p>
										We offer fitness equipment repair and maintenance for treadmills, ellipticals,
										steppers, & exercise bikes. You can make the repair simple by contacting our
										team
										that specializes in qualified exercise equipment experts. When you need to
										remove or set up your fitness devices, we offer installation and disassembly
										services that are available for both commercial and residential clients. </p>
								</blockquote>
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
						<div class="col-lg-5 col-md-5 u-s-m-b-30">

							<a class="collection">
								<div class="aspect aspect--bg-grey aspect--square">

									<img class="aspect__img collection__img" src="images/repair/repair-1.jpg"
									     alt="Maintenance Service">
								</div>
							</a></div>
						<div class="col-lg-7 col-md-7 u-s-m-b-30">

							<a class="collection">
								<div class="aspect aspect--bg-grey aspect--1286-890">

									<img class="aspect__img collection__img" src="images/repair/repair-2.jpg"
									     alt="Treadmill Troubleshooting">
								</div>
							</a></div>
						<div class="col-lg-7 col-md-7 u-s-m-b-30">

							<a class="collection">
								<div class="aspect aspect--bg-grey aspect--1286-890">

									<img class="aspect__img collection__img" src="images/repair/repair-3.jpg"
									     alt="Treadmill Repair Service">
								</div>
							</a></div>
						<div class="col-lg-5 col-md-5 u-s-m-b-30">

							<a class="collection">
								<div class="aspect aspect--bg-grey aspect--square">

									<img class="aspect__img collection__img" src="images/repair/repair-4.jpg"
									     alt="Precor Service Support">
								</div>
							</a></div>
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
								<h1 class="section__heading u-c-secondary">Our Technicians</h1>
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
						<div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="team-member u-h-100">
								<div class="team-member__wrap">
									<div class="aspect aspect--bg-grey-fb aspect--square">

										<img class="aspect__img team-member__img"
										     src="images/technicians/technician1.jpg" alt=""></div>
									<div class="team-member__social-wrap">
										<ul class="team-member__social-list">
											<li>

												<a class="s-tw--bgcolor-hover" href="https://mobile.twitter.com/"><i
															class="fab fa-twitter"></i></a></li>
											<li>

												<a class="s-fb--bgcolor-hover" href="https://www.facebook.com/"><i
															class="fab fa-facebook-f"></i></a></li>
											<li>

												<a class="s-insta--bgcolor-hover" href="https://instagram.com/"><i
															class="fab fa-instagram"></i></a></li>
											<li>

												<a class="s-linked--bgcolor-hover" href="https://www.linkedin.com/"><i
															class="fab fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="team-member__info">

									<span class="team-member__name">Joseph Smith</span>

									<span class="team-member__job-title">Team Leader</span></div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="team-member u-h-100">
								<div class="team-member__wrap">
									<div class="aspect aspect--bg-grey-fb aspect--square">

										<img class="aspect__img team-member__img"
										     src="images/technicians/technician2.jpg" alt=""></div>
									<div class="team-member__social-wrap">
										<ul class="team-member__social-list">
											<li>

												<a class="s-tw--bgcolor-hover" href="https://mobile.twitter.com/"><i
															class="fab fa-twitter"></i></a></li>
											<li>

												<a class="s-fb--bgcolor-hover" href="https://www.facebook.com/"><i
															class="fab fa-facebook-f"></i></a></li>
											<li>

												<a class="s-insta--bgcolor-hover" href="https://instagram.com/"><i
															class="fab fa-instagram"></i></a></li>
											<li>

												<a class="s-linked--bgcolor-hover" href="https://www.linkedin.com/"><i
															class="fab fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="team-member__info">

									<span class="team-member__name">David Leong</span>

									<span class="team-member__job-title">Fitness Equipment Technician</span></div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="team-member u-h-100">
								<div class="team-member__wrap">
									<div class="aspect aspect--bg-grey-fb aspect--square">

										<img class="aspect__img team-member__img"
										     src="images/technicians/technician3.jpg" alt=""></div>
									<div class="team-member__social-wrap">
										<ul class="team-member__social-list">
											<li>

												<a class="s-tw--bgcolor-hover" href="https://mobile.twitter.com/"><i
															class="fab fa-twitter"></i></a></li>
											<li>

												<a class="s-fb--bgcolor-hover" href="https://www.facebook.com/"><i
															class="fab fa-facebook-f"></i></a></li>
											<li>

												<a class="s-insta--bgcolor-hover" href="https://instagram.com/"><i
															class="fab fa-instagram"></i></a></li>
											<li>

												<a class="s-linked--bgcolor-hover" href="https://www.linkedin.com/"><i
															class="fab fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="team-member__info">

									<span class="team-member__name">Talbot Barry</span>

									<span class="team-member__job-title">Service Technician</span></div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
							<div class="team-member u-h-100">
								<div class="team-member__wrap">
									<div class="aspect aspect--bg-grey-fb aspect--square">

										<img class="aspect__img team-member__img"
										     src="images/technicians/technician4.jpg" alt=""></div>
									<div class="team-member__social-wrap">
										<ul class="team-member__social-list">
											<li>

												<a class="s-tw--bgcolor-hover" href="https://mobile.twitter.com/"><i
															class="fab fa-twitter"></i></a></li>
											<li>

												<a class="s-fb--bgcolor-hover" href="https://www.facebook.com/"><i
															class="fab fa-facebook-f"></i></a></li>
											<li>

												<a class="s-insta--bgcolor-hover" href="https://instagram.com/"><i
															class="fab fa-instagram"></i></a></li>
											<li>

												<a class="s-linked--bgcolor-hover" href="https://www.linkedin.com/"><i
															class="fab fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="team-member__info">

									<span class="team-member__name">Jeremy Harris</span>

									<span class="team-member__job-title">Equipment Maintenance Technician</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 3 ======-->

		<!--====== Section 4 ======-->
		<div class="u-s-p-b-90 u-s-m-b-30">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-46">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary u-s-m-b-12">CLIENTS FEEDBACK</h1>

								<span class="section__span u-c-silver">WHAT OUR CLIENTS SAY</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Intro ======-->


			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">

					<!--====== Testimonial Slider ======-->
					<div class="slider-fouc">
						<div class="owl-carousel" id="testimonial-slider">
							<div class="testimonial">
								<div class="testimonial__img-wrap">

									<img class="testimonial__img" src="images/users/user-1.png" alt=""></div>
								<div class="testimonial__content-wrap">

									<span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
									<blockquote class="testimonial__block-quote">
										<p>"HGE Repair Service is really great. I had Joseph Smith for repairing my gym
											equipments and now I have recently observed favorable changes. I am happy
											with myself. If you're in the search for gym repair service
											, go no further than Joseph and HGE."</p>
									</blockquote>

									<span class="testimonial__author">Raymond W.</span>
								</div>
							</div>
							<div class="testimonial">
								<div class="testimonial__img-wrap">
									<img class="testimonial__img" src="images/users/user-2.png" alt=""></div>
								<div class="testimonial__content-wrap">

									<span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
									<blockquote class="testimonial__block-quote">
										<p>"In a Genuine Maintenance service, you should hire David if you want
											someone who is skillful in
											fitness equipments and takes a personal interest in your
											fitness goals. HGE Repair Service comes extremely recommended from
											me."</p>
									</blockquote>

									<span class="testimonial__author">Sally C.</span>
								</div>
							</div>
							<div class="testimonial">
								<div class="testimonial__img-wrap">

									<img class="testimonial__img" src="images/users/user-3.png" alt=""></div>
								<div class="testimonial__content-wrap">

									<span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
									<blockquote class="testimonial__block-quote">
										<p>"My decision to become a member of the HGE Maintenance Plan was one of
											the best decisions I've ever made. Service Technician, Talbot, has been
											vital in servicing my home gym equipments, and I thoroughly enjoy getting to
											spend time together."</p>
									</blockquote>

									<span class="testimonial__author">John D.</span>
								</div>
							</div>
							<div class="testimonial">
								<div class="testimonial__img-wrap">

									<img class="testimonial__img" src="images/users/user-4.png" alt=""></div>
								<div class="testimonial__content-wrap">

									<span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
									<blockquote class="testimonial__block-quote">
										<p>"Jeremy is dedicated to assisting me for maintaining my gym equipments and
											ensures
											that each maintenance session is full of quality control. My fitness level
											has
											improved substantially due to her assistance and because of good quality
											equipments,
											I've noticed an increase in my capacity to perform a greater number of
											sit-ups and other core activities."</p>
									</blockquote>

									<span class="testimonial__author">Anna S.</span>
								</div>
							</div>
						</div>
					</div>
					<!--====== End - Testimonial Slider ======-->
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 4 ======-->


		<!--====== Add to Cart Modal ======-->
		<div class="modal fade" id="add-to-cart">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content modal-radius modal-shadow">

					<button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="success u-s-m-b-30">
									<div class="success__text-wrap"><i class="fas fa-check"></i>

										<span>Item is added successfully!</span></div>
									<div class="success__img-wrap">

										<img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt="">
									</div>
									<div class="success__info-wrap">

										<span class="success__name">Beats Bomb Wireless Headphone</span>

										<span class="success__quantity">Quantity: 1</span>

										<span class="success__price">$170.00</span></div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="s-option">

									<span class="s-option__text">1 item (s) in your cart</span>
									<div class="s-option__link-box">

										<a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE
											SHOPPING</a>

										<a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW
											CART</a>

										<a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO
											CHECKOUT</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--====== End - Add to Cart Modal ======-->
		<div class="modal fade new-l" id="booking-modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content modal--shadow">

					<button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>
					<div class="modal-body">
						<div class="row u-s-m-x-0">
							<div class="col-lg-6 new-l__col-1 u-s-p-x-0">

								<a class="new-l__img-wrap u-d-block" href="shop-side-version-2.html">

									<img class="u-img-fluid u-d-block" src="images/booking/booking.jpg" alt=""></a>
							</div>
							<div class="col-lg-6 new-l__col-2">
								<div class="new-l__section u-s-m-t-30">
									<div class="u-s-m-b-8 new-l--center">
										<h3 class="new-l__h3">Schedule a booking</h3>
									</div>
									<div class="u-s-m-b-30 new-l--center">
										<p class="new-l__p1">We will reach out to you via email!</p>
									</div>
									<form class="new-l__form" action="workshop.php" method="post">
										<div class="u-s-m-b-15">

											<input value="<?php echo $customerEmail; ?>" class="news-l__input"
											       name="bookingEmail" type="text" placeholder="E-mail Address">
										</div>
										<div class="u-s-m-b-15">
											<span class="outer-footer__content-title" style="color: #3d3d3d!important;">Choose Booking Type</span>
											<div class="radio-box newsletter__radio">

												<input type="radio" id="F2F" value="Face to Face" name="bookingType"
												       checked>
												<div class="radio-box__state radio-box__state--primary">
													<label class="radio-box__label" for="F2F">Face to Face</label></div>
											</div>
											<div class="radio-box newsletter__radio">
												<input type="radio" id="Online" value="Online" name="bookingType">
												<div class="radio-box__state radio-box__state--primary">
													<label class="radio-box__label" for="Online">Online</label></div>
											</div>
										</div>
										<div class="u-s-m-b-15">
											<button class="btn btn--e-brand-b-2" name="bookBtn" type="submit">Book Now
											</button>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
</div>

<?php include 'components/scripts.php'; ?>

<!--custom script-->
<script>
    function openModal() {
        $('#booking-modal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }

    setTimeout(function () {
        $(".message-info").fadeOut("slow");
    }, 2000);
</script>