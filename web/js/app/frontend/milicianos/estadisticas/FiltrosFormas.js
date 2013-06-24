/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery.fn.dataTableExt.aTypes.push(
        function(sData) {
            return 'html';
        }
);
$(document).ready(function() {
    $("input:button, input:submit, input:reset").button();
    var checkBoxes = '';
    var aSelected = [];
    oInit = {
        "aoColumns": [
            {"sName": "nacionalidad"},
            {"sName": "sexo"},
            {"sName": "fecha_nacimiento"},
            {"sName": "Estado Civil"},
            {"sName": "Grupo Sangu&iacute;neo"},
            {"sName": "Estado"},
            {"sName": "Municipio"},
            {"sName": "Parroquia"},
            {"sName": "Ciudad"},
            {"sName": "Grado de Instrucci&oacute;n"},
            {"sName": "Programa de Formaci&oacute;n de Grado"},
            {"sName": "Trayecto"},
            {"sName": "Tramo"},
            {"sName": "Sede"},
            {"sName": "Trabaja si/no"},
            {"sName": "Posee Veh&iacute;culo si/no"},
            {"sName": "Posee Licencia"},
            {"sName": "Posee Porte de Armas si/no"},
            {"sName": "Talla del Uniforme"},
            {"sName": "Dominio de la Mano (Diestro, Siniestro)"},
            {"sName": "Practica Deporte si/no"},
            {"sName": "Participa en Actividades Culturales si/no"}
        ],
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bPaginate": false,
        "bProcessing": true,
        "bAutoWidth": true,
        //-----
        "sDom": '<"H">t<"F"ip>r',
        "sScrollX": "1024",
        "bServerSide": true,
        "sAjaxSource": "../brigest/graficoAjax",
        "bJQueryUI": true,
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Desplegando _MENU_ registros por p&aacute;gina",
            "sZeroRecords": "Nada encontrado",
            "sLoadingRecords": "Obteniendo registros...",
            "sEmptyTable": "A&uacute;n no existen datos en la tabla",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrados  de _MAX_ registros totales)",
            "sSearch": "Filtrar:"

        },
        "fnServerData": function(sSource, aoData, fnCallback, oSettings) {
            oSettings.jqXHR = $.ajax({
                "dataType": 'json',
                "type": "GET",
                "url": sSource,
                "data": aoData,
                "success": function(json, oSettings) {
//oSettings.aoColumns = json.aoColumns;
                    oSettings.aoColumnDefs = json.aoColumnDefs;
                    fnCallback(json);
                }
            });
        },
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            if (jQuery.inArray(aData.DT_RowId, aSelected) !== -1) {
                $(nRow).addClass('row_selected');
            }
            return nRow;
        }

    };
    var oTable = $('#example').dataTable(oInit);
    var grafico = $('#example')
            .visualize({type: 'area', width: '640px', height: '420px', title: 'Grafico de Milicianos'})
            .appendTo('#lugar-grafico');
    $("#opcion-barra").buttonset();
