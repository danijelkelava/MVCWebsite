$(document).ready(function(){
	//$('#test').html("Hello <b>world</b>!");
	var id = $("#todo").attr("data-id");
//setInterval(function(){ showTasks(); }, 3000);
    showTasks();
    
	function showTasks()
	{
		$.getJSON("http://php.oop/api/read_tasks.php?id="+id, function(data){

			read_tasks="";
            read_tasks += "<table class='table'>";
				read_tasks += "<thead>";
				    read_tasks += "<tr>";
				      read_tasks += "<th scope='col'>Ime taska</th>";
				      read_tasks += "<th scope='col'>Prioritet</th>";
				      read_tasks += "<th scope='col'>Rok</th>";
				      read_tasks += "<th scope='col'>Status</th>";
				      read_tasks += "<th scope='col'>Preostalo</th>";
				      read_tasks += "<th scope='col'></th>";
				      read_tasks += "<th scope='col'></th>";
				      read_tasks += "<th scope='col'></th>";
				    read_tasks += "<tr>";
				 read_tasks += "<thead>";
			  read_tasks += "<tbody>";
			$.each(data, function(key, val){

			    read_tasks += "<tr>";
			      read_tasks += "<td>" + val.naziv_taska + "</td>";
			      read_tasks += "<td>" + val.prioritet + "</td>";
			      read_tasks += "<td>" + val.rok + "</td>";
			      read_tasks += "<td>" + val.status + "</td>";
			      read_tasks += "<td>" + val.datediff + " dana</td>";
			      read_tasks += "<td><button data-id='"+val.taskid+"' type='button' class=' finish-task btn btn-outline-success'>Finish</button></td>";
			      read_tasks += "<td><button data-id='"+val.taskid+"' type='button' class=' update-task btn btn-outline-primary'>Update</button></td>";
			      read_tasks += "<td><button data-id='"+val.taskid+"' type='button' class=' delete-task btn btn-outline-danger'>Delete</button></td>";
			    read_tasks += "</tr>";
					 
			});
			  read_tasks += "</tbody>";
			read_tasks += "</table>";
			$('#test').html(read_tasks);
		});
	}
});