<?php

if ($GLOBALS['title']) {
    $title = $GLOBALS['title'];
} else {
    $title = "HGE - Home";
} ?>
<footer>
	<div class="outer-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-6 u-s-m-b-21">
					<span>You are at <a style="color: #7f7f7f; font-weight: bolder" href="#"><?php echo $title;?></a> page</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-6">
					<div class="outer-footer__content u-s-m-b-40">
						<span class="outer-footer__content-title">Contact Us</span>
						<div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

							<span>No.214, Sanchaung Street, Yangon, Myanmar (Burma)</span></div>
						<div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

							<span>+959735556814</span></div>
						<div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

							<span>contact@hge.com</span></div>
						<i class="fa fa-rss"></i><a class="u-c-white u-s-m-l-10" href="http://localhost/dw-assignment-HKZ/rss.php" target="_blank">RSS Feed</a>
						<div class="outer-footer__social">
							<ul>
								<li>

									<a aria-label="facebook" class="s-fb--color-hover" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li>

									<a aria-label="twitter" class="s-tw--color-hover" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li>

									<a aria-label="youtube" class="s-youtube--color-hover" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
								</li>
								<li>
									<a aria-label="instagram" class="s-insta--color-hover" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="col-lg-4 col-md-12">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="outer-footer__content u-s-m-b-40">

								<span class="outer-footer__content-title">Information</span>
								<div class="outer-footer__list-wrap">
									<ul>
										<li>
											<a href="index.php">Home</a></li>
										<li>
											<a href="gallery.php">Gallery</a></li>
										<li>
											<a href="featured.php">Featured</a></li>
										<li>
											<a href="wanted.php">Wanted</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="outer-footer__content u-s-m-b-40">
								<div class="outer-footer__list-wrap">

									<span class="outer-footer__content-title">Our Company</span>
									<ul>
										<li>
											<a href="information.php">Information</a></li>
										</li>
										<li>
											<a href="workshop.php">Workshop</a></li>
										<li>
											<a href="contact.php">Contact Us</a></li>
										<li>
											<a href="signin.php">Login</a></li>
										<li>
											<a href="signup.php">Register</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="lower-footer__content">
						<div class="lower-footer__copyright">
                            <span>Copyright © <script>
								document.write(new Date().getFullYear());
	                            </script></span>
							<span>All Right Reserved</span></div>
						<div class="lower-footer__payment">
							<ul>
								<li><i class="fab fa-cc-stripe"></i></li>
								<li><i class="fab fa-cc-paypal"></i></li>
								<li><i class="fab fa-cc-mastercard"></i></li>
								<li><i class="fab fa-cc-visa"></i></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
