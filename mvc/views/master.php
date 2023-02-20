<!DOCTYPE html>
<html>

<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/jpg" href="<?php echo 'http://localhost/khvetsiemreap/public/images/logo/khvetsiemreap2.jpg' ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script type="text/javascript" src="./public/js/Home.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Moul">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Khmer&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b4229f31f6.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
</head>

<body>
  <?php require_once "./mvc/views/pages/" . $data["Page"] . ".php" ?>
</body>

<script>
  $('.toggle').click(function() {

    // $('.sidebar-1').toggleClass("closed");
    // $('.sidebar-2').toggleClass("change");
    // $('.link_name').toggleClass('hide');

    var x = document.getElementById("logo1");

    if (x.style.display === "none") {
      localStorage.setItem("tgl-bar",320);

      $('.sidebar-1').addClass("closed");
      $('.sidebar-2').addClass("change");
      $('.link_name').removeClass('hide');

      x.style.display = "block";
      $('#logo2').hide();

      
    } else {
      localStorage.setItem("tgl-bar",72);

      $('.sidebar-1').removeClass("closed");
      $('.sidebar-2').removeClass("change");
      $('.link_name').addClass('hide');

      x.style.display = "none";
      $('#logo2').show();

    }

    // side menu
    let url = window.location.href;
    $('.list .link-href').each(function() {
      if (this.href === url) {
        $(this).closest('.list .link-href').toggleClass('actived');
      }
    });

  });
</script>
<script>
  $(function() {
    var menu_items = $("#menu-items"),
      arrows = $(".arrow"),
      menu_wrapper = $("#menu-wrapper").scroll(function() {
        //check edges
        // handle left arrow
        if (this.scrollLeft > 0) {
          arrows.filter(".left").addClass("visible");
        } else {
          arrows.filter(".left").removeClass("visible");
        }

        // handle right arrow
        if (menu_items.outerWidth() - this.scrollLeft > menu_wrapper.width()) {
          arrows.filter(".right").addClass("visible");
        } else {
          arrows.filter(".right").removeClass("visible");
        }
      });
    //-------#1 click btn scroll left-------//
    arrows.on("click", function() {
      if ($(this).is(".left")) {
        var div = document.querySelector("#menu-wrapper");
        div.classList.add("smooth");
        menu_wrapper[0].scrollLeft -= 300;
      } else {
        var div = document.querySelector("#menu-wrapper");
        div.classList.add("smooth");
        menu_wrapper[0].scrollLeft += 300;
      }
      return false;
    });
    // initialize
    menu_wrapper.trigger("scroll");
  });

  //-------mousewheel-------//
  const element = document.querySelector("#menu-wrapper");
  element.addEventListener("wheel", (event) => {
    event.preventDefault();

    element.scrollBy({
      left: event.deltaY < 0 ? -30 : 30,
    });
  });
  //-------click and drag-------//
  const slider = document.querySelector("#menu-wrapper");
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener("mousedown", (e) => {
    slider.classList.remove("smooth");
    isDown = true;

    startX = e.pageX;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener("mouseleave", () => {
    slider.classList.remove("smooth");
    isDown = false;
  });

  slider.addEventListener("mouseup", () => {
    slider.classList.remove("smooth");
    isDown = false;
  });

  slider.addEventListener("mousemove", (e) => {
    slider.classList.remove("smooth");
    if (!isDown) return; // stop the fn from running
    e.preventDefault();

    slider.scrollLeft = scrollLeft - (e.pageX - startX) * 1;
  });
  // product menu
  var selector = '.item span';
  $(selector).on('click', function() {
    $(selector).removeClass('bg3 cl');
    $(this).addClass('bg3 cl');

  });
  var sessionid = "<?php echo $_SESSION['id'] ?> ";
</script>

</html>