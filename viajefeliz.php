<?php
/* La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información
 referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino,
  cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para
 modificar los atributos de dicha clase (incluso los datos de los pasajeros).
  Utilice un array que almacene la información correspondiente a los pasajeros.
   Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y
    “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente
 un menú que permita cargar la información del viaje, modificar y ver sus datos.
*/
//retorna el array de pasajeros
 function cargarArray(){
    $arrayPasajeros = [];
    $p1 = ["nombre"=>"pepe", "apellido"=>"martinez","DNI"=>123456];
    $p2 = ["nombre"=>"papo", "apellido"=>"perez","DNI"=>123457];
    $p3 = ["nombre"=>"pipa", "apellido"=>"dublre","DNI"=>123458];
    $p4 = ["nombre"=>"popi", "apellido"=>"mark","DNI"=>123459];
    $p5 = ["nombre"=>"popa", "apellido"=>"mendez","DNI"=>123460];
    array_push($arrayPasajeros,$p1,$p2,$p3,$p4,$p5);
    return $arrayPasajeros;
 }
 //muestra el menu de opciones
 function cargarMenu(){
echo "Bienvenid@!!!<\n>";
echo "¿Qué desea realizar?<\n>";
echo "Ingresar 1 para cargar información del viaje<\n>";
echo "Ingresar 2 para modificar algún aspecto del viaje<\n>";
echo "Ingrese 3 para ver algún aspecto del viaje<\n>";
 }
 //modificar algun atributo del viaje, recibe objeto-Viaje. Retorna el obj modificado
 function modificarDatos($objV){
    echo "¿qué dato desea modificar?<\n>";
    echo "Ingrese 1 para modificar el código de viaje<\n>";
    echo "Ingrese 2 para modificar el destino<\n>";
    echo "Ingrese 3 para modificar la cantidad máxima de pasajeros del viaje<\n>";
    echo "Ingrese 4 para modificar los datos de algún pasajero<\n>";
    $respuesta = trim(fgets(STDIN));
    switch($respuesta){
        case 1:
            echo "Ingrese un nuevo código para el viaje<\n>";
            $mod = trim(fgets(STDIN));
            $objV->setCodigo($mod);
            break;
        case 2:
            echo "Ingrese un nuevo destino para el viaje<\n>";
            $mod = trim(fgets(STDIN));
            $objV->setDestino($mod);
            break;
        case 3:
            echo "Ingrese un nuevo valor para la cantidad máxima de pasajeros del viaje<\n>";
            $mod = trim(fgets(STDIN));
            $objV->setCantPasajeros($mod);
            break;
        case 4:
            echo "Ingrese el DNI del pasajero a modificar<\n>";
            $doc = trim(fgets(STDIN));
            $psjs = $objV->getPasajeros();
            for ($i=0;$i<count($psjs);$i++){
                if ($doc == $psjs[$i]["DNI"]){
                    echo "Ingrese el nuevo nombre<\n>";
                    $nom = trim(fgets(STDIN));
                    echo "Ingrese el apellido<\n>";
                    $ape = trim(fgets(STDIN));
                    echo "Ingrese el DNI<\n>";
                    $nuevoDoc = trim(fgets(STDIN));
                    $psjs = array ("nombre"=>$nom,"apellido"=>$ape,"DNI"=>$nuevoDoc);
                    $objV->setPasajeros($psjs,$i);
                    break;
                }
            }
    }
    return $objV;
 }
//permite ver algun atributo del viaje, recibe el objeto-Viaje por parametro
 function verDato($objV){
    echo "¿qué dato desea ver?<\n>";
    echo "Ingrese 1 para ver el código de viaje<\n>";
    echo "Ingrese 2 para ver el destino<\n>";
    echo "Ingrese 3 para ver la cantidad máxima de pasajeros del viaje<\n>";
    echo "Ingrese 4 para ver los datos de los pasajeros<\n>";
    $eleccion = trim(fgets(STDIN));
    switch ($eleccion){
        case 1:
            echo "codigo de viaje ".$objV->getCodigo()."\n";
            break;
        case 2:
            echo "destino de viaje ".$objV->getDestino()."\n";
            break;
        case 3:
            echo "codigo de viaje ".$objV->getCantPasajeros()."\n";
            break;
        case 4:
            $p = $objV->getPasajeros();
            for ($i=0;$i<count($p);$i++){
                echo "Pasajero ".$i+1 .": \n";
                echo "  nombre y apellido: ".$p[$i]["nombre"]." ".$p[$i]["apellido"]." documento : ".$p[$i]["DNI"]."\n";
            }
            break;
    }
 }

class Viaje{
    private $codigo;
    private $destino;
    private $cant_Max_Pjs;
    private $pasajeros = [];
    //metodo constructor, recibe datos desde el test
    public function __construct($codigo, $destino, $cant, $pasajeros){
        $this-> codigo = $codigo;
        $this-> destino = $destino;
        $this -> cant_Max_Pjs = $cant;
        $this -> pasajeros = $pasajeros;

    }

    //gets y sets de la clase
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($cod){
        $this->codigo = $cod;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($dest){
        $this->destino = $dest;
    }
    public function getCantPasajeros(){
        return $this->cant_Max_Pjs;
    }
    public function setCantPasajeros($cantP){
        $this->cant_Max_Pjs = $cantP;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setPasajeros($pasajero,$posicion){
        $this->pasajeros[$posicion] = $pasajero;
    }
    // al hacer echo muestra los atributos de la clase
    public function __toString(){
        echo "codigo de viaje: ".$this->codigo."\n";
        echo "destino: ".$this->destino."\n";
        echo "cantidad máxima de pasajeros: ".$this->cant_Max_Pjs."\n";
        $cant_P = count($this->pasajeros);
        for ($i=0;$i<$cant_P;$i++){
            echo "pasajero ".$i+1 ." ".$this->pasajeros[$i]["nombre"]." ".$this->pasajeros[$i]["apellido"]." DNI: ".$this->pasajeros[$i]["DNI"]."\n";
        }
        return "";
    }

}

?>