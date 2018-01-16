$(document).ready(function(){
	//$('#test').html("Hello <b>world</b>!");
	var id = $("#todo").attr("data-id");
    showTasks();
    
	function showTasks()
	{
		$.getJSON("http://php.oop/models/tasks.php?id="+id, function(data){

			read_tasks="";

			$.each(data, function(key, val){
				read_tasks += "<p>" + val.id + "</p>";
				read_tasks += "<p>"+ val.naziv_taska + "</p>";
			});
			$('#test').html(read_tasks);
		});
	}
});