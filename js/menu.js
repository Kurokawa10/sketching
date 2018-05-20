

$(function(){
    $('#menu-oculto').on("click", function() {
        $(this).hide();
        $('#index-menu').show();
        $('#colmenu').height('95%').width('9%');
        $('.columnaMain').width('72%');
    });

    $('#boton-menu').on("click", function() {
        $('.columnaMain').width('87%');
        $('#index-menu').hide();
        $('#colmenu').height('0%').width('90%');
        $('#menu-oculto').show().css({"padding-top":"10px","padding-left":"10px"});

    });// end of document ready
})(jQuery); // end of jQuery name space
