
$(document).ready(function(){
    $(document).on("click","#regebutton",function(){
       $("#reg_box").slideDown(250);
    });

    // close button
    $("#close-btn3").on("click",function(){
        $("#reg_box").slideUp(250);
    });

    $("#pas").on("click",function(e){
        e.preventDefault();
        var Email = $("#email").val();
        if(email == ""){
            $("#reg_candidate").trigger("reset");
            $("#reg_box").hide();
            $("#errmess").html("All fields are required.").slideDown().delay(1000).slideUp();
        }else{
            $.ajax({
                url: "../sql_queris/isPresent.php",
                type: "post",
                data: { email:Email },
                success : function(data){
                    if(data==0){
                        //register email
                        $.ajax({
                            url : "../sql_queris/registration.php",
                            type : "post",
                            data :{email:Email},
                            success : function(data2){
                                if(data2==0){

                                    $("#reg_box").hide();
                                    $("#reg_candidate").trigger("reset");
                                    $("#errmess").html("cant send email").slideDown().delay(1000).slideUp();

                                }else{
                                   alert("Password sent on email");
                                   $("#reg_box").hide();
                                   $("#reg_candidate").trigger("reset");
                                }
                            }
                        });
                    }else{
                        //email already registered
                        $("#reg_box").hide();
                        $("#reg_candidate").trigger("reset");
                        $("#errmess").html("email already registered").slideDown().delay(1000).slideUp();
                    }
                }
            });
        }

    });



});