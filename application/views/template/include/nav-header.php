<li class="nav-header">
    <div class="dropdown profile-element">
        <span>
            <?php if($this->session->userdata("foto")!="") { ?>
                <img src="<?php print(base_url($this->session->userdata("foto"))) ?>" alt="Imagen Usuario" class="img-responsive" width="90" height="90">
            <?php } else { ?>     
                <img src="<?php print(base_url("assets/img/user.png")) ?>" alt="Imagen Usuario" width="90" height="90" class="img-responsive">
            <?php }  ?>
        </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear"> 
                <span class="block m-t-xs"><strong class="font-bold"></strong>
                    <span class="label label-success"><?php print($this->session->userdata("logueado")==TRUE?"Activo":"No Activo") ?></span>   
                </span>
                <span class="text-muted text-xs block">
                    <?php print($this->session->userdata("nombre_usuario")) ?><b class="caret"></b>
                    <span class="label label-warning-light"><?php print($this->session->userdata("nombre_permiso")) ?></span>   
                </span>
            </span>
        </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="<?php print(base_url("miCuenta")) ?>">Mi Cuenta</a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="salir()"><i class="fa fa-sign-out"></i> Salir</a></li>
        </ul>
    </div>
    <div class="logo-element">CAR-T</div>
</li>