<?php

define('KNET_LANGUAGE_EN', 'ENG');
define('KNET_LANGUAGE_AR', 'ARA');

define('KNET_CURRENCY_KWD', 414);

define('KNET_ACTION_PURCHASE', 1);

/**
 * Class e24PaymentPipe.
 */
class e24PaymentPipe {
  protected $id = NULL;
  protected $webAddress = NULL;
  protected $port = NULL;
  protected $password = NULL;
  protected $passwordHash = NULL;
  protected $context = NULL;

  protected $responseUrl = '';
  protected $errorURL = '';
  protected $action = KNET_ACTION_PURCHASE;
  protected $resourcePath = '';
  protected $alias = '';
  protected $currency = KNET_CURRENCY_KWD;
  protected $language = KNET_LANGUAGE_AR;
  protected $amt = NULL;

  protected $trackId = NULL;
  protected $udf1 = '';
  protected $udf2 = '';
  protected $udf3 = '';
  protected $udf4 = '';
  protected $udf5 = '';

  protected $transId = NULL;
  protected $paymentId = NULL;
  protected $paymentPage = '';
  protected $result = 0;
  protected $auth = '';
  protected $ref = '';
  protected $avr = '';
  protected $date = '';

  protected $error = '';
  protected $rawResponse = '';
  protected $debugMsg = '';

  protected $arr = [];

  /**
   * Constructs a new KnetPayment object.
   */
  public function __construct() {
    // @TODO: Reduce  setter function calls and move code to construct.
    // For instance alias, URLs, etc. can be set here, which are required.
  }

  /**
   * Function to set amount.
   *
   * @param string $s
   *   Amount.
   */
  public function setAmt($s) {
    $this->amt = $s;
  }

  /**
   * Function to set currency.
   *
   * @param int $s
   *   Currency code.
   */
  public function setCurrency($s) {
    $this->currency = $s;
  }

  /**
   * Function to set language.
   *
   * @param string $s
   *   Language code.
   */
  public function setLanguage($s) {
    $this->language = $s;
  }

  /**
   * Function to set response url.
   *
   * @param string $s
   *   Response URL.
   */
  public function setResponseUrl($s) {
    $this->responseUrl = $s;
  }

  /**
   * Function to set error url.
   *
   * @param string $s
   *   Error URL.
   */
  public function setErrorUrl($s) {
    $this->errorURL = $s;
  }

  /**
   * Function to set resource path.
   *
   * @param string $s
   *   Resource path.
   */
  public function setResourcePath($s) {
    $this->resourcePath = $s;
  }

  /**
   * Function to alias for xml.
   *
   * This is received as part of tooklit from K-Net.
   *
   * @param string $s
   *   Alias received from K-Net as string.
   */
  public function setAlias($s) {
    $this->alias = $s;
  }

  /**
   * Set tracking id.
   *
   * @param string $s
   *   Data.
   */
  public function setTrackId($s) {
    $this->trackId = $s;
  }

  /**
   * Set user defined data  - 1.
   *
   * @param string $s
   *   Data.
   */
  public function setUdf1($s) {
    $this->udf1 = $s;
  }

  /**
   * Set user defined data  - 2.
   *
   * @param string $s
   *   Data.
   */
  public function setUdf2($s) {
    $this->udf2 = $s;
  }

  /**
   * Set user defined data  - 3.
   *
   * @param string $s
   *   Data.
   */
  public function setUdf3($s) {
    $this->udf3 = $s;
  }

  /**
   * Set user defined data  - 4.
   *
   * @param string $s
   *   Data.
   */
  public function setUdf4($s) {
    $this->udf4 = $s;
  }

  /**
   * Set user defined data  - 5.
   *
   * @param string $s
   *   Data.
   */
  public function setUdf5($s) {
    $this->udf5 = $s;
  }

  /**
   * Function to get payment id.
   *
   * @return string
   *   Payment id.
   */
  public function getPaymentId() {
    return $this->paymentId;
  }

