
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

		    read_tasks += "<tr id='task'>";
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
		var count = Object.keys(data).length;
		
		if (data[0]['naziv_taska'] == null) {
			$('#test').html(empty_div);
		}else{
			$('#test').html(read_tasks);
		}
				
		//console.log(data[0]['naziv_taska']);
		
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

update_form = "";
		update_form = "<form id='create-task-form' class='bg-info table form-inline' method='post'>";
			update_form = "<fieldset class='form-group'>";
			update_form = "<label for='naziv_taska'>IME ZADATKA:</label>";
			update_form = "<input type='text' class='form-control' id='naziv_taska' name='naziv_taska' placeholder='Ime zadatka' value='jeee' required>";
			update_form = "</fieldset>";

		    update_form = "<fieldset class='form-group'>";
			update_form = "<label for='prioritet'>PRIORITET:</label>";
			update_form = "<select id='prioritet' name='prioritet'>"
			update_form = "<option value='low'>low</option>";
			update_form = "<option value='norma'l>normal</option>",
			update_form = "<option value='high'>high</option>";
			update_form = "</select>";
			update_form = "</fieldset>";
		update_form = "</form>";