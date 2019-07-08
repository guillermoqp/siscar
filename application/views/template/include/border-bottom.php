<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-top-links navbar-right" id="notificaciones">
            <li><a href="#" onclick="buscar_cumpleanios()"><span class="label label-info" id="span_class"><i class="fa fa-calendar-o"></i>Alertas CUMPLEAÑOS </span></a></li>
            <li><a href="#"><span class="label label-warning-light"><?php print($this->session->userdata('nombre_permiso')) ?></span></a></li>
            <li class=""><a title="" href="<?php print(base_url("miCuenta")) ?>">  <i class="fa fa-user-md"></i> <span class="text">Mi Cuenta</span></a></li>
            <li class="dropdown" id="notificacionesNoLlenas">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i><span class="label label-primary" id="nroSeguimientos"></span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li><ul class="menu" id="seguimientos"></ul></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="<?php print(base_url("demanda/seguimiento")) ?>">
                                <strong>Ver todos</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="#" onclick="salir()"><i class="fa fa-sign-out"></i> Salir</a></li>
        </ul>
    </nav>
</div>