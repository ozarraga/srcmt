REM =========================================================================================
REM =  Recuerde cambiar el valor de los parámetros por sus propios valores.                 =
REM =                                                                                       =
REM =  Sintaxis:                                                                            =
REM =  Local:  rsync [OPCION...] ORIGEN... [DEST]                                           =
REM =                                                                                       =
REM =  Acceso via shell remota:                                                             =
REM =   descargar: rsync [OPCIONES...] [USUARIO@]HOST:ORIGEN... [DEST]                      =
REM =   colgar: rsync [OPCIONES...] ORIGEN... [USUARIO@]HOST:DEST                           =
REM =                                                                                       =
REM =                                                                                       =
REM = rsync -avzRh                                                                          =
REM = --log-file=rsync_logfile.txt (Opcional; útil para depurar la ejecución del comando)   =
REM = -–exclude-from=./config/rsync_exclude.txt                                             =
REM = --include-from=./config/rsync_include.txt                                             =
REM = -e="ssh -p 5922 " . usuario@servidor.dominio.ve:/home/usuario/deploy/srcmt            =
REM =========================================================================================

echo off
REM Directorio raiz donde rsync busca configuraciones
REM por defecto: set ROOT_DIR=./config 
set ROOT_DIR=./config

REM Opciones de rsync
REM por defecto: set OPCIONES=-avzRh
set OPCIONES=-avzRh

REM Archivo log de depuración
REM por defecto: set ARCHIVO_LOG=rsync_logfile.txt
set ARCHIVO_LOG=/cygdrive/i/backup_srcmt_logfile.txt

REM Archivo de configuración de exclusiones
REM por defecto: set EXCLUIR=rsync_exclude.txt
set EXCLUIR=rsync_exclude.txt

REM Archivo de configuración de inclusiones
REM por defecto: set INCLUIR=rsync_include.txt
set INCLUIR=rsync_include.txt

REM Configuración SSH. -p indica el puerto tcp del servidor SSH
REM Consulte la documentación de SSH para agregar parámetros
REM por defecto: set COMANDO_SSH="ssh -p 5922 "
set COMANDO_SSH="ssh -p 5922"

REM Directorio de origen de los archivos a transferir "." indica el directorio actual
REM por defecto: set ORIGEN=.
set ORIGEN=.

REM Usurio SSH. Debe reemplazar este valor por un nombre de usuario válido en el 
REM servidor SSH.
REM por defecto: set USUARIO=usuario
set USUARIO=Administrador

REM Servidor SSH. Debe reemplazar este valor por el nombre, nombre.dominio o la dirección IP del
REM servidor SSH.
REM por defecto: set HOST=127.0.0.1
set HOST=127.0.0.1

REM Destino de los archivos en el servidor de pruebas o de producción.
REM por defecto: set DESTINO=/home/usuario/deploy/srcmt
 set DESTINO=/cygdrive/c/srcmt
rem  set DESTINO=/cygdrive/i/srcmt
rem set DESTINO=/cygdrive/c/Backup_srcmt/29-01-2013/srcmt 

REM Ejecución del comando
REM por defecto: rsync %OPCIONES%  --log-file=%ARCHIVO_LOG% --exclude-from=%ROOT_DIR%/%EXCLUIR% --include-from=%ROOT_DIR%/%EXCLUIR% -e=%COMANDO_SSH% %ORIGEN% %USUARIO%@%HOST%:%DESTINO%

echo on
rsync %OPCIONES%  --log-file=%ARCHIVO_LOG%  -e=%COMANDO_SSH% %ORIGEN% %USUARIO%@%HOST%:%DESTINO%
