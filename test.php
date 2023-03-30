<?php
include 'viajefeliz.php';


//cargo el menu y obtengo la respuesta del usuario
do{
cargarMenu();
$seleccion = trim(fgets(STDIN));
switch($seleccion){
    case 1:
        $v1=crearViaje();
        break;
    case 2:
        echo $v1;
        break;
    case 3:
        $v1 = modificarDatos($v1);
        break;
    case 4:
        verDato($v1);
        break;
}
echo "¿Desea realizar otra operación? S/N \n";
$respuesta = trim(fgets(STDIN));

}while($respuesta== "S" || $respuesta== "s");

?>