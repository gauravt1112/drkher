<?php 
  $activeMenu = "overseas patients";
?>

<!DOCTYPE>
<html>
<head>
<?php include('includes/head.php'); ?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#op-form").validate({
    
        // Specify the validation rules
        rules: {
           fname: "required",
            mname: "required",
			lname: "required",
            email: {
                required: true,
                email: true
            },
           city: {
				required: true,
				minlength:2
			},
			state: {
				required: true,
				minlength:2
			},
			country: {
				required: true,
				minlength:2
			}
        },
        
        // Specify the validation error messages
        messages: {
           fname:"Please Enter Your First Name",
			mname:"Please Enter Your Middle Name",
			lname:"Please Enter Your Last Name",
			email: {
				required: "Please Enter Your Email",
				email: "Email Id must be valid"
			},
			city: {
				required:  "Please Enter your City",
				minlength: "City Must be atleast 2 characters long"
			},
			state: {
				required: "Please Enter your state",
				minlength: "Country Must be atleast 3 characters long"
			},
			country: {
				required: "Please Enter your Country",
				minlength: "Country Must be atleast 3 characters long"
			}
        },
        
        submitHandler: function(form) {
            form.submit();
        },success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		},
		highlight: function(element, errorClass) {
			$(element).parent().next().find("." + errorClass).removeClass("checked");
		}
    });

  });
  
  </script>

<?php include('includes/menu.php'); ?>
<div class="pf" style="margin-top: 0px;background: url('images/OverseasPaitients_Banner.jpg') no-repeat center center;background-size: cover;">
<div class="pf_content">
<span id="dc-c1" >Overseas Patients</span><br>
<span id="dc-c2">Only Smiles</span><br><br>
<img src="images/dc-line2-01.png"/><br><br>
<p>A large number of patients from other countries have sought dental treatment at OSDC over the years. It is heartening to note that most of these patients visit us periodically for follow ups during their visits to Mumbai and also refer their close friends and family to us. We welcome patients from overseas who are time bound and do our best to complete their dental treatment in the shortest possible time without sacrificing quality.<br>We are also open to discussing treatment plans over emails prior to your visits to India. You may send a mail to <b>udattakher@gmail.com</b> to discuss your case and get an approximate estimate of time and cost of treatment. You may also schedule an appointment over email.</p>

</div>
</div>
<div class="op-form">
<div id="title">
<span>Drop Us A Mail</span><br><br>
<p>We are also open to discussing treatment plans over emails prior to your visits to India. You may fill in the form to discuss your case and get an approximate estimate of time and cost of treatment. You may also schedule an appointment over email.</p>
</div>
<div class="container-2">
  <form class="form-horizontal" role="form" method="post" name="op-form" id="op-form" action="process_mail.php">
  <div class="form-group">
      <span class="control-label col-sm-3" for="fname">Name</span>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" >
		</div>
		<div class="col-sm-3">
		<input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name" >
		</div>
		<div class="col-sm-3">
		<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" >
      </div>
    </div>
	<div class="form-group">
      <span class="control-label col-sm-3" for="city">City</span>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"  >
      </div>
    </div>
	<div class="form-group">
      <span class="control-label col-sm-3" for="state">State</span>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State"  >
      </div>
    </div>
	<div class="form-group">
      <span class="control-label col-sm-3" for="country">Country</span>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" >
      </div>
    </div>
    <div class="form-group">
      <span class="control-label col-sm-3" for="email">Email</span>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" >
      </div>
    </div>
	<div class="form-group">
      <span class="control-label col-sm-3" for="comment">Please use this space to ask any 
specific questions</span>
      <div class="col-sm-9">
        <textarea class="form-control" rows="5" id="comment" name="comment" ></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" name="submit" class="btn btn-default">SUBMIT</button>
      </div>
    </div>
  </form>
</div>
</div>

<div class="footer">
<img src="images/footer-01.png">
<p>Copyright Only Smiles Dental Centre &copy; 2015  |  Crafted by <a href="http://www.togglehead.in/" target="_blank" style="color:#CC9830;text-decoration: none;">Togglehead</a></p>
</div>
</body>
</html>