<div class="row">
	<div class="col-md-4">
	    <div id="nestable-menu">
	        <button type="button" data-action="expand-all" class="btn btn-white btn-sm">Expandir</button>
	        <button type="button" data-action="collapse-all" class="btn btn-white btn-sm">Colapsar</button>
	    </div>
	</div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Grupos de Objetos</h5>
            </div>
            <div class="ibox-content">
                <p  class="m-b-lg">
                    <strong>Seleccione</strong> Objetos.
                </p>
                <div class="dd" id="grupos">
                    <ol class="dd-list">
                    <?php for ($i=1;$i<=4;$i++) { ?>
                        <li class="dd-item" data-id="<?php print($i) ?>">
                            <div class="dd-handle">GrupoObjeto<?php print($i) ?></div>
                            <ol class="dd-list">
                                <?php for ($j=1;$j<=rand(1,5);$j++) { ?> 
                                <li class="dd-item" data-id="<?php print($j) ?>" id="<?php print($j) ?>">
                                    <div class="dd-handle"><span class="pull-right"><a class="button-delete text-danger" id="<?php print($j) ?>"><i class="fa fa-close"></i></a></span>Objeto<?php print($j) ?></div>
                                </li>
                                <?php }  ?>
                            </ol>
                        </li>
                    <?php }  ?> 
                    </ol>
                </div>
                <div class="m-t-md">
                    <h5>Salida Grupos</h5>
                </div>
                <textarea id="grupos-output" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Formulario</h5>
            </div>
            <div class="ibox-content">
            	<form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
               	<p class="m-b-lg">Objetos Formulario
               		<button type="submit" name="guardarFormulario" value="guardarFormulario" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
               	</p>	
                <div class="dd" id="formulario">
                    <ol class="dd-list">
                    <?php for ($i=1;$i<=6;$i++) { ?>
                        <li class="dd-item" data-id="<?php print($i) ?>">
                        	<input name="grupo_<?php print($i) ?>" type="hidden"/>
                            <div class="dd-handle"><span class="label label-info"><i class="fa fa-users"></i></span>GrupoFormulario<?php print($i) ?></div>        
                            <ol class="dd-list">
                                <?php for ($j=1;$j<=rand(1,8);$j++) { ?> 
                                <li class="dd-item" data-id="<?php print($j) ?>" id="<?php print($j) ?>">
                                    <div class="dd-handle"><span class="pull-right"><a class="button-delete text-danger" id="<?php print($j) ?>"><i class="fa fa-close"></i></a></span> <span class="label label-info"><i class="fa fa-cog"></i></span> Objeto<?php print($j) ?></div>
                                    <input name="objeto_<?php print($j) ?>" type="hidden"/>
                                </li>
                                <?php }  ?>
                            </ol>
                        </li>
                    <?php }  ?> 
                    </ol>
                    </form>
                </div>
                <div class="m-t-md">
                    <h5>Salida Formulario</h5>
                </div>
                <textarea id="formulario-output" class="form-control"></textarea>
            </div>
        </div>
    </div>
 </div>
<!-- Nestable List -->
<script src="<?php print(base_url("assets/js/plugins/nestable/jquery.nestable.js")) ?>"></script>
<script>
$(document).ready(function(){
var updateOutput = function (e) {
	var list = e.length ? e : $(e.target),
	     output = list.data('output');
	if (window.JSON) {
	 output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
	} else {
	 output.val('JSON browser support required for this demo.');
	}
};
opcionesFormulario = {group:1,maxDepth:2,scroll:true,protectRoot:true,maxLevels:2};
$('#grupos').nestable(opcionesFormulario).on('change',updateOutput);
$('#formulario').nestable(opcionesFormulario).on('change',updateOutput);

updateOutput($('#grupos').data('output', $('#grupos-output')));
updateOutput($('#formulario').data('output', $('#formulario-output')));
$('#nestable-menu').on('click', function (e) {
	var target = $(e.target),
	     action = target.data('action');
	if (action === 'expand-all') {
	 $('.dd').nestable('expandAll');
	}
	if (action === 'collapse-all') {
	 $('.dd').nestable('collapseAll');
	}
});

});
</script>
