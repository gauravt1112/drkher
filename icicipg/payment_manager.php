<?php
include('dbconfig.php');
class payment_manager {

	function __construct()
	{
		mysql_connect(db_host,db_user,db_pass) or die("unable to connect".mysql_error());
		mysql_select_db(db_name) or die("unable to connect database".mysql_error());
	}

	public function add_payment_request($member_id, $order_id, $amount, $date_time, $ip_address) {
		$query = "insert into payment_request (member_id, order_id, amount, date_time, ip_address) values ('$member_id', '$order_id', '$amount', '$date_time', '$ip_address')";
		mysql_query($query) or die(mysql_error());
		return mysql_insert_id();
	}

	public function add_payment_response($order_id, $amount, $response_code, $response_msg, $date_time, $ip_address) {
		$query = "insert into payment_response (order_id, amount, response_code, response_msg, date_time, ip_address) values ('$order_id', '$amount', '$response_code', '$response_msg', '$date_time', '$ip_address')";
		mysql_query($query) or die(mysql_error());
		return mysql_insert_id();
	}
	
}
?>