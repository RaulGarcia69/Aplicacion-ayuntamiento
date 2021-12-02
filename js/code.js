$(document).ready(function() {
    $(".evento-individual").click(function() {
        document.getElementsByClassName("modalmask")[0].style.opacity = 1
        document.getElementsByClassName("modalmask")[0].style.pointerEvents = "auto"
        document.getElementsByTagName("html")[0].style.overflow = "hidden"
        var var1 = $(this).attr('data-id');
        var var2 = $(this).attr('data-nombre');
        $("#nom-even-modal").text("Inscribirse en " + var2);
        $("#eventoname").val(var1);
    });


    $("#cerrar").click(function() {
        document.getElementsByClassName("modalmask")[0].style.opacity = 0
        document.getElementsByClassName("modalmask")[0].style.pointerEvents = "none"
        document.getElementsByTagName("html")[0].style.overflowY = "scroll"
    });

    $(".boton-salir").click(function() {
        document.getElementsByClassName("registrado")[0].style.opacity = 0
        document.getElementsByClassName("registrado")[0].style.pointerEvents = "none"
            //var url = window.location.href;
        window.history.pushState({}, document.title, "/" + "DAW/proyectos/aplicacion-ayuntamiento/View/form.php");
    });


    //admin
    $(".crear-evento").click(function() {
        document.getElementsByClassName("modalmask")[0].style.opacity = 1
        document.getElementsByClassName("modalmask")[0].style.pointerEvents = "auto"

    });


});



function validar_login() {
    if (document.getElementById('login_username').value == '' || document.getElementById('login_password').value == '') {
        return false
    } else {
        return true
    }
}

function validar_form() {
    if (document.getElementById('name').value == '' || document.getElementById('email').value == '' || document.getElementById('dni').value == '') {
        return false
    } else {
        return true
    }
}

function validar_admin() {
    if (document.getElementById('nombre').value == '' || document.getElementById('descripcion').value == '') {
        return false
    } else {
        return true
    }
}