<?php
    include("conexion.php");

    $filtro = $_POST['filtro'];
    $respuesta = "";
    
    if (isset($filtro)) {

        $con=conectar();

        $consulta=consultar($con,"SELECT * FROM conocimiento WHERE k_elemento= '$filtro'");
        $filas = mysqli_num_rows($consulta);
        if ($filas === 0) {
            $respuesta = "<p>No se encontraron conocimientos</p>";
        } else {
            while($resultados = mysqli_fetch_array($consulta)) {
                $id = $resultados['k_conocimiento'];
                $descripcion = utf8_encode($resultados['n_descripcion']);

                //Output
                $respuesta .= '
                    <div class="checkbox">
                        <label><input type="checkbox" value="' . $id . '" id="conocimiento' . $id . '" class="check_conocimientos">' . $descripcion . '</label>
                    </div>
                ';
            };
        }
        
    }

    echo $respuesta;
?>