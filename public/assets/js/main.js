document.cookie.split(";").forEach(function (c) {
  document.cookie = c
    .replace(/^ +/, "")
    .replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
});
$(Document).ready(function () {
  $(".preloader").fadeOut();
  $("body").css({ "overflow-y": "scroll" });
});

$(".header-mobile .mobile-button").click(function () {
  $(".header-mobile .mobile-button i").toggleClass("fa-times");
  $(".side-menu-mobile").toggleClass("active");
});

/* index script */
/*----------------------------------------------------------------*/
// custom isotop srtart
$(".filter button").click(function () {
  var a = $(this).data();
  var b = a.filter;
  var c;
  if (b.charAt(0) == ".") {
    c = b.slice(1);
  } else {
    c = b;
  }
  if (c != "*") {
    $(".single-project").hide();
    $(".projects ." + c).fadeIn(500);
  } else {
    $(".single-project").hide();
    $(".projects " + c).fadeIn(500);
  }
});
/*----------------------------------------------------------------*/
// custom isotop end

/*----------------------------------------------------------------*/
// skills srtart
$(".tool-items").hide();
$(".skill-items").show();
$(".tool-btn a").click(function () {
  var skillbtn = $(this);
  if (!$(this).hasClass("active")) {
    var items = skillbtn[0].className + "-items";
    $(".tool-items").hide();
    $(".skill-items").hide();
    $("." + items).fadeIn(500);

    $(".tool-btn a").removeClass("active");
    $("." + skillbtn[0].className).addClass("active");
  }
});
/*----------------------------------------------------------------*/
// skills end

/* Dashboard script */
/*----------------------------------------------------------------*/
// dashboard srtart
$(".navSwitch").click(function () {
  if ($(".navSwitch i").hasClass("fa-toggle-on")) {
    navmini_off();
  } else {
    navmini_on();
  }
});
$(".mainContainer .content-area:first-child").addClass("active");
$(".nav-list .nav-item:first-child a").addClass("active");

function navmini_on() {
  $(".navbar").removeClass("navbar-small");
  $(".navSwitch i").removeClass("fa-toggle-off");
  $(".navSwitch i").addClass("fa-toggle-on");
  $(".nav-item span").delay(300).fadeIn(500);
  $(".nav-header .company .logo").delay(300).fadeIn(500);
  $(".nav-footer-content").delay(300).fadeIn(500);
}
function navmini_off() {
  $(".navSwitch i").removeClass("fa-toggle-on");
  $(".navSwitch i").addClass("fa-toggle-off");
  $(".nav-item span").fadeOut(0);
  $(".nav-header .company .logo").fadeOut(0);
  $(".nav-footer-content").fadeOut(0);
  $(".navbar").addClass("navbar-small");
}

function menucontent(a) {
  var containers = $(".mainContainer").children();
  for (var i = 0; i < containers.length; i++) {
    if (containers[i].id == a.className) {
      containers.removeClass("active");
      $("#" + containers[i].id).addClass("active");
      $(".nav-list .nav-item a").removeClass("active");
      $("." + a.className).addClass("active");
    }
  }
}
$(".search .search-ico").click(function () {
  var searchbar = $(".search input");
  if (searchbar.hasClass("active")) {
  } else {
    searchbar.addClass("active");
    searchbar.focus();
  }
});
function closeinput() {
  $(".search input").removeClass("active");
}

$(window).on("resize", function () {
  var win = $(this); //this = window
  if (win.width() < 920) {
    navmini_off();
  } else {
    navmini_on();
  }
});

$(".header .profile img").click(function () {
  $(".header .profile .dropdown").slideDown();
});
$(".header .profile .dropdown").mouseleave(function () {
  $(".header .profile .dropdown").slideUp();
});
/*----------------------------------------------------------------*/
// dashboard end

/* signin script */
/*----------------------------------------------------------------*/
// signin srtart
/* form submittion*/
$(function () {
  $("#signin-form").on("submit", function (e) {
    e.preventDefault();
    var formData = $("#signin-form").serialize();
    $(".login-box :input").each(function () {
      $(this).css({ outline: "-webkit-focus-ring-color auto 0px" });
      if ($(this).val() === "") {
        $(this).css({
          outline: "-webkit-focus-ring-color auto 1px",
          "outline-color": "#ff7979",
        });
      }
    });

    var email = $('#signin-form input[type="email"]').val().trim();
    var pass = $('#signin-form input[type="password"]').val().trim();
    if (email && pass) {
      $.ajax({
        type: "post",
        url: "signinaction",
        data: formData,
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.errorMessage != "") {
              $("#errorMessage").text(data.errorMessage);
              $("#errorMessage").addClass("active");
              $("#errorMessage").click(function () {
                $(this).removeClass("active");
              });
            }
            if (data.successMessage) {
              window.location = "/dashboard";
            }
          }
        },
      });
    }
  });
});
/*----------------------------------------------------------------*/
// signin end

$(".scrallup").on("click", function () {
  var y = $(window).scrollTop(); // current page position
  $(window).scrollTop(0); // scroll up 150px
});

// send contact message

$(function () {
  $("#contact-form").on("submit", function (e) {
    e.preventDefault();
    var contactFormData = $("#contact-form").serialize();
    function contactFormValidation(con) {
        var contact_name = $('#contact-form #contact-name');
        var contact_email = $('#contact-form #contact-email');
        var contact_phone = $('#contact-form #contact-phone');
        var contact_message = $('#contact-form #contact-message');
        if(con == 'validate'){
          if(contact_name.val() != '' && contact_email.val() != ''  && contact_phone.val() != ''  && contact_message.val() != '' ){
              return true;
          }else{
            $('#contact-form-message').addClass('errorMessageBox');
            $('#contact-form-message  .message').text('All Fild Are Required');
          }
        }

        if(con == 'clean'){
          contact_name.val('');
          contact_email.val('');
          contact_phone.val('');
          contact_message.val('');
        }
        return false;
    }
    console.log(contactFormData);
    if (contactFormValidation('validate')) {
      $.ajax({
        type: "post",
        url: "contactaction",
        data: contactFormData,
        dataType: "json",
        success: function (data) {
            console.log(data);
          if (data != '') {
              if (data.success) {
                $('#contact-form-message').addClass('successMessageBox');
                $('#contact-form-message .message').text('message sent successfully');
                contactFormValidation('clean');
              }
              if(data.error){
                $('#contact-form-message').addClass('errorMessageBox');
                $('#contact-form-message  .message').text('message not sent');
              }
          }
        },
      });
    }
  });
});

$('.messageBox .messageclose').click(function () {
  $('.messageBox').removeClass('successMessageBox');
  $('.messageBox').removeClass('errorMessageBox');
});