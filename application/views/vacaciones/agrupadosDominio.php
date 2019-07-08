 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">          
        <?php if (
                $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'vVacaciones') &&
                $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'aVacaciones') &&
                $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'eVacaciones') &&
                $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'dVacaciones') 
                ) { ?>
        <?php foreach ($dominios as $dominio) { ?>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-title">
                    <a href="<?php echo base_url()."vacaciones/dominio/".$dominio["id_dominio"] ?>"><span class="label label-success pull-right">
                        <?php echo $dominio['nombre'] ?></span> + Gestionar Vacaciones del Dominio 
                    </a>
                    <h5> <?php echo $dominio['nombre'] ?> </h5>
                </div>
                <div class="ibox-content">
                    <div class="team-members">
                    <?php foreach ($dominio['empleados'] as $empleado) { ?>
                        <a href="<?php echo base_url()."empleados/visualizar/".$empleado["id_empleado"] ?>">
                            <img alt="member" class="img-circle" src="https://cts.everis.int/rest/user/<?php echo $empleado["cod_empleado"] ?>/photo?square=true" width="60" height="60">
                        </a>
                    <?php } ?>
                    </div>        
                    <h4>Dominio : <?php echo $dominio['nombre'] ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($dominio['empleados'] as $empleado) { ?>
                                <li><?php echo $empleado['nombres']." ".$empleado['apellidos'] ?> - <span class="label label-primary"><?php echo $empleado['nombrecategoria'] ?></span></li>
                            <?php } ?>
                        </div>
                     </div> 
                        <span> Personas </span>
                        <div class="stat-percent"><?php echo count($dominio['empleados']) ?></div>
                        <div class="progress progress-mini">
                            <div style="width: <?php echo count($dominio['empleados']) ?>%;" class="progress-bar"></div>
                        </div>
                    <div class="row  m-t-sm">
                        <div class="col-sm-4">
                            <div class="font-bold"> Personas</div>
                            <?php echo count($dominio['empleados']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php } } else { ?>
        <?php foreach ($dominios as $dominio) { ?>
        <?php   if ($this->liderdominios->checkPermiso($this->session->userdata('empleado_lider_dominios'),$dominio["id_dominio"])) { ?>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-title">
                    <a href="<?php echo base_url()."vacaciones/dominio/".$dominio["id_dominio"] ?>"><span class="label label-success pull-right">
                        <?php echo $dominio['nombre'] ?></span> + Gestionar Vacaciones del Dominio 
                    </a>
                    <h5> <?php echo $dominio['nombre'] ?> </h5>
                </div>
                <div class="ibox-content">
                    <div class="team-members">
                    <?php foreach ($dominio['empleados'] as $empleado) { ?>
                        <a href="<?php echo base_url()."empleados/visualizar/".$empleado["id_empleado"] ?>">
                            <img alt="member" class="img-circle" src="https://cts.everis.int/rest/user/<?php echo $empleado["cod_empleado"] ?>/photo?square=true" width="60" height="60">
                        </a>
                    <?php } ?>
                    </div>        
                    <h4>Dominio : <?php echo $dominio['nombre'] ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($dominio['empleados'] as $empleado) { ?>
                                <li><?php echo $empleado['nombres']." ".$empleado['apellidos'] ?> - <span class="label label-primary"><?php echo $empleado['nombrecategoria'] ?></span></li>
                            <?php } ?>
                        </div>
                     </div> 
                        <span> Personas </span>
                        <div class="stat-percent"><?php echo count($dominio['empleados']) ?></div>
                        <div class="progress progress-mini">
                            <div style="width: <?php echo count($dominio['empleados']) ?>%;" class="progress-bar"></div>
                        </div>
                    <div class="row  m-t-sm">
                        <div class="col-sm-4">
                            <div class="font-bold"> Personas</div>
                            <?php echo count($dominio['empleados']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } ?>
    </div>
</div>