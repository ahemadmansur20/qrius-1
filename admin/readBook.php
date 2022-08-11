<?php
    include('config.php');
    include('const/check.php');

    if(isset($_GET['link'])){
        $link = $_GET['link'];
        $currDate = date('Y-m-d');
        $query = "SELECT * from purchaseHistory WHERE link='$link' AND toDate>='$currDate'";
        $result = $conn->query($query);
        if($result->num_rows==0){
            echo "<script>window.location.href='../login'</script>";
        }else{
            $row = $result->fetch_assoc();
            $userid = $row['userid'];
            if($userid == $profile['userid']){
                $bookid = $row['bookid'];
                $query = "SELECT * FROM books WHERE bookid='$bookid'";
                $result = $conn->query($query);
                if($result->num_rows == 0){
                    echo "<script>window.location.href='dashboard'</script>";
                }else{
                    $row = $result->fetch_assoc();
                    $bookLocation = $row['bookLocation'];
                    ?>
                    <div id="adobe-dc-view"></div>
                    <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
                    <script type="text/javascript">
                            document.addEventListener("adobe_dc_view_sdk.ready", function(){ 
                                    var adobeDCView = new AdobeDC.View({clientId: "08f1f1c2eb134ea58be6e77470601692", divId: "adobe-dc-view"});
                                    adobeDCView.previewFile({
                                            content:{location: {url: "../<?php echo $bookLocation; ?>"}},
                                            metaData:{fileName: "<?php echo $row['bookName']; ?>"}
                                    }, {});
                            });
                    </script>
                    <?php
                }
            }else{
                echo "<script>window.location.href='../login'</script>";
            }
        }
    }else{
        echo "<script>window.location.href='../login'</script>";
    }
?>