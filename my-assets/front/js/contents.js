var baseUrl = "http://logic-thought.com/";
	// wait for the DOM to be loaded 
	$(document).ready(function() { 
		// bind 'myForm' and provide a simple callback function 
		$('#commentsForm').ajaxForm(function() {
			$("input:textarea").clearInputs();
		}); 
	}); 