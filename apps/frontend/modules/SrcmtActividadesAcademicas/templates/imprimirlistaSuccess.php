<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
    });

</script>
<h3 class="ui-widget-header  ui-corner-all">&nbsp;&nbsp; Actividades Acad&eacute;micas</h3>

<?php include_partial('lista', array('ActividadesAcademicas'=>$ActividadesAcademicas)) ?>

