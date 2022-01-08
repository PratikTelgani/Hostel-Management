<?php

session_start();
include 'dbconnect.php';

  
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $room1 = $_POST["room"];
  $status = $_POST["status"];
  $insert = "UPDATE `room_service` SET `Status` = '$status' WHERE `Room_No` = '$room1'";
  $insert1 = mysqli_query($con, $insert);
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

    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <style>
        .header{
            margin-right: 35%;
            margin-left: 35%;
        }
        .table{
            margin-left: 10px;
            margin-right: 10px;
        }
        .h3{
            margin-left: 108px;
            margin-right: 1040px;
            box-shadow: 8px 8px 8px black;

        }
        .add{
            margin-left: 125px;
            margin-right: 60%;
        }
        .button{
            align-items: center;
            margin-left: 45%;
        }
        .home{
            text-decoration: none;
            color: white;
        }
    </style>
    <title>Room Service</title>
</head>
<body>
    <h1><div class="p-3 mb-2 bg-dark text-white header">Room Service</div></h1>
    <br>


<div class="container">
    <div class="table">
        <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">Room No</th>
            <th scope="col">Time slot</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
            <?php
                $query1 = "SELECT * FROM room_service where `Status`!='Done'";
                $result2 = mysqli_query($con, $query1);
                while($rows2 = mysqli_fetch_assoc($result2))
                {
                    echo '<tr>
                    <td>'.$rows2['Room_No'].'</td>
                    <td>'.$rows2['Time'].'</td>
                    <td>'.$rows2['Status'].'</td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div><br>

<div class="p-3 mb-6 bg-success text-white h3">Room Service:</div>

<div class="add">
    <form action="/HostelManagement/RoomService.php" method = "post">
        <div class="form-group">
            <label for="formGroupExampleInput">Room No</label>
            <input type="text" class="form-control" id="room" name="room" placeholder="Enter the Room No"><br>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Status</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Enter status as Done if completed"><br>
        </div>
        <button type="submit" class="btn btn-success">Submit</button><br>
    </form>
</div>
<button type="submit" class="btn btn-dark button button" ><a href="welcomeadmin.php" class="home">Home</a></button>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    </body>
</html>