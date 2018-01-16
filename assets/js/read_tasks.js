$(document).ready(function(){
	//$('#test').html("Hello <b>world</b>!");
	var id = $("#todo").attr("data-id");
    showTasks();
    
	function showTasks()
	{
		$.getJSON("http://php.oop/models/tasks.php?id="+id, function(data){

			read_tasks="";

			$.each(data, function(key, val){

					read_tasks += "<table class='table'>";
					read_tasks += "<thead>";
					    read_tasks += "<tr>";
					      read_tasks += "<th scope='col'>Ime taska</th>";
					      read_tasks += "<th scope='col'>Prioritet</th>";
					      read_tasks += "<th scope='col'>Rok</th>";
					      read_tasks += "<th scope='col'>Status</th>";
					      read_tasks += "<th scope='col'></th>";
					      read_tasks += "<th scope='col'></th>";
					      read_tasks += "<th scope='col'></th>";
					      read_tasks += "<th scope='col'></th>";
					    read_tasks += "<tr>";
					  read_tasks += "<thead>";
					  read_tasks += "<tbody>";
					    read_tasks += "<tr>";
					      read_tasks += "<td>" + val.naziv_taska + "</td>";
					      read_tasks += "<td>" + val.prioritet + "</td>";
					      read_tasks += "<td>" + val.rok + "</td>";
					      read_tasks += "<td>" + val.status + "</td>";
					      read_tasks += "<td></td>";
					      read_tasks += "<td></td>";
					      read_tasks += "<td><button type='button' class='btn btn-secondary'>Update</button></td>";
					      read_tasks += "<td><button type='button' class='btn btn-danger'>Delete</button></td>";
					    read_tasks += "</tr>";
					  read_tasks += "</tbody>";
					read_tasks += "</table>";
			});
			$('#test').html(read_tasks);
		});
	}
});