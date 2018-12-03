<?php
function prisijungti(){
include("config.php");
$conn = mysqli_connect($host, $user, $pass); 
$db = mysqli_select_db($conn,$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    $vardas = $_POST['name'];
    $slaptazodis = $_POST['pass'];
   
    $query = mysqli_query($conn,"SELECT* FROM emp WHERE first_name ='$vardas' and  pass = '$slaptazodis' ");
  
    $rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if($rows == 1){
        $_SESSION['name']=$vardas;
        $user_id = $row['emp_id'];
        $_SESSION['emp_id']=$user_id;
        header('Location: main.php');
    }
    else{
        $error= "nei vienas row";
    }
    mysqli_close($conn);
};
?>