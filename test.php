<?php
include 'viajefeliz.php';


//cargo el menu y obtengo la respuesta del usuario
$viajes = [];
do{
cargarMenu();

$min=1;
$max=4;
do{
    $seleccion = trim(fgets(STDIN));
    if (esNumEntre($seleccion,$min,$max)){
    switch($seleccion){
    case 1:
        $viajes=crearViaje($viajes);
        break;
    case 2:
        //pido num del viaje a mostrar
        mostrarViajeCod($viajes);
        break;
    case 3:
        $viajes = modificarDatos($viajes);
        break;
    case 4:
        verDato($viajes);
        break;
}}else{
    echo "Ingrese un numero entre 1 y 4 \n";

}
}while(!esNumEntre($seleccion,$min,$max));
echo "¿Desea realizar otra operación? S/N \n";
$respuesta = trim(fgets(STDIN));
}while($respuesta== "S" || $respuesta== "s");

?>