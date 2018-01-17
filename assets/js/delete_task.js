
$(document).ready(function(){

	var id = $("#todo").attr("data-id");
    
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
		  showTasks(id);
		}).fail(function(msg){
		  //alert("Error" + msg);
		}).always(function(msg) {
		  //lert("Complete" + msg);
		  showTasks(id);
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