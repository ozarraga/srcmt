# =========================================================================================
# =  Recuerde cambiar el valor de los par�metros por sus propios valores.                 =
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
# = --log-file=rsync_logfile.txt (Opcional; �til para depurar la ejecuci�n del comando)   =
# = -�exclude-from=./config/rsync_exclude.txt                                             =
# = --include-from=./config/rsync_include.txt                                             =
# = -e="ssh -p 5922 " . usuario@servidor.dominio.ve:/home/usuario/deploy/srcmt            =
# =========================================================================================


# Directorio raiz donde rsync busca configuraciones
# por defecto:  ROOT_DIR='./config '
 ROOT_DIR='./config'

# Opciones de rsync
# por defecto:  OPCIONES=-avzRh
 OPCIONES=-avzRh

# Archivo log de depuraci�n
# por defecto:  ARCHIVO_LOG=rsync_logfile.txt
 ARCHIVO_LOG=rsync_logfile.txt

# Archivo de configuraci�n de exclusiones
# por defecto:  EXCLUIR=rsync_exclude.txt
 EXCLUIR=rsync_exclude.txt

# Archivo de configuraci�n de inclusiones
# por defecto:  INCLUIR=rsync_include.txt
 INCLUIR=rsync_include.txt

# Configuraci�n SSH. -p indica el puerto tcp del servidor SSH
# Consulte la documentaci�n de SSH para agregar par�metros
# por defecto:  COMANDO_SSH="ssh -p 5922 "
 COMANDO_SSH="ssh -p 5922"

# Directorio de origen de los archivos a transferir "." indica el directorio actual
# por defecto:  ORIGEN='.'
 ORIGEN='.'

# Usurio SSH. Debe reemplazar este valor por un nombre de usuario v�lido en el 
# servidor SSH.
# por defecto:  USUARIO=usuario
 USUARIO=usuario

# Servidor SSH. Debe reemplazar este valor por el nombre, nombre.dominio o la direcci�n IP del
# servidor SSH.
# por defecto:  HOST=127.0.0.1
 HOST=127.0.0.1

# Destino de los archivos en el servidor de pruebas o de producci�n.
# por defecto:  DESTINO='/home/usuario/deploy/srcmt'
 DESTINO='/home/usuario/deploy/srcmt'


# Ejecuci�n del comando
# por defecto: rsync $OPCIONES --log-file=$ARCHIVO_LOG -�exclude-from="$ROOT_DIR"/"$EXCLUIR" --include-from="$ROOT_DIR"/"$EXCLUIR" -e=$COMANDO_SSH "$ORIGEN" $USUARIO$@$HOST$:"$DESTINO"

rsync $OPCIONES --log-file=$ARCHIVO_LOG --exclude-from="$ROOT_DIR"/"$EXCLUIR" --include-from="$ROOT_DIR"/"$EXCLUIR" -e=$COMANDO_SSH "$ORIGEN" $USUARIO$@$HOST$:"$DESTINO"
