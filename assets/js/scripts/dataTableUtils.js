function crearDataTablePorId(idDataTable) {
    var idDataTableStr="#"+idDataTable;
    var table = $(idDataTableStr).DataTable({
        responsive : true,
        language : { "url" : "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },
        dom: 'lBfrtip',
        lengthMenu: [
            [5,10, 25, 50, -1],
            ['5','10', '25', '50', 'Todo']
        ],
        deferRender: true,
        processing: true,
        serverSide: false,
        select: true,
        autoWidth: false,
        responsive: true,
        pagingType: 'full_numbers',
        paginate: true,
        order: [],
        deferLoading: [{data: 'num_results'}],
        columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        buttons: [
            {
                className: "fa fa-columns btn-lg btn-info",
                extend: 'colvis',
                text: '',
                columns: ':not(.noVis)'
            },
            {
                extend: "selectAll",
                className: "fa fa-check-square-o btn-lg",
                text: '',
                titleAttr: 'Seleccionar todo'
            },
            {
                extend: "selectNone",
                className: "fa fa-square-o btn-lg",
                text: '',
                titleAttr: 'Desmarcar todo'
            },
            {
                extend: "selectNone",
                className: "btn-blank",
                text: ''
            },
            {
                extend: "excel",
                className: "fa fa-file-excel-o btn-lg btn-disabled",
                text: '',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "pdf",
                className: "fa fa-file-pdf-o btn-lg btn-disabled",
                text: '',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true

                    }
                },
                download: 'open'
            },
            {
                extend: "copy",
                className: "fa fa-copy btn-lg btn-disabled",
                text: '',
                titleAttr: 'Copiar filas',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "print",
                className: "fa fa-print btn-lg btn-disabled",
                text: '',
                titleAttr: 'Imprimir filas',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            }
        ]
    });
    $('.datatable-buttons').on('select.dt deselect.dt', function () {
        table.buttons(['.btn-disabled']).enable(table.rows({selected: true}).indexes().length===0?false:true);
    });
    return table;
};
function crearDataTablePorClase(nombreClase) {
    var table = $("."+nombreClase).DataTable({
        responsive : true,
        language : { "url" : "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },
        dom: 'lBfrtip',
        lengthMenu: [
            [5,10, 25, 50, -1],
            ['5','10', '25', '50', 'Todo']
        ],
        deferRender: true,
        processing: true,
        serverSide: false,
        select: true,
        autoWidth: false,
        responsive: true,
        pagingType: 'full_numbers',
        paginate: true,
        order: [],
        deferLoading: [{data: 'num_results'}],
        columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        buttons: [
            {
                className: "fa fa-columns btn-lg btn-info",
                extend: 'colvis',
                text: '',
                columns: ':not(.noVis)'
            },
            {
                extend: "selectAll",
                className: "fa fa-check-square-o btn-lg",
                text: '',
                titleAttr: 'Seleccionar todo'
            },
            {
                extend: "selectNone",
                className: "fa fa-square-o btn-lg",
                text: '',
                titleAttr: 'Desmarcar todo'
            },
            {
                extend: "selectNone",
                className: "btn-blank",
                text: ''
            },
            {
                extend: "excel",
                className: "fa fa-file-excel-o btn-lg btn-disabled",
                text: '',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "pdf",
                className: "fa fa-file-pdf-o btn-lg btn-disabled",
                text: '',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true

                    }
                },
                download: 'open'
            },
            {
                extend: "copy",
                className: "fa fa-copy btn-lg btn-disabled",
                text: '',
                titleAttr: 'Copiar filas',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "print",
                className: "fa fa-print btn-lg btn-disabled",
                text: '',
                titleAttr: 'Imprimir filas',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            }
        ]
    });
    $('.datatable-buttons').on('select.dt deselect.dt', function () {
        table.buttons(['.btn-disabled']).enable(table.rows({selected: true}).indexes().length===0?false:true);
    });
    return table;
};