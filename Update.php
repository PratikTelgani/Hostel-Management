<?php
    session_start();
    include 'dbconnect.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $USN = $_POST["usn"];
    $Room = $_POST["room"];
    $delete = "UPDATE `hostelstudent_details` SET `R_No` = '$Room' WHERE `hostelstudent_details`.`Student_USN` = '$USN';";
    $delete2 = "UPDATE `student_details` SET `R_No` = '$Room' WHERE `student_details`.`St_USN` = '$USN';";
    $result1 = mysqli_query($con,$delete);
    $result3 = mysqli_query($con,$delete2);
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
            margin-left: 115px;
            margin-right: 990px;
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
    <title>Update Room</title>
</head>
<body>
<h1><div class="p-3 mb-2 bg-dark text-white header">Update Room</div></h1>   <br> 
<div class="p-3 mb-6 bg-dark text-white h3">Details of Hostel Inmates:</div>


<div class="container">
    <div class="table">
        <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">Room No</th>
            <th scope="col">Name</th>
            <th scope="col">USN</th>
            <th scope="col">Branch</th>
            </tr>
        </thead>
            <?php
                $getStudent = "SELECT * FROM `hostelstudent_details` WHERE Student_USN!='' ORDER BY R_No;";
                $result = mysqli_query($con,$getStudent);
                while($Room = mysqli_fetch_assoc($result))
                {
                    echo '<tr>
                    <td>'.$Room['R_No'].'</td>
                    <td>'.$Room['Student_Name'].'</td>
                    <td>'.$Room['Student_USN'].'</td>
                    <td>'.$Room['Student_Branch'].'</td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div><br>

<div class="p-3 mb-6 bg-success text-white h3">Update Room</div>

<div class="add">
    <form action="/HostelManagement/Update.php" method = "post">
    <div class="form-group">
        <label for="formGroupExampleInput">USN:</label>
        <input type="text" class="form-control" id="usn" name="usn" placeholder="Enter the USN of the student"><br>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">New Room No:</label>
        <input type="text" class="form-control" id="room" name="room" placeholder="Enter the Room No."><br>
    </div>
    <button type="submit" class="btn btn-primary">Update</button><br>
    </form>
</div>
<button type="submit" class="btn btn-dark button" ><a href="welcomeadmin.php" class="home">Home</a></button>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    </body>
</html>