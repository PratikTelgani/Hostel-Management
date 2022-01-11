<?php
    session_start();
    include 'dbconnect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Room = $_POST['room'];
    $status = $_POST['status'];
    $query = "UPDATE `complaints` SET `Status` = '$status' WHERE `Room_No` = '$Room'";
    $result = mysqli_query($con, $query);
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
        .in{
           border: 1px solid black;
           outline: none;
           border-radius: 5px;
           box-shadow: 3px 3px 2px 1px black;
        }
        .img-area{
          background-image: url("Images/comp.jpg");
          -webkit-background-size: cover;
          background-size: cover;
          background-position: center center;
          height: 100vh;
          position: fixed;
          left: 0;
          right: 0;
          z-index: -1;
          filter: blur(8px);
          -webkit-filter: blur(8px);
          background-color: rgba(0,0,0,.3);
        background-blend-mode: multiply;
       }
        .table{
            margin-left: 10px;
            margin-right: 10px;
        }
        .h3{
            margin-left: 115px;
            margin-right: 1040px;
        }
        .add{
            margin-left: 125px;
            margin-right: 60%;
        }
        .butt a:hover{
            color: red;
        }
        .butt{
            align-items: center;
            margin-left: 45%;
        } 
        .home{
            text-decoration: none;
            color: white;
        }
        .add{
            color: red;
            font-weight: bold;
        }
    </style>
    <title>Complaints</title>
</head>
<body>
    <div class="img-area"></div>
    <h1><div class="p-3 mb-2 bg-dark text-white header">Complaints</div></h1><br>


<div class="container">
<div class="table">
        <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">Room No</th>
            <th scope="col">Complaints</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
            <?php
                $query1 = "SELECT * FROM complaints where Status != 'Resolved'";
                $result2 = mysqli_query($con, $query1);
                while($rows2 = mysqli_fetch_assoc($result2))
                {
                    echo '<tr>
                    <td>'.$rows2['Room_No'].'</td>
                    <td>'.$rows2['Complaint'].'</td>
                    <td>'.$rows2['Status'].'</td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div><br>

<div class="p-3 mb-6 bg-success text-white h3">Resolve:</div>

<div class="add">
    <form action="/HostelManagement/Complaints.php" method = "post">
        <div class="form-group">
            <label for="formGroupExampleInput">Room No</label>
            <input type="text" class="form-control in" id="room" name="room" placeholder="Enter the Room No"><br>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Status</label>
            <input type="text" class="form-control in" id="status" name="status" placeholder="Enter Resolved if done"><br>
        </div>
        <button type="submit" class="btn btn-success">Submit</button><br>
    </form>
</div>
<button type="submit" class="btn btn-dark butt" ><a href="welcomeadmin.php" class="home">Home</a></button>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    </body>
</html>