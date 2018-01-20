$(document).ready(function(){

	var id = $("#todo").attr("data-id");

	$(document).on('submit', '#create-task-form', function(){

        var form_data=JSON.stringify($(this).serializeObject());
        console.log(form_data);
       
		$.ajax({
		  method: "POST",
		  url: "http://" + root_url + "/api/create_task.php",
		  dataType : 'json',
		  contentType : 'application/json',
		  data : form_data
		}).done(function(msg){
		  //alert("Success");
		  $("#create-task-form").trigger('reset');
		  //$("#create-task-form")[0].reset();
		  todoInfo(id);
		  showTasks(id);
		}).fail(function(msg){
		  alert("Error" + msg);
		});		 
		return false;
	});

	
});