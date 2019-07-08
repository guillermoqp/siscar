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
        <div class="col-lg-4">
            <div class="contact-box">
                <a href="<?php echo base_url()."empleados/visualizar/".$edd["id_empleado"] ?>">
                <div class="col-sm-4">
                    <div class="text-center">
                        <img alt="image" class="img-circle m-t-xs img-responsive" src="https://cts.everis.int/rest/user/<?php echo $edd["cod_empleado"] ?>/photo?square=true">
                        <div class="m-t-xs font-bold"><?php echo $edd["nombrerol"] ?></div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h3><strong><?php echo $edd["nombres"] ?> <?php echo $edd["apellidos"] ?></strong></h3>
                    <p><i class="fa fa-calendar-o"></i> <?php echo $edd["fecha_ingreso"] ?></p>
                    <address>
                        <strong><?php echo $edd["nombrecategoria"] ?></strong><br>
                        <strong><?php echo $edd["nombrerol"] ?></strong><br>
                        Tiempo : <?php echo $edd["tiempo"] ?><br>
                    </address>
                </div>
                <div class="clearfix"></div>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</div