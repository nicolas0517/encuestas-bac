<?php
    include("conexion.php");

    $filtro = $_POST['filtro'];
    $respuesta = "";
    
    if (isset($filtro)) {

        $con=conectar();

        $consulta=consultar($con,"SELECT * FROM elemento WHERE k_norma = $filtro");
        $filas = mysqli_num_rows($consulta);
        if ($filas === 0) {
            $respuesta = "<p>No se encontraron elementos</p>";
        } else {
            while($resultados = mysqli_fetch_array($consulta)) {
                $id = $resultados['k_elemento'];
                $descripcion = utf8_encode($resultados['n_descripcion']);

                //Output
                $respuesta .= '
                <div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="' . $id . '" id="elemento' . $id . '" onclick="obtenerDatos(' . "'" . $id . "'" . ')" class="check_elementos">' . $descripcion . '</label>
                    </div>
                    <p class="item_descripcion">Escoja los criterios:</p>
                    <div id="criterios' . $id . '" class="item_check">
                    </div>
                    <p class="item_descripcion">Escoja los conocimientos:</p>
                    <div id="conocimientos' . $id . '" class="item_check">
                    </div>
                </div>
                <hr>
                ';
            };
        }
        
    }

    echo $respuesta;
?>