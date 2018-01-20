
$(document).ready(function(){

	var id = $("#todo").attr("data-id");
    
	$(document).on('click', '.delete-task', function(){
		var root_url = window.location.hostname;
	    console.log(root_url);
		taskid = $(this).attr('data-id');
		console.log(JSON.stringify({id: taskid}));

		$.ajax({
		  method: "POST",
		  url: "http://php.oop/api/delete_task.php",
		  dataType : 'json',
		  contentType : 'application/json',
		  data : JSON.stringify({id: taskid})
		}).done(function(msg){
		  //alert("Success");
		  todoInfo(id);
		  showTasks(id);
		}).fail(function(msg){
		  //alert("Error" + msg);
		});
	});
});