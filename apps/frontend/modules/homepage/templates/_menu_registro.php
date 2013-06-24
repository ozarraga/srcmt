<div id="show-hide-menu-registro" class="ui-helper-hidden">
    <span id="toolbar-menu-registro"  class="ui-state-focus ui-corner-all" >
        <button id="boton-brigadista-estudiantil" title="Nuevo Brigadista Estudiantil" onclick="document.location.href='<?php echo url_for('@milicianos_new') ?>'" >Brigadista Estudiantil</button>
        <button id="boton-brigadista-dado" title="Nuevo Brigadista Directivo, Administrativo, Docente u Obrero" onclick="document.location.href='<?php echo url_for('@BrigadistasDado_new') ?>'" >Brigadista DADO</button>        
        <button id="boton-nueva-actividad-icm-r" onclick="document.location.href='<?php echo url_for('@SrcmtActividadesIcm_new') ?>'" title="Nueva Actividad de Integracion C&iacute;vico Militar" >Nueva Actividad ICM</button>
        <button id="boton-nueva-actividad-academica-r" onclick="document.location.href='<?php echo url_for('@SrcmtActividadesAcademicas_new') ?>'" >Nueva Actividad Acad&eacute;mica</button>       
    </span>
</div>