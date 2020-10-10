

$(function() {
   $('.fantasma').change(function() {
      if (!$(this).prop('checked')) {
         $('#formaLicencia').hide();
         $('#formaIne').show();
      } else {
         $('#formaLicencia').show();
         $('#formaIne').hide();
      }

   })

})
