<?php
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
			<br>
			<!-- Registration Form -->
			<form id="demo-form" class="contact-form white-popup-block" action="https://www.okler.net/previews/porto/9.8.0/php/contact-form" method="POST">
				<div class="row mt-2">
					<div class="col-sm-12">
						<h2 class="font-weight-bold text-center text-7 mb-4">Register</h2>
					</div>
				</div>
				<div class="custom-form-style-1 custom-form-style-1-rounded">
					<!-- firstname -->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" id="first_name" type="text" name="name" class="form-control" placeholder="FIRST NAME*" data-msg-required="Please enter your first name." required>
						</div>
					</div>
					<!-- lastname -->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" id="last_name" type="text" name="name" class="form-control" placeholder="LAST NAME*" data-msg-required="Please enter your last name." required>
						</div>
					</div>
					<!-- gender -->
					<div class="row">
						<div class="form-group col mb-2">
							<!-- <select class="form-control" name="gender" id="student_gender">
								<option value="0">-</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
							</select> -->
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" id="student_gender" type="text" name="gender" class="form-control" placeholder="GENDER*" required>
						</div>
					</div>
					<!-- email address -->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" autocomplete="off" id="student_email" type="email" name="Email" class="form-control" placeholder="EMAIL*" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" required>
						</div>
					</div>
					<!-- phone number -->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" autocomplete="off" id="student_phone" type="tel" name="phone" class="form-control" placeholder="PHONE NUMBER*" data-msg-required="Please enter your phone number." maxlength="100" required>
						</div>
					</div>
					<!-- reg number-->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" autocomplete="off" id="student_reg" type="text" name="reg" class="form-control" value="" placeholder="REG NUMBER*" data-msg-required="Please enter your school reg number." maxlength="100" required>
						</div>
					</div>
					<!-- department -->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" autocomplete="off" id="student_department" type="text" name="department" class="form-control" value="" placeholder="SCHOOL DEPARTMENT*" data-msg-required="Please enter your department." maxlength="100" required>
						</div>
					</div>
					<!-- password 1 -->
					<div class="row">
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" autocomplete="off" id="password1" type="password" name="password" class="form-control" placeholder="PASSWORD*" data-msg-required="Please enter your password." required>
						</div>
					</div>
					<div class="row">
						<!-- password 2 -->
						<div class="form-group col mb-2">
							<input onkeyup="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" autocomplete="off" id="password2" type="password" name="password" class="form-control" placeholder="CONFIRM PASSWORD*" data-msg-required="Please enter your password again." required>
						</div>
					</div>
					<!-- agree with terms and conditions -->
					<div class="row">
						<div class="form-group col">
							<input onclick="checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']), 'checked', 9)" type="checkbox" id="agree">
							<label for="rem-me">I agree with all <a target="_blank" href="policy" class="text--base ms-2">Terms & Conditions</a></label>
						</div>
					</div>
					<!-- submit button -->
					<div class="row">
						<div class="form-group col mb-0">
							<input id="sign_up_button" disabled type="button" onclick="createNewStudent('functions/loginAjax.php', getInputValuesAndReturnTheirContentAsJson((['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree'])))" class="btn btn-primary btn-outline btn-rounded font-weight-semibold text-center text-4 btn-py-2 w-100 mb-3" value="Submit" data-loading-text="Loading...">
						</div>
					</div>
				</div>
				<p class="mt-4">Or you can join with</p>
				<ul class="social-links mt-2">
					<li><a class="facebook-bg" href="#0"><i class="lab la-facebook-f"></i></a></li>
					<li><a class="twitter-bg" href="#0"><i class="lab la-twitter"></i></a></li>
					<li><a class="instagram-bg" href="#0"><i class="lab la-instagram"></i></a></li>
				</ul>
			</form>

		</div>



		<!-- footer		 -->
		<?php require_once('includes/footer.php') ?>


	</div>


	<?php require_once('includes/js_imports.php') ?>

</body>

</html>