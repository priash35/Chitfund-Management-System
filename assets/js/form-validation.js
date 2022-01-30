// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  
  

  $.validator.addMethod("if_code", function(value, element) {
    var reg = /^[A-Za-z]{4}[0-9]{6,7}$/;
    if (this.optional(element)) {
      console.log(value);
      console.log(element);
      return true;
    }
    if (value.match(reg)) {
      return true;
    } else {
      return false;
    }
  }, "Please specify a valid IFSC CODE");



  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      branch: "required",
      lastname: "required",
	  acc_number: "required",
	  if_code:"required",
	  
	  
	  if_code:{
		  required: true,
		  minlength: 7,
	  },
	  
	  
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: ("^[^\s]{4}\d{7}$"),

      },
		if_code: {
        required: true,
        if_code: true
      },
    },
    // Specify validation error messages
    messages: {
		if_code :"Please enter your ifce",
      branch: "Please enter your branch",
      acc_number: "Please enter your acc_number",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});