<link href="<?php print(base_url("assets/css/plugins/iCheck/custom.css")) ?>" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Registro de Permisos</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <form id="formPermisos" method="POST" class="form-horizontal">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="col-sm-9">
                            <label>Nombre de Permiso</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" class="span12"/>
                        </div>
                        <div class="col-sm-3">
                            <label>
                                <input name="seleccionarTodos" type="checkbox" value="1" id="seleccionarTodos"/>
                                <h4><b>Seleccionar Todos</b></h4>
                            </label><hr>
                        </div>
                        <div class="control-group">
                            <label for="documento" class="control-label"></label>
                            <div class="controls">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-dashboard"></i><span> Dashboard</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vDashboard" class="marcar" type="checkbox" value="1"/>
                                                    <span class="lbl">Visualizar Dashboard</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-users"></i><span> Modulo Persona/Empleado</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vEmpleado" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl">Visualizar Empleado</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aEmpleado" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Registrar Empleado</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eEmpleado" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Editar Empleado</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dEmpleado" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Excluir Empleado</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-calendar"></i><span> Modulo Vacaciones (Linea Base)</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vVacaciones" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl">Visualizar Vacaciones</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aVacaciones" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Registrar Vacaciones/Eventos</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eVacaciones" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Editar Vacaciones/Eventos</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dVacaciones" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Eliminar Vacaciones/Eventos</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-file"></i><span> Modulo Lecciones Aprendidas</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vLecAprendidas" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl">Visualizar Lecciones Aprendidas</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aLecAprendidas" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Registrar Lecciones Aprendidas</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eLecAprendidas" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Editar Lecciones Aprendidas</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dLecAprendidas" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Eliminar Lecciones Aprendidas</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-line-chart"></i> Modulo Demanda</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vDemanda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Visualizacion de la Prevision Mensual y de la Seguimiento de Demanda por Fecha</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aDemanda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Registro de la Prevision Mensual y de la Seguimiento de Demanda por Fecha</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eDemanda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Editar Prevision Mensual y de la Seguimiento de Demanda por Fecha</span>
                                                </label>
                                                <label>
                                                    <input name="eDemandaDominio" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Editar Seguimiento de Demanda por Dominio</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dDemanda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Eliminar Prevision Mensual y de la Seguimiento de Demanda por Fecha</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-money"></i> Modulo Presupuesto Anual</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vPresupuestoAnual" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Visualizar Presupuesto Anual</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aPresupuestoAnual" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Registrar Presupuesto Anual</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="ePresupuestoAnual" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Editar Presupuesto Anual</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dPresupuestoAnual" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Excluir Presupuesto Anual</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-file-o"></i> Modulo Reportes</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vReporteComparativo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Comparativo de Presupuesto, Prevision y Demanda real</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="vSeguimientoDemanda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Seguimiento de Demanda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="vResultadosEconomicos" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Resultados Economicos</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-table"></i> Modulo Mantenedores</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="mDominios" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Dominios</span><br>
                                                    <input name="mRoles" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Roles</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="mCategorias" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Categorias</span><br>
                                                    <input name="mInstitucionEducativa" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Instituciones Educativas</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="mTecnologias" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Tecnologias</span><br>
                                                    <input name="mEtiquetas" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Etiquetas/Procesos</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="mClientes" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl">Clientes</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="4" class="info"><p><strong> <i class="fa fa-cogs"></i> Modulo Configuraciones</strong></p></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Usuario</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cPermiso" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Permisos</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Backup</span>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset3">
                                    <button type="button" id="form-submit" name="agregarPermiso" class="btn btn-success"><i class="fa fa-edit"></i> Agregar</button>
                                    <button id="form-cancel" type="button" class="btn btn-danger"><i class="fa fa-backward"></i> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/iCheck/icheck.min.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $("#seleccionarTodos").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    $("#formPermiso").validate({
        rules: {
            nombre: {required: true}
        },
        messages: {
            nombre: {required: 'Campo obligatorio'}
        }
    });
    $("#form-submit").on('click', function () {
        var boton_submit = this;
        swal({
            title: "Registrar Permiso",
            text: "¿Esta seguro que desea guardar esta informacion?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },function(val){
            if (val==true) {
                swal.disableButtons();
                $(boton_submit).attr('type', 'submit');
                $(boton_submit).click();
            } else {
                return false;
            }
        });
    });
    $("#form-cancel").click(function () {
        swal({
            title: "Esta seguro de cancelar el registro",
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
                location.replace("<?php print(base_url("permisos")) ?>");
            }
        });
    });
});
</script>