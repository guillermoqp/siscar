<!-- jqGrid -->
<link href="<?php echo base_url() ?>assets/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jqGrid/jqgrid-responsive.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<style>
#categorias {
    top: 900px !important;
}
</style>
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Mantenedor de Categorias</h5>
                </div>
                <div class="ibox-content">
                    <div class="jqGrid_wrapper">
                        <table id="categorias"></table>
                        <div id="pager"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jqGrid -->
<script src="<?php echo base_url() ?>assets/js/plugins/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jqGrid/jquery.jqGrid.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jqGrid/i18n/grid.locale-es.js"></script>
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
$(document).ready(function () {
    var niveles = {0: '0', 1: '1', 2: '2', 3: '3', 4: '4', 5: '5', 6: '6', 7: '7', 8: '8', 9: '9', 10: '10', 99: '99'};
    jQuery("#categorias").jqGrid({
        url: "<?php echo base_url() . 'mantenedores/cargar_categorias' ?>",
        mtype: "post",
        datatype: "json",
        colNames: ['Codigo', 'Nombre' , 'Banda Salarial', 'Nivel'],
        colModel: [
            {name: 'codigo', index: 'codigo', width: 100, align: "left", editable: true},
            {name: 'nombre', index: 'nombre', width: 100, align: "left", editable: true},
            {name: 'banda', index: 'banda', width: 150, align: "left", editable: true, sortable: false, edittype: "textarea"},
            {name: 'nivel', index: 'nivel', width: 90, editable: true, edittype: 'select', editoptions: {value: niveles}}
        ],
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
            $("#categorias").editGridRow(id, {closeAfterEdit: true, mtype: 'POST'});
        },
        sortorder: "desc",
        editurl: "<?php echo base_url() . 'mantenedores/crud_categorias' ?>", //URL Process CRUD
        multiselect: false,
        caption: "Categorias",
        ajaxRowOptions: {
            success: function () {
                $("#categorias").trigger("reloadGrid");
            }
        },
        gridComplete: function () {
            var ids = jQuery("#categorias").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
                var cl = ids[i];
                var data = $("#categorias").jqGrid().getRowData(cl);
                if (data.IsBundled == "true") {
                    be = "<input type='button' value='Ver Detalles' onclick='BundleManage(" + data.id + ",\"" + data.nombre + "\")'  />";
                    jQuery("#categorias").jqGrid('setRowData', ids[i], { act: be });
                }
                else {
                    be = "<input type='button' value='Ver Detalles 2' onclick='ManageRecurring(" + data.id + ",\"" + data.nombre + "\")'  />";
                    jQuery("#categorias").jqGrid('setRowData', ids[i], { act: be });
                }
            }
        }
    });
    ChangejQGridDesign("#categorias", "#pager");
});
</script>
