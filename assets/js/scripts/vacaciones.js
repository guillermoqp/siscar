$(document).ready(function() {
    var base_url = (localStorage) ? localStorage.getItem("url_base") : sessionStorage.getItem("url_base");
    var initialLocaleCode = 'es-do';
    var currentDate;
    var currentEvent;
    var fk_dominio = $('#fk_dominio').val();
    $('#color').colorpicker();

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
        eventLimit: true,
        events: {
            url: base_url+'vacaciones/getEvents',    
            type: 'POST',
            cache: false,
            data: {
                fk_dominio: fk_dominio
            }
        },
        selectable: true,
        selectHelper: true,
        editable: true,         
        select: function(start, end) {
            $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
            $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
            modal({
                buttons: {
                    add: {
                        id: 'add-event', // Buttons id
                        css: 'btn-success', // Buttons class
                        label: '<i class="fa fa-plus"></i> Agregar' // Buttons label
                    }
                },
                title: 'Añadir Evento : Dias de Vacaciones' // Modal title
            });
        }, 
        eventDrop: function(event, delta, revertFunc,start,end) {  
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }            
            $.post(base_url+'vacaciones/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end : end
            },function(result){
                swal({
                    title: 'Exito',
                    text: 'Evento / Dias de Vacaciones actualizados con exito.',
                    type: 'success',
                    showConfirmButton: false
                });
            });
        },
        eventResize: function(event,dayDelta,minuteDelta,revertFunc) { 
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
            $.post(base_url+'vacaciones/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                swal({
                    title: 'Exito',
                    text: 'Evento / Dias de Vacaciones actualizados con exito.',
                    type: 'success',
                    showConfirmButton: false
                });
                });
        },
        eventMouseover: function(calEvent, jsEvent, view){
            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);
            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: '<i class="fa fa-trash"></i> Eliminar'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-success',
                        label: '<i class="fa fa-refresh"></i> Actualizar'
                    }
                },
                title: 'Editar Evento : "' + calEvent.title + '"',
                event: calEvent
            });
        }
    });
    function modal(data) {
        $('.modal-title2').html(data.title);
        $('.modal-footer button:not(".btn-default")').remove();
        $('#title').val(data.event ? data.event.title : '');        
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');
        $('#inicio').html(data.event ? data.event.start.format('DD-MM-YYYY') : '--');
        $('#fin').html(data.event ? data.event.end.format('DD-MM-YYYY') : '--');
        if(data.event)
        {$("#fk_empleado").val(data.event.fk_empleado).change();}
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>');
        });
        $('.modal').modal('show');
    };
    $('.modal').on('click','#add-event',function(e) {
        if(validator(['title', 'description','fk_empleado'])) {
            swal({
                title: "¿Seguro que desea Registrar?",
                text: "¡Registrará el Evento / Dias de vacaciones en la fecha Seleccionada!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Si, deseo Registrar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.post(base_url+'vacaciones/addEvent', {
                        title: $('#title').val(),
                        description: $('#description').val(),
                        color: $('#color').val(),
                        start: $('#start').val(),
                        end: $('#end').val(),
                        fk_dominio: $('#fk_dominio').val(),
                        fk_empleado: $('#fk_empleado').val()
                    }, function(result){
                        swal({
                            title: 'Exito',
                            text: 'Evento / Dias de Vacaciones registrados con exito.',
                            type: 'success',
                            showConfirmButton: false
                        });
                        $('.modal').modal('hide');
                        $('#calendar').fullCalendar("refetchEvents");
                    });
                }
            }); 
        }
    });
    $('.modal').on('click','#update-event',function(e){
        if(validator(['title', 'description','fk_empleado'])) {
            swal({
                title: "¿Seguro que desea Modificar?",
                text: "¡Modificara el Evento / Dias de vacaciones en las fechas Seleccionadas!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Si, deseo Modificar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.post(base_url+'vacaciones/updateEvent', {
                        id: currentEvent._id,
                        title: $('#title').val(),
                        description: $('#description').val(),
                        color: $('#color').val(),
                        fk_dominio: $('#fk_dominio').val(),
                        fk_empleado: $('#fk_empleado').val()
                    }, function(result){
                        swal({
                            title: 'Exito',
                            text: 'Evento / Dias de Vacaciones actualizados con exito.',
                            type: 'success',
                            showConfirmButton: false
                        });
                        $('.modal').modal('hide');
                        $('#calendar').fullCalendar("refetchEvents");
                    });
                }
            }); 

        }
    });
    $('.modal').on('click','#delete-event',function(e){
        swal({
            title: "¿Seguro que desea Eliminar?",
            text: "¡Eliminara el Evento / Dias de vacaciones Seleccionado!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Si, deseo Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $.get(base_url+'vacaciones/deleteEvent?id=' + currentEvent._id, function(result){
                swal({
                        title: 'Exito',
                        text: 'Evento / Dias de Vacaciones eliminado con exito.',
                        type: 'success',
                        showConfirmButton: false
                    });
                $('.modal').modal('hide');
                 $('#calendar').fullCalendar("refetchEvents");
                });
            }
        });
    });
    function validator(elements) {
        var errors=0;
        $.each(elements, function(index,element){ if($.trim($('#'+element).val())=='') errors++; });
        if(errors) {
            swal({
                title: 'Error',
                text: 'Por Favor Inserte Titulo/Nombre, Descripcion y Empleado',
                type: 'error'
            });
            return false;
        }
        return true;
    };
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