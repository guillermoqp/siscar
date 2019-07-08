<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h2><?php print($dataResultado["resultados"]) ?> Resultados encontrados para : <span class="text-navy"><?php print($dataResultado["asunto"]) ?></span>
                </h2>
                <small>Tiempo de Consulta (<?php print($dataResultado["tiempo"]) ?> seg.)</small>
                <div class="search-form">
                    <form method="POST">
                        <div class="input-group">
                            <input type="text" placeholder="Ingrese un tema/etiqueta/proceso" id="asunto" name="asunto" class="form-control input-lg">
                            <div class="input-group-btn">
                                <button class="btn btn-lg btn-primary" name="buscar_leccion" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="hr-line-dashed"></div>
                <?php foreach ($dataResultado["lecciones"] as $leccion) { ?>
                <div class="search-result">
                    <h3><a href="#"><?php print($leccion["nombre"]) ?></a></h3>
                    <a class="search-link" href="<?php print(base_url($leccion['ruta_archivo'])) ?>" download target="_blank"> <i class="fa fa-download"></i> <i class="fa fa-clipboard"></i> Descargar Archivo Adjunto </a>
                    <p><?php print($leccion["descripcion"]) ?></p>
                    <?php print($leccion["etiquetas"]) ?>
                    <p>Fecha : <?php print(date_format(date_create($leccion["fchAc"]),'d-m-Y H:i:s')) ?>
                        <br><i class="fa fa-users"></i> <?php print($leccion["nombredominio"]) ?>
                        <br><i class="fa fa-user"></i> <?php print($leccion["nombreusuario"]) ?>
                    </p>
                </div>
                <?php } ?>
                <div class="hr-line-dashed"></div>
            </div>
        </div>
    </div>
</div>