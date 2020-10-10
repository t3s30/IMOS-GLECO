function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var select = document.getElementById("reactivos");
    var archivo = document.getElementById("archivo");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
      console.log("Hello world!");

       select.style.display = "block";
       archivo.style.display = "block";
    } else {
      console.log('OFF');
       select.style.display = "none";
       archivo.style.display = "none";
    }
 }