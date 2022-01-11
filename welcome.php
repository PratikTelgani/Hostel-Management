<?php

session_start();

include 'dbconnect.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Student_login.php");
    exit;
}
else{

  $username = $_SESSION['username'];
  $sql = "Select * from logindetails where Email='$username'";
  $result = mysqli_query($con,$sql);
  $rows = mysqli_fetch_assoc($result);
  $USN = $rows['USN'];
  $notice = "Select * from hostelnotice";
  $notice1 = mysqli_query($con,$notice);
  $notice2 = mysqli_fetch_assoc($notice1);
  
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Padauk:wght@700&display=swap" rel="stylesheet">
    <title>welcome - <?php $_SESSION['username'] ?> </title>

    <style>
        .table{
             margin-left: 10px;
             margin-right: 100px;
         }
        .notice{
          margin-left: 30%;
          margin-right: 30%;
          text-align: center;
          border-radius: 8px;
        }
        .img-area{
          background-image: url("Images/entrance.jpg");
          -webkit-background-size: cover;
          background-size: cover;
          background-position: center center;
          height: 100vh;
          position: fixed;
          left: 0;
          right: 0;
          z-index: -1;
          filter: blur(5px);
          -webkit-filter: blur(5px);
       }
        .p{
            box-shadow: 8px 8px 8px black;
            margin-left: 1%;
            margin-top: 10px;
            margin-right: 70%;
        }
        .not{
          border: 3px solid black;
          margin-left: 30%;
          margin-right: 30%;
          border-radius: 8px;
          box-shadow: 5px 5px 5px black;
        }
    </style>
</head>
<body>
<div class="img-area"></div>
  <div class="bg-dark bg-dark text-white header">Hostel Management</div><br>


<div class="nav nav-pills nav-bar">
      <ul class="bg-dark bg-dark text-white nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link navs" aria-current="page" href="welcome.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navs" aria-current="page" href="AddComplaints.php">Complaints</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navs" aria-current="page" href="AddRoomService.php">Room Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navs" href="HostelManagement.html">Logout</a>
        </li>
      </ul>
</div>

<hr>
    <h1><div class="p-3 mb-2 bg-success text-white p">Hey <?php echo $rows['Name']?></div></h1>

<hr><br>

<div class="container">
    <div class="table">
        <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">Room No</th>
            <th scope="col">Name</th>
            <th scope="col">USN</th>
            <th scope="col">Branch</th>
            <th scope="col">Year</th>
            <th scope="col">Mob</th>
            <th scope="col">Address</th>
            <th scope="col">Fee</th>
            </tr>
        </thead>
            <?php
                $query = "select * from student_details where St_USN = '$USN' ";
                $result1 = mysqli_query($con,$query);
                while($rows1 = mysqli_fetch_assoc($result1))
                {
                    echo '<tr>
                    <td>'.$rows1['R_No'].'</td>
                    <td>'.$rows1['St_Name'].'</td>
                    <td>'.$rows1['St_USN'].'</td>
                    <td>'.$rows1['St_Branch'].'</td>
                    <td>'.$rows1['St_Year'].'</td>
                    <td>'.$rows1['St_PhNo'].'</td>
                    <td>'.$rows1['St_Addr'].'</td>
                    <td>'.$rows1['Fee'].'</td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div>

<br>

<h1><div class="p-3 mb-2 bg-primary text-white notice">Notice Board</div></h1>


<div class="not">
  <div class=" accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Hostel Notice:
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong><?php echo ''.$notice2['Hostel'].'' ; ?></strong>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Mess Details:
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong><?php echo ''.$notice2['Mess'].'' ; ?></strong>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Events:
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong><?php echo ''.$notice2['Events'].''; ?></strong>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>



</body>
</html>