  /**
   * Function to get redirect url.
   *
   * @return string
   *   Redirect URL.
   */
  public function getRedirectUrl() {
    return ($this->paymentPage . '&PaymentID=' . $this->paymentId);
  }

  /**
   * Function to get error message.
   *
   * @return string
   *   Error message.
   */
  public function getErrorMsg() {
    return $this->error;
  }

  /**
   * Function to get raw response.
   *
   * @return string
   *   Raw response.
   */
  public function getRawResponse() {
    return $this->rawResponse;
  }

  /**
   * Function to get debug message.
   *
   * @return string
   *   Debug message.
   */
  public function getDebugMsg() {
    return $this->debugMsg;
  }

  /**
   * Helper function to do payment initialization.
   */
  public function performPaymentInitialization() {
    $stringbuffer = '';
    if (!$this->getSecureSettings()) {
      return -1;
    }
    if (strlen($this->id) > 0) {
      $stringbuffer .= ('id=' . $this->id . '&');
    }
    if (strlen($this->password) > 0) {
      $stringbuffer .= ('password=' . $this->password . '&');
    }
    if (strlen($this->passwordHash) > 0) {
      $stringbuffer .= ('passwordhash=' . $this->passwordHash . '&');
    }
    if (strlen($this->amt) > 0) {
      $stringbuffer .= ('amt=' . $this->amt . '&');
    }
    if (strlen($this->currency) > 0) {
      $stringbuffer .= ('currencycode=' . $this->currency . '&');
    }
    if (strlen($this->action) > 0) {
      $stringbuffer .= ('action=' . $this->action . '&');
    }
    if (strlen($this->language) > 0) {
      $stringbuffer .= ('langid=' . $this->language . '&');
    }
    if (strlen($this->responseUrl) > 0) {
      $stringbuffer .= ('responseUrl=' . $this->responseUrl . '&');
    }
    if (strlen($this->errorURL) > 0) {
      $stringbuffer .= ('errorURL=' . $this->errorURL . '&');
    }
    if (strlen($this->trackId) > 0) {
      $stringbuffer .= ('trackid=' . $this->trackId . '&');
    }
    if (strlen($this->udf1) > 0) {
      $stringbuffer .= ('udf1=' . $this->udf1 . '&');
    }
    if (strlen($this->udf2) > 0) {
      $stringbuffer .= ('udf2=' . $this->udf2 . '&');
    }
    if (strlen($this->udf3) > 0) {
      $stringbuffer .= ('udf3=' . $this->udf3 . '&');
    }
    if (strlen($this->udf4) > 0) {
      $stringbuffer .= ('udf4=' . $this->udf4 . '&');
    }
    if (strlen($this->udf5) > 0) {
      $stringbuffer .= ('udf5=' . $this->udf5 . '&');
    }
    $s = $this->sendMessage($stringbuffer, 'PaymentInitHTTPServlet');
    if ($s == NULL) {
      return -1;
    }
    $i = strpos($s, ':');
    if ($i === FALSE) {
      throw new \RuntimeException('Payment Initialization returned an invalid response: ' . $s);
    }
    else {
      $this->paymentId = substr($s, 0, $i);
      $this->paymentPage = substr($s, $i + 1);
      return TRUE;
    }
  }

