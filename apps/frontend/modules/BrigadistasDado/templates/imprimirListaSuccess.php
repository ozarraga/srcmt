
<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
        
    });

</script>


<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Lista de Brigadistas DADO</h3>

<!-- $srcmt_brigadistas_dado  -->

<?php include_partial('lista3', array('srcmt_brigadistas_dados' => $srcmt_brigadistas_dados,'casillas_de_campos'=>$casillas_de_campos)) ?>  