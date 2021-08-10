<?php
  include "dbC.php";

  $run= false;
  $Error= " ";
  $Error2= " ";

  function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }
?>


<?php
  if($_SERVER['REQUEST_METHOD']==="POST"){

    $usrNam = $_POST['userName'];
    $usrPsd = $_POST['userPassword'];

    if(empty($_POST['userName'])){
      $Error ="Email required!";
      $run = false;
    }
    else {
      $usrNam = validate_input($_POST['userName']);
      $run = true;
    }

    if(empty($_POST['userPassword'])){
      $Error2 ="Password required!";
      $run = false;
    }
    else {
      $usrNam = validate_input($_POST['userPassword']);
      $run = true;
    }

    if($run){
      if(isset($_POST['btnLogin'])){
        $usrNam = $_POST['userName'];
        $usrPsd = $_POST['userPassword'];

        $sql ="SELECT * from admuser WHERE usrName='$usrNam' and usrPassword='$usrPsd' ";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
            $usrID= $row['usrId'];
            $usrNm= $row['usrName'];
            $usrEml= $row['usrEmail'];
            $usrPssd= $row['usrPassword'];

            session_start();
            $_SESSION['SESS_USER_ID'] = $row['usrId'];
            $_SESSION['SESS_USER_NAME'] = $row['usrName'];
            $_SESSION['SESS_USER_EMAIL'] = $row['usrEmail'];

            header('Location: dash.php');
          }
        }
        else {
          echo"Username and Password Wrong";
        }
  }
}}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ADMIN LOGIN - EVM</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="main">
      <form class="" action="<?php $_PHP_SELF; ?>" method="POST">

        <div class="usrSec">
          <label for="">Username:</label>
          <input type="text" name="userName">
        </div>



        <div class="psdSec">
          <label for="">Password:</label>
          <input type="password" name="userPassword">
        </div>

        <div class="submit">
          <button type="submit" name="btnLogin">Login</button>
        </div>
        <center><?php echo $Error."<br>".$Error2; ?></center>
      </form>

    </div>
  </body>
</html>
