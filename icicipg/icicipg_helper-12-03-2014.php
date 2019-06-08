<?php
//error_reporting(-1);
session_start();
if(isset($_SESSION['pay_session']) && $_SESSION['pay_session'] == true) {
	include("Sfa/BillToAddress.php");
	include("Sfa/CardInfo.php");
	include("Sfa/Merchant.php");
	include("Sfa/MPIData.php");
	include("Sfa/ShipToAddress.php");
	include("Sfa/PGResponse.php");
	include("Sfa/PostLibPHP.php");
	include("Sfa/PGReserveData.php");
	include("payment_manager.php");

	$oMPI 			= 	new MPIData();
	$oCI			=	new	CardInfo();
	$oPostLibphp	=	new	PostLibPHP();
	$oMerchant		=	new	Merchant();
	$oBTA			=	new	BillToAddress();
	$oSTA			=	new	ShipToAddress();
	$oPGResp		=	new	PGResponse();
	$oPGReserveData =	new PGReserveData();
	$payManager 	=	new payment_manager();

	$key = '96007901';
	$customer_ip = $_SERVER['REMOTE_ADDR'];
	$oMerchant->setMerchantDetails($key,$key,$key,$customer_ip,rand()."",$_SESSION['order_id'],"http://discon2015.org/icicipg/SFAResponse.php","POST","INR",$_SESSION['order_id'],"req.Sale",$_SESSION['amount'],"","Ext1","true","Ext3","Ext4","New PHP");
	// $oMerchant->setMerchantDetails($key,$key,$key,"10.10.10.238",rand()."","Ord1234","http://discon2015.org/icicipg/SFAResponse.php","POST","INR",$_SESSION['order_id'],"req.Sale",$_SESSION['amount'],"","Ext1","true","Ext3","Ext4","New PHP");

	$oBTA->setAddressDetails ($_SESSION['cust_id'],$_SESSION['cust_name'],$_SESSION['addr'],"","","City","State","48927489","IND",$_SESSION['email']);
	// $oBTA->setAddressDetails ("CID","Tester","Aline1","Aline2","Aline3","Pune","A.P","48927489","IND","tester@soft.com");

	$oSTA->setAddressDetails ($_SESSION['addr'],"","","City","State","443543","IND",$_SESSION['email']);

	#$oMPI->setMPIRequestDetails("1245","12.45","356","2","2 shirts","12","20011212","12","0","","image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/vnd.ms-powerpoint, application/vnd.ms-excel, application/msword, application/x-shockwave-flash, */*","Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0)");
	//setcookie("disconpg", $_SESSION['order_id'].",".$_SESSION['amount'], time()+3600);

	$oPGResp=$oPostLibphp->postSSL($oBTA,$oSTA,$oMerchant,$oMPI,$oPGReserveData);

	if($oPGResp->getRespCode() == '000'){ //if success
		$url	=$oPGResp->getRedirectionUrl();
		
		//add details to payment request table =========================================================================================
		date_default_timezone_set('Asia/Calcutta');
		$payid = $payManager->add_payment_request($_SESSION['cust_id'], $_SESSION['order_id'], $_SESSION['amount'], date('Y-m-d, H:i:s'), $customer_ip);

		//===============================================================================================================================
		#$url =~ s/http/https/;
		#print "Location: ".$url."\n\n";
		#header("Location: ".$url);
		//session_destroy();

		// add payment response to table ================================================================================================
		//$payrespid = $payManager->add_payment_response($_SESSION['order_id'], $_SESSION['amount'], $oPGResp->getRespCode(), $oPGResp->getRespMessage(), date('Y-m-d, H:i:s'), $_SERVER['REMOTE_ADDR']);
		//================================================================================================================================

		redirect($url);
	}else{ //if failed
		//session_destroy();
		// add payment response to table ================================================================================================
		//$payrespid = $payManager->add_payment_response($_SESSION['order_id'], $_SESSION['amount'], $oPGResp->getRespCode(), $oPGResp->getRespMessage(), date('Y-m-d, H:i:s'), $_SERVER['REMOTE_ADDR']);
		//================================================================================================================================
		print "Error Occured.<br>";
		print "Error Code:".$oPGResp->getRespCode()."<br>";
		print "Error Message:".$oPGResp->getRespMessage()."<br>";
	}
} else echo "Access Denied";

# This will remove all white space
#$oResp =~ s/\s*//g;

# $oPGResp->getResponse($oResp);

#print $oPGResp->getRespCode()."<br>";

#print $oPGResp->getRespMessage()."<br>";

#print $oPGResp->getTxnId()."<br>";

#print $oPGResp->getEpgTxnId()."<br>";

function redirect($url) {
	if(headers_sent()){
	?>
		<html><head>
			<script language="javascript" type="text/javascript">
				window.self.location='<?php print($url);?>';
			</script>
		</head></html>
	<?php
		exit;
	} else {
		header("Location: ".$url);
		exit;
	}
}
?>