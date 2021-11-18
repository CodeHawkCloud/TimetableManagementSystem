<?php

session_start();
include_once dirname(__FILE__).'/services/IStaffServiceImplementation.php';


$iStaff = new IStaffServiceImplementation();
$errorUnPw = "";
$errorNic = "";
$errorFirst = "";

if (isset($_POST['submit'])) {

    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $lastname = $_POST['lastname'];
    $Username = $_POST['Username'];
    $upass = $_POST['upass'];
    $qualification = $_POST['qualification'];
    $ethnic = $_POST['ethnic'];
    $religion = $_POST['religion'];
    $civilstatus = $_POST['civilstatus'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phonenumber = $_POST['phonenumber'];


    $register = $iStaff->reg_user($nic, $email, $fullname, $lastname, $Username, $upass, $qualification, $ethnic, $religion, $civilstatus, $address, $gender, $dob, $phonenumber);
        if (strcmp($register,'success')==0) {
            header("location:login.php?registration=success");
        }else if(strcmp($register,'EmailCombo')==0) {
            $errorUnPw = "emailOrUnameExists";
        }else if(strcmp($register,'NicCombo')==0){
            $errorNic = "nicExists";
        }else if(strcmp($register,'FirstCombo')==0){
            $errorFirst = "firstExists";
        }

}
?>

<?php include '../dashboard_for_staff/head.inc.php' ?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Timetable Management System</title>
    <link rel="icon" href="../assets/images/titleLogo.png" type="image/png">
</head>

<body style="background:linear-gradient(to right,#4099ff,#73b4ff);">


    <div class="row">
        <div class="col-sm-6 offset-3" style="margin: auto;margin-top: 40px;margin-bottom: 40px">
            <div class="card" >
                <div class="card-body">

                    <div class="col-sm-14 text-center" style="padding-bottom: 5px;padding-top: 3px">

                        <h1> Registration</h1>

                    </div>

                    <!--uname or password already exists error message-->
                    <?php if(strcmp("$errorUnPw","emailOrUnameExists")==0){ ?>
                        <div class="col-sm-14" style="text-align: center">
                            <div class="alert alert-warning" >
                                Username or Email you have entered already exists !
                            </div>
                        </div>
                    <?php } ?>

                    <!--NIC already exists error message-->
                    <?php if(strcmp("$errorNic","nicExists")==0){ ?>
                        <div class="col-sm-14" style="text-align: center">
                            <div class="alert alert-warning" >
                                The NIC you have entered is invalid!
                            </div>
                        </div>
                    <?php } ?>

                    <!--first name already exists error message-->
                    <?php if(strcmp("$errorFirst","firstExists")==0){ ?>
                        <div class="col-sm-14" style="text-align: center">
                            <div class="alert alert-warning" >
                                The first name you have entered already exists!
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-sm-12" style="margin-top: 5px">
                        <div class="row">
                            
                            <!--form starts-->
                            <form method="post" name="reg" onsubmit="return check()" id="registration_form" action="" class="col-sm-12">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label for="username">User Name :</label>
                                        <input type="text" name="Username" id="username" class="form-control" value="" required/>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="first">First Name :</label>
                                            <input type="text" name="fullname" id="first" value="" class="form-control" required/>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="last">Last Name :</label>
                                            <input type="text" name="lastname" id="last" required="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_email">Email </label>
                                        <input type="email" id="form_email" name="email" class="form-control" required/>
                                        <span class="error_form text-danger" id="email_error_message"></span>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="form_nic">NIC Number :</label>
                                            <input type="text" name="nic" id="form_nic"  class="form-control" required/>
                                            <span class="error_form text-danger" id="nic_error_message"></span>

                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="form_password">Password :</label>
                                            <input type="password" id="form_password" name="upass" class="form-control" required/>
                                            <span class="error_form text-danger" id="password_error_message"></span>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone :</label>
                                        <input type="text" id="phone" name="phonenumber" maxlength="10" class="form-control" required/>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="quali">Qualification :</label>
                                            <input type="text" id="quali" name="qualification" class="form-control" required/>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="ethnic">Ethnic :</label>
                                            <select name="ethnic" id="ethnic" class="form-control">
                                                <option value="">--Select Ethnic</option>
                                                <option value="Sinhalese">Sinhalese</option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="religion">Religion :</label>
                                            <select name="religion" id="religion" class="form-control">
                                                <option value="">--Select Religion</option>
                                                <option value="Buddhists">Buddhists</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Christian">Christian</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="religion">Civil Status :</label>
                                            <select name="civilstatus" id="civilstatus" class="form-control">
                                                <option value="">--Select Civil Status</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class=" form-group">
                                        <label for="address">Address :</label>
                                        <input type="text" id="address" name="address" class="form-control" required/>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Gender :</label>
                                            <br>
                                            <input type="radio" id="gendermale" name="gender" required value="Male"checked />Male
                                            <input type="radio" name="gender" required="" value="Female" />Female

                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="date">Date Of Birth :</label>
                                            <input type="date" id="date" name="dob" required class="form-control" />

                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-success btn-block" onclick="return(check());"  name="submit" value="Register" >Register</button>

                                    <a href="login.php" class="btn btn-primary btn-block">Already registered! Click Here!</a>
                                </div>
                            </form>
                            <!--form ends-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<script>
		function check() {
			//-----------------------------username validation
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
			//--------------------------------email validation
			var patternEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/

			if (x[3].value.trim() === "") {
				swal("Email is left empty ", "You cannot leave the Email field empty!", "warning");
				return false;
			}

			if (!patternEmail.test(x[3].value)) {
				swal("Invalid email", "The email pattern is incorrect", "error");
				return false;
			}

            if (x[4].value.trim() === "") {
                swal("NIC is left empty", "You cannot leave the NIC field empty!", "warning");
                return false;
            }

            if (x[5].value.trim() === "") {
                swal("Password is left empty", "You cannot leave the Password field empty!", "warning");
                return false;
            }

			var patternPhone = /^([0-9]{10})+$/
			if (x[6].value.trim() === "") {
				swal("Phone number is left empty ", "You cannot leave the Phone number field empty!", "warning");
				return false;
			}

			if (!patternPhone.test(x[6].value)) {
				swal("Invalid phone number", "Phone numbers contain 10 digits", "error");
				return false;
			}

			if (x[7].value.trim() === "") {
				swal("Qualification is left empty ", "You cannot leave the Qualification field empty!", "warning");
				return false;
			}
			
			if (x[8].value.trim() === "") {
				swal("Address is left empty", "You cannot leave the Address field empty!", "error");
				return false;
			}

            if (x[11].value.trim()=== ""){
                swal("Date of birth is not selected ", "You cannot leave the Date of birth field empty!", "warning");
                return false;
            }

			//nic warnings
			var nic_pattern_1 = /^([0-9.V]{10})*$/
            var nic_pattern_2  = /^([0-9]{12})*$/
            var nic_input = $("#form_nic").val();


            if ( !(nic_pattern_1.test(nic_input)|| nic_pattern_2.test(nic_input))) {

                swal("NIC is invalid", "The NIC you have entered is unacceptable!", "error");
                return false;

            }

            //email warnings
            var email_pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/
            var email_in = $("#form_email").val();

            if (!email_pattern.test(email_in)) {

                swal("Email is invalid", "The Email you have entered is invalid!", "error");
                return false;

            }

            //password warnings
            var pass_input = $("#form_password");

            var password_length = pass_input.val().length;

            if (password_length < 8) {

                swal("Password is too short", "The Password should contain at least 8 characters!", "error");
                return false;
            }




		}
		//onload validation
		$(function() {

            //date picker future dates disabled
            var newDate = new Date();

            var month = newDate.getMonth() + 1;
            var day = newDate.getDate();
            var year = newDate.getFullYear();
            year = year - 16;
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#date').attr('max', maxDate);

            //dynamic error detection
		    var nic_error = $("#nic_error_message");
		    var email_error = $("#email_error_message");
            var password_error = $("#password_error_message");

            var nic_form = $("#form_nic");
            var email_form = $("#form_email");
            var password_form = $("#form_password");

			nic_error.hide();
			email_error.hide();
			password_error.hide();

			var error_nic = false;
			var error_email = false;
			var error_password = false;
			var error_retype_password = false;

			nic_form.focusout(function() {
				check_nic();
			});


			email_form.focusout(function() {
				check_email();
			});

			password_form.focusout(function() {
				check_password();
			});

			//checking the nic
			function check_nic() {

			    //old id cards
				var pattern = /^([0-9.V]{10})*$/;
				//new id cards
				var pattern2 = /^([0-9]{12})*$/;


				var nic_val = nic_form.val();

				if (pattern.test(nic_val) && nic_val !== '') {
					nic_error.hide();
					nic_form.css("border-bottom", "2px solid #34F458");
				} else {
					if (pattern2.test(nic_val) && nic_val !== '') {
						nic_error.hide();
						nic_form.css("border-bottom", "2px solid #34F458");

					} else {
						nic_error.html("xxxxxxx97V or xxxxxxxxx123");
						nic_error.show();
						nic_form.css("border-bottom", "2px solid #F90A0A");
						error_nic = true;
					}
				}
			}

            //password check
			function check_password() {
				var password_length_of_input = password_form.val().length;

				if (password_length_of_input < 8) {
					password_error.html("Password must contain at least 8 characters");
					password_error.show();
					password_form.css("border-bottom", "2px solid #F90A0A");
					error_password = true;
				} else {
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

</body>

</html>