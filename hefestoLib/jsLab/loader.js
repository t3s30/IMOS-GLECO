$(document).ready(function(){
    // Initialize submitted with false
    var submitted = false;
    var form=$("#ratings");
    $("#submit_form").click(function(){
        $('#loading').show();
        // Form is submitted.
        if(!submitted)
        {
            // Submitting the form using ajax.
            $.ajax({
                type:"POST",
                url:form.attr("action"),
                data:$("#ratings input").serialize(),//only input
                success: function(response, status){
                    if(status=="success")
                    {
                        submitted = false;
                        $("#display").html("Submitted");
                    }
                }
            });
        }

        if(!submitted)
            submitted= true;
    });
});
