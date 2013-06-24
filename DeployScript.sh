# =========================================================================================
# =  Recuerde cambiar el valor de los parámetros por sus propios valores.                 =
# =                                                                                       =
# =  Sintaxis:                                                                            =
# =  Local:  rsync [OPCION...] ORIGEN... [DEST]                                           =
# =                                                                                       =
# =  Acceso via shell remota:                                                             =
# =   descargar: rsync [OPCIONES...] [USUARIO@]HOST:ORIGEN... [DEST]                      =
# =   colgar: rsync [OPCIONES...] ORIGEN... [USUARIO@]HOST:DEST                           =
# =                                                                                       =
# =                                                                                       =
# = rsync -avzRh                                                                          =
# = --log-file=rsync_logfile.txt (Opcional; útil para depurar la ejecución del comando)   =
# = -–exclude-from=./config/rsync_exclude.txt                                             =
# = --include-from=./config/rsync_include.txt                                             =
# = -e="ssh -p 5922 " . usuario@servidor.dominio.ve:/home/usuario/deploy/srcmt            =
# =========================================================================================


# Directorio raiz donde rsync busca configuraciones
# por defecto:  ROOT_DIR='./config '
 ROOT_DIR='./config'

# Opciones de rsync
# por defecto:  OPCIONES=-avzRh
 OPCIONES=-avzRh

# Archivo log de depuración
# por defecto:  ARCHIVO_LOG=rsync_logfile.txt
 ARCHIVO_LOG=rsync_logfile.txt

# Archivo de configuración de exclusiones
# por defecto:  EXCLUIR=rsync_exclude.txt
 EXCLUIR=rsync_exclude.txt

# Archivo de configuración de inclusiones
# por defecto:  INCLUIR=rsync_include.txt
 INCLUIR=rsync_include.txt

# Configuración SSH. -p indica el puerto tcp del servidor SSH
# Consulte la documentación de SSH para agregar parámetros
# por defecto:  COMANDO_SSH="ssh -p 5922 "
 COMANDO_SSH="ssh -p 5922"

# Directorio de origen de los archivos a transferir "." indica el directorio actual
# por defecto:  ORIGEN='.'
 ORIGEN='.'

# Usurio SSH. Debe reemplazar este valor por un nombre de usuario válido en el 
# servidor SSH.
# por defecto:  USUARIO=usuario
 USUARIO=usuario

# Servidor SSH. Debe reemplazar este valor por el nombre, nombre.dominio o la dirección IP del
# servidor SSH.
# por defecto:  HOST=127.0.0.1
 HOST=127.0.0.1

# Destino de los archivos en el servidor de pruebas o de producción.
# por defecto:  DESTINO='/home/usuario/deploy/srcmt'
 DESTINO='/home/usuario/deploy/srcmt'


# Ejecución del comando
# por defecto: rsync $OPCIONES --log-file=$ARCHIVO_LOG -–exclude-from="$ROOT_DIR"/"$EXCLUIR" --include-from="$ROOT_DIR"/"$EXCLUIR" -e=$COMANDO_SSH "$ORIGEN" $USUARIO$@$HOST$:"$DESTINO"

rsync $OPCIONES --log-file=$ARCHIVO_LOG --exclude-from="$ROOT_DIR"/"$EXCLUIR" --include-from="$ROOT_DIR"/"$EXCLUIR" -e=$COMANDO_SSH "$ORIGEN" $USUARIO$@$HOST$:"$DESTINO"
