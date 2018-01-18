

$(document).ready(function(){

	        update_form = "";
		    update_form += "<form id='create-task-form' class='bg-info table form-inline' method='post'>";
			update_form += "<fieldset class='form-group'>";
			update_form += "<label for='naziv_taska'>IME ZADATKA:</label>";
			update_form += "<input type='text' class='form-control' id='naziv_taska' name='naziv_taska' placeholder='Ime zadatka' value='jeee' required>";
			update_form += "</fieldset>";

		    update_form += "<fieldset class='form-group'>";
			update_form += "<label for='prioritet'>PRIORITET:</label>";
			update_form += "<select id='prioritet' name='prioritet'>"
			update_form += "<option value='low'>low</option>";
			update_form += "<option value='norma'l>normal</option>",
			update_form += "<option value='high'>high</option>";
			update_form += "</select>";
			update_form += "</fieldset>";
		    update_form += "</form>";

    $(document).on('click', '.update-task', function(){
		var taskid = $(this).attr('data-id');
		console.log(taskid);
		// read one record based on given product id
		$.getJSON("http://php.oop/api/read_task_by_id.php?id=" + taskid, function(data){

		    // values will be used to fill out our form
		    var naziv_taska = data[0]['naziv_taska'];
		    var prioritet = data.prioritet;
		    var rok = data.rok;
		    var status = data.status;
		    
		    // load list of categories will be here
		    // load list of categories
	
		});

		$('#test2').html(update_form);
    });
     
    // 'update product form' submit handle will be here
    // will run if 'create product' form was submitted
	$(document).on('submit', '#update-product-form', function(){
	     
	    // get form data will be here
	    // get form data
		var form_data=JSON.stringify($(this).serializeObject()); 

		// submit form data to api
		$.ajax({
		    url: "http://localhost:8080/api/product/update.php",
		    type : "POST",
		    contentType : 'application/json',
		    data : form_data,
		    success : function(result) {
		        // product was created, go back to products list
		        showProducts();
		    },
		    error: function(xhr, resp, text) {
		        // show error to console
		        console.log(xhr, resp, text);
		    }
		});
			     
	    return false;
	});

});
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