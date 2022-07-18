$(function() {
    $(".menu").click(function() {
      if ($("#navigation").hasClass("hidden")) {
        $("#navigation").attr("class", "visible animated slideInLeft");
      } else {
        $("#navigation").attr("class", "hidden animated slideOutLeft");
      }
      $(this).toggleClass("open");
    });
  

  
    $(document).keyup(function(e) {
      if (e.keyCode == 27) {
        if ($("#navigation").hasClass("visible")) {
          $(".menu").toggleClass("open");
        } else {
        }
        $("#navigation").attr("class", "slideOutLeft hidden");
      }
    });
  });



  