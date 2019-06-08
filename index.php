<?php 
  $activeMenu = "";
?>
<html>
<head>
<?php include('includes/head.php'); ?>
</head>
<body>
<?php include('includes/menu.php'); ?>

<div id="outside" >

    <!-- slideshow -->
    <div class="cycle-slideshow" 
         data-cycle-fx="fadeout"
		  data-cycle-speed=1500
        data-cycle-timeout=7000
        data-cycle-prev="#prev"
        data-cycle-next="#next"
		data-cycle-slides="> div"
         style="z-index: 9;">
		 <div class="skdslider">
		<div class="sk1">
        <img src="images/part1-01.jpg">
		 <div class="slide-desc">
		<img src="images/doctor.png"  id="slide-cont1" /><br>
		<span id="slide-cont2" class="slide-cont">Udatta Kher</span><br><br>
		<p>A skilled clinician, educator, and researcher. He is a master of the craft and known to perform advanced procedures in Dental Implantology, Laser Dentistry and Cosmetic Dentistry with utmost ease.</p><br>
		<a href="team.php" ><p id="meet">meet dr. kher</p></a>
		<!-- <p id="meet"><a class="more" href="#">meet dr. kher</a></p> -->
		</div>
		</div>
		<div class="sk2">
        <img src="images/part2-01.jpg">
		</div>
		</div>
		
		<div class="skdslider">
		<div class="sk1">
        <img src="images/part1-01.jpg">
		 <div class="slide-desc">
		<img src="images/award.png"  id="slide-cont1" /><br>
		<span id="slide-cont2" class="slide-cont">For Excellence</span><br><br>
		<p>Dr. Kher recently received the prestigious 'Excellence in Dentistry' award for the year 2013 in the field of Implantology. To receive this Pan India award from amongst the meritorious dentists in the country was indeed an honour. </p><br>
		
		<!-- <p id="meet"><a class="more" href="#">meet dr. kher</a></p> -->
		</div>
		</div>
		<div class="sk2">
        <img src="images/Awards.jpg">
		</div>
		</div>
		<div class="skdslider">
		<div class="sk1">
        <img src="images/part1-01.jpg">
		<div class="slide-desc">
		<img src="images/dental.png"  id="slide-cont1"  /><br>
		<span id="slide-cont2">Implants</span><br><br>
		<p>The best and painless way of replacing missing teeth.</p><br>
		<a href="dental_implants.php" ><p id="meet">read more</p></a>
		<!-- <p id="meet"><a class="more" href="#">view</a></p> -->
		</div>
		</div>
		<div class="sk2">
        <img src="images/Dental_Implant.jpg">
		</div>
		</div>
		<div class="skdslider">
		<div class="sk1">
        <img src="images/part1-01.jpg">
		<div class="slide-desc">
		<img src="images/time.png"  id="slide-cont1"/><br>
		<span id="slide-cont2">Bound Clients</span><br><br>
		<p>Patients of Indian origin living overseas and visiting Mumbai can accomplish a lot of treatment in a short time.</p><br>
		<a href="overseas_patients.php" ><p id="meet">read on</p></a>
		<!-- <p id="meet"><a class="more" href="#">inquiry form</a></p> -->
		</div>
		</div>
		<div class="sk2">
        <img src="images/Time_Bound_Clients.jpg">
		</div>
		</div>
      
    </div>
	    <!-- prev/next links
    <div class=center>
        <span id=prev><img src="images/prev.png"/></span>
        <span id=next> <img src="images/next.png"/></span>
    </div>   -->
</div>


<div class="dental-center" >
<div class="dc1">
<img src="images/dc1-01.png" >
</div>
<div class="dc2">
<div class="dc2-content">
<img src="images/dc-line-01.png" id="dc2-img1" /><br><br>
<span id="dc-c1">Only Smiles</span><br>
<span id="dc-c2">Dental Centre</span>
<p>Only Smiles Dental Centre is the one stop solution to all your dental problems. Run by Dr. Udatta Kher, an expert in the dental field, this practice was set up at Pali Hill in 1964 by his father, Dr R B Kher and has grown from strength to strength over the last 50 years. A branch of the same enterprise has been successfully serving patients at Lokhandwala Complex, Andheri since 2007. Dr. Kher is known far and wide for his pain-free dental practices and for his profound knowledge in the field of Dental implants. He is a celebrated dentist the world over and his loyal patronage travel from various countries across the globe to be treated by his expert hands. He has cultivated his entire practice to work in the most efficient manner at par with international standards. To be treated by him or any of his accomplished associates is the best treatment your teeth can get.  
</p>
<img src="images/dc-line.png" id="dc2-img2" />
</div>
</div>
</div>

<div class="pf">
<div class="pf_content">

<span id="dc-c1" >Pain Free</span><br>
<span id="dc-c2">Dental Care</span><br><br>
<img src="images/dc-line2-01.png"/><br>
<p>Most procedures, worldwide, done on the human body are tending towards minimal intervention in order to reduce healing time and make the process 
Pain-free. We, at OSDC, take great pride in offering 'Minimally Invasive' treatment options keeping up with this trend.<br>
<b>Local Anesthesia:</b> The team at OSDC has perfected the art of administering local anesthesia for routine dental procedures. Most procedures like tooth extractions, root canal therapy and dental implants; perceived by patients as painful, are rendered painlessly by all the experienced clinicians at the center. Patients can be assured of a smooth and stress free dental experience.<br>
<b>Conscious sedation:</b>The center has the facility to administer Nitrous oxide (laughing gas)/ oxygen for anxious patients needing advanced dental procedures. (Currently available at the Andheri (Lokhandwala) Clinic)<br>
<b>General anesthesia:</b> This team of qualified doctors in an operation theatre can perform complicated dental procedures and surgeries needing longer duration. The team specializes in treating very young, uncooperative and medically compromised 
patients in a hospital based set up (Performed at Bhargava Nursing Home, Santacruz)<br>
<b>Laser Dentistry:</b>
A Laser is one of the state-of the-art equipment used to performing minimally invasive surgical procedures. A number of procedures such as periodontal therapy, gum recontouring, removal of growths, depigmentation and frenectomies are routinely offered at the center.
</p>
</div>
</div>
<?php include('includes/footer.php'); ?>
</body>
</html>