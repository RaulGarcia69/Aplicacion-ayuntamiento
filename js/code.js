$(document).ready(function() {
    $(".evento-individual").click(function() {
        document.getElementsByTagName("html")[0].style.overflow = "hidden"
        var var1 = $(this).attr('data-id');
        var var2 = $(this).attr('data-nombre');
        $("#nom-even-modal").text("Registarse para " + var2);
    });
});