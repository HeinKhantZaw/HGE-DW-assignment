<?php
$GLOBALS['title'] = "HGE - Contact Us";
include 'components/header.php';
include 'db/connect.php';

if (isset($_POST['sendBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $query = "INSERT INTO `ContactForms`(`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Message sent successfully')</script>";
        echo "<script>window.open('contact.php', '_self')</script>";
    } else {
        $err = mysqli_error($connection);
        echo "<script>alert('Message sent Fail'+ $err )</script>";
    }
}
?>
	<!--====== Main App ======-->
	<div id="app">
		<!--====== Main Header ======-->
        <?php include 'components/navbar.php'; ?>
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

										<a href="contact.php">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section 1 ======-->


			<!--====== Section 2 ======-->
			<div class="u-s-p-b-60">
				<!--====== Section Content ======-->
				<div class="section__content">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="g-map">
									<div id="map">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.4092904805907!2d96.13408721480303!3d16.80603958842948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb556f19cc4f%3A0x46f22e0fe97b415b!2sHGE!5e0!3m2!1sen!2ssg!4v1662145440558!5m2!1sen!2ssg"
										        width="100%" height="450px" style="border:0;" allowfullscreen=""
										        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>
			<!--====== End - Section 2 ======-->


			<!--====== Section 3 ======-->
			<div class="u-s-p-b-60">

				<!--====== Section Content ======-->
				<div class="section__content">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="contact-o u-h-100">
									<div class="contact-o__wrap">
										<div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

										<span class="contact-o__info-text-1">LET'S HAVE A CALL</span>

										<span class="contact-o__info-text-2">+959735556814</span>

										<span class="contact-o__info-text-2">01 243 5774</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="contact-o u-h-100">
									<div class="contact-o__wrap">
										<div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

										<span class="contact-o__info-text-1">OUR LOCATION</span>

										<span class="contact-o__info-text-2">No.214, Sanchaung Street</span>

										<span class="contact-o__info-text-2"> Yangon, Myanmar (Burma)</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 u-s-m-b-30">
								<div class="contact-o u-h-100">
									<div class="contact-o__wrap">
										<div class="contact-o__icon"><i class="far fa-clock"></i></div>

										<span class="contact-o__info-text-1">AVAILABLE TIME</span>

										<span class="contact-o__info-text-2">5 Days a Week</span>

										<span class="contact-o__info-text-2">From 9 AM to 7 PM</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>
			<!--====== End - Section 3 ======-->


			<!--====== Section 4 ======-->
			<div class="u-s-p-b-60">

				<!--====== Section Content ======-->
				<div class="section__content">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="contact-area u-h-100">
									<div class="contact-area__heading">
										<h2>Get In Touch</h2>
									</div>
									<form class="contact-f" method="post" action="contact.php">
										<div class="row">
											<div class="col-lg-6 col-md-6 u-h-100">
												<div class="u-s-m-b-30">

													<label for="c-name"></label>

													<input class="input-text input-text--border-radius input-text--primary-style"
													       type="text" id="c-name" name="name"
													       placeholder="Name (Required) Eg. John Doe" required>
												</div>
												<div class="u-s-m-b-30">

													<label for="c-email"></label>

													<input class="input-text input-text--border-radius input-text--primary-style"
													       type="email" id="c-email" name="email"
													       placeholder="Email (Required) Eg. JohnDoe@gmail.com"
													       required>
												</div>
												<div class="u-s-m-b-30">

													<label for="c-subject"></label>

													<input class="input-text input-text--border-radius input-text--primary-style"
													       type="text" id="c-subject"
													       placeholder="Phone number (Required) Eg. 09123456"
													       pattern="[0-9]{8,}" name="phone" required></div>
											</div>
											<div class="col-lg-6 col-md-6 u-h-100">
												<div class="u-s-m-b-30">

													<label for="c-message"></label><textarea
															class="text-area text-area--border-radius text-area--primary-style"
															id="c-message" placeholder="Compose a Message (Required)"
															name="message" required></textarea></div>
											</div>
											<div class="u-s-m-x-15 u-s-m-b-20">

												<!--====== Check Box ======-->
												<div class="check-box">

													<input type="checkbox" id="term-and-condition" required>
													<div class="check-box__state check-box__state--primary">

														<label class="check-box__label" for="term-and-condition">I consent to the</label></div>
												</div>
												<!--====== End - Check Box ======-->

												<a href="https://www.termsfeed.com/live/f24745b0-22cc-4fb6-a0da-35b34e8efb96"
												   target="_blank" class="gl-link">Terms and Conditions</a> <span> and </span>
												<a href="https://www.termsfeed.com/live/4fcda85a-7504-4cd8-8dcb-4b320702cafd"
												   target="_blank" class="gl-link">Privacy Policy</a>
											</div>
											<div class="col-lg-12">

												<button class="btn btn--e-brand-b-2" name="sendBtn" type="submit">Send
													Message
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--====== End - Section Content ======-->
			</div>
			<!--====== End - Section 4 ======-->
		</div>
        <?php include 'components/footer.php'; ?>
	</div>
<?php include 'components/scripts.php'; ?>