  /**
   * Helper function to perform the transaction.
   */
  protected function performTransaction() {
    $stringbuffer = '';
    if (!$this->getSecureSettings()) {
      return -1;
    }
    if (strlen($this->id) > 0) {
      $stringbuffer .= ('id=' . $this->id . '&');
    }
    if (strlen($this->password) > 0) {
      $stringbuffer .= ('password=' . $this->password . '&');
    }
    if (strlen($this->passwordHash) > 0) {
      $stringbuffer .= ('passwordhash=' . $this->passwordHash . '&');
    }
    if (strlen($this->currency) > 0) {
      $stringbuffer .= ('currencycode=' . $this->currency . '&');
    }
    if (strlen($this->amt) > 0) {
      $stringbuffer .= ('amt=' . $this->amt . '&');
    }
    if (strlen($this->action) > 0) {
      $stringbuffer .= ('action=' . $this->action . '&');
    }
    if (strlen($this->paymentId) > 0) {
      $stringbuffer .= ('paymentid=' . $this->paymentId . '&');
    }
    if (strlen($this->transId) > 0) {
      $stringbuffer .= ('transid=' . $this->transId . '&');
    }
    if (strlen($this->trackId) > 0) {
      $stringbuffer .= ('trackid=' . $this->trackId . '&');
    }
    if (strlen($this->udf1) > 0) {
      $stringbuffer .= ('udf1=' . $this->udf1 . '&');
    }
    if (strlen($this->udf2) > 0) {
      $stringbuffer .= ('udf2=' . $this->udf2 . '&');
    }
    if (strlen($this->udf3) > 0) {
      $stringbuffer .= ('udf3=' . $this->udf3 . '&');
    }
    if (strlen($this->udf4) > 0) {
      $stringbuffer .= ('udf4=' . $this->udf4 . '&');
    }
    if (strlen($this->udf5) > 0) {
      $stringbuffer .= ('udf5=' . $this->udf5 . '&');
    }

    if (is_array($this->arr) && count($this->arr)) {
      foreach ($this->arr as $key => $var) {
        $stringbuffer .= ($key . '=' . $var . '&');
      }
    }
    $stringbuffer = substr($stringbuffer, 0, strlen($stringbuffer) - 1);
    echo $stringbuffer;
    $s = $this->sendMessage($stringbuffer, 'PaymentTranHTTPServlet');
    if ($s == NULL) {
      return -1;
    }

    $arraylist = $this->parseResults($s);
    if ($arraylist == NULL) {
      return -1;
    }
    else {
      $this->result = $arraylist[0];
      $this->auth = $arraylist[1];
      $this->ref = $arraylist[2];
      $this->avr = $arraylist[3];
      $this->date = $arraylist[4];
      $this->transId = $arraylist[5];
      $this->trackId = $arraylist[6];
      $this->udf1 = $arraylist[7];
      $this->udf2 = $arraylist[8];
      $this->udf3 = $arraylist[9];
      $this->udf4 = $arraylist[10];
      $this->udf5 = $arraylist[11];
      return 0;
    }
  }

