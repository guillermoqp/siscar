<link href="<?php echo base_url() ?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">
<!-- sweetAlert. -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
<div class="col-lg-12">
    <div class="ibox-content">
        <h2 class="font-bold">Registrar Leccion Aprendida</h2>
        <p>
           Registrar Leccion Aprendida, llene todos los campos.
        </p>
        <div class="row">
            <div class="col-md-12">
                <form id="formularioLeccionesAprendidas" name="formularioLeccionesAprendidas" role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-md-3">
                            <label  class="control-label">Nombre : </label>
                            <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Ingrese un Nombre">
                        </div><br>
                        <div class="col-md-3">
                            <div class="control-group">
                                <label  class="control-label">Dominio : </label>
                                <div class="controls">
                                    <select data-placeholder="Seleccione Dominio..." class="dominio form-control" name="id_dominio" id="id_dominio">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($dominios as $dominio) { print_r('<option value="'.$dominio['id_dominio'].'">'.$dominio['nombre'].'</option>'); } ?>
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
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($etiquetas as $etiqueta) { print_r('<option value="'.$etiqueta['id_etiqueta'].'">'.$etiqueta['nombre'].'</option>'); } ?>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label  class="control-label">Descripcion : </label>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label  class="control-label">Archivo Adjunto (Excel) : </label>
                            <input id="archivo_excel" name="archivo_excel" type="file" class="archivo form-control" required/>
                            <?php echo form_error('archivo_excel'); ?>
                        </div><br>
                        <center><div class="row">
                            <div class="col-md-12">
                            <a class="btn-success" href="<?php echo base_url()."assets/archivos/plantilla/CAR-PL-PO-Repositorio Lecciones Aprendidas_v1.0.xls" ?>" download target="_blank"> <i class="fa fa-download"></i> <i class="fa fa-clipboard"></i> Descargar  Plantilla : CAR-PL-PO-Repositorio Lecciones Aprendidas_v1.0.xls</a>
                            </div>
                            </div>
                        </center>
                    </div>
                    <script>
                        $("#archivo_excel").change(function() {
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
                    <button type="button" id="form-submit" name="adicionarLeccion" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</button>
                    <button id="form-cancel" type="button" class="btn btn-warning"><i class="fa fa-backward"></i> Cancelar</button>
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
            descripcion: {required: true},
            archivo_excel : {required: true}
        },
        messages: {
            nombre: {required: 'Campo Requerido.'},
            id_dominio: {required: 'Campo Requerido.'},
            id_etiquetas: {required: 'Campo Requerido.'},
            descripcion: {required: 'Campo Requerido.'},
            archivo_excel: {required: 'Campo Requerido.'}
        }
    });
    $('#form-submit').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Registrar Leccion Aprendida",
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
    $('#form-cancel').click(function () {
        swal({
            title: "Esta seguro de cancelar el registro.",
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
<?php if (isset($cerrar)&&$cerrar==TRUE){ ?>
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