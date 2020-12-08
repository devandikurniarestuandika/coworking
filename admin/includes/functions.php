<?php
class Login{
  public function LoginSystem(){
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
      if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
      }
      else{
        include 'connect.php';
        // Define $username and $password
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT username, password FROM users WHERE username=? AND password=? LIMIT 1";
        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();
        if($stmt->fetch()) { //fetching the contents of the row 
          $_SESSION['username'] = $username; // Initializing Session
      }
      mysqli_close($conn); // Closing Connection
    }
  }}
  public function SessionVerify(){
    if(isset($_SESSION['username'])){
    header("location: includes/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck(){
    global $conn;
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['username'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT * FROM users WHERE username = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION["id"] = $row["id"];
    $_SESSION["no_ktp"] = $row["no_ktp"];
    $_SESSION["nama"] = $row["nama"];
    $_SESSION["password"] = $row["password"];
    $_SESSION["role"] = $row["role"];
    $_SESSION["status"] = $row["status"];
    $_SESSION["foto"] = $row["foto"];
    $_SESSION["created_at"] = $row["created_at"];
  }
  public function UserType(){
      //if user role is 1, redirect to admin page
      if ($_SESSION["role"] == 1) {
        header("Location:../user/admindash/index.php?halaman=beranda");
      }
      //if user role is 0, redirect to karyawan page
      if ($_SESSION["role"] == 0) {
        header("Location:../user/dashboard/index.php?halaman=beranda");
      }
  }
}

class IdFunctions{
  public function Id(){
    $id = $_SESSION["id"];
    echo $id;
  }
}
class KtpFunctions{
  public function Ktp(){
    $ktp = $_SESSION["no_ktp"];
    echo $ktp;
  }
}
class NamaFunctions{
  public function Nama(){
    $nama = $_SESSION["nama"];
    echo $nama;
  }
}
class PassFunctions{
  public function Pass(){
    $pass = $_SESSION["password"];
    echo $pass;
  }
}
class FotoFunctions{
  public function Foto(){
    $foto = $_SESSION["foto"];
    echo $foto;
  }
}
class CreatedatFunctions{
  public function Createdat(){
    $createdat = $_SESSION["created_at"];
    echo $createdat;
  }
}
?>
