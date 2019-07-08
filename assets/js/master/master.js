var url_base = (localStorage) ? localStorage.getItem("url_base") : sessionStorage.getItem("url_base");
var url_imagen_cargando = url_base + "assets/img/cargando.gif";
var cake = url_base + "assets/img/cake.gif";   
var localLocale = moment(new Date());
moment.locale('es');
localLocale.locale(false);
var fechaActualTxt = localLocale.format('LLLL');
function salir() {
    swal({
        title: "¿Seguro que desea Salir?",
        text: "Saldrá del Sistema Sin Guardar los cambios que haya realizado!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, deseo Salir",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    },
    function (isConfirm) {
        if (isConfirm) {
            swal({
                title: 'Ha salido del Sistema',
                text: 'Ha Salido del Sistema.',
                type: 'success',
                showConfirmButton: false
            });
            localStorage.clear();
            sessionStorage.clear();
            window.location.href=url_base+"salir";
        }
    });
};
function backUp() {
    swal({
        title: "¿Esta seguro de Realizar un BackUp de la Base de Datos?",
        text: "Se generara un archivo .zip con el SQL de toda la Base de Datos.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    },
    function (isConfirm) {
        if (isConfirm) {
            swal({
                title: 'Exito',
                text: 'Se Realizo el BackUp',
                type: 'success',
                showConfirmButton: false
            });
            window.location.href = url_base+"backup";
        }
    });
};
function buscar_cumpleanios() {
    $.ajax({
        url: url_base+"empleados/obtener_notificaciones_cumpleanios_json",
        type: "POST",
        dataType: 'json',
        beforeSend: function()
        {
            sweetAlert({
                title: "",
                text: "Cargando datos, espere...",
                imageUrl: url_imagen_cargando,
                showConfirmButton: false,
                allowOutsideClick: false
            }); 
        }, 
        success: function (notificaciones)
        {
            if (notificaciones.length != 0)
            {
                $('#span_class').removeClass('label label-info').addClass('label label-danger');
                var nombres = "";
                for (var i = 0; i < notificaciones.length; i++)
                {
                    nombres += notificaciones[i]["nombres_empleado"]+" , ";
                }
                sweetAlert({
                    title: 'Hoy '+fechaActualTxt+' cumplen años :',
                    text: nombres,
                    imageUrl: cake,
                    imageWidth: 400,
                    imageHeight: 200,
                    animation: false
                });
            } else
            {
               sweetAlert("Mensaje", "Ningun Empleado cumple años hoy." , "info"); 
            }
        },
        error: function() {
            sweetAlert("Error", "Un error al cargar datos." , "error");  
        }
    });  
};