//    $("#abre-dialogo").click(function() {
//        $("#selector-de-columna").dialog("open");
//        return false;
//    });



    // filtro de impresion
    $("#seleccionar-criterios").click(function() {
        $("#seleccion-de-criterios").dialog("open");
        return false;
    });
    $("#abre-grafico").click(function() {
        $("#dialogo-grafico").dialog("open");
        grafico.trigger('visualizeRefresh');
        return false;
    });
    $('#seleccion-de-criterios').dialog({
        autoOpen: false,
        modal: false,
        resizable: true,
        show: "blind",
        hide: "blind",
        height: 580,
        width: 1051,
        buttons: {
            "Ejecutar Consulta": function() {

//------------------ modificaciones para ver si funciona
                var oInit_Dialog = oInit;
                var miforma = document.getElementById('fielset_input_select');
                checkBoxes = miforma.getElementsByTagName('input');
                var losVisibles = Array();
                var losOcultos = Array();
                var x = 0, y = 0;
                for (ctrl = 0; ctrl < checkBoxes.length; ctrl++) {
                    if (checkBoxes[ctrl].checked == true)
                    {
                        losVisibles[x++] = ctrl;
                    } else {
                        losOcultos[y++] = ctrl;
                    }
                }
                oInit_Dialog.aoColumnDefs = [
                    {
                        "bVisible": true,
                        "aTargets": losVisibles
                    },
                    {
                        "bVisible": false,
                        "aTargets": losOcultos
                    }
                ];
                oInit_Dialog.bDestroy = true;
                oTable = new $("#example").dataTable(oInit_Dialog);
                oInit_Dialog = {};
                //$( this ).dialog( "close" );
//------------------
                $(this).dialog("close");
                var formafiltro = document.getElementsByName('srcmt_milicianos_filters');
                $(formafiltro).submit();
            },
            "Cancelar": function() {
                $(this).dialog("close");
            }
        }

    });
    $('#dialogo-grafico').dialog({
        autoOpen: false,
        modal: false,
        resizable: true,
        show: "blind",
        hide: "blind",
        height: 600,
        width: 800,
        buttons: {
            "aceptar": function() {

                $(this).dialog("close");
            },
            "Cancelar": function() {
                $(this).dialog("close");
            }
        }

    });
    $("#seccs-grupos-milicianos").tabs();
    $("#tabs-milicianos").tabs();
    document.getElementById("srcmt_milicianos_filters_codigo_estado").options[0] = new Option('Seleccione un Estado', '');
    $("#srcmt_milicianos_filters_codigo_estado").bind("change", this, function(event) {
        var c_estado = this;
        var select_municipio = document.getElementById("srcmt_milicianos_filters_codigo_municipio");
        select_municipio.options.length = 0;
        select_municipio.options[select_municipio.options.length] = new Option('Seleccione un Municipio', '');
        jQuery.ajax({
            url: "../FuncionesComunes/ObtenerMunicipio",
            data: {
                codigo_estado: c_estado.value
            },
            dataType: "json",
            type: "POST",
            success: function(data, textStatus, jqXHR) {

                $.map(data, function(item) {
                    select_municipio.options[select_municipio.options.length] = new Option(item.municipio, item.codigo_municipio);
                }
                );
            }
        }
        );
    }); //final de bind
    $("#srcmt_milicianos_filters_codigo_municipio").bind("change", this, function(event) {
        var c_estado = document.getElementById("srcmt_milicianos_filters_codigo_estado");
        var c_municipio = document.getElementById("srcmt_milicianos_filters_codigo_municipio");
        var select_parroquia = document.getElementById("srcmt_milicianos_filters_codigo_parroquia");
        var select_ciudad = document.getElementById("srcmt_milicianos_filters_codigo_ciudad");
        select_parroquia.options.length = 0;
        select_parroquia.options[select_parroquia.options.length] = new Option('Seleccione una Parroquia', '');
        select_ciudad.options.length = 0;
        select_ciudad.options[select_ciudad.options.length] = new Option('Seleccione una Ciudad', '');
        jQuery.ajax({
            url: "../FuncionesComunes/ObtenerParroquia",
            data: {
                codigo_estado: c_estado.value,
                codigo_municipio: c_municipio.value

            },
            dataType: "json",
            type: "POST",
            success: function(data, textStatus, jqXHR) {

                $.map(data, function(item) {
                    select_parroquia.options[select_parroquia.options.length] = new Option(item.parroquia, item.codigo_parroquia);
                }
                );
            }
        }); ///final de ajax
        jQuery.ajax({
            url: "../FuncionesComunes/ObtenerCiudad",
            data: {
                codigo_estado: c_estado.value,
                codigo_municipio: c_municipio.value

            },
            dataType: "json",
            type: "POST",
            success: function(data, textStatus, jqXHR) {

                $.map(data, function(item) {
                    select_ciudad.options[select_ciudad.options.length] = new Option(item.ciudad, item.codigo_ciudad);
                }
                );
            }
        }); ///final de ajax
    }); ///final de bind


});

