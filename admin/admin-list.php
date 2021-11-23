<?php  

session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

//define variables
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";

?> 

<?php 
    
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
        echo "<h2 class='bg-warning text-black'>".$_SESSION['success']. "</h2>";
        unset($_SESSION['success']);
    }
?>
<!---- Begin Page Content ----->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Administrator

                <!------ trigger Add Admin Popup --------->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addadminModal">
                <i class="fas fa-user-plus"></i>
                </button>

            </h6>
        </div>

        <!------ Add Admin Popup ------>
        <div class="modal fade" id="addadminModal" tabindex="-1" aria-labelledby="addadminModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addadminModalLabel">Add New Admin</h5>
                        <button type="button" class="btn-close btn-circle" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">First Name</label> <?php echo $firstnameErr; ?>
                                <input type="email" name="fname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label> <?php echo $lastnameErr; ?>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label><?php echo $emailErr; ?>
                                <input type="email" name="email" class="form-control" require>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label><?php echo $passwordErr; ?>
                                <input type="password" name="password" class="form-control" require>
                            </div>
                            <div class="modal-footer">
                                <input type="reset" class="btn btn-secondary" data-bs-dismiss="modal" value="Close">
                                <input type="submit" class="btn btn-primary" name="addAdmin_btn" value="Save Changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!------ Admin Table  ---------->
        <div class="card-body">

            <!------- add new admin response ------>

            <div class="table-responsive">
                <?php
                    //include_once 'code.php';
                    // $result = mysqli_query($conn,"SELECT * FROM adminTable");
                ?>
                <?php
                //if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Admin ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //$i=0;
                       // while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["Id"];?></td>
                            <td><?php echo $row["firstname"];?></td>
                            <td><?php echo $row["lastname"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td> 
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['Id'];?>">
                                        <button type ="submit" name="delete_btn" class="btn btn-success">EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['Id'];?>">
                                    <button type ="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>  
                        </tr>
                    </tbody>
                    <?php
                        //$i++;
                        //}
                    ?>
                </table>
                    <?php
                      //  }
                       // else{
                       // echo "No result found";
                       // }
                    ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>