<?php
    include('config.php');
    include('const/check.php');
    include('functions.php');
    if(isset($_GET['_id'])){
        $userid = $profile['userid'];
        $query = "UPDATE users SET used=used+1 WHERE userid='$userid'";
        $result = $conn->query($query);
        if($result===TRUE){
            $success = 1;
        }else{
            $success = 0;
        }
    }else{
        echo "<script>window.location.href='browse?error=purchaseFailed'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <?php include('const/stylesheet.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="error-page">
                <h2 class="headline text-success mr-5">Success</h2>

                <h3><i class="fas fa-check-double text-success"></i> Yay! Your payment was successful.</h3>

                <button type="button" class="btn btn-block btn-success" onclick="window.location.href='dashboard'">Go back to reading</button>
                
            </div>
            <!-- /.error-page -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('const/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php include('const/js.php'); ?>
    
</body>

</html>