  /**
   * Send message to K-Net server and get URL to redirect.
   *
   * @param string $s
   *   Data to send.
   * @param string $s1
   *   Function to call.
   *
   * @return mixed|null|string
   *   Message.
   */
  protected function sendMessage($s, $s1) {
    $stringbuffer = '';
    $error = '';
    $this->debugMsg .= ('<br>---------- ' . $s1 . ': ' . time() . ' ---------- <br>');
    if ($this->port == '443') {
      if (strlen($this->webAddress) <= 0) {
        $error = 'No URL specified.';
        return NULL;
      }
      if ($this->port == '443') {
        $stringbuffer .= ('https://');
      }
      else {
        $stringbuffer .= ('http://');
      }
      $stringbuffer .= ($this->webAddress);
      if (strlen($this->port) > 0) {
        $stringbuffer .= (':');
        $stringbuffer .= ($this->port);
      }
      if (strlen($this->context) > 0) {
        if (!$this->startsWith($this->context, '/')) {
          $stringbuffer .= ('/');
        }
        $stringbuffer .= ($this->context);
        if (!$this->endsWith($this->context, '/')) {
          $stringbuffer .= ('/');
        }
      }
      else {
        $stringbuffer .= ('/');
      }
      $stringbuffer .= ('servlet/');
      $stringbuffer .= ($s1);
      $this->debugMsg .= ('<br>About to create the URL to: ' . $stringbuffer);
      $url = $stringbuffer;

      $this->debugMsg .= ('<br>About to create http connection....');

      $this->debugMsg .= ('<br>Created connection.!!');
      if (strlen($s) > 0) {
        $c = curl_init();
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_setopt($c, CURLOPT_URL, $stringbuffer);
        curl_setopt($c, CURLOPT_POST, TRUE);
        curl_setopt($c, CURLOPT_POSTFIELDS, $s);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE);
        $this->debugMsg .= ('<br>about to write DataOutputSteam....');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, CURLOPT_RETURNTRANSFER);
        $this->debugMsg .= ('<br>after DataOutputStream.!!');
        $tmp = curl_exec($c);
        if (curl_error($c)) {
          echo 'CURL ERROR: ' . curl_errno($c) . '::' . curl_error($c);
        }
        elseif ($tmp) {

          curl_close($c);
          $this->rawResponse = $tmp;
          $this->debugMsg .= ('<br>Received RESPONSE: ' . $this->rawResponse);
          return $this->rawResponse;
        }
        else {
          $error = 'No Data To Post!';
        }
      }
      else {
        $this->clearFields();
        throw new \RuntimeException('Failed to make connection: ' . $error);
      }
    }
  }

  /**
   * Helper function to parse the results.
   */
  protected function parseResults($s) {

    $arraylist = [];

    if ($this->startsWith($s, '!ERROR!')) {
      $this->error = $s;
      return NULL;
    }

    $tokens = strtok($s, ":\r\n");

    $flag = FALSE;
    foreach ($tokens as $token) {
      $s2 = $token;
      if (!$s2 . $this->startsWith(':')) {
        $arraylist[] = ($s2);
        $flag = FALSE;
      }
      else {
        if ($flag) {
          $arraylist[] = ('');
        }
        $flag = TRUE;
      }
    }
    return $arraylist;
  }

  /**
   * Helper function to reset data.
   */
  public function clearFields() {
    $this->error = '';
    $this->paymentPage = '';
    $this->paymentId = '';
  }

  /**
   * Helper function to get secure settings from zip and set into members.
   */
  protected function getSecureSettings() {
    $s = '';

    // Try to read the contents of zip if already exists.
    try {
      $s = $this->readZip();
    }
    catch (\Exception $e) {
      // Zip file seems not available, try to create it and read again.
      if (!$this->createReadableZip()) {
        throw new \RuntimeException('Cannot create readable zip file.');
      }

      $s = $this->readZip();
    }

    if ($s == '') {
      throw new \RuntimeException('Cannot read data from zip file.');
    }

    return $this->parseSettings($s);
  }

  /**
   * Helper function to create readable zip.
   */
  protected function createReadableZip() {
    $filenameInput = $this->resourcePath . 'resource.cgn';
    $handleInput = fopen($filenameInput, 'r');
    $contentsInput = fread($handleInput, filesize($filenameInput));

    $filenameOutput = $this->resourcePath . 'resource.cgz';

    // Unlink the file if exists before re-creating it.
    @unlink($filenameOutput);

    $handleOutput = fopen($filenameOutput, 'w');

    $inByteArray = $this->getBytes($contentsInput);
    $outByteArray = $this->simplexor($inByteArray);

    fwrite($handleOutput, $this->getString($outByteArray));
    fclose($handleInput);
    fclose($handleOutput);

    return TRUE;
  }

  /**
   * Helper function to read data from zip.
   *
   * @return string
   *   Data from Zip.
   */
  protected function readZip() {
    $s = '';

    $filenameInput = $this->resourcePath . 'resource.cgz';

    $i = 0;

    $zip = new \ZipArchive();
    if ($zip->open($filenameInput) === TRUE) {
      $zip->extractTo($this->resourcePath);
      $zip->close();
    }
    else {
      throw new \RuntimeException('Failed to unzip file');
    }

    if (strlen($this->error) === 0) {
      $xmlNameInput = $this->resourcePath . $this->alias . '.xml';
      $xmlHandleInput = fopen($xmlNameInput, 'r');
      $xmlContentsInput = fread($xmlHandleInput, filesize($xmlNameInput));
      fclose($xmlHandleInput);

      $s = $xmlContentsInput;

      $s = $this->getString($this->simplexor($this->getBytes($s)));
    }
    else {
      throw new \RuntimeException('Unable to open resource');
    }

    return $s;
  }

  /**
   * Helper function to parse settings.
   *
   * @param string $s
   *   Settings as string.
   *
   * @return bool
   *   True if all settings parsed and set into respective members.
   */
  private function parseSettings($s) {
    $i = 0;
    $j = 0;
    $i = strpos($s, '<id>') + strlen('<id>');
    $j = strpos($s, '</id>');

    $this->id = substr($s, $i, $j - $i);

    $i = strpos($s, '<password>') + strlen('<password>');
    $j = strpos($s, '</password>');
    $this->password = substr($s, $i, $j - $i);

    $i = strpos($s, '<passwordhash>') + strlen('<passwordhash>');
    $j = strpos($s, '</passwordhash>');
    $this->passwordHash = substr($s, $i, $j - $i);

    $i = strpos($s, '<webaddress>') + strlen('<webaddress>');
    $j = strpos($s, '</webaddress>');
    $this->webAddress = substr($s, $i, $j - $i);

    $i = strpos($s, '<port>') + strlen('<port>');
    $j = strpos($s, '</port>');
    $this->port = substr($s, $i, $j - $i);

    $i = strpos($s, '<context>') + strlen('<context>');
    $j = strpos($s, '</context>');
    $this->context = substr($s, $i, $j - $i);

    return TRUE;
  }

  /**
   * Helper function simplexor.
   *
   * @param mixed $abyte0
   *   Data abyte0.
   *
   * @return mixed
   *   Processed output.
   */
  protected function simplexor($abyte0) {
    $key = 'Those who profess to favour freedom and yet depreciate agitation are men who want rain without thunder and lightning';
    $abyte1 = $this->getBytes($key);

    for ($i = 0; $i < count($abyte0);) {
      for ($j = 0; $j < count($abyte1); $j++) {
        $abyte2[$i] = ($abyte0[$i] ^ $abyte1[$j]);
        if (++$i == count($abyte0)) {
          break;
        }
      }
    }

    return $abyte2;
  }

  /**
   * Helper function to get bytes array from string.
   *
   * @param string $s
   *   String to convert into bytes array..
   *
   * @return array
   *   Array of bytes from string.
   */
  protected function getBytes($s) {
    $hex_ary = [];
    $size = strlen($s);
    for ($i = 0; $i < $size; $i++) {
      $hex_ary[] = chr(ord($s[$i]));
    }
    return $hex_ary;
  }

  /**
   * Helper function to get string from bytes array.
   *
   * @param array $byteArray
   *   Array containing bytes.
   *
   * @return string
   *   String from the bytes array.
   */
  protected function getString(array $byteArray) {
    $s = '';
    foreach ($byteArray as $byte) {
      $s .= $byte;
    }
    return $s;
  }

  /**
   * Helper function startsWith.
   *
   * @param string $haystack
   *   Hay stack - full string.
   * @param string $needle
   *   Needle - to search.
   *
   * @return bool
   *   True or false.
   */
  protected function startsWith($haystack, $needle) {
    // Recommended version, using strpos.
    return strpos($haystack, $needle) === 0;
  }

  /**
   * Helper function endsWith.
   *
   * @param string $haystack
   *   Hay stack - full string.
   * @param string $needle
   *   Needle - to search.
   *
   * @return bool
   *   True or false.
   */
  protected function endsWith($haystack, $needle) {
    // Recommended version, using strpos.
    return strrpos($haystack, $needle) === strlen($haystack) - strlen($needle);
  }

}
