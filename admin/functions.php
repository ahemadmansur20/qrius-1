<?php
    function getActivePurchaseCount($userid){
        include('config.php');
        $currDate = date('Y-m-d');
        $query = "SELECT * FROM purchaseHistory WHERE userid='$userid' AND toDate>='$currDate'";
        $result = $conn->query($query);
        return $result->num_rows;
    }
?>