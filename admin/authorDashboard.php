<?php
    include('config.php');
    include('const/authorcheck.php');
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
            <ul class="navbar-nav ml-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewPublication"><i
                        class="fas fa-plus" style="margin-right: 10px;"></i>Add New Publication</button>
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
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $userid = $profile['userid'];
                                            $query = "SELECT * FROM books WHERE bookAuthor='$userid'";
                                            $result = $conn->query($query);
                                            echo $result->num_rows;
                                        ?>
                                    </h3>

                                    <p>Books Published</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-card"></i>
                                </div>
                                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalNewPublication">
                                    Publish More Books <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-sm-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            $sum = 0;
                                            $query = "SELECT * FROM purchaseHistory WHERE author='$userid'";
                                            $result = $conn->query($query);
                                            while($row = $result->fetch_assoc()){
                                                $sum = $sum + 0.45*$row['amount'];
                                            }
                                            echo "₹ ".$sum;
                                        ?>
                                    </h3>

                                    <p>Royalty Earned</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-calculator"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    View Details <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

            </section>
            <!-- /.content -->

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Your Published Content -</h1>
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
                        $query = "SELECT * from books WHERE bookAuthor='$userid'";
                        $result = $conn->query($query);
                        if($result->num_rows == 0){
                            echo "<i>You donot have any active publications. Go ahead and make a new publications.</i>";
                        }else{
                            ?>
                            <div class="row">
                                <?php
                                    $query = "SELECT * from books WHERE bookAuthor='$userid'";
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
                                                        <a href="javascript:deleteBook('<?php echo $book['bookid']; ?>')" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>&nbsp;&nbsp;Request Delete
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

                <div class="modal fade" id="modalNewPublication">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add New Publication</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="dataHandler" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="intent" value="newPublication">
                                <input type="hidden" name="author" value="<?php echo $profile['userid']; ?>">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="Name of the book" name="name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>About</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter some description (max 2000 characters)" name="about"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Genre</label>
                                            <input type="text" class="form-control" placeholder="Genre of the book" name="genre"
                                                required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Rating (out of 5)</label>
                                                    <input type="text" class="form-control" placeholder="Rating of the book" name="rating"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="text" class="form-control" placeholder="Price of the book" name="price"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Book Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*"
                                                        name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Book PDF</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile1" accept="application/pdf"
                                                        name="bookPDF">
                                                    <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Publication</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

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
        function deleteBook(id){
            window.alert(`Book Delete Request has been sent to the Admin.`);
        }
    </script>

</body>

</html>