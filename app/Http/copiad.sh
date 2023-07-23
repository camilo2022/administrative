!/bin/bash
 
DB_NAME="test_ctrel" # - Nombre de la base de datos
DB_USER="root"       # - Usuario del banco
DB_PASS="RedsuelvaLamp12345678" # - Contraseña del banco
DB_PARAM="--add-drop-table --add-locks --extended-insert --single-transaction "
 
MYSQLDUMP="/usr/bin/mysqldump" # Ruta de acceso a mysqldump binario
BACKUP_DIR="/backup/entry_control"     # Ruta de acceso para guardar copias de seguridad
DIAS=7                         # - ¿Cuántos días de copias de seguridad desea mantener
 
FECHA=$(date +%Y-%m-%d&)
BACKUP_NAME=entry_control-"$FECHA".sql
BACKUP_TAR=entry_control-"$FECHA".tar
###BACKUP_BZ2=mysql-"$FECHA".tar.bz2
 
echo "Inicio del proceso de copia de seguridad..."
 
#Gerando archivo sql
echo "Generación de copia de seguridad de base de datos $DB_NAME en $BACKUP_DIR/$BACKUP_NAME"
$MYSQLDUMP $DB_NAME $DB_PARAM -u $DB_USER -p$DB_PASS > $BACKUP_DIR/$BACKUP_NAME
 
#• Comprimir el archivo en alquitrán
echo "Consolidando archivo en alquitrán..."
tar -cf $BACKUP_DIR/$BACKUP_TAR -C $BACKUP_DIR $BACKUP_NAME
 
####• Comprimir el archivo con bzip2
###echo " -- Comprimir archivo en bzip2 ..."
###$BACKUP_DIR/$BACKUP_BZ2 $BACKUP
 
#• Excluyendo archivos sin procesar
echo " -- Excluyendo archivos innecesarios ..."
rm -rf $BACKUP_DIR/$BACKUP_NAME
 
#• Eliminación de archivos antiguos
find /backup/entry_control/*.tar -type f -mtime +$DIAS -exec rm {} \;

# Copiar archivo .tar hacia nash
### scp /backup/entry_control/*.tar root@172.16.10.183:/home/desarrollo/entry_control


