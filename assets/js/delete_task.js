$(document).ready(function(){
	//$('#test').html("Hello <b>world</b>!");
	var id = $("#todo").attr("data-id");
	
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
			      read_tasks += "<td></td>";
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

	$(document).on('click', '.delete-task', function(){
		
		taskid = $(this).attr('data-id');
		
		$.ajax({
		  method: "POST",
		  url: "http://php.oop/api/delete_task.php",
		  dataType : 'json',
		  contentType : 'application/json',
		  data : JSON.stringify({id: taskid})
		}).done(function(msg){
		  //alert("Success");
		  showTasks();
		}).fail(function(msg){
		  //alert("Error" + msg);
		}).always(function(msg) {
		  //lert("Complete" + msg);
		  showTasks();
		});

		/*$.ajax({
        url : "http://php.oop/api/delete_task.php",
        type : "POST",
        dataType : 'json',
        contentType : 'application/json',
        data : JSON.stringify({id: taskid}),
        success : function(result) { 
            // re-load list of products
            showTasks();
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
        });

        $(document).ajaxStop(function(){
		    window.location.reload();
		});*/

	});
});