<!-- Datatables -->
<link href="<?php print(base_url("assets/css/plugins/dataTables/dataTables.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/buttons.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/responsive.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/scroller.bootstrap.min.css")) ?>" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Usuarios</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <a href="<?php print(base_url("usuarios/adicionar")) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Usuario</a>
        <hr class="hr-primary"/>
        <table id="tablaUsuarios" class="table table-striped table-bordered table-hover datatable-buttons">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr class="gradeX">
                        <td><?php print($usuario["id_usuario"]); ?></td>
                        <td><?php print($usuario["nombre"]); ?></td>
                        <td>
                            <?php if($usuario["foto"]!='') { ?>
                                <img src="<?php print(base_url($usuario["foto"])) ?>" class="img-circle" alt="Imagen Usuario" width="60" height="60">
                            <?php } else { ?>     
                                <img src="<?php print(base_url("assets/img/user.png")) ?>" class="img-circle" alt="Imagen Usuario">
                            <?php }  ?>   
                            <?php print($usuario["username"]) ?>
                        </td>
                        <td><?php print(date("d/m/Y",strtotime($usuario["fecha"]))); ?></td>
                        <td><?php print($usuario["estado"]==1 ? "Activo" : "Inactivo"); ?></td>
                        <td><?php print($usuario["permiso"]); ?></td>
                        <td>
                            <div class="dt-buttons btn-group">
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'cUsuario')) { ?>
                                    <a href="<?php print(base_url("usuarios/editar/".$usuario["id_usuario"])) ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a id_usuario="<?php print($usuario["id_usuario"]) ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash-o"></i>
                                    </a>

                                    <a id_usuario="<?php print($usuario["id_usuario"]) ?>" valor="<?php print($usuario["username"]) ?>" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalEditarNombreUsuario"><i class="fa fa-edit"></i><i class="fa fa-user"></i>
                                    </a>

                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal inmodal" id="modalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form id="id_eliminar_usuario" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Eliminar Usuario</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea eliminar el Usuario, se perderan todos los datos asociados?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal inmodal" id="modalEditarNombreUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form id="id_editar_NoUsuario" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Editar Dato</h4>
                </div>
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Dato</label>
                        <div class="controls">
                            <input class="form-control" id="valor" type="text" name="valor"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit" class="btn btn-info" name="editarNoUsuario">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Data Tables -->
<script src="<?php print(base_url("assets/js/plugins/dataTables/jquery.dataTables.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.bootstrap.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.buttons.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.colVis.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.bootstrap.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.flash.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.html5.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.print.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.fixedHeader.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.keyTable.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.responsive.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/responsive.bootstrap.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/datatables.scroller.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/jszip.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/pdfmake.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/vfs_fonts.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.select.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/datetime.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/moment.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/datetime-moment.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/scripts/dataTableUtils.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    $(document).on('click', 'a', function (event) {
        var id_usuario = $(this).attr("id_usuario");
        $("#id_eliminar_usuario").attr("action","<?php print(base_url("usuarios/desactivar")) ?>"+"/"+id_usuario);    
    });
    $(document).on('click', 'a', function (event) {
        var valor = $(this).attr('valor');
        var id_usuario = $(this).attr('id_usuario');
        $('#valor').val(valor);
        $('#id_editar_NoUsuario').attr('action',"<?php print(base_url("usuarios/editarNoUsuario")) ?>"+"/"+id_usuario);    
    });
    var tablaUsuarios=crearDataTablePorId("tablaUsuarios");
});
</script>