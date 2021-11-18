    <?php

    include_once dirname(__FILE__).'/services/IStaffServiceImplementation.php';

    ?>

    <html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>

        <div class="page-header bg-primary ">
            <div class="page-block ">
                <div class="row align-items-center">
                    <div class="col-md-12" >
                        <div class="page-header-title">
                            <!-- [ IMS: page title ] -->
                            <h2 class="m-b-12">Staff Admin Panel  <i class="fas fa-user-shield "></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3> <a href="staff_admin_add_page.php" class=" btn btn-warning text-light"> Add Staff </a></h3>

        <!--table start -->
        <table class="table table-striped table-dark">
            <tr style="background-color: #000">
                <th>Staff_ID</th>
                <th>User Name</th>
                <th>NIC</th>
                <th>Email</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Qualification </th>
                <th>Salary</th>
                <!-- <th>Ethnic</th>
                <th>CivilStatus</th>
                <th>Address</th>
                <th>Gender</th>
                <th>DateofBirth</th>
                <th>PhoneNumber</th> -->
                <th>Admin</th>
                <th>tutor</th>
                <th>cashier</th>
                <th>Update</th>
                <th>Delete</th>

            </tr>
            <?php
                $IstaffImp = new IStaffServiceImplementation();
                $queryResStaff = $IstaffImp->viewAllStaff();

                while($res = $queryResStaff->fetch_assoc()){
            ?>

             <tr>

                 <td> <?php echo $res['Staff_ID'] ?></td>
                 <td><?php echo $res['User_Name'] ?></td>
                 <td><?php echo $res['NIC'] ?></td>
                 <td><?php echo $res['Email'] ?></td>
                 <td><?php echo $res['Full_Name'] ?></td>
                 <td><?php echo $res['Last_Name'] ?></td>
<!--                 <td>--><?php //echo $res['Password'] ?><!--</td>-->

                 <td><?php echo $res['Qualification'] ?></td>
                 <td><?php echo $res['Salary'] ?></td>

<!--                 <td>--><?php //echo $res['Ethnic'] ?><!--</td>-->
<!--                 <td>--><?php //echo $res['Religion'] ?><!--</td>-->
<!--                 <td>--><?php //echo $res['Civil_Status'] ?><!--</td>-->
<!--                 <td>--><?php //echo $res['Address'] ?><!--</td>-->
<!--                 <td>--><?php //echo $res['Gender'] ?><!--</td>-->
<!--                 <td>--><?php //echo $res['DateOfBirth'] ?><!--</td>-->
<!--                 <td>--><?php //echo $res['Phone_Number'] ?><!--</td>-->

                 <td>
                     <?php
                         if(strcmp($res['Administrator'],"True")==0){
                             echo "Yes";
                         }else if(strcmp($res['Administrator'],"False")==0){
                             echo "No";
                         }else{
                             echo "Not set";
                         }
                     ?>
                 </td>
                 <td>
                     <?php
                          if(strcmp($res['Tutor'] ,"True")==0){
                              echo "Yes";
                          }else if(strcmp($res['Tutor'],"False")==0){
                              echo "No";
                          }else{
                              echo "Not set";
                          }
                     ?>
                 </td>
                 <td>
                     <?php
                        if(strcmp($res['Cashier']  ,"True")==0){
                            echo "Yes";
                        }else if(strcmp($res['Cashier'],"False")==0){
                            echo "No";
                        }else{
                            echo "Not set";
                        }
                     ?>
                 </td>
                 <td>
                     <?php $updateHref = "staff_admin_edit_page.php?staff_update_ID=".$res['Staff_ID']; ?>
                     <a href="<?php echo $updateHref ?>" class="btn btn-info">Update</a>
                 </td>
                 <td>
                     <form method="post">
                             <input type="hidden" value="<?php echo $res['Staff_ID'] ?>" name="staff_admin_view_delete_id">
                             <input type="hidden" value="<?php echo $res['User_Name'] ?>" name="staff_admin_view_delete_uname">
                             <button type = "submit" class="btn btn-danger" name="staff_admin_view_delete" >Delete</button>
                     </form>
                 </td>

             </tr>
            <?php } ?>

        </table>


    </body>

    </html>