<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
ob_start();
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
                            <li><a href="usersettings.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a   href="addtable.php"><i class="fa fa-plus-circle"></i>Add Table</a>
                        </li>
                        <li>
                            <a  class="active-menu" href="tabledel.php"><i class="fa fa-pencil-square-o"></i> Delete Table</a>
                        </li>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                DELETE Table <small></small>
                            </h1>
                        </div>
                    </div> 


                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Delete Table
                                </div>
                                <div class="panel-body">
                                    <form name="form" method="post">
                                        <div class="form-group">
                                            <label>Select the Table ID *</label>
                                            <select name="id"  class="form-control" required>
                                                <option value selected ></option>
                                                <?php
                                                require 'credentials.php';
                                                
                                                $con=mysqli_connect($host,$user,$password,$database);
                                                if($con){
                                                   /* echo "Success";*/
                                                }else{
                                                    die(mysqli_error($con));
                                                }

                                                $query = "SELECT * from alltables";
                                                $res=mysqli_query($con,$query);
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $value = $row["id"];
                                                    echo '<option value="'. $value . '">' . $value . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>


                                        <input type="submit" name="del" value="Delete Table" class="btn btn-primary"> 
                                    </form>
<?php

require 'credentials.php';
                                                
$con=mysqli_connect($host,$user,$password,$database);
if($con){
 /* echo "Success";*/
}else{
    die(mysqli_error($con));
}

if (isset($_POST["del"])) {
    $del = $_POST["id"];


    $query = "DELETE FROM alltables WHERE id = '$del'";
    if (mysqli_query($con,$query)) {
        echo '<script type="text/javascript">alert("Table Deleted") </script>';

        echo '<meta http-equiv="refresh" content="1; URL=tabledel.php" />';
    } else {
        echo '<script>alert("Something might be wrong") </script>';
    }
}
?>
                                </div>

                            </div>
                        </div>

                        <div class="row">


                        <?php
                        require 'Controller/Controller.php';
                        
                        $controller = new Controller();
                        $controller->AvailableTables();
                        ?>
                        </div>
                            <?php
                            ob_end_flush();
                            ?>
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


