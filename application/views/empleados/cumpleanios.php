<link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Eventos</h5>
                </div>
                <div class="ibox-content">
                    <div id='external-events'>
                        <p>Coloca un Evento en el Calendario de SISCAR.</p>
                        <div class='external-event navy-bg'>Actividad 1.</div>
                        <div class='external-event navy-bg'>Actividad 2.</div>
                        <div class='external-event navy-bg'>Actividad 3.</div>
                        <div class='external-event navy-bg'>Actividad 4.</div>
                        <div class='external-event navy-bg'>Actividad 5.</div>
                        <p class="m-t">
                            <input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>Remover</label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>Calendario SISCAR</h2> Cumpleaños de los colaboradores en todo el Año. 
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendario SISCAR </h5>
                </div>
                <div id='top'>
                    ** Idioma : <select id='locale-selector'></select>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/fullcalendar/locale-all.js"></script>
<!-- iCheck  -->
<script src="<?php echo base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
<!-- URL BASE -->
<script src="<?php echo base_url() ?>assets/js/master/url_base.js"></script> 
<!-- Cumpleaños -->
<script src="<?php echo base_url() ?>assets/js/scripts/cumpleanios.js"></script>