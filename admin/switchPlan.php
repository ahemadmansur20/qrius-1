<?php
    include('config.php');
    include('const/check.php');
    include('functions.php');
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Switch Plans -</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="card <?php if($profile['plan']==1){ echo 'card-success'; }else{ echo 'card-primary'; } ?> <?php if($profile['plan']!=1){ echo 'card-outline'; } ?>">
                                <div class="card-header">
                                    <h3 class="card-title">Starter</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Feature</strong>

                                    <p class="text-muted">
                                    Lorem Ipsum Dolor Sit Amet
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-credit-card mr-1"></i> Validity</strong>

                                    <p class="text-muted">
                                    1 month
                                    </p>

                                    <a href="pay?plan=1" class="btn <?php if($profile['plan']==1){ echo 'btn-success btn-block disabled'; }else{ echo 'btn-primary btn-block'; } ?>"><b>Activate for Free</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card <?php if($profile['plan']==2){ echo 'card-success'; }else{ echo 'card-primary'; } ?> <?php if($profile['plan']!=2){ echo 'card-outline'; } ?>">
                                <div class="card-header">
                                    <h3 class="card-title">Basic</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Feature</strong>

                                    <p class="text-muted">
                                    Lorem Ipsum Dolor Sit Amet
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-credit-card mr-1"></i> Validity</strong>

                                    <p class="text-muted">
                                    1 month
                                    </p>

                                    <a href="pay?plan=2" class="btn <?php if($profile['plan']==2){ echo 'btn-success btn-block disabled'; }else{ echo 'btn-primary btn-block'; } ?>"><b>Activate for ₹100</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card <?php if($profile['plan']==3){ echo 'card-success'; }else{ echo 'card-primary'; } ?> <?php if($profile['plan']!=3){ echo 'card-outline'; } ?>">
                                <div class="card-header">
                                    <h3 class="card-title">Premium</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Feature</strong>

                                    <p class="text-muted">
                                    Lorem Ipsum Dolor Sit Amet
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-credit-card mr-1"></i> Validity</strong>

                                    <p class="text-muted">
                                    1 month
                                    </p>

                                    <a href="pay?plan=3" class="btn <?php if($profile['plan']==3){ echo 'btn-success btn-block disabled'; }else{ echo 'btn-primary btn-block'; } ?>"><b>Activate for ₹250</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

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