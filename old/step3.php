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
          <form method="post" action="">
            <p>
              <label>Payment</label>
              <select id="payment_mode">
                <option value="Select">Select</option>
                <option value="cheque">Cheque</option>
                <option value="direct_transfer">Direct Transfer</option>
                <option value="credit_debit_cards">Credit / Debit Card</option>
              </select>
            </p>

            <div id="cheque" class="hidden">
              <p><label>Cheque Number</label><input type="text" name=""></p>
              <p><label>Bank</label><input type="text" name=""></p>
              <p><label>Branch</label><input type="text" name=""></p>
              <p><label>Amout</label><input type="text" name=""></p>
              <p><label>Dated</label><input type="text" name=""></p>
              <p><label><em>If you need payment to be collected please provide address</em></label></p>
              <p><label style="float:left">Address</label><textarea></textarea></p>
              <p style="clear:both;padding-top:12px;margin-left:-360px" align="center" ><input type="submit" name="" value="SUBMIT"></p>     
            </form>
            <div class="clear">
              <p><br></p>            
              <p id="footerLinks"><a href="step2.php" class="back"><img src="images/arrow_back.png"> BACK</a><a href="terms-conditions.php">Terms & Conditions</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="privacy-policy.php">Privacy Policy</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);">Return Policy</a></p>
            </div> 
            </div> 

            <div id="direct_transfer" class="hidden">
            <p><label>Cheque Number</label><input type="text" name=""></p>
            <p><label>Bank</label><input type="text" name=""></p>
            <p><label>Branch</label><input type="text" name=""></p>
            <p><label>Amout</label><input type="text" name=""></p>
            <p><label>IFSC Code</label><input type="text" name=""></p>
            <p><label><em>Kindly e-mail form and transfer details.</em></label></p>
            <p style="clear:both;padding-top:12px;margin-left:-460px" align="center" ><input type="submit" name="" value="SUBMIT"></p>      
            </form>
            <div class="clear">
              <p><br></p>            
              <p id="footerLinks"><a href="step2.php" class="back"><img src="images/arrow_back.png"> BACK</a><a href="terms-conditions.php">Terms & Conditions</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="privacy-policy.php">Privacy Policy</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);">Return Policy</a></p>
            </div> 
            </div>            

            <div id="credit_debit_cards" class="hidden">
              <p style="clear:both;padding-top:12px;margin-left:-440px" align="center" ><input type="submit" name="" value="SUBMIT"></p>     
            </form>
            <div class="clear">
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p><br></p>            
              <p id="footerLinks"><a href="step2.php" class="back"><img src="images/arrow_back.png"> BACK</a><a href="terms-conditions.php">Terms & Conditions</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="privacy-policy.php">Privacy Policy</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);">Return Policy</a></p>
            </div> 
            </div> 

        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#payment_mode").change(function(){
      val = $(this).val();
      if(val=="Select"){
        $('.hidden').fadeOut(200);
        return false;
      }
      $('.hidden').fadeOut(200);
      $("#"+val).delay(300).fadeIn();
    });
  });
</script>

</body>
</html>