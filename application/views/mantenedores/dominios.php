<!-- jqGrid -->
<link href="<?php echo base_url() ?>assets/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jqGrid/jqgrid-responsive.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Mantenedor de Dominios</h5>
                </div>
                <div class="ibox-content">
                    <div class="jqGrid_wrapper">
                        <table id="dominios"></table>
                        <div id="pager"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/plugins/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jqGrid/jquery.jqGrid.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jqGrid/i18n/grid.locale-es.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script>
function ChangejQGridDesign(table, pager) {
    jQuery(table).jqGrid('navGrid', pager, {
        edit: true, add: true, del: true,
        search: true,
        searchicon: 'ace-icon fa fa-search orange',
        refresh: true,
        refreshicon: 'ace-icon fa fa-refresh green',
        view: true,
        viewicon: 'ace-icon fa fa-search-plus grey'
    });
    jQuery(table).jqGrid('inlineNav', pager,
        {  //navbar options
            edit: true,
            editicon: 'ace-icon fa fa-pencil blue',
            add: true,
            addicon: 'ace-icon fa fa-plus-circle purple',
            del: true,
            delicon: 'ace-icon fa fa-trash-o red'
        });
    var replacement =
    {
        'ui-icon-seek-first': 'ace-icon fa fa-angle-double-left bigger-140',
        'ui-icon-seek-prev': 'ace-icon fa fa-angle-left bigger-140',
        'ui-icon-seek-next': 'ace-icon fa fa-angle-right bigger-140',
        'ui-icon-seek-end': 'ace-icon fa fa-angle-double-right bigger-140'
    };
    $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function () {
        var icon = $(this);
        var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
        if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
    });
    $('.navtable .ui-pg-button').tooltip({ container: 'body' });
    $(table).find('.ui-pg-div').tooltip({ container: 'body' });
    var $grid = $(table),
            
    newWidth = $grid.closest(".ui-jqgrid").parent().width();
    newHeight = $grid.closest(".ui-jqgrid").parent().height();
    
    $grid.jqGrid("setGridWidth", newWidth, true);
    $grid.jqGrid("setGridHeight", newHeight, true);
    
    $(window).on("resize", function () {
        var $grid = $(table),
            newWidth = $grid.closest(".ui-jqgrid").parent().width();
        $grid.jqGrid("setGridWidth", newWidth, true);
    });
}
</script>
<script>
function callback(data,clientes) {
    $.each(data, function (i, item) {
        clientes += item.id_cliente + ":" + item.nombre+";";
    });
    clientes = clientes.substring(0,clientes.length-1);
    var fecha = $('#fecha').datepicker({
        format: "yyyy-mm-dd",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    var lastsel3;
    jQuery("#dominios").jqGrid({
        url: "<?php echo base_url().'mantenedores/cargar_dominios' ?>",
        mtype: "post",
        datatype: "json",
        colNames: ['Nombre', 'Fecha', 'Estado', 'Descripcion', 'Cliente'],
        colModel: [
            {name: 'nombre', index: 'nombre', width: 100, align: "left", editable: true},
            {name: 'fecha', index: 'fecha', width: 90, editable: true, sorttype: "date", editable: true},
            {name: 'estado', index: 'estado', width: 60, editable: true, edittype: "checkbox", editoptions: {value: "1:0"}},
            {name: 'descripcion', index: 'descripcion', width: 150, align: "left", editable: true, sortable: false, edittype: "textarea"},
            {name: 'fk_cliente', index: 'fk_cliente', width: 90, editable: true, edittype: "select", editoptions: {value: clientes}}
        ],
        onSelectRow: function (id) {
            if (id && id !== lastsel3) {
                jQuery('#dominios').jqGrid('restoreRow', lastsel3);
                jQuery('#dominios').jqGrid('editRow', id, true, fecha);
                lastsel3 = id;
            }
        },
        regional : 'es',
        rownumbers: true,
        rowNum: 10,
        rowList: [10, 20, 30],
        pager: '#pager',
        sortname: 'nombre',
        autowidth: true,
        viewrecords: true,
        gridview: true,
        ondblClickRow: function (id) {
            $("#dominios").editGridRow(id, {closeAfterEdit: true, mtype: 'POST'});
        },
        sortorder: "desc",
        editurl: "<?php echo base_url().'mantenedores/crud_dominios' ?>", //URL Process CRUD
        multiselect: false,
        caption: "Dominios Registrados",
        ajaxRowOptions: {
            success: function () {
                $("#dominios").trigger("reloadGrid");
            }
        },
        gridComplete: function () {
            var ids = jQuery("#dominios").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
                var cl = ids[i];
                var data = $("#dominios").jqGrid().getRowData(cl);
                if (data.IsBundled == "true") {
                    be = "<input type='button' value='Ver Detalles' onclick='BundleManage(" + data.id + ",\"" + data.nombre + "\")'  />";
                    jQuery("#dominios").jqGrid('setRowData', ids[i], { act: be });
                }
                else {
                    be = "<input type='button' value='Ver Detalles 2' onclick='ManageRecurring(" + data.id + ",\"" + data.nombre + "\")'  />";
                    jQuery("#dominios").jqGrid('setRowData', ids[i], { act: be });
                }
            }
        }
    });
    ChangejQGridDesign("#dominios","#pager");
}
</script>
<script>
$(document).ready(function () {
    var clientes = "";
    $.ajax({
        url: "<?php echo base_url().'mantenedores/get_clientes_json' ?>",
        type: "GET",
        dataType: 'json',
        async: true,
        success: function (data) {
          callback(data,clientes);
       }
    });
});
</script>
