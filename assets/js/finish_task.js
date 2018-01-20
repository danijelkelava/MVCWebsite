$(document).ready(function(){

	var id = $("#todo").attr("data-id");
    
	$(document).on('click', '.finish-task', function(){

		taskid = $(this).attr('data-id');
		console.log(taskid);
		console.log(JSON.stringify({id: taskid}));

		$.ajax({
		  method: "POST",
		  url: "http://" + root_url + "/api/finish_task.php",
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