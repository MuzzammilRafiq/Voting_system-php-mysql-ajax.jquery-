$(document).ready(function(){
    function loadTable(){
        $.ajax({ 
            url : "../sql_queris/ajax-load.php",
            type : "POST",
            success : function(data){
                $("#data-table").html(data);
            }
        });
    }
    loadTable();
});