$(document).ready(function(){
    // User_menu show/hide submenu
    $("#user_menu .with_sub").hover(function(){
        $(this).find("ul").show();
    },
    function(){
        $(this).find("ul").hide();
    });

    // Open login box in situ
    $('#login_open').click(function(e) {
        e.preventDefault();
        $('#login').slideToggle('slow', function(){});
    });

    

    // Show advanced search in internal pages
    $("#expand_advanced").click(function(e){
        e.preventDefault();
        $(".search .extras").slideToggle();
    });

    // Show/hide Report as
    $("#report").hover(function(){
        $(this).find("span").show();
    },
    function(){
        $(this).find("span").hide();
    });

    // Hide login box
    $('html').click(function() {
        $('#login').hide();
    });
    $('#login,#login_open').click(function(event){
        event.stopPropagation();
    });
});