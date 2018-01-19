
$(document).ready(function(){
	var id = $("#todo").attr("data-id");
//setInterval(function(){ showTasks(); }, 3000);
    showTasks(id);  
    todoInfo(id);
    
});