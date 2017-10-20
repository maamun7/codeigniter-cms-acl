var baseUrl = "http://logic-thought.com/";

// Registration Form validation
 $(document).ready(function(){ 
	$("#userRegistration").validate({  
		rules:{
			first_name:{required:true,minlength: 6},
			last_name:{required:true,minlength: 6},
		/* 	username:{required:true,email: true,
	 			remote: {
				  url: baseUrl+"users/email_existency_check",
				  type: "post",
				  data: {
					email: function(){ return $("#username").val(); }
				  }
				} 
			}, */
			password:{required:true,minlength: 6},
			con_pass:{required:true,equalTo: "#password"}
		},
		messages:{
			first_name:{
				required:"Enter Your First Name",
				minlength:"First name must be minimum 6 characters"},
			last_name:{
				required:"Enter Your Last Name",
				minlength:"Last name must be minimum 6 characters"},
			/* username:{
				required:"Enter your email address",
				email:"Enter valid email address",
				remote:"Email already used. Log in to your existing account !"}, */
			password:{
				required:"Enter password",
				minlength:"Password must be minimum 6 characters"},
			con_pass:{
				required:"Enter confirm password",
				equalTo:"Password and Confirm Password Doesn't match"}
		},
		invalidHandler: function(form, validator) { 
			var errors = validator.numberOfInvalids();
			if (errors) {  
				var message = errors == 1 ? 'You missed 1 field. It has been highlighted': 'You missed ' + errors + ' fields. They have been highlighted';    
				$("div.error span").html(message); 
				$("div.error").show();        
			} else {$("div.error").hide();}
		}           
	});	
}); 