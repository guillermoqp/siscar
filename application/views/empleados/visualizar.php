<!-- Data picker -->
<link href="<?php echo base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<!-- RATING -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/rating/rating.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/rating/rating.css" type="text/css" media="screen">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/select2/select2.css">
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Datos de Empleado</a></li>
            <li><a data-toggle="tab" href="#tab2">Dominios</a></li>
            <li><a data-toggle="tab" href="#tab3">Categorias</a></li>
            <li><a data-toggle="tab" href="#tab4">Tecnologias/Skills</a></li>
            <li><a data-toggle="tab" href="#tab5">Lider Dominio</a></li>
        </ul>
    </div>
    <!--Tab 1 :  DATOS PERSONALES  -->
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Datos de Empleado : <strong><?php echo $empleado["nombres"] ?> <?php echo $empleado["apellidos"] ?></strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                
                            <div class="row animated fadeInRight">
                                <div class="col-md-4">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-title">
                                                <h5>Datos Personales</h5>
                                            </div>
                                            <div>
                                                <div class="ibox-content no-padding border-left-right">
                                                    <img alt="image" class="img-responsive" src="https://cts.everis.int/rest/user/<?php echo $empleado["cod_empleado"] ?>/photo?square=true">
                                                </div>
                                                <div class="ibox-content profile-content">
                                                    <h3><strong>Nombres : </strong><?php echo $empleado["nombres"] ?><br><strong> Apellidos:</strong> <?php echo $empleado["apellidos"] ?></h3>
                                                    <h3>
                                                        <strong>Codigo : </strong> <?php echo $empleado["cod_empleado"] ?><br><br>
                                                        <strong>DNI : </strong> <?php echo $empleado["dni"] ?><br><br>
                                                        <strong>Fecha Ingreso : </strong> <?php echo date('d/m/Y', strtotime($empleado["fecha_ingreso"])) ?><br><br>
                                                        <strong>Fecha Nacimiento : </strong><?php echo ($empleado["fecha_nacimiento"] != '' || $empleado["fecha_nacimiento"] != null) ? date('d/m/Y', strtotime($empleado["fecha_nacimiento"])) : '--' ?><br><br>
                                                        <strong>Fecha Prueba : </strong><?php echo ($empleado["fecha_prueba"] != '' || $empleado["fecha_prueba"] != null) ? date('d/m/Y', strtotime($empleado["fecha_prueba"])) : '--' ?><br><br>
                                                        <strong>Estado Civil: </strong> 
                                                        <?php
                                                            switch ($empleado["estado_civil"]) {
                                                                case 'S':
                                                                    $estado_civil = "Soltero";
                                                                    break;
                                                                case 'C':
                                                                    $estado_civil = "Casado";
                                                                    break;
                                                                case 'V':
                                                                    $estado_civil = "Viudo";
                                                                    break;
                                                                default : $estado_civil = "--";
                                                            }
                                                            echo $estado_civil
                                                            ?>
                                                    </h3>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Datos de Dominio</h5>
                                        </div>
                                        <div class="ibox-content">
                                            <div>
                                                <div class="feed-activity-list">
                                                    <div class="feed-element">
                                                        <div class="media-body">
                                                            <h3><strong>Dominio Actual :</strong> <?php echo (isset($empleado_dominio['nombre'])) ? $empleado_dominio['nombre'] : '' ?><br><br>
                                                            <strong>Fecha :</strong> <?php echo (isset($empleado_dominio['fecha_cambio_dominio'])) ? $empleado_dominio['fecha_cambio_dominio'] : '' ?><br><br>
                                                            <small class="text-muted">Actualizado al : <?php echo (isset($empleado_dominio['fecha_cambio_dominio'])) ? $empleado_dominio['fecha_cambio_dominio'] : '' ?></small></h3>
                                                            <div class="actions">
                                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Datos de Categoria</h5>
                                        </div>
                                        <div class="ibox-content">
                                            <div>
                                                <div class="feed-activity-list">
                                                    <div class="feed-element">
                                                        <div class="media-body">
                                                            <h3><strong>Categoria Actual :</strong> <?php echo (isset($empleado_categoria['codigo'])) ? $empleado_categoria['codigo'] : '' ?> - <?php echo (isset($empleado_categoria['nombre'])) ? $empleado_categoria['nombre'] : '' ?><br><br>
                                                            <strong>Fecha :</strong> <?php echo (isset($empleado_categoria['fecha_cambio_categoria'])) ? $empleado_categoria['fecha_cambio_categoria'] : '' ?><br><br>
                                                            <strong>Banda  : </strong> <?php echo (isset($empleado_categoria['banda'])) ? $empleado_categoria['banda'] : '' ?><br><br>
                                                            <small class="text-muted">Actualizado al :  <?php echo (isset($empleado_categoria['fecha_cambio_categoria'])) ? $empleado_categoria['fecha_cambio_categoria'] : '' ?></small>
                                                            </h3>
                                                            <div class="actions">
                                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Tab 2 :  DATOS DEL DOMINIO -->
        <div id="tab2" class="tab-pane" style="min-height: 300px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos del Dominio de : <strong><?php echo $empleado["nombres"] ?> <?php echo $empleado["apellidos"] ?></strong></h5>
                    <div class="ibox-tools"></div>
                </div>
                <div class="ibox-content">
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5><strong>Gestionar Cambios de Dominio</strong></h5>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <form id="formularioGestionarDominio" name="formularioGestionarDominio" role="form" method="post">
                                            <input type="hidden" name="id_empleado" value="<?php echo $empleado["id_empleado"] ?>">
                                            <div class="control-group">
                                                <strong>Dominio Actual :</strong>
                                                <div class="controls">
                                                    <input type="text"  value="<?php echo (isset($empleado_dominio['nombre'])) ? $empleado_dominio['nombre'] : '' ?>" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <strong>Nuevo Dominio :</strong>
                                                <div class="controls">
                                                    <select class="form-control m-b" id="id_dominio_nuevo" name="id_dominio_nuevo">
                                                        <?php foreach ($dominios as $dominio) { ?>
                                                            <option value="<?php echo $dominio['id_dominio'] ?>"><?php echo $dominio['nombre'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="date" class="control-label">Fecha <span class="required">*</span></label>
                                                <div class="controls">
                                                    <div class="form-group">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" id="fecha_cambio_dominio" name="fecha_cambio_dominio" class="form-control" value="<?php echo date('d/m/Y') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <strong>Comentario :</strong>
                                                <div class="controls">
                                                    <textarea id="comentario" name="comentario" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <hr class="hr-primary" />
                                            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eEmpleado')) { ?>
                                            <div class="form-actions">
                                                <div class="span12">
                                                    <div class="span6 offset3">
                                                        <button name="gestionar_dominio" id="form_submit_dominio" type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3> <strong> Historial de Cambios </strong></h3>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <?php
                                        if (!empty($empleado_dominio_historial)) {
                                            foreach ($empleado_dominio_historial as $edh) {
                                                ?>
                                                <div class="timeline-item">
                                                    <div class="row">
                                                        <div class="col-xs-3 date">
                                                            <i class="fa fa-file-text"></i>
                                                            <?php echo date('d/m/Y', strtotime($edh['fecha_historial'])) ?>
                                                            <br/>
                                                            <small class="text-navy">Cod. :<?php echo $edh['cod_empleado'] ?></small>
                                                        </div>
                                                        <div class="col-xs-7 content">
                                                            <p class="m-b-xs"><strong>Empleado : <?php echo $edh['nombres'] ?> <?php echo $edh['apellidos'] ?></strong></p>
                                                            <p> Dominio : <?php echo $edh['nombre'] ?> </p>
                                                            <p> Descripcion : <?php echo $edh['descripcion_cambio'] ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="timeline-item">
                                                <div class="row">
                                                    <h3>Sin Datos</h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Tab 3-->
        <div id="tab3" class="tab-pane" style="min-height: 300px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos de la Categoria de : <strong><?php echo $empleado["nombres"] ?> <?php echo $empleado["apellidos"] ?></strong></h5>
                    <div class="ibox-tools"></div>
                </div>
                <div class="ibox-content">
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5><strong> Gestionar Cambios</strong></h5>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <form id="formularioGestionarCategoria" name="formularioGestionarCategoria" role="form" method="post">
                                            <input type="hidden" name="id_empleado" value="<?php echo $empleado["id_empleado"] ?>">
                                            <div class="control-group">
                                                <strong>Categoria Actual :</strong>
                                                <div class="controls">
                                                    <input type="text"  value="<?php echo (isset($empleado_categoria['codigo'])) ? $empleado_categoria['codigo'] : '' ?>" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <strong>Categoria Nueva :</strong>
                                                <div class="controls">
                                                    <select class="form-control m-b" id="id_categoria_nueva" name="id_categoria_nueva">
                                                        <?php foreach ($categorias as $categoria) { ?>
                                                            <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['codigo'] . " , " . $categoria['banda'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="date" class="control-label">Fecha <span class="required">*</span></label>
                                                <div class="controls">
                                                    <div class="form-group">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" id="fecha_cambio_categoria" name="fecha_cambio_categoria" class="form-control" value="<?php echo date('d/m/Y') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <strong>Salario :</strong>
                                                <div class="controls">
                                                    <input type="text" id="salario" name="salario" class="form-control">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <strong>Comentario :</strong>
                                                <div class="controls">
                                                    <textarea id="comentario" name="comentario" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <strong>Evaluador :</strong>
                                                <div class="controls">
                                                    <input type="text" id="evaluador" name="evaluador" class="form-control">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label  class="control-label">Tipo</label>
                                                <div class="controls">
                                                    <select class="form-control m-b" name="tipo" id="tipo">
                                                        <option value="0">Sin Tipo</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr class="hr-primary" />
                                            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eEmpleado')) { ?>
                                            <div class="form-actions">
                                                <div class="span12">
                                                    <div class="span6 offset3">
                                                        <button name="gestionar_categoria" value="1" id="form_submit_categoria" type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3> <strong> Historial de Cambios </strong></h3>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <?php
                                        $c = 1;
                                        if (!empty($empleado_categoria_historial)) {
                                            foreach ($empleado_categoria_historial as $ech) {
                                                ?>
                                                <div class="timeline-item">
                                                    <div class="row">
                                                        <div class="col-xs-3 date">
                                                            <i class="fa fa-file-text"></i>
                                                            <?php echo date('d/m/Y', strtotime($ech['fecha'])) ?>
                                                            <br/>
                                                            <small class="text-navy">Tipo : <?php echo ($ech['tipo']!='') ? $ech['tipo'] : "--" ?></small>
                                                        </div>
                                                        <div class="col-xs-7 content">
                                                            <p> <strong>Categoria :</strong> <?php echo $ech['codigo'] ?> | <?php echo $ech['nombre'] ?> </p>
                                                            <p> <strong>Banda :</strong> <?php echo $ech['banda'] ?> </p>
                                                            <p> <strong>Salario :</strong> <?php echo $ech['salario'] ?> </p>
                                                            <p class="m-b-xs"><strong> Tipo Calificacion :</strong> <?php echo ($ech['tipo']!='') ? $ech['tipo'] : "--" ?> - <strong>Evaluador : </strong><?php echo ($ech['evaluador']!='') ? $ech['evaluador'] : "--" ?></p>
                                                            <p> <strong>Comentario :</strong> <?php echo $ech['descripcion'] ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="timeline-item">
                                                <div class="row">
                                                    <h3>Sin Datos</h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Tab 4-->
        <div id="tab4" class="tab-pane" style="min-height: 300px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos de Tecnologias de : <strong><?php echo $empleado["nombres"] ?> <?php echo $empleado["apellidos"] ?></strong></h5>
                    <div class="ibox-tools"></div>
                </div>
                <div class="ibox-content">
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5><strong> Gestionar Cambios</strong></h5>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <form id="formularioGestionarTecnologias" name="formularioGestionarTecnologias" role="form" method="post">
                                            <input type="hidden" name="id_empleado" value="<?php echo $empleado["id_empleado"] ?>">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="control-group">
                                                        <label  class="control-label"> Tecnologia</label>
                                                        <div class="controls">
                                                            <select class="form-control m-b" name="id_tecnologia" id="id_tecnologia">
                                                                <?php
                                                                foreach ($tecnologias as $tecnologia) {
                                                                    echo '<option value="' . $tecnologia['id_tecnologia'] . '">' . $tecnologia['nombre'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="control-group">
                                                        <label  class="control-label"> Nivel</label>
                                                        <div class="controls">
                                                            <div id="rating_nivel">
                                                                <input type="radio" name="nivel" class="rating" value="1" />
                                                                <input type="radio" name="nivel" class="rating" value="2" />
                                                                <input type="radio" name="nivel" class="rating" value="3" />
                                                                <input type="radio" name="nivel" class="rating" value="4" />
                                                                <input type="radio" name="nivel" class="rating" value="5" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="control-group">
                                                        <label  class="control-label"> Experiencia</label>
                                                        <div class="controls">
                                                            <div id="rating_anios">
                                                                <input type="radio" name="anios" class="rating" value="1" />
                                                                <input type="radio" name="anios" class="rating" value="2" />
                                                                <input type="radio" name="anios" class="rating" value="3" />
                                                                <input type="radio" name="anios" class="rating" value="4" />
                                                                <input type="radio" name="anios" class="rating" value="5" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="control-group">
                                                        <label  class="control-label"> Principal</label>
                                                        <div class="controls">
                                                            <input type="radio" name="flag_principal" value="1"/>SI
                                                            <input type="radio" name="flag_principal" value="0"/>NO
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <strong>Comentario :</strong>
                                                        <div class="controls">
                                                            <textarea id="comentario" name="comentario" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="hr-primary" />
                                            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eEmpleado')) { ?>
                                            <div class="form-actions">
                                                <div class="span12">
                                                    <div class="span6 offset3">
                                                        <button name="gestionar_tecnologia" id="form_submit_tecnologia" type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3> <strong> Historial de Cambios </strong></h3>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <?php
                                        $c = 1;
                                        if (!empty($empleado_tecnologia_historial)) {
                                            foreach ($empleado_tecnologia_historial as $eth) {
                                                ?>
                                                <div class="timeline-item">
                                                    <div class="row">
                                                        <div class="col-xs-3 date">
                                                            <i class="fa fa-file-text"></i>
                                                            <?php echo date('d/m/Y', strtotime($eth['fecha'])) ?>
                                                            <br/>
                                                            <small class="text-navy"><?php echo ($eth['flag_principal'] == "1") ? "<i class='fa fa-star'></i> Principal" : "" ?></small>
                                                        </div>
                                                        <div class="col-xs-7 content">
                                                            <p class="m-b-xs"><strong>Nivel : <?php echo $eth['nivel'] ?></strong></p>
                                                            <p> Años : <?php echo $eth['anios'] ?> </p>
                                                            <p> Tecnologia : <?php echo $eth['nombre'] ?> </p>
                                                            <p> Comentario : <?php echo $eth['descripcion'] ?> </p>
                                                            <p> Grupo :  <?php echo $eth['grupo'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="timeline-item">
                                                <div class="row">
                                                    <h3>Sin Datos</h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <!--Tab 5-->
        <div id="tab5" class="tab-pane" style="min-height: 300px">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Datos de Lider de Dominio de : <strong><?php echo $empleado["nombres"] ?> <?php echo $empleado["apellidos"] ?></strong></h5>
                    <div class="ibox-tools"></div>
                </div>
                <div class="ibox-content">
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5><strong> Gestionar Cambios</strong></h5>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <form id="formularioGestionarLiderDominio" name="formularioGestionarLiderDominio" role="form" method="post">
                                            <input type="hidden" name="id_empleado" value="<?php echo $empleado["id_empleado"] ?>">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="checkbox i-checks">
                                                        <label><input id="es_lider" name="es_lider" type="checkbox" class="i-checks"><h3 id="lider_desc">Es Lider de Dominio(s) </h3></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label> Elija dominios :</label>
                                                    <div class="form-group">
                                                        <select id="dominios" name="dominios[]" class="select2" multiple="multiple" data-placeholder="Seleccione Dominios" style="width: 100%;">
                                                            <?php foreach ($dominios as $dominio) { ?>
                                                                <option value="<?php echo $dominio['id_dominio'] ?>">
                                                                    <?php echo $dominio['nombre'] ?>
                                                                </option>
                                                            <?php } ?>   
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="control-group">
                                                        <label for="date" class="control-label">Fecha <span class="required">*</span></label>
                                                        <div class="controls">
                                                            <div class="form-group">
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input type="text" id="fecha_lider_dominio" name="fecha_lider_dominio" class="form-control" value="<?php echo !empty($empleado_lider) ? date('d-m-Y', strtotime($empleado_lider["fchRg"])) : "" ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eEmpleado')) { ?>
                                                <div class="col-md-3">
                                                    <div class="form-actions">
                                                        <div class="span12">
                                                            <div class="span6 offset3">
                                                                <button name="gestionar_lider_dominio" id="form_submit_lider_dominio" type="button" class="btn btn-success"><i class="fa fa-edit"></i> Guardar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content">
                        <div class="row animated fadeInRight">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3> <strong> Historial de Cambios </strong></h3>
                                    </div>
                                    <div class="ibox-content inspinia-timeline">
                                        <?php
                                        $c = 1;
                                        if (!empty($empleado_lider_dominio_historial)) {
                                            foreach ($empleado_lider_dominio_historial as $eld) {
                                                ?>
                                                <div class="timeline-item">
                                                    <div class="row">
                                                        <div class="col-xs-3 date">
                                                            <i class="fa fa-file-text"></i>
                                                            <?php echo date('d/m/Y', strtotime($eld['fchRg'])) ?>
                                                            <br/>
                                                        </div>
                                                        <div class="col-xs-7 content">
                                                            <p class="m-b-xs"><strong>Dominios : <?php echo $eld['dominios'] ?></strong></p>
                                                            <p><strong> Fecha : <?php echo date('d-m-Y', strtotime($eld['fchRg'])) ?> </strong>, actualizado al : <?php echo date('d-m-Y H:m:i', strtotime($eld['fchAc'])) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="timeline-item">
                                                <div class="row">
                                                    <h3>Sin Datos</h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- Data picker -->
<script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/js/plugins/select2/select2.full.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    var es_lider = $('#es_lider').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $("#dominios").select2();
    var dominios = $(".select2").select2({
        language: "es"
    });
    <?php if(isset($empleado_lider_dominios) && is_array($empleado_lider_dominios) && !empty($empleado_lider_dominios)) { ?>
        var dominiosSeleccionados = <?php echo json_encode($empleado_lider_dominios); ?>; 
        dominios.val(dominiosSeleccionados).trigger("change");
        $('#lider_desc').html("Es Lider de Dominio(s).");
        $('#es_lider').iCheck('check');
    <?php } else { ?>
        $('#es_lider').iCheck('uncheck');
        $('#lider_desc').html("No es Lider de Dominio(s).");
        $('#dominios').prop('disabled', true);
    <?php } ?>    
        
     $('#es_lider').on('ifChanged', function (event) {
        if (event.target.checked) {
            $('#dominios').prop('disabled', false);
            $('#lider_desc').html("Es Lider de Dominio(s).");
            $('#dominios').focus();
        } else {
            $('#dominios').prop('disabled', true);
            $('#lider_desc').html("No es Lider de Dominio(s).");
            $('#form_submit_lider_dominio').focus();
        }
    });   
    $('#form_submit_lider_dominio').on('click', function () {
        var boton_submit = this;
        var es_lider = $('#es_lider').iCheck('update')[0].checked;
        if(es_lider){
            swal({
                title: "Registrar/Actualizar Lider de Dominio",
                text: "¿Esta seguro que desea guardar esta informacion? ",
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
        }else{
            swal({
                title: "Actualizar Lider de Dominio",
                text: "¿Esta seguro que desea guardar esta informacion? . Eliminara todos los dominios de los cuales es Lider.",
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
        }
    });     
    $("#salario").inputmask("9999.99");
    $("#fecha_cambio_dominio").inputmask("d-m-y");
    $("#fecha_cambio_categoria").inputmask("d-m-y");
    $("#fecha_lider_dominio").inputmask("d-m-y");
    $('#rating_nivel').rating(function (vote, event) {});
    $('#rating_anios').rating(function (vote, event) {});
    var start = new Date();
    var end = new Date(new Date().setYear(start.getFullYear() + 2));//HASTA 2 AÑOS
    var fechaUltimoCambioDominio = '<?php echo !empty($empleado_dominio) ? date('d-m-Y', strtotime($empleado_dominio['fecha_cambio_dominio'])) : "" ?>';
    fechaUltimoCambioDominio = ((fechaUltimoCambioDominio == '') ? (new Date(new Date().setYear(start.getFullYear() - 2))) : fechaUltimoCambioDominio);
    $('#fecha_cambio_dominio').datepicker({
        format: "dd-mm-yyyy",
        startDate: fechaUltimoCambioDominio,
        endDate: end,
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: false,
        todayHighlight: true,
        minDate: 'today'
    });
    var fechaUltimoCambioCategoria = '<?php echo !empty($empleado_categoria) ? date('d-m-Y', strtotime($empleado_categoria['fecha'])) : "" ?>';
    fechaUltimoCambioCategoria = ((fechaUltimoCambioCategoria == '') ? (new Date(new Date().setYear(start.getFullYear() - 2))) : fechaUltimoCambioCategoria);
    $('#fecha_cambio_categoria').datepicker({
        format: "dd-mm-yyyy",
        startDate: fechaUltimoCambioCategoria,
        endDate: end,
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: false,
        todayHighlight: true,
        minDate: 'today'
    });
    var fechaUltimoCambioLiderDominio = '<?php echo !empty($empleado_lider) ? date('d-m-Y', strtotime($empleado_lider["fchRg"])) : "" ?>';
    fechaUltimoCambioLiderDominio = ((fechaUltimoCambioLiderDominio == '') ? (new Date(new Date().setYear(start.getFullYear() - 2))) : fechaUltimoCambioLiderDominio);
    $('#fecha_lider_dominio').datepicker({
        format: "dd-mm-yyyy",
        startDate: fechaUltimoCambioLiderDominio,
        endDate: end,
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: false,
        todayHighlight: true,
        minDate: 'today'
    });
});
</script>