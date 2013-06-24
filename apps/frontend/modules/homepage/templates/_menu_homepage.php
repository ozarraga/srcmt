<div>&nbsp;</div>
<div id="menu-app" >
    <span id="toolbar-menu-app"  class="ui-widget-header ui-corner-all" >
        <button id="boton-inicio" onclick="document.location.href='<?php echo url_for('@homepage') ?>'" >
		Inicio
	</button>                                                        
        <button id="boton-registro" >
		Registro
	</button>
        <button id="boton-programas-fcm" onclick=""  title="Programa de Seguimiento de Formaci&oacute;n C&iacute;vico Militar">
		Programa S.F.C.M.
	</button>    
        <button id="boton-consultas">
		Consultas
	</button>
        <button id="boton-reportes" style="display: none">
            Estad&iacute;sticas
	</button>
<!--        <button id="boton-actualizar-tablas">Actualizar Tablas</button>-->
        <button id="boton-ayuda">
		Ayuda
	</button>
        <button id="boton-salir" onclick="document.location.href='<?php echo url_for('sf_guard_signout') ?>'">
		Salir del sistema
	</button>
    </span>
</div>
<div>&nbsp;</div>
<div id="menu-modulo" >                    
    <?php echo include_partial('homepage/menu_registro') ?>
    <?php echo include_partial('homepage/menu_programa_sfcm') ?>
    <?php echo include_partial('homepage/menu_consultas') ?>
    <?php echo include_partial('homepage/menu_estadisticas') ?> 
    <?php //echo include_partial('homepage/menu_actualizar_tablas') ?> 
</div>

