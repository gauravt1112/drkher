$(window).load(function(){
	$('#register_page').fadeIn();
});

$(document).ready(function() {

	$.validator.addMethod("alpha", function(value,element)
	{
	   return this.optional(element) || value == value.match(/^[a-zA-Z]+$/);
	}, "Alphabets only");

	/*$.validator.addClassRules("alpha", {
		alpha: true
	});*/

	$('#frm_registration').validate({
		submitHandler : function(form) {
			if(confirm("Are you sure you want to proceed to payment ?, Press ok to continue, otherwise press cancel to review information")) {
				form.submit();
			} else {
				return false;
			}
		}
	});

	if($('#frm_registration').length > 0) {
		/*$('#frm_registration').formwizard({
		 	// validationEnabled: true,
		 	focusFirstInput : true,	 		
			disableUIStyles : true
		 });*/


		// $("#frm_registration").bind("step_shown", function(event, data){
		// 			//$("#step_visualization").html(""); 
					
		// 			if(data.isBackNavigation || !data.isFirstStep){
		// 				var direction = (data.isBackNavigation)?"back":"forward";
		// 				//$("#step_visualization").append("<div>Moving "+ direction +"</div>");
		// 			}
		// 			if(data.currentStep == "fifth") {

		// 			}
					
		// 		});

		/*var remoteAjax = {}; // empty options object
		var allData = "";

		$("#frm_registration .step").each(function(){ // for each step in the wizard, add an option to the remoteAjax object...
			remoteAjax[$(this).attr("id")] = { 
				url: 'show_data',// the url which stores the stuff in db for each step
				dataType : 'text',
				beforeSubmit: function(data){ allData = allData + $.param(data); console.log(allData); },
				success : function(data){
				 			if(data){ //data is either true or false (returned from store_in_database.html) simulating successful / failing store
					 			//$("#data").append("    .... store done successfully");
					 			console.log(data);
					 		}else{
					 			alert("Server-side validation returned errors, nothing was stored.");
					 		}
					 		
				 			return data; //return true to make the wizard move to the next step, false will cause the wizard to stay on the CV step (change this in store_in_database.html)
				 		}
				};
		});	

		$("#frm_registration").formwizard("option", "remoteAjax", remoteAjax); // set the remoteAjax option for the wizard*/

	}

	//rotarian category
	$('#rot_category').change(function() {
		var val = $(this).val();
		var prices = $(this).find('option:selected').data('price');
		$('#price_temp').val(prices);
		$('#rotarian_name').keyup();
		$('#spouse_name').keyup();
		//alert(val);
		$('#club_name').hide();
		if(val == "district-3140") {
			$('#rot_club_text').hide();
			$('#rotary_div').show();
			$('#rotary_club_of').show();
		} else if(val == "other-district") {
			$('#rotary_div').show();
			$('#rotary_club_of').hide();
			$('#rot_club_text').show();
		} else if(val == "non-rotarian") {
			$('#rotary_div').hide();
			$('#rotary_club_of').hide();
			$('#rot_club_text').hide();
			$('#club_name').show();
		} else {
			$('#rotary_div').hide();
			$('#rotary_club_of').show();
			$('#rot_club_text').hide();
		}
	});

	$(".number").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       return false;
    }
   });

	//wethere user type is regular/patron
	$('#user_type').change(function() {
		var prices = $(this).find('option:selected').data('price');
		if(prices !="") $('#price_temp').val(prices);

	});

	$('#rotarian_name').keyup(function(){
		var price = $('#price_temp').val().split(',');
		if($(this).val().length > 0) {
			$('#rotarian_price').val(price[0]);
		} else {
			$('#rotarian_price').val("");
		}
		var val1 = ($('#rotarian_price').val()) ? parseInt($('#rotarian_price').val()) : 0; 
		var val2 = ($('#spouse_price').val()) ? parseInt($('#spouse_price').val()) : 0; 
		$('#total_price').val(val1 + val2);

	});

	$('#spouse_name').keyup(function(){
		var price = $('#price_temp').val().split(',');
		if($(this).val().length > 0) {
			$('#spouse_price').val(price[1]);
		} else {
			$('#spouse_price').val("");			
		}
		var val1 = ($('#rotarian_price').val()) ? parseInt($('#rotarian_price').val()) : 0; 
		var val2 = ($('#spouse_price').val()) ? parseInt($('#spouse_price').val()) : 0; 
		$('#total_price').val(val1 + val2)
	});


	/*$('#spouse_name').keyup(function(){
		var price = $('#price_temp').val().split(',');
		if($(this).val().length > 0) {
			$('#spouse_price').val(price[1]);
			if($('#rotarian_price').val().length > 0)
				$('#total_price').val(parseInt($('#rotarian_price').val()) + parseInt($('#spouse_price').val()))
			else 
				$('#total_price').val($('#spouse_price').val());
		} else 
			$('#spouse_price').val("");
	});
*/
    $("#payment_mode").change(function(){
      val = $(this).val();
      if(val=="Select"){
        $('.hidden, .hide_div').fadeOut(200);
        return false;
      }
      if(val=="cheque") {
      	var cheque_amt = ($('#total_price').val()) ? parseInt($('#total_price').val()) : 0; 
      	$('#cheque_amount').val(cheque_amt);
      }
      $('.hidden, .hide_div').fadeOut(200);
      $("#"+val).delay(300).fadeIn();
    });

    $('#gender').change(function() {
    	var gender = $(this).find('option:selected').data('reverse');
    	$('#spouse_gendar').val(gender);
    });

    $('#spouse_gendar').change(function() {
    	var gender = $(this).find('option:selected').data('reverse');
    	$('#gender').val(gender);
    });

    $('#register_as').change(function(){
    	var val = $(this).val();
    	if(val == "group") {
    		$('#individual_div').hide();
			if($('#info_link').length > 0) {
	    		$('#info_link').show();
				$( "#dialog" ).dialog({ 
					resizable: false,
					width:460,
					modal: true,
					buttons: {
						Ok: function() {
						$( this ).dialog( "close" );
						}
					}
				});
			}
			$('.fname').text('Enter the primary registrants first name');
			$('.mname').text('Enter the primary registrants middle name');
			$('.lname').text('Enter the primary registrants last name');
			$('.bgname').text('Enter the preferred badge name');
			$('.adline').text('Please enter the primary registrants permanent address details.');
			$('.contactdetails').text('Please enter the primary registrants contact details.');
    		//alert("1. Enter primary registrants details, whose name the group booking will be made under.\n\n2. Enter the the number of persons that will be attending in the respective categories.\n\n3. A spreadsheet will be sent across by email, which has to be filled with all registrants details and sent back to us at the earliest to avoid any discrepancy.");
    		$('#group_div').show();
    		$('#type_section').hide();
    		$('#gender, #spouse_gendar, #price_temp, #rotarian_price, #spouse_name, #spouse_price, #spouse_badge_name, #spouse_meal_pref').val("");
    	} else {
    		$('#info_link').hide();
    		$('#individual_div').show();
    		$('#group_div').hide();
    		$('#type_section').show();

			$('.fname').text("Enter the registrant's first name");
			$('.mname').text("Enter the registrant's middle name");
			$('.lname').text("Enter the registrant's last name");
			$('.bgname').text("Enter the registrant's preferred badge name");
			$('.adline').text("Enter the registrants permanent address details.");
			$('.contactdetails').text("Enter the registrants contact details");    		
    	}
    });

	if($('#info_link').length > 0) {
	$('#info_link').click(function(){
		$( "#dialog" ).dialog({ 
			resizable: false,
			width:460,
			modal: true,
			buttons: {
				Ok: function() {
				$( this ).dialog( "close" );
				}
			}
		});
	});
	}

    $('.txt_member').keyup(function(){
    	var txtname = $(this).attr('name');
    	var price = $(this).data('price');
    	var val = $(this).val();
		if($(this).val().length > 0) {
    		$('input[name="'+txtname+'_amount"]').val(parseInt(price)*parseInt(val));
    		total_persons = parseInt(total_persons) + parseInt(val);
    	} else {
    		$('input[name="'+txtname+'_amount"]').val("");
    	}
		var total_persons = 0;
    	$('.txt_member').each(function(){
    		if ($(this).val() != "") {
    			if($(this).hasClass('couple')) {
					total_persons = parseInt(total_persons)+parseInt($(this).val())*2;
    			} else {
					total_persons = parseInt(total_persons)+parseInt($(this).val());
    			}
    		}
    		//console.log("total amount = "+amt);
    	});
		var amt = 0;
    	$('.txt_amount').each(function(){
    		if ($(this).val() != "") amt = parseInt(amt)+parseInt($(this).val());
    		//console.log("total amount = "+amt);
    	});
		var span = $("#discountext");
		//span.hide().remove();
    	if(total_persons > 14) {
    		$('#total_price').val(parseInt(amt) - 1000 * parseInt(total_persons));
    		span.hide().show();
    	} else {
			$('#total_price').val(amt);
			span.hide();
    	}
		console.log(total_persons);
    	//console.log(price);
    	//console.log(txtname);
    });

    $('.datepicker').datepicker({
		dateFormat: "dd-mm-yy"
	});

});