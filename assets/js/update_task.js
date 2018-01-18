
$(document).ready(function(){

	$(document).on('click', '.update-task', function(){
		var taskid = $(this).attr('data-id');
        console.log(taskid);

        $.getJSON("http://php.oop/api/read_task_by_id.php?id=" + taskid, function(data){
            var naziv_taska = data.naziv_taska;
		    var prioritet = data.prioritet;
		    var rok = data.rok;
		    var status = data.status     
        });	    
	})
});
/*
$.getJSON("http://php.oop/api/read_task_by_id.php?id=" + taskid, function(data){

		    /*var naziv_taska = data.naziv_taska;
		    var prioritet = data.prioritet;
		    var rok = data.rok;
		    var status = data.status;*/
            /*some_var = "<p>fgfgg</p>";
		    update_form = "";
		    update_form += "<form id='create-task-form' class='bg-info table form-inline' method='post'>";

				$.each(data, function(key, val){   
				    update_form += "<fieldset class='form-group'>";
					update_form += "<label for='naziv_taska'>IME ZADATKA:</label>";
					update_form += "<input type='text' class='form-control' id='naziv_taska' name='naziv_taska' placeholder='Ime zadatka' value='gfgfgf' required>";
					update_form += "</fieldset>";
				});

			update_form += "<fieldset class='form-group'>";
				update_form += "<label for='prioritet'>PRIORITET:</label>";
				update_form += "<select id='prioritet' name='prioritet'>"
				update_form += "<option value='low'>low</option>";
				update_form += "<option value='norma'l>normal</option>",
				update_form += "<option value='high'>high</option>";
				update_form += "</select>";
			update_form += "</fieldset>";
		   update_form += "</form>";

		   $('#test2').html(some_var);	

/*
$(document).ready(function(){

	var id = $("#todo").attr("data-id");

	

	$(document).on('click', '.update-task', function(){
		$("#todo").html(update_form);
	});

	$(document).on('submit', '#update-task-form', function(){

        var form_data=JSON.stringify($(this).serializeObject());
        console.log(form_data);

		$.ajax({
		  method: "POST",
		  url: "http://php.oop/api/update_task.php",
		  dataType : 'json',
		  contentType : 'application/json',
		  data : form_data
		}).done(function(msg){
		  alert("Success");
		  //showTasks(id);
		}).fail(function(msg){
		  alert("Error" + msg);
		}).always(function(msg) {
		  alert("Complete" + msg);
		  //showTasks(id);
		});
		 
		return false;
	});

});*/