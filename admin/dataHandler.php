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
                }else{
                    header('Location: authorDashboard');
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

        elseif(strcmp($intent, 'newPublication')==0){

            $bookid = md5(date('dmYHisu'));

            $author = $_POST['author'];
            $name = $_POST['name'];
            $about = $_POST['about'];
            $genre = $_POST['genre'];
            $price = $_POST['price'];
            $rating = $_POST['rating'];

            $target_dir1 = "bookImages/";
            $target_file1 = $target_dir1.basename($_FILES["image"]["name"]);
            $fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
            $newfilename1 = md5(date('dmYHisu'));
            $target_file1 = $target_dir1.$newfilename1.".".$fileType1;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file1);

            $target_dir2 = "bookPDF/";
            $target_file2 = $target_dir2.basename($_FILES["bookPDF"]["name"]);
            $fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
            $newfilename2 = md5(date('dmYHisu'));
            $target_file2 = $target_dir2.$newfilename2.".".$fileType2;
            move_uploaded_file($_FILES["bookPDF"]["tmp_name"], $target_file2);

            $query = "INSERT INTO books (bookid, bookAuthor, bookName, bookAbout, bookGenre, bookPrice, bookRating, bookImage, bookLocation) VALUES ('$bookid', '$author', '$name', '$about', '$genre', '$price', '$rating', '$target_file1', '$target_file2')";
            $result = $conn->query($query);
            if($result===TRUE){
                echo "<script>window.location.href='authorDashboard'</script>";
            }else{
                echo "<script>window.location.href='authorDashboard?error=newPublicationFailed'</script>";
            }
        }
    }
?>