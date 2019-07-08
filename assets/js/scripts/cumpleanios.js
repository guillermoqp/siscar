$(document).ready(function() {
    var url_base = (localStorage) ? localStorage.getItem("url_base") : sessionStorage.getItem("url_base");
    var initialLocaleCode = 'es-do';
    var url_imagen_cargando = url_base+"assets/img/cargando.gif";
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $('#external-events div.external-event').each(function() {
        $(this).data('event', {
            title: $.trim($(this).text()),
            stick: true
        });
        $(this).draggable({
            zIndex: 1111999,
            revert: true,      
            revertDuration: 0 
        });
    });
    $('#calendar').fullCalendar({
        locale: initialLocaleCode,
        buttonIcons: false,
        weekNumbers: true,
        navLinks: true,
        editable: true,
        eventLimit: true,
        dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        editable: true,
        droppable: true,
        drop: function() {
            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }
        },
        defaultDate: moment().format("YYYY-MM-DD"),
        editable: true,
        events: {
            url: url_base+"empleados/obtener_cumpleanios_json",    
            type: 'POST',
            cache: true
            /*color: 'yellow',   
            textColor: 'black',
            data: {
                parametro_adicional1: '1',
                parametro_adicional2: '2'
            },
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
            success: function(){
                sweetAlert("Mensaje", "Datos Encontrados." , "success");  
            },
            error: function() {
                sweetAlert("Error", "Un error al cargar datos." , "error");  
            }*/
        },
        loading: function(bool) {
            $('#loading').toggle(bool);
        }
    });
    $.each($.fullCalendar.locales, function(localeCode) {
        $('#locale-selector').append(
            $('<option/>')
                    .attr('value', localeCode)
                    .prop('selected', localeCode == initialLocaleCode)
                    .text(localeCode)
        );
    });
    $('#locale-selector').on('change', function() {
        if (this.value) {
                $('#calendar').fullCalendar('option', 'locale', this.value);
        }
    });
});