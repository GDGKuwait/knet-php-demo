<!--
This merchant demo is published by Knet as a demonstration of the process
of Online Knet Payment Gateway Transactions. Note however that this is not
a fully running demo and there are parts that the merchant has to build him self.
Also, this demo is not tested for security or stability, and Knet does not intend to recommend
this for production purposes. Merchants should build their own web pages based on their needs. 
This demo is just a guide as to what the whole process will look like.
/*Developed by saqib 18-08-2009*/
/*Updated by nikunjkotecha 04-12-2017*/
-->
<?php
ob_start();
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "com/aciworldwide/commerce/gateway/plugins/e24PaymentPipe.inc.php";
$pipe = new e24PaymentPipe();

$pipe->setAction(KNET_ACTION_PURCHASE);
$pipe->setCurrency(KNET_CURRENCY_KWD);
$pipe->setLanguage(KNET_LANGUAGE_EN);

// Set your respone page URL. This needs to be available on internet.
// If using HTTPS, it needs to be a valid SSL certificate communicated
// to K-Net.
$pipe->setResponseURL("https://www.knetpaytest.com.kw/php/response.php");

// Set your error page URL.
$pipe->setErrorURL("https://www.knetpaytest.com.kw/php/error.php");

//$pipe->setResourcePath("/Applications/MAMP/htdocs/php-toolkit/resource/");
$pipe->setResourcePath("D:\\php\\resource\\"); //change the path where your resource file is

// Set your alias name here.
$pipe->setAlias("alias");

// Set the amount for the transaction.
$pipe->setAmt("10");

// Random / unique - internal tracking id.
$pipe->setTrackId("3434");

//set User defined values. This will be returned back in response url.
$pipe->setUdf1("UDF 1");
$pipe->setUdf2("UDF 2");
$pipe->setUdf3("UDF 3");
$pipe->setUdf4("UDF 4");
$pipe->setUdf5("UDF 5");

try {
  $pipe->performPaymentInitialization();

  // Check again once if there is any error.
  if ($error = $pipe->getErrorMsg()) {
    throw new \RuntimeException($error);
  }

  // Store payment id somewhere in the system to validate later.
  $_SESSION['payment_id'] = $pipe->getPaymentId();

  header("location:" . $pipe->getRedirectUrl());
  exit;
}
catch (\Exception $e) {
  // Log message somewhere.
  error_log($e->getMessage());

  // For demo we print here only.
  echo "Result=" . $pipe->SUCCESS;
  echo "<br>" . $pipe->getErrorMsg();
  echo "<br>" . $pipe->getDebugMsg();
  //header("location: https://www.yourURL.com/error.php");
  exit;
}
