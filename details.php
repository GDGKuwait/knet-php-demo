<?php 
/*Created by saqib 18-08-2009*/
ob_start();
$product  = $_POST['product'];
$price = $_POST['price'];
$qty = $_POST['qty'];
 $total = $_POST['price'] * $_POST['qty'];
?>

<html>
<head>
<title>Knet Merchant Demo</title>
<meta http-equiv="pragma" content="no-cache">
<link href="st.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" cellpadding="1" cellspacing="1" class="text">
   <tr>
    <td align="center" >
	<table width="70%" border="0" > 
		<tr><td align=center class="heading">
			<img src=knet.gif>
		</td>
		<td align="left" width="70%" class="heading"><strong>Knet Merchant Demo Shopping Center  -php</strong></td>
		</tr>
	</table>
	</td>
  </tr>
  <tr>
    <td class="tdwhite">
    <table width="70%" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <th class="tdfixed">Product</th>
        <th class="tdfixed">Price/Day</th>
        <th class="tdfixed">Number of days</th>
        <th class="tdfixed">Total</th>
      </tr>
      <tr>
        <td class="tdwhite"><?php echo $product;?></td>
        <td class="tdwhite"><?php echo $price;?> KD</td>
        <td class="tdwhite"><?php echo $qty; ?> day(s)</td>
        <td class="tdwhite"><?php echo $total;?> KD</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="tdwhite">
	<form action="buy.php" method="post">
      <input type="hidden" name="product" value="<?php echo $product;?>">
      <input type="hidden" name="price" value="<?php echo $price;?>">
      <input type="hidden" name="qty" value="<?php echo $qty;?>">
      <input type="hidden" name="total" value="<?php echo $total;?>">
      <table width="70%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
          <td width="20%" class="tdfixed"><strong>Name:</strong></td>
          <td width="80%" class="tdwhite"><input type="text" name="name" length="30"></td>
        </tr>
        <tr>
          <td class="tdfixed"><strong>Address:</strong></td>
          <td class="tdwhite"><input type="text" name="address" length="30"></td>
        </tr>
        <tr>
          <td class="tdfixed"><strong>Postal Code:</strong></td>
          <td class="tdwhite"><input type="text" name="postal" length="30"></td>
        </tr>
        <tr>
          <td class="tdwhite"></td>
          <td class="tdwhite"><input type="submit" value="Buy"></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>
