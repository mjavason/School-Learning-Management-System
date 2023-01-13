<div class="navbar navbar-expand-md header-menu-one bg-light">
    <div class="nav-bar-header-one">
        <div class="header-logo">
            <a href="index">
                <img src="img/logo.png" alt="logo">
            </a>
        </div>
        <div class="toggle-button sidebar-toggle">
            <button type="button" class="item-link">
                <span class="btn-icon-wrap">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
    <div class="d-md-none mobile-nav-bar">
        <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
            <i class="far fa-arrow-alt-circle-down"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-toggle-mobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">

        <ul class="navbar-nav">
            <li class="navbar-item">
                <div class="item-title"><b>
                        <?php if (isset($_SESSION['active_course_id'])) { ?>
                            Active Course: <?= $_SESSION['active_course_name'] ?> <span>(<?= $_SESSION['active_course_code'] ?>) </span><span><a href="active-courses"><i class="fa fa-edit"></i></a></span>
                        <?php } ?>
                    </b>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="navbar-item dropdown header-admin">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <div class="admin-title">
                        <h5 class="item-title"><?= $_SESSION['user_name'] ?></h5>
                        <span>Lecturer</span>
                    </div>
                    <div class="admin-img">
                        <img src="img/figure/<?= displayGenericProfileImageSmall($_SESSION['lecturer_gender']) ?>" alt="Admin">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title"><?= $_SESSION['user_name'] ?></h6>
                    </div>
                    <div class="item-content">
                        <ul class="settings-list">
                            <li><a href="my-profile"><i class="flaticon-user"></i>My Profile</a></li>
                            <!-- <li><a href="#"><i class="flaticon-list"></i>Task</a></li> -->
                            <li><a href="mailto: cheyajewel@gmail.com?subject = Super Admin Support"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Contact Super Admins</a></li>
                            <li><a href="edit-profile"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                            <li><a onclick="logout()"><i class="flaticon-turn-off"></i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- <li class="navbar-item dropdown header-message">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-envelope"></i>
                    <div class="item-title d-md-none text-16 mg-l-10">Message</div>
                    <span>5</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">05 Message</h6>
                    </div>
                    <div class="item-content">
                        <div class="media">
                            <div class="item-img bg-skyblue author-online">
                                <img src="img/figure/student11.png" alt="img">
                            </div>
                            <div class="media-body space-sm">
                                <div class="item-title">
                                    <a href="#">
                                        <span class="item-name">Maria Zaman</span>
                                        <span class="item-time">18:30</span>
                                    </a>
                                </div>
                                <p>What is the reason of buy this item.
                                    Is it usefull for me.....</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="item-img bg-yellow author-online">
                                <img src="img/figure/student12.png" alt="img">
                            </div>
                            <div class="media-body space-sm">
                                <div class="item-title">
                                    <a href="#">
                                        <span class="item-name">Benny Roy</span>
                                        <span class="item-time">10:35</span>
                                    </a>
                                </div>
                                <p>What is the reason of buy this item.
                                    Is it usefull for me.....</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="item-img bg-pink">
                                <img src="img/figure/student13.png" alt="img">
                            </div>
                            <div class="media-body space-sm">
                                <div class="item-title">
                                    <a href="#">
                                        <span class="item-name">Steven</span>
                                        <span class="item-time">02:35</span>
                                    </a>
                                </div>
                                <p>What is the reason of buy this item.
                                    Is it usefull for me.....</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="item-img bg-violet-blue">
                                <img src="img/figure/student11.png" alt="img">
                            </div>
                            <div class="media-body space-sm">
                                <div class="item-title">
                                    <a href="#">
                                        <span class="item-name">Joshep Joe</span>
                                        <span class="item-time">12:35</span>
                                    </a>
                                </div>
                                <p>What is the reason of buy this item.
                                    Is it usefull for me.....</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="navbar-item dropdown header-notification">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                    <span>8</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">03 Notifiacations</h6>
                    </div>
                    <div class="item-content">
                        <div class="media">
                            <div class="item-icon bg-skyblue">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="media-body space-sm">
                                <div class="post-title">Complete Today Task</div>
                                <span>1 Mins ago</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="item-icon bg-orange">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="media-body space-sm">
                                <div class="post-title">Director Metting</div>
                                <span>20 Mins ago</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="item-icon bg-violet-blue">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="media-body space-sm">
                                <div class="post-title">Update Password</div>
                                <span>45 Mins ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="navbar-item dropdown header-language">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>EN</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">English</a>
                    <a class="dropdown-item" href="#">Spanish</a>
                    <a class="dropdown-item" href="#">Franchis</a>
                    <a class="dropdown-item" href="#">Chiness</a>
                </div>
            </li> -->

        </ul>
    </div>
</div>