<?php
include 'viajefeliz.php';
//inicializo variables
$arrayPsjs = [];
$arrayPsjs = cargarArray();
$cod = 001;
$destino = "BsAs";
$cantMax = 20;
$v1 = new Viaje ($cod, $destino, $cantMax, $arrayPsjs);

//cargo el menu y obtengo la respuesta del usuario
do{
cargarMenu();
$seleccion = trim(fgets(STDIN));
switch($seleccion){
    case 1:
        echo $v1;
        break;
    case 2:
        $v1 = modificarDatos($v1);
        break;
    case 3:
        verDato($v1);
        break;
}
echo "¿Desea realizar otra modificacion? S/N <\n>";
$respuesta = trim(fgets(STDIN));

}while($respuesta== "S" || $respuesta== "s");

?>