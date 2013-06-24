
<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
    });

</script>
<p>
	Imprimir lista (Prueba)
</p>
<h3 class="ui-widget-header  ui-corner-all">&nbsp;&nbsp; Actividades de Integraci&oacute;n C&iacute;vico Militar</h3>
<!--<div class="ui-widget-content ui-corner-bottom ">-->
<?php include_partial('lista', array('ActividadesICM'=>$ActividadesICM)) ?>

