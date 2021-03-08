<?php
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "nrgmvps";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$query = $db->query("SELECT * FROM submissions");
$sub_number=mysqli_num_rows($query);

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'photos/'.$row["profile_photo"];
        $mediaURL = 'media/'.$row["media"];
       
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NRG MVPS</title>
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <!-- Tables style-->
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">NRG MVPS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                   
                    <span>Dashboard</span></a>
            </li>   
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Messages -->
                        <img class="img-profile "
                                    src="assets/img/favicon.ico">
                        <div class="topbar-divider d-none d-sm-block"></div>
                         <!-- Nav Item - User Information -->
                                <img class="img-profile "
                                    src="assets/img/favicon2.ico">
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Number of Submissions</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $sub_number ?> </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">


                    </div>
                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Current Submissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Link</th>
                                            <th>Media</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Link</th>
                                            <th>Media</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 

                                        $query = $db->query("SELECT * FROM submissions");

                                        if($query->num_rows > 0){
                                            while($row = $query->fetch_assoc()) {
                                                $imageURL = 'photos/'.$row["profile_photo"];
                                                $mediaURL = 'media/'.$row["media"];
                                                
                                        ?>
                                        <tr>
                                            <td><img class="rounded-circle" src="<?php echo $imageURL; ?>" alt="" width="100" height="100"/></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            
                                            <td><?php echo $row['link']; ?></td>
                                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">View</button> </td>
                                        </tr>
                                    <div id="ModalLoginForm" class="modal fade">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                    </div>
                                                        <div class="modal-body">
                                                                <video width="400" height="240" controls>
                                                                <source src="<?php echo $mediaURL; ?>" type="video/mp4">
                                                              
                                                                Your browser does not support the video tag.
                                                                </video>
                                                       
                                                        </div>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                     </div><!-- /.modal -->

                                        <?php  }
             
                                             }
                                                ?>
                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>