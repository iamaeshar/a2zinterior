$(document).ready(function() {
	
	/*Contact Form Validation*/
	$(function() {
	  	$("form[name='contact-form']").validate({
		    
		    rules: {
		      	
		      	name: "required",
		      	email: {
		        	required: true,
		        	email: true
		      	},
		      	
		      	phone: {
		      		required: true,
		      		number: true
		      	},
		      	
		      	msg: {
		      		required: true,
		      		minlength: 20
		      	}
		    },
		    messages: {
		      	name: "Please enter your name",
		      	
		      	email: {
		      		required: "Please enter your email address", 
		      		email: "Please enter a valid email address", 
		      	},
		      	phone: {
		      		required: "Please enter your mobile number",
		      		number: "Please enter a valid mobile number"
		      	},
		      	msg: {
		      		required: "Please enter your enter message",
		      		minlength: "Your message should be mininum of 20 characters"
		      	}
		    },
		    submitHandler: function(form) {
		      	var name = $('#nameid').val();
		      	var email = $('#emailid').val();
		      	var phone = $('#phoneid').val();
		      	var msg = $('#msgid').val();
		      	
		      	$.ajax({
		      		url: "php/mailcontactdata.php",
		      		data: {
		      			name:name,
		      			email:email,
		      			phone:phone,
		      			msg:msg
		      		},
		      		type:'POST',
		      		beforeSend: ()=>{
		      			$('.loader-div').show();
		      		},
		      		success:(data)=>{
		      			if (data) {
		      				$('.message-div').addClass('message-show').removeClass('message-hide');
		      				$('.message-div > p').text('Thank you! We will get you soon!');
		      				setTimeout(function() {
		      					$('.message-div').addClass('message-hide').removeClass('message-show');
		      				},3000);
		      			}
		      			$('#contact-form')[0].reset();
		      		},
		      		error: ()=>{
		      			$('.message-div').addClass('message-show').removeClass('message-hide');
	      				$('.message-div > p').text('Something went wrong! Please try after sometime');
	      				setTimeout(function() {
	      					$('.message-div').addClass('message-hide').removeClass('message-show');
	      				},3500);
		      		},
		      		complete: ()=>{
		      			$('.loader-div').hide();
		      		}
		      	});
		    }
	  	});
	});
});