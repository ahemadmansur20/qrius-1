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

    <style>
        .is-hidden { display: none; }
    </style>
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
                            <h1 class="m-0">Browse our huge catalog of books</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" placeholder="Search with bookname, genre name or any keyword" onkeyup="liveSearch()" id="searchbox">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                            $query = "SELECT * from books";
                            $result = $conn->query($query);
                            while($row = $result->fetch_assoc()){
                                ?>
                                <div class="col-lg-4 col-sm-12 col-md-6 d-flex align-items-stretch flex-column customBookCard">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            <strong><i><?php echo $row['bookGenre']; ?></i></strong>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b><?php echo $row['bookName']; ?></b></h2>
                                                    <p class="text-muted text-sm"><b>About: </b> <?php echo substr($row['bookAbout'], 0, 80)."..."; ?> </p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-star"></i></span> <?php echo $row['bookRating']."/5"; ?></li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="<?php echo $row['bookImage']; ?>" alt="user-avatar" class="img-circle img-fluid" style="width: 128px; height: 128px; object-fit: cover; border-radius: 50%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <?php
                                                    if($profile['used']<$profile['limit']){
                                                        $rentAmount = 0;
                                                    }else{
                                                        if($profile['plan']==1){
                                                            $rentAmount = $row['bookPrice']*0.1;
                                                        }elseif($profile['plan']==2){
                                                            $rentAmount = $row['bookPrice']*0.07;
                                                        }else{
                                                            $rentAmount = $row['bookPrice']*0.05;
                                                        }
                                                    }
                                                ?>
                                                <a href="javascript:showDetails('<?php echo $row['bookid']; ?>')" class="btn btn-sm bg-teal">
                                                    <i class="fas fa-info"></i>&nbsp;&nbsp;Read More
                                                </a>
                                                <a href="javascript:rent(<?php echo $row['bookid']; ?>)" class="btn btn-sm btn-primary" onclick>
                                                    <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;Rent for 
                                                    <?php
                                                        if($rentAmount==0){
                                                            echo "Free";
                                                        }else{
                                                            echo "₹".$rentAmount;
                                                        }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div><!-- /.container-fluid -->

                <div class="modal fade" id="modalViewDetails">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content viewDesc">
                            
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
        var element = document.getElementById("sideBrowse");
        element.classList.add("active");
    </script>

    <script>
        function rent(bookid){
            window.location.href=`rentBook?bookid=${bookid}`;
        }
    </script>

    <script>
        function showDetails(bookid){
            $.ajax({
                url: 'viewDetBook.php',
                type: 'post',
                data: {bookid: bookid},
                success: function(response) {
                    // Add response in Modal body
                    $('.viewDesc').html(response);

                    // Display Modal
                    $('#modalViewDetails').modal('show');
                }
            });
        }
    </script>

    <script>
        function liveSearch(){
            let cards = document.querySelectorAll('.customBookCard');
            let search = document.getElementById('searchbox').value;
            for(let i=0; i<cards.length; i++){
                if(cards[i].innerText.toLowerCase()
                    // ...and the text matches the search query...
                    .includes(search.toLowerCase())) {
                    // ...remove the `.is-hidden` class.
                    cards[i].classList.remove("d-none");
                    cards[i].classList.add("d-flex");
                } else {
                    // Otherwise, add the class.
                    cards[i].classList.add("d-none");
                    cards[i].classList.remove("d-flex");
                }
            }
        }
    </script>
    
</body>

</html>