<link href="<?php echo base_url() ?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">
<!-- sweetAlert. -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
<div class="col-lg-12">
    <div class="ibox-content">
        <h2 class="font-bold">Editar Leccion Aprendida</h2>
        <div class="row">
            <div class="col-md-12">
                <form id="formularioLeccionesAprendidas" name="formularioLeccionesAprendidas" role="form" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <label  class="control-label">Nombre : </label>
                            <input name="nombre" id="nombre" type="text" class="form-control" value="<?php echo (isset($leccion_aprendida)) ? $leccion_aprendida['nombre'] : "" ?>">
                        </div><br>
                        <div class="col-md-3">
                            <div class="control-group">
                                <label  class="control-label">Dominio : </label>
                                <div class="controls">
                                    <select data-placeholder="Seleccione Dominio..." class="dominio form-control" name="id_dominio" id="id_dominio">
                                        <?php foreach ($dominios as $dominio) {
                                            if (isset($dominio['id_dominio'])) {
                                                ?>
                                                <option value="<?php echo $dominio['id_dominio'] ?>"<?php echo ($dominio['id_dominio'] == $leccion_aprendida['fk_dominio']) ? 'selected' : ''; ?>><?php echo $dominio['nombre'] ?></option>
                                                <?php
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="control-group">
                                <label class="font-normal">Etiquetas/Procesos : </label> 
                                <a href="<?php echo base_url()."mantenedores/etiquetas" ?>">
                                    <span class="label label-success pull-right"> <i class="fa fa-plus"></i> <i class="fa fa-tags"></i> Etiquetas</span>
                                </a>
                                <select name="id_etiquetas[]" id="id_etiquetas" class="form-control etiquetas" multiple="multiple" data-placeholder="Seleccione Etiquetas" style="width: 100%;">
                                    <?php foreach ($etiquetas as $etiqueta) { ?>
                                    <option value="<?php echo $etiqueta['id_etiqueta'] ?>" <?php if(in_array($etiqueta['id_etiqueta'],$lecciones_editar)) echo 'selected="selected"' ?> ><?php echo $etiqueta['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label  class="control-label">Descripcion : </label>
                            <textarea name="descripcion" id="descripcion" class="form-control"><?php echo (isset($leccion_aprendida)) ? $leccion_aprendida['descripcion'] : "" ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label  class="control-label">Archivo Adjunto (Excel) : </label>
                            <?php if (isset($leccion_aprendida['ruta_archivo'])) { ?>
                                <a class="btn-success" href="<?php echo base_url() . $leccion_aprendida['ruta_archivo']; ?>" download target="_blank"> <i class="fa fa-download"></i> <i class="fa fa-clipboard"></i> Descargar Archivo Adjunto</a>
                            <?php } ?>
                            <input type="file" name="archivo_excel" id="archivo_excel" <?php echo (isset($leccion_aprendida['ruta_archivo'])) ? '' : 'required'; ?>>
                            <?php echo form_error('archivo_excel'); ?>
                        </div>
                        <center><div class="row">
                            <div class="col-md-12">
                            <a class="btn-success" href="<?php echo base_url()."assets/archivos/plantilla/CAR-PL-PO-Repositorio Lecciones Aprendidas_v1.0.xls" ?>" download target="_blank"> <i class="fa fa-download"></i> <i class="fa fa-clipboard"></i> Descargar  Plantilla : CAR-PL-PO-Repositorio Lecciones Aprendidas_v1.0.xls</a>
                            </div>
                            </div>
                        </center>
                    </div>
                    <script>
                        $("#archivo_excel").change(function(){
                            archivo = $("#archivo_excel").val();
                            nombre_archivo = $("#archivo_excel").val().split('\\').pop();
                            nombre_permitido = "CAR-PL-PO-Repositorio Lecciones Aprendidas";
                            extensiones_permitidas = new Array(".xlsx",".xls"); 
                            extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
                            permitida = false;
                            nombre_premitido = false;
                            for (var i = 0; i < extensiones_permitidas.length; i++) { 
                                 if (extensiones_permitidas[i] == extension) { 
                                 permitida = true; 
                                 break; 
                                } 
                            } 
                            if(nombre_archivo.indexOf(nombre_permitido) != -1){
                                nombre_premitido = true;
                                swal("Exito", "Archivo válido", "success");
                            }                   
                            if(permitida == false || nombre_premitido == false){
                                swal("Error", "Archivo no válido", "error");
                                $("#archivo_excel").val("");
                            }
                        });
                    </script>
                    <hr class="hr-primary" />
                    <button type="button" id="form-submit" name="editarLeccionAprendida" class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
                    <button type="button" id="form-eliminar" name="eliminarLeccionAprendida"class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                    <button type="button" id="form-cancel" class="btn btn-warning"><i class="fa fa-backward"></i> Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/js/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/sweetalert/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/sweetalert/core.js"></script>
<!--  <script src="<?php echo base_url() ?>assets/js/scripts/check_browser_close.js"></script> -->
<script type="text/javascript">
function cerrarVentana() {
    window.close();
};
</script>
<script>
$(document).ready(function(){
    $(".dominio").select2({
        placeholder: "Seleccione Dominio",
        allowClear: true
    });
    $(".etiquetas").select2({
        placeholder: "Seleccione Etiquetas",
        allowClear: true
    });
    $('#formularioLeccionesAprendidas').validate({
        rules: {
            nombre: {required: true},
            id_dominio: {required: true},
            id_etiquetas: {required: true},
            descripcion: {required: true}
        },
        messages: {
            nombre: {required: 'Campo Requerido.'},
            id_dominio: {required: 'Campo Requerido.'},
            id_etiquetas: {required: 'Campo Requerido.'},
            descripcion: {required: 'Campo Requerido.'}
        }
    });
    $('#form-submit').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Editar Leccion Aprendida",
            text: "¿Esta seguro que desea guardar esta informacion?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function (val) {
            if (val == true) {
                swal.disableButtons();
                $(boton_submit).attr('type', 'submit');
                $(boton_submit).click();
            } else {
                return false;
            }
        });
    });
    $('#form-eliminar').click(function () {
        var boton_submit = this;
        swal({
            title: "Eliminar Leccion Aprendida",
            text: "¿Esta seguro de Eliminar la Leccion Aprendida?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function (val) {
            if (val == true) {
                swal.disableButtons();
                $(boton_submit).attr('type', 'submit');
                $(boton_submit).click();
            } else {
                return false;
            }
        });
    });
    $('#form-cancel').click(function () {
        swal({
            title: "¿Esta seguro de cancelar la edicion?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function (val) {
            if (val == true) {
                swal.disableButtons();
                cerrarVentana();
            }
        });
    });
});
</script>
<script>  
<?php if (isset($cerrar) && $cerrar == TRUE) { ?>
    swal({
        title: "Exito",
        text: "Exito, por favor acepte para actualizar los cambios.",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Aceptar",
        cancelButtonText: false,
        closeOnConfirm: false
    },
    function (isConfirm) {
        if (isConfirm) {
            window.onunload = refreshParent();
            function refreshParent() {
                window.opener.location.reload();
            }
            window.close();
        }
    });
<?php }  ?>
</script>
