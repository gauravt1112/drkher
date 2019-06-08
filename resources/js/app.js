$(document).ready(function(){
	
	$('.data-table').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	});
	
	var checkboxClass = 'icheckbox_flat-blue';
	var radioClass = 'iradio_flat-blue';
	$('input[type=checkbox],input[type=radio]').iCheck({
    	checkboxClass: checkboxClass,
    	radioClass: radioClass
	});

	$('.datepicker').datepicker({
		dateFormat: "dd-mm-yy"
	});
	
    $( ".date_from" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange : '1950:yy+1',
        onSelect: function( selectedDate ) {
            $( ".date_to" ).datepicker( "option", "minDate", selectedDate );
        }
    });

    $( ".date_to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange : '1950:yy+1',
        onSelect: function( selectedDate ) {
            $( ".date_from" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
	
	$('select').select2();

	$('textarea.editor').tinymce({
	    selector: "textarea#elm1",
	    theme: "modern",
	    width: '80%',
	    plugins: [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
	   ],
	   content_css: "css/content.css",
	   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
	   style_formats: [
	        {title: 'Bold text', inline: 'b'},
	        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
	        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
	        {title: 'Example 1', inline: 'span', classes: 'example1'},
	        {title: 'Example 2', inline: 'span', classes: 'example2'},
	        {title: 'Table styles'},
	        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
	    ]
	 });

	$("#main-form").validate();

	$(".btn-delete").bind('click', function() {
		if(confirm("Are you sure you want to delete?")) {
			return true;
		}
		return false;
	});

    $('#rot_gender').change(function() {
    	var gender = $(this).find('option:selected').data('reverse');
    	$('#rot_spouse_gendar').select2("destroy").val(gender).select2();
    });

    $('#rot_spouse_gendar').change(function() {
    	var gender = $(this).find('option:selected').data('reverse');
    	$('#rot_gender').select2("destroy").val(gender).select2();
    });


	$('#member_type').change(function(){
		var val = $(this).val();
		if(val=="" || val=="Rotarian Single" || val=="Non Rotarian Single" || val =="Patron Single") {
			$('#spouse_div').hide();
		} else {
			$('#spouse_div').show();
		}
		$("#rot_category option[value*='district-3140']").attr('disabled', false);
		$("#rot_category option[value*='other-district']").attr('disabled', false);
		$("#rot_category option[value*='rotract']").attr('disabled', false);
		$("#rot_category option[value*='non-rotarian']").attr('disabled', false);

		if(val == "Rotarian Single" || val == "Rotarian Couple") {
			$("#rot_category option[value*='rotract']").attr('disabled', true);
			$("#rot_category option[value*='non-rotarian']").attr('disabled', true);
			//$("#rot_category option[value*='non-rotarian']").attr('disabled', true);
		}

		if(val == "Non Rotarian Single" || val == "Non Rotarian Couple") {
			$("#rot_category option[value*='district-3140']").attr('disabled', true);
			$("#rot_category option[value*='other-district']").attr('disabled', true);
		}

		/*if(val =="Patron Single" || val =="Patron Couple"){
			$('#rot_div').hide();
			$('#rot_category, #rot_club_select, #dist_desig_select, #club_desig_select').select2("destroy").val("").trigger("change").select2();
			$('#rot_club_text').val("");
		} else {
			$('#rot_div').show();			
		}*/
		//alert(val);
	})

});