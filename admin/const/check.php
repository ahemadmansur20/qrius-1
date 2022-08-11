<?php
    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['id'])){
        echo "<script>
        window.location.href= 'login';
        </script>";
    }else{
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $chquery = "SELECT * FROM users WHERE username='$username' AND id='$id'";
        $chresult = $conn->query($chquery);
        if($chresult->num_rows != 1){
            echo "<script>window.location.href='login'</script>";
        }else{
            $profile = $chresult->fetch_assoc();
        }
    }
?>