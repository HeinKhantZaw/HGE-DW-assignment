<?php
$GLOBALS['title'] = "HGE - Register";
include 'components/header.php';
include('db/connect.php');

if (isset($_POST['btnRegister'])) {
    $customerFirstName = $_POST['customerFirstName'];
    $customerLastName = $_POST['customerLastName'];
    $customerEmail = $_POST['customerEmail'];
    $customerPassword = $_POST['customerPassword'];
    $customerPassword = password_hash($customerPassword, PASSWORD_DEFAULT);
    $customerAddress = $_POST['customerAddress'];
    $customerPhone = $_POST['customerPhone'];

    $query = "INSERT INTO `customer`(`customerFirstName`, `customerLastName`, `customerEmail`, `customerPassword`, `customerAddress`, `customerPhone`) VALUES ( '$customerFirstName', '$customerLastName', '$customerEmail' , '$customerPassword' , '$customerAddress' ,  '$customerPhone' )";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Register successfully')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
    } else {
        $err = mysqli_error($connection);
        echo "<script>alert('Register Fail'+ $err )</script>";
//        echo "<script>window.open('signup.php', '_self')</script>";
    }
}
?>
<!--====== Main App ======-->
<div id="app">
	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>

	<!--====== App Content ======-->
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

									<a href="signup.php">Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->


		<!--====== Section 2 ======-->
		<div class="u-s-p-b-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-60">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Intro ======-->


			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="row row--center">
						<div class="col-lg-6 col-md-8 u-s-m-b-30">
							<div class="l-f-o">
								<div class="l-f-o__pad-box">
									<h1 class="gl-h1">PERSONAL INFORMATION</h1>
									<form class="l-f-o__form" action="signup.php" method="post">
										<div class="u-s-m-b-30">

											<label class="gl-label" for="customerFirstName">FIRST NAME *</label>

											<input class="input-text input-text--primary-style" type="text"
											       id="customerFirstName" name="customerFirstName"
											       placeholder="First Name"></div>
										<div class="u-s-m-b-30">

											<label class="gl-label" for="customerLastName">LAST NAME *</label>

											<input class="input-text input-text--primary-style" type="text"
											       id="customerLastName" name="customerLastName"
											       placeholder="Last Name"></div>
										<div class="u-s-m-b-30">

											<label class="gl-label" for="customerEmail">E-MAIL *</label>

											<input class="input-text input-text--primary-style" type="email"
											       id="customerEmail" name="customerEmail"
											       placeholder="Enter your E-mail"></div>
										<div class="u-s-m-b-30">
											<label class="gl-label" for="customerPassword">PASSWORD *</label>
											<div class="row u-s-m-b-30">
												<div class="col-lg-8 u-s-m-t-15">
													<input class="input-text input-text--primary-style" type="password"
													       id="customerPassword" name="customerPassword"
													       placeholder="Enter Password">
												</div>
												<div class="col-lg-4 u-s-m-t-15">
													<button class="btn btn--e-transparent-brand-b-2"
													        onclick="createRandom()">
														Generate Random
													</button>
												</div>
											</div
										</div>

										<div class="u-s-m-b-30">

											<label class="gl-label" for="customerAddress">ADDRESS *</label>

											<input class="input-text input-text--primary-style" type="text"
											       id="customerAddress" name="customerAddress"
											       placeholder="Enter your Address"></div>

										<div class="u-s-m-b-30">

											<label class="gl-label" for="customerPhone">YOUR PHONE *</label>

											<input class="input-text input-text--primary-style" type="text"
											       id="customerPhone" name="customerPhone"
											       placeholder="Enter your Phone" pattern="[0-9]{9,}"></div>

										<div class="u-s-m-b-15">

											<button class="btn btn--e-transparent-brand-b-2" name="btnRegister"
											        type="submit">CREATE
											</button>
										</div>

										<a class="gl-link" href="gallery.php">Return to Store</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--====== End - Section Content ======-->
		</div>
		<!--====== End - Section 2 ======-->
	</div>
	<!--====== End - App Content ======-->

    <?php include 'components/footer.php'; ?>
</div>

<?php include 'components/scripts.php'; ?>

<!--custom scripts-->
<script src="https://www.google.com/recaptcha/enterprise.js?render=6Ld6VsohAAAAAFZ2QsIRLNh4TfzdSAhAkYflbtfw"></script>
<script>

    function createRandom() {
        // Generate random password
	    event.preventDefault();
        let length = 16,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[];?><,./-=",
            retVal = "";
        for (let i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("customerPassword").value = retVal;
    }
</script>