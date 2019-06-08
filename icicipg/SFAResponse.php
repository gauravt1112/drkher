<?php
//error_reporting(-1);
session_start();
include("Sfa/EncryptionUtil.php");
include("Sfa/Merchant.php");
include("payment_manager.php");
		
		 $payManager = new payment_manager();
		$oMerchant = new Merchant();
	
		 $strMerchantId= "96007901"; // "00002116";
		 // $astrFileName="key/icici/96007901.key";
		 $astrFileName="//home//discon2015//public_html//icicipg//key//icici//96007901.key";
		 $astrClearData;
		 $ResponseCode = "";
		 $Message = "";
		 $TxnID = "";
		 $ePGTxnID = "";
	     $AuthIdCode = "";
		 $RRN = "";
		 $CVRespCode = "";
		 $Reserve1 = "";
		 $Reserve2 = "";
		 $Reserve3 = "";
		 $Reserve4 = "";
		 $Reserve5 = "";
		 $Reserve6 = "";
		 $Reserve7 = "";
		 $Reserve8 = "";
		 $Reserve9 = "";
		 $Reserve10 = "";

		 if($_POST){

			if($_POST['DATA']==null){
				print "null is the value";
			}
			 $astrResponseData=$_POST['DATA'];
			 $astrDigest = $_POST['EncryptedData'];
			 
			 $oEncryptionUtilenc = 	new 	EncryptionUtil();
			 $astrsfaDigest  = $oEncryptionUtilenc->getHMAC($astrResponseData,$astrFileName,$strMerchantId);

			if (strcasecmp($astrDigest, $astrsfaDigest) == 0) {
			 parse_str($astrResponseData, $output);
			 if( array_key_exists('RespCode', $output) == 1) {
			 	$ResponseCode = $output['RespCode'];
			 }
			 if( array_key_exists('Message', $output) == 1) {
			 	$Message = $output['Message'];
			 }
			 if( array_key_exists('TxnID', $output) == 1) {
			 	$TxnID=$output['TxnID'];
			 }
			 if( array_key_exists('ePGTxnID', $output) == 1) {
			 	$ePGTxnID=$output['ePGTxnID'];
			 }
			 if( array_key_exists('AuthIdCode', $output) == 1) {
			 	$AuthIdCode=$output['AuthIdCode'];
			 }
			 if( array_key_exists('RRN', $output) == 1) {
			 	$RRN = $output['RRN'];
			 }
			 if( array_key_exists('CVRespCode', $output) == 1) {
			 	$CVRespCode=$output['CVRespCode'];
			 }
			}
		 }

	 if($ResponseCode != "" && $Message !="") {
		// add payment response to table
		date_default_timezone_set('Asia/Calcutta');
		//echo "Order Id - ".$_SESSION['order_id']."<Br>";
		//$oid = $oMerchant->getOrderReferenceNo();
		//echo "Order id - ".$oid;

		//print_r($astrResponseData);
		/*$cookievals = "";

		if(isset($_COOKIE["disconpg"]) && $_COOKIE["disconpg"]) {
			$cookievals = explode(",", $_COOKIE["disconpg"]);
		}*/

		//$payrespid = $payManager->add_payment_response($_SESSION['order_id'], $_SESSION['amount'], $ResponseCode, $Message, date('Y-m-d, H:i:s'), $_SERVER['REMOTE_ADDR']);

		//$_SESSION['resp_msg'] = $Message;
		//redirecting to payment response
		$str = '<form name="ccpayment" method="post" action="http://www.discon2015.org/main/payment_response">';
		// foreach( $_POST as $key => $val )
		// {
			$str .= '<input type="hidden" name="RespCode" value="'.$ResponseCode.'">';
			$str .= '<input type="hidden" name="Message" value="'.$Message.'">';
			$str .= '<input type="hidden" name="TxnID" value="'.$TxnID.'">';
			$str .= '<input type="hidden" name="ePGTxnID" value="'.$ePGTxnID.'">';
			$str .= '<input type="hidden" name="AuthIdCode" value="'.$AuthIdCode.'">';
			$str .= '<input type="hidden" name="RRN" value="'.$RRN.'">';
			$str .= '<input type="hidden" name="CVRespCode" value="'.$CVRespCode.'">';
		// }
		
		$str .= '</form>
			<script>
		window.onload = function() { 
		document.ccpayment.submit();
		}
		</script>';	
		echo $str;	
	 }
	/*print "<h6>Response Code:: $ResponseCode <br>";
	print "<h6>Response Message:: $Message <br>";
	print "<h6>Auth ID Code:: $AuthIdCode <br>";
	print "<h6>RRN:: $RRN<br>";
	print "<h6>Transaction id:: $TxnID<br>";
	print "<h6>Epg Transaction ID:: $ePGTxnID<br>";
	print "<h6>CV Response Code:: $CVRespCode<br>";*/
?>