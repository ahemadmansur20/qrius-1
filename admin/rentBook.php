<?php
    include('config.php');
    include('const/check.php');
    require_once "razorpay-php/Razorpay.php";
    use Razorpay\Api\Api;

    if(isset($_GET['bookid'])){
        $bookid = $_GET['bookid'];
        //find book
        $query = "SELECT * from books WHERE bookid='$bookid'";
        $result = $conn->query($query);
        if($result->num_rows==0){
            echo "<script>window.location.href='browse'</script>";    
        }else{
            $book = $result->fetch_assoc();
            if($profile['used']<$profile['limit']){
                $rentAmount = 0;
            }else{
                if($profile['plan']==1){
                    $rentAmount = $book['bookPrice']*0.1;
                }elseif($profile['plan']==2){
                    $rentAmount = $book['bookPrice']*0.07;
                }else{
                    $rentAmount = $book['bookPrice']*0.05;
                }
            }
                
            $purchaseid = md5(date('dmYHisu'));
            $userid = $profile['userid'];
            $bookid = $bookid;
            $authorid = $book['bookAuthor'];
            $fromDate = date('Y-m-d');
            $toDate = date('Y-m-d', strtotime($fromDate. ' + 30 days'));
            $amount = $rentAmount;

            $str = "123456789ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz";
            $link = substr(str_shuffle($str), 0, 8);

            $query = "INSERT INTO purchaseHistory (purchaseid, userid, bookid, fromDate, toDate, amount, link, author) VALUES ('$purchaseid', '$userid', '$bookid', '$fromDate', '$toDate', '$amount', '$link', '$authorid')";
            $result = $conn->query($query);

            if($rentAmount == 0){  
                if($result===TRUE){
                    $query = "UPDATE users SET used=used+1 WHERE userid='$userid'";
                    $result = $conn->query($query);
                    if($result===TRUE){
                        echo "<script>window.location.href='dashboard'</script>";
                    }else{
                        echo "<script>window.location.href='browse?error=purchaseFailed'</script>";
                    }
                }else{
                    echo "<script>window.location.href='browse?error=purchaseFailed'</script>";
                }
            }else{
                $keyId = 'rzp_test_glb0eHe2kxKrs9';
                $secretKey  = 'm196sYWH1jbYSsXXA38iL5qI';
                $api = new Api($keyId, $secretKey);
                $order = $api->order->create(array(
                    'receipt' => 'OID'.$purchaseid,
                    'amount' => $amount*100,
                    'payment_capture' => 1,
                    'currency' => 'INR',
                )
                );
                ?>
                <meta name="viewport" content="width=device-width">  
                <form action="rentSuccess?_id=<?php echo $purchaseid; ?>" method="post" display="none">
                        <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="<?php echo $keyId ?>"
                        data-amount="<?php echo $order->amount ?>"
                        data-currency="INR"
                        data-order_id="<?php echo $order->id ?>"
                        data-buttontext="Pay"
                        data-description="Book Rental"
                        data-image="https://silicon.ac.in/wp-content/themes/sit/assets/img/sit-logo.svg"
                        data-prefill.name="<?php echo $profile['firstName']." ".$profile['lastName']?>"
                        data-prefill.email=""
                        data-prefill.contact=""
                        data-theme.color=""
                    >
                    </script>
                    <input type="hidden" custom="Hidden Element" name="hidden">
                    <script type="text/javascript">
                        document.getElementsByClassName("razorpay-payment-button")[0].style.visibility = 'hidden';
                        document.getElementsByClassName("razorpay-payment-button")[0].click();
                    </script>
                </form>
                <?php
            }
        }
    }else{
        echo "<script>window.location.href='browse'</script>";
    }
?>