<?php
  require('dbC.php');

  session_start();

  if(empty($_SESSION['SESS_USER_ID'])){
    header("Location: index.php");
  }

  $SESS_usrID = $_SESSION['SESS_USER_ID'];
  $SESS_usrNM = $_SESSION['SESS_USER_NAME'];
  $SESS_usrEML = $_SESSION['SESS_USER_EMAIL'];


  for($a=1;$a<=8;$a++){
    $sql ="SELECT * from prt where prtID=$a";

    $result=mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $prtyID[$a]= $row['prtVoteTotal'];
        }
    }
  }




  if(isset($_GET['logout2'])){
      SESSION_UNSET();
      SESSION_DESTROY();
      header("Location:./");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - EVM</title>
    <link rel="stylesheet" href="../css/style.css">

    <style media="screen">
      .noos{
        line-height: 50px;
      }
    </style>
  </head>
  <body>
    <form class="main">

      <ul class="leftBox">

        <li>
          <img src="../img/bjp.png" alt="">
          <span>Bharatiya Janata Party</span>
        </li>

        <li>
          <img src="../img/inc.png" alt="">
          <span>Indian National Congress</span>
        </li>

        <li>
          <img src="../img/bsp.png" alt="">
          <span>Bahujan Samaj Party</span>
        </li>

        <li  class="lf">
          <img src="../img/aitc.png" alt="">
          <span>All India Trinamool Congress</span>
        </li>


        <li>
          <img src="../img/cpi.png" alt="" >
          <span>Communist Party of India</span>
        </li>

        <li>
          <img src="../img/ncp.png" alt="">
          <span>Nationalist Congress Party</span>
        </li>

        <li>
          <img src="../img/app.jpg" alt="">
          <span>Aam Aadmi Party</span>
        </li>

        <li>
          <img src="../img/bjd.jpg" alt="">
          <span>Biju Janata Dal</span>
        </li>

      </ul>


      <ul class="rightBox">
        <li>
          <center class="noos"><h3><?php echo $prtyID[1];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[2];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[3];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[4];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[5];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[6];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[7];?></h3></center>
        </li>

        <li>
          <center class="noos"><h3><?php echo $prtyID[8];?></h3></center>
        </li>

      </ul>

      <button type="submit" name="logout2"  class="" onclick="">LOGOUT</button>
    </form>

  </body>
</html>
