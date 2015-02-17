<?php /*Created by saqib 18-08-2009*/?>
<html>
	<head>
		<title>Knet Merchant Demo</title>
		<meta http-equiv="pragma" content="no-cache">
        <link href="st.css" rel="stylesheet" type="text/css" />
</head>

<body >
<table width="100%" cellspacing="1" cellpadding="1">
   <tr>
    <td align="center" >
	<table width="70%" border="0" > 
		<tr><td align=center class="heading">
			<img src=knet.gif>
		</td>
		<td align="left" width="70%" class="heading"><strong>Knet Merchant Demo Shopping Center  -php</strong>
		<!-- This example displays the content of several ServerVariables. -->  

		</td>
		</tr>
	</table>
	</td>
  </tr>
  <tr>
    <td align="center" class="msg">
  <?php

$PaymentID = $_GET['PaymentID']; // Reads the value of the Payment ID passed by GET request by the user.
$result = $_GET['Result']; // Reads the value of the Result passed by GET request by the user.
$postdate = $_GET['PostDate']; // Reads the value of the PostDate passed by GET request by the user.
$tranid = $_GET['TranID']; // Reads the value of the TranID passed by GET request by the user.
$auth = $_GET['Auth']; // Reads the value of the Auth passed by GET request by the user.
$ref = $_GET['Ref']; // Reads the value of the Ref passed by GET request by the user.
$trackid = $_GET['TrackID'];  // Reads the value of the TrackID passed by GET request by the user.
$udf1 = $_GET['UDF1'];  // Reads the value of the UDF1 passed by GET request by the user.
$udf2 = $_GET['UDF2'];  // Reads the value of the UDF1 passed by GET request by the user.
$udf3 = $_GET['UDF3'];  // Reads the value of the UDF1 passed by GET request by the user.
$udf4 = $_GET['UDF4'];  // Reads the value of the UDF1 passed by GET request by the user.
$udf5 = $_GET['UDF5'];  // Reads the value of the UDF1 passed by GET request by the user.


If ($PaymentID == ""){
	header("location:error.php");
}else{
?>
     
        Transaction Completed Successfully<br>
          Thank You For Your Order 
    <?php } ?>
	</td>
  </tr>
  <tr>
    <td align="center">
<table width=70% border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" col="2">
  <tr>
    <td colspan="2" align="center" class="msg"><strong class="text">Transaction Details 
(from Merchant Notification Message)</strong></td>
    </tr>
  <tr>
    <td width=26% class="tdfixed">Payment ID :</td>
    <td width=74% class="tdwhite"><?php echo $PaymentID; ?></td>
  </tr>
  <tr>
    <td class="tdfixed">Post Date :</td>
    <td class="tdwhite"><?php echo $postdate;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Result Code :</td>
    <td class="tdwhite"><?php echo $result;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Transaction ID :</td>
    <td class="tdwhite"><?php echo $tranid;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Auth :</td>
    <td class="tdwhite"><?php echo $auth;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Track ID :</td>
    <td class="tdwhite"><?php echo $trackid;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Ref No :</td>
    <td class="tdwhite"><?php echo $ref;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF1 :</td>
    <td class="tdwhite"><?php echo $udf1;?> </td>
  </tr>
  <tr>
    <td class="tdfixed">UDF2 :</td>
    <td class="tdwhite"><?php echo $udf2;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF3 :</td>
    <td class="tdwhite"><?php echo $udf3;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF4 :</td>
    <td class="tdwhite"><?php echo $udf4;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF5 :</td>
    <td class="tdwhite"><?php echo $udf5;?></td>
  </tr>
  <tr>
    <td class="tdfixed">&nbsp; </td>
    <td class="tdwhite">

	</td>
  </tr>
</table></td>
  </tr>
</table>

<center>
</center>
		</body>
</html>

