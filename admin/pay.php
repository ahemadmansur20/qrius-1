<?php
    include('config.php');
    include('const/check.php');
    require_once "razorpay-php/Razorpay.php";

    use Razorpay\Api\Api;

    $keyId = 'rzp_test_glb0eHe2kxKrs9';
    $secretKey  = 'm196sYWH1jbYSsXXA38iL5qI';
    $api = new Api($keyId, $secretKey);

    $planid = md5(date('dmYHisu'));
    $userid = $profile['userid'];
    $fromPlan = $profile['plan'];
    $toPlan = $_GET['plan'];

    if($toPlan == 1){
        $amount = 0;
        echo "<script>window.location.href='success?_id=".$planid."'</script>";
    }elseif($toPlan == 2){
        $amount = 100;
    }elseif($toPlan == 3){
        $amount = 250;
    }

    $query = "INSERT INTO planPurchase(planid, userid, fromPlan, toPlan) VALUES ('$planid', '$userid', '$fromPlan', '$toPlan')";
    $result = $conn->query($query);
    if($result === TRUE){
        $order = $api->order->create(array(
            'receipt' => 'OID'.$planid,
            'amount' => $amount*100,
            'payment_capture' => 1,
            'currency' => 'INR',
        )
        );
?>
<meta name="viewport" content="width=device-width">  
<form action="success?_id=<?php echo $planid; ?>" method="post" display="none">
        <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $keyId ?>"
        data-amount="<?php echo $order->amount ?>"
        data-currency="INR"
        data-order_id="<?php echo $order->id ?>"
        data-buttontext="Pay"
        data-description="Plan Purchase"
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
    }else{
        echo "<script>window.location.href='switchPlan'</script>";
    }
?>