<script>
    $(document).ready(function() {
        $("input:button").button();
        
    });

</script>


<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Lista de Brigadistas Estudiantiles</h3>

<!-- $milicianos  -->

<?php include_partial('lista3', array('milicianos' => $milicianos, 'casillas_de_campos'=>$casillas_de_campos))?>  