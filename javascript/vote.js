$(document).ready(function(){
    function loadTable(){
        $.ajax({ 
            url : "../sql_queris/ajax-load.php",
            type : "POST",
            success : function(data_table){
                $("#data-table").html(data_table);
            }
        });
    }
    $(document).on("click","#href",function(){
        $("#vote_box").slideUp(250);
        $("#reg_box").slideDown(250);
    });
    $(document).on("click","#votebutton",function(){// on clicking addbutton add_box is shown
        $("#vote_box").slideDown(250);               
    });

     // close button
    $("#close-btn4").on("click",function(){
        $("#vote_box").slideUp(250);
    });

    $("#vote").on("click",function(e){
        e.preventDefault();
        var id = $("#id_name").val();
        var Email = $("#registered_email").val();
        var Password = $("#registered_password").val();
        //if alredy voted
        if( id == "" || Email == "" || Password == "" ){
            $("#vote_box").hide();
            $("#errmess").html("All fields are required.").slideDown().delay(1000).slideUp();
        }else{
            $.ajax({
                url: "../sql_queris/if_already_voted.php",
                type: "post",
                data: {email:Email},
                success: function(voted_data){
                    if(voted_data==1){
                        $("#vote_box").hide();
                        $("#vote_candidate").trigger("reset");
                        $("#errmess").html("Already voted!").slideDown().delay(1000).slideUp();
                    }else{
                        // check if email registered
                        $.ajax({
                            url:"../sql_queris/isPresent.php",
                            type: "post",
                            data: {email:Email},
                            success : function(check_email){
                                if(check_email==1){
                                    //proceed voting

                                    $.ajax({
                                        url: "../sql_queris/vote.php",
                                        type: "post",
                                        data: {ID:id,password:Password,email:Email},
                                        success : function(data0){
                                            if(data0==1){
                                                //voting done
                                                $("#vote_box").hide();
                                                $("#vote_candidate").trigger("reset");
                                                $("#sucmess").html("voted sycessfully").slideDown().delay(1000).slideUp();
                                                loadTable();


                                            }else{
                                                $("#vote_box").hide();
                                                $("#errmess").html("incorect email or password").slideDown().delay(1000).slideUp();
                                                loadTable();
                                            }
                                        }
                                    });


                                }else{
                                    $("#vote_box").hide();
                                    $("#vote_candidate").trigger("reset");
                                    $("#errmess").html("Email not registered").slideDown().delay(1000).slideUp();
                                }
                            }

                        });
                    }
                }
            });
        }

    });
});