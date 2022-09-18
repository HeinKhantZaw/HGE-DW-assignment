<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$GLOBALS['title'] = "HGE - Sign In";
include 'components/header.php';
include 'db/connect.php';
if (isset($_POST['btnLogin'])) {
    $email = $_POST['customerEmail'];
    $password = $_POST['customerPassword'];
    $query = "SELECT * FROM `customer` WHERE `customerEmail` = '$email'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo '<div class="message-info danger">
						<strong>Error</strong> - Email does not exists.
					</div>';
    } else {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['customerPassword'];
        $cid = $row['id'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = time() - (3 * 60);
        $query = "SELECT count(*) as total_attempts from LoginAttempt where loginTime > $time and loginIP ='$ip'";
        $result = mysqli_query($connection, $query);
        $login_data = mysqli_fetch_assoc($result);
        $total_login_attempts = $login_data['total_attempts'];
        if ($total_login_attempts >= 3) {
            echo '<div class="message-info danger">
						<strong>Error</strong> - Too many failed attempts. Please try after 3 minutes.
					</div>';

        } else {
            if (password_verify($password, $db_password)) {
                $_SESSION['cid'] = $row['id'];
                $_SESSION['cname'] = $row['customerFirstName'] . " " . $row['customerLastName'];

	            echo '<div class="message-info success">
						<strong>Login Successful</strong> - Welcome back!
					</div>';
                echo "<script>window.open('featured.php', '_self')</script>";
            } else {
                echo '<div class="message-info danger">
						<strong>Error</strong> - Wrong Password! Total Attempts: ' . $total_login_attempts + 1 . '
					</div>';
                // Fade after 3 seconds
                echo '<script type="text/javascript">
						</script>';
                $total_login_attempts++;
                $login_time = time();
                $query = "INSERT INTO loginAttempt(customerId,loginIP,loginTime) values ('$cid','$ip', $login_time)";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo mysqli_error($connection);
                }
            }
        }
    }
}
?>

<!--====== Main App ======-->
<div id="app">
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

									<a href="signin.html">Signin</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->


		<div class="message-info warning" style="display: none">
			<strong>Error</strong> - You missed a field, pay attention!
		</div>
<!--		<div class="message-info info">-->
<!--			<strong>Error</strong> - Someone already thought of your dumb username. Choose another.-->
<!--		</div>-->

		<!--====== Section 2 ======-->
		<div class="u-s-p-b-60">

			<!--====== Section Intro ======-->
			<div class="section__intro u-s-m-b-60">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__text-wrap">
								<h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
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
									<h1 class="gl-h1">I'M NEW CUSTOMER</h1>

									<span class="gl-text u-s-m-b-30">By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.</span>
									<div class="u-s-m-b-15">

										<a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="signup.html">CREATE
											AN ACCOUNT</a></div>
									<h1 class="gl-h1">SIGNIN</h1>

									<span class="gl-text u-s-m-b-30">If you have an account with us, please log in.</span>
									<form class="l-f-o__form" action="signin.php" method="post">
<!--										<div class="gl-s-api">-->
<!--											<div class="u-s-m-b-15">-->
<!---->
<!--												<button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i-->
<!--															class="fab fa-facebook-f"></i>-->
<!---->
<!--													<span>Signin with Facebook</span></button>-->
<!--											</div>-->
<!--											<div class="u-s-m-b-15">-->
<!---->
<!--												<button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i-->
<!--															class="fab fa-google"></i>-->
<!---->
<!--													<span>Signin with Google</span></button>-->
<!--											</div>-->
<!--										</div>-->
										<div class="u-s-m-b-30">

											<label class="gl-label" for="login-email">E-MAIL *</label>

											<input name="customerEmail" class="input-text input-text--primary-style"
											       type="text" id="login-email" placeholder="Enter E-mail"></div>
										<div class="u-s-m-b-30">

											<label class="gl-label" for="login-password">PASSWORD *</label>

											<input name="customerPassword" class="input-text input-text--primary-style"
											       type="password" id="login-password" placeholder="Enter Password">
										</div>
										<div class="gl-inline">
											<div class="u-s-m-b-30">

												<button class="btn btn--e-transparent-brand-b-2" type="submit"
												        name="btnLogin">LOGIN
												</button>
											</div>
											<div class="u-s-m-b-30">

												<a class="gl-link" href="lost-password.html">Lost Your Password?</a>
											</div>
										</div>
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

	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
</div>


<?php include 'components/scripts.php'; ?>
<script>
    setTimeout(function () {
        $(".message-info").fadeOut("slow");
    }, 2000);
</script>