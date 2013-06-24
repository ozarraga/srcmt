/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
  $("input:button, input:submit, input:reset").button();

  var aSelected = [];

  $("#opcion-barra").buttonset();

  var oTable=$('#example').dataTable({
    "sScrollX": "1024",
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "../actividad_icmAjax",
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
  });

  //oTable =$('#example').dataTable(oInit);
  $("#opcion-barra").buttonset();




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
  });




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
    height: 430,
    width: "60%",
    buttons: {
      "Crear informe PDF": function(){

        var formafiltro = document.getElementById("srcmt_actividades_icm_filters");
        $(this).dialog("close");
        //$(formafiltro).submit();

        formafiltro.submit();

      },
      "Cancelar": function(){
        $(this).dialog("close");
      }
    }

  });

  //$( "#tabs-brigadistas-dado" ).tabs();
});

