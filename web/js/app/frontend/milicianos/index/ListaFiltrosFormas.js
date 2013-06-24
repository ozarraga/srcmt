/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function (){
    $("input:button, input:submit, input:reset").button();

    var checkBoxes='';
    var aSelected = [];
    oInit={
        "sDom": 'r<"H"lf>t<"F"ip>',
        "sScrollX": "1024",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "../brigestAjax",
        "aLengthMenu": [[5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 100], [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 100]],
        "sPaginationType": "full_numbers",
        "bJQueryUI": true,
        "bAutoWidth": true,
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Desplegando _MENU_ registros por p&aacute;gina",
            "sZeroRecords": "Nada encontrado",
            "sLoadingRecords": "Obteniendo registros...",
            "sEmptyTable": "A&uacute;n no existen datos en la tabla",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrados  de _MAX_ registros totales)",
            "sSearch": "Filtrar:",
            "oPaginate": {
                "sFirst":    "Primero",
                "sPrevious": "<<",
                "sNext":     ">>",
                "sLast":     "&Uacute;ltimo"
            }
        },
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            if ( jQuery.inArray(aData.DT_RowId, aSelected) !== -1 ) {
                $(nRow).addClass('row_selected');
            }
            return nRow;
        }

    };

    oTable =$('#example').dataTable(oInit);
    $("#opcion-barra").buttonset();
    $( "#abre-dialogo" ).click(function() {
        $( "#selector-de-columna" ).dialog( "open" );
        return false;
    });
    $( "#selector-de-columna" ).dialog({
        resizable: false,
        autoOpen: false,
        show: "blind",
        hide:"blind",
        height:440,
        width:1258,
        buttons: {
            "Aceptar": function() {
                var oInit_Dialog=oInit;
                var miforma=document.getElementById('miforma');
                checkBoxes= miforma.getElementsByTagName('input');
                var losVisibles=Array();
                var losOcultos=Array();
                var x=0,y=0;
                for (ctrl=0; ctrl<checkBoxes.length;ctrl++){
                    if (checkBoxes[ctrl].checked==true)
                    {
                        losVisibles[x++]=ctrl;
                    } else {
                        losOcultos[y++]=ctrl;
                    }
                }
                oInit_Dialog.aoColumnDefs=[
                {
                    "bVisible": true, 
                    "aTargets": losVisibles
                },
{
                    "bVisible": false, 
                    "aTargets": losOcultos
                }
                ] ;
                oInit_Dialog.bDestroy=true;

                oTable=new $("#example").dataTable(oInit_Dialog);
                oInit_Dialog={};
                $( this ).dialog( "close" );
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );

            }
        }
    });

    /* Click event handler */
    $('#example tbody tr').live('click', function () {
        var id = this.id;
        var index = jQuery.inArray(id, aSelected);

        if ( index === -1 ) {
            aSelected.push( id );
        } else {
            aSelected.splice( index, 1 );
        }

        $(this).toggleClass('row_selected');
    } );
    // filtro de impresion
    $( "#imprimir-lista" ).click(function() {
        $( "#filtro-de-impresion" ).dialog( "open" );
        return false;
    });
    $('#filtro-de-impresion').dialog({
        autoOpen: false,
        modal: false,
        resizable: true,
        show: "blind",
        hide: "blind",
        height:580,
        width:1051,
        buttons: {
            "Crear informe PDF": function(){
                $(this).dialog("close");
                var formafiltro= document.getElementsByName('srcmt_milicianos_filters');
                $(formafiltro).submit();
            },
            "Cancelar": function(){
                $(this).dialog("close");
            }
        }

    });

    $( "#tabs-milicianos" ).tabs();

    document.getElementById("srcmt_milicianos_filters_codigo_estado").options[0]=new Option('Seleccione un Estado','');

    $("#srcmt_milicianos_filters_codigo_estado").bind("change", this, function (event){
        var c_estado=this;
        var select_municipio = document.getElementById("srcmt_milicianos_filters_codigo_municipio");
        select_municipio.options.length = 0;
        select_municipio.options[select_municipio.options.length]=new Option('Seleccione un Municipio', '');
        jQuery.ajax({
            url: "../FuncionesComunes/ObtenerMunicipio",
            data: {
                codigo_estado: c_estado.value
            },
            dataType: "json",
            type: "POST",
            success: function(data, textStatus, jqXHR){

                $.map(data, function(item){
                    select_municipio.options[select_municipio.options.length]=new Option(item.municipio, item.codigo_municipio);
                }
                );
            }
        }
        );
    });//final de bind
    $("#srcmt_milicianos_filters_codigo_municipio").bind("change", this, function (event){
        var c_estado=document.getElementById("srcmt_milicianos_filters_codigo_estado");
        var c_municipio = document.getElementById("srcmt_milicianos_filters_codigo_municipio");

        var select_parroquia = document.getElementById("srcmt_milicianos_filters_codigo_parroquia");
        var select_ciudad = document.getElementById("srcmt_milicianos_filters_codigo_ciudad");

        select_parroquia.options.length = 0;
        select_parroquia.options[select_parroquia.options.length]=new Option('Seleccione una Parroquia', '');

        select_ciudad.options.length = 0;
        select_ciudad.options[select_ciudad.options.length]=new Option('Seleccione una Ciudad', '');

        jQuery.ajax({
            url: "../FuncionesComunes/ObtenerParroquia",
            data: {
                codigo_estado: c_estado.value,
                codigo_municipio: c_municipio.value

            },
            dataType: "json",
            type: "POST",
            success: function(data, textStatus, jqXHR){

                $.map(data, function(item){
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
            success: function(data, textStatus, jqXHR){

                $.map(data, function(item){
                    select_ciudad.options[select_ciudad.options.length] = new Option(item.ciudad, item.codigo_ciudad);
                }
                );
            }
        }); ///final de ajax
    }); ///final de bind
});

