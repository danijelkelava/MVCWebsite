$(document).ready(function(){

	$.fn.serializeObject = function()
	{
	    var o = {};
	    var a = this.serializeArray();
	    $.each(a, function() {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	    return o;
	};

	$(document).on('submit', '#create-task-form', function(){
	    // form data will be here
	    // get form data

        var form_data=JSON.stringify($(this).serializeObject());
        console.log(form_data);
        // submit form data to api
		$.ajax({
		  method: "POST",
		  url: "http://php.oop/api/create_task.php",
		  dataType : 'json',
		  contentType : 'application/json',
		  data : form_data
		}).done(function(msg){
		  alert("Success");
		  //showTasks();
		}).fail(function(msg){
		  alert("Error" + msg);
		}).always(function(msg) {
		  alert("Complete" + msg);
		  //showTasks();
		});
		 
		return false;
	});

});