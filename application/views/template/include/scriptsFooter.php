<!-- URL BASE -->
<script src="<?php print(base_url("assets/js/master/url_base.js")) ?>"></script>
<!-- Master -->
<script src="<?php print(base_url("assets/js/plugins/dataTables/moment.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/master/master.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    var shortCutFunction = false;
    var showDuration = 300;
    var hideDuration = 1000;
    var timeOut = 10000;
    var extendedTimeOut = 200;
    var showEasing = 'swing';
    var hideEasing = 'linear';
    var showMethod = 'fadeIn';
    var hideMethod = 'fadeOut';
    toastr.options = {
        closeButton: true,
        debug: false,
        progressBar: true,
        positionClass: 'toast-top-full-width',
        onclick: true
    };
    toastr.options.onclick = function () {
        toastr.clear();
    };
    toastr.options.showDuration = showDuration;
    toastr.options.hideDuration = hideDuration;
    toastr.options.timeOut = timeOut;
    toastr.options.extendedTimeOut = extendedTimeOut;
    toastr.options.showEasing = showEasing;
    toastr.options.hideEasing = hideEasing;
    toastr.options.showMethod = showMethod;
    toastr.options.hideMethod = hideMethod;
    $('#limpiar_toast').click(function () {
        toastr.clear();
    });
    <?php if ($this->session->flashdata("error")!=null&&strlen($this->session->flashdata("error"))>0){ ?>
        toastr.error("<?php print($this->session->flashdata("error")) ?>","¡Error!");
    <?php } ?>
    <?php if ($this->session->flashdata("success")!=null&&strlen($this->session->flashdata("success"))>0) { ?>
        toastr.success("<?php print($this->session->flashdata("success")) ?>","¡Exito!");
    <?php } ?>
    
    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'vDemanda')) { ?>
    var id_usuario=<?php print($this->session->userdata("id_usuario")) ?>;    
    var id=$(".lastId").attr("id");
    var getLastId,notifificacionHTML="";
    $.ajax({
        url: "<?php print(base_url("demanda/obtener_notificaciones_json")) ?>",
        type: "POST",
        data: ({id_usuario: id_usuario}),
        dataType: "html",
        success: function (data)
        {
            var notificaciones = JSON.parse(data);
            if (notificaciones.length!=0)
            {
                $("#nroSeguimientos").append(notificaciones.length);
                $.each(notificaciones,function(indice,notificacion){
                    var getLastId = notificacion.id_seguimiento;
                    notifificacionHTML='<li><a href="<?php print(base_url("demanda/seguimiento_adicionar/")) ?>/'+notificacion.id_seguimiento+'"><div>';
                    notifificacionHTML += '<i class="fa fa-envelope fa-fw"></i> Seguimiento N°: '+notificacion.id_seguimiento+'<br>';
                    notifificacionHTML += '<span class="pull-right text-muted small"> Fecha Corte : '+notificacion.fecha_corte+'</span><br>';
                    notifificacionHTML += '<span class="pull-right text-muted small"> Dias Corte : '+notificacion.nro_dias_corte+'</span><br>';
                    notifificacionHTML += '<span class="pull-right text-muted small"> Desc : '+notificacion.descripcion+'</span><br>';
                    notifificacionHTML += '<span class="pull-right text-muted small"><span class="label label-info">Avance : '+notificacion.avance+' % </span></span></div></a>';
                    notifificacionHTML += '</li><hr>';
                    $("#seguimientos").append(notifificacionHTML);
                });
                notifificacionHTML="";
            } else
            {
                $("#seguimientos").append('<li class="text-center"> No tiene notificaciones </li>');
            }
            $(".lastId").attr("id",getLastId);
        },
        error: function ()
        {
            $("#seguimientos").append("<li class='text-center'>No ha sido posible cargar Notificaciones</li>");
        }
    });
    <?php } ?>
});
</script>