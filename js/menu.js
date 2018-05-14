
$('#menu-oculto').on("click", function() {
    alert( "Handler for .click() called." );
    $(this).hide();
    $('#index-menu').show();
});

$('#boton-menu').on("click", function() {
    alert( "Handler for .click() called." );
    $('#index-menu').hide();
    $('#menu-oculto').show();
});

/*
function ocultar() {
    $("#index-menu").hide();
    $("#menu-oculto").show();
}

function mostrar() {
    $("#menu-oculto").hide();
    $("#index-menu").show();
}*/
