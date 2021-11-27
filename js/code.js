$(document).ready(function() {
    $(".evento-individual").click(function() {
        document.getElementsByClassName("modalmask")[0].style.opacity = 1
        document.getElementsByClassName("modalmask")[0].style.pointerEvents = "auto"
        document.getElementsByTagName("html")[0].style.overflow = "hidden"
        var var1 = $(this).attr('data-id');
        var var2 = $(this).attr('data-nombre');
        $("#nom-even-modal").text("Registarse para " + var2);
    });


    $(".cerrar").click(function() {
        document.getElementsByClassName("modalmask")[0].style.opacity = 0
        document.getElementsByClassName("modalmask")[0].style.pointerEvents = "none"
        document.getElementsByTagName("html")[0].style.overflowY = "scroll"
    });


});