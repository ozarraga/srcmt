/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * Este codigo controla la barra de menu que se encuentra en el layout de la aplicacion
 **/


$(document).ready(function() {
    $('#show-hide-menu-registro').hide();
    $('#show-hide-menu-actividades-fcm').hide();
    $('#show-hide-menu-consultas').hide();
    $('#show-hide-menu-reportes').hide();
    $('#show-hide-menu-actualizar-tablas').hide();

    $( "#boton-inicio" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-home"
        }
    }).click(
        function(){
            $('#show-hide-menu-actividades-fcm').hide(),
            $('#show-hide-menu-consultas').hide(),
            $('#show-hide-menu-reportes').hide(),
            $('#show-hide-menu-registro').hide(),
            $('#show-hide-menu-actualizar-tablas').hide();
        }
        )
    ;
    $( "#boton-registro" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-pencil"
        }
    }).click(
        function(){
            $("#show-hide-menu-actividades-fcm").hide(),
            $("#show-hide-menu-consultas").hide(),
            $("#show-hide-menu-reportes").hide(),
            $('#show-hide-menu-actualizar-tablas').hide(),
            $("#show-hide-menu-registro").show();
        }
        );

    $( "#boton-consultas" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-search"
        }
    }).click(
        function(){
            $("#show-hide-menu-actividades-fcm").hide();
            $("#show-hide-menu-reportes").hide();
            $("#show-hide-menu-registro").hide();
            $('#show-hide-menu-actualizar-tablas').hide();
            $("#show-hide-menu-consultas").show();
        }
        );
    $("#boton-programas-fcm").button({
        //        text: false,
        icons: {
            secondary: "ui-icon-gear"
        }
    }).click(
        function(){

            $("#show-hide-menu-consultas").hide(),
            $("#show-hide-menu-reportes").hide(),
            $("#show-hide-menu-registro").hide(),
            $('#show-hide-menu-actualizar-tablas').hide(),
            $("#show-hide-menu-actividades-fcm").show();
        }
        );
    $( "#boton-reportes" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-print"
        }
    }).click(
        function(){

            $("#show-hide-menu-consultas").hide(),
            $("#show-hide-menu-registro").hide(),
            $("#show-hide-menu-actividades-fcm").hide(),
            $('#show-hide-menu-actualizar-tablas').hide(),
            $("#show-hide-menu-reportes").show();
        }
        );
    $( "#boton-ayuda" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-help"
        }
    }).click(
        function(){

            $("#show-hide-menu-consultas").hide(),
            $("#show-hide-menu-registro").hide(),
            $("#show-hide-menu-actividades-fcm").hide(),
            $('#show-hide-menu-actualizar-tablas').hide(),
            $("#show-hide-menu-reportes").hide();
        }
        );
    $( "#boton-salir" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-power"
        }
    });
    $( "#boton-actualizar-tablas" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-wrench"
        }
    }).click(
        function(){

            $("#show-hide-menu-consultas").hide(),
            $("#show-hide-menu-registro").hide(),
            $("#show-hide-menu-actividades-fcm").hide(),
            $('#show-hide-menu-actualizar-tablas').show(),
            $("#show-hide-menu-reportes").hide();
        }
        );
    $( "#boton-inicio-Administrador" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-home"
        }
    }).click(
        function(){
            $('#show-hide-menu-actualizar-tablas').hide();
        }
        )
    ;
    $( "#boton-usuarios" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-person"
        }
    }).click(
        function(){
            $('#show-hide-menu-actualizar-tablas').hide();
        }
        )
    ;
    $( "#boton-grupos" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-plusthick",
            secondary: "ui-icon-person"
        }
    }).click(
        function(){
            $('#show-hide-menu-actualizar-tablas').hide();
        }
        )
    ;
    $( "#boton-permisos" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-locked",
            primary: "ui-icon-unlocked"
        }
    }).click(
        function(){
            $('#show-hide-menu-actualizar-tablas').hide();
        }
        )
    ;
    $( "#boton-brigadista-estudiantil" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-person"
        }
    });
    $( "#boton-brigadista-dado" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-person"
        }
    });
    /*
     *Menu Actualizar Tablas
     **/

    $( "#boton-pfg" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-wrench",
            secondary: "ui-icon-script"
        }
    });
    $( "#boton-sedes" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-wrench",
            secondary: "ui-icon-flag"
        }
    });

    $( "#boton-tipo-actividades" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-wrench",
            secondary: "ui-icon-newwin"
        }
    });
    /*
     *Menu Actividades de seguimiento de Formación Cívico Militar
     **/

    $(  "#boton-actividades-icm, #boton-actividades-icm-c" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-calendar"
        }
    });
    $(  "#boton-actividades-academicas, #boton-actividades-academicas-c" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-calendar"
        }
    });

    $(  "#boton-nueva-actividad-icm" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-calendar"
        }
    });

    $(  "#boton-nueva-actividad-academica" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-calendar"
        }
    });
    $(  "#boton-nueva-actividad-icm-r" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-calendar"
        }
    });

    $(  "#boton-nueva-actividad-academica-r" ).button({
        //        text: false,
        icons: {
            secondary: "ui-icon-calendar"
        }
    });

    /*
        Menu Consultas
     */
    $(  "#boton-consultas-brigadista-cm" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-search",
            secondary: "ui-icon-person"
        }
    });
    $(  "#boton-consultas-brigadista-dado" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-search",
            secondary: "ui-icon-person"
        }
    });

    $(  "#boton-estadisticas-brigadista-cm" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-print",
            secondary: "ui-icon-person"
        }
    });

    $(  "#boton-estadisticas-brigadista-dado" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-print",
            secondary: "ui-icon-person"
        }
    });

    $(  "#boton-estadisticas-actividades-academicas" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-print",
            secondary: "ui-icon-gear"
        }
    });
    $(  "#boton-estadisticas-actividades-icm" ).button({
        //        text: false,
        icons: {
            primary: "ui-icon-print",
            secondary: "ui-icon-gear"
        }
    });
    
});
function NuevoTag(href){
    var anchor=document.createElement("a");
    anchor.setAttribute("style","display: none");
    anchor.setAttribute("target","_blank");
    anchor.setAttribute("href", href );
    document.getElementsByTagName("body")[0].appendChild(anchor)
    anchor.click();
    anchor.parentNode.removeChild(anchor);
}
