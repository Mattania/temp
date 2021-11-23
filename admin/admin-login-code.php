<!-- ---------------ADMIN LOGIN ------------------->
<?php

//define variables
$getEmail = $getPassword = "";

//check if button click
if(isset($_POST['adminLogin_btn']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    //function to clean data before assigment
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

        $getEmail = test_input($_POST['email']);
        $getPassword = test_input($_POST['password']);


     if($getEmail == 'Admin@gmail.com' && $getPassword == "123"){
        $_SESSION['username'] = $getEmail;
        header('Location: index.php');

    }else{
        $_SESSION['status'] = 'Email or Password is invalid';
        header('Location: admin-login.php');
        exit();
     
    }

    //  Query AdminTable in HighSchool_DB
    //  $query = "SELECT * FROM AdminTable WHERE username='$getEmail' AND password = '$getPassword'";
    //  $query_run = mysqli_query($connection, $query);

    //  if(mysqli_fetch_array($query_run))
    //  {
    //      $_SESSION['username'] = $getEmail;
    //      header('Location: index.php');
    //
    //  }else{
    //      $_SESSION['status'] = 'Email or Password is invalid';
    //      header('Location: admin-login.php');
    //  }
 
    }

?>