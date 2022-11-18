<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>The Kitchen</title>
        <!-- Bootstrap Styles-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default top-navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">MAIN MENU </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="home.php"><i class="fa fa-table fa-fw"></i> Table Status</a>
                            </li>
                            <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>

                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </nav>
            <!--/. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                        <li>
                            <a  href="settings.php"><i class="fa fa-dashboard"></i>Table Status</a>
                        </li>
                        <li>
                            <a  class="active-menu" href="addtable.php"><i class="fa fa-plus-circle"></i>Add Table</a>
                        </li>
                        <li>
                            <a  href="tabledel.php"><i class="fa fa-desktop"></i> Delete Table</a>
                        </li>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                NEW Table <small></small>
                            </h1>
                        </div>
                    </div> 
                    <div class="row">

                        <div class="col-md-5 col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    ADD NEW Table
                                </div>
                                <div class="panel-body">
                                    <form name="form" method="post">
                                        <div class="form-group">
                                            <label>Type Of Table *</label>
                                            <select name="tbltyp"  class="form-control" required>
                                                <option value selected ></option>
                                                <option value="Table for 2">Table for 2</option>
                                                <option value="Table for 3">Table for 3</option>
                                                <option value="Table for 4">Table for 4</option>
                                                <option value="Table for 5">Table for 5</option>
                                                <option value="Table for 6">Table for 6</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Purpose</label>
                                            <select name="purpose" class="form-control" required>
                                                <option value selected ></option>
                                                <option value="meeting">Meeting</option>
                                                <option value="casual">Casual</option>
                                                <option value="celebration">Celebration</option>

                                            </select>

                                        </div>
                                        <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
                                    </form>
                                    <?php
                                    require 'credentials.php';
                                    

                                    $con=mysqli_connect($host,$user,$password,$database);
                                    if($con){
                                       /* echo "Success";*/
                                    }else{
                                        die(mysqli_error($con));
                                    }


                                    if (isset($_POST["add"])) {
                                        $typ = $_POST["tbltyp"];
                                        $purp = $_POST["purpose"];
                                        $status = "Available";

                                        $query = "SELECT * FROM alltables WHERE type = '$typ' AND purpose = '$purp'";
                                        $res = mysqli_query($con,$query);
                                        $data = mysqli_fetch_array($res, MYSQLI_NUM);
                                        if ($data[0] > 1) {
                                            echo "<script type='text/javascript'> alert('Table Already in Exists')</script>";
                                        } else {


                                            $queryins = "INSERT INTO alltables(type,purpose,status) VALUES ('$typ','$purp','$status')";
                                            if (mysqli_query($con,$queryins)) {
                                                echo '<script>alert("New Table Added") </script>';
                                                echo '<meta http-equiv="refresh" content="1; URL=addtable.php" />';
                                            } else {
                                                echo '<script>alert("Something might be wrong") </script>';
                                            }
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Tables INFORMATION
                                    </div>
                                    <div class="panel-body">
                                        <!-- Advanced Tables -->
                                        <div class="panel panel-default">

                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Tables ID</th>
                                                                <th>Tables Type</th>
                                                                <th>Purpose</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

<?php
require 'credentials.php';
$con=mysqli_connect($host,$user,$password,$database);
if($con){
    /* echo "Success";*/
}else{
    die(mysqli_error($con));
}
$query = "SELECT * FROM alltables limit 0,10";
$res = mysqli_query($con,$query) or die(mysql_error());
while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
    if ($id % 2 == 0) {
        echo "<tr class=odd gradeX>
													<td>" . $row["id"] . "</td>
													<td>" . $row["type"] . "</td>
												   <th>" . $row["purpose"] . "</th>
												</tr>";
    } else {
        echo"<tr class=even gradeC>
													<td>" . $row["id"] . "</td>
													<td>" . $row["type"] . "</td>
												   <th>" . $row["purpose"] . "</th>
												</tr>";
    }
}
?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                        <!--End Advanced Tables -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <!-- /. WRAPPER  -->
            <!-- JS Scripts-->
            <!-- jQuery Js -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- Bootstrap Js -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- Metis Menu Js -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- Custom Js -->
            <script src="assets/js/custom-scripts.js"></script>
    </body>
</html>