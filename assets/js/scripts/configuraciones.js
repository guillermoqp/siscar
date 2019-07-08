var localStorage = window.localStorage ;
var sessionStorage = window.sessionStorage;
$('#fixednavbar').click(function (){
    if ($('#fixednavbar').is(':checked')){
        $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
        $("body").removeClass('boxed-layout');
        $("body").addClass('fixed-nav');
        $('#boxedlayout').prop('checked', false);
        if (localStorage || sessionStorage){
            localStorage.setItem("boxedlayout",'off');
            sessionStorage.setItem("boxedlayout",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar",'on');
            sessionStorage.setItem("fixednavbar",'on');
        }
    } else{
        $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
        $("body").removeClass('fixed-nav');
        $("body").removeClass('fixed-nav-basic');
        $('#fixednavbar2').prop('checked', false);
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar",'off');
            sessionStorage.setItem("fixednavbar",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar2",'off');
            sessionStorage.setItem("fixednavbar2",'off');
        }
    }
});
$('#fixednavbar2').click(function (){
    if ($('#fixednavbar2').is(':checked')){
        $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
        $("body").removeClass('boxed-layout');
        $("body").addClass('fixed-nav').addClass('fixed-nav-basic');
        $('#boxedlayout').prop('checked', false);
        if (localStorage || sessionStorage){
            localStorage.setItem("boxedlayout",'off');
            sessionStorage.setItem("boxedlayout",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar2",'on');
            sessionStorage.setItem("fixednavbar2",'on');
        }
    } else {
        $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
        $("body").removeClass('fixed-nav').removeClass('fixed-nav-basic');
        $('#fixednavbar').prop('checked', false);
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar2",'off');
            sessionStorage.setItem("fixednavbar2",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar",'off');
            sessionStorage.setItem("fixednavbar",'off');
        }
    }
});
$('#fixedsidebar').click(function (){
    if ($('#fixedsidebar').is(':checked')){
        $("body").addClass('fixed-sidebar');
        $('.sidebar-collapse').slimScroll({
            height: '100%',
            railOpacity: 0.9
        });
        if (localStorage || sessionStorage){
            localStorage.setItem("fixedsidebar",'on');
            sessionStorage.setItem("fixedsidebar",'on');
        }
    } else{
        $('.sidebar-collapse').slimscroll({destroy: true});
        $('.sidebar-collapse').attr('style', '');
        $("body").removeClass('fixed-sidebar');
        if (localStorage || sessionStorage){
            localStorage.setItem("fixedsidebar",'off');
            sessionStorage.setItem("fixedsidebar",'off');
        }
    }
});
$('#collapsemenu').click(function (){
    if ($('#collapsemenu').is(':checked')){
        $("body").addClass('mini-navbar');
        SmoothlyMenu();
        if (localStorage || sessionStorage){
            localStorage.setItem("collapse_menu",'on');
            sessionStorage.setItem("collapse_menu",'on');
        }
    } else{
        $("body").removeClass('mini-navbar');
        SmoothlyMenu();
        if (localStorage || sessionStorage){
            localStorage.setItem("collapse_menu",'off');
            sessionStorage.setItem("collapse_menu",'off');
        }
    }
});
$('#boxedlayout').click(function (){
    if ($('#boxedlayout').is(':checked')){
        $("body").addClass('boxed-layout');
        $('#fixednavbar').prop('checked', false);
        $('#fixednavbar2').prop('checked', false);
        $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
        $("body").removeClass('fixed-nav');
        $("body").removeClass('fixed-nav-basic');
        $(".footer").removeClass('fixed');
        $('#fixedfooter').prop('checked', false);
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar",'off');
            sessionStorage.setItem("fixednavbar",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixednavbar2",'off');
            sessionStorage.setItem("fixednavbar2",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixedfooter",'off');
            sessionStorage.setItem("fixedfooter",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("boxedlayout",'on');
            sessionStorage.setItem("boxedlayout",'on');
        }
    } else{
        $("body").removeClass('boxed-layout');
        if (localStorage || sessionStorage){
            localStorage.setItem("boxedlayout",'off');
            sessionStorage.setItem("boxedlayout",'off');
        }
    }
});
$('#fixedfooter').click(function (){
    if ($('#fixedfooter').is(':checked')){
        $('#boxedlayout').prop('checked', false);
        $("body").removeClass('boxed-layout');
        $(".footer").addClass('fixed');
        if (localStorage || sessionStorage){
            localStorage.setItem("boxedlayout",'off');
            sessionStorage.setItem("boxedlayout",'off');
        }
        if (localStorage || sessionStorage){
            localStorage.setItem("fixedfooter",'on');
            sessionStorage.setItem("fixedfooter",'on');
        }
    } else{
        $(".footer").removeClass('fixed');
        if (localStorage || sessionStorage){
            localStorage.setItem("fixedfooter",'off');
            sessionStorage.setItem("fixedfooter",'off');
        }
    }
});
$('.spin-icon').click(function (){
    $(".theme-config-box").toggleClass("show");
});
$('.s-skin-0').click(function (){
    $("body").removeClass("skin-1");
    $("body").removeClass("skin-2");
    $("body").removeClass("skin-3");
});
$('.s-skin-1').click(function (){
    $("body").removeClass("skin-2");
    $("body").removeClass("skin-3");
    $("body").addClass("skin-1");
});
$('.s-skin-2').click(function (){
    $("body").removeClass("skin-1");
    $("body").removeClass("skin-3");
    $("body").addClass("skin-2");
});
$('.s-skin-3').click(function (){
    $("body").removeClass("skin-1");
    $("body").removeClass("skin-2");
    $("body").addClass("skin-3");
});
if (localStorage || sessionStorage){
    var collapse = (localStorage) ? localStorage.getItem("collapse_menu") : sessionStorage.getItem("collapse_menu") ;
    var fixedsidebar = (localStorage) ? localStorage.getItem("fixedsidebar") : sessionStorage.getItem("fixedsidebar") ;
    var fixednavbar = (localStorage) ? localStorage.getItem("fixednavbar") : sessionStorage.getItem("fixednavbar") ;
    var fixednavbar2 = (localStorage) ? localStorage.getItem("fixednavbar2") : sessionStorage.getItem("fixednavbar2");
    var boxedlayout = (localStorage) ? localStorage.getItem("boxedlayout") : sessionStorage.getItem("boxedlayout");
    var fixedfooter = (localStorage) ? localStorage.getItem("fixedfooter") : sessionStorage.getItem("fixedfooter");
    if (collapse == 'on'){
        $('#collapsemenu').prop('checked','checked');
    }
    if (fixedsidebar == 'on'){
        $('#fixedsidebar').prop('checked','checked');
    }
    if (fixednavbar == 'on'){
        $('#fixednavbar').prop('checked','checked');
    }
    if (fixednavbar2 == 'on'){
        $('#fixednavbar2').prop('checked','checked');
    }
    if (boxedlayout == 'on'){
        $('#boxedlayout').prop('checked','checked');
    }
    if (fixedfooter == 'on') {
        $('#fixedfooter').prop('checked','checked');
    }
}
