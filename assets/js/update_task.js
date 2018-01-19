
$(document).ready(function(){

	$(document).on('click', '.update-task', function(){
		var taskid = $(this).attr('data-id');
        console.log(taskid);
        readOneTask(taskid);        	    
	})
	
	var id = $("#todo").attr("data-id");
	
	$(document).on('submit', '#update-task-form', function(){

        var form_data=JSON.stringify($(this).serializeObject());
        console.log(form_data);

		$.ajax({
		  method: "POST",
		  url: "http://php.oop/api/update_task.php",
		  dataType : 'json',
		  contentType : 'application/json',
		  data : form_data
		}).done(function(msg){
		  //alert("Success");
		  todoInfo(id);
		  showTasks(id);
		  
		}).fail(function(msg){
		  alert("Error" + msg);
		}).always(function(msg) {
		  //alert("Complete" + msg);
		  todoInfo(id);
		  showTasks(id);
		  
		});
		 
		return false;
	});

});