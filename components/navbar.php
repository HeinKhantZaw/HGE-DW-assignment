<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
?>
<header class="header--style-1">

	<!--====== Nav 1 ======-->
	<nav class="primary-nav primary-nav-wrapper--border">
		<div class="container">

			<!--====== Primary Nav ======-->
			<div class="primary-nav">

				<!--====== Main Logo ======-->

				<a class="main-logo" href="/dw-assignment-HKZ/index.php">

					<img src="images/logo/logo-1.png" alt="Logo of HGE" class="HgeLogo"></a>
				<!--====== End - Main Logo ======-->
				<nav class="secondary-nav-wrapper">
					<div class="container">

						<!--====== Secondary Nav ======-->
						<div class="secondary-nav">

							<!--====== Dropdown Main plugin ======-->
							<div class="menu-init" id="navigation1">


								<!--====== Menu ======-->
								<div class="ah-lg-mode">

									<span class="ah-close">✕ Close</span>

									<!--====== End - List ======-->
								</div>
								<!--====== End - Menu ======-->
							</div>
							<!--====== End - Dropdown Main plugin ======-->


							<!--====== Dropdown Main plugin ======-->
							<div class="menu-init" id="navigation2">

								<button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog"
								        type="button"></button>

								<!--====== Menu ======-->
								<div class="ah-lg-mode">

									<span class="ah-close">✕ Close</span>

									<!--====== List ======-->
									<ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
										<li class="nav-item-hover"><a href="information.php">Information</a></li>
										<li class="nav-item-hover"><a href="wanted.php">Wanted</a></li>
										<li class="nav-item-hover"><a href="workshop.php">Workshop</a></li>
										<li class="nav-item-hover"><a href="gallery.php">Gallery</a></li>
										<li class="nav-item-hover"><a href="contact.php">Contact</a></li>
										<li class="nav-item-hover"><a href="featured.php">Featured</a></li>
										<!--	                                    <li class="nav-item-hover"><a href="blog.php">Blog</a></li>-->
									</ul>
									<!--====== End - List ======-->
								</div>
								<!--====== End - Menu ======-->
							</div>
							<!--====== End - Dropdown Main plugin ======-->

							<!--====== End - Dropdown Main plugin ======-->
						</div>
						<!--====== End - Secondary Nav ======-->
					</div>
				</nav>

				<!--====== Search Form ======-->
				<form class="main-form" action="wanted.php">

					<label for="main-search"></label>

					<input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" name="q"
					       placeholder="Search" required>

					<button class="btn btn--icon fas fa-search main-search-button" aria-label="search-button" type="submit"></button>
				</form>

				<!--====== Dropdown Main plugin ======-->
				<div class="menu-init" id="navigation">

					<button class="btn btn--icon toggle-button toggle-button--secondary far fa-user-circle"
					        type="button"></button>

					<!--====== Menu ======-->
					<div class="ah-lg-mode">

						<span class="ah-close">✕ Close</span>

						<!--====== List ======-->
                        <?php if (isset($_SESSION['cid']) && $_SESSION['cname']) {
                            ?>
						<ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
							<li class="has-dropdown">
								<a><i class="far fa-user-circle u-s-p-x-10"></i><?php echo $_SESSION['cname']?></a>
								<!--====== Dropdown ======-->
								<span class="js-menu-toggle"></span>
								<ul style="width:120px">
									<li>
										<a href="dashboard.php"><i class="fas fa-user-circle u-s-m-r-6"></i>
											<span>Dashboard</span></a>
									</li>
									<li>
										<a href="Shopping_Cart.php"><i class="fa fa-shopping-cart u-s-m-r-6"></i>
										<span>Cart</span></a>
									</li>
									<li>

										<a href="signout.php"><i class="fas fa-lock-open u-s-m-r-6"></i>
											<span>Signout</span></a>
									</li>
								</ul>
                            <?php
                        } else { ?>
							<ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
								<li>
									<a href="signin.php"><i class="fas fa-sign-in-alt u-s-m-r-6"></i>
										<span>Login</span></a>
								</li>
								<li>
									<a href="signup.php"><i class="fas fa-user-plus u-s-m-r-6"></i>
										<span>Register</span></a>
								</li>

							</ul>
                            <?php
                        }
                        ?>
						<!--====== End - List ======-->
					</div>
					<!--====== End - Menu ======-->
				</div>
				<!--====== End - Dropdown Main plugin ======-->
			</div>
			<!--====== End - Primary Nav ======-->
		</div>
	</nav>
	<!--====== End - Nav 1 ======-->
</header>