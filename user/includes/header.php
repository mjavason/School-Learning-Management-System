<header id="header" class="header-transparent header-effect-shrink appear-animation" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}" data-appear-animation="fadeIn" data-appear-animation-delay="200">
	<div class="header-body border-top-0 header-body-bottom-border">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index">
								<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="img/logo-default-slim.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav header-nav-links justify-content-start order-2 order-lg-1">
							<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<li class="dropdown">
											<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="index">Home</a>
										</li>
										<?php if (isset($_SESSION['log'])) { ?>
											<li class="dropdown">
												<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="register_course">Register Course</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="cgpa">CGPA</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="announcements">Announcements 
													<?php if($_SESSION['unread_announcements'] > 0){ ?>
													<span class="badge badge-primary m-1"><?= $_SESSION['unread_announcements'] ?></span>
													<?php } ?>
												</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="course-materials">Materials</a>
											</li>
										<?php } ?>
										<!-- <li class="dropdown">
											<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#">About</a>
										</li>
										<li class="dropdown">
											<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="#">Solutions</a>
										</li> -->
										<li class="dropdown">
											<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="test">Test PHP</a>
										</li>
										<?php if (!isset($_SESSION['log'])) { ?>
											<li class="dropdown">
												<a class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95" href="register">Register</a>
											</li>
										<?php } else { ?>
											<li class="dropdown">
												<a onclick="logout()" class="dropdown-item" data-hash data-hash-offset="0" data-hash-offset-lg="95">Logout</a>
											</li>
										<?php	} ?>


									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
								<i class="fas fa-bars"></i>
							</button>
						</div>

						<?php if (isset($_SESSION['user_name']) && isset($_SESSION['log'])) { ?>
							<a class="btn btn-primary btn-rounded font-weight-semibold text-3 btn-px-5 btn-py-2 order-1 order-lg-2 d-md-block me-3 me-lg-0" data-hash data-hash-offset="0" data-hash-offset-lg="65" href="index"><?= $_SESSION['user_name'] ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>