<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Librarian

                <!-- trigger Add Librarian Popup -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addlibrarianModal">
                <i class="fas fa-user-plus"></i>
                </button>

            </h6>
        </div>

            <!-- Add Librarian Popup -->
        <div class="modal fade" id="addlibrarianModal" tabindex="-1" aria-labelledby="addlibrarianModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addlibrarianModalLabel">Add New Librarian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Librarian Name</label>
                                <input type="email" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Librarian Email</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" name="addlibrarian_btn">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Display librarian data -->
        <div class="card-body">
            <div class="table-responsive">
                <?php
                    include_once 'code.php';
                    $result = mysqli_query($conn,"SELECT * FROM Librarian");
                ?>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lib ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $row["Id"];?></td>
                            <td><?php echo $row["firstname"];?></td>
                            <td><?php echo $row["lastname"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td> 
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['id'];?>">
                                        <button type ="submit" name="delete_btn" class="btn btn-success">EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['id'];?>">
                                    <button type ="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>  
                        </tr>
                        
                    </tbody>
                    <?php
                            $i++;
                            }
                    ?>
                </table>
                    <?php
                        }
                        else{
                        echo "No result found";
                        }
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