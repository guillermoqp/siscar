<!DOCTYPE html>
<html lang="es-PE">
    <!-- Header: Importa CSS, JS de Plantilla Base-->
    <?php $this->load->view("template/include/header"); ?>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <!-- nav-header -->
                        <?php $this->load->view("template/include/nav-header"); ?>
                        <!-- menu -->
                        <?php $this->load->view("template/include/menu"); ?>
                        <hr class="hr-primary" />
                        <li><a href="#" onclick="salir()"><i class="fa fa-sign-out"></i> Salir</a></li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg">
                <!-- border-bottom : Menu Opciones Superior Derecha -->
                <?php $this->load->view("template/include/border-bottom"); ?>
                <!-- breadcrumb : Enlaces -->
                <?php $this->load->view("template/include/breadcrumb"); ?>
                <div class="row">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <!-- Vistas Dinamicas : Vistas de Cada Controlador -->
                        <?php if (isset($view)){ $this->load->view($view); } ?>
                    </div>
                </div>
                <!-- footer : Datos de Aplicacion -->
                <?php $this->load->view("template/include/footer"); ?>
            </div>
        </div>
        <!-- scriptsFooter: Importa JS de Plantilla Base y Funcionalidades -->
        <?php $this->load->view("template/include/scriptsFooter"); ?>
    </body>
</html>