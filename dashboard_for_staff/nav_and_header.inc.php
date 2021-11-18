<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menupos-fixed brand-blue">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Home</label>
                </li>
                <li class="nav-item">
                    <a href="../1_Staff/admin_dashboard.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>


                <li class="nav-item pcoded-menu-caption">
                    <label>Sub - components</label>
                </li>

                <li class="nav-item">
                    <a href="../1_Staff/staff_admin_view_page.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-user-tie"></i></span><span class="pcoded-mtext">Staff</span></a>
                </li>

                <li class="nav-item">
                    <a href="../2_Subject/subject_admin_view_page.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-layer-group"></i></span><span class="pcoded-mtext">Subjects</span></a>
                </li>

                <li class="nav-item">
                    <a href="../4_Classroom/classroom_admin_view_page.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-chalkboard"></i></span><span class="pcoded-mtext">Classrooms</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Core - component</label>
                </li>


                <li class="nav-item">
                    <a href="../3_Timetable/timetable_admin_mainmenu_page.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-calendar-alt"></i></span><span class="pcoded-mtext">Timetables</span></a>
                </li>



            </ul>


        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed headerpos-fixed header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="../index.php" class="b-brand">
            <!-- ========   [ TMS: Logo ]   ============ -->
            <img src="../assets/images/logoMain.png" alt="" class="logo">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><?php include '../other/notificationCheck.php'; ?></a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="../other/notification.php?clearall=true" style="text-decoration: none">Clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <?php include '../other/notification.php'; ?>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../assets/images/user/admin.png" class="img-radius wid-40" alt="User-Profile-Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="../assets/images/user/admin.png" class="img-radius" alt="User-Profile-Image">
                            <span><?php require_once 'getUsername.php';
                                    include_once 'loggedInCheck.php';
                                    echo getUsername($_SESSION['id']); ?></span>
                            <a href="../1_Staff/logout.php" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->