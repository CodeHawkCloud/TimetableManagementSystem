<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    include '../dashboard_for_staff/session_for_staff.php' ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php include '../3_Timetable/mysql_db_connection.inc.php'; ?>
        <?php include '../dashboard_for_staff/head.inc.php'; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    </head>

    <body>

        <?php

            $myId = $_GET['myId'];

            global $conn;
            $sql = "SELECT * FROM staff WHERE Staff_ID LIKE '$myId'";
            $res = $conn->query($sql);

            while($row = $res->fetch_assoc()) {
                $resUname = $row['User_Name'];
                $resPhone = $row['Phone_Number'];
                $resEmail = $row['Email'];
                $resPass = $row['Password'];
            }
        ?>

        <?php include '../dashboard_for_staff/nav_header_tutor.php'?>

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- [ breadcrumb ] start -->
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="page-header-title">
                                                    <!-- [ IMS: page title ] -->
                                                    <h5 class="m-b-10">My Profile</h5>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <!-- [ IMS: breadcrumb ] -->
                                                    <li class="breadcrumb-item"><a href="../dashboard_for_staff/tutor_view.php"><i class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ breadcrumb ] end -->

                                <!-- [ Main Content ] start -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body bg-patern">
                                                <h4 style="text-align: center"><?php echo getUsername($myId); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--error and success messages start -->
                                <?php if(isset($_GET['updateUserSuccess'])){

                                    $updateSuccess = $_GET['updateUserSuccess'];

                                    if(strcmp($updateSuccess,"true")==0){
                                ?>
                                        <div class="alert alert-success col-sm-6 offset-3 text-center">
                                            Your Profile has been updated successfully !
                                        </div>
                                    <?php  }else{ ?>

                                        <div class="alert alert-danger col-sm-6 offset-3 text-center">
                                            <h2>Update Failed !</h2>

                                            <?php if($_GET['userC'] > 0){ ?>
                                                <p>The username you entered already exists, please enter an unique username !</p>
                                            <?php } ?>

                                            <?php if($_GET['emailC'] > 0){ ?>
                                                <p>The email you entered already exists, please enter an unique email !</p>
                                            <?php } ?>

                                        </div>

                                    <?php } ?>
                                <?php } ?>
                                <!--error and success messages end -->

                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="card">
                                            <div class="card-body">

                                                <?php $updateFormURL = "controllers/UserProfileController.php?update_id=".$myId;  ?>
                                                <form method="post" name="form1"  action="<?php echo $updateFormURL ?>">

                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label for="username">User Name :</label><br>
                                                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $resUname; ?>" required  />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="form_email">Email : </label><br>
                                                            <input type="email" class="form-control" id="form_email" name="email" value="<?php echo $resEmail; ?>" required  />
                                                            <span class="error_form text-danger" id="email_error_message"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="form_password">Enter new password :</label>
                                                            <input type="password" class="form-control" id="form_password" name="pass" value="" placeholder="Fill this field, only if  you wish to change the password..."/>
                                                            <span class="error_form text-danger" id="password_error_message"></span>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="phone">Phone :</label><br>
                                                            <input type="text" id="phone" name="phonenumber"  maxlength="10" class="form-control" value="<?php echo $resPhone; ?>" required/>
                                                        </div>


                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success" name="update_profile" onclick="return(check());">Save Changes</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- [ Main Content ] end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <?php include'../dashboard_for_staff/req_js.inc.php' ?>
    </body>

    </html>

    <script>
        function check() {
            //username validation
            x = document.getElementsByTagName("input");
            var patternUn = /^[A-Za-z]+$/

            if (x[0].value === "") {
                swal("Username is left empty", "You cannot leave the Username field empty!", "warning");
                return false;
            }
            if (!patternUn.test(x[0].value)) {
                swal("Invalid username", "Username can contain only letters", "error");
                return false;
            }

            //email validation
            var patternEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/

            if (x[1].value.trim() === "") {
                swal("Email is left empty ", "You cannot leave the Email field empty!", "warning");
                return false;
            }

            if (!patternEmail.test(x[1].value)) {
               swal("Invalid email", "The email pattern is incorrect", "error");
               return false;
            }

            //password warnings

            var pass_input = $("#form_password");

            var password_length = pass_input.val().length;
            if(password_length > 0){
                if (password_length < 8) {

                    swal("Password is too short", "The Password should contain at least 8 characters!", "error");
                    return false;

                }
            }

            var patternPhone = /^([0-9]{10})+$/
            if (x[3].value.trim() === "") {
                swal("Phone number is left empty ", "You cannot leave the Phone number field empty!", "warning");
                return false;
            }

            if (!patternPhone.test(x[3].value)) {
                swal("Invalid phone number", "Phone numbers contain 10 digits", "error");
                return false;
            }

        }

        $(function() {

            //dynamic error detection
            var email_error = $("#email_error_message");
            var password_error = $("#password_error_message");


            var email_form = $("#form_email");
            var password_form = $("#form_password");

            email_error.hide();
            password_error.hide();

            var error_email = false;
            var error_password = false;


            email_form.focusout(function() {
                check_email();
            });

            password_form.focusout(function() {
                check_password();
            });


            //password check
            function check_password() {
                var password_length_of_input = password_form.val().length;

                    if(password_length_of_input > 0){
                        if (password_length_of_input < 8) {
                            password_error.html("Password must contain at least 8 characters");
                            password_error.show();
                            password_form.css("border-bottom", "2px solid #F90A0A");
                            error_password = true;
                        }else{
                            password_error.hide();
                            password_form.css("border-bottom", "2px solid #34F458");
                        }
                    }else {
                        password_error.hide();
                        password_form.css("border-bottom", "2px solid #34F458");
                    }
                }

                // function check_retype_password() {
                // 	var password = $("#form_password").val();
                // 	var retype_password = $("#form_retype_password").val();
                // 	if (password !== retype_password) {
                // 		$("#retype_password_error_message").html("Passwords Did not Matched");
                // 		$("#retype_password_error_message").show();
                // 		$("#form_retype_password").css("border-bottom", "2px solid #F90A0A");
                // 		error_retype_password = true;
                // 	} else {
                // 		$("#retype_password_error_message").hide();
                // 		$("#form_retype_password").css("border-bottom", "2px solid #34F458");
                // 	}
                // }

                //email check
                function check_email() {

                    var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                    var email_input = email_form.val();

                    if (pattern.test(email_input) && email_input !== '') {
                        email_error.hide();
                        email_form.css("border-bottom", "2px solid #34F458");
                    } else {
                        email_error.html("Invalid Email");
                        email_error.show();
                        email_form.css("border-bottom", "2px solid #F90A0A");
                        error_email = true;
                    }
                }

            });
    </script>
