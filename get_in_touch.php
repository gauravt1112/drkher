<?php 
  $activeMenu = "get in touch";
?>
<html>
<head>
<?php include('includes/head.php'); ?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('includes/menu.php'); ?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#get-form").validate({
    
        // Specify the validation rules
        rules: {
           fname: "required",
            mname: "required",
			lname: "required",
            email: {
                required: true,
                email: true
            },
           address: {
				required: true,
				minlength: 10
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
			address: {
				required:  "Please Enter your City",
				minlength: "Please Enter Your Address"
			}
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
<div class="pf" style="margin-top: 0px;background: url('images/GetInTouch_Banner.jpg') no-repeat center center;background-size: cover;">
<div class="pf_content">
<span id="dc-c1" >Only Smiles</span><br>
<span id="dc-c2">Dental Centre</span><br><br>
<img src="images/dc-line2-01.png"/><br><br>
<p>If you find yourself in the middle of a dental emergency or have been putting off dental treatments for a long time, we can remedy all your teeth-related ailments. For any dental queries, appointments or referrals, contact us on the details given below. Or you can drop us an email and we will get back to you at the earliest. So don't fret, Only Smiles is here to help you.</p>

</div>
</div>
<div class="op-form">
<div class="git" >
<span>Get In Touch</span><br><br>
<div class="git-p">
<span>Only Smiles, Dental Centre</span><br><br>
<p>Address: Pankaj, 21 Ambedkar Road, Pali Hill, Khar, Mumbai 400052</p>
<p>Phone: 2649 4839/2648 1285</p>
<div id="maps">
<a href="https://www.google.co.in/maps/search/Only+Smiles,+Dental+Centre,+near+Khar+Pali+Rd,+Mumbai,+Maharashtra/@19.0677726,72.8339317,15z/data=!3m1!4b1" target="_blank">
<img src="images/map.jpg" />
<p >Only Smiles, Dental Centre, Pali Hill, Khar</p></a>
</div>
</div>
<div  class="git-p">
<span>Only Smiles, Dental Centre</span><br><br>
<p>Address: B/1 Guru Prasad, 2nd Cross Lane, Lokhandwala Complex, Andheri (W), Mumbai 400053
</p>
<p>Phone: 2637 4518</p>
<div id="maps">
<a href="https://www.google.co.in/maps/search/Only+Smiles,+Dental+Centre,+Lokhandwala+Complex,+Andheri/@19.1136447,72.8697339,13z/data=!3m1!4b1" target="_blank" >
<img src="images/map.jpg" />
<p >Only Smiles, Dental Centre, Lokhandwala Complex, Andheri</p></a>
</div>
</div>
<img src="images/dc-line.png"/>
</div>
<div id="title" style="margin-top: 30px;">
<span>Drop Us A Mail</span><br><br>
<p>Contacting us is Easy...<br><br>Please fill out the form below or call us at our given contact numbers.</p>
</div>
<div class="container-2"  style="float: left;width: 100%;margin-bottom: 50px;">
  <form class="form-horizontal" role="form" id="get-form" action="process_get.php" method="post">
  <div class="form-group">
      <span class="control-label col-sm-3" for="Name">Name</span>
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
      <span class="control-label col-sm-3" for="address">Address</span>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" >
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