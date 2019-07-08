<div class="col-md-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Mi Cuenta</h5>
        </div>
        <div>
            <div class="ibox-content no-padding border-left-right">
                <center>
                    <?php if($this->session->userdata("foto")!="") { ?>
                        <!-- src="https://cts.everis.int/rest/user/144193/photo?square=true" -->
                        <img src="<?php print(base_url($this->session->userdata("foto"))) ?>" alt="Imagen Usuario" class="img-responsive" width="90" height="90">
                    <?php } else { ?>     
                        <img src="<?php print(base_url("assets/img/user.png")) ?>" alt="Imagen Usuario" width="90" height="90" class="img-responsive">
                    <?php }  ?>
                </center>
                <!-- <?php if(isset($empleado)&&is_array($empleado)&&!empty($empleado)) { ?>
                    <img src="https://cts.everis.int/rest/user/<?php print($empleado["cod_empleado"]) ?>/photo?square=true" alt="Imagen Usuario" class="img-responsive" width="90" height="90">
                <?php } else { ?>
                    <img src="<?php print(base_url("assets/img/user.png")) ?>" alt="Imagen Usuario" class="img-responsive">
                <?php }  ?> -->
            </div>
            <div class="ibox-content profile-content">
                <h4><strong>Nombre: <?php print($usuario->nombre) ?></strong></h4>
                <p><i class="fa fa-calendar"></i> Fecha Registro : <?php print($usuario->fecha) ?></p>
                <h5><span class="label label-primary"><?php print(($usuario->estado==1?"Activo":"Inactivo")) ?></span></h5>
                <div class="row m-t-lg">
                    <?php if(isset($empleado)&&is_array($empleado)&&!empty($empleado)) { ?>
                        <h3><strong>Nombres :</strong> <?php print($empleado["nombres"]) ?><?php print($empleado["apellidos"]) ?></h3>
                        <h3><strong>Codigo :</strong> <?php print($empleado["cod_empleado"]) ?></h3>
                        <h3><strong>Fecha Ingreso : </strong><?php print($empleado["fecha_ingreso"]) ?></h3>
                        <?php if(isset($nombresDominios)&&$nombresDominios!=""&&strlen($nombresDominios)>0) { ?>
                            <h3><strong>Lider de Dominios : </strong><?php print($nombresDominios) ?></h3>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Cambiar Password - SISCAR</h5>
        </div>
        <div class="ibox-content">
            <div>
                <div class="feed-activity-list">
                    <div class="feed-element">
                        <form id="formPassword" action="<?php print(base_url("siscar/modificarPassword")) ?>" method="POST">
                            <div class="col-sm-12">
                                <label for="">Password Actual : </label>
                                <input class="form-control" type="password" id="passwordAnt" name="passwordAnt" class="span12" />
                            </div>
                            <div class="col-sm-12">
                                <label for="">Nuevo Password : </label>
                                <input class="form-control" type="password" id="password" name="password" class="span12" />
                            </div>
                            <div class="col-sm-12">
                                <label for="">Confirmar Password : </label>
                                <input class="form-control" type="password" name="passwordConf" class="span12" />
                            </div>
                            <hr class="hr-primary" />
                            <div class="col-sm-12 center-block">
                                <button type="submit" class="btn btn-primary btn-block m"><i class="fa fa-edit"></i> Cambiar Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#formPassword').validate({
        rules: {
            passwordAnt: {required: true},
            password: {required: true},
            passwordConf: {equalTo: "#password"}
        },
        messages: {
            passwordAnt: {required: 'Campo Requerido.'},
            password: {required: 'Campo Requerido.'},
            passwordConf: {equalTo: 'Las Contraseñas no concuerdan.'}
        }
    });
});
</script>