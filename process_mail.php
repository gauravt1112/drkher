<?php 
if(isset($_POST['submit'])){
   
	
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$country=$_POST['country'];
	$email=$_POST['email'];
	$comment=$_POST['comment'];
	
	 $to = "udattakher@gmail.com"; // this is your Email address
    $from = $email; // this is the sender's Email address
    $subject = "Contact Information";

	$message="First Name :".$fname."\r\n"."Middel Name :".$mname."\r\n"."Last Name :".$lname."\r\n"."City :".$city."\r\n"."state :".$state."\r\n"."Email Id :" .$email."\r\n"."Country :".$country."\r\n"."Comments :".$comment;
	
	
   // $subject2 = "Copy of your form submission";
   // $message = "This is a test mail. Please do not reply.";
   // $headers ="From:" . $to;
    //$headers2 = "From:" . $to;
	//$headers = "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
	$headers .="info@drkher.com"."\r\n";
    if(mail($to,$subject,$message,$headers))
	{
	
		echo "<script>
					window.location.href='thanks.php';
					</script>";
	}
	else
	{
	
		echo mysqli_error();
	}
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>