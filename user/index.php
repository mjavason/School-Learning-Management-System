<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (isset($_SESSION['log'])) {
	gotoPage("dashboard.php");
}
if (isset($_SESSION['super_log'])) {
	gotoPage("../admin/index");
}
if (isset($_SESSION['ultra_log'])) {
	gotoPage("../super_admin/index");
}
?>
<!DOCTYPE html>

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ESUT Result Repo</title>

	<meta name="keywords" content="ESUT result school students courses upload" />
	<meta name="description" content="View course results online">
	<meta name="author" content="gamma group">

	<?php require_once('includes/head.php') ?>
</head>

<body data-plugin-scroll-spy data-plugin-options="{'target': '#header'}">

	<div class="body">

		<!-- header -->
		<?php require_once('includes/header.php') ?>

		<div role="main" class="main">

			<div class="container position-relative py-5" style="min-height: 643px;" id="home">
				<?php require_once('includes/svg_animation.php') ?>
				<div class="row align-items-center py-5 p-relative z-index-1">
					<div class="col-lg-6 pt-4 pt-lg-0 mt-5 mt-lg-0 mb-5 mb-lg-0">
						<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
							<h1 class="mb-4 mb-md-0 mb-xl-3" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 1, 'transition': true, 'horizontal': false}">
								View and download school results <strong>Online</strong> through our secure database.
							</h1>
						</div>
						<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
							<p class="text-4 mb-5 mb-md-2" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 0.5, 'transition': true, 'horizontal': false}">
								This service is ultra fast and helps bring information to students as quickly as possible. Saving time and resources for everyone involved.</p>
						</div>
						<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">
							<a data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#login_section" class="btn btn-primary btn-outline btn-rounded font-weight-semibold text-4 btn-px-5 btn-py-2" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 0.3, 'transition': true, 'horizontal': false}">Get Started</a>
						</div>
					</div>
					<div class="col-lg-6 text-center mt-5 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="550">
						<img src="img/demos/seo/seo-charts.png" class="img-fluid" alt="" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 8, 'transition': true, 'horizontal': true}" />
					</div>
				</div>

				<!-- inline login form -->
				<section class="section bg-secondary border-0 m-0" id="login_section">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-3 ">
								<h2 class="font-weight-semibold line-height-3 text-6 text-lg-5 text-xl-6 mb-3 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000">Input your details</h2>
							</div>
							<div class="col-lg-9">
								<form class="custom-form-style-1" method="post">
									<div class="row">
										<div class="form-group col-lg-5 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1200">
											<input name="email" type="text" class="form-control" onkeyup="checkIfAllFormFieldsFilled('login_button',getInputValuesAndReturnTheirContentAsJson(['login_email', 'login_password']))" value="<?php if (isset($_COOKIE['client_mail'])) {
																																																												echo $_COOKIE['client_mail'];
																																																											} ?>" placeholder="EMAIL ADDRESS*" id="login_email" required>
										</div>
										<div class="form-group col-lg-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400">
											<input onkeyup="checkIfAllFormFieldsFilled('login_button',getInputValuesAndReturnTheirContentAsJson(['login_email', 'login_password']))" value="<?php if (isset($_COOKIE['client_password'])) {
																																																echo $_COOKIE['client_password'];
																																															} ?>" id="login_password" name="password" type="password" class="form-control" value="" placeholder="PASSWORD*" id="login_password" required>
										</div>

										<div class="form-group col-lg-3 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600">
											<input type="button" onclick="processLoginAjaxPostRequest('functions/loginAjax.php', getInputValuesAndReturnTheirContentAsJson(['login_email', 'login_password', 'login_remember_me']))" class="btn btn-primary btn-outline font-weight-bold text-3 h-100 rounded-0 btn-px-4" id="login_button" value="Login">
										</div>
										<div class="form-group col-lg-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400">
											<input value="1" type="checkbox" name="remember" class="custom-control-input" id="login_remember_me">
											<label class="custom-control-label" for="customCheck">Remember
												Me</label>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>



				<!-- svg theme end -->
			</div>

			<!-- Block Login form -->
			<!-- <section class="section bg-secondary border-0 m-0" id="login_section">
				<form id="demo-form" class="contact-form white-popup-block mfp" action="" method="POST">
					<?php require_once('includes/svg_animation.php') ?>
					<div class="row mt-2">
						<div class="col-sm-12">
							<h2 class="font-weight-bold text-center text-7 mb-4">Begin Your Journey</h2>
						</div>
					</div>

					<div class="contact-form-success alert alert-success d-none mt-4">
						<strong>Success!</strong> Your message has been sent to us.
					</div>

					<div class="contact-form-error alert alert-danger d-none mt-4">
						<strong>Error!</strong> There was an error sending your message.
						<span class="mail-error-message text-1 d-block"></span>
					</div>

					<div class="custom-form-style-1 custom-form-style-1-rounded">
						<div class="row">
							<div class="form-group col mb-2">
								<input type="text" name="name" class="form-control" value="" placeholder="NAME*" data-msg-required="Please enter your name." required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col mb-2">
								<input type="email" name="Email" class="form-control" value="" placeholder="EMAIL*" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col mb-2">
								<input type="text" name="website" class="form-control" value="" placeholder="WEBSITE*" data-msg-required="Please enter your website address." required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col">
								<input type="text" name="company" class="form-control" value="" placeholder="COMPANY NAME*" data-msg-required="Please enter your company name." required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col mb-0">
								<input type="submit" class="btn btn-primary btn-outline btn-rounded font-weight-semibold text-center text-4 btn-py-2 w-100 mb-3" value="Submit" data-loading-text="Loading...">
							</div>
						</div>
					</div>

				</form>
			</section> -->

		</div>

		<!-- footer		 -->
		<?php require_once('includes/footer.php') ?>


	</div>


	<?php require_once('includes/js_imports.php') ?>
</body>

</html>
<?php
// $_SESSION['log'] = true;
// $_SESSION['student_reg'] = '2017030180311';
// $_SESSION['user_name'] = 'Tester Zero';
?>