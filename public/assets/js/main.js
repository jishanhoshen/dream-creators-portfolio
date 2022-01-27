/* index script */
/*----------------------------------------------------------------*/
// custom isotop srtart
$('.filter button').click(function () {
    var a = $(this).data();
    var b = a.filter;
    var c;
    if (b.charAt(0) == '.') {
        c = b.slice(1);
    }else{
        c = b;
    }
    if (c != '*') {
        $(".single-project").hide();
        $('.projects .' + c).fadeIn(500);
    } else {
        $(".single-project").hide();
        $('.projects ' + c).fadeIn(500);
    }
});
/*----------------------------------------------------------------*/
// custom isotop end

/*----------------------------------------------------------------*/
// skills srtart
$('.tool-items').hide();
$('.skill-items').show();
$('.tool-btn a').click(function () {
    var skillbtn = $(this);

    var items = skillbtn[0].className + '-items';
    $('.tool-items').hide();
    $('.skill-items').hide();
    $('.' + items).fadeIn(500);

    $('.tool-btn a').removeClass('active');
    $('.' + skillbtn[0].className).addClass('active');
});
/*----------------------------------------------------------------*/
// skills end



/* Dashboard script */
/*----------------------------------------------------------------*/
// dashboard srtart
$('.navSwitch').click(function () {
    if ($('.navSwitch i').hasClass('fa-toggle-on')) {
        navmini_off();
    } else {

        navmini_on();
    }
});
$('.mainContainer .content-area:first-child').addClass('active');
$('.nav-list .nav-item:first-child a').addClass('active');

function navmini_on() {
    $('.navbar').removeClass('navbar-small');
    $('.navSwitch i').removeClass('fa-toggle-off');
    $('.navSwitch i').addClass('fa-toggle-on');
    $('.nav-item span').delay(300).fadeIn(500);
    $('.nav-header .company .logo').delay(300).fadeIn(500);
    $('.nav-footer-content').delay(300).fadeIn(500);
}
function navmini_off() {
    $('.navSwitch i').removeClass('fa-toggle-on');
    $('.navSwitch i').addClass('fa-toggle-off');
    $('.nav-item span').fadeOut(0);
    $('.nav-header .company .logo').fadeOut(0);
    $('.nav-footer-content').fadeOut(0);
    $('.navbar').addClass('navbar-small');
}

function menucontent(a) {
    var containers = $('.mainContainer').children();
    for (var i = 0; i < containers.length; i++) {
        if (containers[i].id == a.className) {
            containers.removeClass('active');
            $('#' + containers[i].id).addClass('active');
            $('.nav-list .nav-item a').removeClass('active');
            $('.' + a.className).addClass('active');
        }
    }
}
$('.search .search-ico').click(function () {
    var searchbar = $('.search input');
    if (searchbar.hasClass('active')) {

    } else {
        searchbar.addClass('active');
        searchbar.focus();
        console.log(searchbar);
    }
});
function closeinput() {
    $('.search input').removeClass('active');
}

$(window).on('resize', function () {
    var win = $(this); //this = window
    if (win.width() < 920) {
        navmini_off();
    } else {
        navmini_on();
    }
});

$('.header .profile img').click(function () {
    $('.header .profile .dropdown').slideDown();
});
$('.header .profile .dropdown').mouseleave(function () {
    $('.header .profile .dropdown').slideUp();
});
/*----------------------------------------------------------------*/
// dashboard end