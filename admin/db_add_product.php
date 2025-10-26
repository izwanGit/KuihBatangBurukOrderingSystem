<?php
include('../include/dbconn.php');

$i = 0;

foreach ($_POST as $sForm => $value) {
    $postedValue = htmlspecialchars(stripslashes($value), ENT_QUOTES);
    $valuearr[$i] = $postedValue;
    $i++;
}

echo $valuearr[0] .' '. $valuearr[1] .' '. $valuearr[2] .' '. $valuearr[3].' '. $valuearr[4].' '. $valuearr[5];
$addrecord = "INSERT INTO PRODUCT (PRO_CODE, PRO_NAME, PRO_FLAVOR, PRO_STATUS, PRO_NET_WEIGHT, PRO_PRICE)
              VALUES('$valuearr[2]', '$valuearr[0]', '$valuearr[1]', '$valuearr[3]', '$valuearr[4]','$valuearr[5]')";

$result = mysqli_query($dbconn, $addrecord) or die("Error: " . mysqli_error($dbconn));

if ($result) {
    ?>
    <script type="text/javascript">
        window.location = "update_view_product.php";
    </script>
    <?php
}else{
    echo 'error weh';
}
?>

