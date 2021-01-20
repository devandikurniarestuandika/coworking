<?php
class Login{
  public function LoginSystem(){
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
      if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is invalid";
      }
      else{
        include 'connect.php';
        // Define $email and $password
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // SQL query to fetch information of registerd members and finds user match.
        $query = "SELECT email, password FROM members WHERE email=? AND password=? LIMIT 1";
        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->bind_result($email, $password);
        $stmt->store_result();
        if($stmt->fetch()) { //fetching the contents of the row 
          $_SESSION['email'] = $email; // Initializing Session
      }
      mysqli_close($conn); // Closing Connection
    }
  }}
  public function SessionVerify(){
    if(isset($_SESSION['email'])){
    header("location: includes/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck(){
    global $conn;
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['email'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT * FROM members WHERE email = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION["id"] = $row["id"];
    $_SESSION["status"] = $row["status"];
  }
  public function UserType(){
      //if user role is 1, redirect to admin page
      if ($_SESSION["status"] == 1) {
        header("Location:../int/main/index.php?halaman=beranda");
      }
      //if user role is 0, redirect to karyawan page
      if ($_SESSION["status"] == 0) {
        header("Location:logout.php");
      }
  }
}

class IdFunctions{
  public function Id(){
    $id = $_SESSION["id"];
    echo $id;
  }
}
class StatusFunctions{
  public function Status(){
    $status = $_SESSION["status"];
    echo $status;
  }
}

?>
