$(document).ready(function () {
    var protocol=location.protocol;
    var slashes=protocol.concat("//");
    var host=slashes.concat(window.location.hostname);
    var url_login_fenix=host+"/siscar/verificarLogin";
    var url_base =host+"/siscar";
    var url_skin_config=host+"/siscar/assets/js/skin-config.html";
    $('#side-menu').metisMenu();
    $('.collapse-link:not(.binded)').addClass("binded").click( function() {
        var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        var content = ibox.find('div.ibox-content');
        content.slideToggle(200);
        button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        ibox.toggleClass('').toggleClass('border-bottom');
        setTimeout(function () {
            ibox.resize();
            ibox.find('[id^=map-]').resize();
        }, 50);
    });
    $('.close-link:not(.binded)').addClass("binded").click( function() {
        var content = $(this).closest('div.ibox');
        content.remove();
    });
    $('.check-link:not(.binded)').addClass("binded").click( function(){
        var button = $(this).find('i');
        var label = $(this).next('span');
        button.toggleClass('fa-check-square').toggleClass('fa-square-o');
        label.toggleClass('todo-completed');    
        return false;
    });
    $('.navbar-minimalize:not(.binded)').addClass("binded").click(function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    })
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    $('.modal').appendTo("body")
    function fix_height() {
        var heightWithoutNavbar = $("body > #wrapper").height() - 61;
        $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");
    }
    fix_height();
    $(window).bind("load", function() {
           if($("body").hasClass('fixed-sidebar')) {
                $('.sidebar-collapse').slimScroll({
                    height: '100%',
                    railOpacity: 0.9,
                });
            }
        })
    $(window).bind("load resize click scroll", function() {
        if(!$("body").hasClass('body-small')) {
            fix_height();
        }
    })
    $("[data-toggle=popover]")
        .popover();
});
window.animationHover = function(element, animation){
    element = $(element);
    element.hover(
        function() {
            element.addClass('animated ' + animation);
        },
        function(){
            window.setTimeout( function(){
                element.removeClass('animated ' + animation);
            }, 2000);
        });
};
$(function() {
    $(window).bind("load resize", function() {
        if ($(this).width() < 769) {
            $('body').addClass('body-small')
        } else {
            $('body').removeClass('body-small')
        }
    })
})
window.SmoothlyMenu = function() {
    if (!$('body').hasClass('mini-navbar') || $('body').hasClass('body-small')) {
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 100);
    } else if ($('body').hasClass('fixed-sidebar')){
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 300);
    } else {
        $('#side-menu').removeAttr('style');
    }
};
window.WinMove = function() {
    var element = "[class*=col]";
    var handle = ".ibox-title";
    var connect = "[class*=col]";
    $(element).sortable(
        {
            handle: handle,
            connectWith: connect,
            tolerance: 'pointer',
            forcePlaceholderSize: true,
            opacity: 0.8,
        })
        .disableSelection();
};