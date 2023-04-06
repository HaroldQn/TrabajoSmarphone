<?php
require_once '../models/smartphone.php';

if(isset($_POST['operacion'])){
    $smartphone = new Smartphone();

    if($_POST['operacion'] == 'listar'){
        $datosObtenidos = $smartphone->listarSmartphone();
        if($datosObtenidos){
            $numeroFila = 1;

            foreach($datosObtenidos as $smartphone){
                echo"
                <tr>
                    <td>{$numeroFila}</td>
                    <td>{$smartphone['marca']}</td>
                    <td>{$smartphone['modelo']}</td>
                    <td>{$smartphone['sistema_operativo']}</td>
                    <td>{$smartphone['tipo_pantalla']}</td>
                    <td>{$smartphone['bateria']}</td>
                    <td>{$smartphone['camara']}</td>
                    <td>{$smartphone['precio']}</td>
                    <td>
                    <a href='#' data-idsmartphone'{$smartphone['idcelular']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash-fill'></i></a>
                    <a href='#' data-idsmartphone'{$smartphone['idcelular']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil'></i></a>
                    </td>
                </tr>
                ";
                $numeroFila++;
            } //FIN FOREACH
        }
    }
    if($_POST['operacion'] == 'registrar'){
        $datosForm = [
            "marca"             =>$_POST['marca'],
            "modelo"            =>$_POST['modelo'],
            "sistema_operativo" =>$_POST['sistema_operativo'],
            "tipo_pantalla"     =>$_POST['tipo_pantalla'],
            "bateria"           =>$_POST['bateria'],
            "camara"            =>$_POST['camara'],
            "precio"            =>$_POST['precio']
        ];
        $smartphone->registrarSmartphone($datosForm);
    }
    if($_POST['operacion'] == 'eliminar'){
        $smartphone->eliminarSmartphone($_POST['idcelular']);
    }
}

