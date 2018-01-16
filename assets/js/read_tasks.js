$(document).ready(function(){
	//$('#test').html("Hello <b>world</b>!");
	var id = $("#todo").attr("data-id");
    showTasks();
    
	function showTasks()
	{
		$.getJSON("http://php.oop/test.php", function(data){

			read_tasks="";

			$.each(data, function(key, val){
				read_tasks += "<p>" + val + "</p>";
				read_tasks += "<p>"+ key + "</p>";
			});
			$('#test').html(read_tasks);
		});
	}
});