<?php
  $current = "registration";
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Rotary</title>
  <link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body class="bg">
  <div id="wrapper">
    <div id="main">
      <?php include('includes/header.php');?>
      <?php include('includes/sidebar.php');?>
      <div id="content" class="registration" style="padding-top: 70px;">
        <div class="content_inner">
          <form method="post" action="step3.php">
            <p class="radio"><label><input type="radio" name="rot">Rotarian</label><label><input type="radio" name="rot">Non-Rotarian</label></p>
            <p class="radio"><label><input type="radio" name="status">Single</label><label><input type="radio" name="status">Couple</label><label><input type="radio" name="status">Patron</label></p>
            <p><label>Name</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label><label style="margin-left:80px">Badge Name</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label></p>
            <p><label>Name Of Spouse</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label><label style="margin-left:50px">Badge Name</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label></p>
            <p><label>Rotatry Club of</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label></p>
            <p><label>Club Designation</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label><label>for the year 2014 - 2015</label></p>
            <p><label>District Designation</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label><label>for the year 2014 - 2015</label></p>
            <p class="radio"><label>Meal preference</label><label><input type="radio" name="meal">Veg</label><label><input type="radio" name="meal">Non-Veg</label><label><input type="radio" name="meal">Jain</label></p>
            <p><label style="float:left">Address</label><textarea></textarea><label class="reqsymbol"><sup>*</sup></label></p>
            <p style="clear:both;padding-top:12px;"><label>Office Telephone Number</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label></p>
            <p><label>Mobile</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label></p>
            <p><label>E-mail</label><input type="text" name=""><label class="reqsymbol"><sup>*</sup></label></p>
            <p align="center"><input type="submit" name="" value="NEXT"></p>     
          </form>
          <div class="clear">            
            <p id="footerLinks"><a href="registration.php" class="back"><img src="images/arrow_back.png"> BACK</a><a href="terms-conditions.php">Terms & Conditions</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="privacy-policy.php">Privacy Policy</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);">Return Policy</a></p>
          </div>
        </div>
      </div>
    </div>
  </div> 
</body>
</html>