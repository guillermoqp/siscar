var url_base=(localStorage)?localStorage.getItem("url_base"):sessionStorage.getItem("url_base");
var url_imagen_cargando=url_base+"assets/img/cargando.gif";
var url_login_siscar=url_base+"loginSiscar?ajax=true";
var url_login_fenix=url_base+"loginFenix";
var url_cts_int="https://cts.everis.int/rest/user/login";
function login_fenix(){
    var data = { 
        login: $('#usuario').val(), 
        password: $('#password').val()
    };
    $.ajax({
      headers: { 
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        /*'X-Requested-With': 'XMLHttpRequest',
        'Access-Control-Allow-Origin': '*'*/
      },
      type: "POST",
      dataType: 'json',
      url: url_cts_int,
      data: JSON.stringify(data),
        success: function (responseData) {
            var id = responseData.employee.id;
            $.ajax({
                url: url_login_fenix,
                type: "POST",
                dataType: 'json',
                data: {
                    codigo : id ,
                    recordarme : $('#recordarme').val()
                },
                success: function (data)
                {
                    if (data.resultado == true) {
                        window.location.href = url_base;
                    } else {
                        $('#btn-accesar').removeClass('disabled');
                        $('#progress-accesar').addClass('hide');
                        sweetAlert("Error", data.mensaje, "error");
                    }
                } 
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var mensaje = "";
            if (typeof xhr.responseJSON === "undefined") {
                mensaje = "Error, Logueo con CTS no Disponible";
            }else{
                var mensaje = xhr.responseJSON.message;
            }
            $('#btn-accesar').removeClass('disabled');
            $('#progress-accesar').addClass('hide');
            sweetAlert("Datos Incorrectos", mensaje , "error");
        },
        statusCode: {
            502:function (xhr, ajaxOptions, thrownError) {
                $('#btn-accesar').removeClass('disabled');
                $('#progress-accesar').addClass('hide');
                sweetAlert("Error", "Error, Logueo con CTS no Disponible" , "error");
            }
        }
    });  
}
function login_siscar(form){
    var datos=$(form).serialize();
    console.log(" datos login : "+datos);
    var passwordStr=$("#password").val();
    var passwordSHA1=$.sha1(passwordStr);
    console.log("passwordSHA1 Jquery : "+passwordSHA1);
    $('#btn-accesar').addClass('disabled');
    $('#progress-accesar').removeClass('hide');
    $.ajax({
        url: url_login_siscar,
        type: "POST",
        crossDomain : true,
        dataType: "json",
        data: datos,
        success: function (data)
        {
            if (data.resultado==true) {
                window.location.href=url_base;
            } else {
                $('#btn-accesar').removeClass('disabled');
                $('#progress-accesar').addClass('hide');
                sweetAlert("Datos Incorrectos",data.mensaje,"error");
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var mensaje = "";
            if (typeof xhr.responseJSON === "undefined") {
                console.log("thrownError : " + thrownError + xhr);
                mensaje = "Error, Logueo con SISCAR no Disponible";
            }else{
                var mensaje = xhr.responseJSON.message;
            }
            $('#btn-accesar').removeClass('disabled');
            $('#progress-accesar').addClass('hide');
            sweetAlert("Error", mensaje , "error");
        }
    });
}
$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "0",
        "timeOut": "0",
        "extendedTimeOut": "300",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.success("Podra Ingresar con el Login de Usuario de <b><a target='_blank' href='https://cts.everis.int/launcher/login'>CTS</a></b>","INFO");
    $('#usuario').focus();
    $("#usuario").autocomplete(
    {
        source: url_base+"autoCompleteUsuario",
        minLength: 2,
        select: function (event, ui)
        {
            $("#usuario").val(ui.item.usuarioSET);
        }
    });
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });    
    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, { color: '#1AB394' });
    $('#usuario').focus();
});