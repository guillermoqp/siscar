 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3 class="m-b-xs"><strong>Dominio :</strong> <?php echo $dominio[0]["nombre"] ?></h3>
                </div>
                <div class="ibox-content">
                    <h4 class="m-b-xs"><strong>Cliente :</strong> <?php echo $dominio[0]["nombrecliente"] ?> - <?php echo $dominio[0]["descripcioncliente"] ?></h4>
                    <p>Fecha Registro : <?php echo $dominio[0]["fecha"] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($dominio["empleado_dominio_detalle"] as $edd) { ?>
        <div class="col-lg-3">
            <div class="contact-box center-version">
                <a href="<?php echo base_url()."empleados/visualizar/".$edd["id_empleado"] ?>">
                    <img alt="image" class="img-circle" src="https://cts.everis.int/rest/user/<?php echo $edd["cod_empleado"] ?>/photo?square=true" width="90" height="90">
                    <h3 class="m-b-xs"><strong><?php echo $edd["nombres"] ?>  <?php echo $edd["apellidos"] ?></strong></h3>
                    <div class="font-bold"><span class="label label-primary"><?php echo $edd["nombrecategoria"] ?></span></div>
                    <address class="m-t-md"> 
                        <strong><?php echo $edd["nombrerol"] ?></strong><br>
                        Tiempo : <?php echo $edd["tiempo"] ?>
                        <abbr title="Phone"></abbr>
                    </address>
                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white" href="<?php echo base_url()."empleados/visualizar/".$edd["id_empleado"] ?>"><i class="fa fa-eye"></i>  Visualizar </a>
                        <a class="btn btn-xs btn-white" href="<?php echo base_url()."empleados/editar/".$edd["id_empleado"] ?>"><i class="fa fa-edit"></i>  Editar </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div