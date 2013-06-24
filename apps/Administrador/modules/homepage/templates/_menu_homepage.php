<div>&nbsp;</div>
<div id="menu-app" >
    <span id="toolbar-menu-app"  class="ui-widget-header ui-corner-all" >
        <button id="boton-inicio-Administrador" onclick="document.location.href='<?php echo url_for('@homepage') ?>'">Inicio</button>                                                        
        <button id="boton-usuarios" onclick="document.location.href='<?php echo url_for('sf_guard_user') ?>'">Usuarios</button>
        <button id="boton-grupos" onclick="document.location.href='<?php echo url_for('sf_guard_group') ?>'">Grupos</button>
	<button id="boton-permisos" onclick="document.location.href='<?php echo url_for('sf_guard_permission') ?>'">Permisos</button>    
        <button id="boton-actualizar-tablas">Actualizar Tablas</button>
        <button id="boton-ayuda">Ayuda</button>
        <button id="boton-salir" onclick="document.location.href='<?php echo url_for('sf_guard_signout') ?>'">Salir del sistema</button>
    </span>
</div>
<div>&nbsp;</div>
<div id="menu-modulo" >                    
    <?php echo include_partial('homepage/menu_actualizar_tablas') ?> 
</div>


