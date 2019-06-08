<?php 
if(isset($_POST['submit'])){
   
	
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$comment=$_POST['comment'];
	
	 $to = "udattakher@gmail.com"; // this is your Email address
    $from = $email; // this is the sender's Email address
    $subject = "Contact Information";

	$message="First Name :".$fname."\r\n"."Middel Name :".$mname."\r\n"."Last Name :".$lname."\r\n".'Address :'.$address."\r\n".'Email Id :' .$email."\r\n".'Country :'.$country."\r\n".'Comments :'.$comment;
	
	
   // $subject2 = "Copy of your form submission";
   // $message = "This is a test mail. Please do not reply.";
   $headers .="info@drkher.com"."\r\n";
    //$headers2 = "From:" . $to;
    if(mail($to,$subject,$message,$headers))
	{
	
		echo "<script>
					window.location.href='thanks_get.php';
					</script>";
	}
	else
	{
	
		echo mysqli_error();
	}
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>