<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<?php include dirname(__FILE__) . '/../3_Timetable/mysql_db_connection.inc.php'; ?>

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menupos-fixed brand-blue">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">

                <li class="nav-item pcoded-menu-caption">
                    <label>Home</label>
                </li>

                <li class="nav-item">
                    <a href="../dashboard_for_staff/tutor_view.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-home text-white"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Components</label>
                </li>

                <li class="nav-item">
                    <!-- Timetable for staff start php code-->
                    <?php

                        global $conn;
                        $resUserFullName = $conn->query("SELECT * FROM staff WHERE Staff_ID='$Staff_ID'");
                        $row=$resUserFullName->fetch_assoc();
                        $userFullName = $row['Full_Name'];

                        $timetableURL = "../3_Timetable/timetable_staff_page.php?staffName=".$userFullName;
                    ?>
                    <a href="<?php echo $timetableURL ?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-calendar-alt"></i></span><span class="pcoded-mtext">Timetables</span></a>
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
            <!-- ========   [ IMS: Logo ]   ============ -->
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
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><?php include '../other/notificationCheck.php';?></a>
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
                        <img src="../assets/images/user/faculty.png" class="img-radius wid-40" alt="User-Profile-Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="../assets/images/user/faculty.png" class="img-radius" alt="User-Profile-Image">
                            <span><?php require_once 'getUsername.php';
                                    include_once 'loggedInCheck.php';
                                    echo getUsername($_SESSION['id']); ?></span>
                            <a href="../1_Staff/logout.php" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="../other/userProfile.php?myId=<?php echo $Staff_ID ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->