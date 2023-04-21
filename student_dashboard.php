<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #header{
            height: 10%;
            width: 100%;
            top: 2%;
            background-color: black;
            position: fixed;
            color: white;
        }
        #left_side{
            height: 75%;
            width: 15%;
            top: 15%;
            position: fixed;
        }
        #right_side{
            height: 75%;
            width: 80%;
            background-color: whitesmoke;
            position: fixed;
            left: 17%;
            top: 21%;
            color: red;
            border: solid 1px black;
        }
        #td{
            border: solid 1px black;
            padding-left: 2px;
            text-align: left;
            width: 200px;
        }
        #id{
            border: solid 1px black;
            padding-left: 2px;
            text-align: left;
            width: 200px;
        }
    </style>
    <?php
        session_start();
        $connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"SMS");
    ?>
</head>
<body>
    <div id="header">
        <center><br><strong>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Email: <?php echo $_SESSION['email'];?> 
        &nbsp;&nbsp;&nbsp;&nbsp; Name: <?php echo $_SESSION['name'];?>
        &nbsp;&nbsp;&nbsp;&nbsp; <a href="logout.php">Logout</a>
        </center>
    </div>
    <div id="left_side"><br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="show_detail" value="Show Details">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit_detail" value="Edit Details">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="right_side"><br><br><br>
        <div id="demo">
            <?php
            if(isset($_POST['show_detail'])){
                $query="select * from students where email='$_SESSION[email]'";
                $query_run=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($query_run)){
                    ?>
                    <table>
                        <tr>
                            <td><b>Roll No:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['roll_no']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Name:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['name']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Father's Name:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['father_name']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Class:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['class']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Mobile No:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['mobile']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Email Address:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['email']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Password:</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['password']; ?>" disabled>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            }
            ?>
            <?php
                if(isset($_POST['edit_detail'])){
                    $query="select * from students where email='$_SESSION[email]'";
                    $query_run=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($query_run)){
                        ?>
                        <form action="edit_student.php" method="post">
                        <table>
                        <tr>
                            <td><b>Roll No:</b></td>
                            <td>
                                <input type="text" name="roll_no" value="<?php echo $row['roll_no']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Name:</b></td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Father's Name:</b></td>
                            <td>
                                <input type="text" name="father_name" value="<?php echo $row['father_name']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Class:</b></td>
                            <td>
                                <input type="text" name="class" value="<?php echo $row['class']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Mobile No:</b></td>
                            <td>
                                <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Email Address:</b></td>
                            <td>
                                <input type="text" name="email" value="<?php echo $row['email']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Password:</b></td>
                            <td>
                                <input type="text" name="password" value="<?php echo $row['password']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="save" value="Save">
                            </td>
                        </tr>
                    </table>
                        </form>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
