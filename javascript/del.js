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
    $(document).on("click","#delbutton",function(){// on clicking delbutton add_box is shown
        $("#del_box").slideDown(250);
    });

    $("#close-btn2").on("click",function(){
        $("#del_box").slideUp(250);
    });

      $("#del").on("click",function(e){
            e.preventDefault();
            var id = $("#ID").val();
            var pass = $("#password").val();
            if(id =="" || pass ==""){
                $("#del_candidate").trigger("reset");
                $("#del_box").hide();
                $("#errmess").html("All fields are required.").slideDown().delay(1000).slideUp();
            }else{
                if(pass == "12345"){
                    if(confirm("Do you really want to delete it?")){
                        $.ajax({
                            url : "../sql_queris/delete.php",
                            type : "post",
                            data : {ID:id},
                            success : function(data){
                                if(data==1){                                    
                                    $("#del_box").hide();
                                    loadTable();
                                    $("#del_candidate").trigger("reset");
                                    $("#sucmess").html("Candidate Deleted Sucessfully").slideDown().delay(1000).slideUp();
                                }else{
                                    $("#errmess").html("Can't Delete Candidate").slideDown().delay(1000).slideUp();
                                }
                            }
                        });
                    }
                }else{
                    $("#del_candidate").trigger("reset");
                    $("#del_box").hide();
                    $("#errmess").html("Wrong Password").slideDown().delay(1000).slideUp();
                    
                }
            }
        });

});