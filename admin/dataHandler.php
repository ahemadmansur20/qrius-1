<?php
    include('config.php');
    

    if(isset($_POST['intent'])){
        $intent = $_POST['intent'];

        // login
        if(strcmp($intent, '_login')==0){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $type = $_POST['type'];

            $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND type='$type'";
            $result = $conn->query($query);

            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                if($type==1){
                    header('Location: dashboard');
                }
            }else{
                echo "<script>window.location.href='login?error=incorrectCredentials'</script>";
            }
        }

        elseif(strcmp($intent, '_check')==0){
            $text = $_POST['text'];
            $query = "SELECT * FROM users WHERE username='$text'";
            $result = $conn->query($query);
            if($result->num_rows==1){
                echo 'no';
            }else{
                echo 'yes';
            }
        }

        elseif(strcmp($intent, '_register')==0){
            var_dump($_POST);
            $username = $_POST['username'];
            $userid = $_POST['username'];
            $password = md5($_POST['password']);
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];

            $fromDate = date('Y-m-d');
            $toDate = date('Y-m-d', strtotime($fromDate. ' + 30 days'));
            $query = "INSERT INTO users (username, userid, password, firstName, lastName, planStart, planEnd) VALUES ('$username', '$userid', '$password', '$firstName', '$lastName', '$fromDate', '$toDate')";
            $result = $conn->query($query);

            if($result===TRUE){
                echo "<script>window.location.href='login'</script>";
            }else{
                echo "<script>window.location.href='register?error=registerFailed'</script>";
            }
        }
    }
?>