<?php if($this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"vDashboard")) { ?>
<li class="<?php print(isset($menuPanel)?"active":"") ?>"><a href="<?php print(base_url()) ?>"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vEmpleado')) { ?>
<li class="<?php print(isset($menuEmpleados)?"active":"") ?>"><a href="<?php print(base_url("empleados")) ?>"><i class="fa fa-users"></i><span> Empleados</span></a></li>
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vVacaciones')) { ?>    
<li class="<?php print(isset($menuVacaciones)?"active":"") ?>"><a href="<?php print(base_url("vacaciones")) ?>"><i class="fa fa-calendar-o"></i><span> Vacaciones</span></a></li>
<?php } ?> 

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vLecAprendidas')) { ?>    
<li class="<?php print(isset($menuLeccionesAprendidas)?"active":"") ?>"><a href="<?php print(base_url("lecciones_aprendidas")) ?>"><i class="fa fa-file"></i><span> Lecciones Aprendidas</span></a></li>   
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'vDemanda')) { ?>
<li class="<?php print(isset($menuDemanda)?'active':'') ?>">
    <a><i class="icon icon-next"></i><span class="nav-label"><i class="fa fa-line-chart"></i>  Demanda</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="<?php print(isset($menuPrevision)?'active':'') ?>"><a href="<?php print(base_url("demanda/prevision")) ?>"><i class="fa fa-calculator"></i> Prevision</a></li>
        <li class="<?php print(isset($menuSeguimiento)?'active':'') ?>"><a href="<?php print(base_url("demanda/seguimiento")) ?>"><i class="fa fa-bar-chart-o"></i> Seguimiento</a></li>
    </ul>
</li>
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vPresupuestoAnual')) { ?>
<li class="<?php print(isset($menuPresupuestoAnual)?'active':'') ?>">
    <a><i class="icon icon-next"></i><span class="nav-label"><i class="fa fa-money"></i> Presupuesto Anual</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class=""><a href="<?php print(base_url("presupuesto_anual/registro")) ?>"><i class="fa fa-arrow-circle-o-right"></i> Registro del Presupuesto </a></li>
    </ul>
</li>
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vReporteComparativo')) { ?>
<li class="<?php print(isset($menuReportes)?'active':'') ?>">
    <a><i class="fa fa-file-o"></i><span> Reportes</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="<?php print(isset($menuReporteComparativo)?'active':'') ?>"><a href="<?php print(base_url("reportes/comparativo")) ?>"><i class="fa fa-file-o"></i> Comparativo de presupuesto, prevision y demanda real</a></li>
        <li class="<?php print(isset($menuReporteSeguimientoDemanda)?'active':'') ?>"><a href="<?php print(base_url("reportes/seguimiento_demanda")) ?>"><i class="fa fa-line-chart"></i> Seguimiento de demanda</a></li>
        <li class="<?php print(isset($menuReporteResultadosEconomicos)?'active':'') ?>"><a href="<?php print(base_url("reportes/resultados_economicos")) ?>"><i class="fa fa-dollar"></i> Resultados economicos</a></li>
    </ul>
</li>
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'cUsuario') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'cPermiso') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'cBackUp')) { ?>
    <li class="<?php print(isset($menuConfiguraciones)?'active':'') ?>">
        <a>
            <i class="fa fa-cogs"></i> Configuraciones</span><span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'cUsuario')) { ?>
                <li class="<?php print(isset($menuUsuarios)?'active':'') ?>"><a href="<?php print(base_url("usuarios")) ?>"><i class="fa fa-users"></i> Usuarios</a></li>
                <?php } ?>
                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'cPermiso')) { ?>
                <li class="<?php print(isset($menuPermisos)?'active':'') ?>"><a href="<?php print(base_url("permisos")) ?>"><i class="fa fa-unlock-alt"></i> Permisos</a></li>
                <?php } ?>
                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'cBackup')) { ?>
                <li class="<?php print(isset($menuBackUp)?'active':'') ?>"><a href="#" onclick="backUp()"><i class="fa fa-download"></i> Backup</a></li>
                <?php } ?>
        </ul>
    </li>
<?php } ?>

<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mDominios') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mCategorias') ||
    $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mTecnologias') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mClientes') ||
    $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mEtiquetas') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mRoles') || 
    $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mInstitucionEducativa')    ) { ?>
    <li class="<?php print(isset($menuMantenedores)?'active':'') ?>">
        <a>
            <i class="fa fa-table"></i> Mantenedores</span><span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mDominios')) { ?>
                <li class="<?php print(isset($menuDominios)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/dominios")) ?>"><i class="fa fa-bars"></i> Dominios</a></li>
            <?php } ?>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mCategorias')) { ?>
                <li class="<?php print(isset($menuCategorias)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/categorias")) ?>"><i class="fa fa-user-plus"></i> Categorias</a></li>
            <?php } ?>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mTecnologias')) { ?>
                <li class="<?php print(isset($menuTecnologias)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/tecnologias")) ?>"><i class="fa fa-tasks"></i> Tecnologias</a></li>
            <?php } ?>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mClientes')) { ?>
                <li class="treeview <?php print(isset($menuClientes)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/clientes")) ?>"><i class="fa fa-cc-discover"></i> Clientes</a></li>
            <?php } ?>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mEtiquetas')) { ?>
                <li class="treeview <?php print(isset($menuEtiquetas)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/etiquetas")) ?>"><i class="fa fa-tags"></i> Etiquetas/Procesos</a></li>
            <?php } ?> 
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mRoles')) { ?>
                <li class="treeview <?php print(isset($menuRoles)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/roles")) ?>"><i class="fa fa-sitemap"></i> Roles</a></li>
            <?php } ?>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mInstitucionEducativa')) { ?>
                <li class="treeview <?php print(isset($menuInstitucionEducativa)?'active':'') ?>"><a href="<?php print(base_url("mantenedores/institucion_educativa")) ?>"><i class="fa fa-home"></i> Institucion Educativa</a></li>
            <?php } ?>
        </ul>
    </li>
<?php } ?>

<li class="<?php print(isset($menuImportar)?"active":"") ?>">
    <a href="#"><i class="icon icon-next"></i><span class="nav-label"><i class="fa fa-file-excel-o"></i> Importar</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li class="<?php print(isset($subMenuImportarOT)?"active":"") ?>"><a href="<?php print(base_url("importar/importar_ot")) ?>"><i class="fa fa-file-excel-o"></i> Importar OT</a></li>

        <li class="<?php print(isset($subMenuNestable)?"active":"") ?>"><a href="<?php print(base_url("importar/nestable")) ?>"><i class="fa fa-list"></i> Nestable</a></li>
    </ul>
</li>