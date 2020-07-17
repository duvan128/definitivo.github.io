$(document).ready(function(){
$('#formularioCovid').submit(function(){
$('#loading').css("display", "block");
var url = "forms/contact.php";
$.ajax({
   type: "POST",
   url: url,
   data: $("#formularioCovid").serialize(),
   success: function(data)
   {

     //var data = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>XD!</strong> xD.<button type="button" class="close" data-dismiss="alert" aria-label="Close">  <span aria-hidden="true">&times;</span></button></div>';
     $('#loading').css("display", "none");
     $('#respCovid').html(data);
     document.getElementById("formularioCovid").reset();
     setTimeout('document.location.reload()',7000);
   }
});
return false;
});
});
