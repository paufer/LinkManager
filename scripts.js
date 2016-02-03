$(document).ready(function(e) {
$("#linkAddForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});

});
function submitForm(){
    var data = $("#linkAddForm").serialize();
    console.log(data); 
    $.ajax({
        type: "POST",
        url: "php/process_links.php",
        data: data,
        success : function(text){
            console.log("Enviado Correctamente!");
            formSuccess();
        },        
      error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
      }
    });
}
function formSuccess(){     
    /*$("#alert-box-success").removeClass("hidden");
    $("#alert-box-success").fadeIn();*/
    location.reload();
    
    
}