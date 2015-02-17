<?php
/*Created by saqib  18-08-2009*/
$PaymentID = $_POST['paymentid'];
$presult = $_POST['result'];
$postdate = $_POST['postdate'];
$tranid = $_POST['tranid'];
$auth = $_POST['auth'];
$ref = $_POST['ref'];
$trackid = $_POST['trackid'];
$udf1 = $_POST['udf1'];
$udf2 = $_POST['udf2'];
$udf3 = $_POST['udf3'];
$udf4 = $_POST['udf4'];
$udf5 = $_POST['udf5'];


if ( $presult == "CAPTURED" )
{
    $result_url = "https://www.knetpaytest.com.kw/php/result.php";
	
   $result_params = "?PaymentID=" . $PaymentID . "&Result=" . $presult . "&PostDate=" . $postdate . "&TranID=" . $tranid . "&Auth=" . $auth . "&Ref=" . $ref . "&TrackID=" . $trackid . "&UDF1=" . $udf1 . "&UDF2=" .$udf2  . "&UDF3=" . $udf3  . "&UDF4=" . $udf4 . "&UDF5=" . $udf5  ;
    /* $SQL1 = "UPDATE `knet_invoice` SET paid=1 WHERE paymentid='".$paymentid."'";
    if ( !mysql_query( $SQL1 ) )
    {
        exit( "Fatal Error: ".mysql_error( ) );
    }
    include( "tpl/email.php" );
    if ( trim( $client_email ) != "" )
    {
        mail( "", EMAIL_SUBJECT, $_email_msg, $_email_headers );
    }
    $_email_headers = "From: ".EMAIL_FROM." <".EMAIL_EMAIL.">\nX-Mailer: PHP/".phpversion( )."\nMIME-Version: 1.0\nContent-type: text/html; charset=utf-8\n";
    mail( KNET_ADME, EMAIL_SUBJECT, $_email_msg, $_email_headers );
	*/
}
else
{
    $result_url = "https://www.knetpaytest.com.kw/php/error.php";
    $result_params = "?PaymentID=" . $PaymentID . "&Result=" . $presult . "&PostDate=" . $postdate . "&TranID=" . $tranid . "&Auth=" . $auth . "&Ref=" . $ref . "&TrackID=" . $trackid . "&UDF1=" . $udf1 . "&UDF2=" .$udf2  . "&UDF3=" . $udf3  . "&UDF4=" . $udf4 . "&UDF5=" . $udf5  ;

}
echo "REDIRECT=".$result_url.$result_params;
?>


