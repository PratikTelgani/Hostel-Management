<?php
    session_start();
    include 'dbconnect.php';
   
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $USN = $_POST["usn"];
    $No = $_POST["room"];
    $update = "UPDATE `hostelstudent_details` SET `R_No` = '$No' WHERE `hostelstudent_details`.`Student_USN` = '$USN'";
    $update1 = "UPDATE `student_details` SET `R_No` = '$No' WHERE `student_details`.`St_USN` = '$USN'";
    $result2 = mysqli_query($con,$update1);
    $result1 = mysqli_query($con,$update);
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
    <title>Add New Student</title>
</head>
<body>
    <h1><div class="p-3 mb-2 bg-dark text-white header">Add New Student</div></h1><br>
    
    <div class="p-3 mb-6 bg-dark text-white h3">Unallocated Students:</div>

    <br>

<div class="row">
    <div class="con col-lg-9 mt-5">
        <div class="table">
            <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">USN</th>
                <th scope="col">Branch</th>
                </tr>
            </thead>
                <?php
                    $getStudent = "SELECT * FROM `hostelstudent_details` where R_No is NULL AND Student_USN!='' ORDER BY R_No;";
                    $result = mysqli_query($con,$getStudent);
                    while($Room = mysqli_fetch_assoc($result))
                    {
                        echo '<tr>
                        <td>'.$Room['Student_Name'].'</td>
                        <td>'.$Room['Student_USN'].'</td>
                        <td>'.$Room['Student_Branch'].'</td>
                        </tr>';
                }
                ?>
            </table>
        </div>
    </div><br>
    <div class="con col-lg-3 mt-5">
        <div class="table">
            <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Room No</th>
                <th scope="col">Vacancy</th>
                </tr>
            </thead>
                <?php
                    $vacancy = "SELECT R_No,3-count(R_No) as Vacancy FROM `student_details` GROUP BY R_No;";
                    $vac = mysqli_query($con, $vacancy);
                    while($Vaca = mysqli_fetch_assoc($vac))
                    {
                        echo '<tr>
                        <td>'.$Vaca['R_No'].'</td>
                        <td>'.$Vaca['Vacancy'].'</td>
                        </tr>';
                }
                ?>
            </table>
        </div>
    </div><br>
</div>



<div class="p-3 mb-6 bg-success text-white h3">Add Student:</div><br>

<div class="add">
    <form action="/HostelManagement/AddNewStudent.php" method = "post">
        <div class="form-group">
            <label for="formGroupExampleInput">USN:</label>
            <input type="text" class="form-control" id="usn" name="usn" placeholder="Enter the USN of the student"><br>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Room No:</label>
            <input type="text" class="form-control" id="room" name="room" placeholder="Enter the Room No. to be allocated"><br>
        </div>
        <button type="submit" class="btn btn-primary">Add</button><br>
    </form>
</div>
<button type="submit" class="btn btn-dark button" ><a href="welcomeadmin.php" class="home">Home</a></button>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    </body>
</html>