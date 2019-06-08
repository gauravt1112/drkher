<nav-main class="clearfix">
	<div id="logo"><a href="index.php"><img src="images/logo.png"></a></div>
	<div id="mini-menu" style="float: right;margin-right: 10px;">
        <img src="images/nav-icon.png" id="pull" class="nav-toggler toggle-slide-right"/>
    </div>
	<div class="icon">
		<!-- <a href="index.php" style="width: 50px;"><img src="images/home-icon.png" alt="" style="margin-right:10px;"></a> 
		<img src="images/line-icon.jpg" alt="" style="margin-right:10px;"> -->
		<img src="images/fb-icon.png" alt="">
		</div>
<nav class="menu slide-menu-right">
		<ul class="clearfix">
		   <li><p class="close-menu"></p></li>
			<li <?php if($activeMenu=="team") echo "class='active'"?> ><a href="team.php"  id="c1">THE TEAM</a><div class="smiley"><img src="images/smiley.png"/></div></li>
			<li <?php if($activeMenu=="treatments") echo "class='active'"?>><a href="treatments.php" id="c2">TREATMENTS OFFERED</a><div class="smiley"><img src="images/smiley.png"/></div></li>
			<li <?php if($activeMenu=="dental implant") echo "class='active'"?> ><a href="dental_implants.php" id="c3">DENTAL IMPLANTS</a><div class="smiley"><img src="images/smiley.png"/></div></li>
			<li <?php if($activeMenu=="overseas patients") echo "class='active'"?> ><a href="overseas_patients.php" id="c4">OVERSEAS PATIENTS</a><div class="smiley"><img src="images/smiley.png"/></div></li>
			<li <?php if($activeMenu=="dental emergencies") echo "class='active'"?> ><a href="dental_emergencies.php" id="c5">DENTAL EMERGENCY</a><div class="smiley"><img src="images/smiley.png"/></div></li>
			<li <?php if($activeMenu=="what-they-say") echo "class='active'"?> ><a href="what_they_say.php" id="c6">WHAT THEY SAY</a><div class="smiley"><img src="images/smiley.png"/></div></li>
			<li <?php if($activeMenu=="get in touch") echo "class='active'"?> ><a href="get_in_touch.php" id="c7">GET IN TOUCH WITH US</a><div class="smiley" id="smiley1"><img src="images/smiley.png"/></div></li>
			
		</ul>
</nav>
	</nav-main>
	<script src="js/classie.js"></script>
<script src="js/nav.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34160351-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>