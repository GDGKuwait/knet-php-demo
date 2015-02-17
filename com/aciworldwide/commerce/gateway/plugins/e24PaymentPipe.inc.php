<?php

/*
 * e24PaymentPipe
 *
 *
 * e24payment-php is an implementation in PHP of E24PaymentPipe 
 * java classes. It allows to connect to online credit card payment
 * from http://www.aciworldwide.com/.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details at 
 * http://www.gnu.org/copyleft/lgpl.html
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

class e24PaymentPipe {
    var $SUCCESS = 0;
    var $FAILURE = -1;
    var $BUFFER = 2320;
    var $strIDOpen = "<id>";
    var $strPasswordOpen = "<password>";
    var $strWebAddressOpen = "<webaddress>";
    var $strPortOpen = "<port>";
    var $strContextOpen = "<context>";
    var $strIDClose = "</id>";
    var $strPasswordClose = "</password>";
    var $strWebAddressClose = "</webaddress>";
    var $strPortClose = "</port>";
    var $strContextClose = "</context>";
    var $webAddress;
    var $port;
    var $id;
    var $password;
    var $passwordHash;
    var $action;
    var $transId;
    var $amt;
    var $responseURL;
    var $trackId;
    var $udf1;
    var $udf2;
    var $udf3;
    var $udf4;
    var $udf5;
    var $paymentPage;
    var $paymentId;
    var $result;
    var $auth;
    var $ref;
    var $avr;
    var $date;
    var $currency;
    var $errorURL;
    var $language;
    var $context;
    var $resourcePath;
    var $alias;
    var $error;
    var $rawResponse;
    var $debugMsg;
    var $arr = array();

    function e24PaymentPipe() {
        $this->webAddress = "";
        $this->port = "";
        $this->id = "";
        $this->password = "";
        $this->action = ""; // 1 = purchase
        $this->transId = "";
        $this->amt = "";
        $this->responseURL = "";
        $this->trackId = "";
        $this->udf1 = "";
        $this->udf2 = "";
        $this->udf3 = "";
        $this->udf4 = "";
        $this->udf5 = "";
        $this->paymentPage = "";
        $this->paymentId = "";
        $this->result = 0;
        $this->auth = "";
        $this->ref = "";
        $this->avr = "";
        $this->date = "";
        $this->currency = "";
        $this->errorURL = "";
        $this->language = "";
        $this->context = "";
        $this->resourcePath = "";
        $this->alias = "";
        $this->error = "";
        $this->rawResponse = "";
        $this->debugMsg = "";
    }

    function getWebAddress() {
        return webAddress;
    }

    function setWebAddress($s) {
        $this->webAddress = $s;
    }

    function getPort() {
        return $this->port;
    }

    function setPort($s) {
        $this->port = $s;
    }

    function set($k, $v) {
        $this->arr[$k] = $v;
    }

    function get($k) {
        return $this->arr[$k];
    }

    function setId($s) {
        $this->id = $s;
    }

    function getId() {
        return $this->id;
    }

    function setPassword($s) {
        $this->password = $s;
    }

    function setPasswordHash($s) {
        $this->passwordHash = $s;
    }

    function getPassword() {
        return $this->password;
    }

    function getPasswordHash() {
        return $this->passwordHash;
    }

    function setAction($s) {
        $this->action = $s;
    }

    function getAction() {
        return $this->action;
    }

    function setTransId($s) {
        $this->transId = $s;
    }

    function getTransId() {
        return $this->transId;
    }

    function setAmt($s) {
        $this->amt = $s;
    }

    function getAmt() {
        return $this->amt;
    }

    function setResponseURL($s) {
        $this->responseURL = $s;
    }

    function getResponseURL() {
        return $this->responseURL;
    }

    function setTrackId($s) {
        $this->trackId = $s;
    }

    function getTrackId() {
        return $this->trackId;
    }

    function setUdf1($s) {
        $this->udf1 = $s;
    }

    function getUdf1() {
        return $this->udf1;
    }

    function setUdf2($s) {
        $this->udf2 = $s;
    }

    function getUdf2() {
        return $this->udf2;
    }

    function setUdf3($s) {
        $this->udf3 = $s;
    }

    function getUdf3() {
        return $this->udf3;
    }

    function setUdf4($s) {
        $this->udf4 = $s;
    }

    function getUdf4() {
        return $this->udf4;
    }

    function setUdf5($s) {
        $this->udf5 = $s;
    }

    function getUdf5() {
        return $this->udf5;
    }

    function getPaymentPage() {
        return $this->paymentPage;
    }

    function getPaymentId() {
        return $this->paymentId;
    }

    function setPaymentId($s) {
        $this->paymentId = $s;
    }

    function setPaymentPage($s) {
        $this->paymentPage = $s;
    }

    function getRedirectContent() {
        return ($this->paymentPage . "&PaymentID=" . $this->paymentId);
    }

    function getResult() {
        return $this->result;
    }

    function getAuth() {
        return $this->auth;
    }

    function getAvr() {
        return $this->avr;
    }

    function getDate() {
        return $this->date;
    }

    function getRef() {
        return $this->ref;
    }

    function getCurrency() {
        return $this->currency;
    }

    function setCurrency($s) {
        $this->currency = $s;
    }

    function getLanguage() {
        return $this->language;
    }

    function setLanguage($s) {
        $this->language = $s;
    }

    function getErrorURL() {
        return $this->errorURL;
    }

    function setErrorURL($s) {
        $this->errorURL = $s;
    }

    function setContext($s) {
        $this->context = $s;
    }

    function getResourcePath() {
        return $this->resourcePath;
    }

    function setResourcePath($s) {
        $this->resourcePath = $s;
    }

    function getAlias() {
        return $this->alias;
    }

    function setAlias($s) {
        $this->alias = $s;
    }

    function getErrorMsg() {
        return $this->error;
    }

    function getRawResponse() {
        return $this->rawResponse;
    }

    function getDebugMsg() {
        return $this->debugMsg;
    }

    function performPaymentInitialization() {
        $stringbuffer = "";
        if (!$this->getSecureSettings())
            return -1;
        if (strlen($this->id) > 0)
            $stringbuffer .= ("id=" . $this->id . "&");
        if (strlen($this->password) > 0)
            $stringbuffer .= ("password=" . $this->password . "&");
        if (strlen($this->passwordHash) > 0)
            $stringbuffer.=("passwordhash=" . $this->passwordHash . "&");
        if (strlen($this->amt) > 0)
            $stringbuffer.=("amt=" . $this->amt . "&");
        if (strlen($this->currency) > 0)
            $stringbuffer.=("currencycode=" . $this->currency . "&");
        if (strlen($this->action) > 0)
            $stringbuffer.=("action=" . $this->action . "&");
        if (strlen($this->language) > 0)
            $stringbuffer.=("langid=" . $this->language . "&");
        if (strlen($this->responseURL) > 0)
            $stringbuffer.=("responseURL=" . $this->responseURL . "&");
        if (strlen($this->errorURL) > 0)
            $stringbuffer.=("errorURL=" . $this->errorURL . "&");
        if (strlen($this->trackId) > 0)
            $stringbuffer.=("trackid=" . $this->trackId . "&");
        if (strlen($this->udf1) > 0)
            $stringbuffer.=("udf1=" . $this->udf1 . "&");
        if (strlen($this->udf2) > 0)
            $stringbuffer.=("udf2=" . $this->udf2 . "&");
        if (strlen($this->udf3) > 0)
            $stringbuffer.=("udf3=" . $this->udf3 . "&");
        if (strlen($this->udf4) > 0)
            $stringbuffer.=("udf4=" . $this->udf4 . "&");
        if (strlen($this->udf5) > 0)
            $stringbuffer.=("udf5=" . $this->udf5 . "&");
        $s = $this->sendMessage($stringbuffer, "PaymentInitHTTPServlet");
        if ($s == null)
            return -1;
        $i = strpos($s, ":");
        if ($i == -1) {
            $this->error = "Payment Initialization returned an invalid response: " . $s;
            return -1;
        } else {
            $this->paymentId = substr($s, 0, $i);
            $this->paymentPage = substr($s, $i + 1);
            return 0;
        }
    }

    function performTransaction() {
        $stringbuffer = "";
        if (!$this->getSecureSettings())
            return -1;
        if (strlen($this->id) > 0)
            $stringbuffer.=("id=" . $this->id . "&");
        if (strlen($this->password) > 0)
            $stringbuffer.=("password=" . $this->password . "&");
        if (strlen($this->passwordHash) > 0)
            $stringbuffer.=("passwordhash=" . $this->passwordHash . "&");
        if (strlen($this->currency) > 0)
            $stringbuffer.=("currencycode=" . $this->currency . "&");
        if (strlen($this->amt) > 0)
            $stringbuffer.=("amt=" . $this->amt . "&");
        if (strlen($this->action) > 0)
            $stringbuffer.=("action=" . $this->action . "&");
        if (strlen($this->paymentId) > 0)
            $stringbuffer.=("paymentid=" . $this->paymentId . "&");
        if (strlen($this->transId) > 0)
            $stringbuffer.=("transid=" . $this->transId . "&");
        if (strlen($this->trackId) > 0)
            $stringbuffer.=("trackid=" . $this->trackId . "&");
        if (strlen($this->udf1) > 0)
            $stringbuffer.=("udf1=" . $this->udf1 . "&");
        if (strlen($this->udf2) > 0)
            $stringbuffer.=("udf2=" . $this->udf2 . "&");
        if (strlen($this->udf3) > 0)
            $stringbuffer.=("udf3=" . $this->udf3 . "&");
        if (strlen($this->udf4) > 0)
            $stringbuffer.=("udf4=" . $this->udf4 . "&");
        if (strlen($this->udf5) > 0)
            $stringbuffer.=("udf5=" . $this->udf5 . "&");

        if (is_array($this->arr) && count($this->arr)) {
            foreach ($this->arr as $key => $var) {
                $stringbuffer .= ($key . "=" . $var . "&");
            }
        }
        $stringbuffer = substr($stringbuffer, 0, strlen($stringbuffer) - 1);
        echo $stringbuffer;
        $s = $this->sendMessage($stringbuffer, "PaymentTranHTTPServlet");
        if ($s == null)
            return -1;
        
        $arraylist = $this->parseResults($s);
        if ($arraylist == null) {
            return -1;
        } else {
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

    function sendMessage($s, $s1) {
        $stringbuffer = "";
        $error = "";
        $this->debugMsg .= ("<br>---------- " . $s1 . ": " . time() . " ---------- <br>");
        if ($this->port == "443") {
            if (strlen($this->webAddress) <= 0) {
                $error = "No URL specified.";
                return null;
            }
            if ($this->port == "443")
                $stringbuffer.=("https://");
            else
                $stringbuffer.=("http://");
            $stringbuffer.=($this->webAddress);
            if (strlen($this->port) > 0) {
                $stringbuffer.=(":");
                $stringbuffer.=($this->port);
            }
            if (strlen($this->context) > 0) {
                if (!$this->StartsWith($this->context, "/"))
                    $stringbuffer.=("/");
                $stringbuffer.=($this->context);
                if (!$this->EndsWith($this->context, "/"))
                    $stringbuffer.=("/");
            } else {
                $stringbuffer.=("/");
            }
            $stringbuffer.=("servlet/");
            $stringbuffer.=($s1);
            $this->debugMsg.=("<br>About to create the URL to: " . $stringbuffer);
            $url = $stringbuffer;
            //echo '<br>'. $stringbuffer . '<br>';
            $this->debugMsg.=("<br>About to create http connection....");

            $this->debugMsg.=("<br>Created connection.!!");
            if (strlen($s) > 0) {
                $c = curl_init();
				curl_setopt($c, CURLOPT_HEADER, 0);
				curl_setopt($c, CURLOPT_URL, $stringbuffer);
                curl_setopt($c, CURLOPT_POST, true);
                curl_setopt($c, CURLOPT_POSTFIELDS, $s);
                curl_setopt($c, CURLOPT_SSL_VERIFYHOST, true);
                curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
                $this->debugMsg.=("<br>about to write DataOutputSteam....");
                curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
				$this->debugMsg.=("<br>after DataOutputStream.!!");
                $tmp = curl_exec($c);
                if (curl_error($c)) {
                    echo 'CURL ERROR: ' . curl_errno($c) . '::' . curl_error($c);
                } elseif ($tmp) {

                    curl_close($c);
                    $this->rawResponse = $tmp;
                    $this->debugMsg.=("<br>Received RESPONSE: " . $this->rawResponse);
                    return $this->rawResponse;
                } else {
                    $error = "No Data To Post!";
                }
            } else {
                $this->clearFields();
                $this->error = "Failed to make connection:\n" . $error;  //. $exception;
                return null;
            }
        }
    }

    function parseResults($s) {

        $arraylist = array(); {
            if ($this->StartsWith($s, "!ERROR!")) {
                $this->error = $s;
                return null;
            }

            $tokens = strtok($s, ":\r\n");
            print_r($tokens);
            $s1;
            $flag = false;
            foreach ($tokens as $token) {
                $s2 = $token;
                if (!$s2 . $this->startsWith(":")) {
                    $arraylist[] = ($s2);
                    $flag = false;
                } else {
                    if ($flag)
                        $arraylist[] = ("");
                    $flag = true;
                }
            }
            return $arraylist;
        }

        $this->error = "Internal Error!";
        return null;
    }

    function clearFields() {
        $this->error = "";
        $this->paymentPage = "";
        $this->paymentId = "";
    }

    function getSecureSettings() {
        $s = "";
        if (!$this->createReadableZip())
            return false;
        $s = $this->readZip();
        if ($s == "")
            return false;

        unlink($this->getResourcePath() . "resource.cgz");
        return $this->parseSettings($s);
    }

    function createReadableZip() { {

            $filenameInput = $this->getResourcePath() . "resource.cgn";
            $handleInput = fopen($filenameInput, "r");
            $contentsInput = fread($handleInput, filesize($filenameInput));

            $filenameOutput = $this->getResourcePath() . "resource.cgz";
            @unlink($filenameOutput);
            $handleOutput = fopen($filenameOutput, "w");

            $inByteArray = $this->getBytes($contentsInput);
            $outByteArray = $this->simpleXOR($inByteArray);
		
            fwrite($handleOutput, $this->getString($outByteArray));
            fclose($handleInput);
            fclose($handleOutput);
        }

        return true;
    }

    function readZip() {

        $s = ""; {

            $filenameInput = $this->getResourcePath() . "resource.cgz";

            $zipentry;
            $i = 0;

            $zip = new ZipArchive;
            if ($zip->open($filenameInput) === TRUE) {
                $zip->extractTo($this->resourcePath);
                $zip->close();
            } else {
                echo 'failed';
                $this->error = "Failed to unzip file";
            }

            if (strlen($this->error) === 0) {
                $xmlNameInput = $this->resourcePath . $this->getAlias() . ".xml";
                $xmlHandleInput = fopen($xmlNameInput, "r");
                $xmlContentsInput = fread($xmlHandleInput, filesize($xmlNameInput));
                fclose($xmlHandleInput);
                unlink($xmlNameInput);
                $s = $xmlContentsInput;

                $s = $this->getString($this->simpleXOR($this->getBytes($s)));
            } else {
                $this->error = "Unable to open resource";
            }
            return $s;
        }
    }

    function parseSettings($s) {
        $i = 0;
        $j = 0;
        $i = strpos($s, "<id>") + strlen("<id>");
        $j = strpos($s, "</id>");

        $this->setId(substr($s, $i, $j - $i));
        $i = strpos($s, "<password>") + strlen("<password>");
        $j = strpos($s, "</password>");
        $this->setPassword(substr($s, $i, $j - $i));

        $i = strpos($s, "<passwordhash>") + strlen("<passwordhash>");
        $j = strpos($s, "</passwordhash>");
        $this->setPasswordHash(substr($s, $i, $j - $i));

        $i = strpos($s, "<webaddress>") + strlen("<webaddress>");
        $j = strpos($s, "</webaddress>");
        $this->setWebAddress(substr($s, $i, $j - $i));
        $i = strpos($s, "<port>") + strlen("<port>");
        $j = strpos($s, "</port>");
        $this->setPort(substr($s, $i, $j - $i));
        $i = strpos($s, "<context>") + strlen("<context>");
        $j = strpos($s, "</context>");
        $this->setContext(substr($s, $i, $j - $i));
        return true;
    }

    function simpleXOR($abyte0) {
        $key = "Those who profess to favour freedom and yet depreciate agitation are men who want rain without thunder and lightning";
        $abyte1 = $this->getBytes($key);

        for ($i = 0; $i < sizeof($abyte0);) {
            for ($j = 0; $j < sizeof($abyte1); $j++) {
                $abyte2[$i] = ($abyte0[$i] ^ $abyte1[$j]);
                if (++$i == sizeof($abyte0))
                    break;
            }
        }

        return $abyte2;
    }

    function getBytes($s) {
        $hex_ary = array();
        $size = strlen($s);
        for ($i = 0; $i < $size; $i++)
            $hex_ary[] = chr(ord($s[$i]));
        return $hex_ary;
    }

    function getString($byteArray) {
        $s = "";
        foreach ($byteArray as $byte) {
            $s .=$byte;
        }
        return $s;
    }

    function StartsWith($Haystack, $Needle) {
        // Recommended version, using strpos
        return strpos($Haystack, $Needle) === 0;
    }

    function EndsWith($Haystack, $Needle) {
        // Recommended version, using strpos
        return strrpos($Haystack, $Needle) === strlen($Haystack) - strlen($Needle);
    }

}

function xor_string($string) {
    $buf = '';
    $size = strlen($string);
    for ($i = 0; $i < $size; $i++)
        $buf .= chr(ord($string[$i]) ^ 255);
    return $buf;
}
?>