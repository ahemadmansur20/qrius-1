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
                            <h1 class="m-0">Account Details -</h1>
                        </div><!-- /.col -->
                        <?php
                            $currDate = date('Y-m-d');
                            if($profile['planEnd'] < $currDate){
                                ?>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="switchPlan" style="color:red;">Your plan has expired !</a></li>
                                    </ol>
                                </div>
                                <?php
                            }
                        ?>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            if($profile['plan']==1){
                                                echo "Starter";
                                            }elseif($profile['plan']==2){
                                                echo "Basic";
                                            }else{
                                                echo "Premium";
                                            }
                                        ?>
                                    </h3>

                                    <p>Plan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-card"></i>
                                </div>
                                <a href="switchPlan" class="small-box-footer">
                                    Change Plan <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            echo $profile['used'].'/'.$profile['limit'];
                                        ?>
                                    </h3>

                                    <p>Free Books Usage</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-calculator"></i>
                                </div>
                                <a href="browse" class="small-box-footer">
                                    Read More Books <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            echo date('d-m-Y', strtotime($profile['planEnd']));
                                        ?>
                                    </h3>

                                    <p>Plan Validity</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-calendar"></i>
                                </div>
                                <a href="account" class="small-box-footer">
                                    View Details <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div><!-- /.container-fluid -->

            </section>
            <!-- /.content -->

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Your Purchased Content -</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                        $userid = $profile['userid'];
                        $currDate = date('Y-m-d');
                        $query = "SELECT * FROM purchaseHistory WHERE userid='$userid' AND toDate>='$currDate'";
                        $result = $conn->query($query);
                        if($result->num_rows == 0){
                            echo "<i>You donot have any active rental. Go ahead and make a new rental. <a href='browse'>Rent Now !</a></i>";
                        }else{
                            ?>
                            <div class="row">
                                <?php
                                    $query = "SELECT * from purchaseHistory WHERE userid='$userid' AND toDate>='$currDate'";
                                    $result = $conn->query($query);
                                    while($row = $result->fetch_assoc()){
                                        $bookid = $row['bookid'];
                                        $query = "SELECT * FROM books WHERE bookid='$bookid'";
                                        $result2 = $conn->query($query);
                                        $book = $result2->fetch_assoc();
                                        ?>
                                        <div class="col-lg-4 col-sm-12 col-md-6 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-header text-muted border-bottom-0">
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="lead"><b><?php echo $book['bookName']; ?></b></h2>
                                                            <p class="text-muted text-sm"><b>About: </b> <?php echo substr($book['bookAbout'], 0, 80)."..."; ?> </p>
                                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-star"></i></span> <?php echo $book['bookRating']."/5"; ?></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-5 text-center">
                                                            <img src="<?php echo $book['bookImage']; ?>" alt="user-avatar" class="img-circle img-fluid" style="width: 128px; height: 128px; object-fit: cover; border-radius: 50%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-right">
                                                        <a href="javascript:redirect('<?php echo $row['link']; ?>')" class="btn btn-sm btn-primary" onclick>
                                                            <i class="fas fa-location-arrow"></i>&nbsp;&nbsp;Read Now 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </div><!-- /.container-fluid -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('const/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php include('const/js.php'); ?>

    <script>
        var element = document.getElementById("sideDashboard");
        element.classList.add("active");
    </script>

    <script>
        function redirect(link){
            window.open(`readBook/${link}`, '_blank');
        }
    </script>
    
</body>

</html>