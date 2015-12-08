	
	//-------------bookCleaningPopUp ----******** pop up  start County  *****--------- Start ---------
	$(document).ready(function() {
			$('.bookCleaning').click(function(e) { 
			   	$('#bookCleaningPopUp').reveal({ 
				  	animation: 'fade',                 
					animationspeed: 600,                      
					closeonbackgroundclick: true,           
					dismissmodalclass: 'close'   
				});
			return false;
			});			
		});		
	$(document).ready(function () {    
    $.validator.addClassRules("required", {
        required: true
    });    
    $('#bookCleaningForm').validate({
        submitHandler: function (form) {       
				//var $inputs = $('#bookCleaningForm :input[type=email],:input[type=text],input[type=radio]:checked');
				var $inputs = $('#bookCleaningForm :input,select,textarea');
						  var values = {};
						  var allVAlues='';
						  $inputs.each(function() {
							values[this.name] = $(this).val();
								allVAlues += values[this.name]+" ";
						  });
						  saveBoookCleaning(allVAlues);						 
            return true; 
        }
    });
	
});
//-------------bookCleaningPopUp ----******** pop up  End County  *****------- End  -----------

//-------------bookCleaningPopUp ----******** pop up  Start  *****------- Start  -----------
	
function saveBoookCleaning(allVAlues)
	{	
	//alert(allVAlues);
	var string = allVAlues.split(' ');	
		var email_to = string[1];	
			$.ajax({
					 url: '{{ path("service_packing_bookCleaning") }}',
					 type: 'POST',
					 data: {allVAlues:allVAlues,email_to:email_to,},
					 success:function(updatedStatus) 
					 {
						alert("Your booking mail Has Been Sucessfully send");
						//location.reload();
					 }
				});
	}

    
	
function saveBoookMoving()
	{		
		var firstNameMoving = $('#firstNameMoving').val();
		var lastNameMoving = $('#lastNameMoving').val();
		var emailMoving = $('#emailMoving').val();
		var commentMoving = $('#commentMoving').val();
		var mobileMoving = $('#mobileMoving').val();		
		$.ajax({
					 url: '{{ path("service_packing_bookMoving") }}',
					 type: 'POST',
					 data: {firstNameMoving:firstNameMoving, lastNameMoving:lastNameMoving,emailMoving:emailMoving,commentMoving:commentMoving,mobileMoving:mobileMoving,},
					 success:function(updatedStatus) 
					 {
						alert("Your booking mail Has Been Sucessfully send");
						location.reload();
					 }
				});  
	}	
	
function saveBoookPacking()
	{		
		var firstNamePack = $('#firstNamePack').val();
		var lastNamePack = $('#lastNamePack').val();
		var emailPack = $('#emailPack').val();
		var commentPack = $('#commentPack').val();
		var mobilePack = $('#mobilePack').val();		
		$.ajax({
					 url: '{{ path("service_packing_bookPacking") }}',
					 type: 'POST',
					 data: {firstNamePack:firstNamePack, lastNamePack:lastNamePack,emailPack:emailPack,commentPack:commentPack,mobilePack:mobilePack,},
					 success:function(updatedStatus) 
					 {
						alert("Your booking mail Has Been Sucessfully send");
						location.reload();
					 }
				});  
	}	


/*	
		
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
<script src="{{ asset('theme/frontend/js') }}/jquery.reveal.js"></script> 

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="{{ asset('theme/frontend/js') }}/jquery.reveal.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.bookCleaning').click(function(e) { // Button which will activate our modal
			   	$('#bookCleaningPopUp').reveal({ // The item which will be opened with reveal
				  	animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
				});
			return false;
			});
			
		});
		
		
		$(document).ready(function() {
			$('.bookMoving').click(function(e) { // Button which will activate our modal
			   	$('#bookMovingPopUp').reveal({ // The item which will be opened with reveal
				  	animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
				});
			return false;
			});
			
		});
		
		$(document).ready(function() {
			$('.bookPacking').click(function(e) { // Button which will activate our modal
			   	$('#bookPackingPopUp').reveal({ // The item which will be opened with reveal
				  	animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
				});
			return false;
			});
			
		});
	</script>

<script>

$('#bookCleaningForm').submit(function() {
  // get the array of all the inputs 
  var $inputs = $('#bookCleaningForm :input[type=email],:input[type=text],input[type=radio]:checked');
	//var $inputs = $('#bookCleaningForm input[type=radio]:checked');
  // get an associative array of the values
  var values = {};
  var allVAlues='';
  $inputs.each(function() {
    values[this.name] = $(this).val();
        allVAlues += values[this.name]+" ";

  });
  //alert(allVAlues);//console.log(allValues);
  saveBoookCleaning(allVAlues);

});

	
function saveBoookCleaning(allVAlues)
	{	
	alert(allVAlues);
	var string = allVAlues.split(' ');
		var email = string[1];
	
	
	
	 $.ajax({
					 url: '{{ path("service_packing_bookCleaning") }}',
					 type: 'POST',
					 data: {allVAlues:allVAlues,email:email},
					 success:function(updatedStatus) 
					 {
						alert("Your booking mail Has Been Sucessfully send");
						//location.reload();
					 }
				});
	}

function saveBoookMoving()
	{		
		var firstNameMoving = $('#firstNameMoving').val();
		var lastNameMoving = $('#lastNameMoving').val();
		var emailMoving = $('#emailMoving').val();
		var commentMoving = $('#commentMoving').val();
		var mobileMoving = $('#mobileMoving').val();		
		$.ajax({
					 url: '{{ path("service_packing_bookMoving") }}',
					 type: 'POST',
					 data: {firstNameMoving:firstNameMoving, lastNameMoving:lastNameMoving,emailMoving:emailMoving,commentMoving:commentMoving,mobileMoving:mobileMoving,},
					 success:function(updatedStatus) 
					 {
						alert("Your booking mail Has Been Sucessfully send");
						location.reload();
					 }
				});  
	}	
	
function saveBoookPacking()
	{		
		var firstNamePack = $('#firstNamePack').val();
		//alert(firstNamePack);
		var lastNamePack = $('#lastNamePack').val();
		var emailPack = $('#emailPack').val();
		var commentPack = $('#commentPack').val();
		var mobilePack = $('#mobilePack').val();		
		$.ajax({
					 url: '{{ path("service_packing_bookPacking") }}',
					 type: 'POST',
					 data: {firstNamePack:firstNamePack, lastNamePack:lastNamePack,emailPack:emailPack,commentPack:commentPack,mobilePack:mobilePack,},
					 success:function(updatedStatus) 
					 {
						alert("Your booking mail Has Been Sucessfully send");
						location.reload();
					 }
				});  
	}	



</script> 
         
 */
         



	
//------------slider start script ---- //

