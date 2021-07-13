$(document).ready(function(){
    //LOAD TABLE USING AJAX
    function loadTable(){
        $.ajax({ 
            url : "../sql_queris/ajax-load.php",
            type : "POST",
            success : function(data){
                $("#data-table").html(data);
            }
        });
    }
    // ON CLICKING ADD BOX APPEARS 
    $(document).on("click","#addbutton",function(){
        $("#add_box").slideDown(250);               
    });

     // close button
    $("#close-btn").on("click",function(){
        $("#add_box").slideUp(250);
      });
    // ON CLICKING ADDING PROCESS STARTS
    $("#add").on("click",function(e){
        //DISABLES #add BUTTON
        e.preventDefault();

        var name = $("#name").val();
        var party = $("#party").val();
        if(name==""){
            alert("name cant b empty")
        }else{
               $.ajax({
                url : "../sql_queris/add.php",
                type: "post",
                data: {Name:name,Party:party},
                success : function(data){
                    if(data==1){
                        $("#add_box").hide();
                        loadTable();
                        $("#add_candidate").trigger("reset");
                        $("#sucmess").html("Candidate Added Sucessfully").slideDown().delay(1000).slideUp();
                    }else{
                        $("#add_candidate").trigger("reset");
                        $("#errmess").html("Can't Add Candidate").slideDown().delay(1000).slideUp();
                    }
                }

            });
        }
    });
    
});