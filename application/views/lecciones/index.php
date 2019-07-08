<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aLecAprendidas')) { ?>
                <button type="button" onclick="agregarLeccion()" class="btn btn-success"> <i class="fa fa-plus"></i> Añadir Leccion Aprendida </button>
            <?php } ?>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vLecAprendidas')) { ?>
                <a href="<?php echo base_url() ?>lecciones_aprendidas/buscar" class="btn btn-info"> <i class="fa fa-search-plus"></i> Buscador</a>
            <?php } ?>
            </div>  
        </div>
        <hr class="hr-primary" />
        <div class="col-md-9">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Lecciones Aprendidas</h5>
                </div>
                <div class="ibox-content">
                    <ul class="notes">
                        <?php foreach ($lecciones as $leccion) { ?>
                            <li>
                                <div>
                                    <small><?php print(date_format(date_create($leccion["fchAc"]), 'd-m-Y H:i:s')) ?></small>
                                    <h4><?php print(substr($leccion["nombre"],0,30)) ?></h4>
                                    <p><?php print(substr($leccion["descripcion"], 0,100)) ?></p>
                                    <br><i class="fa fa-users"></i> <?php print($leccion["nombredominio"]) ?>
                                    <br><i class="fa fa-user"></i> <?php print($leccion["nombreusuario"]) ?>
                                    <?php print($leccion["etiquetas"]) ?>
                                    <a href="#" onclick="editarLeccion(<?php print($leccion["id_leccion_aprendida"]) ?>)"><i class="fa fa-edit"></i></a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox ">
                <div class="ibox-title">    
                    <h5>Historial</h5>
                </div>
                <div class="ibox-content">
                    <?php foreach ($historial as $historiale) { ?>
                        <div class="stream-small">
                            <span class="label label-<?php 
                            if($historiale["operacion"]=='0'){print('success');}
                            if($historiale["operacion"]=='1'){print('warning');} 
                            if($historiale["operacion"]=='2'){print('danger');} ?>"> 
                            <i class="fa fa-adn"></i> <?php 
                            if($historiale["operacion"]=='0'){print('Registro');}
                            if($historiale["operacion"]=='1'){print('Edito');} 
                            if($historiale["operacion"]=='2'){print('Elimino');}?> </span>
                            <span class="text-muted"><i class="fa fa-calendar"></i> <?php print(date_format(date_create($historiale["fchAc"]),'H:i:s d-m-Y')) ?></span>
                            <br>
                            <a href="#"><?php print($historiale["nombreusuario"]) ?></a> 
                        </div><br>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Utilitarios -->
<script src="<?php echo base_url() ?>assets/js/scripts/utilitarios.js"></script>
<script type="text/javascript">
function agregarLeccion() {
    var alto = 250;
    var ancho = 500;
    var url = "<?php print(base_url().'lecciones_aprendidas/adicionar/') ?>";  
    popup(url,alto,ancho);
};
function editarLeccion(id) {
    var alto = 250;
    var ancho = 500;
    var url = "<?php print(base_url().'lecciones_aprendidas/editar/') ?>"+id;
    popup(url,alto,ancho);
};
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>