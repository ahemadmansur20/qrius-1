<?php
    include('config.php');
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <?php include('const/stylesheet.php'); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="login" class="h1"><b><?php echo $brandName; ?></b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register yourself today, and enjoy our ever growing collection !</p>

                <form action="dataHandler" method="POST">
                    <input type="hidden" name="intent" value="_register">
                    <div class="input-group mb-3">
                        <input type="textl" class="form-control" placeholder="First Name" name="fname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="textl" class="form-control" placeholder="Last Name" name="lname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="textl" class="form-control" placeholder="Username" name="username" id="username" onkeyup="check()" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-cog"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" id="submitBtn">Register as New Reader</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-outline-primary btn-block" onclick="window.location.href='login'">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <?php include('const/js.php'); ?>

    <?php
        if(isset($_GET['error'])){
            if(strcmp($_GET['error'], 'registerFailed')==0){
                echo "<script>toastr.error('Registration failed');</script>";
            }
        }
    ?>

    <script>
        function check(){
            var text = document.getElementById("username").value;
            $.ajax({
                url: 'dataHandler',
                type: 'POST',
                data: {
                    intent: '_check',
                    text: text
                },
                success: function(response){
                    if(response=='yes'){
                        document.getElementById("username").className = "form-control is-valid";
                    }else{
                        document.getElementById("username").className = "form-control is-invalid";
                    }
                }
            });
        }
    </script>
</body>

</html>
