<!-- Author: Mattania Mckoy 1704278   -->


<!------------ DB CONNECTION -------------------->
<?php 
//define variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HighSchoolDB";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// if (!$conn) {
//     die("Connection failure");
// }
?>

<!----------------- INSERT NEW ADMIN --------------->
<?php

//check button click
 if(isset($_POST['addAdmin_btn']) && $_SERVER['REQUEST_METHOD'] == "POST")
 {

    //function to clean data before assigment
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
    //get info
    $firstname = test_input($_POST['fname']);
    $lastname = test_input($_POST['lname']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']); //hash this

    session_start();
    //$query = "INSERT TO adminTable (firstName, lastName, email, password) VALUES('$firstname', '$lastname',' $email','$password')";
   // $query_run=mysqli_query($connection, $query);
    
    if(isset($_POST['addAdmin_btn'])){
        echo "Saved";
        $_SESSION['success'] ="Admin Added";
        header('Location: admin-list.php');

    }else{
        echo "Not saved";
        $_SESSION['success'] ="Admin Not Added";
        header('Location: admin-list.php');
    }
   // mysqli_close($connection);

}
?>

