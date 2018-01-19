
function showTasks(id)
{
	$.getJSON("http://php.oop/api/read_tasks.php?id="+id, function(data){
        empty_div = "<div>There is no tasks</div>";
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

		    read_tasks += "<tr class='task"+val.taskid+"' id='task'>";
		      read_tasks += "<td>" + val.naziv_taska + "</td>";
		      read_tasks += "<td>" + val.prioritet + "</td>";
		      read_tasks += "<td>" + val.rok + "</td>";
		      read_tasks += "<td>" + val.status + "</td>";
		      if (val.status == "zavrseno") {
                read_tasks += "<td>-</td>";
		      }else{
		      	read_tasks += "<td>" + val.datediff + " dana</td>";
		      }
		      
		      read_tasks += "<td><button data-id='"+val.taskid+"' type='button' class=' finish-task btn btn-outline-success'>Finish</button></td>";
		      read_tasks += "<td><button data-id='"+val.taskid+"' type='button' class=' update-task btn btn-outline-primary'>Update</button></td>";
		      read_tasks += "<td><button data-id='"+val.taskid+"' type='button' class=' delete-task btn btn-outline-danger'>Delete</button></td>";
		    read_tasks += "</tr>";
				 
		});
		  read_tasks += "</tbody>";
		read_tasks += "</table>";
		var count = Object.keys(data).length;
		
		if (data[0]['naziv_taska'] == null) {
			$('#tasks').html(empty_div);
		}else{
			$('#tasks').html(read_tasks);
		}

		
	});
}

function readOneTask(taskid)
{	
	$.getJSON("http://php.oop/api/read_task_by_id.php?id="+taskid, function(data){

        var taskid = data[0]['id'];
		var naziv_taska = data[0]['naziv_taska'];
		var prioritet = data[0]['prioritet'];
		var rok = data[0]['rok'];
		var status = data[0]['status'];

		update_form = "";
		    update_form += "<form id='update-task-form' class='table' method='post'>";
		    update_form += "<input type='hidden' name='id' value='"+taskid+"'>";
		    update_form += "<fieldset class='form-group'>";
			update_form += "<label for='naziv_taska'>IME ZADATKA:</label>";
			update_form += "<input type='text' class='form-control' id='naziv_taska' name='naziv_taska' placeholder='Ime zadatka' value='"+naziv_taska+"' required>";
			update_form += "</fieldset>";
			update_form += "<fieldset class='form-group'>";
			update_form += "<label for='naziv_taska'>ROK:</label>";
			update_form += "<input type='date' class='form-control' id='rok' name='rok' placeholder='Rok' value='"+rok+"' required>";
			update_form += "</fieldset>";				
			update_form += "<fieldset class='form-group'>";
			update_form += "<label for='prioritet'>PRIORITET:</label>";
			update_form += "<select id='prioritet' name='prioritet'>";
			$.each(data[1], function(key, val){ 
				if (val.id == prioritet) {
					update_form += "<option value='" + val.id + "' selected>" + val.id + "</option>";	
				}else{
					update_form += "<option value='" + val.id + "'>" + val.id + "</option>";
				}             		    	      	 		      		            		      
			});
			update_form += "</select>";
            update_form += "<fieldset class='form-group'>";
			update_form += "<label for='naziv_taska'>STATUS:</label>";
			update_form += "<select id='status' name='status'>";
			$.each(data[2], function(key, val){ 
				if (val.id == status) {
					update_form += "<option value='" + val.id + "' selected>" + val.id + "</option>";	
				}else{
					update_form += "<option value='" + val.id + "'>" + val.id + "</option>";
				}             		    	      	 		      		            		      
			});
			update_form += "</select>";
			update_form += "<button class='update-task-action btn btn-primary' type='submit' name='update_task' role='button'>Update</button>";
			update_form += "<a class='btn btn-secondary' href='/todos/tasks'>Cancel</a>";
			update_form += "</fieldset>";			
		   update_form += "</form>";
     $('#tasks').html(update_form); 
		   
	});
}

function todoInfo(todoID)
{
	$.getJSON("http://php.oop/api/todo_info.php?id="+todoID, function(data){

		var status = data.status;
		var total = data.total;
		var nedovrseno = data.nedovrseno;
		var dovrseno = parseFloat(data.dovrseno).toFixed(2);

		todo_info = "";
		todo_info += "<div>";
		todo_info += "<span>Ukupno zadataka: "+total+" </span>";
		todo_info += "<span>Zadataka nedovrseno: "+nedovrseno+" </span>";
		if (total == 0) {
			todo_info += "<span> Dovrseno: - % </span>";
		}else{
			todo_info += "<span> Dovrseno: "+dovrseno+" % </span>";
		}
		
		//todo_info += "<p>"++"</p>";
		todo_info += "</div>";
		$('#info').html(todo_info);
		   
	});
}

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
